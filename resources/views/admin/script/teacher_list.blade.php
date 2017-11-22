@extends('admin.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">教學劇本設計路徑</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time"></th>
                            <th class="th-title">教師姓名</th>
                            <th class="th-file"></th>
                            <th class="th-button">功能</th>
                        </tr>
                        @foreach($list_data['teacher_data'] as $key => $v)
                            <tr>
                                <td>[! $key+1 !]</td>
                                <td></td>
                                <td>[! $v['uname'] !]</td>
                                <td></td>
                                <td>
                                    <a class="icon-action icon-edit" href=""></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="page-select-wrap">
                        [! $list_data['page_data'] !]
                    </div>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
@stop