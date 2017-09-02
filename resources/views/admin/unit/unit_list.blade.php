@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-structure">單元結構編制</h1>
        <div class="section-content">
            <div class="links-wrap">
                <a class="top-link" href="[! route('ad.unit.add.page') !]">新增單元結構</a>
            </div>
            <table>
                <tr>
                    <th>編號</th>
                    <th>版本</th>
                    <th>科目</th>
                    <th>冊</th>
                    <th>單元</th>
                    <th>名稱</th>
                    <th>功能</th>
                </tr>
                @foreach($list_data as $key => $v)
                    <tr>
                        <td>[! $key+1 !]</td>
                        <td>[! isset($module_type[$v['module_type']])?$module_type[$v['module_type']]:'' !]</td>
                        <td>[! isset($subject_list[$v['subject']])?$subject_list[$v['subject']]:'' !]</td>
                        <td>[! $v['vol'] !]</td>
                        <td>[! $v['unit'] !]</td>
                        <td>[! $v['title'] !]</td>
                        <td>
                            @if($v['is_lock'] == 1 )
                                <a class="icon-action icon-edit" href="#" onclick="alert('單元被上鎖，無法編輯!!')"></a>
                            @else
                                <a class="icon-action icon-edit" href="[! route('ad.unit.edit.page',array($v['id'])) !]"></a>
                            @endif
                            <a class="icon-action icon-delete" onclick="del_unit('[! $v['id'] !]','[! $v['title'] !]')" href="#"></a>
                            <a class="icon-action icon-lock" href="#"></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //確認是否刪除單元
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列單元的資料內容嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.unit.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    getID:get_id,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('資料刪除成功!!');
                    location.reload();
                }
            });
        }
    }
</script>
@stop