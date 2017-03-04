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
        <h1 class="section-title title-structure">單元結構編制</h1>
        <div class="section-content">
            <div class="links-wrap">
                <a class="top-link" href="[! route('ad.unit.add.page') !]">新增單元結構</a>
            </div>
            <table>
                <tr>
                    <th>編號</th>
                    <th>版本</th>
                    <th>科目</th>
                    <th>冊</th>
                    <th>單元</th>
                    <th>名稱</th>
                    <th>功能</th>
                </tr>
                @foreach($list_data as $key => $v)
                    <tr>
                        <td>[! $key+1 !]</td>
                        <td>[! isset($module_type[$v['module_type']])?$module_type[$v['module_type']]:'' !]</td>
                        <td>[! $v['subject'] !]</td>
                        <td>[! $v['vol'] !]</td>
                        <td>[! $v['unit'] !]</td>
                        <td>[! $v['title'] !]</td>
                        <td>
                            <a class="icon-action icon-edit" href="[! route('ad.exampaper.list',array($v['id'])) !]"></a>
                            <a class="icon-action icon-delete" onclick="del_unit('[! $v['id'] !]','[! $v['title'] !]')"></a>
                            <a class="icon-action icon-lock" href="#"></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //確認是否刪除單元
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列單元的資料內容嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.unit.delete') !]",
                type:'POST',
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