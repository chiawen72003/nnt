@extends('admin.layout.list_layout')
@section('content')
<div id="wrapper">
    <!--列表標題-->
    <ul>
        <li><a class="button" title="新增單元" onclick="show_add_area()">新增管理員</a></li>
    </ul>
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="35%">登入帳號</td>
            <td width="30%">姓名</td>
            <td width="30%">編輯</td>
        </tr>
    </table>
@foreach($list_data as $key => $v)
    <!-- 單元 -->
        <div class="accordionButton">
            <table class="list_item">
                <tr>
                    <td width="5%">[! $key+1 !]</td>
                    <td width="35%"><p class="name">[! $v['login_name'] !]</p></td>
                    <td width="30%"><p class="name">[! $v['name'] !]</p></td>
                    <td width="30%">
                        <a class="button" title="編輯" onclick='show_edit_area("[! $v['id'] !]","[! urlencode($v['name']) !]")'>編輯</a>
                        <a class="button" title="刪除" onclick='del_unit("[! $v['id'] !]","[! $v['name'] !]")'>刪除</a>
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
        <li id="li_login_name">
            <span>登入帳號</span>
            <input type="text" id="login_name" value="">
        </li>
        <li id="li_login_pw">
            <span>登入密碼</span>
            <input type="password" id="login_pw" value="">
        </li>
        <li id="li_login_pw_again">
            <span>確認密碼</span>
            <input type="password" id="login_pw_again" value="">
        </li>
        <li>
            <span>姓名</span>
            <input type="text" id="name" value="">
        </li>
    </ul>
    <input type="hidden" id="mem_id" value="">
    <a class="button" onclick="add_unit()" id="inline_add_btn">新增資料</a>
    <a class="button" onclick="edit_unit()" id="inline_edit_btn">更新資料</a>
    <a class="button" onclick="$.colorbox.close()" id="inline_edit_btn">關閉</a>
</div>
<script>
    //顯示 新增 編輯區
    function show_add_area() {
        $('#name').val('');
        $('#login_name').val('');
        $('#login_pw').val('');
        $('#login_pw_again').val('');
        $('#mem_id').val('');

        $('#inline_edit_btn').hide();

        $('#inline_add_btn').show();
        $('#li_login_name').show();
        $('#li_login_pw').show();
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //顯示 更新 編輯區
    function show_edit_area(getID,getName) {
        $('#name').val(getName);
        $('#login_name').val('');
        $('#login_pw').val('');
        $('#login_pw_again').val('');
        $('#mem_id').val(getID);

        $('#inline_add_btn').hide();
        $('#li_login_name').hide();
        $('#li_login_pw').hide();
        $('#li_login_pw_again').hide();

        $('#inline_edit_btn').show();
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //新增
    function add_unit() {
        $.ajax({
            url: "[! route('mem.admin.add') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                name: $('#name').val(),
                login_name: $('#login_name').val(),
                login_pw: $('#login_pw').val(),
            },
            success: function (data) {
                alert('新增成功!!');
                location.reload();
            }
        });
    }

    //修改
    function edit_unit() {
        $.ajax({
            url: "[! route('mem.admin.update') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                name: $('#name').val(),
                id : $('#mem_id').val()
            },
            success: function (data) {
                alert('更新成功!!');
                location.reload();
            }
        });
    }


    //確認是否刪除
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列管理員的資料嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('mem.admin.delete') !]",
                type:'DELETE',
                data: {
                    _token: '[! csrf_token() !]',
                    id: get_id
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop