@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-exam">建立試題</h1>
        <div class="section-content">
            <ul id="exam-unit-wrap" class="clearfix">
                <li><a href="[! route('ad.exampaper.add.page') !]">新增試卷</a></li>
                <li><a href="[! route('ad.questions.add.page') !]">新增試題</a></li>
                <li><a class="current-page"  href="[! route('ad.exampaper.vol.list.page') !]">編修試卷</a></li>
            </ul>
            <form id="addschool-form">
                <div class="select-group">
                    <div class="label-title">題目</div>
                    <div class="edit-wrap">
                        <textarea name="c_ckedit1" id="c_ckedit1">[! isset($item_data['title'])?$item_data['title']:'' !]</textarea>
                    </div>
                </div>
                <div class="select-group">
                    <div class="label-title">建構反應題型</div>
                    <select id="model_item_id" onchange="show_option_area()" >
                        <option value="1" [! (isset($item_data['model_item_id']) and $item_data['model_item_id'] == 1) ?'selected':'' !]>AT_直式(日時)</option>
                        <option value="2" [! (isset($item_data['model_item_id']) and $item_data['model_item_id'] == 2) ?'selected':'' !]>AT_不作答</option>
                        <option value="3" [! (isset($item_data['model_item_id']) and $item_data['model_item_id'] == 3) ?'selected':'' !]>AT_填充題</option>
                        <option value="4" [! (isset($item_data['model_item_id']) and $item_data['model_item_id'] == 4) ?'selected':'' !]>AT_選擇題</option>
                        <option value="5" [! (isset($item_data['model_item_id']) and $item_data['model_item_id'] == 5) ?'selected':'' !]>AT_語意</option>
                    </select>
                </div>
                <!-- 選擇題選項區塊 開始 -->
                <div id="multiple_choice_questions_area" style="[! ($item_data['model_item_id'] == 4)?'':'display:none;' !]">
                    <div class="select-group" id="add_option_area">
                        <div class="label-title">選擇題選項</div>
                        <input class="select-input" type="text" value="[! isset($item_data['model_item_options'][0])?$item_data['model_item_options'][0]:'' !]" name="multiple_choice_questions[]">
                        <input class="btn btn-option" type="button" value="新增" onclick="add_multiple_choice_questions_div()">
                    </div>
                    @if( $item_data['model_item_id'] == 4 AND count($item_data['model_item_options']) >1)
                        @for($x=1;$x<count($item_data['model_item_options']);$x++)
                            <div class="select-group" id="option_item_[! $x !]" >
                                <div class="label-title">選擇題選項</div>
                                <input class="select-input" type="text" value="[! $item_data['model_item_options'][$x] !]" name="multiple_choice_questions[]">
                                <input class="btn btn-option" type="button" value="移除選項" onclick='$("#option_item_[! $x !]").remove()'>
                            </div>
                        @endfor
                    @endif
                </div>
                <!-- 選擇題選項區塊 結束 -->
                <div class="select-group">
                    <div class="label-title">回饋類型</div>
                    <select id="feedback_type">
                        @foreach($feedback_list as $key => $v)
                            <option value="[! $key !]" [! (isset($item_data['feedback_type']) and $item_data['feedback_type'] == $key)?'selected':'' !]>[! $v !]</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">回饋對話(教師)</div>
                    <input class="select-input" type="text" value="">
                </div>
                <div class="select-group">
                    <div class="label-title">回饋對話(學生)</div>
                    <input class="select-input" type="text" value="">
                </div>
                <!-- 電腦代理人設定區塊-->
                <div id="div_people_pic_setting">
                    @if(isset($item_data['module_type']) AND $item_data['module_type'] == 1)
                        <div class="chat" id="avatar_single_switch" >
                            <div class="select-group">
                                <div class="label-title">代理人頭像設定(教師)</div>
                                <select name="avatar_type[]">
                                    <option value="1">Anna</option>
                                    <option value="2" [! ($item_data['avatar_type'][0] == 2)?'selected':'' !]>Susan</option>
                                    <option value="3" [! ($item_data['avatar_type'][0] == 3)?'selected':'' !]>Carla</option>
                                    <option value="4" [! ($item_data['avatar_type'][0] == 4)?'selected':'' !]>Tom</option>
                                    <option value="5" [! ($item_data['avatar_type'][0] == 5)?'selected':'' !]>Carl</option>
                                    <option value="6" [! ($item_data['avatar_type'][0] == 6)?'selected':'' !]>John</option>
                                </select>
                            </div>
                            <div class="select-group">
                                <div class="label-title">代理人對話</div>
                                <select name="avatar_dsc_type[]" class="select-s">
                                    <option value="0">教師</option>
                                </select>
                                <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][0])?$item_data['avatar_dsc']['dsc'][0]:'' !]" name="avatar_dsc[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">代理人對話</div>
                                <select name="avatar_dsc_type[]" class="select-s">
                                    <option value="0">教師</option>
                                </select>
                                <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][1])?$item_data['avatar_dsc']['dsc'][1]:'' !]" name="avatar_dsc[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">代理人對話</div>
                                <select name="avatar_dsc_type[]" class="select-s">
                                    <option value="0">教師</option>
                                </select>
                                <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][2])?$item_data['avatar_dsc']['dsc'][2]:'' !]" name="avatar_dsc[]">
                            </div>
                        </div>
                    @endif
                    @if(isset($item_data['module_type']) AND $item_data['module_type'] == 2)

                            <div class="chat" id="avatar_multiple_switch" >
                                <div class="select-group">
                                    <div class="label-title">代理人頭像設定(教師)</div>
                                    <select name="avatar_type[]" >
                                        <option value="1">Anna</option>
                                        <option value="2" [! ($item_data['avatar_type'][0] == 2)?'selected':'' !]>Susan</option>
                                        <option value="3" [! ($item_data['avatar_type'][0] == 3)?'selected':'' !]>Carla</option>
                                        <option value="4" [! ($item_data['avatar_type'][0] == 4)?'selected':'' !]>Tom</option>
                                        <option value="5" [! ($item_data['avatar_type'][0] == 5)?'selected':'' !]>Carl</option>
                                        <option value="6" [! ($item_data['avatar_type'][0] == 6)?'selected':'' !]>John</option>
                                    </select>
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人頭像設定(學生)</div>
                                    <select name="avatar_type[]" >
                                        <option value="1">Anna</option>
                                        <option value="2" [! ($item_data['avatar_type'][1] == 2)?'selected':'' !]>Susan</option>
                                        <option value="3" [! ($item_data['avatar_type'][1] == 3)?'selected':'' !]>Carla</option>
                                        <option value="4" [! ($item_data['avatar_type'][1] == 4)?'selected':'' !]>Tom</option>
                                        <option value="5" [! ($item_data['avatar_type'][1] == 5)?'selected':'' !]>Carl</option>
                                        <option value="6" [! ($item_data['avatar_type'][1] == 6)?'selected':'' !]>John</option>
                                    </select>
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][0] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][0])?$item_data['avatar_dsc']['dsc'][0]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][1] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][1])?$item_data['avatar_dsc']['dsc'][1]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][2] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][2])?$item_data['avatar_dsc']['dsc'][2]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][3] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][3])?$item_data['avatar_dsc']['dsc'][3]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][4] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][4])?$item_data['avatar_dsc']['dsc'][4]:'' !]" name="avatar_dsc[]">
                                </div>
                            </div>
                    @endif
                    @if(isset($item_data['module_type']) AND $item_data['module_type'] == 3)

                            <div class="chat" id="avatar_multiple_switch" >
                                <div class="select-group">
                                    <div class="label-title">代理人頭像設定(教師)</div>
                                    <select name="avatar_type[]" >
                                        <option value="1">Anna</option>
                                        <option value="2" [! ($item_data['avatar_type'][0] == 2)?'selected':'' !]>Susan</option>
                                        <option value="3" [! ($item_data['avatar_type'][0] == 3)?'selected':'' !]>Carla</option>
                                        <option value="4" [! ($item_data['avatar_type'][0] == 4)?'selected':'' !]>Tom</option>
                                        <option value="5" [! ($item_data['avatar_type'][0] == 5)?'selected':'' !]>Carl</option>
                                        <option value="6" [! ($item_data['avatar_type'][0] == 6)?'selected':'' !]>John</option>
                                    </select>
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人頭像設定(學生)</div>
                                    <select name="avatar_type[]" >
                                        <option value="1">Anna</option>
                                        <option value="2" [! ($item_data['avatar_type'][1] == 2)?'selected':'' !]>Susan</option>
                                        <option value="3" [! ($item_data['avatar_type'][1] == 3)?'selected':'' !]>Carla</option>
                                        <option value="4" [! ($item_data['avatar_type'][1] == 4)?'selected':'' !]>Tom</option>
                                        <option value="5" [! ($item_data['avatar_type'][1] == 5)?'selected':'' !]>Carl</option>
                                        <option value="6" [! ($item_data['avatar_type'][1] == 6)?'selected':'' !]>John</option>
                                    </select>
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][0] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][0])?$item_data['avatar_dsc']['dsc'][0]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][1] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][1])?$item_data['avatar_dsc']['dsc'][1]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][2] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][2])?$item_data['avatar_dsc']['dsc'][2]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][3] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][3])?$item_data['avatar_dsc']['dsc'][3]:'' !]" name="avatar_dsc[]">
                                </div>
                                <div class="select-group">
                                    <div class="label-title">代理人對話</div>
                                    <select name="avatar_dsc_type[]" class="select-s">
                                        <option value="0">教師</option>
                                        <option value="1" [! ($item_data['avatar_dsc']['type'][4] == 1)?'selected':'' !]>學生</option>
                                    </select>
                                    <input class="select-input" type="text" value="[! isset($item_data['avatar_dsc']['dsc'][4])?$item_data['avatar_dsc']['dsc'][4]:'' !]" name="avatar_dsc[]">
                                </div>
                            </div>
                    @endif
                </div>
                <!-- 電腦代理人設定區塊 結束-->
                <div id="div_right" class="tab_content">
                    <div class="select-group">
                        <div class="label-title">正確答案</div>
                        <input class="select-input" type="text" value="[! $item_data['correct_answer'][0]['answer'] !]" name="correct_answer[]">
                    </div>
                    <div class="select-group">
                        <div class="label-title">正確跳題</div>
                        <input class="select-input" type="text" value="[! $item_data['correct_answer'][0]['jump'] !]" name="correct_jump_num[]">
                    </div>
                    <div class="select-group">
                        <div class="label-title">正確關鍵字</div>
                        <input class="select-input" type="text" value="[! $item_data['correct_answer'][0]['keyword'] !]" name="correct_keyword[]">
                        <input class="btn btn-option" type="button" value="新增選項" onclick="add_correct_div()">
                    </div>
                </div>
                @if(count($item_data['correct_answer']) > 1)
                    @for($x=1;$x<count($item_data['correct_answer']);$x++)
                        <div id="correct_[! $x !]">
                            <div class="select-group">
                                <div class="label-title">正確答案</div>
                                <input class="select-input" type="text" value="[! $item_data['correct_answer'][$x]['answer'] !]" name="correct_answer[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">正確跳題</div>
                                <input class="select-input" type="text" value="[! $item_data['correct_answer'][$x]['jump'] !]" name="correct_jump_num[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">正確關鍵字</div>
                                <input class="select-input" type="text" value="[! $item_data['correct_answer'][$x]['keyword'] !]" name="correct_keyword[]">
                                <input class="btn btn-option" type="button" value="移除選項" onclick='$("#correct_[! $x !]").remove()'>
                            </div>
                        </div>
                    @endfor
                @endif
                <div id="div_error" >
                    <div class="select-group">
                        <div class="label-title">錯誤bug號碼</div>
                        <input class="select-input" type="text" value="[! $item_data['error_answer'][0]['number'] !]" name="error_number[]">
                    </div>
                    <div class="select-group">
                        <div class="label-title">錯誤bug跳題</div>
                        <input class="select-input" type="text" value="[! $item_data['error_answer'][0]['jump'] !]" name="error_jump_num[]">
                    </div>
                    <div class="select-group">
                        <div class="label-title">錯誤答案</div>
                        <input class="select-input" type="text" value="[! $item_data['error_answer'][0]['answer'] !]" name="error_answer[]">
                    </div>
                    <div class="select-group">
                        <div class="label-title">錯誤答案(關鍵字)</div>
                        <input class="select-input" type="text" value="[! $item_data['error_answer'][0]['keyword'] !]" name="error_keyword[]">
                        <input class="btn btn-option" type="button" value="新增選項" onclick="add_error_div()">
                    </div>
                </div>
                @if(count($item_data['error_answer']) > 1)
                    @for($x=1;$x<count($item_data['error_answer']);$x++)
                        <div  id="error_[! $x !]">
                            <div class="select-group">
                                <div class="label-title">錯誤bug號碼</div>
                                <input class="select-input" type="text" value="[! $item_data['error_answer'][$x]['number'] !]" name="error_number[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">錯誤bug跳題</div>
                                <input class="select-input" type="text" value="[! $item_data['error_answer'][$x]['jump'] !]" name="error_jump_num[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">錯誤答案</div>
                                <input class="select-input" type="text" value="[! $item_data['error_answer'][$x]['answer'] !]" name="error_answer[]">
                            </div>
                            <div class="select-group">
                                <div class="label-title">錯誤答案(關鍵字)</div>
                                <input class="select-input" type="text" value="[! $item_data['error_answer'][$x]['keyword'] !]" name="error_keyword[]">
                                <input class="btn btn-option" type="button" value="移除選項" onclick='$("#error_[! $x !]").remove()'>
                            </div>
                        </div>
                    @endfor
                @endif
                <div class="form-button-wrap" id="sendbutton">
                    <input class="btn-yellow" type="button" value="回上一頁" onclick="history.back();" />
                    <input class="btn-green" type="button" value="儲存" onclick="update_item()" />
                </div>
            </form>
        </div>
    </div>
</div>
<div style="display:none" id="correct_div">
    <div class="select-group">
        <div class="label-title">正確答案</div>
        <input class="select-input" type="text" value="" name="correct_answer[]">
    </div>
    <div class="select-group">
        <div class="label-title">正確跳題</div>
        <input class="select-input" type="text" value="" name="correct_jump_num[]">
    </div>
    <div class="select-group">
        <div class="label-title">正確關鍵字</div>
        <input class="select-input" type="text" value="" name="correct_keyword[]">
        <input class="btn btn-option" type="button" value="移除選項" id="del_btn">
    </div>
</div>
<div style="display:none" id="error_div">
    <div class="select-group">
        <div class="label-title">錯誤bug號碼</div>
        <input class="select-input" type="text" value="" name="error_number[]">
    </div>
    <div class="select-group">
        <div class="label-title">錯誤bug跳題</div>
        <input class="select-input" type="text" value="" name="error_jump_num[]">
    </div>
    <div class="select-group">
        <div class="label-title">錯誤答案</div>
        <input class="select-input" type="text" value="" name="error_answer[]">
    </div>
    <div class="select-group">
        <div class="label-title">錯誤答案(關鍵字)</div>
        <input class="select-input" type="text" value="" name="error_keyword[]">
        <input class="btn btn-option" type="button" value="移除選項" id="del_btn">
    </div>
</div>
<!-- 選擇題選項區塊  開始-->
<div class="select-group" id="module_option_item" style="display: none">
    <div class="label-title">選擇題選項</div>
    <input class="select-input" type="text" value="" name="multiple_choice_questions[]">
    <input class="btn btn-option" type="button" value="移除選項" id="del_btn">
</div>
<!-- 選擇題選項區塊  結束-->
[! Html::script('admin/js/jquery-1.10.1.min.js') !]
[! Html::script('admin/js/jquery.jcarousel.min.js') !]
[! Html::script('admin/js/jcarousel.responsive.js') !]
[! Html::script('admin/js/ckeditor/ckeditor.js') !]

<script>
    var unit_data = [];
    var subject_data = [];
    var exampaper_data = [];

    @foreach($unit_data as $v)
    unit_data.push({
        'id':'[! $v["id"] !]',
        'module_type':'[! $v["module_type"] !]',
        'subject':'[! $v["subject"] !]',
        'subject_vol':'[! $v["vol"] !]',
        'subject_unit':'[! $v["unit"] !]',
    });
    @endforeach
    @foreach($subject_data as $k => $v)
    subject_data.push({
        'id':'[! $k !]',
        'name':'[! $v !]',
    });
    @endforeach
    @foreach($exampaper_data as $k => $v)
    exampaper_data.push({
        'id':'[! $v['id'] !]',
        'unit_list_id':'[! $v['unit_list_id'] !]',
        'paper_vol':'[! $v['paper_vol'] !]',
    });
    @endforeach


        CKEDITOR.replace('c_ckedit1', {});
    $( document ).ready(function() {


    });

    function get_subject_option()
    {
        get_people_pic();
        var t_array = [];
        var module_type_value = $("#module_type").val();
        if(module_type_value != '')
        {
            $("#subject option").remove();
            $("#subject").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(unit_data[x]['module_type'] == module_type_value)
                {
                    t_array.push(unit_data[x]['subject']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {

                    $("#subject").append($("<option></option>").attr("value", t_array[x]).text(get_subject_name(t_array[x])));
                }
            }
        }
    }

    function get_subject_vol_option()
    {
        var t_array = [];
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        if(module_type_value != '' && subject_value != '')
        {
            $("#subject_vol option").remove();
            $("#subject_vol").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(unit_data[x]['module_type'] == module_type_value && unit_data[x]['subject'] == subject_value)
                {
                    t_array.push(unit_data[x]['subject_vol']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {
                    $("#subject_vol").append($("<option></option>").attr("value", t_array[x]).text(t_array[x]));
                }
            }
        }
    }

    function get_subject_unit_option()
    {
        var t_array = [];
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var subject_vol_value = $("#subject_vol").val();
        if(module_type_value != '' && subject_value != '' && subject_vol_value !='')
        {
            $("#subject_unit option").remove();
            $("#subject_unit").append($("<option></option>").attr("value", '').text('請選擇'));

            for(var x=0;x < unit_data.length;x++)
            {
                if(
                    unit_data[x]['module_type'] == module_type_value
                    && unit_data[x]['subject'] == subject_value
                    && unit_data[x]['subject_vol'] == subject_vol_value
                )
                {
                    t_array.push(unit_data[x]['subject_unit']);
                }
            }
            if(t_array.length > 0)
            {
                t_array = unique1(t_array);
                for(var x=0;x<t_array.length;x++)
                {
                    $("#subject_unit").append($("<option></option>").attr("value", t_array[x]).text(t_array[x]));
                }
            }
        }
    }

    function get_vol_option()
    {
        $("#vol option").remove();
        $("#vol").append($("<option></option>").attr("value", '').text('請選擇'));
        var module_type_value = $("#module_type").val();
        var subject_value = $("#subject").val();
        var subject_vol_value = $("#subject_vol").val();
        var subject_unit_value = $("#subject_unit").val();

        for(var x=0;x < unit_data.length;x++)
        {
            if(unit_data[x]['module_type'] == module_type_value
                && unit_data[x]['subject'] == subject_value
                && unit_data[x]['subject_vol'] == subject_vol_value
                && unit_data[x]['subject_unit'] == subject_unit_value
            )
            {
                var unit_list_id = unit_data[x]['id'];
                if( exampaper_data.length > 0)
                {
                    for(var x=0;x < exampaper_data.length;x++)
                    {
                        if( exampaper_data[x]['unit_list_id'] == unit_list_id )
                        {
                            $("#vol").append($("<option></option>").attr("value", exampaper_data[x]['id']).text('卷'+exampaper_data[x]['paper_vol']));
                        }
                    }
                }
            }
        }
    }

    // 取得科目名稱
    function get_subject_name(id)
    {
        var dsc = '';
        for(var x=0;x<subject_data.length;x++)
        {
            if(subject_data[x]['id'] == id)
            {
                dsc = subject_data[x]['name'];
            }
        }

        return dsc;
    }
    // 去掉陣列重複的值
    function unique1(array){
        var n = [];
        for(var i = 0; i < array.length; i++){
            if (n.indexOf(array[i]) == -1) n.push(array[i]);
        }

        return n;
    }

    function get_people_pic()
    {
        $('#div_people_pic_setting').html('');
        if($('#module_type').val() == 1)
        {
            //單代理人頭像對話
            var temp_obj = $('#avatar_single_switch').clone().attr('id','single_switch').show();
            $('#div_people_pic_setting').append(temp_obj);
        }

        if($('#module_type').val() == 2)
        {
            //雙代理人頭像對話
            var temp_obj = $('#avatar_multiple_switch').clone().attr('id','multiple_switch').show();
            $('#div_people_pic_setting').append(temp_obj);
        }
        if($('#module_type').val() == 3)
        {
            //雙代理人頭像對話
            var temp_obj = $('#avatar_multiple_switch').clone().attr('id','multiple_switch').show();
            $('#div_people_pic_setting').append(temp_obj);
        }
    }

    /**
     * 新增 正確答案區塊
     */
    var correct_num = [! count($item_data['correct_answer']) !];
    function add_correct_div() {
        var temp_obj = $('#correct_div').clone().attr('id','correct_'+correct_num).show();
        temp_obj.find('input[id="del_btn"]').attr('onclick','$("#correct_'+correct_num+'").remove()');
        $('#div_error').before(temp_obj);
        correct_num++;
    }

    /**
     * 新增 錯誤答案區塊
     */
    var error_num = [! count($item_data['error_answer']) !] ;
    function add_error_div() {
        var temp_obj = $('#error_div').clone().attr('id','error_'+correct_num).show();
        temp_obj.find('input[id="del_btn"]').attr('onclick','$("#error_'+correct_num+'").remove()');
        $('#sendbutton').before(temp_obj);
        error_num++;
    }

    /**
     * 根據選擇的模組，判斷是否顯示額外的選項區域
     *
     */
    function show_option_area()
    {
        var getIndex = $('#model_item_id').val();
        //選擇題
        if(getIndex == '4'){
            $('#multiple_choice_questions_area').show();
        }else{
            $('#multiple_choice_questions_area').hide();
        }
    }

    /**
     * 增加一個選擇題選項輸入
     *
     */
    var option_item_num = [! count($item_data['model_item_options']) !];
    function add_multiple_choice_questions_div()
    {
        var temp_obj = $('#module_option_item').clone().attr('id','option_item_'+option_item_num).show();
        temp_obj.find('input[id="del_btn"]').attr('onclick','$("#option_item_'+option_item_num+'").remove()');
        $('#multiple_choice_questions_area').append(temp_obj);
        option_item_num++;

    }

    //更新試題資料
    function update_item() {
        var up_obj = get_item_objs();
        $.ajax({
            url: '[! route("ad.questions.update") !]',
            type:'POST',
            data: {
                _token: '[! csrf_token() !]',
                update_data:up_obj
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                alert('更新試題成功!!');
            }
        });
    }

    //取得上傳物件
    function get_item_objs() {
        var temp_obj = [];
        temp_obj.push({'id':'[! $item_id !]'});
        temp_obj.push({'title':CKEDITOR.instances.c_ckedit1.getData()});
        temp_obj.push({'model_item_id':$('#model_item_id').val()});
        temp_obj.push({'feedback_type':$('#feedback_type').val()});
        //正確答案區
        var correct_obj = [];
        var temp_array = [];
        $('#addschool-form input[name="correct_answer[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'answer':temp_array});
        temp_array = [];
        $('#addschool-form input[name="correct_jump_num[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'jump':temp_array});
        temp_array = [];
        $('#addschool-form input[name="correct_keyword[]"]').each(function(){
            temp_array.push($(this).val());
        });
        correct_obj.push({'keyword':temp_array});
        temp_obj.push({'correct_answer':correct_obj});
        //錯度答案區
        var error_obj = [];
        temp_array = [];
        $('#addschool-form input[name="error_answer[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'answer':temp_array});
        temp_array = [];
        $('#addschool-form input[name="error_jump_num[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'jump':temp_array});
        temp_array = [];
        $('#addschool-form input[name="error_number[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'number':temp_array});
        temp_array = [];
        $('#addschool-form input[name="error_keyword[]"]').each(function(){
            temp_array.push($(this).val());
        });
        error_obj.push({'keyword':temp_array});
        temp_obj.push({'error_answer':error_obj});

        //代理人頭像設定
        temp_array = [];
        $('#div_people_pic_setting select[name="avatar_type[]"]').each(function(){
            temp_array.push($(this).val());
        });
        temp_obj.push({'avatar_type':temp_array});

        //代理人對話
        var avatar_dsc_obj = [];
        temp_array = [];
        $('#div_people_pic_setting select[name="avatar_dsc_type[]"]').each(function(){
            temp_array.push($(this).val());
        });
        avatar_dsc_obj.push({'dsc_type':temp_array});
        temp_array = [];
        $('#div_people_pic_setting input[name="avatar_dsc[]"]').each(function(){
            temp_array.push($(this).val());
        });
        avatar_dsc_obj.push({'dsc':temp_array});
        temp_obj.push({'avatar_dsc':avatar_dsc_obj});

        //選擇題的選項
        temp_array = [];
        $('#multiple_choice_questions_area input[name="multiple_choice_questions[]"]').each(function(){
            if($(this).val() != ''){
                temp_array.push($(this).val());
            }
        });
        temp_obj.push({'model_item_options':temp_array});

        return temp_obj;
    }
</script>
@stop