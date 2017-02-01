@extends('admin.layout.list_layout')
@section('content')
<div id="wrapper">
    <!--列表標題-->
    <ul>
        <li><a class="button" title="新增單元" onclick="show_add_area()">新增科目</a></li>
    </ul>
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="65%">科目</td>
            <td width="30%">編輯</td>
        </tr>
    </table>
@foreach($list_data as $key => $v)
    <!-- 單元 -->
        <div class="accordionButton">
            <table class="list_item">
                <tr>
                    <td width="5%">[! $key+1 !]</td>
                    <td width="65%"><p class="name">[! $v['name'] !]</p></td>
                    <td width="30%">
                        <a class="button" title="編輯" onclick='show_edit_area("[! $v['id'] !]","[! $v['name'] !]")'>編輯</a>
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
        <li>
            <span>名稱</span>
            <input type="text" id="name" value="">
            <input type="hidden" id="subject_id" value="">
        </li>
    </ul>
    <a class="button" onclick="add_unit()" id="inline_add_btn">新增科目</a>
    <a class="button" onclick="edit_unit()" id="inline_edit_btn">更新科目</a>
    <a class="button" onclick="$.colorbox.close()" id="inline_edit_btn">關閉</a>
</div>
<script>
    //顯示科目編輯區
    function show_add_area() {
        $('#inline_add_btn').show();
        $('#inline_edit_btn').hide();
        $('#name').val('');
        $('#subject_id').val('');
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //顯示科目編輯區
    function show_edit_area(getID,getName) {
        $('#inline_add_btn').hide();
        $('#inline_edit_btn').show();
        $('#name').val(getName);
        $('#subject_id').val(getID);
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //新增一個科目
    function add_unit() {
        $.ajax({
            url: "[! route('ad.subject.add') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                name: $('#name').val()
            },
            success: function (data) {
                alert('新增科目成功!!');
                location.reload();
            }
        });
    }

    //修改一個科目
    function edit_unit() {
        $.ajax({
            url: "[! route('ad.subject.update') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                name: $('#name').val(),
                id : $('#subject_id').val()
            },
            success: function (data) {
                alert('更新科目成功!!');
                location.reload();
            }
        });
    }


    //確認是否刪除科目
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列科目嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.subject.delete') !]",
                type:'DELETE',
                data: {
                    _token: '[! csrf_token() !]',
                    id: get_id
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('科目刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop