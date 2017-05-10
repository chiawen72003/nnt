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
                                <h3 class="record-title record-title-class">新北市縣立新莊國中7年1班</h3>
                                <div class="select-group">
                                    <div class="label-title label-title-s">施測類型</div>
                                    <select class="select-s" id="module_type" onchange="sw_module_type()">
                                        <option value="1">單代理人</option>
                                        <option value="2">雙代理人</option>
                                        <option value="3">多代理人</option>
                                    </select>
                                </div>
                                <div class="unitlock-examp-inner clearfix">
                                    <div class="unlock-examp-wrap">
                                        <h1 class="change-title">尚未開放之試卷</h1>
                                        <select name="unlock-version" id="unlock-version" class="multiple-select" size="12" multiple>
                                            <option value="二階段數學(單代理人)第05冊第01單元-卷01" title="二階段數學(單代理人)第05冊第01單元-卷01">二階段數學(單代理人)第05冊第01單元-卷01</option>
                                            <option value="二階段數學(單代理人)第05冊第01單元-卷02" title="二階段數學(單代理人)第05冊第01單元-卷02">二階段數學(單代理人)第05冊第01單元-卷02</option>
                                            <option value="二階段數學(單代理人)第11冊第05單元-卷01" title="二階段數學(單代理人)第11冊第05單元-卷01">二階段數學(單代理人)第11冊第05單元-卷01</option>
                                            <option value="二階段數學(單代理人)第11冊第05單元-卷02" title="二階段數學(單代理人)第11冊第05單元-卷02">二階段數學(單代理人)第11冊第05單元-卷02</option>
                                            <option value="二階段數學(單代理人)第11冊第08單元-卷01" title="二階段數學(單代理人)第11冊第08單元-卷01">二階段數學(單代理人)第11冊第08單元-卷01</option>
                                        </select>
                                    </div>
                                    <div class="lock-button-wrap">
                                        <input type="button" value="新增 →">
                                        <input type="button" value="← 刪除">
                                    </div>
                                    <div class="locked-examp-wrap">
                                        <h1 class="change-title">已開放試卷</h1>
                                        <select name="locked-version" id="locked-version" class="multiple-select" size="12" multiple>
                                            <option value="ECD教材數學(單代理人)第13冊第01單元-卷01【貝氏適性出題，全測】" title="ECD教材數學(單代理人)第13冊第01單元-卷01【貝氏適性出題，全測】">ECD教材數學(單代理人)第13冊第01單元-卷01【貝氏適性出題，全測】</option>
                                            <option value="ECD教材數學(單代理人)第13冊第06單元-卷01【亂數出題】" title="ECD教材數學(單代理人)第13冊第06單元-卷01【亂數出題】">ECD教材數學(單代理人)第13冊第06單元-卷01【亂數出題】</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-button-wrap">
                                    <input class="btn-yellow" type="submit" value="執行" />
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
                    'title':'[! $v['title'] !]',
                }
            );
        @endforeach
    @endif
    @if(isset($access_data))
        @foreach($access_data as $v)
            access_data.push(
                {
                    'id':'[! $v['id'] !]',
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
     * 選擇代理人類型
     */
    function sw_module_type()
    {

    }
</script>
@stop