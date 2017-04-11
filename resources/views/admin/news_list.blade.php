@extends('admin.layout.layout')
@section('content')

    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">系統公告管理</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <div class="links-wrap">
                        <a class="top-link" href="[! route('ad.news.add.page') !]" >新增系統公告</a>
                    </div>
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time">時間</th>
                            <th class="th-title">公告標題</th>
                            <th class="th-file">附件檔</th>
                            <th class="th-button">功能</th>
                        </tr>
                        @foreach($list_data as $key => $news)
                            <tr>
                                <td>[! $key+1 !]</td>
                                <td>[! substr($news['updated_at'],0,10) !]</td>
                                <td>[! $news['title'] !]</td>
                                <td>[! $news['file_name'] !]</td>
                                <td>
                                    <a class="icon-action icon-edit" href="[! route('ad.news.edit.page',array($news["id"])) !]"></a>
                                    <a class="icon-action icon-delete" href="" onclick="del_unit('[! $news["id"] !]','[! $news["title"] !]')"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //確認是否刪除單元
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列標題的資料嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.news.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    id:get_id,
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