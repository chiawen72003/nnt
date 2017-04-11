@extends('admin.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">建立系統公告</h1>
            <div class="news-wrap">
                [! Form::open(array('url'=>route('ad.news.add'),'id'=>'addForm', 'name'=>'addForm','files'=> true)) !]
                    <div class="select-group">
                        <div class="label-title">公告標題</div>
                        <input class="select-input" type="text" name="title" id="title" value="">
                    </div>
                    <div class="select-group">
                        <div class="label-title">公告內容</div>
                        <div class="edit-wrap">
                            <textarea name="dsc" id="dsc"></textarea>
                        </div>
                    </div>
                    <div class="select-group">
                        <div class="label-title">附件檔</div>
                        <input type="file" name="updateFile" id="updateFile">
                    </div>
                    <div class="form-button-wrap">
                        <input class="btn-yellow" type="button" value="送出" onclick="checkData()" />
                    </div>
                [! Form::close() !]
            </div>
        </div>
    </div>
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
    [! Html::script('admin/js/ckeditor/ckeditor.js') !]
<script>
    CKEDITOR.replace('dsc', {});
    var is_send = false;
    function checkData()
    {
        var error_dsc = '';
        if($('#title').val() == '')
        {
            error_dsc = error_dsc + '請輸入公告標題!!\r\n';
        }
        if( error_dsc == '' && !is_send){
            $('#addForm').submit();
        }
        if(error_dsc != '')
        {
            alert(error_dsc);
        }
    }
</script>
@stop