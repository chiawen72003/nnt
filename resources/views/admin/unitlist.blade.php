<table>
    <tr>
        <td>編號</td>
        <td>版本</td>
        <td>領域</td>
        <td>冊</td>
        <td>單元</td>
        <td>名稱</td>
        <td>功能</td>
    </tr>
@foreach($list_data as $value)
        <tr>
            <td>[! $value['cs_sn'] !]</td>
            <td>[! $value['publisher_id'] !]</td>
            <td>[! $value['subject_name'] !]</td>
            <td>[! $value['vol'] !]</td>
            <td>[! $value['unit'] !]</td>
            <td>[! $value['concept'] !]</td>
            <td>
                <span><a onclick="unit_edit('[! route("ad.unit.edit.page",["id"=>$value['cs_sn']]) !]')">編輯</a></span>
                <span><a onclick="unit_delete('[! $value['cs_sn'] !]')">刪除</a></span>
            </td>
        </tr>
@endforeach
</table>
<script>
    function unit_delete(getID) {
        $.ajax({
            url: "[! route('ad.unit.delete') !]",
            type: 'POST',
            data: {
                _token: token,
                getID: getID,
            },
            success: function (data) {
                structure_list();
            }
        });
    }
    function unit_edit(path) {
        $.ajax({
            url: path,
            type: 'GET',
            data: {
            },
            success: function (data) {
                $('#right_side').html('').append(data);
            }
        });
    }
</script>