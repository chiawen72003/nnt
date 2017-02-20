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
            load_module_page(item_id);
        }
        if (paper_data[now_paper_index] == undefined) {
           //將紀錄送出後結束，以後由各試題送出自己的操作紀錄
            update_record();
            alert('單元測驗結束!!');
            location.href="[! route('mem.exam') !]";
        }
    }

    //載入模組頁面
    var module_is_load = false;
    function load_module_page(id) {
        module_is_load = false;
        var has_model = false;
        for(var x=0;x<model_obj.length;x++){
            if(model_obj[x].id == item_id ){
                $('#page-body').html('').append(model_obj[x].model_data);
                has_model = true;
                module_is_load = true;
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
                    $('#page-body').html('').append(data);
                    module_is_load = true;
                }
            });
        }
    }

    /**
     * 操作存檔
     */
    var operating_array = [];
    @if($is_view_record)
        @foreach($exam_record['record'] as $v)
            operating_array.push({'fun':'[! $v["fun"] !]','value':'[! $v["value"] !]'});
        @endforeach
    @endif
    function operating_record(getObj) {
        @if(!$is_view_record)
            operating_array.push(getObj);
        @endif
    }

    /**
     * 播放操作紀錄
     *
     * 備註：
     * 所有播放動作都需要在模組確定載入完畢後才能執行，若尚未載入完畢，則延遲時間等到確定載入完畢才繼續執行。
     */
    var record_index = 0;
    function replay_record() {
        @if($is_view_record)
            if(module_is_load){
                if (operating_array[record_index] == undefined) {
                    record_index = 0;
                    alert('紀錄播放完畢!');
                }else{
                    window[operating_array[record_index].fun](operating_array[record_index].value);
                    record_index++;
                    setTimeout('replay_record( )', 1000);
                }
            }else{
                setTimeout('replay_record( )', 1000);
            }
        @endif
    }

    /**
     * 上傳操作紀錄
     *
     */
    function update_record() {
        $.ajax({
            url: "[! route('mem.exam.updateRecord') !]",
            type: 'POST',
            data: {
                _token: token,
                unit_id: '[! $unit_id !]',
                record:operating_array
            },
            success: function (data) {

            }
        });
    }

    $(document).ready(function () {
        go_next();
        replay_record();
    });
</script>
</body>
</html>