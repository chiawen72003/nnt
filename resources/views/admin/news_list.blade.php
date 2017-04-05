<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    [! Html::style('style/reset.css') !]
    [! Html::style('style/style.css') !]
    <script>
        window.onload = function (){
            var docHeight = document.body.offsetHeight,
                wrapHeight = docHeight - document.getElementById("header").offsetHeight;

            // 設定page-body元素高度
            document.getElementById("page-body").style.minHeight = wrapHeight + "px";
        }
    </script>
</head>
<body class="is-login">
<div id="header">
    <div class="header-top">
        <div id="header-logo"></div>
    </div>
    <div id="boad-wrap" class="boad-wrap">
        <div id="boad-nav">
            <a href="[! route('ad.news.list') !]" title="建立系統公告">建立系統公告</a>
            <a href="[! route('ad.index') !]" title="單元列表">單元列表</a>
            <a href="[! route('ad.subject.list') !]" title="科目列表">科目列表</a>
            <a href="[! route('mem.admin.list') !]" title="管理員列表">管理員列表</a>
            <a href="[! route('ad.school.list') !]" title="學校列表">學校列表</a>
            <a href="[! route('ad.logout') !]" title="登出系統">登出</a>
        </div>
        <div class="boad-detail-wrap">
            <p>管理員：<span class="txt-yellow">autotutor</span></p>
        </div>
        <div class="img-chalk"></div>
    </div>
</div>
<div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">系統公告管理</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time">時間</th>
                            <th class="th-title">公告標題</th>
                            <th class="th-file">附件檔</th>
                            <th class="th-button">功能</th>
                        </tr>
                        @foreach($list_data as $key => $news)
                            <tr>
                                <td>[! $key+1 !]</td>
                                <td>[! substr($news['updated_at'],0,10) !]</td>
                                <td>[! $news['title'] !]</td>
                                <td>[! $news['file_name'] !]</td>
                                <td>
                                    <a class="icon-action icon-edit" href="admin_conceptStructure_edit.html"></a>
                                    <a class="icon-action icon-delete" href="" onclick="del_unit('[! $news["id"] !]','[! $news["title"] !]')"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //確認是否刪除單元
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列標題的資料嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.news.delete') !]",
                type:'DELETE',
                data: {
                    _token: '[! csrf_token() !]',
                    getID:get_id,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('資料刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
</body>
</html>