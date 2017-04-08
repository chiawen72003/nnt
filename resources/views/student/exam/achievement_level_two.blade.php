@extends('student.layout.layout')
@section('content')
<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-result">成果查詢</h1>
		<div class="result-detail-wrap">
			<h3 class="subject-type">[! isset($subject_list[$unit_id])?$subject_list[$unit_id]:'' !]</h3>
			<table class="table-detail">
				<tr>
					<th class="td-time">時間</th>
					<th class="td-name">單元名稱</th>
					<th></th>
				</tr>
				@foreach($list_data as $v)
					<tr>
						<td>[! substr($v['updated_at'],0,10) !]</td>
						<td>第[! $v['vol'] !]冊第[! $v['unit'] !]單元</td>
						<td><a class="link-view" href="[! route('mem.exam.viewrecord.list',[$v['id']]) !]">檢視成果</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

[! Html::script('js/jquery-1.11.3.js') !]
<script>

</script>
@stop