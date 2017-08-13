[! $exam_item !]
<h1 id="hide_item_num" style="display: none;">第[! $item_num !]題</h1>
<div id="hide_question_inner" style="display: none;">
    [! $exam_data['title'] !]
</div>
<div id="hide_qustion_voicetext_inner" style="display: none;">
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
<script>
var t_data = $('#hide_item_num').html();
$('#item_num').html(t_data);
t_data = $('#hide_question_inner').html();
$('#exam_title').html(t_data);
$('#iframe_head').attr('src','[! $exam_data['iframe_path'] !]');
t_data = $('#hide_qustion_voicetext_inner').html();
$('#qustion-voicetext-inner').append(t_data);
$('#qustion-voicetext-inner').scrollTop(9999999);;
</script>