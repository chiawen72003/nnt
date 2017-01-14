<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaperAccess;
use App\Http\Models\ExamPaper;
use App\Http\Models\ExamRecord;
use App\Http\Models\ConceptInfo;
use App\Http\Models\ConceptItem;
use App\Http\Models\ConceptOptionRule;
use App\Http\Models\MadItem;
use App\Http\Models\MadRule;
use App\Http\Models\Subject;

class ExamClass
{
    const _SPLIT_SYMBOL = '@XX@';

    public static $url_path = 'http://210.240.188.161/chineseautotutor/Multi_Agent_test_show.php?a=b';
    public static $cs_id = null;
    public static $paper_vol = null;
    public static $item_num = null;
    public static $InputCode = null;//學生輸入的答案
    public static $at_error = null;//試題錯誤答案的集合
    public static $at_answer = null;//試題正確答案的集合

    public static function init($use_data)
    {
        foreach ($use_data as $key => $value) {
            self::$$key = $value;
        }
    }

    /**
     * 取得受測學生可以測驗的單元
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的單元資料
     */
    public static function get_exam_list($mem_data)
    {
        $list_data = array();
        $has_test_data[] = "000000000";//已經受測過得單元
        $now_open_test = array();//目前開放的單元
        $temp_obj = ExamRecord::where('user_id', $mem_data['user_id'])->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $has_test_data[] = $value['exam_title'] . sprintf("%02d", $value['type_id']);
            }
        }

        //指定學校、班級可以受測的單元
        $temp_obj = ExamPaperAccess::where('school_id', $mem_data['organization_id'])
            ->where('grade', $mem_data['grade'])
            ->where('class', $mem_data['class'])
            ->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $now_open_test[] = $value['exam_paper_id'] . sprintf("%02d", $value['type_id']);
            }
        } else {

            return $list_data;
        }
        $differ = array_diff($now_open_test, $has_test_data);   //元素少者在前，找兩陣列相異之值
        sort($differ);   // $differ為目前已開放且尚未施測之試卷
        $whereIn = null;
        foreach ($differ as $v) {
            $temp_data = array();
            $cs_id = self::EPid2CSid($v);
            $exam_paper_id = substr($v, 0, 11);
            $exam_paper_info = self::explode_ep_id($exam_paper_id);
            $temp_data['pid'] = intval($exam_paper_info[0]);
            $temp_data['sid'] = intval($exam_paper_info[1]);
            $temp_data['vid'] = intval($exam_paper_info[2]);
            $temp_data['uid'] = intval($exam_paper_info[3]);
            $temp_data['paper_vol'] = intval($exam_paper_info[4]);
            $list_data[$cs_id] = $temp_data;
            $whereIn[] = $cs_id;
        }
        if ($whereIn) {
            //取出示意圖
            $temp_obj = ExamPaper::whereIn('cs_id', $whereIn)->get();
            if ($temp_obj) {
                foreach ($temp_obj as $value) {
                    $list_data[$value['cs_id']]['img'] = $value['exam_year_img'];
                }
            }
            //取出單元標題
            $temp_obj = ConceptInfo::whereIn('cs_id', $whereIn)->get();
            if ($temp_obj) {
                foreach ($temp_obj as $value) {
                    $list_data[$value['cs_id']]['title'] = $value['concept'];
                }
            }
        }

        return $list_data;
    }

    /**
     * 轉換出cs_id
     *
     * @param $ep_id
     * @return string
     */
    public static function EPid2CSid($ep_id)
    {
        $data = substr($ep_id, 0, 9);   //前9碼為cs_id
        return $data;
    }

    /**
     * 轉換出版本、科目、冊、單元、卷別資料
     *
     */
    public static function explode_ep_id($ep_id)
    {
        $data[0] = substr($ep_id, 0, 3);   //1,2,3碼為publisher_id(版本)
        $data[1] = substr($ep_id, 3, 2);   //4,5碼為subject_id(科目)
        $data[2] = substr($ep_id, 5, 2);   //6,7碼為vol(冊別)
        $data[3] = substr($ep_id, 7, 2);   //8,9碼為unit(單元)
        $data[4] = substr($ep_id, 9, 2);   //10,11碼為paper_vol(卷別)
        return $data;
    }

    /**
     * 取得試題item的資料
     *
     */
    public static function get_exam_item_data()
    {
        $item_sn = null;
        $publisher_id = null;
        $return_data = array(
            'cs_id' => self::$cs_id,
            'title' => null,
            'load_module' => null,
            'iframe_path' => '',
        );
        $temp_obj = ConceptInfo::where('cs_id', self::$cs_id)
            ->get()
            ->first();
        if ($temp_obj) {
            $publisher_id = $temp_obj['publisher_id'];
        }
        $temp_obj = ConceptItem::where('cs_id', self::$cs_id)
            ->where('item_num', self::$item_num)
            ->get()
            ->first();
        if ($temp_obj) {
            $return_data['title'] = $temp_obj['test_title'];
            $item_sn = $temp_obj['item_sn'];
            $feedback_array = explode(ExamClass::_SPLIT_SYMBOL, $temp_obj['feedback']);
            array_pop($feedback_array);
            $feedback_order = json_decode($temp_obj['feedback_order']);
            $computer_agent = json_decode($temp_obj['computer_agent']);
            $return_data['iframe_path'] = self::get_iframe_path($publisher_id, $feedback_array, $feedback_order, $computer_agent);

            $temp_obj = MadItem::where('item_sn', $item_sn)
                ->get()
                ->first();
            if ($temp_obj) {
                $mad_rule_obj = MadRule::where('mad_type_id', $temp_obj['mad_type_id'])
                    ->orderBy('block_id', 'ASC')
                    ->get()
                    ->first();
                if ($mad_rule_obj) {
                    $return_data['load_module'] = substr($mad_rule_obj['filename'], 0, -4);
                }
            }
        }

        return $return_data;
    }

	/**
	* 組合電腦代理人的網址
	*
	*/
    public static function get_iframe_path($publisher_id, $feedback_array, $feedback_order, $computer_agent)
    {
        $selected_item = 1;
        $feedback_talk_url = '';
        $feedback_order_url = '';
        $url_path = ExamClass::$url_path;
        for ($x = 1, $y = 0; $x < 7; $x++, $y++) {
            $feedback_talk_url .= '&text' . $x . '=';
            isset($feedback_array[$y]) ? $feedback_talk_url .= $feedback_array[$y] : '';
            if (isset($feedback_order[$y]) and $feedback_order[$y] == 0) {
                $feedback_order_url .= '&select' . $x . '=char2';
            } else if (isset($feedback_order[$y]) and $feedback_order[$y] == 1) {
                $feedback_order_url .= '&select' . $x . '=char1';
            } else {
                $feedback_order_url .= '&select' . $x . '=char2';
            }
        }
        //單代理人
        if ($publisher_id == 19) {
            $computer_item = isset($computer_agent[0]) ? $computer_agent[0] : ''; //單代理人頭像選擇
            $url_path .= '&select=char2&select2=char2&select3=char2' . $feedback_talk_url . '&text7=MAT_' . self::$cs_id . sprintf("%02d", self::$paper_vol) . "_" . $selected_item . '&agent_role=' . $computer_item;
        }
        //多代理人
        if ($publisher_id == 20) {
            $url_path .= $feedback_order_url . $feedback_talk_url . '&text7=MAT_' . self::$cs_id . sprintf("%02d", self::$paper_vol) . "_" . $selected_item;
        }
        //雙代理人
        if ($publisher_id == 21) {
            $url_path .= $feedback_order_url . $feedback_talk_url . '&text7=MAT_' . self::$cs_id . sprintf("%02d", self::$paper_vol) . "_" . $selected_item;
        }

        return $url_path;
    }

    /**
     * 取得分析結果
     *
     */
    public static function get_analy_result()
    {
        $analy_result = null;//分析結果:correct、error
        $test_type = null;//試題的類型

        //先判定cs_id的種類在條件內
        $at_cs_id = array('01901', '01902', '02001', '01906', '01910');
        $ATCsID = substr(self::$cs_id, 0, 5);

        if (in_array($ATCsID, $at_cs_id))
        {
            $InputCode_at = explode("|", self::$InputCode);
            $at_answer_block_error = explode(ExamClass::_SPLIT_SYMBOL, self::$at_error);

            //取得試題類型，透過對應的分析器分析
            $temp_obj = ConceptItem::where('cs_id', self::$cs_id)
                ->where('paper_vol', self::$paper_vol)
                ->where('item_num', self::$item_num)
                ->get()
                ->first();
            if ($temp_obj) {
                $test_type = $temp_obj['at_test_type'];
            }

            if ($test_type == 'no_ans') {
                $analy_result = self::analy_no_ans();
            }

            return $analy_result;
        }

    }


    /**
     *  回傳 分析正確與錯誤時，下一個item_num的資料
     */
    public static function get_option_rule()
    {
        $return_data = array();
        $exam_paper_id = self::$cs_id . self::$paper_vol;
        $temp_obj = ConceptOptionRule::where('exam_paper_id', $exam_paper_id)
            ->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $item_num = $value['item_num'];
                $return_data[$item_num]['correct'] = $value['correct'];
                $return_data[$item_num]['error'] = $value['error'];
            }
        }

        return $return_data;
    }

    /**
     * 回傳item_num使用的filename
     *
     */
    public static function get_item_filename()
    {
        $return_data = array();
        $filenames = array();
        $item_num_array = array();
        $whereIn = array();
        $temp_obj = ConceptItem::leftJoin('mad_item', 'concept_item.item_sn', '=', 'mad_item.item_sn')
            ->where('concept_item.cs_id', self::$cs_id)
            ->select('concept_item.item_num', 'mad_item.mad_type_id')
            ->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $item_num_array[$value['item_num']] = $value['mad_type_id'];
                $whereIn[] = $value['mad_type_id'];
            }
        }

        $temp_obj = MadRule::whereIn('mad_type_id', $whereIn)
            ->select('mad_type_id', 'filename')
            ->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $filenames[$value['mad_type_id']] = substr($value['filename'], 0, -4);
            }
        }
        foreach ($item_num_array as $key => $value) {
            $return_data[$key] = $filenames[$value];
        }

        return $return_data;
    }

	/**
     * 分析規則 no_ans 不用作答。所以直接回傳正確
     *
     * @return string
     */
    public static function analy_no_ans()
    {
        // $at_answer_block = explode(_SPLIT_SYMBOL, $at_answer);
        //$_SESSION['user_stu_answer'] .= $InputCode_at[1]._SPLIT_SYMBOL;
       

        return 'correct';
    }
	

    /**
     * 分析規則 數學的加減乘除 區塊
     *
     * @return string
     */
    public static function analy_block()
    {
        // $at_answer_block = explode(_SPLIT_SYMBOL, $at_answer);
        //$_SESSION['user_stu_answer'] .= $InputCode_at[1]._SPLIT_SYMBOL;
        $InputCode_at = explode("|", self::$InputCode);
        $at_answer_block_error = explode(ExamClass::_SPLIT_SYMBOL, self::$at_error);
        $at_answer_block = explode(_SPLIT_SYMBOL, self::$at_answer);

        if (in_array(self::$InputCode_at[1], $at_answer_block)) {
            //echo "正確";
            $at_stu_answer_sol = 1;
            $selected_item_at = $response_at[$_SESSION['selected_item']][$at_stu_answer_sol];//從正確答案集中取得正確答案對應的item_num
            $_SESSION['selected_item_at'] = $selected_item_at;
        } else {
			//錯誤答案
            $at_stu_answer_sol = 0;
            $at_stu_bug_type = '';
            for ($n = 1; $n < count($at_answer_block_error); $n = $n + 2) {
                $inputconcept_at_64 = base64_decode($InputCode_at[1]);
                $inputconcept_at_64_error = base64_decode($at_answer_block_error[$n]);
                $pos = strpos("!@#" . $inputconcept_at_64, $inputconcept_at_64_error);
                if ($pos > 2) {
                    $at_stu_bug_type .= $at_answer_block_error[$n - 1] . _SPLIT_SYMBOL;
                } else {
                }
            }

            if ($at_stu_bug_type == '') {
                $at_stu_bug_type = "bug999" . _SPLIT_SYMBOL;
            }

            $_SESSION['$at_stu_bug_type'] = $at_stu_bug_type;
            $at_error_block = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);
            $at_stu_block = explode(_SPLIT_SYMBOL, $at_stu_bug_type);
            array_pop($at_stu_block);
            for ($block_n = 0; $block_n < count($at_error_block); $block_n = $block_n + 2) {
                $block_item_at[$at_error_block[$block_n]] = $at_error_block[$block_n + 1];//組合正確的錯誤資料陣列
            }

            $selected_item_at = $block_item_at[$at_stu_block[0]];//從錯誤資料陣列內找出要跳到那個item_num 
            $_SESSION['selected_item_at'] = $selected_item_at;

        }

        return 'correct';
    }

	/**
     * 分析規則 填充題
     *
     * @return string
     */
    public static function analy_comparison()
    {
        $at_choose = explode(ExamClass::_SPLIT_SYMBOL, self::$at_answer);//分割出正確答案
		$at_expection_error = explode("@XX@", self::$at_error);//分割出錯誤答案
		//$_SESSION['user_stu_answer'] .= $InputCode_at[1]._SPLIT_SYMBOL;//紀錄答案
		$InputCode_at = explode("|", self::$InputCode);

		if(in_array($InputCode_at[1] , $at_choose) AND !empty($InputCode_at[1])){
			$at_stu_answer_sol = 1;//正確 correct
			$ans_seqe = array_search($InputCode_at[1], $at_choose);
			$selected_item_at = explode(ExamClass::_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);//從正確答案集中取得正確答案對應的item_num
			//$_SESSION['selected_item_at'] = $selected_item_at[$ans_seqe];
		}else{
			$at_stu_answer_sol = 0; //錯誤 error
			//判斷是否在錯誤的資料集內
			if(array_search($InputCode_at[1], $at_expection_error)){
				$key = array_search($InputCode_at[1], $at_expection_error);
				$return_bug = $at_expection_error[$key-1];
				$at_stu_bug_type = $return_bug._SPLIT_SYMBOL;
				$_SESSION['$at_stu_bug_type'] = $at_stu_bug_type; 
				$at_error_block = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);//切割錯誤資料字串成陣列型態
				$return_key = array_search($return_bug , $at_error_block);//從錯誤資料陣列內找出要跳到那個item_num
				$selected_item_at = $at_error_block[$return_key+1];          
				$_SESSION['selected_item_at'] = $selected_item_at;
				$_SESSION['user_stu_answer_bin'] .= $at_stu_answer_sol._SPLIT_SYMBOL;              
			}else{
				$return_bug="bug500" ;
				$at_stu_bug_type = "bug500"._SPLIT_SYMBOL; 
				$_SESSION['$at_stu_bug_type'] = $at_stu_bug_type;
				$at_error_block = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]); //切割錯誤資料字串成陣列型態
				$return_key = array_search($return_bug , $at_error_block);//從錯誤資料陣列內找出要跳到那個item_num 
				$selected_item_at = $at_error_block[$return_key+1];           
				$_SESSION['selected_item_at'] = $selected_item_at;
				$_SESSION['user_stu_answer_bin'] .= $at_stu_answer_sol._SPLIT_SYMBOL;                                 
			} 
		}

        return 'correct';
    }
	
	/**
     * 分析規則 填充題
     *
     * @return string
     */
    public static function analy_block_4()
    {
		//存取學生答案
		$_SESSION['user_stu_answer'] .= $InputCode_at[0]._SPLIT_SYMBOL;

		//正確答案切割
		$at_answer_block = explode(_SPLIT_SYMBOL, $at_answer);
		//比對正確答案  ==> 已改成只讀取乘法答案
		for($stt =0 ; $stt < count($at_answer_block)-1; $stt++){
			if($at_answer_block[$stt] == $InputCode_at[0])
			{
				$at_stu_answer_sol = 1;
				$selected_item_at = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][1]);
				$_SESSION['selected_item_at'] = $selected_item_at[0];
				break;
			}else{
				$at_stu_answer_sol = 0;
			}
		}

		if($at_stu_answer_sol == 0){
			$_SESSION['selected_item_at'] = stu_error_type_stacked();
		}
		
        return 'correct';
    }	
	
	/**
     * 分析規則 填充題
     *
     * @return string
     */
    public static function analy_block_5()
    {
		//存取學生答案
		//$_SESSION['user_stu_answer'] .= $InputCode_at[0]._SPLIT_SYMBOL;

		//正確答案切割
		$at_answer_block = explode(_SPLIT_SYMBOL, $at_answer);

		//比對正確答案
		for($stt =0 ; $stt < count($at_answer_block)-1; $stt++){
			if($at_answer_block[$stt] == $InputCode_at[0])
			{
				$at_stu_answer_sol = 1;
				//$selected_item_at = $response_at[$_SESSION['selected_item']][1];
				$selected_item_at = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][1]);
				$_SESSION['selected_item_at'] = $selected_item_at[0];
				echo "YES";
				break;
			}else{
				echo "NO";
				$at_stu_answer_sol = 0;
			}
		}

		if($at_stu_answer_sol == 0){
			$_SESSION['selected_item_at'] = stu_error_type_stacked();
		}
		
        return 'correct';
    }

    /**
     * 領域名稱列表
     *
     * @return array 領域名稱資料(id=>名稱)
     */
    public static function subject_list()
    {
        $subject_list = array();
        $temp_obj = Subject::select('subject_id','name')->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $value){
                $subject_list[$value['subject_id']] = $value['name'];
            }
        }

        return $subject_list;
    }

    /**
     * 單元列表
     *
     */
    public static function unit_list()
    {
        $subject_list = self::subject_list();
        $unit_list = array();

        $temp_obj = ConceptInfo::select(
            'cs_sn',
            'cs_id',
            'publisher_id',
            'subject_id',
            'vol',
            'unit',
            'concept'
            )
            ->whereIn('publisher_id',array('19','20','21'))
            ->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $value){
                $value['subject_name'] = isset($subject_list[$value['subject_id']])?$subject_list[$value['subject_id']]:'';
                $unit_list[] = $value;
            }
        }

        return $unit_list;
    }

    /**
     * 取得一筆單元資料
     *
     * @param array $return_data
     */
    public static function get_unit($id)
    {
        $return_data = array();
        $temp_obj = ConceptInfo::select(
            'cs_sn',
            'cs_id',
            'publisher_id',
            'subject_id',
            'vol',
            'unit',
            'concept',
            'grade',
            'indicator_nums'
        )
            ->where('cs_sn',$id)
            ->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $unit_data){
                $return_data = $unit_data->toArray();
            }
        }

        return $return_data;
    }

    /**
     * 新增一筆單元資料
     *
     * @param array $insert_data 要新增的資料
     */
    public static function unit_add($insert_data)
    {
        $temp_obj = new ConceptInfo();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        //$temp_obj->cs_id =
        $temp_obj->save();

        return ;
    }

    /**
     * 更新一筆單元資料
     *
     * @param array $insert_data 要新增的資料
     */
    public static function unit_update($id,$insert_data)
    {
        $temp_obj = ConceptInfo::find($id);
        if($temp_obj){
            foreach ($insert_data as $key => $value){
                $temp_obj->$key = $value;
            }
            $temp_obj->save();
        }

        return ;
    }

    /**
     * 移除一個單元
     *
     * @param int/string $getID 要移除單元的id
     */
    public static function unit_delete($getID)
    {
        ConceptInfo::destroy($getID);

        return ;
    }
}
