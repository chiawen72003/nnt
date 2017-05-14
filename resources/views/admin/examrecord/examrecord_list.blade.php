@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-record">學習紀錄查詢</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a class="active" href="[! route('ad.examrecord.list.page') !]" tittle="學習紀錄查詢">學習紀錄查詢</a></li>
                </ul>
            </div>
            <div class="record-content">
                <div class="sarch-bg">
                    <h3 class="search-title">請選取班級及學生</h3>
                    <form id="search-form">
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
                            <select id="uid" class="select-s">
                            </select>
                        </div>
                        <div class="search-button-wrap">
                            <input class="btn-yellow" type="button" value="送出" onclick="send()">
                        </div>
                    </form>
                </div>
                <div class="record-inner">
                    @if(isset($list_data) and $list_data != null)
                        <h3 class="record-title">學習紀錄列表</h3>
                        <table class="table-detail">
                            <tr>
                                <th class="td-time">時間</th>
                                <th>科目</th>
                                <th class="td-name">單元名稱</th>
                                <th></th>
                            </tr>
                            @foreach($list_data as $v)
                                <tr>
                                    <td>[! substr($v['updated_at'],0,10) !]</td>
                                    <td>[! $v['title'] !]</td>
                                    <td>第[! $v['vol'] !]冊第[! $v['unit'] !]單元試卷[! $v['paper_vol'] !]</td>
                                    <td><a class="link-view" href="[! route('ad.examrecord.view',[$v['id'],$uid]) !]">檢視</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    var school_data = [];
    @foreach($all_school as $v)
        school_data.push(
            {
                'organization_id':'[! $v['organization_id'] !]',
                'name':'[! $v['name'] !]',
                'city_code':'[! $v['city_code'] !]',
            }
    );
    @endforeach

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
        @if($uid)
             get_student_data();
             $('#uid').val('[! $uid !]');
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
        dsc = dsc + '&uid=' + $('#uid').val();
        location.href = "[! route('ad.examrecord.list.page') !]"+dsc;
    }

    /**
     * 取得班級內所有學生資料
     */
    function get_student_data()
    {
        $("#uid option").remove();
        var organization_id = $('#organization_id').val();
        var grade = $('#grade').val();
        var class_val = $('#class').val();

        if(city_code > '' && organization_id > '' && grade > '' && class_val > ''){
            $.ajax({
                url: "[! route('ad.examrecord.student') !]",
                type:'POST',
                dataType: "json",
                data: {
                    _token: '[! csrf_token() !]',
                    organization_id: organization_id,
                    grade: grade,
                    class: class_val,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    for( var key in response )
                    {
                        $("#uid").append($("<option></option>").attr("value", key).text(response[key]));
                    }
                }
            });
        }
    }
</script>
@stop