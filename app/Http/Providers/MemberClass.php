<?php

namespace App\Http\Providers;

use App\Http\Models\MemberAdmin;
use App\Http\Models\MemberStudent;
use \Input;

class MemberClass
{
    public static $input_data = array();

    public static function _init(){
        $fp = Input::all();
        foreach ($fp as $key => $value){
            self::$input_data[$key] = $value;
        }
    }

    /**
     *  檢查學生登入的資料
     *
     *  @return array
     */
	public static function chk_login_data(){
        $return_data = array(
            'check_result' => false,
            'user_data' => array(),
        );
        if(isset(self::$input_data['username']) AND isset(self::$input_data['password']))
        {
            $user_id = self::$input_data['username'];
            $pass = md5(self::$input_data['password']);
            $tempObj = MemberStudent::where('login_name',$user_id)
                ->where('login_pw',$pass)
                ->get();
            if(count($tempObj) == 1){
                $user_data = array();
                foreach($tempObj as $v){
                    $user_data = array(
                        'user_id' => $v['id'],
                        'user_name' => $v['uname'],
                        'user_email' => $v['email'],
                        'school_grade' => $v['grade'],
                        'school_class' => $v['class'],
                        'organization_id' => $v['organization_id'],
                        'grade' => $v['grade'],
                        'class' => $v['class'],

                    );
                }
                $return_data['check_result'] = true;
                $return_data['user_data'] = $user_data;
            }
        }

		return $return_data;
	}	

    /**
     * 檢查是否為管理員登入
     *
     *  @return array
     */
    public static function chk_ad_login_data()
    {
        $return_data = array(
            'check_result' => false,
            'user_data' => array(),
        );
        if(isset(self::$input_data['username']) AND isset(self::$input_data['password']))
        {
            $user_id = self::$input_data['username'];
            $pass = base64_encode(self::$input_data['password']);
            $tempObj = MemberAdmin::where('login_name',$user_id)
                ->where('login_pw',$pass)
                ->get();
            if(count($tempObj) == 1){
                $user_data = array();
                foreach($tempObj as $v){
                    $user_data = array(
                        'login_name' => $v['login_name'],
                        'name' => $v['name']
                    );
                }
                $return_data['check_result'] = true;
                $return_data['user_data'] = $user_data;
            }
        }

		return $return_data;
    }


    //取得 測驗系統的資料 每頁 15 筆
	public static function getListData_teacher($request,$groupArray=array()){
		$tempObj = ExamList::whereIn('exam_type',array('quizzes','duankao'));
		if(count($groupArray) > 0){
			$tempObj = $tempObj->whereIn('exam_group',$groupArray);
		}
		$tempObj = $tempObj->orderBy('id','DESC')
		->paginate(15);
		
		return $tempObj;
	}	
	
	//取得 學生的測驗資料 每頁 15 筆
	public static function getTestListData($request){
		$tempObj = ExamTestDatas::where('student_id',$request->session()->get('userData')->id)
		->orderBy('id','DESC')
		->paginate(15);
		
		return $tempObj;
	}
	
	//取得 測驗系統的資料 以id為index值
	public static function getAllListData($request){
		$returnArray = array();
		$tempObj = ExamList::get();
		if(count($tempObj) >0 ){
			foreach( $tempObj as $v){
				$returnArray[$v->id] = $v;
			}
		}
		return $returnArray;
	}

	//取得 模擬考的資料 每頁 15 筆
	public static function getMockExamsListData($request){
		$tempObj = ExamList::where('exam_type','mock')->orderBy('id','ASC')
		->paginate(15);
		
		return $tempObj;
	}
	
	
	//取得 測驗系統 科目的資料 每頁 15 筆
	public static function getGroupNameData($request){
		$tempObj = ExamGroup::where('is_deleted','false')
		->orderBy('id','ASC')
		->paginate(15);
		
		return $tempObj;
	}

	//取得 測驗系統 錯誤試題回報列表 每頁 15 筆
	public static function getReportErrorListData($request){
		$tempObj = ExamReportError::orderBy('id','ASC')
		->paginate(15);
		
		return $tempObj;
	}
	
	//取得 學生尚未測驗的所有資料 by 篩選條件 
	public static function getNotExamsByCondition($request,$conditions=array()){
		
		$tempObj = ExamList::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		$hasTest = array();
		$tempObj2 = ExamTestDatas::where('student_id',$request->session()->get('userData')->id)
		->get();
		if(count($tempObj2) > 0){
			foreach($tempObj2 as $v){
				$hasTest[] = $v->list_id;
			}
			$tempObj = $tempObj->whereNotIn('id',$hasTest);
		}
		$tempObj = $tempObj->orderBy('begin_date','ASC')->get();
		
		return $tempObj;
	}
	
	
	//取得 測驗系統的資料 by 篩選條件
	public static function getListDataByCondition($request,$conditions=array()){
		$tempObj = ExamList::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
			$tempObj = $tempObj->get();
		return $tempObj;
	}
	
	//取得 測驗系統的試題列表資料
	public static function getExamsItemsListData($request,$conditions=array()){
		$tempObj = ExamItems::where('exam_list_id','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				if( $tempArray[0] == 'in'){
					$tempObj = $tempObj->whereIn($key,$tempArray[1]);
				}else{
					$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
				}
			}
		}
			$tempObj = $tempObj->orderBy('group_id','ASC')->orderBy('level_id','ASC')->paginate(15);
		return $tempObj;
	}

	//取得 測驗系統的單一試題資料
	public static function getExamsItemsData($request,$id){
		$returnData = array();
		$tempObj = ExamItems::where('id',$id)->get();
		if(count($tempObj) == 1){
			foreach($tempObj as $v){
				$returnData = $v;
			}
		}
		return $returnData;
	}	
	
	//取得 測驗列表資料 for 前端使用 堂堂考或是段段考
	public static function getListDataForUser(Request $request,$conditions=array())
	{
		$tempObj = ExamList::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		
		$tempObj = $tempObj->orderBy('id','DESC')->get();
		return $tempObj;
	}

	//取得 測驗列表資料 for 前端使用 模擬考
	public static function getMockListDataForUser(Request $request,$conditions=array())
	{
		$returnArray  = array();		
		$tempArray  = array();		
		$tempObj = ExamList::where('id','>','0')->where('exam_type','mock');
		if(count($conditions) > 0){
			foreach($conditions as $key => $v){
				$tempObj = $tempObj->where($key,$v[0],$v[1]);
			}
		}
		$tempObj = $tempObj->orderBy('id','DESC')->get();
		if(count($tempObj) >0){
			foreach($tempObj as $v){
				if($v->is_open == 'open'){
					$tempArray[$v->begin_date][] = $v;
				}else{
					if( $v->begin_date <= date("Y-m-d H:i") ){
						$tempArray[$v->begin_date][] = $v;
					}
				}
			}
			ksort($tempArray);
		}
		
		foreach($tempArray as $v){
			foreach($v as $v2){
				$returnArray[] = $v2;
			}
		}
		
		return $returnArray;
	}
	
	//取得 使用者所有受測資料
	public static function getAllTestData(Request $request,$studentId)
	{
		$tempObj = ExamTestDatas::where('student_id',$studentId)->get();
		return $tempObj;
	}	

	//回傳 是否指定學生是否有參加考試
	public static function getHasTestData(Request $request,$studentId,$listID)
	{
		$tempObj = ExamTestDatas::where('student_id',$studentId)
		->where('list_id',$listID)
		->get();
		if(count($tempObj) > 0){
			return true;
		}
		return false;
	}	
	
	//回傳 指定試題id的資料
	public static function getAnscontentData(Request $request,$whereInArray=array())
	{
		$returnArray = array();
		$tempObj = ExamItems::whereIn('id',$whereInArray)
		->get();
		if(count($tempObj) > 0){
			foreach($tempObj as $v){
				$returnArray[$v->id] = $v;
			}
		}
		return $returnArray;
	}	

	//回傳 指定條件的試題id
	public static function getItemsHtmlByCondition(Request $request,$levelIdArray=array(),$idArray = array(),$limitNum = 0,$random=true,$swQuestionIDs=array())
	{
		$returnDatas = array();
		$tempObj = ExamItems::where('id','>','0');
		if(count($levelIdArray) > 0){
			$tempObj = $tempObj->whereIn('level_id',$levelIdArray);
		}
		if(count($idArray) > 0){
			$tempObj = $tempObj->whereIn('id',$idArray);
		}
		
		$tempObj = $tempObj->take($limitNum)
		->get();
		
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){			
				$questions[] = array(
					'id'=>$v->id,
					'question'=>$v->question,
					'A'=>$v->A,
					'B'=>$v->B,
					'C'=>$v->C,
					'D'=>$v->D,
					'questionB'=>$v->questionB,					
					'answer'=>$v->answer,
					'degree_of_difficulty'=>$v->degree_of_difficulty,
				);
			}
			
			if($random){
				//隨機排列資料
				shuffle($questions);
				$returnDatas = $questions;
			}else{
				//依照試卷的試題順序排列
				$tempArray = array();
				foreach($swQuestionIDs as $v){
					$tempArray[$v] = array();
				}
				foreach($questions as $v){
					$tempArray[$v['id']] = $v;
				}
				foreach($tempArray as $v){
					$returnDatas[] = $v;
				}
				
			}
		}
		
		return $returnDatas;
	}		
	
	//取得 某一考試的所有成績資料
	public static function getOneTestAllData(Request $request,$getID)
	{
		$tempObj = ExamTestDatas::where('list_id',$getID)->get();
		return $tempObj;
	}	

	//取得 某一考試 指定學生的成績資料
	public static function getOneTestData(Request $request,$getID,$studentID)
	{
		$tempObj = ExamTestDatas::where('list_id',$getID)
		->where('student_id',$studentID)
		->get();
		return $tempObj;
	}	
	
	//取得 指定場次的學生考試紀錄 for  教師用
	public static function getExamTestRecord_teacher(Request $request,$listIDArray)
	{
		$tempObj = ExamTestDatas::whereIn('list_id',$listIDArray)->get();
		return $tempObj;
	}	

	
	//取得 單一測驗系統的資料
	public static function getExamData($request,$id){
		$returnDatas = array();
		
		$tempObj = ExamList::where('id',$id)->get();
		if(count($tempObj) == 1){
			foreach($tempObj as $v){
				$returnDatas['id'] = $v->id;
				$returnDatas['exam_mockgroup_id'] = $v->exam_mockgroup_id;
				$returnDatas['mock_key'] = $v->mock_key;
				$returnDatas['title'] = $v->title;
				$returnDatas['exam_type'] = $v->exam_type;
				$returnDatas['exam_group'] = $v->exam_group;//科目
				$returnDatas['exam_years'] = $v->exam_years;
				$returnDatas['test_time'] = $v->test_time;
				$returnDatas['begin_date'] = $v->begin_date;
				$returnDatas['end_date'] = $v->end_date;
				$returnDatas['score_publish_time'] = $v->score_publish_time;
				$returnDatas['total_numbers'] = $v->exam_question_counts;
				$examItems = json_decode($v->exam_scores);
				$returnDatas['totalScore'] = isset($examItems->totalScore)?$examItems->totalScore:'0';
				$returnDatas['trueOrFalse'] = isset($examItems->trueOrFalse)?$examItems->trueOrFalse:'0';
				$returnDatas['multipleChoice'] = isset($examItems->multipleChoice)?$examItems->multipleChoice:'0';
				$returnDatas['fillIn'] = isset($examItems->fillIn)?$examItems->fillIn:'0';
				$returnDatas['shortAnswer'] = isset($examItems->shortAnswer)?$examItems->shortAnswer:'0';
				$examLevel = json_decode($v->exam_level);
				$returnDatas['booklet'] = isset($examLevel->booklet)?$examLevel->booklet:array();
				$returnDatas['chapter'] = isset($examLevel->chapter)?$examLevel->chapter:array();
				$returnDatas['exam_level'] = isset($examLevel->exam_level)?$examLevel->exam_level:array();
				$returnDatas['exam_select'] = json_decode($v->exam_select);
				$totalSelects = json_decode($v->total_selects);
				$returnDatas['max_question_number'] = isset($totalSelects->max_question_number)?$totalSelects->max_question_number:'0';
				$returnDatas['easy_ratio'] = isset($totalSelects->easy_ratio)?$totalSelects->easy_ratio:'0';
				$returnDatas['middle_ratio'] = isset($totalSelects->middle_ratio)?$totalSelects->middle_ratio:'0';
				$returnDatas['hard_ratio'] = isset($totalSelects->hard_ratio)?$totalSelects->hard_ratio:'0';
				$returnDatas['easy_totals'] = isset($totalSelects->easy_totals)?$totalSelects->easy_totals:'0';
				$returnDatas['middle_totals'] = isset($totalSelects->middle_totals)?$totalSelects->middle_totals:'0';
				$returnDatas['hard_totals'] = isset($totalSelects->hard_totals)?$totalSelects->hard_totals:'0';
				$returnDatas['easy_set'] = isset($totalSelects->easy_set)?$totalSelects->easy_set:'0';
				$returnDatas['middle_set'] = isset($totalSelects->middle_set)?$totalSelects->middle_set:'0';
				$returnDatas['hard_set'] = isset($totalSelects->hard_set)?$totalSelects->hard_set:'0';
				$returnDatas['exam_from'] = json_decode($v->exam_from);

				
				
			}
		}
		
		return $returnDatas;
	}

	//取得 單一測驗系統 模擬考的資料
	public static function getMockExamData($request,$id){
		$returnDatas = array();
		
		$tempObj = ExamList::where('id',$id)
		->where('exam_type','mock')
		->get();
		if(count($tempObj) == 1){
			foreach($tempObj as $v){
				$returnDatas['id'] = $v->id;
				$returnDatas['title'] = $v->title;
				$returnDatas['exam_years'] = $v->exam_years;
				$returnDatas['test_time'] = $v->test_time;
				$returnDatas['begin_date'] = $v->begin_date;
				$returnDatas['end_date'] = $v->end_date;
				$returnDatas['score_publish_time'] = $v->score_publish_time;
				$returnDatas['total_numbers'] = $v->exam_question_counts;
				$examItems = json_decode($v->exam_scores);
				$returnDatas['totalScore'] = isset($examItems->totalScore)?$examItems->totalScore:'0';
				$returnDatas['trueOrFalse'] = isset($examItems->trueOrFalse)?$examItems->trueOrFalse:'0';
				$returnDatas['multipleChoice'] = isset($examItems->multipleChoice)?$examItems->multipleChoice:'0';
				$returnDatas['fillIn'] = isset($examItems->fillIn)?$examItems->fillIn:'0';
				$returnDatas['shortAnswer'] = isset($examItems->shortAnswer)?$examItems->shortAnswer:'0';
			}
			
			//取出模擬考得試題
			$tempObj = ExamItems::where('exam_list_id',$id)->get();
			if(count($tempObj) > 0){
				$returnDatas['items'] = $tempObj->toArray();
			}
		}
		
		return $returnDatas;
	}	
	
	//取得 指定模擬考的所有試題資料
	public static function getMockItems($request,$id){
		$tempObj = ExamItems::where('exam_list_id',$id)->orderBy('id','ASC')->get();
		if(count($tempObj) > 0){
			return $tempObj->toArray();
		}
		return array();
	}
	
	//取得 測驗系統的科目資料
	public static function getExamGroup($request,$conditions=array()){
		$tempObj = ExamGroup::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		$tempObj = $tempObj->orderBy('id','ASC')->get();
		
		return $tempObj;
	}
	
	//取得 測驗系統的科目名稱的資料
	public static function getExamGroupNames($request,$conditions=array()){
		$returnData = array();
		$tempObj = ExamGroup::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		$tempObj = $tempObj->orderBy('title','ASC')->get();
		
		if(count($tempObj) > 0){
			foreach($tempObj as $v){
				$returnData[$v->id] = $v->title;
			}
		}
		return $returnData;
	}	
	//取得 測驗系統 指定fatherid的子項目
	public static function getLevelChild($request,$groupID,$fatherID,$conditions=array()){
		$returnData = array();
		$tempObj = ExamLevel::where('group_id',$groupID)
		->where('father_id',$fatherID);
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		
		$tempObj = $tempObj->get();
		if(count($tempObj) >0){
			foreach($tempObj as $v){
				$returnData[] = array(
				'id'=>$v->id,
				'title'=>$v->title
				);
			}
		}
		return $returnData;
	}
	
	//取得 測驗系統 模擬考試題的數量資料
	public static function getMockItemCounts($request){
		$returnData = array();
		$tempObj = ExamItems::where('exam_list_id','>','0')
		->get();
		if(count($tempObj) >0){
			foreach($tempObj as $v){
				if(!isset($returnData[$v->exam_list_id])){
					$returnData[$v->exam_list_id] = 0;
				}
				$returnData[$v->exam_list_id]++;
			}
		}
		return $returnData;
	}
	
	//取得 模擬考科目名稱的資料
	public static function getMockGroupData($request){
		$getValue = array();
		$tempObj = ExamMockGroup::get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				$getValue[$v->id] = $v->title;
			}
		}
		
		return $getValue;
	}

	//更新 科目名稱的資料
	public static function setGroupName($request,$getID,$getName){
		$getValue = array();
		$tempObj = ExamGroup::find($getID);
		if(count($tempObj) > 0 ){
			$tempObj->title = $getName;
			$tempObj->save();
		}
		
		return ;
	}
	
	
	//取得 測驗章節的資料 by groupID
	public static function getLevelData($request,$groupIDArray,$conditions=array()){
		$getValue = array();
		$tempObj = ExamLevel::whereIn('group_id',$groupIDArray);
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		$tempObj = $tempObj->orderBy('group_id','ASC')
		->orderBy('father_id','ASC')
		->orderBy('id','ASC')
		->get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				$getValue[$v->group_id][$v->father_id][] = array(
					'id'=>$v->id,
					'name'=>$v->title,
				);
				
			}
		}
		
		return $getValue;
	}

	//取得 回傳指定章ID下面的節ID
	public static function getLevelByChapterID($request,$chapterID=0){
		$getValue = array();
		$tempObj = ExamLevel::where('father_id',$chapterID)
		->orderBy('id','ASC')
		->get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				$getValue[] = $v->id;
			}
		}
		
		return $getValue;
	}

	//取得 回傳指定冊ID下面的節ID
	public static function getLevelByBookletID($request,$bookletID=0){
		$getValue = array();
		$returnArray = array();
		$tempObj = ExamLevel::orderBy('id','ASC')
		->get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				$getValue[$v->father_id][] = array(
					'id'=>$v->id,
					'name'=>$v->title,
				);
				
			}
		
			if(isset($getValue[$bookletID]) and count($getValue[$bookletID]) > 0){
				foreach($getValue[$bookletID] as $booklets){
					$chapterID = $booklets['id'];
					if(isset($getValue[$chapterID]) and count($getValue[$chapterID]) > 0){
						foreach($getValue[$chapterID] as $v){
							$returnArray[] = $v['id'];
						}
					}
				}
			}
			
		}
		
		return $returnArray;
	}

	//取得 回傳指定科目ID下面的節ID
	public static function getLevelByGroupID($request,$groupID=0){
		$getValue = array();
		$returnArray = array();
		$tempObj = ExamLevel::orderBy('id','ASC')
		->get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				if( $v->group_id == $groupID ){
					$getValue[$v->father_id][] = array(
						'id'=>$v->id,
						'name'=>$v->title,
					);
				}
				
			}
			
			if(isset($getValue['0']) and count($getValue['0']) > 0){
				foreach($getValue['0'] as $booklets){
					$bookletID = $booklets['id'];
					if(isset($getValue[$bookletID]) and count($getValue[$bookletID]) > 0){
						foreach($getValue[$bookletID] as $chapters){
							$chapterID = $chapters['id'];
							if(isset($getValue[$chapterID]) and count($getValue[$chapterID]) > 0){
								foreach($getValue[$chapterID] as $v){
									$returnArray[] = $v['id'];
								}
							}
						}
					}
				}
			}
			
			
		}
		
		return $returnArray;
	}
	
	//取得 測驗章節的資料 by groupID
	public static function getAllLevelData($request,$conditions=array()){
		$getValue = array();
		$tempObj = ExamLevel::where('id','>','0');
		if(count($conditions) > 0){
			foreach($conditions as $key => $tempArray){
				$tempObj = $tempObj->where($key,$tempArray[0],$tempArray[1]);
			}
		}
		
		$tempObj = $tempObj->orderBy('group_id','ASC')
		->orderBy('title','ASC')
		->get();
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				$getValue[$v->id] = array(
					'father_id'=>$v->father_id,
					'group_id'=>$v->group_id,
					'title'=>$v->title,
					'is_deleted'=>$v->is_deleted,
				);
			}
		}
		
		return $getValue;
	}
	
	//取得 指定章節內 指定比率的試題資料
	public static function getLevelRatioData($request,$levelIDArray,$levelArray){
		$returnData = array(
			'easySetRatio'=>$levelArray['easySetRatio'],
			'middleSetRatio'=>$levelArray['middleSetRatio'],
			'hardSetRatio'=>$levelArray['hardSetRatio'],				
			'easyTotals'=>0,
			'middleTotals'=>0,
			'hardTotals'=>0,
			'easySystemSet'=>0,
			'middleSystemSet'=>0,
			'hardSystemSet'=>0,
			'testData'=>array(),
		);
		
		$easyData = array();
		$middleData = array();
		$hardData = array();
		$getEasyCount = 0;
		$getMiddleCount = 0;
		$getHardCount = 0;
		
		
		
		//根據試題需求數量以及難易度比率，取得各難易度需要的試題數量
		$totalNeeds = $levelArray['totalNeeds'];
		$tempCount = 0;
		$easySetRatio = $levelArray['easySetRatio'];
		$middleSetRatio = $levelArray['middleSetRatio'];
		$hardSetRatio = $levelArray['hardSetRatio'];
		$examFrom = $levelArray['examFrom'];
		
		if( $easySetRatio > 0 ){
			$getEasyCount = ($easySetRatio/100)*$totalNeeds;
			$getEasyCount = floor($getEasyCount);
			
			
			$returnData['easySystemSet'] = $getEasyCount;
			
			$tempCount += $getEasyCount;
		}
		if( $middleSetRatio > 0 ){
			$getMiddleCount = ($middleSetRatio/100)*$totalNeeds;
			$getMiddleCount = floor($getMiddleCount);
			
			$returnData['middleSystemSet'] = $getMiddleCount;
			
			$tempCount += $getMiddleCount;

		}
		if( $hardSetRatio > 0 ){
			$getHardCount = ($hardSetRatio/100)*$totalNeeds;
			$getHardCount = floor($getHardCount);
			$returnData['hardSystemSet'] = $getHardCount;
			
			$tempCount += $getHardCount;

		}
		
		if($tempCount < $totalNeeds){
			if( $easySetRatio > 0 ){
				$getEasyCount++;
				$returnData['easySystemSet']++;
			}else if( $middleSetRatio > 0 ){
				$getMiddleCount++;
				$returnData['middleSystemSet']++;
			}else if( $hardSetRatio > 0 ){
				$getHardCount++;
				$returnData['hardSystemSet']++;
			}
		}
		
		$tempObj = ExamItems::where('is_deleted','=','false')
		->whereIn('level_id',$levelIDArray)
		->whereIn('exam_from',$examFrom)
		->get();
		
		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){
				if($v->degree_of_difficulty == 1){//難
					$hardData[] = array(
						'id'=>$v->id,
						'question'=>$v->question,
						'A'=>$v->A,
						'B'=>$v->B,
						'C'=>$v->C,
						'D'=>$v->D,
						'answer'=>$v->answer,
						'degree_of_difficulty'=>$v->degree_of_difficulty,
					);
					$returnData['hardTotals']++;
					
				}
				if($v->degree_of_difficulty == 2){//中
					$middleData[] = array(
						'id'=>$v->id,
						'question'=>$v->question,
						'A'=>$v->A,
						'B'=>$v->B,
						'C'=>$v->C,
						'D'=>$v->D,
						'answer'=>$v->answer,
						'degree_of_difficulty'=>$v->degree_of_difficulty,						
					);
					$returnData['middleTotals']++;

				}
				if($v->degree_of_difficulty == 3){//易
					
					$easyData[] = array(
						'id'=>$v->id,
						'question'=>$v->question,
						'A'=>$v->A,
						'B'=>$v->B,
						'C'=>$v->C,
						'D'=>$v->D,
						'questionB'=>$v->questionB,						
						'answer'=>$v->answer,
						'degree_of_difficulty'=>$v->degree_of_difficulty,						
					);
					$returnData['easyTotals']++;
				}
				
			}
			
			if( $getEasyCount > 0 ){
				if(count($easyData) > 0){
					shuffle($easyData);//陣列隨機重排序
					for( $x=0;$x<$getEasyCount; $x++){
						if(isset($easyData[$x])){
							$returnData['testData'][] = $easyData[$x];
						}
					}	
				}else{
					$returnData['easySystemSet'] = 0;
					$returnData['middleSetRatio'] += $returnData['easySetRatio'];
					$returnData['easySetRatio'] = 0;

					$returnData['middleSystemSet'] += $getEasyCount;
					$getMiddleCount = $getMiddleCount + $getEasyCount;
				}
			}

			if( $getMiddleCount > 0 ){
				if(count($middleData) > 0){
					shuffle($middleData);//陣列隨機重排序
					for( $x=0;$x<$getMiddleCount; $x++){
						if(isset($middleData[$x])){
						$returnData['testData'][] = $middleData[$x];
						}
					}	
				}else{
					$returnData['middleSystemSet'] = 0;
					$returnData['hardSetRatio'] += $returnData['middleSetRatio'];
					$returnData['middleSetRatio'] = 0;
					$returnData['hardSystemSet'] += $getMiddleCount;
					$getHardCount = $getHardCount + $getMiddleCount;
				}					
					
			}
			
			if( $getHardCount > 0 ){
				if(count($hardData) > 0){				
					shuffle($hardData);//陣列隨機重排序
					for( $x=0;$x<$getHardCount; $x++){
						if(isset($hardData[$x])){
						$returnData['testData'][] = $hardData[$x];
						}
					}	
				}else{
					$returnData['hardSetRatio'] = 0;					
					$returnData['hardSystemSet'] = 0;					
				}				
			}
			
			//最後在隨機打亂題目
			shuffle($returnData['testData']); 
		}
		
		return $returnData;
	}	
	
	
	
	//更新 指定考試資料
	public static function setExamsData(Request $request,$fp){
		$fp = Input::all();
		
		if(isset($fp['id']) and is_numeric($fp['id']) and $fp['id'] > 0 ){
			//更新資料
			$update = ExamList::find($fp['id']);			
			$update->title = $fp['title'];
			$update->exam_type = $fp['exam_type'];
			$update->begin_date = $fp['begin_date'].' '.$fp['begin_time'];
			$update->end_date = $fp['end_date'].' '.$fp['end_time'];
			$update->score_publish_time = $fp['score_publish_time'].' '.$fp['publish_time'];
			$update->test_time = $fp['test_time'];
			$update->exam_group = $fp['exam_group'];//科目
			$update->exam_question_counts = $fp['total_numbers'];//測驗題數
			$update->exam_years = $fp['exam_years'];//測驗題數
			$update->exam_from = json_encode($fp['exam_from']);//出處
			
			
			$exam_scores = array(
				'totalScore'=>0,
				'trueOrFalse'=>0,
				'multipleChoice'=>0,
				'fillIn'=>0,
				'shortAnswer'=>0,
			);
			
			if(isset($fp['totalScore']) and is_numeric($fp['totalScore']) ){
				$exam_scores['totalScore'] = $fp['totalScore'];
			}
			if(isset($fp['trueOrFalse']) and is_numeric($fp['trueOrFalse']) ){
				$exam_scores['trueOrFalse'] = $fp['trueOrFalse'];
			}
			if(isset($fp['multipleChoice']) and is_numeric($fp['multipleChoice']) ){
				$exam_scores['multipleChoice'] = $fp['multipleChoice'];
			}
			if(isset($fp['fillIn']) and is_numeric($fp['fillIn']) ){
				$exam_scores['fillIn'] = $fp['fillIn'];
			}
			if(isset($fp['shortAnswer']) and is_numeric($fp['shortAnswer']) ){
				$exam_scores['shortAnswer'] = $fp['shortAnswer'];
			}
			$update->exam_scores = json_encode($exam_scores);//總分、分數分配
			
			$exam_level = array(
				'booklet'=>array(),
				'chapter'=>array(),
				'exam_level'=>array(),
			);
			
			if(isset($fp['booklet']) and is_array($fp['booklet']) ){
				$exam_level['booklet'] = $fp['booklet'];
			}
			if(isset($fp['chapter']) and is_array($fp['chapter']) ){
				$exam_level['chapter'] = $fp['chapter'];
			}
			if(isset($fp['exam_level']) and is_array($fp['exam_level']) ){
				$exam_level['exam_level'] = $fp['exam_level'];
			}
			$update->exam_level = json_encode($exam_level);//章節
			$update->total_selects = $fp['total_selects'];
			$update->exam_select = $fp['exam_select'];
			
			
			$update->save();
			$getID  = $update->id;
			//處理上傳檔案
			/* $files = Input::file('filePath');
			if(count($files) > 0 and $files != null){
				$lists = Stylecontroller::uploadFile($files,$getID,'file_path');
			} */
			
		}else{
			
			//新增資料
			$add = new ExamList();			
			$add->title = $fp['title'];
			$add->exam_type = $fp['exam_type'];
			$add->begin_date = $fp['begin_date'].' '.$fp['begin_time'];
			$add->end_date = $fp['end_date'].' '.$fp['end_time'];
			$add->score_publish_time = $fp['score_publish_time'].' '.$fp['publish_time'];
			$add->test_time = $fp['test_time'];
			$add->exam_group = $fp['exam_group'];//科目
			$add->exam_question_counts = $fp['total_numbers'];//測驗題數
			$add->exam_years = $fp['exam_years'];//測驗題數
			$add->exam_from = json_encode($fp['exam_from']);//出處
		
			
			$exam_scores = array(
				'totalScore'=>0,
				'trueOrFalse'=>0,
				'multipleChoice'=>0,
				'fillIn'=>0,
				'shortAnswer'=>0,
			);
			
			if(isset($fp['totalScore']) and is_numeric($fp['totalScore']) ){
				$exam_scores['totalScore'] = $fp['totalScore'];
			}
			if(isset($fp['trueOrFalse']) and is_numeric($fp['trueOrFalse']) ){
				$exam_scores['trueOrFalse'] = $fp['trueOrFalse'];
			}
			if(isset($fp['multipleChoice']) and is_numeric($fp['multipleChoice']) ){
				$exam_scores['multipleChoice'] = $fp['multipleChoice'];
			}
			if(isset($fp['fillIn']) and is_numeric($fp['fillIn']) ){
				$exam_scores['fillIn'] = $fp['fillIn'];
			}
			if(isset($fp['shortAnswer']) and is_numeric($fp['shortAnswer']) ){
				$exam_scores['shortAnswer'] = $fp['shortAnswer'];
			}
			$add->exam_scores = json_encode($exam_scores);//總分、分數分配
			
			$exam_level = array(
				'booklet'=>array(),
				'chapter'=>array(),
				'exam_level'=>array(),
			);
			
			if(isset($fp['booklet']) and is_array($fp['booklet']) ){
				$exam_level['booklet'] = $fp['booklet'];
			}
			if(isset($fp['chapter']) and is_array($fp['chapter']) ){
				$exam_level['chapter'] = $fp['chapter'];
			}
			if(isset($fp['exam_level']) and is_array($fp['exam_level']) ){
				$exam_level['exam_level'] = $fp['exam_level'];
			}
			$add->exam_level = json_encode($exam_level);//章節
			$add->total_selects = $fp['total_selects'];
			$add->exam_select = $fp['exam_select'];
			
			$add->save();
			$getID  = $add->id;
				
		}
		return '';
	}

	//更新 試題資料
	public static function setItemsExams(Request $request,$fp){
		$fp = Input::all();
		
		if(isset($fp['id']) and is_numeric($fp['id']) and $fp['id'] > 0 ){
			//更新資料
			$update = ExamItems::find($fp['id']);			
			$update->question = $fp['question'];
			$update->A = $fp['ans_A'];
			$update->B = $fp['ans_B'];
			$update->C = $fp['ans_C'];
			$update->D = $fp['ans_D'];
			$update->answer = $fp['answer'];
			if(isset($fp['questionB'])){
				$update->questionB = $fp['questionB'];
			}			
			$update->anscontent = $fp['anscontent'];
			$update->save();
			$getID  = $update->id;
		}else{
			//新增資料
			$update = new ExamItems();
			$update->group_id = $fp['group_id'];
			$update->level_id = $fp['level_id'];
			$update->degree_of_difficulty = $fp['degree_of_difficulty'];
			$update->order_num = $fp['order_num'];
			$update->item_type = '2';
			$update->question = $fp['question'];
			$update->A = $fp['ans_A'];
			$update->B = $fp['ans_B'];
			$update->C = $fp['ans_C'];
			$update->D = $fp['ans_D'];
			$update->answer = $fp['answer'];
			if(isset($fp['questionB'])){
				$update->questionB = $fp['questionB'];
			}
			$update->anscontent = $fp['anscontent'];
			$update->save();
			$getID  = $update->id;
			
		}
		return '';
	}
	
	
	//更新 模擬考的考試資料
	public static function setMockExams(Request $request,$fp){
		require_once base_path('vendor/pclzip/pclzip/pclzip.lib.php');//載入zip解壓縮
		
		$fp = Input::all();
		
		if(isset($fp['id']) and is_numeric($fp['id']) and $fp['id'] > 0 ){
			//更新資料
			$update = ExamList::find($fp['id']);			
			$update->title = $fp['title'];
			$update->score_publish_time = $fp['score_publish_time'].' '.$fp['publish_time_h'].':'.$fp['publish_time_i'];
			$update->exam_years = $fp['exam_years'];//測驗題數
			$update->save();
			$getID  = $update->id;
			
		}else{
			//根據勾選科目新增資料
			$getMicrotime = explode(' ', microtime());
			for($x=1;$x<9;$x++){
				if( isset($fp['mockType']) and in_array($x,$fp['mockType']) ){
				//新增資料
				$add = new ExamList();
				$add->mock_key = $getMicrotime[1];				
				$add->exam_mockgroup_id	= $x;			
				$add->title = $fp['title'];
				$add->exam_type = 'mock';
				$add->begin_date = $fp['begin_date_'.$x].' '.$fp['begin_time_'.$x.'_h'].':'.$fp['begin_time_'.$x.'_i'];
				$add->end_date = $fp['end_date_'.$x].' '.$fp['end_time_'.$x.'_h'].':'.$fp['end_time_'.$x.'_i'];
				$add->score_publish_time = $fp['score_publish_time'].' '.$fp['publish_time_h'].':'.$fp['publish_time_i'];
				$add->exam_years = $fp['exam_years'];//測驗年級
				$add->test_time = $fp['test_time_'.$x];//測驗時間
				$exam_scores = array(
					'totalScore' =>$fp['totalScore_'.$x],
					'distribution' => array(),
				);
				
				if( $x == 1){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_1_1'],
						'totalScore'=>$fp['fraction_1_1'],
					);
				}
				if( $x == 2){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_2_1'],
						'totalScore'=>$fp['fraction_2_1'],
					);
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_2_2'],
						'totalScore'=>$fp['fraction_2_2'],
					);
				}
				if( $x == 3){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_3_1'],
						'totalScore'=>$fp['fraction_3_1'],
					);
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_3_2'],
						'totalScore'=>$fp['fraction_3_2'],
					);
				}
				if( $x == 4){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_4_1'],
						'totalScore'=>$fp['fraction_4_1'],
					);
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_4_2'],
						'totalScore'=>$fp['fraction_4_2'],
					);
				}
				if( $x == 5){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_5_1'],
						'totalScore'=>$fp['fraction_5_1'],
					);
				}
				if( $x == 6){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_6_1'],
						'totalScore'=>$fp['fraction_6_1'],
					);
				}
				if( $x == 7){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_7_1'],
						'totalScore'=>$fp['fraction_7_1'],
					);
				}
				if( $x == 8){
					$exam_scores['distribution'][] = array(
						'count'=>$fp['QuestionsNum_8_1'],
						'totalScore'=>$fp['fraction_8_1'],
					);
				}
				$add->exam_scores = json_encode($exam_scores);
				$add->save();
				$getID  = $add->id;
			
			//上傳zip的資料
			if ($request->hasFile('upzip_'.$x)) {
					$uploadFileName = $request->file('upzip_'.$x)->getClientOriginalName();
					$uploadFileName = iconv("UTF-8", "big5", $uploadFileName);
					$mtime = explode(" ", microtime());
					$startTime = $mtime[1].substr($mtime[0],2);
					$new_name =  $startTime;//新的圖片目錄名稱
					$uploadfile = "upload";
					$request->file('upzip_'.$x)->move($uploadfile,$new_name.".zip");//搬移檔案

					//產生解壓縮後存放的目錄
					$destination_path_zip = 'upfile/'.date("Ymd");
					if (!file_exists($destination_path_zip)) {
					mkdir($destination_path_zip, 0777);
					}
					$destination_path_zip = 'upfile/'.date("Ymd")."/".$new_name;
					if (!file_exists($destination_path_zip)) {
					mkdir($destination_path_zip, 0777);
					}

					//解壓縮zip擋到upfile裡面
					$archive = new PclZip("upload/".$new_name.'.zip');// PclZip
					$file_list = $archive->extract(PCLZIP_OPT_PATH, $destination_path_zip, PCLZIP_OPT_REMOVE_ALL_PATH);

					//找htm檔名
					if (is_dir($destination_path_zip)) {

					if ($dh = opendir($destination_path_zip)) {
					while (($file = readdir($dh)) !== false) {
					if (strpos( $file, '.htm') ){
					$html_file_name = $file;//找出上傳htm的檔名
					}
					}
					closedir($dh);
					}
					}	

					//如果有找到htm就開始讀檔
					if($html_file_name > ''){
					rename($destination_path_zip."/".$html_file_name,$destination_path_zip."/".$new_name.".htm");


					$name_array = explode(".",$request->file('upzip_'.$x)->getClientOriginalName());
					$homepage = (String)file_get_contents($destination_path_zip."/".$new_name.".htm");
					$name_array[0] = str_replace(" ","%20",$name_array[0]);
					$newcon = str_replace($name_array[0].".files",'/'.$destination_path_zip,$homepage);//讀取htm檔案內容，並調整img的src路徑
					file_put_contents($destination_path_zip."/".$new_name."_n.htm",$newcon);

					//處理html
					$nowdate =  date("Y-m-d H:i",time());
					$html = new Htmldom($destination_path_zip."/".$new_name."_n.htm");

					$mysqlInsertArray = array();//大量 insert to sql的陣列
					$checkTypeArray = array();
					$OrderNumArray = array();


					//取出所有的 科目、冊、章、節 資料

					$examGroups = array();
					$examLevels = array();	
					$examLevel_one = array();//冊
					$examLevel_two = array();//章
					$examLevel_three = array();//節

					$examGroup = ExamGroup::get();
					if(count($examGroup) > 0){
					foreach($examGroup as $v){
					$examGroups[$v->title] = $v->id;
					}
					}

					$tempObj = ExamLevel::get();

					if(count($tempObj) > 0){

					foreach($tempObj as $v){
					$examLevels[$v->id] = array(
					'id'=>$v->id,
					'group_id'=>$v->group_id,
					'father_id'=>$v->father_id,
					'title'=>$v->title,

					);
					}

					foreach($examLevels as $v){
					$id = $v['id'];
					$groupId = $v['group_id'];
					$fatherId = $v['father_id'];
					$title = $v['title'];

					if( $fatherId == 0 ){
					$examLevel_one[$groupId][$title] = $id;
					}else{
					$tempFatherID = $examLevels[$fatherId]['father_id'];
					if($tempFatherID == 0){
					$examLevel_two[$groupId][$title] = $id;
					}
					if($tempFatherID > 0){
					$examLevel_three[$groupId][$title] = $id;
					}
					}

					}
					}



					foreach($html->find('table') as $element){
					$element_num = 1;//題目A
					if($element->children(1)->tag != "p"){
					$trMaxNum =count($element->children);
					for($tr_num=0; $tr_num < $trMaxNum ;$tr_num++){//tr
					$dsc = "";
					$tr_element = $element->children[$tr_num];
					$data[0]="";//編號
					$data[1]="";//來源
					$data[2]="";//科目
					$data[3]="";//題型(1.是非2.選擇3.填充4.問答)
					$data[4]="";//難易度(1.難2.中3.易)
					$data[5]="";//冊
					$data[6]="";//章
					$data[7]="";//節
					$data[8]="";//題目A
					$data[9]="";//A
					$data[10]="";//B
					$data[11]="";//C
					$data[12]="";//D
					$data[13]="";//題目B
					$data[14]="";//答案
					$data[15]="";//解析
					$data[16]="";//年度 =>目前不匯入
					$data[17]="";//答對人數=>目前不匯入
					$data[18]="";//作答人數=>目前不匯入
					$data[19]="";//備註=>目前不匯入
					$maxTdNum = count($tr_element->children);

					for($td_num=0;$td_num < $maxTdNum;$td_num++){//tr
					switch($td_num){
					case "0"://編號
					$text_value = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					$dsc = $text_value;					
					$dsc_1 = $text_value;
					$data[0] = $text_value;
					$data[0] = str_replace("&nbsp;","",$data[0]);
					$OrderNumArray[] = $data[0];
					break;
					case "1"://來源
					$data[1] = addslashes($tr_element->children[$td_num]->innertext);
					$data[1] = str_replace('class=MsoNormal', '', $data[1]);
					$data[1] = str_replace('class=MsoBodyText', '', $data[1]);
					$data[1] = strip_tags($data[1],'<img>');					
					$data[1] = str_replace("&nbsp;","",$data[1]);
					$data[1] = str_replace(" ","",$data[1]);
					$data[1] = str_replace("((","",$data[1]);
					$data[1] = str_replace("))","",$data[1]);
					$data[1] = str_replace("(","",$data[1]);
					$data[1] = str_replace(")","",$data[1]);
					break;
					case "2"://科目
					$data[2] = addslashes($tr_element->children[$td_num]->innertext);
					$data[2] = str_replace('class=MsoNormal', '', $data[2]);
					$data[2] = str_replace('class=MsoBodyText', '', $data[2]);
					$data[2] = strip_tags($data[2],'<img>');					
					$data[2] = str_replace("&nbsp;","",$data[2]);
					$data[2] = str_replace(" ","",$data[2]);
					break;
					case "3"://題型(1.是非2.選擇3.填充4.問答)
					$data[3] = addslashes($tr_element->children[$td_num]->innertext);
					$data[3] = str_replace('class=MsoNormal', '', $data[3]);
					$data[3] = str_replace('class=MsoBodyText', '', $data[3]);
					$data[3] = strip_tags($data[3],'<img>');	
					$data[3] = str_replace("&nbsp;","",$data[3]);
					$data[3] = str_replace(" ","",$data[3]);
					$data[3] = str_replace("((","",$data[3]);
					$data[3] = str_replace("))","",$data[3]);
					$data[3] = str_replace("(","",$data[3]);
					$data[3] = str_replace(")","",$data[3]);
					break;
					case "4"://難易度(1.難2.中3.易)
					$data[4] = addslashes($tr_element->children[$td_num]->innertext);
					$data[4] = str_replace('class=MsoNormal', '', $data[4]);
					$data[4] = str_replace('class=MsoBodyText', '', $data[4]);
					$data[4] = strip_tags($data[4],'<img>');	
					$data[4] = str_replace("&nbsp;","",$data[4]);
					$data[4] = str_replace(" ","",$data[4]);
					$data[4] = str_replace("((","",$data[4]);
					$data[4] = str_replace("))","",$data[4]);
					$data[4] = str_replace("(","",$data[4]);
					$data[4] = str_replace(")","",$data[4]);
					break;
					case "5"://冊
					$data[5] = addslashes($tr_element->children[$td_num]->innertext);
					$data[5] = str_replace('class=MsoNormal', '', $data[5]);
					$data[5] = str_replace('class=MsoBodyText', '', $data[5]);
					$data[5] = strip_tags($data[5],'<img>');	
					$data[5] = str_replace("&nbsp;","",$data[5]);
					$data[5] = str_replace(" ","",$data[5]);
					break;
					case "6"://章
					$data[6] = addslashes($tr_element->children[$td_num]->innertext);
					$data[6] = str_replace('class=MsoNormal', '', $data[6]);
					$data[6] = str_replace('class=MsoBodyText', '', $data[6]);
					$data[6] = strip_tags($data[6],'<img>');	
					$data[6] = str_replace("&nbsp;","",$data[6]);
					$data[6] = str_replace(" ","",$data[6]);
					break;
					case "7"://節
					$data[7] = addslashes($tr_element->children[$td_num]->innertext);
					$data[7] = str_replace(" ","",$tr_element->children[$td_num]->innertext);
					$data[7] = str_replace('class=MsoNormal', '', $data[7]);
					$data[7] = str_replace('class=MsoBodyText', '', $data[7]);
					$data[7] = strip_tags($data[7],'<img>');	
					$data[7] = str_replace("&nbsp;","",$data[7]);
					$data[7] = str_replace(" ","",$data[7]);
					break;
					case "8"://題目A
					$data[8] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[8] = str_replace('class=MsoNormal', '', $data[8]);
					$data[8] = str_replace('class=MsoBodyText', '', $data[8]);
					$data[8] = strip_tags($data[8],'<span><img>');						/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[8] = str_replace('lang=EN-US', '', $data[8]);
					$data[8] = strip_tags($data[8],'<img>');
					$data[8] = str_replace("&nbsp;","",$data[8]);

					break;
					case "9"://A
					$data[9] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[9] = str_replace('class=MsoNormal', '', $data[9]);
					$data[9] = str_replace('class=MsoBodyText', '', $data[9]);
					$data[9] = strip_tags($data[9],'<span><img>');	
					$data[9] = strip_tags($data[9],'<img>');
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[9] = str_replace('lang=EN-US', '', $data[9]);
					$data[9] = str_replace("&nbsp;","",$data[9]);
					//$data[9] = str_replace(" ","",$data[9]);
					//去掉開始和結束的空白

					$data[9] = trim($data[9]);

					// Now remove any doubled-up whitespace

					//去掉跟隨別的擠在一塊的空白

					//$data[9] = preg_replace('/\s(?=\s)/', '', $data[9]);

					// Finally, replace any non-space whitespace, with a space

					//最後，去掉非space 的空白，用一個空格代替

					$data[9] = preg_replace('/[\n\r\t]/', ' ', $data[9]);

					break;
					case "10"://B
					$data[10] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[10] = str_replace('class=MsoNormal', '', $data[10]);
					$data[10] = str_replace('class=MsoBodyText', '', $data[10]);
					$data[10] = strip_tags($data[10],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[10] = str_replace('lang=EN-US', '', $data[10]);
					$data[10] = strip_tags($data[10],'<img>');
					$data[10] = str_replace("&nbsp;","",$data[10]);
					//$data[10] = str_replace(" ","",$data[10]);
					$data[10] = trim($data[10]);
					$data[10] = preg_replace('/[\n\r\t]/', ' ', $data[10]);
					break;
					case "11"://C
					$data[11] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[11] = str_replace('class=MsoNormal', '', $data[11]);
					$data[11] = str_replace('class=MsoBodyText', '', $data[11]);
					$data[11] = strip_tags($data[11],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[11] = str_replace('lang=EN-US', '', $data[11]);
					$data[11] = strip_tags($data[11],'<img>');
					$data[11] = str_replace("&nbsp;","",$data[11]);
					//$data[11] = str_replace(" ","",$data[11]);
					$data[11] = trim($data[11]);
					$data[11] = preg_replace('/[\n\r\t]/', ' ', $data[11]);
					break;
					case "12"://D
					$data[12] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[12] = str_replace('class=MsoNormal', '', $data[12]);
					$data[12] = str_replace('class=MsoBodyText', '', $data[12]);
					$data[12] = strip_tags($data[12],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[12] = str_replace('lang=EN-US', '', $data[12]);
					$data[12] = strip_tags($data[12],'<img>');
					$data[12] = str_replace("&nbsp;","",$data[12]);
					//$data[12] = str_replace(" ","",$data[12]);
					$data[12] = trim($data[12]);
					$data[12] = preg_replace('/[\n\r\t]/', ' ', $data[12]);
					break;
					case "13"://題目B
					$data[13] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[13] = str_replace('class=MsoNormal', '', $data[13]);
					$data[13] = str_replace('class=MsoBodyText', '', $data[13]);
					$data[13] = strip_tags($data[13],'<span><img>');						/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[13] = str_replace('lang=EN-US', '', $data[13]);
					$data[13] = strip_tags($data[13],'<img>');
					$data[13] = str_replace("&nbsp;","",$data[13]);

					break;
					case "15"://提示
					$data[15] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[15] = str_replace('class=MsoNormal', '', $data[15]);
					$data[15] = str_replace('class=MsoBodyText', '', $data[15]);
					$data[15] = strip_tags($data[15],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[15] = str_replace('lang=EN-US', '', $data[15]);
					$data[15] = strip_tags($data[15],'<img>');
					$data[15] = str_replace("&nbsp;","",$data[15]);
					break;
					case "14"://答案
					if($data[3]!=1&&$data[3]!=2){

					$data[14] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[14] = str_replace('class=MsoNormal', '', $data[14]);
					$data[14] = str_replace('class=MsoBodyText', '', $data[14]);
					$data[14] = strip_tags($data[14],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[14] = str_replace('lang=EN-US', '', $data[14]);
					$data[14] = strip_tags($data[14],'<img>');
					//$data[14] = str_replace("&nbsp;","",$data[14]);
					$data[14] = str_replace("((","",$data[14]);
					$data[14] = str_replace("))","",$data[14]);
					$data[14] = str_replace("(","",$data[14]);
					$data[14] = str_replace(")","",$data[14]);
					//$data[14] = str_replace(" ","",$data[14]);
					}else{
					$data[14] = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					//$data[$td_num] = $text_value;
					$data[14] = str_replace('class=MsoNormal', '', $data[14]);
					$data[14] = str_replace('class=MsoBodyText', '', $data[14]);
					$data[14] = strip_tags($data[14],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[14] = str_replace('lang=EN-US', '', $data[14]);
					$data[14] = strip_tags($data[14],'<img>');
					$data[14] = str_replace("&nbsp;","",$data[14]);
					$data[14] = str_replace("((","",$data[14]);
					$data[14] = str_replace("))","",$data[14]);
					$data[14] = str_replace("(","",$data[14]);
					$data[14] = str_replace(")","",$data[14]);
					$data[14] = str_replace(" ","",$data[14]);
					//echo $tr_element->children[$td_num]->plaintext." ";	
					}
					break;
					case "19"://備註
					$data[19] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[19] = str_replace('class=MsoNormal', '', $data[19]);
					$data[19] = str_replace('class=MsoBodyText', '', $data[19]);
					$data[19] = strip_tags($data[19],'<span><img>');	

					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[19] = str_replace('lang=EN-US', '', $data[19]);
					$data[19] = strip_tags($data[19],'<img>');
					$data[19] = str_replace("&nbsp;","",$data[19]);						
					break;

					default:
					$text_value = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					$data[$td_num] = $text_value;
					//echo $tr_element->children[$td_num]->plaintext." ";				
					break;				
					}
					}


					if ( $dsc_1 !="年級" )
					{
					//Doc轉出來的html，空白欄位莫名奇妙的會插入空白欄位
					if($dsc != "試題編號" )
					{
						$element_num++;		

						$mysqlInsertArray[] = array(
						'order_num'=>$data[0],
						'exam_from'=>$data[1],
						'exam_list_id'=>$getID,
						'item_type'=>$data[3],
						'degree_of_difficulty'=>$data[4],
						'booklet'=>$data[5],
						'chapter'=>$data[6],
						'level_id'=>'0',
						'question'=>str_replace('\"','"',$data[8]),
						'A'=>str_replace('\"','"',$data[9]),
						'B'=>str_replace('\"','"',$data[10]),
						'C'=>str_replace('\"','"',$data[11]),
						'D'=>str_replace('\"','"',$data[12]),
						'questionB'=>str_replace('\"','"',$data[13]),
						'answer'=>str_replace("&nbsp;","",$data[14]),
						'anscontent'=>str_replace("&nbsp;","",$data[15]),
						'year_select'=>$data[16],
						'ansright'=>$data[17],
						'ansmax'=>$data[18],
						'ansdetail'=>$data[19],
						);
					}

					}

					}
					}
					}	
					/*
					*	檢核條件，顯示匯入成功與否。
					*/
					if(isset($mysqlInsertArray) and count($mysqlInsertArray) >0){
						$element_num = 1;				
						foreach($mysqlInsertArray as $key => $value){
							echo "<input type='button' onclick='location.href=\"".route('administrator.exams.fileinputpage')."\";' value='回上一頁'>";
							echo "第".$element_num."題===========================<br>";
							echo str_replace('\"',"",$value['question']);
							$element_num++;
							echo "==========上傳成功!!==========";
							echo "<br>";
						}

						//批次匯入資料庫
						DB::table('exam_items')->insert($mysqlInsertArray);
						
						//更新list的item的資料跟數量
						$itemCounts = 0;
						$itemArrays = array();
						$tempItems = ExamItems::where('exam_list_id',$getID)->orderBy('id','ASC')->get();
						if(count($tempItems) > 0){
							foreach($tempItems as $v){
								$itemCounts++;
								$itemArrays[] = $v->id;
							}
							$add->exam_question_counts = $itemCounts;
							$add->exam_select = json_encode($itemArrays);
							$add->save();
						}
					}
					unlink($destination_path_zip."/".$new_name."_n.htm");
				}	

				//刪掉上傳的zip檔案
				unlink("upload/".$new_name.'.zip');

			}					
				}
			}
		}
		return '';
	}
	
	//根據使用者目前設定的章節範圍取出所有符合條件的試題
	public static function  getAllQuestions(Request $request,$swLevelIDs,$swQuestionIDs,$examFrom){
		$questions = array();		
		$tempObj = ExamItems::where('is_deleted','=','false')
		->whereIn('level_id',$swLevelIDs)
		->whereIn('exam_from',$examFrom)
		->orderBy('id')->get();

		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){			
				$questions[] = array(
					'id'=>$v->id,
					'question'=>$v->question,
					'A'=>$v->A,
					'B'=>$v->B,
					'C'=>$v->C,
					'D'=>$v->D,
					'answer'=>$v->answer,
					'degree_of_difficulty'=>$v->degree_of_difficulty,
					'hasSelect'=>in_array($v->id,$swQuestionIDs)?'true':'false',
				);
			}
		}
		
		
		return $questions;
	}
	
	//取出指定ID的試題資料
	public static function getSelectQuestionsHtml(Request $request,$swQuestionIDs,$random=true){
		$returnDatas = array();
		$questions = array();		
		$tempObj = ExamItems::whereIn('id',$swQuestionIDs)->get();

		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){			
				$questions[] = array(
					'id'=>$v->id,
					'question'=>$v->question,
					'A'=>$v->A,
					'B'=>$v->B,
					'C'=>$v->C,
					'D'=>$v->D,
					'questionB'=>$v->questionB,					
					'answer'=>$v->answer,
					'degree_of_difficulty'=>$v->degree_of_difficulty,
					'hasSelect'=>in_array($v->id,$swQuestionIDs)?'true':'false',
				);
			}
			if($random){
				//最後在隨機打亂題目
				shuffle($questions);
				$returnDatas = $questions;
			}else{
				//依照試卷的試題順序排列
				$tempArray = array();
				foreach($swQuestionIDs as $v){
					$tempArray[$v] = array();
				}
				foreach($questions as $v){
					$tempArray[$v['id']] = $v;
				}
				foreach($tempArray as $v){
					$returnDatas[] = $v;
				}
				
			}
		}
		
		return $returnDatas;
	}
	
	//向學生出題 新增測驗資料
	public static function setExamListStudentData(Request $request){
		$fp = Input::all();
		$groupID = $fp['groupID'];
		$bookletID = $fp['bookletID'];
		$levelIDs = $fp['levelIDs'];
		$studentID = $fp['studentID'];
		$totalNum = $fp['totalNum'];
		$loginName = $fp['sLoginName'];
		$exam_items = array();
		$levelIDs = substr($levelIDs,0,-1);
		$levelIDArray = explode(',',$levelIDs);
		
		$items = array();
		$tempObj = ExamItems::whereIn('level_id',$levelIDArray)->get();

		if(count($tempObj) > 0 ){
			foreach($tempObj as $v){			
				$items[] = $v->id;
			}
			shuffle($items);//隨機打亂題目
			$exam_items = array_slice($items,0,$totalNum);
		}
		
		$addObj = new ExamListStudent();
		$addObj->teacher_id = $request->session()->get('userData')->id;
		$addObj->student_id = $studentID;
		$addObj->student_loginname = $loginName;
		$addObj->exam_group = $groupID;
		$addObj->exam_level = $bookletID;
		$addObj->exam_items = json_encode($exam_items);
		$addObj->exam_question_counts = $totalNum;
		
		$addObj->save();
		
		return '';
	}
	
	
	//刪除 指定ID的試題資料
	public static function delExamsListData(Request $request,$delID){
		$tempObj = ExamList::where('id',$delID)->delete();
		return '';
	}
	
	//刪除 模擬考 指定ID的試題
	public static function delMockExams(Request $request,$delID){
		$tempObj = ExamList::where('id',$delID)->delete();
		$tempObj = ExamItems::where('exam_list_id',$delID)->delete();
		return '';
	}	

	//刪除 模擬考 指定ID的試題
	public static function delItemsData(Request $request,$delID){
		$tempObj = ExamItems::where('id',$delID)->update(['is_deleted' => 'true']);	
		return '';
	}	
	
	//新增 冊章節 的資料
	public static function setExamsLevelData(Request $request){
		$fp = Input::all();
		if(isset($fp['domain']) and $fp['domain'] == 'editForm' and isset($fp['id']) and is_numeric($fp['id'])  and $fp['id'] > 0 ){
			if(isset($fp['sw_one']) and $fp['sw_one'] > ''){
				if(isset($fp['sw_two']) and $fp['sw_two'] > ''){
					//新增資料
					$add = new ExamLevel();			
					$add->group_id = $fp['id'];
					$add->father_id = $fp['sw_two'];
					$add->title = $fp['level_three'];
					$add->save();
					$getID  = $add->id;
				}else{
					//新增 章 資料
					$add = new ExamLevel();			
					$add->group_id = $fp['id'];
					$add->father_id = $fp['sw_one'];
					$add->title = $fp['level_two'];
					$add->save();
					$getID  = $add->id;
					
					//新增 節 資料
					$add2 = new ExamLevel();			
					$add2->group_id = $fp['id'];
					$add2->father_id = $getID;
					$add2->title = $fp['level_three'];
					$add2->save();
					$getID  = $add2->id;
				}
			}else{
				//新增 冊 資料
				$add = new ExamLevel();			
				$add->group_id = $fp['id'];
				$add->father_id = '0';
				$add->title = $fp['level_one'];
				$add->save();
				$getID  = $add->id;
				
				//新增 章 資料
				$add2 = new ExamLevel();			
				$add2->group_id = $fp['id'];
				$add2->father_id = $getID;
				$add2->title = $fp['level_two'];
				$add2->save();
				$getID2  = $add2->id;
				
				//新增 節 資料
				$add3 = new ExamLevel();			
				$add3->group_id = $fp['id'];
				$add3->father_id = $getID2;
				$add3->title = $fp['level_three'];
				$add3->save();
				$getID3  = $add3->id;
			}
		return '';
		}
	}
	
	//更新 受測資料資料
	public static function setTestData(Request $request){
		$fp = Input::all();
		$total_score = 0;//總分
		if($fp['domain']=='updateForm' and $fp['listID'] > '' and is_numeric($fp['listID']))
		{			
			$examData = ExamClass::getExamData($request,$fp['listID']);
			//若超過結束時間時，該筆測驗資料不紀錄
			if(date("Y-m-d H:i") <= $examData['end_date']){
				$selectsData = ExamClass::getSelectQuestionsHtml($request,$examData['exam_select'],false);			
				$tempObj = ExamTestDatas::where('list_id',$fp['listID'])
				->where('student_id',$request->session()->get('userData')->id)
				->get();			
				if(count($tempObj) == 0){
					//如果是模擬考。要重新計算各科目的分數
					$scroes = array();
					if($fp['test_type'] == 'mock'){
						$listDatas = ExamList::where('id',$fp['listID'])->get();
						if( count($listDatas) == 1 ){
							foreach($listDatas as $listData){
								$examScores = json_decode($listData->exam_scores);
								foreach($examScores->distribution as $v){
									$tempValue = $v->totalScore / $v->count;
									for($x=0;$x<$v->count;$x++){
										$scroes[] = $tempValue;
									}
								}
							}
						}
					}
					
					
					$multipleChoice_score = $examData['multipleChoice'] / $examData['total_numbers'];//選擇題每題答對得分
					$true_Ans = array();
					$analysis_ans = array();
					$score_ans = array();
					
					$totalTime = 0;//總花費時間
					$useTimes = explode(',',$fp['use_times']);//各題花費時間
					foreach($useTimes as $v){
						$totalTime = $totalTime + $v;
					}
					
					$writeAns = explode(',',$fp['write_ans']);//各題填寫的答案
					foreach($selectsData as $key => $v){
						$true_ans[] = $v['answer'];
						if($writeAns[$key] == $v['answer']){
							$analysis_ans[] = "=";
							
							if($fp['test_type'] == 'mock'){
								$total_score += $scroes[$key];
								$score_ans[] = $scroes[$key];
							}else{
								$total_score += $multipleChoice_score;
								$score_ans[] = $multipleChoice_score;
							}
							
						}else{
							$analysis_ans[] = $writeAns[$key];
							$score_ans[] = 0;
						}
					}
					
					
					//新增資料
					$add = new ExamTestDatas();			
					$add->list_id = $fp['listID'];
					$add->student_id = $request->session()->get('userData')->id;
					$add->test_date = date("Y-m-d");
					$add->score_publish_time = $examData['score_publish_time'];
					$add->test_type = $fp['test_type'];
					$add->use_times = json_encode($useTimes);
					$add->total_time = $totalTime;
					$add->write_ans = json_encode($writeAns);
					$add->true_ans = json_encode($true_ans);
					$add->analysis_ans = json_encode($analysis_ans);
					$add->score_ans = json_encode($score_ans);
					$add->total_score = round($total_score);
					$add->save();
					$getID  = $add->id;	
				}
			}
		}
		return round($total_score);
	}

	//更新 老師出題  受測資料資料
	public static function setExerciseTestData(Request $request){
		$fp = Input::all();
		$total_score = 0;//總分
		if($fp['domain']=='updateForm' and $fp['listID'] > '' and is_numeric($fp['listID']))
		{			
			$examData = ExamListStudent::where('id',$fp['listID'])
			->where('student_id',$request->session()->get('userData')->id)
			->where('is_test','no')
			->get();
			
			if( count($examData) == 1 ){
				$examItems = array();
				$limitNum = 0;
				foreach($examData as $v){
					$examItems = json_decode($v->exam_items);
					$limitNum = count($examItems);
				}
				
				$selectsData = ExamClass::getItemsHtmlByCondition($request,array(),$examItems,$limitNum,false,$examItems);			
				$tempObj = ExamTestDatasStudent::where('list_student_id',$fp['listID'])
				->where('student_id',$request->session()->get('userData')->id)
				->get();			
				if(count($tempObj) == 0){
					$true_Ans = array();
					$analysis_ans = array();
					$writeAns = explode(',',$fp['write_ans']);//各題填寫的答案
					foreach($selectsData as $key => $v){
						$true_ans[] = $v['answer'];
						if($writeAns[$key] == $v['answer']){
							$analysis_ans[] = "=";
						}else{
							$analysis_ans[] = $writeAns[$key];
						}
					}
					
					
					//新增資料
					$add = new ExamTestDatasStudent();			
					$add->list_student_id = $fp['listID'];
					$add->student_id = $request->session()->get('userData')->id;
					$add->test_date = date("Y-m-d");
					$add->write_ans = json_encode($writeAns);
					$add->true_ans = json_encode($true_ans);
					$add->analysis_ans = json_encode($analysis_ans);
					$add->save();
					$getID  = $add->id;
					
					$update = ExamListStudent::find($fp['listID']);			
					$update->is_test = 'yes';
					$update->save();
					
				}
			}
		}
		return '';
	}
	
	//更新 科目名稱資料
	public static function  setGroupData(Request $request,$groupTitle,$id){
		$getID  = '';
		if($id == 0){
			//新增資料
			$add = new ExamGroup();			
			$add->title = $groupTitle;
			$add->save();
			$getID  = $add->id;
		}else{
			//新增資料
			$update = ExamGroup::where('id',$id);			
			$update->title = $groupTitle;
			$update->save();
			$getID  = $update->id;
		}
		return $getID;
	}
	
	//刪除 指定ID的 科目(所屬的冊、章、節、試題)
	public static function delGroupData(Request $request,$delID){
		$tempObj = ExamGroup::where('id',$delID)->update(['is_deleted' => 'true']);
		$tempObj = ExamLevel::where('group_id',$delID)->update(['is_deleted' => 'true']);
		$tempObj = ExamItems::where('group_id',$delID)->update(['is_deleted' => 'true']);		
		return '';
	}

	//刪除 指定ID的 冊(所屬的章、節、試題)
	public static function delBooklet(Request $request,$delID){
		$levelDatas = array();
		$delLevelIDs = array();
		$delItemIDs = array();
		$tempObj = ExamLevel::where('father_id','>','0')
		->where('is_deleted','false')
		->get();
		if(count($tempObj)){
			foreach($tempObj as $v){
				$levelDatas[$v->father_id][] = $v->id;
			}
		}
		
		$delLevelIDs[] = $delID;//冊
		if(isset($levelDatas[$delID])){
			foreach($levelDatas[$delID] as $v){
				$delLevelIDs[] = $v;//章
				if(isset($levelDatas[$v])){
					foreach($levelDatas[$v] as $v2){
						$delLevelIDs[] =$v2;//節
						$delItemIDs[] =$v2;
					}
				}
			}
		}	
		
		$tempObj = ExamLevel::whereIn('id',$delLevelIDs)->update(['is_deleted' => 'true']);
		if( count($delItemIDs) > 0 ){
			$tempObj = ExamItems::whereIn('level_id',$delItemIDs)->update(['is_deleted' => 'true']);	
		}
		
		return '';
	}	
	
	//刪除 指定ID的 章(所屬的節、試題)
	public static function delChapter(Request $request,$delID){
		$levelDatas = array();
		$delLevelIDs = array();
		$delItemIDs = array();
		$tempObj = ExamLevel::where('father_id','>','0')
		->where('is_deleted','false')
		->get();
		if(count($tempObj)){
			foreach($tempObj as $v){
				$levelDatas[$v->father_id][] = $v->id;
			}
		}
		if(isset($levelDatas[$delID])){
			$delLevelIDs[] = $delID;//章
			foreach($levelDatas[$delID] as $v){
				$delLevelIDs[] = $v;//節
				$delItemIDs[] =$v;
			}
			$tempObj = ExamLevel::whereIn('id',$delLevelIDs)->update(['is_deleted' => 'true']);
			$tempObj = ExamItems::whereIn('level_id',$delItemIDs)->update(['is_deleted' => 'true']);		
		}	
		return '';
	}	

	//刪除 指定ID的 節(所屬的 試題)
	public static function delFestival(Request $request,$delID){
		$tempObj = ExamLevel::where('id',$delID)->update(['is_deleted' => 'true']);
		$tempObj = ExamItems::where('level_id',$delID)->update(['is_deleted' => 'true']);		
		
		return '';
	}	
	
	//刪除 刪除一筆試題錯誤回報資料
	public static function delReportError(Request $request,$delID){
		$tempObj = ExamReportError::where('id',$delID)->delete();
		return '';
	}
	
	//新增 試題
	public static function addExamsItems(Request $request){
		require_once base_path('vendor/pclzip/pclzip/pclzip.lib.php');//載入zip解壓縮
		
		$html_file_name = '';//目標htm
		
		if ($request->hasFile('upzip')) {
			
			$uploadFileName = $request->file('upzip')->getClientOriginalName();
			$uploadFileName = iconv("UTF-8", "big5", $uploadFileName);
			
			$mtime = explode(" ", microtime());
			$startTime = $mtime[1].substr($mtime[0],2);
			$new_name =  $startTime;//新的圖片目錄名稱
			$uploadfile = "upload";
			$request->file('upzip')->move($uploadfile,$new_name.".zip");//搬移檔案
			
			//產生解壓縮後存放的目錄
			$destination_path_zip = 'upfile/'.date("Ymd");
			if (!file_exists($destination_path_zip)) {
				mkdir($destination_path_zip, 0777);
			}
			$destination_path_zip = 'upfile/'.date("Ymd")."/".$new_name;
			if (!file_exists($destination_path_zip)) {
				mkdir($destination_path_zip, 0777);
			}
			
			//解壓縮zip擋到upfile裡面
			$archive = new PclZip("upload/".$new_name.'.zip');// PclZip
			$file_list = $archive->extract(PCLZIP_OPT_PATH, $destination_path_zip, PCLZIP_OPT_REMOVE_ALL_PATH);
			
			//找htm檔名
			if (is_dir($destination_path_zip)) {
				
				if ($dh = opendir($destination_path_zip)) {
					while (($file = readdir($dh)) !== false) {
						if (strpos( $file, '.htm') ){
							$html_file_name = $file;//找出上傳htm的檔名
						}
					}
					closedir($dh);
				}
			}	

			//如果有找到htm就開始讀檔
			if($html_file_name > ''){
			rename($destination_path_zip."/".$html_file_name,$destination_path_zip."/".$new_name.".htm");


			$name_array = explode(".",$request->file('upzip')->getClientOriginalName());
			$homepage = (String)file_get_contents($destination_path_zip."/".$new_name.".htm");
			$name_array[0] = str_replace(" ","%20",$name_array[0]);
			$newcon = str_replace($name_array[0].".files",'/'.$destination_path_zip,$homepage);//讀取htm檔案內容，並調整img的src路徑
			file_put_contents($destination_path_zip."/".$new_name."_n.htm",$newcon);

			//處理html
			$nowdate =  date("Y-m-d H:i",time());
			$html = new Htmldom($destination_path_zip."/".$new_name."_n.htm");

			$mysqlInsertArray = array();//大量 insert to sql的陣列
			$checkTypeArray = array();
			$OrderNumArray = array();
			
			
			//取出所有的 科目、冊、章、節 資料
			
			$examGroups = array();
			$examLevels = array();	
			$examLevel_one = array();//冊
			$examLevel_two = array();//章
			$examLevel_three = array();//節
			
			$examGroup = ExamGroup::where('is_deleted','=','false')->get();
			if(count($examGroup) > 0){
				foreach($examGroup as $v){
					$examGroups[$v->title] = $v->id;
				}
			}
			
			$tempObj = ExamLevel::where('is_deleted','=','false')->get();
			
			if(count($tempObj) > 0){
				
				foreach($tempObj as $v){
					$examLevels[$v->id] = array(
						'id'=>$v->id,
						'group_id'=>$v->group_id,
						'father_id'=>$v->father_id,
						'title'=>$v->title,
					
					);
				}
				
				foreach($examLevels as $v){
					$id = $v['id'];
					$groupId = $v['group_id'];
					$fatherId = $v['father_id'];
					$title = $v['title'];
					
					if( $fatherId == 0 ){
						$examLevel_one[$groupId][$title] = $id;
					}else{
						$tempFatherID = $examLevels[$fatherId]['father_id'];
						if($tempFatherID == 0){
							$examLevel_two[$groupId][$title] = $id;
						}
						if($tempFatherID > 0){
							$examLevel_three[$groupId][$title] = $id;
						}
					}
					
				}
			}
			
			

foreach($html->find('table') as $element){
		$element_num = 1;//題目A
		if($element->children(1)->tag != "p"){
			$trMaxNum =count($element->children);
			for($tr_num=0; $tr_num < $trMaxNum ;$tr_num++){//tr
				$dsc = "";
				$tr_element = $element->children[$tr_num];
				$data[0]="";//編號
				$data[1]="";//來源
				$data[2]="";//科目
				$data[3]="";//題型(1.是非2.選擇3.填充4.問答)
				$data[4]="";//難易度(1.難2.中3.易)
				$data[5]="";//冊
				$data[6]="";//章
				$data[7]="";//節
				$data[8]="";//題目A
				$data[9]="";//A
				$data[10]="";//B
				$data[11]="";//C
				$data[12]="";//D
				$data[13]="";//題目B
				$data[14]="";//答案
				$data[15]="";//解析
				$data[16]="";//年度 =>目前不匯入
				$data[17]="";//答對人數=>目前不匯入
				$data[18]="";//作答人數=>目前不匯入
				$data[19]="";//備註=>目前不匯入
				$maxTdNum = count($tr_element->children);
				
		for($td_num=0;$td_num < $maxTdNum;$td_num++){//tr
			switch($td_num){
				case "0"://編號
					$text_value = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					$dsc = $text_value;					
					$dsc_1 = $text_value;
					$data[0] = $text_value;
					$data[0] = str_replace("&nbsp;","",$data[0]);
					$OrderNumArray[] = $data[0];
				break;
				case "1"://來源
					$data[1] = addslashes($tr_element->children[$td_num]->innertext);
					$data[1] = str_replace('class=MsoNormal', '', $data[1]);
					$data[1] = str_replace('class=MsoBodyText', '', $data[1]);
					$data[1] = strip_tags($data[1],'<img>');					
					$data[1] = str_replace("&nbsp;","",$data[1]);
					$data[1] = str_replace(" ","",$data[1]);
					$data[1] = str_replace("((","",$data[1]);
					$data[1] = str_replace("))","",$data[1]);
					$data[1] = str_replace("(","",$data[1]);
					$data[1] = str_replace(")","",$data[1]);
				break;
				case "2"://科目
					$data[2] = addslashes($tr_element->children[$td_num]->innertext);
					$data[2] = str_replace('class=MsoNormal', '', $data[2]);
					$data[2] = str_replace('class=MsoBodyText', '', $data[2]);
					$data[2] = strip_tags($data[2],'<img>');					
					$data[2] = str_replace("&nbsp;","",$data[2]);
					$data[2] = str_replace(" ","",$data[2]);
				break;
				case "3"://題型(1.是非2.選擇3.填充4.問答)
					$data[3] = addslashes($tr_element->children[$td_num]->innertext);
					$data[3] = str_replace('class=MsoNormal', '', $data[3]);
					$data[3] = str_replace('class=MsoBodyText', '', $data[3]);
					$data[3] = strip_tags($data[3],'<img>');	
					$data[3] = str_replace("&nbsp;","",$data[3]);
					$data[3] = str_replace(" ","",$data[3]);
					$data[3] = str_replace("((","",$data[3]);
					$data[3] = str_replace("))","",$data[3]);
					$data[3] = str_replace("(","",$data[3]);
					$data[3] = str_replace(")","",$data[3]);
				break;
				case "4"://難易度(1.難2.中3.易)
					$data[4] = addslashes($tr_element->children[$td_num]->innertext);
					$data[4] = str_replace('class=MsoNormal', '', $data[4]);
					$data[4] = str_replace('class=MsoBodyText', '', $data[4]);
					$data[4] = strip_tags($data[4],'<img>');	
					$data[4] = str_replace("&nbsp;","",$data[4]);
					$data[4] = str_replace(" ","",$data[4]);
					$data[4] = str_replace("((","",$data[4]);
					$data[4] = str_replace("))","",$data[4]);
					$data[4] = str_replace("(","",$data[4]);
					$data[4] = str_replace(")","",$data[4]);
				break;
				case "5"://冊
					$data[5] = addslashes($tr_element->children[$td_num]->innertext);
					$data[5] = str_replace('class=MsoNormal', '', $data[5]);
					$data[5] = str_replace('class=MsoBodyText', '', $data[5]);
					$data[5] = strip_tags($data[5],'<img>');	
					$data[5] = str_replace("&nbsp;","",$data[5]);
					$data[5] = str_replace(" ","",$data[5]);
				break;
				case "6"://章
					$data[6] = addslashes($tr_element->children[$td_num]->innertext);
					$data[6] = str_replace('class=MsoNormal', '', $data[6]);
					$data[6] = str_replace('class=MsoBodyText', '', $data[6]);
					$data[6] = strip_tags($data[6],'<img>');	
					$data[6] = str_replace("&nbsp;","",$data[6]);
					$data[6] = str_replace(" ","",$data[6]);
				break;
				case "7"://節
					$data[7] = addslashes($tr_element->children[$td_num]->innertext);
					$data[7] = str_replace(" ","",$tr_element->children[$td_num]->innertext);
					$data[7] = str_replace('class=MsoNormal', '', $data[7]);
					$data[7] = str_replace('class=MsoBodyText', '', $data[7]);
					$data[7] = strip_tags($data[7],'<img>');	
					$data[7] = str_replace("&nbsp;","",$data[7]);
					$data[7] = str_replace(" ","",$data[7]);
				break;
				case "8"://題目A
					$data[8] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[8] = str_replace('class=MsoNormal', '', $data[8]);
					$data[8] = str_replace('class=MsoBodyText', '', $data[8]);
					$data[8] = strip_tags($data[8],'<span><img>');						/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[8] = str_replace('lang=EN-US', '', $data[8]);
					$data[8] = strip_tags($data[8],'<img>');
					$data[8] = str_replace("&nbsp;","",$data[8]);

				break;
				case "9"://A
					$data[9] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[9] = str_replace('class=MsoNormal', '', $data[9]);
					$data[9] = str_replace('class=MsoBodyText', '', $data[9]);
					$data[9] = strip_tags($data[9],'<span><img>');	
					$data[9] = strip_tags($data[9],'<img>');
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[9] = str_replace('lang=EN-US', '', $data[9]);
					$data[9] = str_replace("&nbsp;","",$data[9]);
					//$data[9] = str_replace(" ","",$data[9]);
					//去掉開始和結束的空白

					$data[9] = trim($data[9]);

					// Now remove any doubled-up whitespace

					//去掉跟隨別的擠在一塊的空白

					//$data[9] = preg_replace('/\s(?=\s)/', '', $data[9]);

					// Finally, replace any non-space whitespace, with a space

					//最後，去掉非space 的空白，用一個空格代替

					$data[9] = preg_replace('/[\n\r\t]/', ' ', $data[9]);

				break;
				case "10"://B
					$data[10] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[10] = str_replace('class=MsoNormal', '', $data[10]);
					$data[10] = str_replace('class=MsoBodyText', '', $data[10]);
					$data[10] = strip_tags($data[10],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[10] = str_replace('lang=EN-US', '', $data[10]);
					$data[10] = strip_tags($data[10],'<img>');
					$data[10] = str_replace("&nbsp;","",$data[10]);
					//$data[10] = str_replace(" ","",$data[10]);
					$data[10] = trim($data[10]);
					$data[10] = preg_replace('/[\n\r\t]/', ' ', $data[10]);
				break;
				case "11"://C
					$data[11] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[11] = str_replace('class=MsoNormal', '', $data[11]);
					$data[11] = str_replace('class=MsoBodyText', '', $data[11]);
					$data[11] = strip_tags($data[11],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[11] = str_replace('lang=EN-US', '', $data[11]);
					$data[11] = strip_tags($data[11],'<img>');
					$data[11] = str_replace("&nbsp;","",$data[11]);
					//$data[11] = str_replace(" ","",$data[11]);
					$data[11] = trim($data[11]);
					$data[11] = preg_replace('/[\n\r\t]/', ' ', $data[11]);
				break;
				case "12"://D
					$data[12] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[12] = str_replace('class=MsoNormal', '', $data[12]);
					$data[12] = str_replace('class=MsoBodyText', '', $data[12]);
					$data[12] = strip_tags($data[12],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[12] = str_replace('lang=EN-US', '', $data[12]);
					$data[12] = strip_tags($data[12],'<img>');
					$data[12] = str_replace("&nbsp;","",$data[12]);
					//$data[12] = str_replace(" ","",$data[12]);
					$data[12] = trim($data[12]);
					$data[12] = preg_replace('/[\n\r\t]/', ' ', $data[12]);
				break;
				case "13"://題目B
					$data[13] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[13] = str_replace('class=MsoNormal', '', $data[13]);
					$data[13] = str_replace('class=MsoBodyText', '', $data[13]);
					$data[13] = strip_tags($data[13],'<span><img>');						/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[13] = str_replace('lang=EN-US', '', $data[13]);
					$data[13] = strip_tags($data[13],'<img>');
					$data[13] = str_replace("&nbsp;","",$data[13]);

				break;
				case "15"://提示
					$data[15] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[15] = str_replace('class=MsoNormal', '', $data[15]);
					$data[15] = str_replace('class=MsoBodyText', '', $data[15]);
					$data[15] = strip_tags($data[15],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[15] = str_replace('lang=EN-US', '', $data[15]);
					$data[15] = strip_tags($data[15],'<img>');
					$data[15] = str_replace("&nbsp;","",$data[15]);
				break;
				case "14"://答案
					if($data[3]!=1&&$data[3]!=2){

					$data[14] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[14] = str_replace('class=MsoNormal', '', $data[14]);
					$data[14] = str_replace('class=MsoBodyText', '', $data[14]);
					$data[14] = strip_tags($data[14],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[14] = str_replace('lang=EN-US', '', $data[14]);
					$data[14] = strip_tags($data[14],'<img>');
					//$data[14] = str_replace("&nbsp;","",$data[14]);
					$data[14] = str_replace("((","",$data[14]);
					$data[14] = str_replace("))","",$data[14]);
					$data[14] = str_replace("(","",$data[14]);
					$data[14] = str_replace(")","",$data[14]);
					//$data[14] = str_replace(" ","",$data[14]);
					}else{
					$data[14] = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					//$data[$td_num] = $text_value;
					$data[14] = str_replace('class=MsoNormal', '', $data[14]);
					$data[14] = str_replace('class=MsoBodyText', '', $data[14]);
					$data[14] = strip_tags($data[14],'<span><img>');	
					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[14] = str_replace('lang=EN-US', '', $data[14]);
					$data[14] = strip_tags($data[14],'<img>');
					$data[14] = str_replace("&nbsp;","",$data[14]);
					$data[14] = str_replace("((","",$data[14]);
					$data[14] = str_replace("))","",$data[14]);
					$data[14] = str_replace("(","",$data[14]);
					$data[14] = str_replace(")","",$data[14]);
					$data[14] = str_replace(" ","",$data[14]);
					//echo $tr_element->children[$td_num]->plaintext." ";	
					}
				break;
				case "19"://備註
					$data[19] = addslashes($tr_element->children[$td_num]->innertext);
					//針對題目做格式過濾
					//1. class=MsoNormal
					//2. style=""
					//3. lang=EN-US
					$data[19] = str_replace('class=MsoNormal', '', $data[19]);
					$data[19] = str_replace('class=MsoBodyText', '', $data[19]);
					$data[19] = strip_tags($data[19],'<span><img>');	

					/*
					$data[6] = preg_replace("/<span .*?>/si","<span>",$data[6]); 						
					*/
					$data[19] = str_replace('lang=EN-US', '', $data[19]);
					$data[19] = strip_tags($data[19],'<img>');
					$data[19] = str_replace("&nbsp;","",$data[19]);						
				break;

				default:
					$text_value = str_replace(" ","",$tr_element->children[$td_num]->plaintext);
					$data[$td_num] = $text_value;
					//echo $tr_element->children[$td_num]->plaintext." ";				
				break;				
			}
		}


		if ( $dsc_1 !="年級" )
		{
			//Doc轉出來的html，空白欄位莫名奇妙的會插入空白欄位
			if($dsc != "試題編號" )
			{
				$element_num++;		
				$level_id = 0;
				$level_one = 0;
				$level_two = 0;
				$level_three = 0;
				
				if( isset($examGroups[$data[2]]) ){
					$level_id = $examGroups[$data[2]];
					$data[2] = $examGroups[$data[2]];
				}else{
					$data[2] = '';
				}
				
				if( $level_id > 0  and $data[5] > ''){
					$groupId = $data[2];
					$title = $data[5];
					if(isset($examLevel_one[$groupId][$title])){
						$level_one = $examLevel_one[$groupId][$title];
					}else{
						//沒有資料，所以新增
						$exam_level = new ExamLevel();
						$exam_level->group_id = $groupId;
						$exam_level->title = $title;
						$exam_level->order_num = 0;
						$exam_level->save();
						$level_one = $exam_level->id;
						$examLevel_one[$groupId][$title] = $level_one;
					}
				}

				if( $level_id > 0 and $level_one > 0 and $data[6] > ''){
					$groupId = $data[2];
					$title = $data[6];
					if(isset($examLevel_two[$groupId][$title])){
						$level_two= $examLevel_two[$groupId][$title];
					}else{
						//沒有資料，所以新增
						$exam_level = new ExamLevel();
						$exam_level->group_id = $groupId;
						$exam_level->father_id = $level_one;
						$exam_level->title = $title;
						$exam_level->order_num = 0;
						$exam_level->save();
						$level_two = $exam_level->id;
						$examLevel_two[$groupId][$title] = $level_two;
					}
				}

				if( $level_id > 0 and $level_two > 0 and $data[7] > ''){
					$groupId = $data[2];
					$title = $data[7];
					if(isset($examLevel_three[$groupId][$title])){
						$level_three = $examLevel_three[$groupId][$title];
					}else{
						//沒有資料，所以新增
						$exam_level = new ExamLevel();
						$exam_level->group_id = $groupId;
						$exam_level->father_id = $level_two;
						$exam_level->title = $title;
						$exam_level->order_num = 0;
						$exam_level->save();
						$level_three = $exam_level->id;
						$examLevel_three[$groupId][$title] = $level_three;
					}
				}
				
				if( $level_id > 0 and $level_three >0 ){				
					$checkTypeArray[] = true; 
				}else{					
					$checkTypeArray[] = false;
				}

				$mysqlInsertArray[] = array(
						'order_num'=>$data[0],
						'exam_from'=>$data[1],
						'group_id'=>$data[2],
						'item_type'=>$data[3],
						'degree_of_difficulty'=>$data[4],
						'level_id'=>$level_three,
						'question'=>str_replace('\"','"',$data[8]),
						'A'=>str_replace('\"','"',$data[9]),
						'B'=>str_replace('\"','"',$data[10]),
						'C'=>str_replace('\"','"',$data[11]),
						'D'=>str_replace('\"','"',$data[12]),
						'questionB'=>str_replace('\"','"',$data[13]),
						'answer'=>str_replace("&nbsp;","",$data[14]),
						'anscontent'=>str_replace("&nbsp;","",$data[15]),
						'year_select'=>$data[16],
						'ansright'=>$data[17],
						'ansmax'=>$data[18],
						'ansdetail'=>$data[19],
				);
			}
			
		}
		
		}
	}
}	

			/*
			*	檢核條件，顯示匯入成功與否。
			*/
			if(isset($mysqlInsertArray) and count($mysqlInsertArray) >0){
				$tempOBj = ExamItems::whereIn('order_num',$OrderNumArray)->get();
				$tempArray = array();
				if(count($tempOBj) > 0){
					foreach($tempOBj as $v){
						$tempArray[] = $v->order_num;
					}
				}
				
				//去掉不合適的檔案
				$element_num = 1;				
				foreach($mysqlInsertArray as $key => $value){
					echo "<input type='button' onclick='location.href=\"".route('administrator.exams.fileinputpage')."\";' value='回上一頁'>";
					echo "第".$element_num."題===========================<br>";
					echo str_replace('\"',"",$value['question']);
					$element_num++;
					if(in_array($value['order_num'],$tempArray)){
						unset($mysqlInsertArray[$key]);
						echo "==========試題編號重複 上傳失敗!!==========";
					}else if(!$checkTypeArray[$key]){
						unset($mysqlInsertArray[$key]);
						echo "==========上傳失敗!!==========";
					}else{
						echo "==========上傳成功!!==========";
					}
					
					echo "<br>";

				}
				
				//批次匯入資料庫
				DB::table('exam_items')->insert($mysqlInsertArray);
			}
			unlink($destination_path_zip."/".$new_name."_n.htm");
			}

			//刪掉上傳的zip檔案
			unlink("upload/".$new_name.'.zip');			
		}
		return '';
	}

	
	//取得 參加考試人數的資料
	public static function getTestPeopleNumber(Request $request,$dataObj){
		$returnData = array();
		$whereInArray = array();
		if(count($dataObj) > 0){
			foreach($dataObj as $v ){
				if(!in_array($v->id,$whereInArray)){
					$whereInArray[] = $v->id;
				}
			}
		}
		
		if(count($whereInArray) > 0){
			$tempObj = ExamTestDatas::whereIn('list_id',$whereInArray)
			->get();
			if(count($tempObj) > 0){
				foreach($tempObj as $v ){
					if(!isset($returnData[$v->list_id])){
						$returnData[$v->list_id] =0;
					}
					$returnData[$v->list_id]++;
				}
			}
		}

		return $returnData;
	}
	
	//取得 參加考試的學生與成績資料
	public static function getTestPeopleList(Request $request,$listID){
		$returnData = array();
		$tempObj = ExamTestDatas::where('list_id',$listID)
		->orderBy('total_score','DESC')
		->get();
		return $tempObj;
	}
	
	//新增 回報試題錯誤資料
	public static function setReportError(Request $request,$examItemsId,$errorDsc){
		$tempObj = new ExamReportError();
		$tempObj->error_dsc = $errorDsc;
		$tempObj->exam_items_id = $examItemsId;
		$tempObj->student_id = $request->session()->get('userData')->id;
		$tempObj->save();
		return ;
	}
	
	//回傳 向學生出題 老師的出題列表資料
	public static function getExamListStudent_teacher(Request $request){
		$tempObj = ExamListStudent::where('teacher_id',$request->session()->get('userData')->id)
		->orderBy('id','DESC')
		->paginate(15);
		
		return $tempObj;
	}
	
	//回傳 老師出題
	public static function getExamListStudentData(Request $request,$studentID){
		$tempObj = ExamListStudent::where('student_id',$studentID)
		->orderBy('id','DESC')
		->paginate(15);
		
		return $tempObj;
	}
	
	//回傳 老師出題
	public static function getOneExamListStudentData(Request $request,$getID){
		$returnArray = array();
		$tempObj = ExamListStudent::where('id',$getID)
		->get();
		if( count($tempObj)  == 1 ){
			$tempObj = $tempObj->toArray();
			foreach($tempObj as $v){
				$returnArray = $v;
				$returnArray['exam_items'] = json_decode($v['exam_items']);
			}
		}
		return $returnArray;
	}
	
	//回傳 老師出題 受測資料
	public static function getExamListStudentRecordData(Request $request,$getID){
		$returnArray = array();
		$tempObj = ExamTestdatasStudent::where('list_student_id',$getID)
		->get();
		if( count($tempObj)  == 1 ){
			$tempObj = $tempObj->toArray();
			foreach($tempObj as $v){
				$returnArray = $v;
				$returnArray['write_ans'] = json_decode($v['write_ans']);
			}
		}
		return $returnArray;
	}
}
