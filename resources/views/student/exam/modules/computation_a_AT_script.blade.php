<script>
    var build_option = '[! isset($exam_data['model_item_options'])?json_encode($exam_data['model_item_options']):"[]" !]';
    var right_ans = [];//正確答案
    var error_ans = [];//錯誤答案
    @foreach($exam_data['correct_answer']['answer'] as $key => $value )
        right_ans.push({
        "answer":"[! $exam_data['correct_answer']['answer'][$key] !]",
        "jump":"[! $exam_data['correct_answer']['jump'][$key] !]",
        "keyword":"[! $exam_data['correct_answer']['keyword'][$key] !]"
    });
    @endforeach
    @foreach($exam_data['error_answer']['answer'] as $key => $value )
        error_ans.push({
        "answer":"[! $exam_data['error_answer']['answer'][$key] !]",
        "jump":"[! $exam_data['error_answer']['jump'][$key] !]",
        "number":"[! $exam_data['error_answer']['number'][$key] !]",
        "keyword":"[! $exam_data['error_answer']['keyword'][$key] !]"
    });
	@endforeach




    /**
     * 答案分析
     */
    function analysis() {
        can_update_record = true;
        var has_result = false;
        student_ans = $('#module_show_area').html();
        var ans = $('#module_show_area').html();

        //將學生作答資料放入對話區
        var std_ans = '學生：' + student_ans + '<br>';
        $('#qustion-voicetext-inner').append(std_ans);
        $('#qustion-voicetext-inner').scrollTop(9999999);;


        //絕對答案或關鍵字分析，index由0開始所以需要減1
        for(var x=0;x<right_ans.length;x++){
            if(right_ans[x].answer > '' && right_ans[x].answer == ans){
                if(right_ans[x].jump == '999'){
                    now_item_index = 999;
                    operating_record({'fun':'setItemIndex','value':'999'});
                }else{
                    now_item_index = right_ans[x].jump - 1;
                    operating_record({'fun':'setItemIndex','value':now_item_index});
                }
                operating_record({'fun':'go_next','value':''});
                has_result = true;
                go_next();
                break;
            }
            if(right_ans[x].keyword > '' && ans.match(right_ans[x].keyword)!=null)
            {
                if(right_ans[x].jump == '999'){
                    now_item_index = 999;
                    operating_record({'fun':'setItemIndex','value':'999'});
                }else{
                    now_item_index = right_ans[x].jump - 1;
                    operating_record({'fun':'setItemIndex','value':now_item_index});
                }
                operating_record({'fun':'go_next','value':''});
                has_result = true;
                go_next();
                break;
            }
        }
        if(!has_result)
        {
            //絕對錯誤答案或關鍵字分析，index由0開始所以需要減1
            for(var x=0;x<error_ans.length;x++){
                if(error_ans[x].answer > '' && error_ans[x].answer == ans){
                    if(error_ans[x].jump == '999'){
                        now_item_index = 999;
                        operating_record({'fun':'setItemIndex','value':'999'});
                    }else{
                        now_item_index = error_ans[x].jump - 1;
                        operating_record({'fun':'setItemIndex','value':now_item_index});
                    }
                    operating_record({'fun':'go_next','value':''});
                    has_result = true;
                    go_next();
                    break;
                }
                if(error_ans[x].keyword > '' && ans.match(error_ans[x].keyword)!=null && error_ans[x].number != '999')
                {
                    if(error_ans[x].jump == '999'){
                        now_item_index = 999;
                        operating_record({'fun':'setItemIndex','value':'999'});
                    }else{
                        now_item_index = error_ans[x].jump - 1;
                        operating_record({'fun':'setItemIndex','value':now_item_index});
                    }
                    operating_record({'fun':'go_next','value':''});
                    has_result = true;
                    go_next();
                    break;
                }
            }
		}
        if(!has_result) {
            //如果都比對不出答案時，使用錯誤區錯誤號碼為999的選項當跳題
            for (var x = 0; x < error_ans.length; x++) {
                if (error_ans[x].number == '999') {
                    if (error_ans[x].jump == '999') {
                        now_item_index = 999;
                        operating_record({'fun': 'setItemIndex', 'value': '999'});
                    } else {
                        now_item_index = error_ans[x].jump - 1;
                        operating_record({'fun': 'setItemIndex', 'value': now_item_index});
                    }
                    operating_record({'fun': 'go_next', 'value': ''});
                    go_next();
                    break;
                }
            }
        }

    }


    $( document ).ready(function() {


    });

	/**
	* record播放專用
	* @param getIndex
	*/
	function setItemIndex(getIndex) {
		now_item_index = getIndex;
	}

	/**
	* record播放專用
	* @param getIndex
	*/
	function setPaperIndex(getIndex) {
		//ow_paper_index = getIndex;
	}

</script>