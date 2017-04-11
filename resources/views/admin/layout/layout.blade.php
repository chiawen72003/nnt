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
    @yield('content')
</body>
</html>
