@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-structure">試卷編制</h1>
        <div class="section-content">
            <div class="links-wrap">
                <a class="top-link" href="[! route('ad.exampaper.add.page',array($unit_id)) !]">新增試卷</a>
            </div>
            <table>
                <tr>
                    <th>編號</th>
                    <th>試卷名稱</th>
                    <th>試題數量</th>
                    <th>功能</th>
                </tr>
                @foreach($list_data as $key => $v)
                    <tr>
                        <td>[! $key+1 !]</td>
                        <td>[! $v['title'] !]</td>
                        <td>[! isset($questions_item_nums[$v['id']])?$questions_item_nums[$v['id']]:'0' !]</td>
                        <td>
                            <a class="icon-action icon-edit" href="[! route('ad.questions.edit',$v['id']) !]"></a>
                            <a class="icon-action icon-delete" onclick='del_exampaper("[! $v['id'] !]","[! $v['title'] !]")' href="#"></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>

    //確認是否刪除試卷
    function del_exampaper(get_id,unit_dsc){
        if(confirm("確定是否刪除下列試卷的資料內容嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.exampaper.delete') !]",
                type:"POST",
                data: {
                _token: "[! csrf_token() !]",
                getID:get_id,
            },
            error: function(xhr) {
                // alert('Ajax request 發生錯誤');
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