@extends('admin.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">科目列表</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <div class="links-wrap">
                        <input type="text" id="new_subject" value="" ><a class="top-link" href="#" onclick="add_unit()" >新增科目</a>
                    </div>
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time"></th>
                            <th class="th-title">科目名稱</th>
                            <th class="th-file"></th>
                            <th class="th-button">編輯</th>
                        </tr>
                        @foreach($list_data as $key => $v)
                            <tr>
                                <td>[! $key+1 !]</td>
                                <td></td>
                                <td>[! $v['name'] !]</td>
                                <td></td>
                                <td>
                                    <a class="icon-action icon-delete" href="" onclick="del_unit('[! $v["id"] !]','[! $v["name"] !]')"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="page-select-wrap">
                        [! $list_data->links()  !]
                    </div>

                </form>
            </div>
        </div>
    </div>
    [! Html::script('js/jquery-1.11.3.js') !]
    <script>
        //新增一個科目
        function add_unit() {
            if( $('#new_subject').val() != ''){
                $.ajax({
                    url: "[! route('ad.subject.add') !]",
                    type: 'POST',
                    data: {
                        _token: '[! csrf_token() !]',
                        name: $('#new_subject').val()
                    },
                    success: function (data) {
                        alert('新增科目成功!!');
                        location.reload();
                    }
                });
            }
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