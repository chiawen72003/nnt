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
                    <li><a href="index.php" class="button_g" title="取消">取消</a></li>
                    <li><a class="button_g" title="存檔" onclick="save_q()">存檔</a></li>
				    <li><a class="button" title="回上一試題" onclick="go_back_q()">回上一試題</a></li>
                    <li><a class="button" title="新增試題、下一個試題" onclick="go_next_q()">新增試題、下一個試題</a></li>
                    <li><a class="button" title="刪除試題" onclick="del_q()">刪除試題</a></li>
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
                                <select>
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
                                <select>
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
                                <span>回饋類型</span>
                                <select>
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
                                <span>回饋對話</span>
                                <input type="text" class="c_title" placeholder="請輸回饋對話"
                                       name="" id=""
                                       value="">
                            </div>
                            <div class="chat">
                                <span>句子縮寫內容</span>
                                <input type="text" class="c_title" placeholder="請輸回饋對話"
                                       name="" id=""
                                       value="">
                            </div>
                        </div>
                        <div id="tab_2" class="tab_content" style="display: none">
                            <div class="chat" >
                                <span>正確答案</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>正確跳題</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>正確關鍵字</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                            </div>
                            <p class="add" id="current_btn">
                                <a class="button" title="新增" onclick="add_correct_div()">新增</a>
                            </p>
                        </div>
                        <div id="tab_3" class="tab_content"  style="display: none">
                            <div class="chat" >
                                <span>錯誤答案</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>錯誤答案關鍵字</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>錯誤號碼</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
                                <br>
                                <span>錯誤跳題</span>
                                <input type="text" name="step_dsc_"
                                       id="step_dsc_"
                                       value=""/>
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
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <span>正確跳題</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <span>正確關鍵字</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <p class="add" >
        <a class="button" title="移除" onclick="" >移除</a>
    </p>
</div>
<div class="chat" style="display:none" id="error_div">
    <span>錯誤答案</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <span>錯誤答案關鍵字</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <span>錯誤號碼</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <span>錯誤跳題</span>
    <input type="text" name="step_dsc_"
           id="step_dsc_"
           value=""/>
    <br>
    <p class="add" >
        <a class="button" title="移除" onclick="" >移除</a>
    </p>
</div>
<script type="text/javascript">
    CKEDITOR.replace('c_ckedit1', {});
    CKEDITOR.replace('c_ckedit1_memo', {});
</script>
<script >
    function chg_tab(tab_id) {
        for(var x=1;x<4;x++){
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