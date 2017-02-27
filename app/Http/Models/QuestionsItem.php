<?php
namespace App\Http\Models;

class QuestionsItem extends BaseModel {
    protected $table = 'questions_item';
    protected $primaryKey = 'id';
    //public $timestamps = false;

    private $item_data = array(
        'title'=>'',
        'power_dsc'=>'',
        'model_item_id'=>'0',
        'model_item_options'=>array(),
        'feedback_type'=>'0',
        'feedback_dsc'=>'',
        'abbreviation'=>'',
        'exam_paper_id'=>'0',
        'avatar_type'=>array(),
        'avatar_dsc'=>array(),
        'correct_answer'=>array(),
        'error_answer'=>array(),
        'score'=>'0',
    );

    public function _init($input_data){
        foreach($input_data as $key => $value){
            $this->item_data[$key] = $value;
        }
    }

    /**
     * 新增一個試題資料
     *
     */
    public function add(){
        $add_obj = new QuestionsItem();
        $add_obj -> title =  $this->item_data['title'];
        $add_obj -> model_item_id =  $this->item_data['model_item_id'];
        $add_obj -> model_item_options =   json_encode($this->item_data['model_item_options']);
        $add_obj -> feedback_type =  $this->item_data['feedback_type'];
        $add_obj -> feedback_dsc =  $this->item_data['feedback_dsc'];
        $add_obj -> abbreviation =  $this->item_data['abbreviation'];
        $add_obj -> exam_paper_id =  $this->item_data['exam_paper_id'];
        $add_obj -> avatar_type =  json_encode($this->item_data['avatar_type']);
        $add_obj -> avatar_dsc =  json_encode($this->item_data['avatar_dsc']);
        $add_obj -> correct_answer =  json_encode($this->item_data['correct_answer']);
        $add_obj -> error_answer =  json_encode($this->item_data['error_answer']);
        $add_obj -> power_dsc =  $this->item_data['power_dsc'];
        $add_obj -> save();

        return $add_obj->id;
    }

    /**
     * 更新一個試題資料
     *
     */
    public function update_data(){
        $add_obj = QuestionsItem::find($this->item_data['id']);
        $add_obj -> title =  $this->item_data['title'];
        $add_obj -> model_item_id =  $this->item_data['model_item_id'];
        $add_obj -> model_item_options =   json_encode($this->item_data['model_item_options']);
        $add_obj -> feedback_type =  $this->item_data['feedback_type'];
        $add_obj -> feedback_dsc =  $this->item_data['feedback_dsc'];
        $add_obj -> abbreviation =  $this->item_data['abbreviation'];
        $add_obj -> exam_paper_id =  $this->item_data['exam_paper_id'];
        $add_obj -> avatar_type =  json_encode($this->item_data['avatar_type']);
        $add_obj -> avatar_dsc =  json_encode($this->item_data['avatar_dsc']);
        $add_obj -> correct_answer =  json_encode($this->item_data['correct_answer']);
        $add_obj -> error_answer =  json_encode($this->item_data['error_answer']);
        $add_obj -> power_dsc =  $this->item_data['power_dsc'];
        $add_obj -> save();

        return $add_obj->id;
    }

    /**
     * 取出下一個試題資料
     *
     */
    public function next_data($msg)
    {
        $get_data = false;
        $get_index = 0;
        $item_obj = QuestionsItem::where('exam_paper_id',$this->item_data['exam_paper_id'])
                    ->orderBy('id','ASC');
        $item_obj =  $item_obj->get();
        if(count($item_obj) > 0){
            //一開始載入的時候是0
            if( $this->item_data['id'] == 0){
                $msg['type'] = 'success';
                $msg['has_next'] = true;
                $msg['data'] = $item_obj[0]->toArray();
            }else{
                foreach($item_obj as $key => $temp_obj){
                    if($temp_obj['id'] > $this->item_data['id'] AND !$get_data){
                        $msg['type'] = 'success';
                        $msg['data'] = $temp_obj->toArray();
                        $get_index = $key;
                        $get_data = true;
                    }
                }
                $temp_index = $get_index + 1;
                if(isset($item_obj[$temp_index]))
                {
                    $msg['has_next'] = true;
                }
                $temp_index = $get_index - 1;
                if(isset($item_obj[$temp_index]))
                {
                    $msg['has_back'] = true;
                }

            }

        }

        return $msg;
    }

    /**
    * 取出上一個試題資料
    *
    */
    public function back_data($msg)
    {
        $get_data = false;
        $get_index = 0;
        $item_obj = QuestionsItem::where('exam_paper_id',$this->item_data['exam_paper_id'])
            ->orderBy('id','DESC');
        $item_obj =  $item_obj->get();
        if(count($item_obj) > 0){
            //如果是新增試題退回上一題
            if( $this->item_data['id'] == 0 ){
                $msg['type'] = 'success';
                $msg['has_back'] = true;
                $msg['data'] = $item_obj[0]->toArray();
            }else{
                //一般試題編輯的話
                foreach($item_obj as $key => $temp_obj)
                {
                    if(!$get_data AND $temp_obj['id'] <  $this->item_data['id'])
                    {
                        $msg['type'] = 'success';
                        $msg['data'] = $temp_obj->toArray();
                        $get_index = $key;
                        $get_data = true;
                    }
                }
                $temp_index = $get_index + 1;
                if(isset($item_obj[$temp_index]))
                {
                    $msg['has_back'] = true;
                }
                $temp_index = $get_index - 1;
                if(isset($item_obj[$temp_index]))
                {
                    $msg['has_next'] = true;
                }
            }
        }

        return $msg;
    }

    /**
    * 刪除一個試題資料
    *
    */
    public function delete_data($msg)
    {
        $get_data = false;
        $get_index = 0;
        $item_obj = QuestionsItem::where('exam_paper_id',$this->item_data['exam_paper_id'])
            ->orderBy('id','DESC');
        $item_obj =  $item_obj->get();
        if(count($item_obj) > 0){
            foreach($item_obj as $key => $temp_obj)
            {
                if( $temp_obj['id'] ==  $this->item_data['id'])
                {
                    $msg['type'] = 'success';
                    $get_index = $key;
                }
            }
            $temp_index = $get_index + 1;
            if(isset($item_obj[$temp_index]))
            {
                $msg['has_back'] = true;
            }
            $temp_index = $get_index - 1;
            if(isset($item_obj[$temp_index]))
            {
                $msg['has_next'] = true;
            }

            //刪除實際資料
            $item = QuestionsItem::find($this->item_data['id']);
            $item->delete();
        }

        return $msg;
    }

    /**
     * 取得試卷內試題的數量
     *
     */
    public function get_paper_item_num($paper_id)
    {
        $return_data = array();

        $item_obj = QuestionsItem::select('exam_paper_id')
            ->whereIn('exam_paper_id',$paper_id)
            ->orderBy('id','ASC')
            ->get();
        if($item_obj)
        {
            foreach ($item_obj as $value){
                if(!isset($return_data[$value['exam_paper_id']])){
                    $return_data[$value['exam_paper_id']] = 0;
                }
                $return_data[$value['exam_paper_id']]++;
            }
        }

        return $return_data;
    }
}
