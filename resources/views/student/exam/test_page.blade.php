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
        <div class="boad-detail-wrap">
            <p>台中市臺中教育大學[! $user_data['school_grade'] !]年[! $user_data['school_class'] !]班<span class="txt-yellow">[! $user_data['user_name'] !]</span>
            </p>
            <div class="button-wrap">
                <input class="btn btn-yellow" type="button" value="學習">
                <input class="btn btn-green" type="button" value="登出">
            </div>
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
    var analy_correct = {};//分析正確時，拿下一個item_num
    var analy_error = {};//分析錯誤時，拿下一個item_num
    var item_filename = {};//item_num 對應的 模組名稱
    var model_obj = {};//模組資料
    var now_sw_item_num = 1;//現在的item_num
@foreach($exam_option_rule as $key => $value)
    analy_correct[ '[! $key !]' ] = "[! $value['correct'] !]";
    analy_error[ '[! $key !]' ] = "[! $value['error'] !]";
@endforeach
@foreach($item_num_filename as $key => $value)
    item_filename[ '[! $key !]' ] = "[! $value !]";
@endforeach

    //分析結果
    function ans_analy() {
        $.ajax({
            url: "[! route('mem.exam.ansanaly') !]",
            type: 'POST',
            data: {
                _token: token,
                csID: "[! $cs_id !]",
                paperVol: "[! $paper_vol !]",
                itemNum: now_sw_item_num
            },
            success: function (data) {
                get_next_item(data);
            }
        });
    }
    
    //根據分析結果，載入新的模組頁面
    function get_next_item(analy_result) {
        if(analy_result == 'correct'){
            if (now_sw_item_num in analy_correct) {
                now_sw_item_num = analy_correct[now_sw_item_num];
                load_module_page(now_sw_item_num);
            }
        }
        if(analy_result == 'error'){
            if (now_sw_item_num in analy_error) {
                now_sw_item_num = analy_error[now_sw_item_num];
                load_module_page(now_sw_item_num);
            }
        }
    }

    //載入模組頁面
    function load_module_page(item_num) {
        if (item_num in model_obj) {
            $('#page-body').html('').append(model_obj[ now_sw_item_num ]);
        }else{
            $.ajax({
                url: "[! route('mem.exam.getmodelpage') !]",
                type: 'POST',
                data: {
                    _token: token,
                    csID: "[! $cs_id !]",
                    paperVol: "[! $paper_vol !]",
                    itemNum: item_num
                },
                success: function (data) {
                    model_obj[ now_sw_item_num ] = data;//註冊載入的模組資料
                    $('#page-body').html('').append(data);
                }
            });
        }
    }
    
    $( document ).ready(function() {
        load_module_page(now_sw_item_num);
    });
</script>
</body>
</html>