<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaperAccess;
use App\Http\Models\ExamPaper;
use App\Http\Models\ExamRecord;
use App\Http\Models\ConceptInfo;

class ExamClass
{

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
}
