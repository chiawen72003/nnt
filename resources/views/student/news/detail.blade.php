@extends('student.layout.layout')
@section('content')
<div id="page-container">
	<div id="page-body">
		<h1 class="section-title title-news">系統公告</h1>
		<div class="news-wrap">
			<table class="table-content">
				<tr>
					<th>時間</th>
					<td>[! substr($news_data['updated_at'],0,10) !]</td>
				</tr>
				<tr>
					<th>公告標題</th>
					<td>[! $news_data['title'] !]</td>
				</tr>
				<tr>
					<th>公告內容</th>
					<td>[! $news_data['dsc'] !]</td>
				</tr>
				<tr>
					<th>附件</th>
					<td><a class="link-download" href="[! route('mem.news.file',array($news_data['id'])) !]" target="_blank">[! $news_data['file_name'] !]</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop