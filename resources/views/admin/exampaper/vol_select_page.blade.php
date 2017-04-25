@extends('admin.layout.layout')
@section('content')<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-exam">建立試題</h1>
        <div class="section-content">
            <ul id="exam-unit-wrap" class="clearfix">
                <li><a href="[! route('ad.exampaper.add.page') !]">新增試卷</a></li>
                <li><a href="[! route('ad.questions.add.page') !]">新增試題</a></li>
                <li><a class="current-page" href="[! route('ad.exampaper.vol.list.page') !]">編修試卷</a></li>
            </ul>
                <div class="select-group">
                    <div class="label-title">請選擇試題題號</div>
                    <select id="module_type" class="select-s" onchange="get_subject_option()">
                        <option value="">請選擇</option>
                        <option value="1">單代理人</option>
                        <option value="2">雙代理人</option>
                        <option value="3">多代理人</option>
                    </select>
                    <select id="subject" class="select-s" onchange="get_subject_vol_option()">
                        <option value="">請選擇</option>
                    </select>
                    <select id="subject_vol" class="select-s" onchange="get_subject_unit_option()">
                        <option value="">請選擇</option>
                    </select>
                    <select id="subject_unit" class="select-s" onchange="get_vol_option()">
                        <option value="">請選擇</option>
                    </select>
                    <select id="vol" name="vol" class="select-s">
                        <option value="">請選擇</option>
                    </select>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="button" value="選擇完畢，送出" onclick="send()" />
                </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>
    var unit_data = [];
    var subject_data = [];
    var exampaper_data = [];

    @foreach($unit_data as $v)
    unit_data.push({
        'id':'[! $v["id"] !]',
        'module_type':'[! $v["module_type"] !]',
        'subject':'[! $v["subject"] !]',
        'subject_vol':'[! $v["vol"] !]',
        'subject_unit':'[! $v["unit"] !]',
    });
    @endforeach
    @foreach($subject_data as $k => $v)
    subject_data.push({
        'id':'[! $k !]',
        'name':'[! $v !]',
    });
    @endforeach
    @foreach($exampaper_data as $k => $v)
    exampaper_data.push({
        'id':'[! $v['id'] !]',
        'unit_list_id':'[! $v['unit_list_id'] !]',
        'paper_vol':'[! $v['paper_vol'] !]',
    });
    @endforeach

    $( document ).ready(function() {


    });

    function get_subject_option()
    {
        get_people_pic();
        var t_array = [];
        var module_type_value = $("#module_type").val();
        if(module_type_value != '')
        {
            $("#subject option").remove();
            $("#subject").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(unit_data[x]['module_type'] == module_type_value)
                {
                    t_array.push(unit_data[x]['subject']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {

                    $("#subject").append($("<option></option>").attr("value", t_array[x]).text(get_subject_name(t_array[x])));
                }
            }
        }
    }

    function get_subject_vol_option()
    {
        var t_array = [];
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        if(module_type_value != '' && subject_value != '')
        {
            $("#subject_vol option").remove();
            $("#subject_vol").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(unit_data[x]['module_type'] == module_type_value && unit_data[x]['subject'] == subject_value)
                {
                    t_array.push(unit_data[x]['subject_vol']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {
                    $("#subject_vol").append($("<option></option>").attr("value", t_array[x]).text(t_array[x]));
                }
            }
        }
    }

    function get_subject_unit_option()
    {
        var t_array = [];
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var subject_vol_value = $("#subject_vol").val();
        if(module_type_value != '' && subject_value != '' && subject_vol_value !='')
        {
            $("#subject_unit option").remove();
            $("#subject_unit").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(
                        unit_data[x]['module_type'] == module_type_value
                        && unit_data[x]['subject'] == subject_value
                        && unit_data[x]['subject_vol'] == subject_vol_value
                )
                {
                    t_array.push(unit_data[x]['subject_unit']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {
                    $("#subject_unit").append($("<option></option>").attr("value", t_array[x]).text(t_array[x]));
                }
            }
        }
    }

    function get_vol_option()
    {
        $("#vol option").remove();
        $("#vol").append($("<option></option>").attr("value", '').text('請選擇'));
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var subject_vol_value = $("#subject_vol").val();
        var subject_unit_value = $("#subject_unit").val();

        for(var x=0;x < unit_data.length;x++)
        {
            if(unit_data[x]['module_type'] == module_type_value
                    && unit_data[x]['subject'] == subject_value
                    && unit_data[x]['subject_vol'] == subject_vol_value
                    && unit_data[x]['subject_unit'] == subject_unit_value
            )
            {
                var unit_list_id = unit_data[x]['id'];
                for(var x=0;x < exampaper_data.length;x++)
                {
                    if( exampaper_data[x]['unit_list_id'] == unit_list_id )
                    {
                        $("#vol").append($("<option></option>").attr("value", exampaper_data[x]['id']).text('卷'+exampaper_data[x]['paper_vol']));
                    }
                }
            }
        }
    }

    // 取得科目名稱
    function get_subject_name(id)
    {
        var dsc = '';
        for(var x=0;x<subject_data.length;x++)
        {
            if(subject_data[x]['id'] == id)
            {
                dsc = subject_data[x]['name'];
            }
        }

        return dsc;
    }
    // 去掉陣列重複的值
    function unique1(array){
        var n = [];
        for(var i = 0; i < array.length; i++){
            if (n.indexOf(array[i]) == -1) n.push(array[i]);
        }

        return n;
    }

    /**
     * 切換頁面
     */
    function send()
    {
        if($('#vol').val() > '')
        {
            location.href="[! route('ad.exampaper.list.page',array('')) !]"+$('#vol').val();
        }
    }
</script>
@stop