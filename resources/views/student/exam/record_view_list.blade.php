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
		<div id="boad-nav">
			<a href="#">系統公告</a>
			<a href="[! route('mem.exam') !]">學習</a>
			<a href="#">成果查詢</a>
			<a href="[! route('mem.logout') !]">登出</a>
		</div>
		<div class="boad-detail-wrap">
			<p>台中市臺中教育大學[! $user_data['school_grade'] !]年[! $user_data['school_class'] !]班<span class="txt-yellow">[! $user_data['user_name'] !]</span></p>
		</div>
		<div class="img-chalk"></div>
	</div>
</div>

<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-structure">單元結構編制</h1>
		<div class="section-content">
			<div class="links-wrap">
				<a class="top-link" href="[! route('mem.exam.viewrecord',[$unit_id]) !]">觀看紀錄</a>
			</div>
			<table>
				<tr>
					<th>試卷id</th>
					<th>學生答案</th>
					<th>回饋類型</th>
				</tr>
				@foreach($exam_record['use_item'] as $key => $v)
					<tr>
						<td>[! $v['item_id'] !]</td>
						<td>[! $v['student_ans'] !]</td>
						<td>[! $v['feedback_dsc'] !]</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
</body>
</html>