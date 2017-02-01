@extends('admin.layout.list_layout')
@section('content')
<div id="wrapper">
    <!--列表標題-->
    <div class="search">單元名稱搜尋：<input type="text" name="s_word" id="s_word" value=""><a class="button" title="單元名稱搜尋"
                                                                                        onclick="search_word()">搜尋</a><a
                href="index.php" class="button" title="清除搜尋">清除搜尋</a></div>
    <ul>
        <li><a class="button" title="新增單元" onclick="show_add_area()">新增單元</a></li>
    </ul>
    <table class="title">
        <tr>
            <td width="5%">編號</td>
            <td width="22%">版本</td>
            <td width="10%">科目</td>
            <td width="10%">冊別</td>
            <td width="10%">單元</td>
            <td width="10%">卷別</td>
            <td width="10%">名稱</td>
            <td width="28%">編輯</td>
        </tr>
    </table>
@foreach($list_data as $key => $v)
    <!-- 單元 -->
        <div class="accordionButton">
            <table class="list_item">
                <tr>
                    <td width="5%">[! $key+1 !]</td>
                    <td width="22%"><p class="name">[! isset($module_type[$v['module_type']])?$module_type[$v['module_type']]:'' !]</p></td>
                    <td width="10%">[! $v['subject'] !]</td>
                    <td width="10%">[! $v['vol'] !]</td>
                    <td width="10%">[! $v['unit'] !]</td>
                    <td width="10%">[! $v['grade'] !]</td>
                    <td width="10%">[! $v['title'] !]</td>
                    <td width="28%">
                        <a class="button" title="新增試卷" onclick="show_exampaper_area('[! $v['id'] !]')">新增試卷</a>
                        <a class="button" title="刪除" onclick="del_unit('[! $v['id'] !]','[! $v['title'] !]')">刪除</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- 單元 End -->
        <!-- 單元 → 試題列表 -->
        <div class="accordionContent" id="div_area_">
            <table class="list_detial">
                <tr>
                    <td width="15%" class="title">排序</td>
                    <td width="35%" class="title">試卷名稱</td>
                    <td width="10%" class="title">試題數量</td>
                    <td width="20%" class="title">編輯</td>
                </tr>
        @if(isset($exam_list[$v['id']]))
            @foreach($exam_list[$v['id']] as $k2 => $exam)
                        <tr>
                            <td>[! $k2+1 !]</td>
                            <td>[! $exam['title'] !]</td>
                            <td>[! isset($questions_item_nums[$exam['id']])?$questions_item_nums[$exam['id']]:'0' !]</td>
                            <td>
                                <a class="button" title="編輯" href="[! route('ad.questions.edit',$exam['id']) !]">編輯試題</a>
                                <a class="button" title="刪除" onclick='del_exampaper("[! $exam['id'] !]","[! $exam['title'] !]")'>刪除</a>
                            </td>
                        </tr>
            @endforeach
        @endif
            </table>
        </div>
        <!-- 單元 → 試題列表 end -->
    @endforeach
</div>
<div id="inline" style="display:none;">
    [! Form::open(array('url'=>route('ad.loginchk'),'id'=>'addForm', 'name'=>'addForm', 'files' => true)) !]
    [! Form::hidden('domain', 'addForm') !]

    <!--更改標籤排列-->
    <ul class="name">
        <li>
            <span>模組類別</span>
            <select name="module_type" id="module_type">
                <option value="">==請選擇==</option>
                <option value="1">單代理人</option>
                <option value="2">雙代理人</option>
                <option value="3">多代理人</option>
            </select>
        </li>
        <li>
            <span>領域</span>
            <select name="subject" id="subject">
                <option value="">==請選擇==</option>
                @foreach($subject_list as $key => $value)
                    <option value="[! $key !]">[! $value !]</option>
                @endforeach
            </select>
        </li>
        <li>
            <span>冊</span>
            <select name="vol" id="vol">
                <option value="">==請選擇==</option>
                @for($i=1;$i<19;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </li>
        <li>
            <span>適用年級</span>
            <select name="grade" id="grade">
                <option value="">==請選擇==</option>
                @for($i=3;$i<17;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </li>
        <li>
            <span>單元</span>
            <select name="unit" id="unit">
                <option value="">==請選擇==</option>
                @for($i=1;$i<100;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </li>
        <li>
            <span>名稱</span>
            <input type="text" name="title" id="title" value="">
        </li>
        <li>
            <span>能力指標</span>
            <select name="indicator_nums" id="indicator_nums">
                <option value="">==請選擇==</option>
                @for($i=1;$i<100;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </li>
        <li>
            <span>示意圖</span>
            <input type="file" name="img" id="img" accept="image/*">
        </li>
    </ul>
    <a class="button" onclick="add_unit()">新增單元</a>
    [! Form::close() !]
</div>

<div id="inline_exampaper" style="display:none;">
    <!--table更改為ul排列-->
    <ul class="name">
        <li><span>試卷名稱</span><input type="text" id="inline_exampaper_title" value="" size="40"></li>
    </ul>
    <a class="button" onclick="up_exampaper()">新增試卷</a>
    <input type="hidden" id="inline_exampaper_id" value="">
</div>
<script>
    //顯示單元編輯區
    function show_add_area() {
        $('#inline').show();
        $.colorbox({
            inline: true, href: "#inline", width: "30%", open: true, onClosed: function () {
                $('#inline').hide();
            }
        });
    }

    //新增一個單元
    function add_unit() {
        $.ajax({
            url: "[! route('ad.unit.add.data') !]",
            type: 'POST',
            cache: false,
            data: new FormData($('#addForm')[0]),
            processData: false,
            contentType: false,
            success: function (data) {
                alert('新增單元成功!!');
                location.reload();
            }
        });
    }

    //確認是否刪除單元
    function del_unit(get_id,unit_dsc){
        if(confirm("確定是否刪除下列單元的資料內容嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: "[! route('ad.unit.delete') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    getID:get_id,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('資料刪除成功!!');
                    location.reload();
                }
            });
        }
    }

    //顯示新增試卷編輯區
    function show_exampaper_area(keynum){
        $('#inline_exampaper').show();
        $('#inline_exampaper_id').val(keynum) ;
        $.colorbox({inline:true,href:"#inline_exampaper", width:"30%",open:true,onClosed:function(){
            $('#inline_exampaper').hide();
        }});
    }

    //新增一個試卷
    function up_exampaper(){
        var is_Go = true;
        var error_dsc ="";
        if($('#inline_operation_title').val() ==''){
            is_Go = false;
            error_dsc +="請輸入試卷名稱!!\r\n";
        }
        if(is_Go){
            $.ajax({
                url: '[! route('ad.exampaper.add.data') !]',
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    getID:$('#inline_exampaper_id').val(),
                    title:$('#inline_exampaper_title').val()
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                   alert('新增試卷成功!!');
                    // location.replace('?tr='+$('#inline_operation_input_2').val());
                   location.reload();
                }
            });
        }

        if(error_dsc !=''){
            alert(error_dsc);
        }
    }

    //確認是否刪除試卷
    function del_exampaper(get_id,unit_dsc){
        if(confirm("確定是否刪除下列試卷的資料內容嗎?\r\n"+unit_dsc)){
            $.ajax({
                url: '[! route('ad.exampaper.delete') !]',
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    getID:get_id,
                },
                error: function(xhr) {
                   // alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('資料刪除成功!!');
                    location.reload();
                }
            });
        }
    }

    //
    function edit_operation(keynum){
        location.href="operation_edit.php?o_num="+keynum+"&o_t_num=<?php echo base64_encode(0);?>";
    }
</script>
@stop