@extends('admin.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-access">試卷存取</h1>
            <div class="record-wrap clearfix">
                <div class="record-menu">
                    <ul>
                        <li><a class="active" href="#" tittle="一般試卷存取控制">一般試卷存取控制</a></li>
                    </ul>
                </div>
                <div class="record-content">
                    <form id="search-form">
                        <div class="sarch-bg">
                            <h3 class="search-title">試卷存取模式</h3>
                            <div class="search-line"></div>
                            <h3 class="search-title">請選取班級</h3>
                            <div class="select-group">
                                <select class="select-s" id="city_code" onchange="get_city_school()">
                                    @foreach($city_data as $k => $v)
                                        <option value="[! $k !]" >[! $v !]</option>
                                    @endforeach
                                </select>
                                <select  class="select-s" id="organization_id">
                                </select>
                                <select  class="select-s" id="grade">
                                    @for($x=1;$x<21;$x++)
                                        <option value="[! $x !]">[! $x !]年</option>
                                    @endfor
                                </select>
                                <select class="select-s" id="class" onchange="get_student_data()">
                                    @for($x=1;$x<21;$x++)
                                        <option value="[! $x !]">[! $x !]班</option>
                                    @endfor
                                </select>
                                <input class="btn-yellow" type="button" value="選擇完畢，送出" onclick="send()">
                            </div>
                        </div>
                        @if($begin_edit)
                            <div class="record-inner record-control">
                                <h3 class="record-title record-title-class" id="school_name"></h3>
                                <div class="select-group">
                                    <div class="label-title label-title-s">施測類型</div>
                                    <select class="select-s" id="module_type" onchange="change_data()">
                                        <option value="1">單代理人</option>
                                        <option value="2">雙代理人</option>
                                        <option value="3">多代理人</option>
                                    </select>
                                </div>
                                <div class="unitlock-examp-inner clearfix">
                                    <div class="unlock-examp-wrap">
                                        <h1 class="change-title">尚未開放之試卷</h1>
                                        <select id="locked-version" class="multiple-select" size="12" multiple>
                                        </select>
                                    </div>
                                    <div class="lock-button-wrap">
                                        <input type="button" value="新增 →" onclick="setAccess()">
                                        <input type="button" value="← 刪除" onclick="setLock()">
                                    </div>
                                    <div class="locked-examp-wrap">
                                        <h1 class="change-title">已開放試卷</h1>
                                        <select id="access-version" class="multiple-select" size="12" multiple>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-button-wrap">
                                    <input class="btn-yellow" type="button" value="執行" onclick="update_data()" />
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    var school_data = [];
    var subject_data = [];
    var unit_data = [];
    var exampaper_data = [];
    var access_data = [];
    @foreach($all_school as $v)
        school_data.push(
            {
                'organization_id':'[! $v['organization_id'] !]',
                'name':'[! $v['name'] !]',
                'city_code':'[! $v['city_code'] !]',
            }
    );
    @endforeach
    @if(isset($subject_data))
        @foreach($subject_data as $k => $v)
            subject_data.push(
                {
                    'id':'[! $k !]',
                    'name':'[! $v !]',
                }
        );
        @endforeach
    @endif
    @if(isset($unit_data))
            @foreach($unit_data as $v)
                unit_data.push(
                    {
                        'id':'[! $v['id'] !]',
                        'module_type':'[! $v['module_type'] !]',
                        'subject':'[! $v['subject'] !]',
                        'vol':'[! $v['vol'] !]',
                        'unit':'[! $v['unit'] !]',
                        'title':'[! $v['title'] !]',
                    }
            );
        @endforeach
    @endif
    @if(isset($exampaper_data))
        @foreach($exampaper_data as $v)
            exampaper_data.push(
                {
                    'id':'[! $v['id'] !]',
                    'paper_vol':'[! $v['paper_vol'] !]',
                    'unit_list_id':'[! $v['unit_list_id'] !]',

                }
            );
        @endforeach
    @endif
    @if(isset($access_data))
        @foreach($access_data as $v)
            access_data.push(
                {
                    'exam_paper_id':'[! $v['exam_paper_id'] !]',
                }
             );
        @endforeach
    @endif
$( document ).ready(function() {
        @if($city_code)
            $('#city_code').val('[! $city_code !]');
        @endif
        //重新設定學校資料
        get_city_school();
        @if($organization_id)
             $('#organization_id').val('[! $organization_id !]');
        @endif
        @if($grade)
             $('#grade').val('[! $grade !]');
        @endif
        @if($class)
             $('#class').val('[! $class !]');
            change_data();
            var school_name = $('#city_code :selected').text();
            school_name = school_name + $('#organization_id :selected').text();
            school_name = school_name + '[! $grade !]年';
            school_name = school_name + '[! $class !]班';
            $('#school_name').html(school_name);
        @endif
    });
    /**
     * 回傳指定縣市的學校
     */
    function get_city_school()
    {
        $("#organization_id option").remove();
        var city_code_value = $('#city_code').val();
        var total_school_num =  school_data.length;
        for(var x=0;x < total_school_num;x++)
        {
            if(school_data[x]['city_code'] == city_code_value)
            {
                $("#organization_id").append($("<option></option>").attr("value", school_data[x]['organization_id']).text(school_data[x]['name']));
            }
        }
    }

    /**
     * 送出選擇資料
     */
    function send()
    {
        var dsc = '?city_code=' + $('#city_code').val();
        dsc = dsc + '&organization_id=' + $('#organization_id').val();
        dsc = dsc + '&grade=' + $('#grade').val();
        dsc = dsc + '&class=' + $('#class').val();
        location.href = "[! route('ad.exampaperaccess.list.page') !]"+dsc;
    }

    /**
     * 更換不同代理人的試卷存取資料
     */
    function change_data()
    {
        $("#access-version option").remove();
        $("#locked-version option").remove();

        var exampaper_data_num = exampaper_data.length;
        var access_data_num = access_data.length;
        var unit_data_num = unit_data.length;
        var type_data = $('#module_type').val();
        var switch_unit = [];
        //取出指定代理人的單元
        for(var x=0; x < unit_data_num; x++)
        {
            if(unit_data[x]['module_type'] == type_data)
            {
                switch_unit.push(unit_data[x]['id']);
            }
        }

        for(var x=0;x < exampaper_data_num;x++)
        {
            if(switch_unit.indexOf(exampaper_data[x]['unit_list_id']) != -1)
            {
                var has_access = false;
                for(var y=0;y< access_data_num;y++)
                {

                    if(access_data[y]['exam_paper_id'] == exampaper_data[x]['id'])
                    {
                        has_access = true;
                    }
                }
                var name = build_name(exampaper_data[x]['unit_list_id']);
                    name = name + exampaper_data[x]['paper_vol'] + '卷';
                if(has_access)
                {
                    $("#access-version").append($("<option></option>").attr("value", exampaper_data[x]['id']).text(name));

                }else{
                    $("#locked-version").append($("<option></option>").attr("value", exampaper_data[x]['id']).text(name));
                }
            }
        }
    }

    /**
     * 組合出試卷名稱
     */
    function build_name(unit_id)
    {
        var name = '';
        for(var x=0;x<unit_data.length;x++)
        {
            if(unit_data[x]['id'] == unit_id){
                if(unit_data[x]['module_type'] == 1){
                    name = name + '(單代理人)';
                }
                if(unit_data[x]['module_type'] == 2){
                    name = name + '(雙代理人)';
                }
                if(unit_data[x]['module_type'] == 3){
                    name = name + '(多代理人)';
                }
                for(var y=0;y< subject_data.length;y++){
                    if(subject_data[y]['id'] == unit_data[x]['subject'])
                    {
                        name = subject_data[y]['name'] + name ;
                    }
                }
                name =  name + unit_data[x]['vol'] + '冊';
                name =  name + unit_data[x]['unit'] + '單元';
            }
        }

        return name;
    }

    //取消存取
    function setLock()
    {
        $('#access-version :selected').each(function(i, selected){
            for(var x=0;x<access_data.length;x++)
            {
               if(access_data[x]['exam_paper_id'] == $(selected).val())
               {
                   access_data.splice(x,1);
                   break;
               }
            }
        });
        change_data();
    }

    //可以存取
    function setAccess()
    {
        $('#locked-version :selected').each(function(i, selected){
            access_data.push(
                {
                    'exam_paper_id':$(selected).val(),
                }
            );
        });
        change_data();
    }

    //更新資料
    var isSend = false;
    function update_data() {
        var new_access_data = [];
        for(var x=0;x < access_data.length;x++)
        {
            new_access_data.push(access_data[x]['exam_paper_id']);
        }

        if(!isSend)
        {
            //isSend = true;
            $.ajax({
                url: "[! route('ad.exampaperaccess.update') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    exam_paper_id:new_access_data,
                    organization_id:'[! $organization_id !]',
                    grade:'[! $grade !]',
                    class:'[! $class !]',
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('更新完畢!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop