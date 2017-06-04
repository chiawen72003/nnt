@extends('student.layout.layout')
@section('content')
<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-result">成果查詢</h1>
		<div class="result-wrap">
			@if(isset($list_data) and count($list_data) > 0)
				@foreach($list_data as $v)
					<div class="result-box">
						<a href="[! route('mem.achievement.list',array($v)) !]"><img src="[!  url('/images/img_select01.png') !]" width="140"></a>
						<p><a href="[! route('mem.achievement.list',array($v)) !]">[! isset($subject_list[$v])?$subject_list[$v]:'' !]</a></p>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</div>

[! Html::script('js/jquery-1.11.3.js') !]
<script>

</script>
@stop