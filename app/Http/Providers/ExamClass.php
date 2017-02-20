<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaperAccess;
use App\Http\Models\ExamPaper;
use App\Http\Models\ExamRecord;
use App\Http\Models\QuestionsItem;
use App\Http\Models\UnitList;
use App\Http\Models\ConceptItem;
use App\Http\Models\ConceptOptionRule;
use App\Http\Models\MadItem;
use App\Http\Models\MadRule;
use App\Http\Models\Subject;
use App\Http\Models\ConceptInfo;

class ExamClass
{
    const _SPLIT_SYMBOL = '@XX@';

    public static $url_path = 'http://210.240.188.161/chineseautotutor/Multi_Agent_test_show.php?a=b';
    public static $paper_id = null;
    public static $cs_id = null;
    public static $paper_vol = null;
    public static $item_num = null;
    public static $InputCode = null;//學生輸入的答案
    public static $at_error = null;//試題錯誤答案的集合
    public static $at_answer = null;//試題正確答案的集合
    public static $unit_id = null;//單元id
    public static $item_id = null;//試題id


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
        $has_test_data = array();//已經受測過得單元
        $temp_obj = ExamRecord::where('student_id', $mem_data['user_id'])->get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                $has_test_data[] = $value['unit_id'];
            }
        }

        $temp_obj = UnitList::get();
        if ($temp_obj) {
            foreach ($temp_obj as $value) {
                if(!in_array($value['id'], $has_test_data)){
                    $value['has_exam_record'] = true;
                }else{
                    $value['has_exam_record'] = false;
                }
                $list_data[] = $value;
            }
        }

        return $list_data;
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
            'id' => self::$item_id,
            'title' => null,
            'correct_answer' => null,
            'error_answer' => null,
            'load_module' => null,
            'iframe_path' => '',
        );
        $t = QuestionsItem::where('id',self::$item_id)->get();
        if($t){
            foreach ($t as $v){
                $return_data['title'] = $v['title'];
                $correct_answer = json_decode($v['correct_answer'],true);
                $return_data['correct_answer']['answer'] = $correct_answer[0]['answer'];
                $return_data['correct_answer']['jump'] = $correct_answer[1]['jump'];
                $return_data['correct_answer']['keyword'] = $correct_answer[2]['keyword'];
                $error_answer = json_decode($v['error_answer'],true);
                $return_data['error_answer']['answer'] = $error_answer[0]['answer'];
                $return_data['error_answer']['jump'] = $error_answer[1]['jump'];
                $return_data['error_answer']['number'] = $error_answer[2]['number'];
                $return_data['error_answer']['keyword'] = $error_answer[3]['keyword'];
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
        /*
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
*/
        return $return_data;
    }

    /**
     * 回傳模組item_num使用的filename
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
        $temp_obj = Subject::select('id','name')->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $value){
                $subject_list[$value['id']] = $value['name'];
            }
        }

        return $subject_list;
    }

    /**
     * 取得指定試卷的試題數量
     */
    public static function get_questions_item_nums($paper_obj)
    {
        $subject_list = array();
        $whereIn = array();
        foreach($paper_obj as $temp_array){
            foreach($temp_array as $value){
                $whereIn[] = $value['id'];
            }
        }
        if(count($whereIn) > 0){
            $subject_list = QuestionsItem::get_paper_item_num($whereIn);
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

        $temp_obj = UnitList::select(
            'id',
            'unit_key',
            'module_type',
            'subject',
            'vol',
            'grade',
            'unit',
            'title'
            )
            ->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $value){
                $value['subject_name'] = isset($subject_list[$value['subject']])?$subject_list[$value['subject']]:'';
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
        $temp_obj = UnitList::select(
            'id',
            'unit_key',
            'module_type',
            'subject',
            'vol',
            'unit',
            'title',
            'grade',
            'indicator_nums'
        )
            ->where('id',$id)
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
        $temp_obj = new UnitList();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
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
        $temp_obj = UnitList::find($id);
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
        UnitList::destroy($getID);

        return ;
    }

    /**
     * 取得單元列表內對應的試卷資料
     *
     *
     */
    public static function get_exam_paper_data($unit_data)
    {
        $exam_list = array();
        if(is_array($unit_data)){
            $where_in = array();
            foreach ($unit_data as $value){
                if(isset($value['id'])){
                    if(!in_array($value['id'],$where_in)){
                        $where_in[] = $value['id'];
                    }
                }
            }
            if(count($where_in) > 0){
                $temp_obj = ExamPaper::whereIn('unit_list_id',$where_in)->get();
                if($temp_obj){
                    foreach ($temp_obj as $v){
                        $exam_list[$v['unit_list_id']][] = $v;
                    }
                }
            }
        }

        return $exam_list;
    }

    /**
     * 取得一筆試卷資料
     *
     * @param array $return_data
     */
    public static function get_exam_paper($id)
    {
        $return_data = array();
        $temp_obj = ExamPaper::select(
            'id',
            'unit_list_id',
            'unit_key',
            'paper_vol',
            'item_num',
            'title',
            'img'
        )
            ->where('id',$id)
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
    * 新增一筆試卷資料
    *
    * @param array $insert_data 要新增的資料
    */
    public static function exampaper_add($insert_data)
    {
        $temp_obj = new ExamPaper();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        //$temp_obj->cs_id =
        $temp_obj->save();

        return ;
    }

    /**
     * 移除一個試卷
     *
     * @param int/string $getID 要移除單元的id
     */
    public static function exampaper_delete($getID)
    {
        ExamPaper::destroy($getID);

        return ;
    }


    /**
     * 取得 受測學生 觀看紀錄
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的單元資料
     */
    public static function get_review_data($mem_data)
    {
        $temp_obj = new ExamRecord();

        return $temp_obj->get_review_data($mem_data['user_id']);
    }

    /**
     * 新增 操作紀錄
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的單元資料
     */
    public static function set_exam_record($mem_id,$inputData)
    {
        $inputData['student_id'] = $mem_id;
        $temp_obj = new ExamRecord();
        $temp_obj->_init($inputData);
        $temp_obj->set_record();

        return '';
    }

    /**
     * 取得指定單元下的所有試卷資料
     */
    public static function get_paper_by_unit_id($unit_id){
        $return_data = array();
        $temp_obj = ExamPaper::where('unit_list_id',$unit_id)
                    ->select('id','title')
                    ->orderBy('id')
                    ->get();
        foreach ($temp_obj as $t){
            $return_data[] = $t['id'];
        }

        return $return_data;
    }

    /**
     * 取得試卷下的試題資料
     */
    public static function get_questions_item_paper_id($paper_id_array){
        $return_data = array();
        $temp_obj = QuestionsItem::whereIn('exam_paper_id',$paper_id_array)
            ->orderBy('id')
            ->get();
        foreach ($temp_obj as $t){
            $return_data[$t['exam_paper_id']][] = $t;
        }

        return $return_data;
    }

    /**
     *  取得單元操作紀錄
     */
    public static function get_exam_record($mem_id,$id)
    {
        $return_data = array();
        $temp_obj = ExamRecord::where('student_id', $mem_id['user_id'])
            ->where('unit_id',$id)
            ->select('id', 'unit_id', 'record')
            ->get();
        foreach ($temp_obj as $t){
            $return_data['id'] = $t['id'];
            $return_data['unit_id'] = $t['unit_id'];
            $return_data['record'] = json_decode($t['record'],true);
        }

        return $return_data;
    }
}
