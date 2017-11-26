<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    [! Html::style('style/reset.css') !]
    [! Html::style('style/style.css') !]
    [! Html::style('style/sweetalert2.min.css') !]
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
            <a href="[! route('mem.news') !]">系統公告</a>
            <a href="[! route('mem.exam.pg') !]">學習</a>
            <a href="[! route('mem.achievement') !]">成果查詢</a>
            <a href="[! route('mem.logout') !]">登出</a>
        </div>
        <div class="boad-detail-wrap">
            <p>[! $user_data['school_title'] !]<span class="txt-yellow">[! $user_data['uname'] !]</span></p>
        </div>
        <div class="img-chalk"></div>
    </div>
</div>
    @yield('content')
</body>
</html>
