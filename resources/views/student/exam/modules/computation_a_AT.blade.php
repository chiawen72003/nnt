<div class="answer-wrap">
	<div class="answer-form clearfix">
		<div class="answer-left-wrap">
			<h1 class="section-title title-answer">作答請點選下方按鈕</h1>
			<p class="section-title-type">選擇題選項</p>
			<div class="title-answer-wrap">
				<form id="form-answer">
					@if( isset($exam_data['model_item_options']) )
						@if(count($exam_data['model_item_options']) > 0)
							@foreach($exam_data['model_item_options'] as $k => $v)
								<input class="input-select" type="button" id="module_option_[! $k !]" value="[! $v !]" onclick="setOptionValue('[! $k !]')">
							@endforeach
						@endif
					@endif
					<div class="answer-select-wrap" id="build_option_area">
						<span>選擇題答案：</span><div class="answer-select" id="module_show_area"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="answer-button-wrap">
		<input class="btn btn-green" type="button" value="送出" onclick="analysis()">
	</div>
</div>
<script>
	$( document ).ready(function() {
		begin_build_option()
	});

	/**
	 * 初始化選項物件
	 */
	function begin_build_option(){
		for (var key in build_option)
		{
			var dsc = '<input class="input-select" type="button" id="module_option_'+ key +'" value="'+ build_option[key] +'" onclick="setOptionValue(\''+ key +'\')">';
			$('#build_option_area').before(dsc);
		}
	}

    function setOptionValue(getIndex) {
        //紀錄動作
        var newOptionOBj =  $.extend(true,{}, option_obj);
        newOptionOBj.dataType = 'select_option';//動作類型
        newOptionOBj.dataType_Dsc = '選擇題_選擇選項';//動作類型敘述
        newOptionOBj.dataFunction = 'setOptionValue()';//動作內容敘述
        newOptionOBj.dataFunction_ObjID = 'module_option_' + getIndex;
        newOptionOBj.dataFunction_Value = $('#module_option_'+getIndex).val();//內容值
        option_record.push(newOptionOBj);
        //紀錄動作 end

        var getValue = $('#module_option_'+getIndex).val();
        $('#module_show_area').html(getValue);
        operating_record({'fun':'setOptionValue','value':getIndex});
    }
</script>