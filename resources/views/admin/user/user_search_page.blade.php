@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a href="[! route('ad.school.list') !]" tittle="學校管理">學校管理</a></li>
                    <li><a href="[! route('ad.user.add.page') !]" title="新增使用者">新增使用者</a></li>
                    <li><a href="[! route('ad.user.import.page') !]" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a class="active" href="[! route('ad.user.search.page') !]" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="search-form">
                    <div class="sarch-bg">
                        <h3 class="search-title">請選取班級</h3>
                        <div class="select-group">
                            <select class="select-s" id="city_code" onchange="get_city_school()">
                                @foreach($city_data as $k => $v)
                                    <option value="[! $k !]" >[! $v !]</option>
                                @endforeach
                            </select>
                            <select class="select-s" id="organization_id">
                            </select>
                            <select class="select-s" id="grade">
                                @for($x=1;$x<21;$x++)
                                    <option value="[! $x !]">[! $x !]年級</option>
                                @endfor
                            </select>
                            <select class="select-s" id="class">
                                @for($x=1;$x<21;$x++)
                                    <option value="[! $x !]">[! $x !]班級</option>
                                @endfor
                            </select>
                        </div>
                        <div class="search-button-wrap">
                            <input id="input-search" class="btn-yellow" type="button" value="選擇完畢，送出" onclick="send()">
                        </div>
                    </div>
                    <p class="record-inner">
                        @if($class_member != null)
                            <h3 class="record-title record-title-class" id="school_name">
                                <a class="record-download" href="#" onclick="$('#addForm').submit()">下載帳號密碼檔</a>
                                <a class="record-delete" href="#" onclick="remove_all()">全部刪除</a>
                            </h3>
                            <table class="table-detail2">
                                <tr>
                                    <th>帳號</th>
                                    <th>姓名</th>
                                    <th>密碼</th>
                                    <th>身份</th>
                                    <th>功能</th>
                                </tr>
                                @foreach($class_member['member_data'] as $v)
                                    <tr>
                                        <td>[! $v['user_id'] !]</td>
                                        <td>[! $v['uname'] !]</td>
                                        <td>[! $v['viewpass'] !]</td>
                                        <td>[! isset($all_level[$v['access_level']])?$all_level[$v['access_level']]:'' !]</td>
                                        <td>
                                            <a class="icon-action icon-edit" href="[! route('ad.user.edit.page',array($v['uid'])) !]"></a>
                                            <a class="icon-action icon-delete" href="#" onclick='del_unit("[! $v['user_id'] !]","[! $v['uname'] !]")'></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="page-select-wrap">
                                [! $class_member['page_data'] !]
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if($class_member != null)
    [! Form::open(array('url'=>route('ad.user.search.download'),'id'=>'addForm', 'name'=>'addForm', 'target' => '_blank')) !]
    [! Form::hidden('city_code', $city_code) !]
    [! Form::hidden('organization_id', $organization_id) !]
    [! Form::hidden('grade', $grade) !]
    [! Form::hidden('class', $class) !]
    [! Form::close() !]
@endif
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
        var school_name = $('#city_code :selected').text();
        school_name = school_name + $('#organization_id :selected').text();
        school_name = school_name + '[! $grade !]年';
        school_name = school_name + '[! $class !]班';
        $('#school_name').append(school_name);

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
        location.href = "[! route('ad.user.search.page') !]"+dsc;
    }

    //確認是否刪除學生
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除學生嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.user.search.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    user_id: get_id
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('學生刪除成功!!');
                    location.reload();
                }
            });
        }
    }

    //刪除全部的學生資料
    function remove_all()
    {
        @if( $organization_id AND $grade AND $class)
            if(confirm("確定是否刪除全部的學生嗎?")){
                $.ajax({
                    url: "[! route('ad.user.search.alldelete') !]",
                    type:'POST',
                    data: {
                        _token: '[! csrf_token() !]',
                        organization_id: '[! $organization_id !]',
                        grade: '[! $grade !]',
                        class: '[! $class !]',
                    },
                    error: function(xhr) {
                        //alert('Ajax request 發生錯誤');
                    },
                    success: function(response) {
                       alert('全部刪除成功!!');
                       location.reload();
                    }
                });
            }
        @endif
    }
</script>
@stop