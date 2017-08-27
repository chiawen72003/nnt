@extends('admin.layout.'.$layout_set)
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-structure">單元結構編制</h1>
        <div class="section-content">
            [! Form::open(array('url'=>route('ad.unit.update.data'),'id'=>'addForm', 'name'=>'addForm', 'files' => true)) !]
            [! Form::hidden('id', $old_data['id']) !]

                <div class="select-group">
                    <div class="label-title">代理人類別</div>
                    <select name="module_type" id="module_type">
                        <option value="">請選擇代理人類別</option>
                        <option value="1" [! ($old_data['module_type'] == 1)?'selected':'' !]>單代理人</option>
                        <option value="2" [! ($old_data['module_type'] == 2)?'selected':'' !]>雙代理人</option>
                        <option value="3" [! ($old_data['module_type'] == 3)?'selected':'' !]>多代理人</option>
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">領域</div>
                    <select name="subject" id="subject">
                        <option value="">請選擇領域</option>
                        @foreach($subject_list as $key => $value)
                            <option value="[! $key !]" [! ($old_data['subject'] == $key)?'selected':'' !]>[! $value !]</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">冊別</div>
                    <select name="vol" id="vol">
                        <option value="">請選擇冊別</option>
                        @for($i=1;$i<19;$i++)
                            <option value="[! $i !]" [! ($old_data['vol'] == $i)?'selected':'' !]>[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">適用年級</div>
                    <select name="grade" id="grade">
                        <option value="">請選擇適用年級</option>
                        @for($i=3;$i<17;$i++)
                            <option value="[! $i !]" [! ($old_data['grade'] == $i)?'selected':'' !]>[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">單元</div>
                    <select name="unit" id="unit">
                        <option value="">請選擇單元</option>
                        @for($i=1;$i<100;$i++)
                            <option value="[! $i !]" [! ($old_data['unit'] == $i)?'selected':'' !]>[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title"><span class="txt-red">*</span>名稱</div>
                    <input class="select-input" type="text" name="title" id="title" value="[! $old_data['title']  !]"><span class="txt-red">(必填)</span>
                </div>
                <div class="select-group">
                    <div class="label-title">能力指標</div>
                    <select name="indicator_nums" id="indicator_nums">
                        <option value="">請選擇能力指標</option>
                        @for($i=1;$i<100;$i++)
                            <option value="[! $i !]" [! ($old_data['indicator_nums'] == $i)?'selected':'' !]>[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">示意圖</div>
                    <input type="file" name="img" id="img" accept="image/*"><a href="[! url('/upfire/image/'.$old_data['img']) !]" target="_blank">查看舊檔</a>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="button" onclick='history.back()' value="回上一頁" />
                    <input class="btn-yellow" type="button"  value="輸入完畢，更新結構" onclick="chk()"  />
                </div>
            [! Form::close() !]
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>

    //資料檢查
    function chk(){
        var is_Go = true;
        var error_dsc ="";
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var unit_value = $("#unit").val();
        var vol_value = $("#vol").val();
        var grade_value = $("#grade").val();
        var title_value = $("#title").val();
        var indicator_nums_value = $("#indicator_nums").val();

        if(module_type_value != ''
            && subject_value != ''
            && unit_value !=''
            && vol_value !=''
            && grade_value !=''
            && title_value !=''
            && indicator_nums_value !=''
        )
        {
            if(is_Go){
                is_Go = false;
                $('#addForm').submit();
            }
        }else{
            error_dsc +="請檢查選項是否有缺少!!\r\n";
        }

        if(error_dsc !=''){
            alert(error_dsc);
        }
    }
</script>
@stop