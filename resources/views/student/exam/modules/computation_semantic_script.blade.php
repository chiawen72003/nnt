<script>
    var get_ans = '';//正確答案
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

	 $('#module_text_area').change(function(){
        recordValue();
    });

    //設定record數值
    function recordValue(){
        operating_record({'fun':'setValue','value':$('#module_text_area').val()});

    }

    //設定填充區
    function setValue(getValue){
        $('#module_text_area').val(getValue);
    }

    /**
     * 比對答案，上傳學生答案進行語意分析
     *
     */
    function analysis() {
        if($('#module_text_area').val() != '')
        {
            student_ans = $('#module_text_area').val();
            //將學生作答資料放入對話區
            var std_ans = '學生：' + student_ans + '<br>';
            $('#qustion-voicetext-inner').append(std_ans);
            $('#qustion-voicetext-inner').scrollTop(9999999);;


            $.ajax({
                url: "[! route('mem.exam.semantic.analysis') !]",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: token,
                    student_ans:$('#module_text_area').val(),
                    exam_paper_id:paper_id,
                    item_id:item_id
                },
				error:function (data) {
                    can_update_record = true;
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
                            go_next();
                            break;
                        }
                    }
				},
                success: function (data) {
                    can_update_record = true;
                    if(data['type'] == 'no_match'){
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
                                go_next();
                                break;
                            }
                        }
					}
                    if(data['type'] == 'right'){
                        if(data['jump'] == '999'){
                            now_item_index = 999;
                            operating_record({'fun':'setItemIndex','value':'999'});
                        }else{
                            now_item_index = data['jump'] - 1;
                            operating_record({'fun':'setItemIndex','value':now_item_index});
                        }
                        operating_record({'fun':'go_next','value':''});
                        go_next();
                    }
                    if(data['type'] == 'error'){
                        if(data['jump'] == '999'){
                            now_item_index = 999;
                            operating_record({'fun':'setItemIndex','value':'999'});
                        }else{
                            now_item_index = data['jump'] - 1;
                            operating_record({'fun':'setItemIndex','value':now_item_index});
                        }
                        operating_record({'fun':'go_next','value':''});
                        go_next();
                    }

                }
            });
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
		//now_paper_index = getIndex;
	}
</script>