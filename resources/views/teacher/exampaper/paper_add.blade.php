@extends('teacher.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-exam">建立試題</h1>
        <div class="section-content">
            <ul id="exam-unit-wrap" class="clearfix">
                <li><a class="current-page" href="[! route('ta.exampaper.add.page') !]">新增試卷</a></li>
                <li><a href="[! route('ta.questions.add.page') !]">新增試題</a></li>
                <li><a href="[! route('ta.exampaper.vol.list.page') !]">編修試卷</a></li>
            </ul>
            <div class="exam-tip">※若以下選單無法選擇，表示您尚未建立任何單元結構！</div>
            [! Form::open(array('url'=>route('ta.exampaper.add.data'),'id'=>'addForm', 'name'=>'addForm', 'files' => true)) !]
            [! Form::hidden('unit_list_id', '' , array('id' => 'unit_list_id')) !]
                <div class="select-group">
                    <div class="label-title">版本</div>
                    <select id="module_type" onchange="get_subject_option()">
                        <option value="">請選擇</option>
                        <option value="1">單代理人</option>
                        <option value="2">雙代理人</option>
                        <option value="3">多代理人</option>
                    </select>
                </div>
                <div class="select-group" onchange="get_subject_vol_option()">
                    <div class="label-title">科目</div>
                    <select id="subject">
                        <option value="">請選擇</option>
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">冊別</div>
                    <select id="subject_vol" onchange="get_subject_unit_option()">
                        <option value="">請選擇</option>
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">單元</div>
                    <select id="subject_unit">
                        <option value="">請選擇</option>
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">卷別</div>
                    <select name="paper_vol" id="paper_vol">
                        <option value="">請選擇</option>
                        @for($x=1;$x<51;$x++)
                            <option value="[! $x !]">[! $x !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title"><span class="txt-red">*</span>示意圖</div>
                    <input type="file" name="img" id="img" accept="image/*"><span class="txt-red">(必填)</span>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="button" value="選擇完畢，送出" onclick="chk()"/>
                </div>
            [! Form::close() !]
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>
    var unit_data = [];
    var subject_data = [];
@foreach($unit_data as $v)
    @if($v['is_lock'] == 0)
        unit_data.push({
            'id':'[! $v["id"] !]',
            'module_type':'[! $v["module_type"] !]',
            'subject':'[! $v["subject"] !]',
            'subject_vol':'[! $v["vol"] !]',
            'subject_unit':'[! $v["unit"] !]',
        });
    @endif
@endforeach
@if(isset($subject_access))
    @foreach($subject_data as $k => $v)
        @if(in_array($k, $subject_access))
        subject_data.push({
        'id':'[! $k !]',
        'name':'[! $v !]',
        });
        @endif
    @endforeach
@else
    @foreach($subject_data as $k => $v)
    subject_data.push({
        'id':'[! $k !]',
        'name':'[! $v !]',
    });
    @endforeach
@endif

    function get_subject_option()
    {
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

    //資料檢查
    function chk(){
        var is_Go = true;
        var error_dsc ="";
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var subject_vol_value = $("#subject_vol").val();
        var subject_unit_value = $("#subject_unit").val();
        var vol_value = $("#vol").val();
        var img_value = $("#img").val();
        if(module_type_value != ''
            && subject_value != ''
            && subject_vol_value !=''
            && subject_unit_value !=''
            && vol_value !=''
            && img_value !=''
        )
        {
            if(is_Go){
                for(var x=0;x < unit_data.length;x++)
                {
                    if(unit_data[x]['module_type'] == module_type_value
                        && unit_data[x]['subject'] == subject_value
                        && unit_data[x]['subject_vol'] == subject_vol_value
                        && unit_data[x]['subject_unit'] == subject_unit_value
                    )
                    {
                        $('#unit_list_id').val(unit_data[x]['id']);
                    }
                }
                is_Go = false;
                $('#addForm').submit();
            }
        }else{
            error_dsc +="請檢查選項或示意圖是否有缺少!!\r\n";
        }

        if(error_dsc !=''){
            alert(error_dsc);
        }
    }
</script>
@stop