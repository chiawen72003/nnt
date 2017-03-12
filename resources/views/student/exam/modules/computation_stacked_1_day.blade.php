<div class="answer-wrap">
	<div class="answer-form clearfix">
		<h1 class="section-title title-answer">算式輸入區</h1>
		<div class="answer-left-wrap">
			<div class="computation-time-wrap">
				<div class="computation-time-title">
					<span class="time-title-day">日</span><span class="time-title-hour">時</span>
				</div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_0" onclick="setIndex(0)">
					<input class="input-time" type="text" id="input_1" onclick="setIndex(1)">
					<input class="input-time" type="text" id="input_2" onclick="setIndex(2)">
					<input class="input-time" type="text" id="input_3" onclick="setIndex(3)">
					<input class="input-time" type="text" id="input_4" onclick="setIndex(4)">
					<input class="input-time" type="text" id="input_5" onclick="setIndex(5)">
					<input class="input-time" type="text" id="input_6" onclick="setIndex(6)">
				</div>
				<div class="computation-time-row">
					<span>x</span>
					<input class="input-time" type="text" id="input_7" onclick="setIndex(7)">
					<input class="input-time" type="text" id="input_8" onclick="setIndex(8)">
					<input class="input-time" type="text" id="input_9" onclick="setIndex(9)">
					<input class="input-time" type="text" id="input_10" onclick="setIndex(10)">
					<input class="input-time" type="text" id="input_11" onclick="setIndex(11)">
					<input class="input-time" type="text" id="input_12" onclick="setIndex(12)">
					<input class="input-time" type="text" id="input_13" onclick="setIndex(13)">
				</div>
				<div class="computation-line"></div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_14" onclick="setIndex(14)">
					<input class="input-time" type="text" id="input_15" onclick="setIndex(15)">
					<input class="input-time" type="text" id="input_16" onclick="setIndex(16)">
					<input class="input-time" type="text" id="input_17" onclick="setIndex(17)">
					<input class="input-time" type="text" id="input_18" onclick="setIndex(18)">
					<input class="input-time" type="text" id="input_19" onclick="setIndex(19)">
					<input class="input-time" type="text" id="input_20" onclick="setIndex(20)">
					<input class="input-time" type="text" id="input_21" onclick="setIndex(21)">
					<input class="input-time" type="text" id="input_22" onclick="setIndex(22)">
					<input class="input-time" type="text" id="input_23" onclick="setIndex(23)">
					<input class="input-time" type="text" id="input_24" onclick="setIndex(24)">
					<input class="input-time" type="text" id="input_25" onclick="setIndex(25)">
				</div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_26" onclick="setIndex(26)">
					<input class="input-time" type="text" id="input_27" onclick="setIndex(27)">
					<input class="input-time" type="text" id="input_28" onclick="setIndex(28)">
					<input class="input-time" type="text" id="input_29" onclick="setIndex(29)">
					<input class="input-time" type="text" id="input_30" onclick="setIndex(30)">
					<input class="input-time" type="text" id="input_31" onclick="setIndex(31)">
					<input class="input-time" type="text" id="input_32" onclick="setIndex(31)">
					<input class="input-time" type="text" id="input_33" onclick="setIndex(33)">
					<input class="input-time" type="text" id="input_34" onclick="setIndex(34)">
					<input class="input-time" type="text" id="input_35" onclick="setIndex(35)">
					<input class="input-time" type="text" id="input_36" onclick="setIndex(36)">
					<input class="input-time" type="text" id="input_37" onclick="setIndex(37)">
				</div>
				<div class="computation-time-button">
					<input class="input-time-button" type="button" value="換列" onclick="changeLine()">
					<input class="input-time-button" type="button" value="回上一列" onclick="backLine()">
					<input class="input-time-button" type="button" value="結束">
				</div>
			</div>
		</div>
		<div class="answer-right-wrap">
			<div class="label-group">
				<input type="radio" /><span>日-時</span>
			</div>
			<input class="input-compute" type="button" value="1" onclick="setValue('1')">
			<input class="input-compute" type="button" value="2" onclick="setValue('2')">
			<input class="input-compute" type="button" value="3" onclick="setValue('3')">
			<input class="input-compute" type="button" value="4" onclick="setValue('4')">
			<input class="input-compute" type="button" value="5" onclick="setValue('5')">
			<input class="input-compute" type="button" value="6" onclick="setValue('6')">
			<input class="input-compute" type="button" value="7" onclick="setValue('7')">
			<input class="input-compute" type="button" value="8" onclick="setValue('8')">
			<input class="input-compute" type="button" value="9" onclick="setValue('9')">
			<input class="input-compute" type="button" value="0" onclick="setValue('0')">
			<input class="input-compute" type="button" value="." onclick="setValue('.')">
			<input class="input-compute" type="button" value="Ø" onclick="setValue('Ø')">
			<input class="input-compute" type="button" value="←" onclick="unsetValue()">
			<div class="clear"></div>
			<input class="input-compute-lg" type="button" value="重新計算" onclick="resetAll()">
			<input class="input-compute-lg" type="button" value="確定" onclick="analysis()">
		</div>
	</div>
	<div class="answer-button-wrap">
		<input class="btn btn-green" type="button" value="送出" onclick="analysis()">
	</div>
</div>
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
                    now_paper_index++;
                    now_item_index = 0;
                    operating_record({'fun':'setPaperIndex','value':now_paper_index});
                    operating_record({'fun':'setItemIndex','value':'0'});
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
                    now_paper_index++;
                    now_item_index = 0;
                    operating_record({'fun':'setPaperIndex','value':now_paper_index});
                    operating_record({'fun':'setItemIndex','value':'0'});
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
                        now_paper_index++;
                        now_item_index = 0;
                        operating_record({'fun':'setPaperIndex','value':now_paper_index});
                        operating_record({'fun':'setItemIndex','value':'0'});
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
                        now_paper_index++;
                        now_item_index = 0;
                        operating_record({'fun':'setPaperIndex','value':now_paper_index});
                        operating_record({'fun':'setItemIndex','value':'0'});
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
                        now_paper_index++;
                        now_item_index = 0;
                        operating_record({'fun':'setPaperIndex','value':now_paper_index});
                        operating_record({'fun':'setItemIndex','value':'0'});
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
        now_paper_index = getIndex;
    }
</script>