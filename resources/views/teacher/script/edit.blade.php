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
          <div class="path-bg">
          <!-- step1 -->
          <div class="step step1">
            <a class="item bg-black open-modal is-right " style="height: 65px;" id="obj_1" obj_title = "閱讀文本">
              閱讀文本
              <span class="popovers">
                點擊編輯文本
              </span>
            </a>
            <a class="item bg-blue arrow open-modal" style="top: 75px;" id="obj_2" obj_title = "主要問題">主要問題<span>Main Question</span></a>
            <a class="item bg-white item-go  open-modal" style="top: 150px; left: 30px;height: 65px;" id="obj_3" obj_title = "學生作答1">
              學生作答1
              <span class="popovers">
                點擊編輯學生作答1
              </span>
            </a>
          </div>
          <!-- step2 -->
          <div class="step step2" style="left: 244px;top: 129px;">
            <a class="item bg-red border-red open-modal" id="obj_4" obj_title = "被誘導錯答">被誘導錯答</a>
            <a class="item bg-red border-red open-modal" style="top: 82px;" id="obj_5" obj_title = "不好的答案">不好的答案</a>
            <a class="item bg-red border-red open-modal" style="top: 165px;" id="obj_6" obj_title = "其他答案">其他答案</a>
            <a class="item bg-red border-red open-modal" style="top: 270px;" id="obj_7" obj_title = "空白">空白<span>Blank</span></a>
          </div>
          <!-- step3 -->
          <div class="step step3" style="left: 407px;top: 129px;">
            <a class="item big-item bg-blue notched open-modal" id="obj_8" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched open-modal" style="top: 82px;" id="obj_9" obj_title = "後設認知的回饋">後設認知的回饋</a>
            <a class="item big-item bg-blue notched open-modal" style="top: 158px;" id="obj_10" obj_title = "教師中性回饋">教師中性回饋<span>Neut Fdbk</span></a>
            <a class="item big-item bg-blue notched open-modal" style="top: 270px;" id="obj_11" obj_title = "教師激發反應">教師激發反應<span>Pump</span></a>
          </div>
          <!-- step4 -->
          <div class="step step4" style="left: 606px;top: 84px;">
            <a class="item big-item bg-black  open-modal" id="obj_12" obj_title = "教師總結摘要">教師總結摘要<span>Summary</span></a>
            <a class="item big-item bg-white border-style1  open-modal" style="top: 95px;" id="obj_13" obj_title = "符合預期答案">符合預期答案<span>Get Expectation</span></a>
          </div>
          <!-- step5 -->
          <div class="step step5" style="left: 790px;top: 84px;">
            <a class="item bg-black  open-modal" id="obj_14" obj_title = "總結對話">總結對話<span>Closing</span></a>
            <a class="item bg-blue border-yellow2  open-modal" style="top: 95px;" id="obj_15" obj_title = "提供線索">提供線索<span>Hint</span></a>
          </div>
          <!-- step6 -->
          <div class="step step6" style="left: 939px;top: 84px;">
            <a class="item bg-yellow border-yellow arrow  open-modal" id="obj_16" obj_title = "對話結束">對話結束<span>End</span></a>
            <a class="item bg-white  open-modal" style="top: 95px;" id="obj_17" obj_title = "學生回答2">學生回答2<span>User Answer</span></a>
          </div>
          <!-- step7 -->
          <div class="step step7" style="left: 1104px;top: 105px;">
            <a class="item bg-red border-red  open-modal" id="obj_18" obj_title = "不好的答案">不好的答案<span>Bad</span></a>
            <a class="item bg-red border-red  open-modal" style="top: 78px;" id="obj_19" obj_title = "其他答案">其他答案<span>Otherwise</span></a>
            <a class="item bg-green border-green  open-modal" style="top: 162px;" id="obj_20" obj_title = "正確答案">正確答案<span>Good</span></a>
          </div>
          <!-- step8 -->
          <div class="step step8" style="left: 1269px;top: 105px;">
            <a class="item big-item bg-blue notched  open-modal" id="obj_21" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="top: 78px;" id="obj_22" obj_title = "教師中性回饋">教師中性回饋<span>Neut Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="top: 164px;" id="obj_23" obj_title = "教師激發反應">教師激發反應<span>Pump</span></a>
            <a class="item bg-blue border-yellow2  open-modal" style="top: 47px;left:214px" id="obj_24" obj_title = "教師明確提示">教師明確提示<span>Prompt</span></a>
            <a class="item bg-white  open-modal" style="top: 152px;left:214px" id="obj_25" obj_title = "學生回答3">學生回答3<span>User Answer</span></a>
          </div>
          <!-- step-bottom -->
          <div class="step step-bottom" style="left: 823px;top: 417px;">
            <a class="item bg-black border-yellow2 arrow  open-modal" id="obj_26" obj_title = "教師判定">教師判定<span>Tutor Assertion</span></a>
            <a class="item bg-black  open-modal" style="left: 150px;" id="obj_27" obj_title = "教師提供答案">教師提供答案<span>Tutor Answer</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="left: 330px;top: -43px;" id="obj_28" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item big-item bg-blue notched  open-modal" style="left: 330px;top: 35px;" id="obj_29" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item bg-green border-green  open-modal" style="left: 531px;top: -43px;" id="obj_30" obj_title = "正確答案">正確答案<span>Good</span></a>
            <a class="item bg-red border-red  open-modal" style="left: 531px;top: 35px;" id="obj_31" obj_title = "錯誤答案">錯誤答案<span>Bad</span></a>
          </div>
          <!-- step-top -->
          <div class="step step-top" style="left: 244px;top: -27px;">
            <a class="item is-error bg-green border-green  open-modal" id="obj_32" obj_title = "正確答案">正確答案<span>Good</span></a>
            <a class="item big-item bg-blue notched open-modal" style="left: 163px" id="obj_33" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item bg-black open-modal" style="left: 361px;" id="obj_34" obj_title = "教師提問">教師提問<span>Question</span></a>
            <a class="item bg-white open-modal" style="left: 524px;" id="obj_35" obj_title = "學生回答2">學生回答2<span>User Answer</span></a>
            <a class="item big-item bg-blue notched open-modal" style="left: 688px" id="obj_36" obj_title = "教師正向回饋">教師正向回饋<span>Pos Fdbk</span></a>
            <a class="item bg-black open-modal" style="left: 887px;" id="obj_37" obj_title = "教師總結">教師總結<span>Summary</span></a>
            <a class="item bg-yellow border-yellow arrow open-modal" style="left: 1044px;" id="obj_38" obj_title = "對話結束">對話結束<span>End</span></a>
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
        </div><!-- content -->
        <div class="modal-footer">
          <div class="modal-date">最後編輯日期：2017/11/14 上午 12:38</div>
          <div class="modal-button">
            <button class="btn-clear">取消編輯</button>
            <button class="btn-submit">確認送出</button>
          </div>
        </div>
      </div><!-- modal -->
    </div><!-- overlay -->
    [! Html::script('js/jquery-1.11.3.js') !]
    <script>
		var item_data = [];
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
                    }
                );
            }
        }

        function getScriptItemDsc(item_key)
        {
            var dsc='';
            for(var x=0;x<item_data.length;x++)
            {
                if(item_data[x]['item_key'] == item_key){
                    dsc = item_data[x]['dsc'];
                }
            }

            return dsc;
        }

      $(function(){
        var elements = $('.modal-overlay, .modal');
        var active = 'is-active';
        var is_right = 'is-right';
		var item_title = $('#edit_title');
		var item_edit = $('#edit_area');
        var item_key = '';
        var user_dsc = '';

		//開啟編輯視窗
        $('.open-modal').click(function(){
			var title = '編輯：' + $(this).attr("obj_title");
			item_key =  this.id;
            user_dsc = getScriptItemDsc(item_key);
            item_title.html(title);
			item_edit.val(user_dsc);
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
			  success: function(response) {
			      if(response['message'] == 'success'){
			          $('#'+response['item_key']).addClass(is_right);
                      item_edit.val('');
                  }
                  /*
                  for( var x=0;x<total;x++ )
                  {
                    response[x]['subject']
                  }
                  */
			  }
			});
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
        //css的 is-right => 代表使用者已經有存檔資料
        //css的 is-error => 代表後台管理者有批閱的回覆資料

    </script>
  </body>
</html>