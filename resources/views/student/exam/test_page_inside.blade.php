<h1 class="section-title title-question-number">第[! $item_num !]題</h1>
<div class="question-wrap clearfix">
    <div id="question-left">
        <div id="question-inner">
            [! $exam_data['title'] !]
        </div>
    </div>
    <div id="question-right">
        <p align="center">
            <iframe width=800 height=125 frameborder=0 scrolling=no
                    src="[! $exam_data['iframe_path'] !]"></iframe>
        </p>
    </div>
</div>
<div class="title-answer-wrap" id="item_area">
    [! $exam_item !]
</div>