<div class="answer-wrap">
	<div class="answer-form clearfix">
		<h1 class="section-title title-answer">作答請用鍵盤</h1>
		<div class="title-answer-wrap">
			<textarea rows="15" id="module_text_area"></textarea>
			<div class="answer-button-wrap">
				<input class="btn btn-green" type="button" value="送出" onclick="analysis()">
			</div>
		</div>
	</div>
</div>
<script>
    $('#module_text_area').change(function(){
        recordValue();
    });

    //設定record數值
    function recordValue()
	{
        //紀錄動作

        var newOptionOBj =  $.extend(true,{}, option_obj);
        newOptionOBj.dataType = 'select_option';//動作類型
        newOptionOBj.dataType_Dsc = '填空模組_修改填空內容';//動作類型敘述
        newOptionOBj.dataFunction = 'recordValue()';//動作內容敘述
        newOptionOBj.dataFunction_ObjID = 'module_text_area';
		 newOptionOBj.dataFunction_Value = $('#module_text_area').val();//動作內容敘述
		 option_record.push(newOptionOBj);
        //紀錄動作 end
		console.log(option_record);
        operating_record({'fun':'setValue','value':$('#module_text_area').val()});
    }
</script>