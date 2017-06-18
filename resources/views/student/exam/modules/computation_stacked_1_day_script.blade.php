<script>
	var now_index = 0;
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
        "number":"[! $exam_data['error_answer']['number'][$key] !]",
        "jump":"[! $exam_data['error_answer']['jump'][$key] !]",
        "keyword":"[! $exam_data['error_answer']['keyword'][$key] !]"
    });
	@endforeach

	//設定index
	function setIndex(getIndex) {
        operating_record({'fun':'setIndex','value':getIndex});
        now_index = getIndex;
    }
	//設定數值
    function setValue(getValue){
        operating_record({'fun':'setValue','value':getValue});
        $('#input_'+now_index).val(getValue);
        now_index++;
        if( now_index == 38){
            now_index = 0;
		}
        $('#input_'+now_index).focus();

	}
    //刪除數值
    function unsetValue(){
        operating_record({'fun':'unsetValue','value':''});
        $('#input_'+now_index).val('');
        now_index--;
        if( now_index < 0){
            now_index = 37;
        }
        $('#input_'+now_index).focus();
    }
    //歸零
    function resetAll(){
        operating_record({'fun':'resetAll','value':''});
        for(var x=0;x<38;x++){
            $('#input_'+ x).val('');
		}
        now_index = 0;
        $('#input_0').focus();
    }
	//換下一列
	function changeLine() {
        operating_record({'fun':'changeLine','value':''});

		if(now_index < 7){
            now_index = 7;
            $('#input_7').focus();
		}else if(now_index < 14){
            now_index = 14;
            $('#input_14').focus();
		}else if(now_index < 26){
            now_index = 26;
            $('#input_26').focus();
        }else{
            $('#input_'+ now_index).focus();
        }
    }
    //回上一列
    function backLine(){
        operating_record({'fun':'backLine','value':''});

        if(now_index > 25){
            now_index = 14;
            $('#input_14').focus();
        }else if(now_index > 13){
            now_index = 7;
            $('#input_7').focus();
        }else if(now_index > 6){
            now_index = 0;
            $('#input_0').focus();
        }else{
            $('#input_'+ now_index).focus();
		}
	}
    $( document ).ready(function() {
        operating_record({'fun':'setIndex','value':'0'});
        $('#input_0').focus();
    });

    /**
	 * 答案分析
     */
    function analysis() {
        can_update_record = true;
        var has_result = false;
		var ans = '';
		for(var x=14;x<38;x++){
		    if($('#input_'+x).val() != ''){
		        ans = ans + $('#input_'+x).val();
			}
		}
        student_ans = ans;
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
        if(!has_result)
		{
            //如果都比對不出答案時，使用錯誤區錯誤號碼為999的選項當跳題
            for(var x=0;x<error_ans.length;x++){
                if(error_ans[x].number == '999')
                {
                    if(error_ans[x].jump == '999'){
                        now_item_index = 999;
                        operating_record({'fun':'setItemIndex','value':'999'});
                    }else{
                        now_item_index = error_ans[x].jump - 1;
                        operating_record({'fun':'setItemIndex','value':now_item_index});
                    }
                    operating_record({'fun':'go_next','value':''});
                    console.log('ans_4');
                    go_next();
                    break;
                }
            }
		}
    }

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
        //now_paper_index = getIndex;
    }
</script>