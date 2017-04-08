@extends('student.layout.layout')
@section('content')
<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-news">系統公告</h1>
		<div class="news-wrap">
			<table class="table-detail">
				<tr>
					<th class="td-time">時間</th>
					<th class="td-name">公告標題</th>
					<th>附件</th>
				</tr>
				@foreach($list_data as $v)
					<tr>
						<td>[! substr($v['updated_at'],0,10) !]</td>
						<td><a class="link-title" href="[! route('mem.news.detail',array($v['id'])) !]" title="[! $v['title'] !]">[! $v['title'] !]</a></td>
						<td><a class="link-download" target="_blank" href="[! route('mem.news.file',array($v['id'])) !]">[! $v['file_name'] !]</a></td>
					</tr>
				@endforeach
			</table>
		</div>
		<div class="page-select-wrap">
			<ul class="clearfix">
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a class="current" href="#">3</a></li>
			</ul>
		</div>
	</div>
</div>
@stop