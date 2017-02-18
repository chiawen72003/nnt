<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    [! Html::style('style/reset.css') !]
    [! Html::style('style/style.css') !]
    <script>
        window.onload = function () {
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
            <a href="#">系統公告</a>
            <a href="[! route('mem.exam') !]">學習</a>
            <a href="#">成果查詢</a>
            <a href="[! route('mem.logout') !]">登出</a>
        </div>
        <div class="boad-detail-wrap">
            <p>台中市臺中教育大學[! $user_data['school_grade'] !]年[! $user_data['school_class'] !]班<span class="txt-yellow">[! $user_data['user_name'] !]</span>
            </p>
        </div>
        <div class="img-chalk"></div>
    </div>
</div>
<div id="page-container">
    <input type="button" onclick="go_next()" value="下一題">

    <div id="page-body">
        <!-- 測驗資料會透過ajax塞到此處 -->
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    var token = "[! csrf_token() !]";
    var model_obj = [];//模組資料
    var now_item_index = 0;//現在試題的index
    var now_paper_index = 0;//現在試卷的index
    var paper_data = [];//試卷資料
    var item_data = [];//試題資料
    var item_id = 0;

    @foreach($paper_data as $key => $value)
        paper_data.push("[! $value !]");
    @endforeach
    @foreach($questions_item_data as $id => $v)
        @foreach($v as $key => $value)
        item_data.push(
        {
            'paper_id': '[! $id !]',
            'item_index': '[! $key !]',
            'item_id': '[! $value["id"] !]',
        }
    );
    @endforeach
    @endforeach

    /** todo 系統可以循環到結束，接下來測試試題正確與錯誤時，index不規則變動的狀況。 **/

    function go_next() {
        var has_item = false;
        for (var x = 0; x < item_data.length; x++) {
            if (item_data[x].paper_id == paper_data[now_paper_index] && item_data[x].item_index == now_item_index) {
                item_id = item_data[x].item_id;
                has_item = true;
            }
        }
        if (has_item) {
            now_item_index++;//設計完就可以移除了
            load_module_page(item_id);
        } else {
            //設計完以後，這邊修改成為測驗結束，回到單元list
            now_paper_index++;
            now_item_index = 0;
            if (paper_data[now_paper_index] == undefined) {
                now_paper_index = 0;
                alert('沒有試卷了，重新循環一次');
            }
            go_next();
        }

    }

    //載入模組頁面
    function load_module_page(id) {
        var has_model = false;
        for(var x=0;x<model_obj.length;x++){
            if(model_obj[x].id == item_id ){
                $('#page-body').html('').append(model_obj[x].model_data);
                has_model = true;
            }
        }
        if(!has_model){
            $.ajax({
                url: "[! route('mem.exam.getmodelpage') !]",
                type: 'POST',
                data: {
                    _token: token,
                    item_id: id
                },
                success: function (data) {
                    model_obj.push({
                        'id':item_id,
                        'model_data':data
                    });
                    console.log('網路取檔:'+item_id);
                    $('#page-body').html('').append(data);
                }
            });
        }
    }

    $(document).ready(function () {
        go_next();
    });
</script>
</body>
</html>