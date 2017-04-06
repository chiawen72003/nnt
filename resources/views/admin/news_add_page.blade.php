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
                <a href="#">建立系統公告</a>
                <a href="#">建立結構</a>
                <a href="#">建立試題</a>
                <a href="#">學習紀錄查詢</a>
                <a href="#">版本控管</a>
                <a href="#">單元上鎖</a>
                <a href="#">管理使用者</a>
                <a href="#">試卷存取</a>
                <a href="#">登出</a>
            </div>
            <div class="boad-detail-wrap">
                <p>台中市臺中教育大學十一年十四班<span class="txt-yellow">autotutor</span></p>
            </div>
            <div class="img-chalk"></div>
        </div>
    </div>
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">建立系統公告</h1>
            <div class="news-wrap">
                [! Form::open(array('url'=>route('ad.news.add'),'id'=>'addForm', 'name'=>'addForm','files'=> true)) !]
                    <div class="select-group">
                        <div class="label-title">公告標題</div>
                        <input class="select-input" type="text" name="title" id="title" value="">
                    </div>
                    <div class="select-group">
                        <div class="label-title">公告內容</div>
                        <div class="edit-wrap">
                            <textarea name="dsc" id="dsc"></textarea>
                        </div>
                    </div>
                    <div class="select-group">
                        <div class="label-title">附件檔</div>
                        <input type="file" name="updateFile" id="updateFile">
                    </div>
                    <div class="form-button-wrap">
                        <input class="btn-yellow" type="button" value="送出" onclick="checkData()" />
                    </div>
                [! Form::close() !]
            </div>
        </div>
    </div>
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
    [! Html::script('admin/js/ckeditor/ckeditor.js') !]
<script>
    CKEDITOR.replace('dsc', {});
    var is_send = false;
    function checkData()
    {
        var error_dsc = '';
        if($('#title').val() == '')
        {
            error_dsc = error_dsc + '請輸入公告標題!!\r\n';
        }
        if( error_dsc == '' && !is_send){
            $('#addForm').submit();
        }
        if(error_dsc != '')
        {
            alert(error_dsc);
        }
    }
</script>
</body>
</html>