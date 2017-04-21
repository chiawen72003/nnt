@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a class="active" href="[! route('ad.school.list') !]" tittle="學校管理">學校管理</a></li>
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
                                @foreach($city_data as $k => $v)
                                    <option value="[! $k !]" [! ($city_code == $k)?'selected':''  !]>[! $v !]</option>
                                @endforeach
                            </select>
                            <input id="input-search" class="btn-yellow" type="button" value="送出" onclick="change_city()">
                        </div>
                    </div>
                    <div class="record-inner">
                        <h3 class="record-title">學校列表<a class="record-add" href="[! route('ad.school.addpage') !]">新增學校</a></h3>
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
                                        <a class="icon-action icon-delete" href="#" onclick='del_unit("[! $v['id'] !]","[! $v['name'] !]")'></a>
                                    </td>
                                </tr>
                        @endforeach
                        </table>
                        <div class="page-select-wrap">
                        [! $list_data->appends(['city' => $city_code])->links()  !]
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //確認是否刪除學校
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列學校嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.school.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    id: get_id
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

    //變更縣市
    function change_city()
    {
        location.href = "[! route('ad.school.list') !]?city=" + $('#select-area').val();
    }
</script>
@stop