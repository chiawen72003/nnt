<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	[! Html::style('style/reset.css') !]
	[! Html::style('style/style.css') !]
	<script>
	window.onload = function (){
		var docHeight = document.body.offsetHeight,
			wrapHeight = docHeight - document.getElementById("header").offsetHeight;

		// 設定page-body元素高度 
		document.getElementById("page-body").style.minHeight = wrapHeight + "px";
	}		
	</script>
</head>
<body class="is-login">
	<div id="header">
		<div class="header-top">
			<div id="header-logo"></div>
		</div>
		<div id="boad-wrap" class="boad-wrap">
			<div class="boad-detail-wrap">
				<p>台中市臺中教育大學[! $user_data['school_grade'] !]年[! $user_data['school_class'] !]班<span class="txt-yellow">[! $user_data['user_name'] !]</span></p>
				<div class="button-wrap">
					<input class="btn btn-yellow" type="button" value="學習">
					<input class="btn btn-green" type="button" value="登出" onclick="logout()">
				</div>
			</div>
			<div class="img-chalk"></div>
		</div>
	</div>
	<div id="page-container">
		<div id="page-body">
			<h1 class="section-title title-use">使用說明<span>請直接點擊要學習的單元圖片</span></h1>
			<div class="select-unit-wrap">
				@if(isset($list_data) and count($list_data) > 0)
					@foreach($list_data as $value)
						<div class="select-unit-box">
							<img src="[! ($value['img'] != '')?url('/upfire/image/'.$value['img']):'' !]" width="130" height="130" onclick='send("[!$value['id']!]")'>
							<p>[! $value['title'] !]</p>
						</div>
					@endforeach
				@endif

			</div>
		</div>
	</div>
	[! Form::open(array('url'=>route('mem.exam.testpg'),'id'=>'beginTest', 'name'=>'beginTest')) !]
	[! Form::hidden('domain', 'addForm') !]
	<input type="hidden" name="ep_item_0" id="ep_item_0" />
	<input type="hidden" name="ep_item_1" id="ep_item_1" />
	<input type="hidden" name="ep_item_2" id="ep_item_2" />
	<input type="hidden" name="ep_item_3" id="ep_item_3" />
	<input type="hidden" name="ep_item_4" id="ep_item_4" />
	[! Form::close() !]

	[! Html::script('js/jquery-1.11.3.js') !]
<script>
    /**
	 * 登出
     */
	function logout(){
		 location.href = '[! route('mem.logout'); !]';
	}

    /**
	 * 開始受測
     * @param id_0
     * @param id_1
     * @param id_2
     * @param id_3
     * @param id_4
     */
	function send(id_0,id_1,id_2,id_3,id_4){
		$('#ep_item_0').val(id_0);
		$('#ep_item_1').val(id_1);
		$('#ep_item_2').val(id_2);
		$('#ep_item_3').val(id_3);
		$('#ep_item_4').val(id_4);
		$('#beginTest').submit();
	}
</script>
</body>
</html>