<h1 class="section-title title-question-number">第[! $item_num !]題</h1>
<div class="question-wrap clearfix">
    <div id="question-left">
        <div id="question-inner">
            [! $exam_data['title'] !]
        </div>
    </div>
    <div id="question-right">
        <iframe width=400 height=125 frameborder=0 scrolling=no
            src="[! $exam_data['iframe_path'] !]"></iframe>
        <div id="qustion-voicetext-wrap">
            <div id="qustion-voicetext-inner">
                @if(isset($exam_data['avatar_type']) AND count($exam_data['avatar_type']) == 1)
                    @if(isset($exam_data['table_dsc']['0']) AND $exam_data['table_dsc']['0'] > '')
                        老師：[! $exam_data['table_dsc']['0'] !]<br>
                    @endif
                @endif
                @if(isset($exam_data['avatar_type']) AND count($exam_data['avatar_type']) == 2)
                    @if(isset($exam_data['table_dsc']['0']) AND $exam_data['table_dsc']['0'] > '')
                        老師：[! $exam_data['table_dsc']['0'] !]<br>
                    @endif
                    @if(isset($exam_data['table_dsc']['1']) AND $exam_data['table_dsc']['1'] > '')
                        學生：[! $exam_data['table_dsc']['1'] !]<br>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
[! $exam_item !]