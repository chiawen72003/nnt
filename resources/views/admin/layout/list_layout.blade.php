<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>合作問題解決數位學習系統</title>
    [! Html::style('admin/css/admin.css') !]
    [! Html::style('admin/css/normalize.css') !]
    [! Html::style('admin/css/jquery-ui.css') !]
    [! Html::style('admin/css/colorbox.css') !]
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
    [! Html::script('admin/js/javascript.js') !]
    [! Html::script('admin/js/jquery-ui.js') !]
    [! Html::script('admin/js/jquery.colorbox.js') !]
    <script language="javascript">
        $(function () {
            $('#showShareData').colorbox({width: "100%", height: "70%", iframe: true});//註冊登箱內的超連結
        });
    </script>
</head>
<body>
<aside>
    <h1><img src="[! url('/images/title.png')  !]" title=""/></h1>
    <ul>
        <li><a href="[! route('ad.index') !]" title="單元列表"><img src="[! url('images/icon_add.png')  !]"/>單元列表</a></li>
        <li><a href="[! route('ad.subject.list') !]" title="科目列表"><img src="[! url('images/icon_add.png')  !]"/>科目列表</a></li>
        <li><a href="[! route('mem.admin.list') !]" title="管理員列表"><img src="[! url('images/icon_add.png')  !]"/>管理員列表</a></li>
        <li><a href="[! route('ad.school.list') !]" title="學校列表"><img src="[! url('images/icon_add.png')  !]"/>學校列表</a></li>
        <li><a href="[! route('ad.logout') !]" title="登出系統"><img src="[! url('images/icon_logout.png')  !]"/>登出系統</a></li>
    </ul>
</aside>
    @yield('content')
</body>
</html>
