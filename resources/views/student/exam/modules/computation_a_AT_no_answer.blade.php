<div class="answer-wrap">
	<div class="answer-form clearfix">
		<div class="answer-form clearfix">
			<div class="title-answer-wrap">
				<div class="answer-button-wrap">
					<input class="btn btn-green" type="button" value="下一步" onclick="doNext()">
				</div>
			</div>
		</div>
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
        "jump":"[! $exam_data['error_answer']['jump'][$key] !]",
        "keyword":"[! $exam_data['error_answer']['keyword'][$key] !]"
    });
	@endforeach
    /**
     * 往下一試題移動
     */
	function doNext() {
        if (right_ans[0].jump != null)
		{
            if (right_ans[0].jump == '999') {
                now_paper_index++;
                now_item_index = 0;
                operating_record({'fun': 'setPaperIndex', 'value': now_paper_index});
                operating_record({'fun': 'setItemIndex', 'value': '0'});
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
        now_paper_index = getIndex;
    }
</script>