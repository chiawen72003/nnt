@extends('teacher.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-record">學習紀錄查詢</h1>
            <div class="record-wrap clearfix">
                <div class="record-menu">
                    <ul>
                        <li><a class="active" href="[! route('ta.examrecord.list.page') !]" tittle="學習紀錄查詢">學習紀錄查詢</a></li>
                    </ul>
                </div>
                <div class="record-content">
                    <div class="record-inner">
                        <h3 class="record-title">學習紀錄詳細表<a class="record-download" href="[! route('ta.examrecord.download.record',array($exam_record['id'],$uid)) !]" target="_blank">下載</a></h3>
                        <table class="table-detail2">
                            <tr>
                                <th>對話順序</th>
                                <th>作答題號</th>
                                <th>學生回答內容</th>
                                <th class="td-response">電腦回應內容</th>
                                <th>答對/答錯</th>
                                <th>回饋類型</th>
                            </tr>
                            @foreach($exam_record['use_item'] as $key => $v)
                                <tr>
                                    <td>[! $key+1 !]</td>
                                    <td>[! $v['item_id'] !]</td>
                                    <td>[! $v['student_ans'] !]</td>
                                    <td></td>
                                    <td></td>
                                    <td>[! $v['feedback_dsc'] !]</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="record-button-wrap">
                            <input class="btn-yellow" type="button" value="回查詢列表" onclick="javascript:window.history.back();">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>

</script>
@stop