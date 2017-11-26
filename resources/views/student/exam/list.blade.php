@extends('student.layout.layout')
@section('content')
    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-use">使用說明<span>請直接點擊要學習的單元圖片</span></h1>
            <div class="select-unit-wrap">
                @if(isset($list_data) and count($list_data) > 0)
                    @foreach($list_data as $value)
                        <div class="select-unit-box">
                            <p>[! isset($subject_list[$value['subject']])?$subject_list[$value['subject']]:'' !]</p>
                            <a class="select-img" href="[! route('mem.exam.paper.list',array($value['id'])) !]">
                            <img src="[! ($value['img'] != '')?url('/upfire/image/'.$value['img']):'' !]" width="206"
                                 height="130">
                            @if( $value['has_exam_record'] === false  )
                                <div class="unlearnd-img-wrap"></div>
                                @endif
                                </a>
                                <div class="select-button-wrrap">
                                    <a class="btn btn-yellow" href="[! route('mem.exam.paper.list',array($value['id'])) !]" >學習</a>
                                    @if( in_array($value['subject'], $has_record_subject) )
                                        <a class="btn btn-gray"
                                           href="[! route('mem.achievement.list',[$value['subject']]) !]">觀看紀錄</a>
                                    @else
                                        <a class="btn btn-green" onclick="alert('請先完成一個試卷測試!!');">觀看紀錄</a>
                                    @endif
                                </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    [! Form::open(array('url'=>route('mem.exam.testpg'),'id'=>'beginTest', 'name'=>'beginTest')) !]
    [! Form::hidden('domain', 'addForm') !]
    <input type="hidden" name="unit_id" id="unit_id"/>
    [! Form::close() !]

    [! Html::script('js/jquery-1.11.3.js') !]
    [! Html::script('js/sweetalert2.min.js') !]
    <script>
        var show = [];

        $( document ).ready(function() {
            showData();
        });

        //資料初始化
        function showData(){
            var title = '';
            var def_title = '提醒您，下列單元尚未操作完畢!!\r\n';
            @if(isset($list_data) and count($list_data) > 0)
                @foreach($list_data as $value)
                    @if( !in_array($value['subject'], $has_record_subject) )
                        title = title + "[! isset($subject_list[$value['subject']])?$subject_list[$value['subject']]:'' !]\r\n";
                    @endif
                @endforeach
            @endif
            if(title > ''){
                //提示學生目前還有哪些單元還沒有做
                swal({
                    title: def_title + title,
                    text: '',
                    timer: 10000,
                    confirmButtonColor: "#378e2c"
                }).then(
                    function () {},
                    // handling the promise rejection
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
        }
    </script>
@stop