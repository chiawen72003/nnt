@extends('admin.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">教學劇本設計路徑</h1>
            <div class="news-wrap">
                <div class="select-group">
                    <div class="label-title">教師填寫內容</div>
                    <div class="edit-wrap">
                        <textarea name="dsc" id="dsc">[! $script_data['script_data']['teacher']['dsc'] !]</textarea>
                    </div>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="button" value="送出" onclick="sendViewData()" />
                </div>
            </div>
        </div>
    </div>
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
<script>
    var item_edit = $('#dsc');
    function sendViewData()
    {
        $.ajax({
            url: "[! route('ad.script.add') !]",
            type:'POST',
            dataType: "json",
            data: {
                _token: '[! csrf_token() !]',
                item_key:'[! $item_key !]',
                uid:'[! $uid !]',
                dsc:item_edit.val(),
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {

            }
        });
        alert('存檔完畢!!');
    }
</script>
@stop