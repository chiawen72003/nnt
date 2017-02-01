<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>合作問題解決數位學習系統</title>
    [! Html::style('admin/css/edit.css') !]
    [! Html::script('admin/js/jquery-1.10.1.min.js') !]
    [! Html::style('admin/css/jcarousel.responsive.css') !]
    [! Html::script('admin/js/jquery.jcarousel.min.js') !]
    [! Html::script('admin/js/jcarousel.responsive.js') !]
    [! Html::script('admin/js/ckeditor/ckeditor.js') !]
    <script>
        $( document ).ready(function() {
            @if($unit_data['module_type'] == 0)
            //單代理人頭像對話
            var temp_obj = $('#avatar_single_switch').clone().attr('id','single_switch').show();
            $('#tab_1').append(temp_obj);
            temp_obj = $('#avatar_single').clone().attr('id','single_dsc').show();
            $('#tab_1').append(temp_obj);
            @else
            //雙代理人頭像對話
            var temp_obj = $('#avatar_multiple_switch').clone().attr('id','multiple_switch').show();
            $('#tab_1').append(temp_obj);
            temp_obj = $('#avatar_multiple').clone().attr('id','multiple_dsc').show();
            $('#tab_1').append(temp_obj);
            @endif
            item_Next();
        });
    </script>
</head>
<body>
<form action="questions_data.php" method="post" enctype="multipart/form-data" id="form">
    <table class="edit">
        <tr>
            <!--標頭-->
            <th colspan="2">
                <h1>單元：[! $unit_data['title'] !]</h1>
                <h1>試卷名稱：[! $exampaper_data['title'] !]</h1>
                <h2>試題：試題 1</h2>
                <!--右上側工具：能力指標，作答時間，刪除，新增試題-->
                <ul>
                    <!--<li>能力指標說明<input type="text" size="25" /></li>
                    <li>作答時間<input type="text" size="4" maxlength="3" />分</li>-->
                    <li><a href="[! route('ad.index') !]" class="button_g" title="取消">取消</a></li>
                    <li><a class="button_g" title="新增試題資料" onclick="add_item()" id="add_data_btn">新增試題資料</a></li>
                    <li><a class="button_g" title="更新試題資料" onclick="update_item()" id="update_data_btn" style="display: none">更新試題資料</a></li>
				    <li><a class="button" title="上一試題" onclick="item_Back()" id="back_btn" style="display: none">上一試題</a></li>
                    <li><a class="button" title="下一試題" onclick="item_Next()" id="next_btn" style="display: none">下一試題</a></li>
                    <li><a class="button" title="新增試題" onclick="item_New()" id="new_btn" style="display: none">新增試題</a></li>
                    <li><a class="button" title="刪除試題" onclick="item_Del()" id="del_btn"  style="display: none">刪除試題</a></li>
                </ul>
            </th>
            <!--標頭end-->
        </tr>
        <tr>
            <td class="question" width="30%">
                <p>能力指標說明</p>
                <textarea name="questions_dsc" id="questions_dsc"></textarea>
            </td>
            <!--右中讓使用者選擇模組的區域-->
            <td class="main" width="70%" rowspan="2">
                <div id="img_area_1" style="">
                    <!-- 選擇ckedit -->
                    <div id="ckedit_area" >
                        <p>題目</p>
                        <textarea name="c_ckedit1" id="c_ckedit1"></textarea>
                        <br><br>
                        <p>提示搜尋說明</p>
                        <textarea name="c_ckedit1_memo" id="c_ckedit1_memo"></textarea>
                    </div>
                    <!-- 選擇ckedit end -->
                </div>
            </td>
            <!--右中讓使用者選擇模組的區域  end	-->
        </tr>
        <tr>
            <!--交談對話框-->
            <td class="talk">
                <h3>交談</h3>
                <!--交談頁籤-->
                <div class="abgne_tab">
                    <ul class="tabs">
                        <li><a onclick="chg_tab(1)">一般設定</a></li>
                        <li><a onclick="chg_tab(2)">正確答案</a></li>
                        <li><a onclick="chg_tab(3)">錯誤答案</a></li>
                    </ul>
                    <div class="tab_container">
                        <div id="tab_1" class="tab_content" style="display: block">
                            <div class="chat">
                                <span>配分</span>
                                <select id="score">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="chat">
                                <span>建構反應題型</span>
                                <select id="model_item_id">
                                    <option value="86">AT_選擇題</option>
                                    <option value="87">AT_區塊</option>
                                    <option value="88">AT_填充題</option>
                                    <option value="89">AT_不作答</option>
                                    <option value="90">AT_語意</option>
                                    <option value="91">AT_直式(乘法)</option>
                                    <option value="92">AT_直式(除法)</option>
                                    <option value="93">AT_直式(四則)</option>
                                    <option value="94">AT_直式(日時)</option>
                                    <option value="95">AT_直式(時分)</option>
                                    <option value="96">AT_直式(分秒)</option>
                                    <option value="97">AT_直式_除(日時)</option>
                                    <option value="98">AT_直式_除(時分)</option>
                                    <option value="99">AT_直式_除(分秒)</option>
                                    <option value="100">AT_選擇題(2)</option>
                                    <option value="101">AT_選擇題(3)</option>
                                    <option value="102">AT_區塊2</option>
                                    <option value="103">AT_語意(句子縮寫)</option>
                                </select>
                            </div>
                            <div class="chat">
                                <span>回饋類型</span>
                                <select id="feedback_type">
                                    <option value="0">main question1</option>
                                    <option value="1">main question2</option>
                                    <option value="2">main question3</option>
                                    <option value="3">Summary</option>
                                    <option value="4">hint</option>
                                    <option value="5">prompt</option>
                                    <option value="6">teaching</option>
                                    <option value="7">pump</option>
                                    <option value="8">short feedback</option>
                                    <option value="9">PComp</option>
                                    <option value="10">Assertion</option>
                                    <option value="11">T &amp; S Opening</option>
                                    <option value="12">Tutor main Question</option>
                                    <option value="13">Answer</option>
                                    <option value="14">Closing</option>
                                    <option value="15">Tutor Pos Fdbk</option>
                                    <option value="16">Tutor Neut Fdbk</option>
                                    <option value="17">Tutor Neg Fdbk</option>
                                    <option value="18">Student Pos Fdbk</option>
                                    <option value="19">Student Neut Fdbk</option>
                                    <option value="20">T &amp; S MtCog Fdbk</option>
                                    <option value="21">T &amp; S Neut Fdbk</option>
                                    <option value="22">Tutor Answer</option>
                                    <option value="23">Student Good Answer</option>
                                    <option value="24">Student Bad Answer + Tutor Neg Fdbk</option>
                                    <option value="25">Student Correct Answer</option>
                                    <option value="26">Tutor Question</option>
                                    <option value="27">Tutor Pos Fdbk + Tutor Ans</option>
                                    <option value="28">Student Neut Fdbk + Tutor Ans</option>
                                    <option value="29">Tutor Pump</option>
                                    <option value="30">T &amp; S Hint</option>
                                    <option value="31">Student Pos Fdbk + Tutor Pos Fdbk + Tutor Assertion</option>
                                    <option value="32">T &amp; S Prompt</option>
                                    <option value="33">Tutor Pos Fdbk + Tutor Ans + Tutor Assertion</option>
                                    <option value="34">Tutor Summary + T &amp; S Closing</option>
                                    <option value="35">Pos Fdbk + Summary</option>
                                    <option value="36">Pos Fdbk + Assertion</option>
                                    <option value="37">Pos Fdbk + Tutor Answer + Assertion</option>
                                    <option value="38">Neut Fdbk + Hint</option>
                                    <option value="39">Neut Fdbk + prompt</option>
                                    <option value="40">Neg Fdbk + Tutor Answer + Assertion</option>
                                    <option value="41">Meta Cog Fdbk + Neut Fdbk + Hint</option>
                                    <option value="42">hint + shortfeedback</option>
                                    <option value="43">pump + shortfeedback</option>
                                    <option value="44">Opening</option>
                                </select>
                            </div>
                            <div class="chat">
                                <span>回饋對話</span>
                                <input type="text" class="c_title" placeholder="請輸入回饋對話" id="feedback_dsc" >
                            </div>
                            <div class="chat">
                                <span>句子縮寫內容</span>
                                <input type="text" class="c_title" placeholder="請輸入句子縮寫內容" id="abbreviation" >
                            </div>
                        </div>
                        <div id="tab_2" class="tab_content" style="display: none">
                            <div class="chat" >
                                <span>正確答案</span>
                                <input type="text" name="correct_answer[]" value=""/>
                                <br>
                                <span>正確跳題</span>
                                <input type="text" name="correct_jump_num[]" value=""/>
                                <br>
                                <span>正確關鍵字</span>
                                <input type="text" name="correct_keyword[]" value=""/>
                            </div>
                            <p class="add" id="current_btn">
                                <a class="button" title="新增" onclick="add_correct_div()">新增</a>
                            </p>
                        </div>
                        <div id="tab_3" class="tab_content"  style="display: none">
                            <div class="chat" >
                                <span>錯誤答案</span>
                                <input type="text" name="error_answer[]" value=""/>
                                <br>
                                <span>錯誤答案關鍵字</span>
                                <input type="text" name="error_keyword[]"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>錯誤號碼</span>
                                <input type="text" name="error_number[]" value=""/>
                                <br>
                                <span>錯誤跳題</span>
                                <input type="text" name="error_jump_num[]" value=""/>
                            </div>
                            <p class="add" id="error_btn">
                                <a class="button" title="新增" onclick="add_error_div()">新增</a>
                            </p>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <input type="hidden" name="area_0_index" id="area_0_index" value="2">
    <input type="hidden" name="area_1_index" id="area_1_index" value="2">
    <input type="hidden" name="area_2_index" id="area_2_index" value="2">
    <input type="hidden" name="area_3_index" id="area_3_index" value="2">
    <input type="hidden" name="pcarea_0_index" id="pcarea_0_index" value="2">
    <input type="hidden" name="pcarea_1_index" id="pcarea_1_index" value="2">
    <input type="hidden" name="pcarea_2_index" id="pcarea_2_index" value="2">
    <input type="hidden" name="pcarea_3_index" id="pcarea_3_index" value="2">
    <input type="hidden" name="controller_type" id="controller_type" value=""><!--存檔狀態 -->
    <input type="hidden" name="operation_data_num" value="">
    <input type="hidden" name="getID" value="">
    <input type="hidden" name="q_order" value="">
    <input type="hidden" name="module_type" value="">
    <input type="hidden" name="sw_tab" id="sw_tab" value=""><!-- 選擇的會話 -->
</form>

<div class="chat" style="display:none" id="correct_div">
    <span>正確答案</span>
    <input type="text" name="correct_answer[]" value=""/>
    <br>
    <span>正確跳題</span>
    <input type="text" name="correct_jump_num[]" value=""/>
    <br>
    <span>正確關鍵字</span>
    <input type="text" name="correct_keyword[]" value=""/>
    <br>
    <p class="add" >
        <a class="button" title="移除" onclick="" >移除</a>
    </p>
</div>
<div class="chat" style="display:none" id="error_div">
    <span>錯誤答案</span>
    <input type="text" name="error_answer[]" value=""/>
    <br>
    <span>錯誤答案關鍵字</span>
    <input type="text" name="error_keyword[]"
           id="step_dsc_"
           value=""/>
    <br>
    <span>錯誤號碼</span>
    <input type="text" name="error_number[]" value=""/>
    <br>
    <span>錯誤跳題</span>
    <input type="text" name="error_jump_num[]" value=""/>
    <br>
    <p class="add" >
        <a class="button" title="移除" onclick="" >移除</a>
    </p>
</div>
<!-- 單代理人對話區 開始-->
<div class="chat" id="avatar_single_switch" style="display: none">
    <span>代理人頭像設定</span><br>
    <span>教師：</span>
    <select name="avatar_type">
        <option value="0"></option>
        <option value="1">Anna</option>
        <option value="2">Susan</option>
        <option value="3">Carla</option>
        <option value="4">Tom</option>
        <option value="5">Carl</option>
        <option value="6">John</option>
    </select>
</div>
<div class="" id="avatar_single" style="display: none">
    <span>代理人對話</span><br>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
</div>
<!-- 雙代理人對話區  結束-->
<div class="chat" id="avatar_multiple_switch" style="display: none">
    <span>代理人頭像設定</span><br>
    <span>教師：</span>
    <select name="avatar_type[]">
        <option value="0"></option>
        <option value="1">Anna</option>
        <option value="2">Susan</option>
        <option value="3">Carla</option>
        <option value="4">Tom</option>
        <option value="5">Carl</option>
        <option value="6">John</option>
    </select>
    <br>
    <span>學生：</span>
    <select name="avatar_type[]">
        <option value="0"></option>
        <option value="1">Anna</option>
        <option value="2">Susan</option>
        <option value="3">Carla</option>
        <option value="4">Tom</option>
        <option value="5">Carl</option>
        <option value="6">John</option>
    </select>
    <br>
</div>

<div class="" id="avatar_multiple" style="display: none">
    <span>代理人對話</span><br>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
            <option value="1">學生</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
            <option value="1">學生</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
            <option value="1">學生</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
            <option value="1">學生</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
    <div>
        <select name="avatar_dsc_type[]">
            <option value="0">教師</option>
            <option value="1">學生</option>
        </select>
        <input type="text" class="c_title" placeholder="請輸回饋對話" name="avatar_dsc[]"  value="">
    </div>
</div>
<!-- 雙代理人對話區  結束-->
<script type="text/javascript">
    CKEDITOR.replace('c_ckedit1', {});
    CKEDITOR.replace('c_ckedit1_memo', {});

    var item_id = 0;//目前編輯試題的id，無資料時為 0

    //取得上傳物件
    function get_item_objs() {
        var temp_obj = [];
        temp_obj.push({'exam_paper_id':'[! $exampaper_data["id"] !]'});
        temp_obj.push({'title':CKEDITOR.instances.c_ckedit1.getData()});
        temp_obj.push({'score':$('#score').val()});
        temp_obj.push({'model_item_id':$('#model_item_id').val()});
        temp_obj.push({'feedback_type':$('#feedback_type').val()});
        temp_obj.push({'feedback_dsc':$('#feedback_dsc').val()});
        temp_obj.push({'abbreviation':$('#abbreviation').val()});
        temp_obj.push({'id':item_id});
        //正確答案區
        var correct_obj = [];
        var temp_array = [];
        $('#tab_2 input[name="correct_answer[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'answer':temp_array});
        temp_array = [];
        $('#tab_2 input[name="correct_jump_num[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'jump':temp_array});
        temp_array = [];
        $('#tab_2 input[name="correct_keyword[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'keyword':temp_array});
        temp_obj.push({'correct_answer':correct_obj});
        //錯度答案區
        var error_obj = [];
        temp_array = [];
        $('#tab_3 input[name="error_answer[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'answer':temp_array});
        temp_array = [];
        $('#tab_3 input[name="error_jump_num[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'jump':temp_array});
        temp_array = [];
        $('#tab_3 input[name="error_number[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'number':temp_array});
        temp_array = [];
        $('#tab_3 input[name="error_keyword[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'keyword':temp_array});
        temp_obj.push({'error_answer':error_obj});

        //代理人頭像設定
        temp_array = [];
        $('#tab_1 select[name="avatar_type[]"]').each(function(){
            temp_array.push($(this).val());
        });
        temp_obj.push({'avatar_type':temp_array});

        //代理人對話
        var avatar_dsc_obj = [];
        temp_array = [];
        $('#tab_1 select[name="avatar_dsc_type[]"]').each(function(){
            temp_array.push($(this).val());
        });
        avatar_dsc_obj.push({'dsc_type':temp_array});
        temp_array = [];
        $('#tab_1 input[name="avatar_dsc[]"]').each(function(){
            temp_array.push($(this).val());
        });
        avatar_dsc_obj.push({'dsc':temp_array});
        temp_obj.push({'avatar_dsc':avatar_dsc_obj});

        return temp_obj;
    }

    //刪除試題
    function item_Del() {
        if(confirm("確認刪除試題資料嗎？"))
        {
            var path = '[! route("ad.questions.delete",array($exampaper_data["id"])) !]';
            if(item_id > 0){
                $.ajax({
                    url: path,
                    type:'delete',
                    dataType: "json",
                    data: {
                        _token: '[! csrf_token() !]',
                        question_id: item_id
                    },
                    error: function(xhr) {
                        //alert('Ajax request 發生錯誤');
                    },
                    success: function(response) {
                        if(response['type'] == 'success'){
                            if(response['has_next']){
                                item_Next();
                            }else  if(response['has_back']){
                                item_Back();
                            }else {
                                reset_item();
                                item_New();
                            }
                        }
                    }
                });
            }
        }
    }

    //新增試題
    function item_New(){
        if(item_id > 0){
            $('#back_btn').show();
        }
        reset_item();
        CKEDITOR.instances.c_ckedit1.setData('');
        $('#next_btn').hide();
        $('#new_btn').hide();
        $('#add_data_btn').show();
        $('#update_data_btn').hide();
        $('#del_btn').hide();

    }

    //回上一個試題
    function item_Back(){
        var path = '[! route("ad.questions.back",array($exampaper_data["id"])) !]';

        $.ajax({
            url: path,
            type:'GET',
            dataType: "json",
            data: {
                question_id: item_id
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                reset_item();
                if(response['type'] == 'success'){
                    load_item(response['data']);
                    $('#del_btn').show();
                }else{
                    CKEDITOR.instances.c_ckedit1.setData('');
                    $('#del_btn').hide();
                }
                if(response['has_next']){
                    $('#next_btn').show();
                    $('#new_btn').hide();
                }else{
                    $('#next_btn').hide();
                    $('#new_btn').show();
                }
                if(response['has_back']){
                    $('#back_btn').show();
                }else{
                    $('#back_btn').hide();
                }
            }
        });
    }

    //取得下一個試題資料
    function item_Next(){
        var path = '[! route("ad.questions.next",array($exampaper_data["id"])) !]';

        $.ajax({
            url: path,
            type:'GET',
            dataType: "json",
            data: {
                question_id: item_id
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                reset_item();
                //判斷有無資料
                if(response['type'] == 'success'){
                    load_item(response['data']);
                    $('#add_data_btn').hide();
                    $('#update_data_btn').show();
                    $('#del_btn').show();
                }else{
                    CKEDITOR.instances.c_ckedit1.setData('');
                    $('#add_data_btn').show();
                    $('#update_data_btn').hide();
                    $('#del_btn').hide();
                }
                if(response['has_next']){
                    $('#next_btn').show();
                    $('#new_btn').hide();
                }else{
                    $('#next_btn').hide();
                    if(item_id > 0){
                        $('#new_btn').show();
                    }
                }

                if(response['has_back']){
                    $('#back_btn').show();
                }else{
                    $('#back_btn').hide();
                }
            }
        });
    }

    //清除
    function reset_item(){
        $('#c_ckedit1').html('');
        $('#score').val('1');
        $('#model_item_id').val('86');
        $('#feedback_type').val('0');
        $('#feedback_dsc').val('');
        $('#abbreviation').val('');
        item_id = 0;
        //代理人頭像設定
        $('#tab_1 select[name="avatar_type[]"]').each(function(){
            $(this).val('');
        });
        //代理人對話
        $('#tab_1 select[name="avatar_dsc_type[]"]').each(function(){
            $(this).val('0');
        });
        $('#tab_1 input[name="avatar_dsc[]"]').each(function(){
            $(this).val('');
        });

        //正確答案區
        var x=0;
        $('#tab_2 div').each(function(){
            if(x > 0){
                $(this).remove();
            }
            x++;
        });
        $('#tab_2 input[name="correct_answer[]"]').each(function(){
            $(this).val('');
        });
        $('#tab_2 input[name="correct_jump_num[]"]').each(function(){
            $(this).val('');
        });
        $('#tab_2 input[name="correct_keyword[]"]').each(function(){
            $(this).val('');
        });
        //錯誤答案區
        x=0;
        $('#tab_3 div').each(function(){
            if(x > 0){
                $(this).remove();
            }
            x++;
        });
        $('#tab_3 input[name="error_answer[]"]').each(function(){
            $(this).val('');
        });
        $('#tab_3 input[name="error_jump_num[]"]').each(function(){
            $(this).val('');
        });
        $('#tab_3 input[name="error_number[]"]').each(function(){
            $(this).val('');
        });
        $('#tab_3 input[name="error_keyword[]"]').each(function(){
            $(this).val('');
        });
    }

    //套用試題資料
    function load_item(item_data) {
        var item_index= 0;
        CKEDITOR.instances.c_ckedit1.setData(item_data['title']);
        $('#score').val(item_data['score']);
        $('#model_item_id').val(item_data['model_item_id']);
        $('#feedback_type').val(item_data['feedback_type']);
        $('#feedback_dsc').val(item_data['feedback_dsc']);
        $('#abbreviation').val(item_data['abbreviation']);
        item_id = item_data['id'];
        //代理人頭像設定
        var json_item = JSON.parse(item_data['avatar_type']);
        $('#tab_1 select[name="avatar_type[]"]').each(function(){
            $(this).val(json_item[item_index][0]);
            item_index++;
        });
        //代理人對話
        item_index=0;
        var json_item = JSON.parse(item_data['avatar_dsc']);
        $('#tab_1 select[name="avatar_dsc_type[]"]').each(function(){
            $(this).val(json_item[0]['dsc_type'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_1 input[name="avatar_dsc[]"]').each(function(){
            $(this).val(json_item[1]['dsc'][item_index]);
            item_index++;
        });

        //正確答案區塊
        item_index=0;
        var json_item = JSON.parse(item_data['correct_answer']);
        if(json_item.length >1){
            for(var x=1;x < json_item[0]['answer'].length;x++){
                add_correct_div();
            }
        }
        item_index=0;
        $('#tab_2 input[name="correct_answer[]"]').each(function(){
            $(this).val(json_item[0]['answer'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_2 input[name="correct_jump_num[]"]').each(function(){
            $(this).val(json_item[1]['jump'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_2 input[name="correct_keyword[]"]').each(function(){
            $(this).val(json_item[2]['keyword'][item_index]);
            item_index++;
        });

        //錯誤答案區塊
        item_index=0;
        var json_item = JSON.parse(item_data['error_answer']);
        if(json_item.length >1){
            for(var x=1;x < json_item[0]['answer'].length;x++){
                add_error_div();
            }
        }
        item_index=0;
        $('#tab_3 input[name="error_answer[]"]').each(function(){
            $(this).val(json_item[0]['answer'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_3 input[name="error_jump_num[]"]').each(function(){
            $(this).val(json_item[1]['jump'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_3 input[name="error_number[]"]').each(function(){
            $(this).val(json_item[2]['number'][item_index]);
            item_index++;
        });
        item_index=0;
        $('#tab_3 input[name="error_keyword[]"]').each(function(){
            $(this).val(json_item[3]['keyword'][item_index]);
            item_index++;
        });

        //更新按鈕
        if(item_data['has_next']){
            $('#next_btn').html('下一個試題');
            $('#next_btn').attr('title','下一個試題');
        }

    }

    //新增試題資料
    function add_item() {
        var up_obj = get_item_objs();
        $.ajax({
            url: '[! route("ad.questions.add") !]',
            type:'POST',
            data: {
            _token: '[! csrf_token() !]',
            add_data:up_obj
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                item_id = response;
                alert('新增試卷成功!!');
                $('#new_btn').show();
                $('#del_btn').show();
            }
        });
    }

    //更新試題資料
    function update_item() {
        var up_obj = get_item_objs();
        $.ajax({
            url: '[! route("ad.questions.update") !]',
            type:'PUT',
            data: {
                _token: '[! csrf_token() !]',
                update_data:up_obj
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                item_id = response;
                alert('更新成功!!');
            }
        });
    }

    function chg_tab(tab_id) {
        for(var x=1;x < 4;x++){
            if(tab_id == x){
                $('#tab_'+x).show();
            }else{
                $('#tab_'+x).hide();
            }
        }
    }

    var correct_num =0 ;
    function add_correct_div() {
        var temp_obj = $('#correct_div').clone().attr('id','correct_'+correct_num).show();
        temp_obj.find('a').attr('onclick','$("#correct_'+correct_num+'").remove()');
        $('#current_btn').before(temp_obj);
        correct_num++;
    }
    var error_num =0 ;
    function add_error_div() {
        var temp_obj = $('#error_div').clone().attr('id','error_'+correct_num).show();
        temp_obj.find('a').attr('onclick','$("#error_'+correct_num+'").remove()');
        $('#error_btn').before(temp_obj);
        error_num++;
    }
</script>
<audio src="" id="playAudio" autoplay>
</audio>
</body>
</html>