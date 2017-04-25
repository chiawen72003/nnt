@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-exam">建立試題</h1>
        <div class="section-content">
            <ul id="exam-unit-wrap" class="clearfix">
                <li><a href="[! route('ad.exampaper.add.page') !]">新增試卷</a></li>
                <li><a href="[! route('ad.questions.add.page') !]">新增試題</a></li>
                <li><a class="current-page" href="[! route('ad.exampaper.vol.list.page') !]">編修試卷</a></li>
            </ul>
            <div class="exam-title">
                試卷名稱：單代理人 數學(單代理人)第1冊第1單元【b506】－卷02
                <input class="btn btn-delete" type="button" value="刪除試卷" onclick="del_exampaper()">
            </div>
            <form id="form-addexam-question">
                <div class="select-group">
                    <div class="label-title">請選擇試題題號</div>
                    <select name="select-level" id="select-level" class="select-s">
                        <option value="二階段">二階段</option>
                    </select>
                    <select name="select-subject" id="select-subject" class="select-s">
                        <option value="數學(單代理人)">數學(單代理人)</option>
                    </select>
                    <select name="select-book" id="select-book" class="select-s">
                        <option value="第5冊">第5冊</option>
                    </select>
                    <select name="select-unit" id="select-unit" class="select-s">
                        <option value="第1單元(時間與月曆)">第1單元(時間與月曆)</option>
                    </select>
                    <select name="select-exam" id="select-exam" class="select-s">
                        <option value="卷6">卷6</option>
                    </select>
                </div>
                <div class="question-unit">
                    <div class="question-number">【1】</div>
                    <div class="question-content">
                        <div class="question-img">
                            <img src="images/img_question.png">
                        </div>
                        <div class="question-text-wrap clearfix">
                            <div class="question-left-wrap">
                                <div class="question-item">
                                    <span>(1)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item1.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(2)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item2.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(3)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item3.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(4)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item4.png">
                                    </div>
                                </div>
                            </div>
                            <div class="question-right-wrap">
                                <div class="question-button clearfix">
                                    <a href="#" class="button-edit">修改</a>
                                    <a href="#" class="button-delete">刪除</a>
                                </div>
                                <table id="table-data">
                                    <tr>
                                        <th>試題SN</th><td>26452</td>
                                    </tr>
                                    <tr>
                                        <th>建構題</th><td>類型86</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-unit">
                    <div class="question-number">【1】</div>
                    <div class="question-content">
                        <div class="question-img">
                            <img src="images/img_question.png">
                        </div>
                        <div class="question-text-wrap clearfix">
                            <div class="question-left-wrap">
                                <div class="question-item">
                                    <span>(1)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item1.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(2)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item2.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(3)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item3.png">
                                    </div>
                                </div>
                                <div class="question-item">
                                    <span>(4)</span>
                                    <div class="question-item-img">
                                        <img src="images/question-item4.png">
                                    </div>
                                </div>
                            </div>
                            <div class="question-right-wrap">
                                <div class="question-button clearfix">
                                    <a href="#" class="button-edit">修改</a>
                                    <a href="#" class="button-delete">刪除</a>
                                </div>
                                <table id="table-data">
                                    <tr>
                                        <th>試題SN</th><td>26452</td>
                                    </tr>
                                    <tr>
                                        <th>建構題</th><td>類型86</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="submit" value="選擇完畢，送出" />
                </div>
            </form>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //移除 一個試卷資料
    function del_exampaper()
    {
        if(confirm("確定是否刪除試卷及所屬的試題嗎?")){
            $.ajax({
                url: "[! route('ad.exampaper.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    getID: '[! $exampaper_id !]'
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('試卷成功!!');
                    location.reload();
                }
            });
        }
    }

    //移除 一個試題資料
    function del_questions(id)
    {
        if(confirm("確定是否刪除試題嗎?")){
            $.ajax({
                url: "[! route('ad.questions.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    exam_paper_id: '[! $exampaper_id !]',
                    id: id
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('試題刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop