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
        <h1 class="section-title title-structure">試卷編制</h1>
        <div class="section-content">
            <div class="select-group">
                <div class="label-title"><span class="txt-red">*</span>試卷名稱</div>
                <input class="select-input" type="text" id="inline_exampaper_title" value=""><span class="txt-red">(必填)</span>
            </div>
            <div class="form-button-wrap">
                <input class="btn-yellow" type="button" onclick='history.back()' value="回上一頁" />
                <input class="btn-yellow" type="button"  value="輸入完畢，建立試卷" onclick="up_exampaper()"/>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>

    //新增一個試卷
    function up_exampaper(){
        var is_Go = true;
        var error_dsc ="";
        if($('#inline_operation_title').val() ==''){
            is_Go = false;
            error_dsc +="請輸入試卷名稱!!\r\n";
        }
        if(is_Go){
            $.ajax({
                    url: "[! route('ad.exampaper.add.data') !]",
                    type:"POST",
                    data: {
                    _token: "[! csrf_token() !]",
                        getID:"[! $unit_id !]",
                        title:$('#inline_exampaper_title').val()
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('新增試卷成功!!');
                    window.location.replace(document.referrer);
                }
          });
        }

        if(error_dsc !=''){
            alert(error_dsc);
        }
    }
</script>
</body>
</html>