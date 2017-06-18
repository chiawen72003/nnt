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
        "jump":"[! $exam_data['error_answer']['jump'][$key] !]",
        "number":"[! $exam_data['error_answer']['number'][$key] !]",
        "keyword":"[! $exam_data['error_answer']['keyword'][$key] !]"
    });
	@endforeach
    /**
     * 往下一試題移動
     */
	function doNext() {
        if (right_ans[0].jump != null)
		{
            can_update_record = true;
            student_ans = '';
            if (right_ans[0].jump == '999') {
                now_item_index = 999;
                operating_record({'fun': 'setItemIndex', 'value': '999'});
            } else {
                now_item_index = right_ans[0].jump - 1;
                operating_record({'fun': 'setItemIndex', 'value': now_item_index});
            }
            operating_record({'fun':'go_next','value':''});
			go_next();
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