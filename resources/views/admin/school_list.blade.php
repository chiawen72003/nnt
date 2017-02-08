@extends('admin.layout.list_layout')
@section('content')
<div id="wrapper">
    <!--列表標題-->
    <ul>
        <li><a class="button" title="新增單元" onclick="show_add_area()">新增學校</a></li>
    </ul>
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="7%">學校代碼</td>
            <td width="5%">類型</td>
            <td width="5%">縣市</td>
            <td width="10%">學校名稱</td>
            <td width="10%">地址</td>
            <td width="10%">電話</td>
            <td width="7%">是否使用</td>
            <td width="10%">編輯</td>
        </tr>
    </table>
@foreach($list_data as $key => $v)
    <!-- 單元 -->
        <div class="accordionButton">
            <table class="list_item">
                <tr>
                    <td width="5%">[! $key+1 !]</td>
                    <td width="7%"><p class="name">[! $v['organization_id'] !]</p></td>
                    <td width="5%"><p class="name">[! $v['type'] !]</p></td>
                    <td width="5%"><p class="name">[! $v['city_code'] !]</p></td>
                    <td width="10%"><p class="name">[! $v['name'] !]</p></td>
                    <td width="10%"><p class="name">[! $v['address'] !]</p></td>
                    <td width="10%"><p class="name">[! $v['telno'] !]</p></td>
                    <td width="7%"><p class="name">[! $v['used'] !]</p></td>
                    <td width="10%">
                        <a class="button" title="編輯" onclick='show_edit_area("[! $v['organization_id'] !]","[! $v['type'] !]","[! $v['city_code'] !]","[! $v['name'] !]","[! $v['address'] !]","[! $v['telno'] !]","[! $v['used'] !]")'>編輯</a>
                        <a class="button" title="刪除" onclick='del_unit("[! $v['organization_id'] !]","[! $v['name'] !]")'>刪除</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- 單元 End -->
    @endforeach
    [! $list_data->links()  !]
</div>
<!--更改標籤排列-->
<div id="inline" style="display:none;">
    <ul class="name">
        <li>
            <span>學校代碼</span>
            <input type="text" id="organization_id" value="">
        </li>
        <li>
            <span>類型</span>
            <input type="text" id="organization_type" value="">
        </li>
        <li>
            <span>縣市</span>
            <input type="text" id="organization_city_code" value="">
        </li>
        <li>
            <span>學校名稱</span>
            <input type="text" id="organization_name" value="">
        </li>
        <li>
            <span>地址</span>
            <input type="text" id="organization_address" value="">
        </li>
        <li>
            <span>電話</span>
            <input type="text" id="organization_telno" value="">
        </li>
        <li>
            <span>是否使用</span>
            <select id="organization_used">
                <option value="1">啟用</option>
                <option value="0">停用</option>
            </select>
            <input type="hidden" id="school_id" value="">
        </li>
    </ul>
    <a class="button" onclick="add_unit()" id="inline_add_btn">新增</a>
    <a class="button" onclick="edit_unit()" id="inline_edit_btn">更新</a>
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