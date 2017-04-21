@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a class="active" href="#" tittle="學校管理">學校管理</a></li>
                    <li><a href="#" title="新增使用者">新增使用者</a></li>
                    <li><a href="#" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a href="#" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="search-form">
                    <div class="sarch-bg">
                        <h3 class="search-title">請選取地區</h3>
                        <div class="select-group">
                            <select name="select-area" id="select-area" class="select-s">
                                <option value="新北市">新北市</option>
                            </select>
                            <input id="input-search" class="btn-yellow" type="button" value="送出">
                        </div>
                    </div>
                    <div class="record-inner">
                        <h3 class="record-title">學校列表<a class="record-add" href="#" onclick="show_add_area()">新增學校</a></h3>
                        <table class="table-detail2">
                            <tr>
                                <th class="td-school">學校名稱</th>
                                <th>功能</th>
                            </tr>
                        @foreach($list_data as $key => $v)
                                <tr>
                                    <td>[! $v['name'] !]</td>
                                    <td>
                                        <a class="icon-action icon-edit" href="admin_conceptStructure_edit.html"></a>
                                        <a class="icon-action icon-delete" href="#" onclick='del_unit("[! $v['organization_id'] !]","[! $v['name'] !]")'></a>
                                    </td>
                                </tr>
                        @endforeach
                        </table>
                        <div class="page-select-wrap">
                        [! $list_data->links()  !]
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //顯示編輯區 新增
    function show_add_area() {
        $('#inline_add_btn').show();
        $('#inline_edit_btn').hide();
        $('#organization_id').val('');
        $('#organization_type').val('');
        $('#organization_city_code').val('');
        $('#organization_name').val('');
        $('#organization_address').val('');
        $('#organization_telno').val('');
        $('#organization_used').val('1');
        $('#school_id').val('');
        $('#organization_id').removeAttr('disabled');
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //顯示編輯區 編輯
    function show_edit_area(getOrganizationId,getType,getCityCode,getName,getAddress,getTelno,getUsed) {
        $('#inline_add_btn').hide();
        $('#inline_edit_btn').show();
        $('#organization_id').val(getOrganizationId);
        $('#organization_type').val(getType);
        $('#organization_city_code').val(getCityCode);
        $('#organization_name').val(getName);
        $('#organization_address').val(getAddress);
        $('#organization_telno').val(getTelno);
        $('#organization_used').val(getUsed);
        $('#school_id').val(getOrganizationId);
        $('#organization_id').attr('disabled', true);
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //新增一個學校
    function add_unit() {
        $.ajax({
            url: "[! route('ad.school.add') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                organization_id: $('#organization_id').val(),
                type: $('#organization_type').val(),
                city_code: $('#organization_city_code').val(),
                name: $('#organization_name').val(),
                address: $('#organization_address').val(),
                telno: $('#organization_telno').val(),
                used: $('#organization_used').val()
            },
            success: function (data) {
                if(data == 'success'){
                    alert('新增學校成功!!');
                    location.reload();
                }else{
                    alert('學校代碼重複!!');
                }

            }
        });
    }

    //修改一個學校
    function edit_unit() {
        $.ajax({
            url: "[! route('ad.school.update') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                organization_id: $('#school_id').val(),
                type: $('#organization_type').val(),
                city_code: $('#organization_city_code').val(),
                name: $('#organization_name').val(),
                address: $('#organization_address').val(),
                telno: $('#organization_telno').val(),
                used: $('#organization_used').val()
            },
            success: function (data) {
                alert('更新學校成功!!');
                location.reload();
            }
        });
    }


    //確認是否刪除學校
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列學校嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.school.delete') !]",
                type:'DELETE',
                data: {
                    _token: '[! csrf_token() !]',
                    organization_id: get_id
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('學校刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop