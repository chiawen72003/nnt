<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    [! Html::style('style/reset.css') !]
    [! Html::style('style/style.css') !]
    [! Html::style('admin/css/jcarousel.responsive.css') !]
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
            <a href="[! route('ta.examrecord.list.page') !]" title="學習紀錄查詢">學習紀錄查詢</a>
            <a href="[! route('ta.unit.list') !]" title="建立結構">建立結構</a>
            <a href="[! route('ta.exampaper.add.page') !]" title="建立試題">建立試題</a>
            <a href="[! route('ta.script.add.page') !]" title="教學劇本設計路徑">教學劇本設計路徑</a>
            <a href="[! route('ta.logout') !]" title="登出系統">登出</a>
        </div>
        <div class="boad-detail-wrap">
            <p>教師：<span class="txt-yellow">[! $uname !]</span></p>
        </div>
        <div class="img-chalk"></div>
    </div>
</div>
    @yield('content')
</body>
</html>
