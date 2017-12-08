@extends('admin.layout.layout')
@section('content')

    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">教學劇本設計-提示</h1>
            <div class="news-wrap">
                [! Form::open(array('url'=>route('ad.script.prompt.update'),'id'=>'editForm', 'name'=>'editForm','files'=> true)) !]
                    <div class="select-group">
                        <div class="label-title">提示內容</div>
                        <div class="edit-wrap">
                            <textarea name="dsc" id="dsc">[! isset($prompt_data['dsc'])?$prompt_data['dsc']:''  !]</textarea>
                        </div>
                    </div>
                    <div class="form-button-wrap">
                        <input class="btn-yellow" type="button" value="送出" onclick="checkData()" />
                    </div>
                    <input  type="hidden" name="item_key" value="[! isset($item_key)?$item_key:''  !]" />

                [! Form::close() !]
            </div>
        </div>
    </div>
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
    [! Html::script('admin/js/ckeditor/ckeditor.js') !]
<script>
    CKEDITOR.replace('dsc', {
        filebrowserBrowseUrl : '[! $ck_finder_path !]/ckfinder.html',
        filebrowserImageBrowseUrl : '[! $ck_finder_path !]/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '[! $ck_finder_path !]/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '[! $ck_finder_path !]/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '[! $ck_finder_path !]/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '[! $ck_finder_path !]/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    var is_send = false;
    function checkData()
    {
        var error_dsc = '';
        
        if( error_dsc == '' && !is_send){
            $('#editForm').submit();
        }
        if(error_dsc != '')
        {
            alert(error_dsc);
        }
    }
</script>
@stop