@extends('student.layout.layout')
@section('content')

<div id="page-container">
    <div id="page-body">
        <!-- 測驗資料會透過ajax塞到此處 -->
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
[! Html::script('js/webtoolkit.base64.js') !]
<script>
    var token = "[! csrf_token() !]";
    var model_obj = [];//模組資料
    var now_item_index = [! $begin_item_index !];//現在試題的index
    var now_paper_index = [! $begin_paper_index !];//現在試卷的index
    var paper_data = [];//試卷資料
    var item_data = [];//試題資料
    var item_id = 0;
    var operating_array = [];
    var play_operating_record = [];
    var student_ans = '';//學生的答案
    var feedback_list = [];//回饋類型
    var feedback_dsc = '';
    var can_update_record = false;//可否上傳操作紀錄，需要在答案分析時變true，換試卷後變成false

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
                'feedback_type': '[! $value["feedback_type"] !]'
            }
        );
        @endforeach
    @endforeach
        feedback_list.push('');
    @foreach($feedback_list as $v)
        feedback_list.push('[! $v !]');
    @endforeach

    /** todo 系統可以循環到結束，接下來測試試題正確與錯誤時，index不規則變動的狀況。 **/

    function go_next() {
        var has_item = false;
        var new_item_id = 0;
        for (var x = 0; x < item_data.length; x++) {
            if (item_data[x].paper_id == paper_data[now_paper_index] && item_data[x].item_index == now_item_index) {
                new_item_id = item_data[x].item_id;
                feedback_dsc = feedback_list[item_data[x].feedback_type];
                has_item = true;
            }
        }
        if (has_item) {
            if(can_update_record)
            {
                update_record('0');
            }
            item_id = new_item_id;
            operating_array = [];//重置操作紀錄
            load_module_page(item_id);
        }
        if (paper_data[now_paper_index] == undefined) {
            update_record('1');
            item_id = 0;
            feedback_dsc = '';
            operating_array = [];//重置操作紀錄
            alert('單元測驗結束!!');
            location.href="[! route('mem.exam') !]";
        }
        can_update_record = false;

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
    @if($is_view_record)
        @foreach($exam_record['record'] as $v)
            play_operating_record.push({'fun':'[! $v["fun"] !]','value':'[! base64_encode($v["value"]) !]'});
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
                if (play_operating_record[record_index] == undefined) {
                    record_index = 0;
                    alert('紀錄播放完畢!');
                }else{
                    var fun_value = Base64.decode(play_operating_record[record_index].value);
                    window[play_operating_record[record_index].fun](fun_value);
                    record_index++;
                    setTimeout('replay_record( )', 800);
                }
            }else{
                setTimeout('replay_record( )', 800);
            }
        @endif
    }

    /**
     * 上傳操作紀錄
     *
     */
    function update_record(is_finish) {
        @if(!$is_view_record)
            $.ajax({
                url: "[! route('mem.exam.updateRecord') !]",
                type: 'POST',
                data: {
                    _token: token,
                    unit_id: '[! $unit_id !]',
                    record:operating_array,
                    itemData : [{
                        'paper_index':now_paper_index,
                        'paper_id':paper_data[now_paper_index],
                        'item_index':now_item_index,
                        'item_id':item_id,
                        'student_ans':student_ans,
                        'feedback_dsc':feedback_dsc
                    }],
                    isFinish : is_finish

                },
                success: function (data) {

                }
            });
            student_ans = '';
        @endif
    }

    $(document).ready(function () {
        go_next();
        @if($is_view_record)
        replay_record();
        @endif

    });
</script>
@stop