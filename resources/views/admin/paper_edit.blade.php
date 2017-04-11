@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-structure">試卷編制</h1>
        <div class="section-content">
            <div class="select-group">
                <div class="label-title"><span class="txt-red">*</span>試卷名稱</div>
                <input class="select-input" type="text" id="inline_exampaper_title" value=""><span class="txt-red">(必填)</span>
            </div>
            <div class="form-button-wrap">
                <input class="btn-yellow" type="button" onclick='history.back()' value="回上一頁" />
                <input class="btn-yellow" type="button"  value="輸入完畢，建立試卷" onclick="up_exampaper()"/>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>

    //新增一個試卷
    function up_exampaper(){
        var is_Go = true;
        var error_dsc ="";
        if($('#inline_operation_title').val() ==''){
            is_Go = false;
            error_dsc +="請輸入試卷名稱!!\r\n";
        }
        if(is_Go){
            $.ajax({
                    url: "[! route('ad.exampaper.add.data') !]",
                    type:"POST",
                    data: {
                    _token: "[! csrf_token() !]",
                        getID:"[! $unit_id !]",
                        title:$('#inline_exampaper_title').val()
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('新增試卷成功!!');
                    window.location.replace(document.referrer);
                }
          });
        }

        if(error_dsc !=''){
            alert(error_dsc);
        }
    }
</script>
@stop