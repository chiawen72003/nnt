@extends('student.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-use">使用說明<span>請直接點擊要學習的試卷圖片</span></h1>
            <div class="select-unit-wrap">
                @if(isset($list_data) and count($list_data) > 0)
                    @foreach($list_data as $value)
                        <div class="select-unit-box">
                            <p>[! $value['paper_vol'] !]卷</p>
                            <a class="select-img" href="#" onclick='send("[! $value['id'] !]")'>
                                <img src="[! ($value['img'] != '')?url('/upfire/image/'.$value['img']):'' !]" width="206"
                                     height="130">
                                <div class="unlearnd-img-wrap"></div>
                            </a>
                            <div class="select-button-wrrap">
                                <a class="btn btn-yellow" onclick='send("[! $value['id'] !]")' >學習</a>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    [! Form::open(array('url'=>route('mem.exam.testpg'),'id'=>'beginTest', 'name'=>'beginTest')) !]
    [! Form::hidden('domain', 'addForm') !]
    <input type="hidden" name="paper_id" id="paper_id"/>
    [! Form::close() !]

    [! Html::script('js/jquery-1.11.3.js') !]
    <script>
        /**
         * 開始受測
         */
        function send(getID) {
            $('#paper_id').val(getID);
            $('#beginTest').submit();
        }
    </script>
@stop