<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>教學劇本設計路徑</title>
    <!-- Style Sheets -->
    [! Html::style('style/reset.css') !]
    [! Html::style('style/path.css') !]
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosanstc.css">
  </head>
  <body>
    <div id="mainBody">
      <div id="page-header">
        <div class="path-title-icon-bg">
          <img src="[! url('/images/path-title-icon.png') !]">
        </div>
        <img src="[! url('/images/path-title.png') !]" alt="教學劇本設計路徑">
      </div>
      <div id="page-container">
        <div id="page-body">
          <div class="path-download">
            <a href="[! route('ta.script.excel') !]" target="_blank" class="download-excel"></a>
          </div>
          <div class="path-bg">
          <!-- step1 -->
          <div class="step step1">
            <a class="item bg-black open-modal" style="height: 65px;" id="obj_1" obj_title = "閱讀文本">
              閱讀文本
              <span class="popovers" id="Prompt_obj_1"></span>
              <span class="tip">最多五個字...</span>
            </a>
            <a class="item bg-blue arrow open-modal" style="top: 90px;" id="obj_2" obj_title = "主要問題">
              主要問題
              <span class="popovers" id="Prompt_obj_2"></span>
              <span class="tip">最多五個字...</span>
              <span>Main Question</span>
            </a>
            <a class="item bg-white item-go  open-modal" style="top: 180px; left: 30px;height: 65px;" id="obj_3" obj_title = "學生作答1">
              學生作答1
              <span class="popovers" id="Prompt_obj_3"></span><span class="tip">最多五個字...</span>
            </a>
          </div>
          <!-- step2 -->
          <div class="step step2" style="left: 244px;top: 129px;">
            <a class="item bg-red border-red open-modal" id="obj_4" obj_title = "被誘導錯答">被誘導錯答
              <span class="popovers" id="Prompt_obj_4"></span><span class="tip">最多五個字...</span>
            </a>
            <a class="item bg-red border-red open-modal" style="top: 92px;" id="obj_5" obj_title = "不好的答案">不好的答案<span class="popovers" id="Prompt_obj_5"></span><span class="tip">最多五個字...</span></a>
            <a class="item bg-red border-red open-modal" style="top: 178px;" id="obj_6" obj_title = "其他答案">其他答案<span class="popovers" id="Prompt_obj_6"></span><span class="tip">最多五個字...</span></a>
            <a class="item bg-red border-red open-modal" style="top: 270px;" id="obj_7" obj_title = "空白">空白<span class="popovers" id="Prompt_obj_7"></span><span class="tip">最多五個字...</span><span>Blank</span></a>
          </div>
          <!-- step3 -->
          <div class="step step3" style="left: 407px;top: 129px;">
            <a class="item big-item bg-blue notched open-modal" id="obj_8" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_8"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched open-modal" style="top: 92px;" id="obj_9" obj_title = "後設認知的回饋">後設認知的回饋<span class="popovers" id="Prompt_obj_9"></span><span class="tip">最多五個字...</span></a>
            <a class="item big-item bg-blue notched open-modal" style="top: 172px;" id="obj_10" obj_title = "教師中性回饋">教師中性回饋<span class="popovers" id="Prompt_obj_10"></span><span class="tip">最多五個字...</span><span>Neut Fdbk</span></a>
            <a class="item big-item bg-blue notched open-modal" style="top: 270px;" id="obj_11" obj_title = "教師激發反應">教師激發反應<span class="popovers" id="Prompt_obj_11"></span><span class="tip">最多五個字...</span><span>Pump</span></a>
          </div>
          <!-- step4 -->
          <div class="step step4" style="left: 606px;top: 84px;">
            <a class="item big-item bg-black  open-modal" id="obj_12" obj_title = "教師總結摘要">教師總結摘要<span class="popovers" id="Prompt_obj_12"></span><span class="tip">最多五個字...</span><span>Summary</span></a>
            <a class="item big-item bg-white border-style1  open-modal" style="top: 95px;" id="obj_13" obj_title = "符合預期答案">符合預期答案<span class="popovers" id="Prompt_obj_13"></span><span class="tip">最多五個字...</span><span>Get Expectation</span></a>
          </div>
          <!-- step5 -->
          <div class="step step5" style="left: 790px;top: 84px;">
            <a class="item bg-black  open-modal" id="obj_14" obj_title = "總結對話">總結對話<span class="popovers" id="Prompt_obj_14"></span><span class="tip">最多五個字...</span><span>Closing</span></a>
            <a class="item bg-blue border-yellow2  open-modal" style="top: 95px;" id="obj_15" obj_title = "提供線索">提供線索<span class="popovers" id="Prompt_obj_15"></span><span class="tip">最多五個字...</span><span>Hint</span></a>
          </div>
          <!-- step6 -->
          <div class="step step6" style="left: 939px;top: 84px;">
            <a class="item bg-yellow border-yellow arrow  open-modal" id="obj_16" obj_title = "對話結束">對話結束<span class="popovers" id="Prompt_obj_16"></span><span class="tip">最多五個字...</span><span>End</span></a>
            <a class="item bg-white  open-modal" style="top: 95px;" id="obj_17" obj_title = "學生回答2">學生回答2<span class="popovers" id="Prompt_obj_7"></span><span class="tip">最多五個字...</span><span>User Answer</span></a>
          </div>
          <!-- step7 -->
          <div class="step step7" style="left: 1104px;top: 84px;">
            <a class="item bg-red border-red  open-modal" id="obj_18" obj_title = "不好的答案">不好的答案<span class="popovers" id="Prompt_obj_18"></span><span class="tip">最多五個字...</span><span>Bad</span></a>
            <a class="item bg-red border-red  open-modal" style="top: 92px;" id="obj_19" obj_title = "其他答案">其他答案<span class="popovers" id="Prompt_obj_19"></span><span class="tip">最多五個字...</span><span>Otherwise</span></a>
            <a class="item bg-green border-green  open-modal" style="top: 184px;" id="obj_20" obj_title = "正確答案">正確答案<span class="popovers" id="Prompt_obj_20"></span><span class="tip">最多五個字...</span><span>Good</span></a>
          </div>
          <!-- step8 -->
          <div class="step step8" style="left: 1269px;top: 84px;">
            <a class="item big-item bg-blue notched  open-modal" id="obj_21" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_21"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="top: 92px;" id="obj_22" obj_title = "教師中性回饋">教師中性回饋<span class="popovers" id="Prompt_obj_22"></span><span class="tip">最多五個字...</span><span>Neut Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="top: 183px;" id="obj_23" obj_title = "教師激發反應">教師激發反應<span class="popovers" id="Prompt_obj_23"></span><span class="tip">最多五個字...</span><span>Pump</span></a>
            <a class="item big-item bg-blue border-yellow2  open-modal" style="top: 47px;left:200px" id="obj_24" obj_title = "教師明確提示">教師明確提示<span class="popovers" id="Prompt_obj_24"></span><span class="tip">最多五個字...</span><span>Prompt</span></a>
            <a class="item big-item bg-white open-modal" style="top: 152px;left:200px" id="obj_25" obj_title = "學生回答3">學生回答3<span class="popovers" id="Prompt_obj_25"></span><span class="tip">最多五個字...</span><span>User Answer</span></a>
          </div>
          <!-- step-bottom -->
          <div class="step step-bottom" style="left: 823px;top: 435px;">
            <a class="item bg-black border-yellow2 arrow  open-modal" id="obj_26" obj_title = "教師判定">教師判定<span class="popovers" id="Prompt_obj_26"></span><span class="tip">最多五個字...</span><span>Tutor Assertion</span></a>
            <a class="item bg-black  open-modal" style="left: 150px;" id="obj_27" obj_title = "教師提供答案">教師提供答案<span class="popovers" id="Prompt_obj_27"></span><span class="tip">最多五個字...</span><span>Tutor Answer</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="left: 330px;top: -43px;" id="obj_28" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_28"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="left: 330px;top: 50px;" id="obj_29" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_29"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item bg-green border-green  open-modal" style="left: 531px;top: -43px;" id="obj_30" obj_title = "正確答案">正確答案<span class="popovers" id="Prompt_obj_30"></span><span class="tip">最多五個字...</span><span>Good</span></a>
            <a class="item bg-red border-red  open-modal" style="left: 531px;top: 50px;" id="obj_31" obj_title = "錯誤答案">錯誤答案<span class="popovers" id="Prompt_obj_31"></span><span class="tip">最多五個字...</span><span>Bad</span></a>
          </div>
          <!-- step-top -->
          <div class="step step-top" style="left: 244px;top: -27px;">
            <a class="item bg-green border-green  open-modal" id="obj_32" obj_title = "正確答案">正確答案<span class="popovers" id="Prompt_obj_32"></span><span class="tip">最多五個字...</span><span>Good</span></a>
            <a class="item big-item bg-blue notched open-modal" style="left: 163px" id="obj_33" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_33"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item bg-black open-modal" style="left: 361px;" id="obj_34" obj_title = "教師提問">教師提問<span class="popovers" id="Prompt_obj_34"></span><span class="tip">最多五個字...</span><span>Question</span></a>
            <a class="item bg-white open-modal" style="left: 524px;" id="obj_35" obj_title = "學生回答2">學生回答2<span class="popovers" id="Prompt_obj_35"></span><span class="tip">最多五個字...</span><span>User Answer</span></a>
            <a class="item big-item bg-blue notched open-modal" style="left: 688px" id="obj_36" obj_title = "教師正向回饋">教師正向回饋<span class="popovers" id="Prompt_obj_36"></span><span class="tip">最多五個字...</span><span>Pos Fdbk</span></a>
            <a class="item bg-black open-modal" style="left: 887px;" id="obj_37" obj_title = "教師總結">教師總結<span class="popovers" id="Prompt_obj_37"></span><span class="tip">最多五個字...</span><span>Summary</span></a>
            <a class="item bg-yellow border-yellow arrow open-modal" style="left: 1044px;" id="obj_38" obj_title = "對話結束">對話結束<span class="popovers" id="Prompt_obj_38"></span><span class="tip">最多五個字...</span><span>End</span></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->
    <div class="modal-overlay">
      <div class="modal is-active">
        <div id="modal-header">
          <img src="[! url('/images/path-icon-edit.png') !]">
          <div class="modal-title" id='edit_title'>編輯：閱讀文本</div>
        </div>
        <div class="modal-content">
          <textarea class="path-edit" id='edit_area' ></textarea>
          <div class="path-load"></div>
        </div><!-- content -->
        <div class="modal-footer">
          <div class="modal-date" id="last_edit">最後編輯日期：2017/11/14 上午 12:38</div>
          <div class="modal-button">
            <button class="btn-clear">取消編輯</button>
            <button class="btn-submit">確認送出</button>
          </div>
        </div>
      </div><!-- modal -->
    </div><!-- overlay -->
    <!-- Start Option Box -->
    <div class="option-box">
      <div class="content">
        <table>
          <tr>
            <th>項次</th>
            <th>核心能力</th>
            <th>對應院級核心能力</th>
            <th>對應校級核心能力</th>
          </tr>
          <tr>
            <td>A1</td>
            <td>閱讀能力</td>
            <td>寫作能力</td>
            <td>語文素養</td>
          </tr>
          <tr>
            <td>A1</td>
            <td>閱讀能力</td>
            <td>寫作能力</td>
            <td>語文素養</td>
          </tr>
          <tr>
            <td>A1</td>
            <td>閱讀能力</td>
            <td>寫作能力</td>
            <td>語文素養</td>
          </tr>
          <tr>
            <td>A1</td>
            <td>閱讀能力</td>
            <td>寫作能力</td>
            <td>語文素養</td>
          </tr>
        </table>
      </div>
      <div class="customizer">
        <span>能力指標對照表</span>
      </div>
    </div>
    <!-- End Option Box -->
    [! Html::script('js/jquery-1.11.3.js') !]
    [! Html::script('js/diff_match_patch.js') !]
    <script>
        var path_load = $('.path-load');
        var item_data = [];//目前頁面上物件的內容資料
        var chk_data = [];//批閱資料
        var is_right = 'is-right';
        var active = 'is-active';
        var is_error = 'is-error';
        //設定物件內容
        function setScriptItem(item_key, dsc)
        {
            var has_data = false;
            for(var x=0;x<item_data.length;x++)
            {
                if(item_data[x]['item_key'] == item_key){
                    item_data[x]['dsc'] = dsc;
                    has_data = true;
                }
            }
            if(!has_data){
                item_data.push(
                    {
                      'item_key':item_key,
                      'dsc':dsc,
                      'updated_at':0,
                    }
                );
            }
        }

        /*
        * 取得 編輯物件的內文
        * 依使用者編輯時間跟批閱時間做比較，取時間點越近的一筆
        */
        function getScriptItemDsc(item_key)
        {
            var result_val = [
                {
                    'dsc':'',
                    'updated_at':'',
                }
            ];
            for(var x=0;x<item_data.length;x++)
            {
                if(item_data[x]['item_key'] == item_key){
                    result_val[0]['dsc'] = item_data[x]['dsc'];
                    result_val[0]['updated_at'] = item_data[x]['updated_at'];
                    for(var y=0;y<chk_data.length;y++){
                      if(chk_data[y]['item_key'] == item_key && chk_data[y]['updated_at'] > item_data[x]['updated_at']){
                          //處理批閱差異顯示
                          launch(item_data[x]['dsc'],chk_data[y]['dsc']);
                          result_val[0]['dsc'] = chk_data[y]['dsc'];
                         // result_val[0]['updated_at'] = chk_data[y]['updated_at'];
                      }
                    }
                }
            }

            return result_val;
        }

        //設定編輯物件的時間戳記
         function setScriptItemTimestamp(item_key, updated_at)
        {
            var dsc='';
            for(var x=0;x<item_data.length;x++)
            {
                if(item_data[x]['item_key'] == item_key){
                    item_data[x]['updated_at'] = updated_at;
                }
            }

            return dsc;
        }

      $(function(){
        var elements = $('.modal-overlay, .modal');
		var item_title = $('#edit_title');
        var item_edit = $('#edit_area');
        var last_edit = $('#last_edit');
        var item_key = '';
        var user_dsc = '';

		//開啟編輯視窗
        $('.open-modal').click(function(){
            path_load.html('');
			var title = '編輯：' + $(this).attr("obj_title");
			var last_edit_title='最後編輯日期：';
			item_key =  this.id;
            user_dsc = getScriptItemDsc(item_key);
            item_title.html(title);
            item_edit.val(user_dsc[0]['dsc']);
            last_edit.html(last_edit_title + user_dsc[0]['updated_at']);
			elements.addClass(active);
        });

		//取消編輯
        $('.btn-clear').on('click', function(event){
			item_key = '';
			elements.removeClass(active);
        });
				
		//確認送出
        $('.btn-submit').on('click', function(event){
			elements.removeClass(active);
			$.ajax({
			  url: "[! route('ta.script.add') !]",
			  type:'POST',
			  dataType: "json",
			  data: {
				_token: '[! csrf_token() !]',
				item_key:item_key,
				dsc:item_edit.val(),
			  },
			  error: function(xhr) {
				//alert('Ajax request 發生錯誤');
			  },
                success: function(response)
                {
                    if(response['message'] == 'success')
                    {
                        //設定 存檔的小圖案 顯示
                        $('#'+response['item_key']).addClass(is_right);
                        //移除 批閱的小圖案
                        $('#'+response['item_key']).removeClass(is_error);
                        //設定 存檔時間戳記
                        setScriptItemTimestamp(response['item_key'], response['updated_at']);
                    }
                }
			});
            //把編輯的資料存入暫存物件內，下次編輯時直接載入
            setScriptItem(item_key, item_edit.val());
            item_edit.val('');
        });

        //ESC 關閉目前視窗
        $(document).keyup(function(event){
          if(event.which=='27'){
            elements.removeClass(active);
          }
        });
      });
      //檢查是否有新的批閱資料 => 間隔 60秒檢查一次
      function chk_update(){
        $.ajax({
          url: "[! route('ta.script.chkupdate') !]",
          type:'GET',
          dataType: "json",
          data: {
        },
        error: function(xhr) {
        //alert('Ajax request 發生錯誤');
        },
        success: function(response) {
          if(response['message'] == 'success'){
            //設定 存檔的小圖案 顯示
            for(var x=0;x<response['chkData'].length;x++){
                setChkItem(response['chkData'][x]['item_key'], response['chkData'][x]['dsc'], response['chkData'][x]['updated_at']);
            }
            //呼叫方法更新批閱小圖示
            resetChkIcon();
          }
        }
        });

        setTimeout("chk_update()", 60000);//60秒更新一次
      }

      //設定 批閱資料
     function setChkItem(item_key, dsc, updated_at)
      {
          var has_data = false;
          for(var x=0;x<chk_data.length;x++)
          {
              if(chk_data[x]['item_key'] == item_key && updated_at > chk_data[x]['updated_at']){
                  has_data = true;
                  chk_data[x]['dsc'] = dsc;
                  chk_data[x]['updated_at'] = updated_at;
              }
          }
          if(!has_data){
              chk_data.push(
                  {
                    'item_key':item_key,
                    'dsc':dsc,
                    'updated_at':updated_at,
                  }
              );
          }
      }

      //取得 批閱內容
      function getChkItemDsc(item_key)
      {
          var dsc='';
          for(var x=0;x<chk_data.length;x++)
          {
              if(chk_data[x]['item_key'] == item_key){
                  dsc = chk_data[x]['dsc'];
              }
          }

          return dsc;
      }

      //更新批閱小圖示
      function resetChkIcon(){
        var chk_updated_at = 0;
        var t_key = '';
          for(var x=0;x<item_data.length;x++){
            chk_updated_at = item_data[x]['updated_at'];
            t_key = item_data[x]['item_key'];
            for(var y=0;y<chk_data.length;y++){
              if( chk_data[y]['item_key'] == t_key && chk_data[y]['updated_at'] > chk_updated_at){
                $('#'+t_key).removeClass(is_right);
                $('#'+t_key).addClass(is_error);
              }
            }
          }
      }

      //初始化 編輯物件跟批閱資料
      function setDefault(){
        $.ajax({
          url: "[! route('ta.script.defaultdata') !]",
          type:'GET',
          dataType: "json",
          data: {
          _token: '[! csrf_token() !]',
        },
        error: function(xhr) {
        //alert('Ajax request 發生錯誤');
        },
        success: function(response) {
          if(response['message'] == 'success'){
            var teacher = response['script_data']['teacher'];
            var admin = response['script_data']['admin'];
            var prompt = response['prompt'];
            for(var x=0;x<teacher.length;x++){
                setScriptItem(teacher[x]['item_key'], teacher[x]['dsc']);
                setScriptItemTimestamp(teacher[x]['item_key'], teacher[x]['updated_at']);
                //設定 存檔的小圖案 顯示
                $('#'+teacher[x]['item_key']).addClass(is_right);
            }
            for(var x=0;x<admin.length;x++){
                setChkItem(admin[x]['item_key'], admin[x]['dsc'], admin[x]['updated_at']);
            }
            for(var x=0;x<prompt.length;x++){
                $('#Prompt_'+prompt[x]['item_key']).html(prompt[x]['dsc']);
            }
            //呼叫方法更新批閱小圖示
            resetChkIcon();
          }
        }
        });
      }

      $( document ).ready(function() {
          // Top Section Width & Height
          $('.top').width($(window).width());
          $('.top').height($(window).height());

          $(window).resize(function() {
              $('.top').width($(window).width());
              $('.top').height($(window).height());
          });

          // Option Box
          $('.customizer').click(function() {
              $('.option-box').toggleClass('open');
          });
          setDefault();
          setTimeout("chk_update()", 60000);//60秒更新一次
      });

      //下面處理批閱差異顯示
      var dmp = new diff_match_patch();
      function launch($source, $diff) {
          var text1 = $source;
          var text2 = $diff;
          //dmp.Diff_Timeout = parseFloat(document.getElementById('timeout').value);
         // dmp.Diff_EditCost = parseFloat(document.getElementById('editcost').value);

         // var ms_start = (new Date()).getTime();
          var d = dmp.diff_main(text1, text2);
         // var ms_end = (new Date()).getTime();
          //效果處理：效率清理
          if (false) {
              dmp.diff_cleanupSemantic(d);
          }

          //效果處理：不清理
          if (false) {
              dmp.diff_cleanupEfficiency(d);
          }
          var ds = dmp.diff_prettyHtml(d);
          path_load.html(ds);
      }
    </script>
  </body>
</html>