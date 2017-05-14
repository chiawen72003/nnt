@extends('student.layout.layout')
@section('content')
<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-result">成果查詢</h1>
		<div class="result-detail-wrap">
			<div class="result-button-wrap">
				<a class="button-download" href="[! route('mem.exam.download.record',array($exam_record['exam_paper_id'])) !]" target="_blank">下載</a>
			</div>
			<table class="table-detail2">
				<tr>
					<th>對話順序</th>
					<th>作答題號</th>
					<th>學生回答內容</th>
					<th>電腦回應內容</th>
					<th>答對/答錯</th>
					<th>回饋類型</th>
				</tr>
				@foreach($exam_record['use_item'] as $key => $v)
					<tr>
						<td>[! $key+1 !]</td>
						<td>[! $v['item_id'] !]</td>
						<td>[! $v['student_ans'] !]</td>
						<td></td>
						<td></td>
						<td>[! $v['feedback_dsc'] !]</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
@stop