<style type="text/css">
input.groovybutton
{
   font-size:12px;
   font-family:Arial,sans-serif;
   font-weight:bold;
   color:#000000;
   background-color:#1cb569;
   border-top-style:double;
   border-top-color:#1cb569;
   border-top-width:4px;
   border-bottom-style:double;
   border-bottom-color:#1cb569;
   border-bottom-width:4px;
   border-left-style:solid;
   border-left-color:#1cb569;
   border-left-width:4px;
   border-right-style:solid;
   border-right-color:#1cb569;
   border-right-width:4px;
}
#mwt_mwt_slider_scroll
{
	top: 0;
	right:-260px;
	width:260px;	
	position:fixed;
	z-index:9999;
} 
#mwt_slider_content
{
	background:#227700;
	text-align:center;
	padding-top:20px;
} 
#mwt_fb_tab 
{
	position:absolute;
	top:50px;
	left:-24px;
	width:24px;
	background:#227700;
	color:#ffffff;
	font-family:Arial, Helvetica, sans-serif;	
	text-align:center;
	padding:9px 0;
	-moz-border-radius-topright:10px;
	-moz-border-radius-bottomright:10px;
	-webkit-border-top-left-radius:10px;
	-webkit-border-bottom-left-radius:10px;	
}
#mwt_fb_tab span 
{
	display:block;
	height:12px;
	padding:1px 0;
	line-height:12px;
	text-transform:uppercase;
	font-size:12px;
}
.title_div 
{
    background:#000000;
    color:#fff;
    line-height:25px;
    width:120px;
    text-align:left;
}       
</style>


<div id="mwt_mwt_slider_scroll" style="visibility:hidden;">
		<div id="mwt_fb_tab" class="hint--left" data-hint="點擊縮小或展開">
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>
			<span>功</span>
			<span>能</span>
			<span>按</span>
			<span>鈕</span>				
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>	
			<span></span>
		</div>
		<div id="mwt_slider_content">
					<table valign="top" width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
							<tbody>																
												<tr valign="middle" bgcolor="lightgreen" >	<!--bgcolor="lightgreen"-->												
													<td>
														<table align="center">														
															
																</td>
															</tr>
															<tr>
																<td>
																	<!--.....-->
																</td>
															</tr>
														</table>
													</td>
												</tr>												
												<tr valign="middle" bgcolor="lightgreen">													
													<td>
														<!--<table align="center" border="0">
															<tr>
																<td >
																	<input id="input_button_recal" onclick="javascript:if(confirm('確定重新計算?')){recalculating();};" value="全部清空" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:90px;">																
																</td>
																<td>
																	<input id="input_button_btp" onclick="javascript:back_to_prestep();" value="回上一列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:90px;">																
																	<input id="input_button_change" onclick="javascript:newline()" value="橫式換列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:75px;">
																</td>																
															</tr>																																															
														</table>-->
														
													</td>
												</tr>
												<!--測試-->
												
												<!--測試 end-->
												<!--<tr bgcolor="">
													<td>
														<hr size="1" width="100%">
													</td>
												</tr>-->
												<tr valign="middle" bgcolor="lightgreen">													
													<td>
														<table align="center" border="0" style="display:none">
															<tr align="center">
																<td colspan="5">
																	<div align="center"><font face="標楷體" size="3"align="center"><u><b>模式選擇</b></u></font></div>
																 </td>		
															</tr>
															<tr align="center">
																<td id="math_check" >
																	<input onclick="javascript:math_check();" id="mathcheck" name="mathcheck" type="checkbox" ><font face="標楷體" size="3"align="center"><u><b>啟用直式算式</b></u></font></input>
																</td>
																<td id="math_check1" >
																	<input onclick="javascript:math_check1();" id="mathcheck1" name="mathcheck1" type="checkbox" style="visibility:hidden;" ><font face="標楷體" size="3"align="center"><u><b>啟用橫式算式</b></u></font></input>
																</td>																
															</tr>																
															
														</table>														
													</td>
												</tr>
												
												<tr bgcolor="" style="display:none">
													<td>
														<hr size="1" width="100%">
													</td>
												</tr>
												
												<tr id="math_computation1" valign="middle" bgcolor="lightgreen"   style = "display:none;overflow-y:auto;height:190px;overflow-x:hidden;">													
													<td height="">
														<table align="center">
															<tr>
																<td align="left">
																	<font face="標楷體" size="3"align="center"><u><b>基礎運算類型</b></u></font>
																</td>
															</tr>
															<tr>
																<td align="center">
																	<table>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation('1','＋');" value="1" id="input_radio_equation_1" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>加法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('2','－');" value="2" id="input_radio_equation_2" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>減法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('3','×');" value="3" id="input_radio_equation_3" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>乘法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('4','');" value="4" id="input_radio_equation_4" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>除法</u></font></input>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>													
															<tr>
																<td align="left">
																	<font face="標楷體" size="3"align="center"><u><b>時間的乘除算式</b></u></font>																	
																</td>
															</tr>
															<tr>
																<td>
																	<table>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation('5','×');" value="5" id="input_radio_equation_5" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>日-時乘法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('6','');" value="6" id="input_radio_equation_6" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>日-時除法</u></font></input>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation('7','×');" value="7" id="input_radio_equation_7" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>時-分乘法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('8','');" value="8" id="input_radio_equation_8" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>時-分除法</u></font></input>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation('10','×');" value="10" id="input_radio_equation_10" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>日時分乘法</u></font></input>
																			</td>
																			<td>
																				<input onclick="javascript:selectingEquation('12','');" value="12" id="input_radio_equation_12" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>分-秒除法</u></font></input>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation('11','×');" value="11" id="input_radio_equation_11" name="input_radio_equation" type="radio" style=""><font face="標楷體" size="3"align="center"><u>分-秒乘法</u></font></input>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td align="center">
																	<input id="input_button_equation1" onclick="javascript:finishedEquationSelection(this);" value="確定" name="" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style=""></input>
																</td>
															</tr>
															<tr>
																<td align="left">
																	<font face="標楷體" size="3"align="center"><u><b>短除法</b></u></font>																	
																</td>
															</tr>
															<tr>
																<td>
																	<table>
																		<tr>
																			<td>
																				<input onclick="javascript:selectingEquation_short('9','');" id="input_radio_equation_9"  type="radio" style=""><font face="標楷體" size="3"align="center"><u>短除法</u></font></input>
																			</td>
																		</tr>																	
																	</table>
																</td>
															</tr>															
															<tr>
																<td align="center">
																	<input id="input_button_equation2" onclick="javascript:finishedEquationSelection_short(this);" value="確定" name="" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style=""></input>
																</td>
															</tr>
														</table>														
													</td>
												</tr>								
												<!--原本放置單位符號-->														
										<tr  id="math_computation2" valign="middle" bgcolor="lightgreen" style = "display:none;overflow-y:auto;height:500px;overflow-x:hidden;" >													
													<td height="">
														
														
											</td>
										</tr>
							</tbody>
					</table>
		</div>
</div>
								
									
								

<script type="text/javascript">
var obj_text = null;
var obj_shorttext = null;
var global_dot_1231 = '';
var global_dot_1232 = '';
var global_dot_1233 = '';
var global_dot_1235 = '';
var global_dot_1236 = '';
var global_dot_1237 = '';
var global_dot_41 = '';
var global_dot_421 = '';
var global_dot_422 = '';
var global_dot_43 = '';
var global_dot_44 = '';
var global_dot_45 = '';
var global_dot_46 = '';
var global_dot_47 = '';
var global_dot_48 = '';
var global_dot_49 = '';
var global_dot_410 = '';
var global_dot_411 = '';
var global_caltype = 0;
var global_shortcaltype = 0;
var global_calrowindex = -1;
var global_calrowindex2 = -1;
var flag_calrowindex = -1;
var global_shortcalrowindex = -1;
var global_shortcalrowindex2 = -1;
var flag_shortcalrowindex = -1;
var isDotMode = false;

clearResponse();
initialized();


//側邊攔區塊JS
function goLite(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#ffffff";
}

function goDim(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#1cb569";
}
$(function () {

var w = $("#mwt_slider_content").width();
	$('#mwt_slider_content').css('height', ($(window).height() - 20) + 'px' ); //將區塊自動撐滿畫面高度
	//var count=2;
	$("#mwt_mwt_slider_scroll").animate({ right:'-260px'}, 600 ,'swing');
	$("#mwt_fb_tab").mousedown(function(){ //滑鼠滑入時
		if ($("#mwt_mwt_slider_scroll").css('right') == '-'+w+'px')
		{
			$("#mwt_mwt_slider_scroll").animate({ right:'0px'}, 600 ,'swing');
		}
		else{
			$("#mwt_mwt_slider_scroll").animate({ right:'-'+w+'px' }, 600 ,'swing');	
		}
	}); 

		$("#accordion").accordion({
		heightStyle: "fill",
		collapsible: true
	});           
});




function clearResponse(){
	document.getElementById('input_hidden_response').value = '';
	document.getElementById('input_hidden_response2').value = '';
	document.getElementById('input_hidden_shortresponse').value = '';
	document.getElementById('input_hidden_shortresponse2').value = '';
}

//初始化
function initialized(){	
	var currentSelected = "";	
	obj_shorttext=null;
	obj_text = null;
	global_dot_1231 = '';
	global_dot_1232 = '';
	global_dot_1233 = '';
	global_dot_1235 = '';
	global_dot_1236 = '';
	global_dot_1237 = '';
	global_dot_41 = '';
	global_dot_421 = '';
	global_dot_422 = '';
	global_dot_43 = '';
	global_dot_44 = '';
	global_dot_45 = '';
	global_dot_46 = '';
	global_dot_47 = '';
	global_dot_48 = '';
	global_dot_49 = '';
	global_dot_410 = '';
	global_dot_411 = '';
	global_caltype = 0;
	global_shortcaltype = 0;
	global_calrowindex = -1;
	global_calrowindex2 = -1;
	global_shortcalrowindex = -1;
	global_shortcalrowindex2 = -1;

	isDotMode = false;
	
	document.getElementById('math_check').style.display='none';
	//直式、橫式元件狀態初始化
	document.getElementById('input_button_btp').style.display='none'; //007 修改 block -> none
	document.getElementById('math_computation1').style.display='none'; //007 修改 block -> none
	document.getElementById('math_computation2').style.display='block'; //007 修改 none -> block
	document.getElementById('input_button_change').style.display='block'; //007 修改 none -> block
	document.getElementById('div_1').style.display='none';
	document.getElementById('div_2').style.display='none';
	//var currentSelected = "";
	//document.getElementById('mathcheck').checked=false;
	//document.getElementById('mathcheck1').checked=false;
	//算式選項
	for(var i=0;i<12;i++){
		document.getElementById('input_radio_equation_'+ (i+1)).disabled = '';
		document.getElementById('input_radio_equation_'+ (i+1)).checked = false;
	}	
	
	//回上一列按鈕
	//document.getElementById('input_button_btp').disabled = 'true';
	//重新計算按鈕
	//document.getElementById('input_button_recal').disabled = 'true';
	
	//算式確定按鈕
	document.getElementById('input_button_confirm_equation').disabled = '';
	document.getElementById('input_button_confirm_equation').style.visibility = 'hidden';
	document.getElementById('short_button_confirm_equation').disabled = '';
	document.getElementById('short_button_confirm_equation').style.visibility = 'hidden';
	
	
	for(var i=0;i<8;i++){
		var btn = document.getElementById('input_button_finishing_'+ (i+1));
		//var btn = document.getElementById('input_button_finishing2_'+ (i+1));
		//var btn = document.getElementById('input_button_finishing3_'+ (i+1));
		var short_btn = document.getElementById('short_button_finishing_'+ (i+1));
		if(btn != null){
			btn.style.visibility = 'hidden';
		}
		if(short_btn != null){
			short_btn.style.visibility = 'hidden';
		}
	}
	

	//被加,減,乘,除數與加,減,乘,除數確定按鈕
	document.getElementById('input_button_equation1').disabled = '';
	document.getElementById('input_button_equation2').disabled = '';
	//除法圖片
	document.getElementById('div_operator').innerHTML = '&nbsp;';	
	//短除法圖片
	document.getElementById('shortdiv_operator').innerHTML = '&nbsp;';
	
	//答案送出鈕
	document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
	//結束按鈕
	for(var i=0;i<8;i++){
		var btn = document.getElementById('input_button_finishing2_'+ (i+1));
		var short_btn = document.getElementById('short_button_finishing2_'+ (i+1));
		if(btn != null){
			btn.style.visibility = 'hidden';
		}
		if(short_btn != null){
			short_btn.style.visibility = 'hidden';
		}
		
	}
	
	//線按鈕
	for(var i=0;i<8;i++){
		var btn = document.getElementById('input_button_finishing3_'+ (i+1));
		//var short_btn = document.getElementById('short_button_finishing3_'+ (i+1));
		if(btn != null){
			btn.style.visibility = 'hidden';
		}
		/* if(short_btn != null){
			short_btn.style.visibility = 'hidden';
		} */
		
	}
	
	//加減乘分隔線
	for(var i=0;i<4;i++){		
		var img_line = document.getElementById('img_line_'+ (i+1));
		if(img_line != null){
			img_line.style.display='none';
		}		
	}
	
	//除法分隔線
	for(var i=0;i<10;i++){		
		var img_divisionline = document.getElementById('img_divisionline_'+ (i+1));
		if(img_divisionline != null){
			img_divisionline.style.display='none';
		}		
	}

	
	//短除法分隔線隱藏
	for(var i=0;i<5;i++){		
		var short_division = document.getElementById('short_division_'+ (i+1));
		if(short_division != null){
			short_division.style.display='none';
		}		
	}

	
	//數字與小數點
	for(var i=0;i<11;i++){
		for(var j=0;j<13;j++){
			var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
			var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
			
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				input_text.disabled = true;
				input_text.style.width = '25px';
				input_text.style.height = '24px';
				input_text.style.fontSize = '16px';
				input_text.style.textAlign = 'center';
				input_text.style.verticalAlign = 'middle';
				input_text.value = '';
				input_text.style.visibility = 'hidden';
				input_text.style.backgroundColor = 'white';
			}
			var span = document.getElementById(span_id);
			if(span != null){
				span.style.fontSize = '24px';
				span.style.textAlign = 'center';
				span.innerHTML = '&nbsp;';
			}
		}
	}	
	
	//短除法數字與小數點
	for(var i=0;i<7;i++){
		for(var j=0;j<13;j++){
			var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
			var span_id = 'short_r_'+ (i+1)+ '_'+ (j+1);
			
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				input_text.disabled = true;
				input_text.style.width = '25px';
				input_text.style.height = '24px';
				input_text.style.fontSize = '16px';
				input_text.style.textAlign = 'center';
				input_text.style.verticalAlign = 'middle';
				input_text.value = '';
				input_text.style.visibility = 'hidden';
				input_text.style.backgroundColor = 'white';
			}
			var span = document.getElementById(span_id);
			if(span != null){
				span.style.fontSize = '24px';
				span.style.textAlign = 'center';
				span.innerHTML = '&nbsp;';
			}
		}
	}
	
	
}

/*********************橫式初始化JS區 start (2015.02.06晉誠)********************/	

$("#math_textarea").html("").mathquill('editable').mathquill('write'," ");	
$("#latex_Code").val(" ");	
document.getElementById('math_box').style.visibility = 'visible';
document.getElementById('math_textarea').style.visibility = 'visible';



/*********************橫式初始化JS區 end****************************************/	

/**********************橫式JS區 start (2015.02.06晉誠)********************************/

function math_check()
{
		
			if(document.getElementById('mathcheck').checked)
			{	
				
				document.getElementById('math_computation2').style.display='none';
				document.getElementById('input_button_change').style.display='none';
				document.getElementById('math_computation1').style.display='block';
				document.getElementById('input_button_btp').style.display='block';
				document.getElementById('input_button_delete').style.display='block';
						
						
			}
			else
			{
				document.getElementById('input_button_delete').style.display='none';
				document.getElementById('input_button_btp').style.display='block';
				document.getElementById('math_computation1').style.display='none';
				document.getElementById('math_computation2').style.display='block';
				document.getElementById('input_button_change').style.display='block';				
			}
		
}
function math_check1()
{
			if(document.getElementById('mathcheck1').checked)
			{					
				document.getElementById('input_button_delete').style.display='none';
				document.getElementById('input_button_btp').style.display='none';
				document.getElementById('math_computation1').style.display='none';
				document.getElementById('math_computation2').style.display='block';
				document.getElementById('input_button_change').style.display='block';						
			}
			else
			{
				document.getElementById('input_button_change').style.display='none';
				document.getElementById('math_computation1').style.display='block';
				document.getElementById('math_computation2').style.display='none';
				document.getElementById('input_button_btp').style.display='block';
				document.getElementById('input_button_delete').style.display='block';				
			}
}





var latexMath = $('#math_textarea'), 
latexSource = $('#latex_Code'),
latexSource1 = $('#latex_Code1');
//Button onclick function
function insert_math(q){
    $("#math_textarea").focus().mathquill("write",q.replace("{/}","\\"));  	

	//以下是單位、一般符號無法觸發鍵盤事件所寫的同步事件
	/*var latexMath = $('#math_textarea'), 
		latexSource = $('#latex_Code');*/
	var oldtext = latexSource.val();
		setTimeout(function() {
			var latex = latexMath.mathquill('latex');
			if(oldtext !== latex) 
				{
					//var latextext="選擇題答案:"+latexSource1.val()+"|";
					latexSource.val(latex.replace(/\\/gi,"\\\\"));
				}
        });	
 }	
 
 function insert_math1(q){
	 if(q=="(6)")
	 {
	    document.getElementById("latex_Code1").value="";
      	       	
		 $("#input_choose_number_1").attr("disabled", false);
		 $("#input_choose_number_2").attr("disabled", false);
		 $("#input_choose_number_3").attr("disabled", false);
		 $("#input_choose_number_4").attr("disabled", false);
		 $("#input_choose_number_5").attr("disabled", false);
	 }
	 else
	 {
			document.getElementById("latex_Code1").value=q;
			 $("#input_choose_number_1").attr("disabled", true);
			 $("#input_choose_number_2").attr("disabled", true);
			 $("#input_choose_number_3").attr("disabled", true);
			 $("#input_choose_number_4").attr("disabled", true);
			 $("#input_choose_number_5").attr("disabled", true);
		}	
    }

$(function() {
  latexMath.bind('keydown keypress', function() {
    setTimeout(function() {
      var latex = latexMath.mathquill('latex');
	  //var latextext="選擇題答案:"+latexSource1.val()+"|";
      latexSource.val(latex.replace(/\\/gi,"\\\\"));
	});
  })

  latexSource.bind('keydown keypress', function() {
    var oldtext = latexSource.val();
    setTimeout(function() {
      var newtext = latexSource.val();
      if(newtext !== oldtext) {
        latexMath.mathquill('latex', newtext);
      	  }
    });
  });
}); 
function newline()
	{
	  $("#math_textarea").append("<br>").focus().mathquill('write',"\\Rightarrow"); 
	}


 /*******************橫式JS區 end******************************************************/
//算式類型
function selectingEquation(type, operator){
	switch(type){
		
		//加法
		case '1':
			global_caltype = 1;
			document.getElementById('div_1').style.display='block';	
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			//時間單位出現欄位
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '&nbsp;'
			document.getElementById('cel_0_23').innerHTML = '&nbsp;'
		
		
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){	
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<10){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
						
					}
				}
			}			
				
		break;
		//減法
		case '2':
			global_caltype = 2;		
			document.getElementById('div_1').style.display='block';	
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			//時間單位出現欄位
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '&nbsp;'
			document.getElementById('cel_0_23').innerHTML = '&nbsp;'
		
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<10){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}			
			
			
		break;
		//乘法
		case '3':
			global_caltype = 3;			
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			//時間單位出現欄位
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '&nbsp;'
			document.getElementById('cel_0_23').innerHTML = '&nbsp;'
			
			
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<10){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}
			
		break;
		//除法
		case '4':
			global_caltype = 4;
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';
			document.getElementById('img_line_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';
			document.getElementById('img_divisionline_1').style.display='block';	
			//時間單位出現欄位
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '&nbsp;'
			document.getElementById('cel_0_23').innerHTML = '&nbsp;'
			
					
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							
						}
					
						if(i==1 && j<10){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
	
			break;
		//時間的乘法(日-時) 模式二
		case '5':
			global_caltype = 5;			
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('img_divisionline_1').style.display='none';	
			//document.getElementById('short_division_1').style.display='none';	
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '日';
			document.getElementById('cel_0_23').innerHTML = '時';

			
					
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<12){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}
		break;
		//時間的除法(日-時)
		case '6':
			global_caltype = 6;			
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML ='<img id="img_2" border="0" src="images/line2.gif">';
			document.getElementById('img_line_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			document.getElementById('img_divisionline_1').style.display='block';
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML ='日';
			document.getElementById('cel_0_23').innerHTML ='時';
				
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							
						}
						
						if(i==1 && j<12){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
			
		
		break;
		
		//時間的乘法(時-分)
		case '7':
			global_caltype = 7;			
			document.getElementById('div_1').style.display='block';			
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '時';
			document.getElementById('cel_0_23').innerHTML = '分';	
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';			

			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<12){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}
			
		break;
		//時間的除法(時-分)
		case '8':
			global_caltype = 8;
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';			
			document.getElementById('img_divisionline_1').style.display='block';
			document.getElementById('img_line_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '時';
			document.getElementById('cel_0_23').innerHTML = '分';

			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							
						}
						
						if(i==1 && j<12){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
		break;
		//時間的乘法(日-時-分)
		case '10':
			global_caltype = 10;			
			document.getElementById('div_1').style.display='block';			
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('cel_0_15').innerHTML = '&nbsp;'
			document.getElementById('cel_0_11').innerHTML = '日';
			document.getElementById('cel_0_17').innerHTML = '時';
			document.getElementById('cel_0_23').innerHTML = '分';	
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';			

			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<12){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}
			
		break;
		
		//時間的乘法(時-分)
		case '11':
			global_caltype = 11;			
			document.getElementById('div_1').style.display='block';			
			document.getElementById('div_operator').innerHTML = operator;			
			document.getElementById('img_line_1').style.display='block';
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '分';
			document.getElementById('cel_0_23').innerHTML = '秒';	
			document.getElementById('img_divisionline_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';			

			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i<2 && j>=5 && j<12){
							input_text.style.visibility = 'visible';
							input_text.disabled = true;
						}
					}
				}
			}
			
		break;
		
		//時間的除法(分-秒)
		case '12':
			global_caltype = 12;
			document.getElementById('div_1').style.display='block';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';			
			document.getElementById('img_divisionline_1').style.display='block';
			document.getElementById('img_line_1').style.display='none';
			//document.getElementById('short_division_1').style.display='none';	
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '分';
			document.getElementById('cel_0_23').innerHTML = '秒';

			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							
						}
						
						if(i==1 && j<12){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
		break;
		
		//使用者都未選擇時的執行方案
		default:
		document.getElementById('div_1').style.display='none';
		break;
	}
}

function selectingEquation_short(type, operator){
	switch(type){
		case '9':
			global_shortcaltype = 9;
			document.getElementById('div_2').style.display='block';
			document.getElementById('shortdiv_operator').innerHTML = '<img id="img_short_division" border="0" src="images/line2-1.gif">';
			document.getElementById('short_r_2_9').innerHTML ='<img id="img_dot" border="0" src="images/dot.gif">';
			document.getElementById('short_division_1').style.display='block';				
			//document.getElementById('img_divisionline_1').style.display='none';	
			//document.getElementById('img_line_1').style.display='none';								
			//document.getElementById('cel_0_15').innerHTML = '&nbsp;';
			//document.getElementById('cel_0_21').innerHTML = '&nbsp;';
					
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							
						}
						
						if(i==1 && j<13){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
		
		
		break;
		
		//使用者都未選擇時的執行方案
		default:
		document.getElementById('div_2').style.display='none';
		break;
	}
}


//確定算式類型
function finishedEquationSelection(e){
	if(global_caltype == 0){
		alert('請選擇算式.');
		return;
	}
	if(confirm('按確定後，不能再更改算式，確定選擇的算式? 另外直式算式部分，為避免不必要錯誤，請用右邊的數字按鈕')){
		for(var i=0;i<12;i++){ //鎖按鈕
			document.getElementById('input_radio_equation_'+ (i+1)).disabled = 'true';
		}
		switch(global_caltype){
		
			
			//加法
			case 1:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<10){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';				
			break;
			//減法
			case 2:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<10){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			//乘法
			case 3:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<10){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			//除法
			case 4:
				//alert('do');
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i==0 && j>=5){								
								input_text.disabled = '';
							}
							if(i==1 && j<10){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';				
			break;	
			
			case 5:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			//時間的除法(日-時)
			case 6:
				//alert('do');
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i==0 && j>=5){								
								input_text.disabled = '';
							}
							if(i==1 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
				//document.getElementById('input_button_finishing_1').disabled = '';
				//document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				//document.getElementById('input_button_finishing_1').value = '確定';
			break;
				//時間的乘法(時-分)
			case 7:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			//時間的除法(時-分)
			case 8:
				//alert('do');
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i==0 && j>=5){								
								input_text.disabled = '';
							}
							if(i==1 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
				
			break;			
				//時間的乘法(日-時-分)
			case 10:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			
			case 11:
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i<2 && j>=5 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
			break;
			
			//時間的除法(分-秒)
			case 12:
				//alert('do');
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i==0 && j>=5){								
								input_text.disabled = '';
							}
							if(i==1 && j<12){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('input_button_confirm_equation').disabled = '';
				document.getElementById('input_button_confirm_equation').style.visibility = 'visible';
				
			break;
			
			default:
			break;
		
		}
		e.disabled = true;
		document.getElementById('input_button_recal').disabled = '';
	}
	
	
}

function finishedEquationSelection_short(e){

	if(confirm('按確定後，不能再更改算式，確定選擇的算式? 另外直式算式部分，為避免不必要錯誤，請用右邊的數字按鈕')){

			document.getElementById('input_radio_equation_9').disabled = 'true';

		switch(global_shortcaltype){
					
			//短除法
			case 9:
				//alert('do');
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(i==0 && j>=5){								
								input_text.disabled = '';
							}
							if(i==1 && j<13){								
								input_text.disabled = '';
							}
						}
					}
				}
				document.getElementById('short_button_confirm_equation').disabled = '';
				document.getElementById('short_button_confirm_equation').style.visibility = 'visible';
				
			break;
			default:
			break;
		
		}
		e.disabled = true;
		document.getElementById('input_button_recal').disabled = '';
	}
}

function getText(e){
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	obj_text = e;
	obj_text.style.backgroundColor = '#FFFF00';
		
	var id = obj_text.id;
	var code = id.replace('input_text_r_','');
	var splits = code.split('_');
	var rowIndex = parseInt(splits[0]);
	var colIndex = parseInt(splits[1]);

		
	if(rowIndex - 3 > -1){
		global_calrowindex = rowIndex - 3;		
	}	
	//回上一列按鈕
	if(global_calrowindex == global_calrowindex2 && global_calrowindex > -1){		
		document.getElementById('input_button_btp').disabled = '';
	}
	else{
		document.getElementById('input_button_btp').disabled = 'true';
	}
				document.getElementById('input_button_number_1').onclick = function()
				{ 
					javascript:inputNumber('1'); 
				};
				document.getElementById('input_button_number_2').onclick = function()
				{ 
					javascript:inputNumber('2'); 
				};
				document.getElementById('input_button_number_3').onclick = function()
				{ 
					javascript:inputNumber('3'); 
				};
				document.getElementById('input_button_number_4').onclick = function()
				{ 
					javascript:inputNumber('4'); 
				};
				document.getElementById('input_button_number_5').onclick = function()
				{ 
					javascript:inputNumber('5'); 
				};
				document.getElementById('input_button_number_6').onclick = function()
				{ 
					javascript:inputNumber('6'); 
				};
				document.getElementById('input_button_number_7').onclick = function()
				{ 
					javascript:inputNumber('7'); 
				};
				document.getElementById('input_button_number_8').onclick = function()
				{ 
					javascript:inputNumber('8'); 
				};
				document.getElementById('input_button_number_9').onclick = function()
				{ 
					javascript:inputNumber('9'); 
				};
				document.getElementById('input_button_number_0').onclick = function()
				{ 
					javascript:inputNumber('0'); 
				};				
				document.getElementById('input_button_threepoint').onclick = function()
				{ 
					javascript:inputNumber('、、、'); 
				};
				document.getElementById('input_button_zero2').onclick = function()
				{ 
					javascript:inputNumber('Ø'); 
				};	
				document.getElementById('input_button_btp').onclick = function()
				{ 
					javascript:back_to_prestep(); 
				};
				
				document.getElementById('input_button_add').onclick = function()
				{ 
					javascript:inputNumber('+');
				};
				document.getElementById('input_button_sub').onclick = function()
				{ 
					javascript:inputNumber('-');
				};
				document.getElementById('input_button_times').onclick = function()
				{ 
					javascript:inputNumber('×');
				};
				document.getElementById('input_button_division').onclick = function()
				{ 
					javascript:inputNumber('÷');
				};
				document.getElementById('input_button_equal').onclick = function()
				{ 
					javascript:inputNumber('=');
				};
				document.getElementById('input_button_null').onclick = function()
				{ 
					javascript:inputNumber('☐');
				};	
				document.getElementById('input_button_delete').style.display='block';
				document.getElementById('input_button_point').style.display='block';
				
}

function getText_short(e){
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	obj_shorttext = e;
	obj_shorttext.style.backgroundColor = '#FFFF00';
		
	var short_id = obj_shorttext.id;	
	var code_short = short_id.replace('short_text_r_','');
	var splits_short = code_short.split('_');
	var rowIndex_short = parseInt(splits_short[0]);
	var colIndex_short = parseInt(splits_short[1]);
		
	
	if(rowIndex_short - 3 > -1){
		global_shortcalrowindex = rowIndex_short - 3;		
	}
	//短除法回上一列按鈕
	if(global_shortcalrowindex == global_shortcalrowindex2 && global_shortcalrowindex  > -1){		
		document.getElementById('input_button_btp').disabled = '';
	}
	else{
		document.getElementById('input_button_btp').disabled = 'true';
	}
	
				document.getElementById('input_button_number_1').onclick = function()
				{ 
					javascript:inputNumber_short('1'); 
				};
				document.getElementById('input_button_number_2').onclick = function()
				{ 
					javascript:inputNumber_short('2'); 
				};
				document.getElementById('input_button_number_3').onclick = function()
				{ 
					javascript:inputNumber_short('3'); 
				};
				document.getElementById('input_button_number_4').onclick = function()
				{ 
					javascript:inputNumber_short('4'); 
				};
				document.getElementById('input_button_number_5').onclick = function()
				{ 
					javascript:inputNumber_short('5'); 
				};
				document.getElementById('input_button_number_6').onclick = function()
				{ 
					javascript:inputNumber_short('6'); 
				};
				document.getElementById('input_button_number_7').onclick = function()
				{ 
					javascript:inputNumber_short('7'); 
				};
				document.getElementById('input_button_number_8').onclick = function()
				{ 
					javascript:inputNumber_short('8'); 
				};
				document.getElementById('input_button_number_9').onclick = function()
				{ 
					javascript:inputNumber_short('9'); 
				};
				document.getElementById('input_button_number_0').onclick = function()
				{ 
					javascript:inputNumber_short('0'); 
				};
				document.getElementById('input_button_threepoint').onclick = function()
				{ 
					javascript:inputNumber_short('、、、'); 
				};
				document.getElementById('input_button_zero2').onclick = function()
				{ 
					javascript:inputNumber_short('Ø'); 
				};	
				document.getElementById('input_button_btp').onclick = function()
				{ 
					javascript:back_to_shortprestep(); 
				};
				document.getElementById('input_button_add').onclick = function()
				{ 
					javascript:inputNumber_short('+');
				};
				document.getElementById('input_button_sub').onclick = function()
				{ 
					javascript:inputNumber_short('-');
				};
				document.getElementById('input_button_times').onclick = function()
				{ 
					javascript:inputNumber_short('×');
				};
				document.getElementById('input_button_division').onclick = function()
				{ 
					javascript:inputNumber_short('÷');
				};
				document.getElementById('input_button_equal').onclick = function()
				{ 
					javascript:inputNumber_short('=');
				};
				document.getElementById('input_button_null').onclick = function()
				{ 
					javascript:inputNumber_short('☐');
				};	
				document.getElementById('input_button_delete').style.display='block';
				document.getElementById('input_button_point').style.display='none';
}
function get_math(e){

				document.getElementById('input_button_number_1').onclick = function()
				{ 
					javascript:insert_math('1'); 
				};
				document.getElementById('input_button_number_2').onclick = function()
				{ 
					javascript:insert_math('2'); 
				};
				document.getElementById('input_button_number_3').onclick = function()
				{ 
					javascript:insert_math('3'); 
				};
				document.getElementById('input_button_number_4').onclick = function()
				{ 
					javascript:insert_math('4'); 
				};
				document.getElementById('input_button_number_5').onclick = function()
				{ 
					javascript:insert_math('5'); 
				};
				document.getElementById('input_button_number_6').onclick = function()
				{ 
					javascript:insert_math('6'); 
				};
				document.getElementById('input_button_number_7').onclick = function()
				{ 
					javascript:insert_math('7'); 
				};
				document.getElementById('input_button_number_8').onclick = function()
				{ 
					javascript:insert_math('8'); 
				};
				document.getElementById('input_button_number_9').onclick = function()
				{ 
					javascript:insert_math('9'); 
				};
				document.getElementById('input_button_number_0').onclick = function()
				{ 
					javascript:insert_math('0'); 
				};
				document.getElementById('input_button_point').onclick = function()
				{ 
					javascript:insert_math('.'); 
				};
				document.getElementById('input_button_threepoint').onclick = function()
				{ 
					javascript:insert_math('、、、'); 
				};
				document.getElementById('input_button_zero2').onclick = function()
				{ 
					javascript:insert_math('{/}text{Ø}'); 
				};
				document.getElementById('input_button_add').onclick = function()
				{ 
					javascript:insert_math('+');
				};
				document.getElementById('input_button_sub').onclick = function()
				{ 
					javascript:insert_math('-');
				};
				document.getElementById('input_button_times').onclick = function()
				{ 
					javascript:insert_math('{/}times');
				};
				document.getElementById('input_button_division').onclick = function()
				{ 
					javascript:insert_math('{/}div');
				};
				document.getElementById('input_button_equal').onclick = function()
				{ 
					javascript:insert_math('=');
				};	
				document.getElementById('input_button_null').onclick = function()
				{ 
					javascript:insert_math('☐');
				};
				document.getElementById('input_button_delete').style.display='none';
				document.getElementById('input_button_point').style.display='block';
}
function delNumber(){
	if(obj_text != null){
		obj_text.value = '';
		obj_text.style.backgroundColor = '#FFFF00';
	}
	if(obj_shorttext != null){
		obj_shorttext.value = '';
		obj_shorttext.style.backgroundColor = '#FFFF00';
	}
}
function inputNumber(num){	
	
	var id = obj_text.id;
	var code = id.replace('input_text_r_','');	
	var splits = code.split('_');	
	var rowIndex = parseInt(splits[0]);
	var colIndex = parseInt(splits[1]);
	
	if(rowIndex - 3 > -1){
		global_calrowindex = rowIndex - 3;		
	}
	
	if(obj_text.value == ''){
		obj_text.value = num;
	}
	else{
		
		//var rowIndex = parseInt(code[1])*10+parseInt(code[2]);
		//var colIndex = parseInt(code[3])*10+parseInt(code[4]);
		//alert(rowIndex);
		//alert(colIndex);
		switch(global_caltype){
			case 1:
				//alert(rowIndex);
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){						
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
						
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}	
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 2:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);				
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 3:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 4:
				//alert(rowIndex);
				var text_id = '';
				if(rowIndex == 1 || rowIndex == 2){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
				/*
				var text_id = '';
				if(rowIndex == 11){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				*/
				obj_text = document.getElementById(text_id);					
				if(obj_text != null){
					var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
					var original_text = document.getElementById(original_text_id);
					if(original_text != null){
						original_text.style.backgroundColor = '#FFFFFF';
					}
					
					obj_text.value = num;
					obj_text.style.backgroundColor = '#FFFF00';
					obj_text.focus();
				}
			//document.getElementById('input_hidden_response').value = get_responses();
			break; 			
			case 5:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();
			break;
			case 6:
				//alert(rowIndex);
				var text_id = '';
				if(rowIndex == 1 || rowIndex == 2){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
				/*
				var text_id = '';
				if(rowIndex == 11){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				*/
				obj_text = document.getElementById(text_id);					
				if(obj_text != null){
					var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
					var original_text = document.getElementById(original_text_id);
					if(original_text != null){
						original_text.style.backgroundColor = '#FFFFFF';
					}
					
					obj_text.value = num;
					obj_text.style.backgroundColor = '#FFFF00';
					obj_text.focus();
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 7:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 8:
				//alert(rowIndex);
				var text_id = '';
				if(rowIndex == 1 || rowIndex == 2){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
			
				obj_text = document.getElementById(text_id);					
				if(obj_text != null){
					var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
					var original_text = document.getElementById(original_text_id);
					if(original_text != null){
						original_text.style.backgroundColor = '#FFFFFF';
					}
					
					obj_text.value = num;
					obj_text.style.backgroundColor = '#FFFF00';
					obj_text.focus();
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			case 10:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			
			case 11:
				if(rowIndex<=7){
					var text_id = '';
					switch(rowIndex){
						case 1:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);							
						break;
						case 2:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
						break;
						default:
							text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);
						break;
					}
					obj_text = document.getElementById(text_id);					
					if(obj_text != null){
						var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
						var original_text = document.getElementById(original_text_id);
						if(original_text != null){
							original_text.style.backgroundColor = '#FFFFFF';
						}
						
						obj_text.value = num;
						obj_text.style.backgroundColor = '#FFFF00';
						obj_text.focus();
					}
					/*
					var text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);
					obj_text = document.getElementById(text_id);					
					obj_text.value = num;
					*/
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			
			case 12:
				//alert(rowIndex);
				var text_id = '';
				if(rowIndex == 1 || rowIndex == 2){
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);					
				}
				else{
					text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex-1);					
				}
			
				obj_text = document.getElementById(text_id);					
				if(obj_text != null){
					var original_text_id = 'input_text_r_'+ rowIndex+ '_'+ colIndex;
					var original_text = document.getElementById(original_text_id);
					if(original_text != null){
						original_text.style.backgroundColor = '#FFFFFF';
					}
					
					obj_text.value = num;
					obj_text.style.backgroundColor = '#FFFF00';
					obj_text.focus();
				}
			//document.getElementById('input_hidden_response').value = get_responses();	
			break;
			
			default:
			break;
		}	
		
	}
	document.getElementById('input_hidden_response').value = get_responses();	
}
	
function inputNumber_short(num){	

	// 短除法	
	var short_id = obj_shorttext.id;
	var code_short = short_id .replace('short_text_r_','');
	var splits_short= code_short.split('_');
	var rowIndex_short = parseInt(splits_short[0]);
	var colIndex_short = parseInt(splits_short[1]);	

	if(rowIndex_short - 3 > -1){
		global_shortcalrowindex = rowIndex_short- 3;		
	}
	if(obj_shorttext.value == ''){
		obj_shorttext.value = num;
	}
	else{
		switch(global_shortcaltype)
			{
			case 9:
				//alert(rowIndex);
				var text_id = '';
				if(rowIndex_short == 1 || rowIndex_short == 2){
					text_id = 'short_text_r_'+ rowIndex_short+ '_'+ (colIndex_short+1);					
				}
				else{
					text_id = 'short_text_r_'+ rowIndex_short+ '_'+ (colIndex_short-1);					
				}
			
				obj_shorttext = document.getElementById(text_id);					
				if(obj_shorttext != null){
					var original_shorttext_id = 'short_text_r_'+ rowIndex_short+ '_'+ colIndex_short;
					var original_shorttext = document.getElementById(original_shorttext_id);
					if(original_shorttext != null){
						original_shorttext.style.backgroundColor = '#FFFFFF';
					}
					
					obj_shorttext.value = num;
					obj_shorttext.style.backgroundColor = '#FFFF00';
					obj_shorttext.focus();
				}
			
			break;
			default:
			break;
			}
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}
function inputDot(dot){ //小數點
	var id = obj_text.id;
	var code = id.replace('input_text_r_','');
	var splits = code.split('_');
	var rowIndex = parseInt(splits[0]);
	var colIndex = parseInt(splits[1]);
	//alert(rowIndex);
	//alert(code);
	//alert(colIndex);
	//return;
	switch(global_caltype){
		case 4:
			switch(rowIndex){
				case 1:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_41 == ''){
							obj_span.innerHTML = dot;
							global_dot_41 = dot;
						}
					}
				break;				
				case 2:
					//alert(colIndex);
					//alert(code);
					var obj_span = document.getElementById('span_r_'+ code);
					switch(colIndex){
						case 1:							
							if(obj_span != null){
								if(global_dot_421 == ''){
									obj_span.innerHTML = dot;
									global_dot_421 = dot;
								}
							}
						break;
						case 2:
							if(obj_span != null){
								if(global_dot_421 == ''){
									obj_span.innerHTML = dot;
									global_dot_421 = dot;
								}
							}
						break;
						case 3:
							if(obj_span != null){
								if(global_dot_421 == ''){
									obj_span.innerHTML = dot;
									global_dot_421 = dot;
								}
							}
						break;
						case 4:
							if(obj_span != null){
								if(global_dot_421 == ''){
									obj_span.innerHTML = dot;
									global_dot_421 = dot;
								}
							}
						break;
						case 6:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 7:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 8:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 9:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 10:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 11:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						case 12:
							if(obj_span != null){
								if(global_dot_422 == ''){
									obj_span.innerHTML = dot;
									global_dot_422 = dot;
								}
							}
						break;
						default:
						break;
						
					}
				break;
				case 3:					
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_43 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_43 = dot;
						}
					}
				break;
				case 4:					
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_44 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_44 = dot;
						}
					}
				break;
				case 5:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_45 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_45 = dot;
						}
					}
				break;
				case 6:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_46 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_46 = dot;
						}
					}
				break;
				case 7:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_47 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_47 = dot;
						}
					}
				break;
				case 8:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_48 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_48 = dot;
						}
					}
				break;
				case 9:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_49 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_49 = dot;
						}
					}
				break;
				case 10:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_410 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_410 = dot;
						}
					}
				break;
				case 11:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_411 == ''){
							obj_span.innerHTML = dot;
							global_dot_411 = dot;
						}
					}
				break;				
				default:
				break;
			}
		break;
		default:
			//alert(rowIndex);
			switch(rowIndex){
				case 1:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						//alert(global_dot_1231);
						if(global_dot_1231 == ''){
							obj_span.innerHTML = dot;
							global_dot_1231 = dot;
						}
					}
				break;
				case 2:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_1232 == ''){
							obj_span.innerHTML = dot;
							global_dot_1232 = dot;
						}
					}
				break;
				//加減乘第一列
				case 3:
					//alert(code);
					//text_id = 'input_text_r_'+ rowIndex+ '_'+ (colIndex+1);	
					//var obj_span = document.getElementById('span_r_'+ rowIndex+ '_'+ (colIndex-1));
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_1233 == ''){
							obj_span.innerHTML = dot;
							global_dot_1233 = dot;
						}
					}
				break;
				case 5:					
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_1235 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_1235 = dot;
						}
					}
				break;
				case 6:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_1236 == '' && isDotMode){
							obj_span.innerHTML = dot;
							global_dot_1236 = dot;
						}
					}
				break;
				case 7:
					var obj_span = document.getElementById('span_r_'+ code);
					if(obj_span != null){
						if(global_dot_1237 == ''){
							obj_span.innerHTML = dot;
							global_dot_1237 = dot;
						}
					}
				break;	
				
				default:
				break;
			}
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
/*****************************以下為不需要更改的區塊Start******************************/
function dotoff(e){
	e.innerHTML = '&nbsp;';
	var id = e.id;
	var code = id.replace('span_r_','');	
	var splits = code.split('_');
	var rowIndex = parseInt(splits[0]);
	var colIndex = parseInt(splits[1]);
	//alert('dotoff');
	
	switch(global_caltype){
		case 4:
			switch(rowIndex){
				case 1:
					global_dot_41 = '';
				break;
				case 2:
					if(colIndex <5){
						global_dot_421 = '';
					}
					else if(colIndex > 5){
						global_dot_422 = '';
					}
				break;
				case 3:					
					global_dot_43 = '';					
				break;
				case 4:					
					global_dot_44 = '';					
				break;
				case 5:
					global_dot_45 = '';
				break;
				case 6:
					global_dot_46 = '';
				break;
				case 7:
					global_dot_47 = '';
				break;
				case 8:
					global_dot_48 = '';
				break;
				case 9:
					global_dot_49 = '';
				break;
				case 10:
					global_dot_410 = '';
				break;
				case 11:
					global_dot_411 = '';
				break;				
				default:
				break;
			}
		break;
		default:
			//alert(rowIndex);
			switch(rowIndex){
				case 1:
					global_dot_1231 = '';
				break;
				case 2:
					global_dot_1232 = '';
				break;
				case 3:
					global_dot_1233 = '';
				break;
				case 5:					
					global_dot_1235 = '';
				break;
				case 6:
					global_dot_1236 = '';
				break;
				case 7:
					global_dot_1237 = '';
				break;				
				default:
				break;
			}
		break;
	}
}
/*****************************不需要更改的區塊 End******************************/

function confirm_equation(btn){
	//alert('confirm_equation.');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	switch(global_caltype){
		case 1:
			if(confirm('按確定後，不能再輸入被加數與加數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 10){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 10){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
							
						}
					}
				}
				
				document.getElementById('input_button_upload_response').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				
			}
		break;
		case 2:
			if(confirm('按確定後，不能再輸入被減數與減數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 10){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 10){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				//document.getElementById('input_button_finishing_1').disabled = '';
				//document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				//document.getElementById('input_button_finishing2_1').disabled = '';
				//document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_upload_response').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
			
		break;
		case 3:
			if(confirm('按確定後，不能再輸入被乘數與乘數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 10){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 10){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				
				
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}			
		break;
		case 4:
			if(confirm('按確定後，不能再輸入被除數與除數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i==0 && j>=5){
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							if(i == 1 && j < 10){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j >=5){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							
						}
					}
				}
				document.getElementById('img_divisionline_3').style.display = 'block';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		
		
		case 5:
			if(confirm('按確定後，不能再輸入被乘數與乘數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 12){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}			
		break;
		case 6:
			if(confirm('按確定後，不能再輸入被除數與除數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i==0 && j>=5){
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							if(i == 1 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j >=5){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							
						}
					}
				}
				document.getElementById('img_divisionline_3').style.display = 'block';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		
		case 7:
			if(confirm('按確定後，不能再輸入被乘數與乘數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 12){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}			
		break;
		case 8:
			if(confirm('按確定後，不能再輸入被除數與除數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i==0 && j>=5){
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							if(i == 1 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j >=5){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							
						}
					}
				}
				document.getElementById('img_divisionline_3').style.display = 'block';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		case 10:
			if(confirm('按確定後，不能再輸入被乘數與乘數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 12){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}			
		break;
		
		case 11:
			if(confirm('按確定後，不能再輸入被乘數與乘數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i < 2 && j >=5 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j < 12){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
							}
						}
					}
				}
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}			
		break;
		
		case 12:
			if(confirm('按確定後，不能再輸入被除數與除數，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							if(i==0 && j>=5){
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							if(i == 1 && j < 12){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j >=5){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							
						}
					}
				}
				document.getElementById('img_divisionline_3').style.display = 'block';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing3_1').disabled = '';
				document.getElementById('input_button_finishing3_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		
		default:
		break;
	}

	document.getElementById('input_hidden_response').value = get_responses();
}

function confirm_equation_short(btn){  //短除法確定鈕 或是 除法輸入確定紐
	//alert('confirm_equation.');
	//return;
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	switch(global_shortcaltype){		
		//短除法
		case 9:
			if(confirm('按確定後，不能再輸入資料，確定輸入完畢?')){
				btn.style.visibility = 'hidden';
				for(var i=0;i<11;i++){
					for(var j=0;j<13;j++){
						var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
						var input_text = document.getElementById(text_id);						
						if(input_text != null){
							/*if(i==0 && j>=5){
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}*/
							if(i == 1 && j < 13){
								input_text.disabled = 'true';								
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
								//input_text.style.color = 'black';
							}
							
							if(i == 2 && j >=0){
								input_text.disabled = '';
								input_text.style.visibility = 'visible';
								input_text.style.backgroundColor = 'white';
							}
							
						}
					}
				}
				//img_dot1
				//document.getElementById('short_division_2').style.display='block';
				//移除短除法的換行線 (下兩行 拿到註解 線即可出現)
				document.getElementById('short_r_3_9').innerHTML= '<img id="img_dot1" border="0" src="images/dot.gif">';				
				//document.getElementById('short_r_3_5').innerHTML = '<img id="img_short_division1" border="0" src="images/line2-1.gif">';
				document.getElementById('short_button_finishing_1').disabled = '';
				document.getElementById('short_button_finishing_1').style.visibility = 'visible';
				document.getElementById('short_button_finishing2_1').disabled = '';
				document.getElementById('short_button_finishing2_1').style.visibility = 'visible';
				//document.getElementById('short_button_finishing3_1').disabled = '';
				//document.getElementById('short_button_finishing3_1').style.visibility = 'visible';
				global_shortcalrowindex = 0;
				obj_shorttext = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}
//中間計算處理
function finishing_1(btn){

	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 1;
	global_calrowindex2 = 1;

	isDotMode = false;
	switch(global_caltype){
		case 1:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 3 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 10){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
			
		break;
		case 2:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 10){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 3:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 10){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 4:
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=5 && j<13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
					
		break;
		case 5:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 11){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 6:
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=5 && j<13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
					
		break;
		case 7:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 11){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 8:
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=5 && j<13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
					
		break;
		case 10:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 11){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		
		case 11:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 3 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j < 11){
							span.innerHTML = '';							
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		
		case 12:
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=5 && j<13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
					
		break;
		
		default:
		break;
	}
	
	//回上一列按鈕
	document.getElementById('input_button_btp').disabled = '';
	document.getElementById('input_hidden_response').value = get_responses();
}

//中間計算處理
function finishing_short1(btn){
	//alert('finishing_1');
	//return;
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	global_shortcalrowindex = 1;
	global_shortcalrowindex2 = 1;
	isDotMode = false;
	switch(global_shortcaltype){
		//短除法
		case 9:
			document.getElementById('short_r_4_9').innerHTML = '<img id="img_dot2" border="0" src="images/dot.gif">';
			document.getElementById('short_division_2').style.display = 'block';
			//換行後補上 上一行的分隔線
			//document.getElementById('short_r_4_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			document.getElementById('short_r_3_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						/*if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else */if(i == 3 && j>=0 && j<13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			
			document.getElementById('short_button_finishing_1').disabled = '';
			document.getElementById('short_button_finishing_1').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_1').disabled = '';
			//document.getElementById('short_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_1').disabled = '';
			document.getElementById('short_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('short_button_finishing_2').disabled = '';
			document.getElementById('short_button_finishing_2').style.visibility = 'visible';
			//document.getElementById('short_button_finishing3_2').disabled = '';
			//document.getElementById('short_button_finishing3_2').style.visibility = 'visible';
			document.getElementById('short_button_finishing2_2').disabled = '';
			document.getElementById('short_button_finishing2_2').style.visibility = 'visible';
					
		break;
		default:
		break;
	}
	
	//回上一列按鈕
	document.getElementById('input_button_btp').disabled = '';
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}
function finishing2_1(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_caltype){
		case 4:
			global_calrowindex = 1;
			global_calrowindex2 = 1;
			isDotMode = true;	
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=6){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			//回上一列按鈕
			document.getElementById('input_button_btp').disabled = '';
			//答案送出鈕
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			
		break;
		
		case 6:
			global_calrowindex = 1;
			global_calrowindex2 = 1;
			isDotMode = true;	
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=6){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			//回上一列按鈕
			document.getElementById('input_button_btp').disabled = '';
			//答案送出鈕
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			
		break;
		
		case 8:
			global_calrowindex = 1;
			global_calrowindex2 = 1;
			isDotMode = true;	
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=6){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			//回上一列按鈕
			document.getElementById('input_button_btp').disabled = '';
			//答案送出鈕
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			
		break;
		
		case 12:
			global_calrowindex = 1;
			global_calrowindex2 = 1;
			isDotMode = true;	
			document.getElementById('img_divisionline_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 3 && j>=6){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_1').disabled = '';
			document.getElementById('input_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';
			//回上一列按鈕
			document.getElementById('input_button_btp').disabled = '';
			//答案送出鈕
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			
		break;
		
	
		
		default:
			if(confirm('確定結束? 按結束將送出答案.')){
				//alert('尚未實作.');
				//alert(upload_responses());
				upload_responses();
			}
		break;
	}		
}

function finishing_short2_1(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_shortcaltype){		
		
		case 9:
			global_shortcalrowindex = 1;
			global_shortcalrowindex2 = 1;
			isDotMode = true;	
			//document.getElementById('img_divisionline_3').style.visibility = 'visible
			document.getElementById('short_r_4_9').innerHTML = '<img id="img_dot2" border="0" src="images/dot.gif">';
			document.getElementById('short_division_2').style.display = 'block';
			document.getElementById('short_r_3_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			//document.getElementById('img_short_division2').style.visibility = 'visible';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						/*if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else*/ if(i == 3 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('short_button_finishing_1').disabled = '';
			document.getElementById('short_button_finishing_1').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_1').disabled = '';
			//document.getElementById('short_button_finishing3_1').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_1').disabled = '';
			document.getElementById('short_button_finishing2_1').style.visibility = 'hidden';
			//回上一列按鈕
			document.getElementById('short_button_btp').disabled = '';
			//答案送出鈕
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			
		break;
		
		default:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){
				//alert('尚未實作.');
				
				upload_responses();
			}
		break;
	}		
}


function finishing_2(btn){
	//alert('finishing_2');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 2;
	global_calrowindex2 = 2;
	isDotMode = false;
	switch(global_caltype){
		case 1:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);					
					if(input_text != null){
						if(i == 4 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
		break;
		case 2:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;
		case 3:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';	
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 4 && j>=5 && j<=12){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;		
		case 5:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 4 && j>=5 && j<=12){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;
		case 7:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 4 && j>=5 && j<=12){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;		
		case 10:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
		break;
		
		case 11:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 4 && j>=5 && j<=12){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					var span = document.getElementById(span_id);	
					if(span != null){
						if(i == 2 && j >= 5){
							span.innerHTML = '';							
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short2(btn){
	//alert('finishing_2');
	//return;
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	global_shortcalrowindex = 2;
	global_shortcalrowindex2 = 2;
	isDotMode = false;
	switch(global_shortcaltype){		
		case 9:			
			//btn.style.visibility = 'hidden';
			//document.getElementById('short_division_3').style.visibility = 'visible';
			document.getElementById('short_r_5_9').innerHTML = '<img id="img_dot3" border="0" src="images/dot.gif">';
			//document.getElementById('short_r_5_5').innerHTML = '<img id="img_short_division3" border="0" src="images/line2-1.gif">';	
			//換行後補上 上一行的分隔線
			document.getElementById('short_r_4_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';			
			document.getElementById('short_division_3').style.display = 'block';
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						/*if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else */if(i == 4 && j>=0 && j<=12){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('short_button_finishing_2').disabled = '';
			document.getElementById('short_button_finishing_2').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_2').disabled = '';
			//document.getElementById('short_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_2').disabled = '';
			document.getElementById('short_button_finishing2_2').style.visibility = 'hidden';				
			document.getElementById('short_button_finishing_3').disabled = '';
			document.getElementById('short_button_finishing_3').style.visibility = 'visible';
			//document.getElementById('short_button_finishing3_3').disabled = '';
			//document.getElementById('short_button_finishing3_3').style.visibility = 'visible';
			document.getElementById('short_button_finishing2_3').disabled = '';
			document.getElementById('short_button_finishing2_3').style.visibility = 'visible';
			
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}

function finishing2_2(btn){
	//alert('finishing2_2');
	global_calrowindex = 2;
	global_calrowindex2 = 2;
	isDotMode = true;
	switch(global_caltype){
		case 1:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){		
				
				upload_responses();
			}

		break;	
		case 5:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 6:
			//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				//alert(upload_responses());
				upload_responses();
			}
			
		break;
		case 7:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 8:
			//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		break;
		
		case 10:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 11:
			document.getElementById('img_line_2').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 4 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}	
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_2').disabled = '';
			document.getElementById('input_button_finishing3_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 12:
			//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		break;
		
		
		
		default:			
		break;
		
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short2_2(btn){
	//alert('finishing2_2');
	global_shortcalrowindex = 2;
	global_shortcalrowindex2 = 2;
	//document.getElementById('short_r_4_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
	isDotMode = true;
	switch(global_shortcaltype){	
		case 9:
			//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
			break;
		default:			
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}



function finishing_3(btn){

	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 3;
	global_calrowindex2 = 3;
	isDotMode = false;
	switch(global_caltype){
		case 1:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}						
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';
			
		break;
		case 2:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';
			
		break;
		case 3:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';	
		break;
		case 4:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';		
			
		break;
		case 5:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';	
		break;
		case 6:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';			
			
		break;
		
		case 7:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';	
		break;
		case 8:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';		
			
		break;
		case 10:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';	
		break;
		
		case 11:
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';	
		break;
		
		case 12:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';		
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short3(btn){
	//alert('finishing_3');
	//return;
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	global_shortcalrowindex = 3;
	global_shortcalrowindex2 = 3;
	isDotMode = false;
	switch(global_shortcaltype){		
		case 9:
			//btn.style.visibility = 'hidden';
			document.getElementById('short_r_6_9').innerHTML = '<img id="img_dot4" border="0" src="images/dot.gif">';
			document.getElementById('short_division_4').style.display = 'block';
			//document.getElementById('short_r_6_5').innerHTML = '<img id="img_short_division4" border="0" src="images/line2-1.gif">';
			//換行後補上 上一行的分隔線
			document.getElementById('short_r_5_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			//document.getElementById('img_divisionline_5').style.visibility = 'visible';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						 if(i == 5 && j>=0){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('short_button_finishing_3').disabled = '';
			document.getElementById('short_button_finishing_3').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_3').disabled = '';
			//document.getElementById('short_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_3').disabled = '';
			document.getElementById('short_button_finishing2_3').style.visibility = 'hidden';				
			document.getElementById('short_button_finishing_4').disabled = '';
			document.getElementById('short_button_finishing_4').style.visibility = 'visible';
			//document.getElementById('short_button_finishing3_4').disabled = '';
			//document.getElementById('short_button_finishing3_4').style.visibility = 'visible';
			document.getElementById('short_button_finishing2_4').disabled = '';
			document.getElementById('short_button_finishing2_4').style.visibility = 'visible';			
			
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}

function finishing2_3(btn){
	//alert('finishing2_3');
	global_calrowindex = 3;
	global_calrowindex2 = 3;
	isDotMode = true;
	switch(global_caltype){
		case 1:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5 && j<=13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;			
		case 5:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 6:
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5 && j<=13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 8:
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5 && j<=13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;	
		case 10:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 11:
			document.getElementById('img_line_3').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 5 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 12:
			document.getElementById('img_divisionline_5').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 5 && j>=5 && j<=13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_3').disabled = '';
			document.getElementById('input_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short2_3(btn){

	global_shortcalrowindex = 3;
	global_shortcalrowindex2 = 3;
	isDotMode = true;
	switch(global_shortcaltype){
		
		case 9:
			
			document.getElementById('short_r_6_9').innerHTML = '<img id="img_dot4" border="0" src="images/dot.gif">';
			document.getElementById('short_division_4').style.display = 'block';
			//document.getElementById('img_short_division4').style.visibility = 'visible';
			document.getElementById('short_r_5_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						 if(i == 5 && j>=0 && j<=13){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('short_button_finishing_3').disabled = '';
			document.getElementById('short_button_finishing_3').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_3').disabled = '';
			//document.getElementById('short_button_finishing3_3').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_3').disabled = '';
			document.getElementById('short_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break
		default:			
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}


function finishing_4(btn){
	//alert('finishing_4');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 4;
	global_calrowindex2 = 4;
	isDotMode = false;
	switch(global_caltype){
		case 1:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';		
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 6 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'visible';			
			
		break;		
		case 5:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';	
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
				
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 6 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'visible';			
			
		break;
		
		case 7:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
				
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 6 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'visible';			
			
		break;
		case 10:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
				
		break;
		
		case 11:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.display = 'block';			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
				
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 6 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'visible';			
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short4(btn){
	//alert('finishing_4');
	//return;
	if(obj_shorttext != null){
		obj_shorttext.style.backgroundColor = '#FFFFFF';
	}
	global_shortcalrowindex = 4;
	global_shortcalrowindex2 = 4;
	isDotMode = false;
	switch(global_shortcaltype){		
		case 9:			
			//btn.style.visibility = 'hidden';
			//document.getElementById('short_division_5').style.visibility = 'visible';
			//document.getElementById('img_short_division4').style.visibility = 'visible';
			document.getElementById('short_division_5').style.display = 'block';			
			document.getElementById('short_r_7_9').innerHTML = '<img id="img_dot5" border="0" src="images/dot.gif">';
			//換行後補上 上一行的分隔線
			document.getElementById('short_r_6_5').innerHTML= '<img id="img_short_division2" border="0" src="images/line2-1.gif">';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 6 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('short_button_finishing_4').disabled = '';
			document.getElementById('short_button_finishing_4').style.visibility = 'hidden';
			//document.getElementById('short_button_finishing3_4').disabled = '';
			//document.getElementById('short_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('short_button_finishing2_4').disabled = '';
			document.getElementById('short_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';	
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}



function finishing2_4(btn){

	global_calrowindex = 4;
	global_calrowindex2 = 4;
	
	isDotMode = true;
	switch(global_caltype){
		case 1:
			document.getElementById('img_line_6').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j < 10){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=9){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}

		break;	
		case 5:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 6:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
	
		break;
		
		case 7:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 8:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		
		break;
		case 10:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 11:
			document.getElementById('img_line_4').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 6 && j>=0 && j<=11){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}			
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_4').disabled = '';
			document.getElementById('input_button_finishing3_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 12:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		
		break;
				
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_short2_4(btn){

	global_shortcalrowindex = 4;
	global_shortcalrowindex2 = 4;
	
	isDotMode = true;
	switch(global_shortcaltype){
		
		case 9:
			//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		break;
		
		default:			
		break;
	}
	document.getElementById('input_hidden_shortresponse').value = get_shortresponses();
}
function finishing_5(btn){
	//alert('finishing_5');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 5;
	global_calrowindex2 = 5;
	isDotMode = false;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'visible';			
			
		break;
		case 5:				
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'visible';			
			
		break;
		
		case 7:				
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'visible';			
			
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'visible';			
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_5(btn){
	//alert('finishing2_5');
	global_calrowindex = 5;
	global_calrowindex2 = 5;
	isDotMode = true;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;	
		
		case 5:				
		break;
		case 6:
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:				
		break;
		case 8:
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:
			document.getElementById('img_divisionline_7').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 7 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_5').disabled = '';
			document.getElementById('input_button_finishing3_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();	
}
function finishing_6(btn){
	//alert('finishing_6');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 6;
	global_calrowindex2 = 6;
	isDotMode = false;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 8 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'visible';			
			
		break;		
		
		case 5:				
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 8 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'visible';			
			
		break;
		
		case 7:				
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 8 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'visible';			
			
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 8 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_6').disabled = '';
			document.getElementById('input_button_finishing3_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'visible';			
			
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_6(btn){
	//alert('finishing2_6');
	global_calrowindex = 6;
	global_calrowindex2 = 6;
	isDotMode = true;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){		
				
				upload_responses();
			}
			
		break;		
			
		case 5:				
		break;
		case 6:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
			
				upload_responses();
			}
			
		break;
		
		case 7:				
		break;
		case 8:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
			
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:
		//alert(upload_responses());
			if(confirm('確定結束? 按結束將送出答案.')){				
				
				upload_responses();
			}
		
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing_7(btn){
	//alert('finishing_7');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 7;
	global_calrowindex2 = 7;
	isDotMode = false;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';				
			//document.getElementById('input_button_finishing_8').disabled = '';
			//document.getElementById('input_button_finishing_8').style.visibility = 'visible';
			//document.getElementById('input_button_finishing2_8').disabled = '';
			//document.getElementById('input_button_finishing2_8').style.visibility = 'visible';			
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;		
		case 5:				
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';				
			//document.getElementById('input_button_finishing_8').disabled = '';
			//document.getElementById('input_button_finishing_8').style.visibility = 'visible';
			//document.getElementById('input_button_finishing2_8').disabled = '';
			//document.getElementById('input_button_finishing2_8').style.visibility = 'visible';			
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:				
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';				
			//document.getElementById('input_button_finishing_8').disabled = '';
			//document.getElementById('input_button_finishing_8').style.visibility = 'visible';
			//document.getElementById('input_button_finishing2_8').disabled = '';
			//document.getElementById('input_button_finishing2_8').style.visibility = 'visible';			
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);						
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';				
			//document.getElementById('input_button_finishing_8').disabled = '';
			//document.getElementById('input_button_finishing_8').style.visibility = 'visible';
			//document.getElementById('input_button_finishing2_8').disabled = '';
			//document.getElementById('input_button_finishing2_8').style.visibility = 'visible';			
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}

function finishing2_7(btn){
	//alert('finishing2_7');
	global_calrowindex = 7;
	global_calrowindex2 = 7;
	isDotMode = true;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
			
		case 5:				
		break;
		case 6:
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:				
		break;
		case 8:
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:
			document.getElementById('img_divisionline_9').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 9 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_7').disabled = '';
			document.getElementById('input_button_finishing3_7').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_7').disabled = '';
			document.getElementById('input_button_finishing2_7').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing_8(btn){
	//alert('finishing_8');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 8;
	global_calrowindex2 = 8;
	isDotMode = false;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}						
					}
				}
			}			
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';				
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
				
		case 5:				
		break;
		case 6:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}						
					}
				}
			}			
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';				
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:				
		break;
		case 8:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}						
					}
				}
			}			
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';				
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 10:				
		break;
		
		case 11:				
		break;
		
		case 12:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}						
					}
				}
			}			
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';				
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_8(btn){
	//alert('finishing2_8');
	global_calrowindex = 8;
	global_calrowindex2 = 8;
	isDotMode = true;
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 5:				
		break;
		case 6:
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		case 7:				
		break;
		case 8:
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 10:				
		break;
		case 11:				
		break;
		
		case 12:
			document.getElementById('img_divisionline_10').style.display = 'block';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 10 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing3_8').disabled = '';
			document.getElementById('input_button_finishing3_8').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_8').disabled = '';
			document.getElementById('input_button_finishing2_8').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function back_to_prestep(){	
	switch(global_caltype){
		case 1:			
		break;
		case 2:			
		break;
		case 3:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<10;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			variable_1 = (global_calrowindex+1)+ ','+ variable_1;			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		case 4:
			//alert(global_calrowindex);
			if(global_calrowindex > 0){
				var variable_1 = '';
				for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
					for(var j=5;j<13;j++){
						var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
						var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
						
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(input_text.value == ''){
								variable_1 += '*';
							}
							else{
								variable_1 += input_text.value;
							}
						}
						var span = document.getElementById(span_id);
						if(span != null){
							if(span.innerHTML != '&nbsp;'){
								variable_1 += span.innerHTML;
							}
						}
					}
				}
				variable_1 = (global_calrowindex+1)+ ','+ variable_1;
				//var data = document.getElementById('input_hidden_response').value;
				//data = data.replace(variable_1+'R',variable_1);
				//data = data.replace(variable_1,variable_1+'R');
				//document.getElementById('input_hidden_response').value = data;				
				document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			}
		break;		
		case 5:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			variable_1 = (global_calrowindex+1)+ ','+ variable_1;			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		case 6:
			//alert(global_calrowindex);
			if(global_calrowindex > 0){
				var variable_1 = '';
				for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
					for(var j=5;j<13;j++){
						var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
						var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
						
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(input_text.value == ''){
								variable_1 += '*';
							}
							else{
								variable_1 += input_text.value;
							}
						}
						var span = document.getElementById(span_id);
						if(span != null){
							if(span.innerHTML != '&nbsp;'){
								variable_1 += span.innerHTML;
							}
						}
					}
				}
				variable_1 = (global_calrowindex+1)+ ','+ variable_1;
				//var data = document.getElementById('input_hidden_response').value;
				//data = data.replace(variable_1+'R',variable_1);
				//data = data.replace(variable_1,variable_1+'R');
				//document.getElementById('input_hidden_response').value = data;				
				document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			}
		break;
		
		case 7:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			variable_1 = (global_calrowindex+1)+ ','+ variable_1;			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		case 8:
			//alert(global_calrowindex);
			if(global_calrowindex > 0){
				var variable_1 = '';
				for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
					for(var j=5;j<13;j++){
						var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
						var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
						
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(input_text.value == ''){
								variable_1 += '*';
							}
							else{
								variable_1 += input_text.value;
							}
						}
						var span = document.getElementById(span_id);
						if(span != null){
							if(span.innerHTML != '&nbsp;'){
								variable_1 += span.innerHTML;
							}
						}
					}
				}
				variable_1 = (global_calrowindex+1)+ ','+ variable_1;
								
				document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			}			
		break;
		case 10:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			variable_1 = (global_calrowindex+1)+ ','+ variable_1;			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		
		case 11:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			variable_1 = (global_calrowindex+1)+ ','+ variable_1;			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		
		case 12:
			//alert(global_calrowindex);
			alert("12354897854");
			if(global_calrowindex > 0){
				var variable_1 = '';
				for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
					for(var j=5;j<13;j++){
						var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
						var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
						
						var input_text = document.getElementById(text_id);
						if(input_text != null){
							if(input_text.value == ''){
								variable_1 += '*';
							}
							else{
								variable_1 += input_text.value;
							}
						}
						var span = document.getElementById(span_id);
						if(span != null){
							if(span.innerHTML != '&nbsp;'){
								variable_1 += span.innerHTML;
							}
						}
					}
				}
				variable_1 = (global_calrowindex+1)+ ','+ variable_1;
								
				document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R';
			}			
		break;
		
		default:
		break;
	}
	//alert(global_caltype);
	//alert(global_calrowindex);
	switch(global_caltype){		
		case 4:
			//alert(global_calrowindex);
			if(global_calrowindex == 0){				
			}			
			else if(global_calrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('img_divisionline_'+ (global_calrowindex+2)).style.display = 'none'; //ing2
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_45 = '';
					break;
					case 3:
						global_dot_46 = '';
					break;
					case 4:
						global_dot_47 = '';
					break;
					case 5:
						global_dot_48 = '';
					break;
					case 6:
						global_dot_49 = '';
					break;
					case 7:
						global_dot_410 = '';
					break;
					case 8:
						global_dot_411 = '';
					break;
					default:
					break;
				}
				for(var j=5;j<13;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';						
					}
				}
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			//global_calrowindex--;					
			
		break;
		
		case 5:
		if(global_calrowindex == 0){				
			}
			else if(global_calrowindex == 1){				
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}				
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.display = 'none';
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_1235 = '';
					break;
					case 3:
						global_dot_1236 = '';
					break;
					case 4:
						global_dot_1237 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<12;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';
					}
				}
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';						
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
		break;
		case 6:
			//alert(global_calrowindex);
			if(global_calrowindex == 0){				
			}			
			else if(global_calrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('img_divisionline_'+ (global_calrowindex+2)).style.display = 'none';
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_45 = '';
					break;
					case 3:
						global_dot_46 = '';
					break;
					case 4:
						global_dot_47 = '';
					break;
					case 5:
						global_dot_48 = '';
					break;
					case 6:
						global_dot_49 = '';
					break;
					case 7:
						global_dot_410 = '';
					break;
					case 8:
						global_dot_411 = '';
					break;
					default:
					break;
				}
				for(var j=5;j<13;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';						
					}
				}
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			//global_calrowindex--;					
			
		break;
		case 7:
		if(global_calrowindex == 0){				
			}
			else if(global_calrowindex == 1){				
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}				
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.display = 'none';
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_1235 = '';
					break;
					case 3:
						global_dot_1236 = '';
					break;
					case 4:
						global_dot_1237 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<12;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';
					}
				}
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';						
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
		break;
		case 8:
			//alert(global_calrowindex);
			if(global_calrowindex == 0){				
			}			
			else if(global_calrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('img_divisionline_'+ (global_calrowindex+2)).style.display = 'none';
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_45 = '';
					break;
					case 3:
						global_dot_46 = '';
					break;
					case 4:
						global_dot_47 = '';
					break;
					case 5:
						global_dot_48 = '';
					break;
					case 6:
						global_dot_49 = '';
					break;
					case 7:
						global_dot_410 = '';
					break;
					case 8:
						global_dot_411 = '';
					break;
					default:
					break;
				}
				for(var j=5;j<13;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';						
					}
				}
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			//global_calrowindex--;					
			
		break;
		case 10:
		if(global_calrowindex == 0){				
			}
			else if(global_calrowindex == 1){				
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}				
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.display = 'none';
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_1235 = '';
					break;
					case 3:
						global_dot_1236 = '';
					break;
					case 4:
						global_dot_1237 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<12;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';
					}
				}
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';						
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';					
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
		break;			
		
		
		
		default:
			if(global_calrowindex == 0){				
			}
			else if(global_calrowindex == 1){				
				for(var j=0;j<10;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}				
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.display = 'none';
				for(var j=0;j<10;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_1235 = '';
					break;
					case 3:
						global_dot_1236 = '';
					break;
					case 4:
						global_dot_1237 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<10;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';
					}
				}
				for(var j=0;j<10;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';						
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			break;
			
			case 11:
		if(global_calrowindex == 0){				
			}
			else if(global_calrowindex == 1){				
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}				
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.display = 'none';
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_1235 = '';
					break;
					case 3:
						global_dot_1236 = '';
					break;
					case 4:
						global_dot_1237 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<12;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';
					}
				}
				for(var j=0;j<12;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';						
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
		break;
		
		case 12:
			//alert(global_calrowindex);
			if(global_calrowindex == 0){				
			}			
			else if(global_calrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('img_divisionline_'+ (global_calrowindex+2)).style.display = 'none';
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
				//alert(global_calrowindex);
				switch(global_calrowindex){
					case 2:
						global_dot_45 = '';
					break;
					case 3:
						global_dot_46 = '';
					break;
					case 4:
						global_dot_47 = '';
					break;
					case 5:
						global_dot_48 = '';
					break;
					case 6:
						global_dot_49 = '';
					break;
					case 7:
						global_dot_410 = '';
					break;
					case 8:
						global_dot_411 = '';
					break;
					default:
					break;
				}
				for(var j=5;j<13;j++){
					var span_id = 'span_r_'+ (global_calrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);
					if(span != null){
						span.innerHTML = '&nbsp;';						
					}
				}
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (global_calrowindex+2)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<8;i++){
					document.getElementById('input_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing3_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing3_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			//global_calrowindex--;					
			
		break;
	}
	
	if(global_calrowindex > 0){
		global_calrowindex--;
	}
	if(global_calrowindex2 > 0){
		global_calrowindex2--;
	}	
	flag_calrowindex = -1;
	//alert(global_calrowindex);
	if(global_calrowindex == 0){
		//回上一列按鈕
		document.getElementById('input_button_btp').disabled = 'true';
	}	
}

function back_to_shortprestep(){	

	switch(global_shortcaltype){		
			case 9:
			//alert(global_shortcalrowindex);
			if(global_shortcalrowindex > 0){
				var variable_1 = '';
				for(var i=global_shortcalrowindex;i<(global_shortcalrowindex+1);i++){
					if(global_shortcalrowindex==4)
						{
							for(var j=5;j<13;j++){
								var text_id = 'short_text_r_'+ (i+3)+ '_'+ (j+1);
								
								
								var input_text = document.getElementById(text_id);
								if(input_text != null){
									if(input_text.value == ''){
										variable_1 += '*';
									}
									else{
										variable_1 += input_text.value;
									}
								}								
							}
						}
					else
						{
							for(var j=0;j<13;j++){
								var text_id = 'short_text_r_'+ (i+3)+ '_'+ (j+1);
								//var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
								
								var input_text = document.getElementById(text_id);
								if(input_text != null){
									if(input_text.value == ''){
										variable_1 += '*';
									}
									else{
										variable_1 += input_text.value;
									}
								}
								/*var span = document.getElementById(span_id);
								if(span != null){
									if(span.innerHTML != '&nbsp;'){
										variable_1 += span.innerHTML;
									}
								}*/
							}					
						}
				}
				variable_1 = (global_shortcalrowindex+1)+ ','+ variable_1;
				//var data = document.getElementById('input_hidden_response').value;
				//data = data.replace(variable_1+'R',variable_1);
				//data = data.replace(variable_1,variable_1+'R');
				//document.getElementById('input_hidden_response').value = data;				
				document.getElementById('input_hidden_shortresponse').value = document.getElementById('input_hidden_shortresponse').value+ ';'+ variable_1+ 'R';
				//alert('test');
				//alert(document.getElementById('input_hidden_response').value);
			}
		break;		
		
		default:
		break;
	}
	//alert(global_caltype);
	//alert(global_calrowindex);
	switch(global_shortcaltype){				
		case 9:
			//alert(global_calrowindex);
			if(global_shortcalrowindex == 0){				
			}			
			else if(global_shortcalrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('short_division_'+ (global_shortcalrowindex+1)).style.display='none';					
				
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (global_shortcalrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						input_text.value = '';
						input_text.disabled = '';							
						input_text.style.visibility = 'hidden';
						input_text.style.backgroundColor = 'white';
					}
				}
					
					
				
				//alert(global_calrowindex);
				switch(global_shortcalrowindex){
					case 2:
						global_dot_45 = '';
					break;
					case 3:
						global_dot_46 = '';
					break;
					case 4:
						global_dot_47 = '';
					break;
					case 5:
						global_dot_48 = '';
					break;
					case 6:
						global_dot_49 = '';
					break;
					case 7:
						global_dot_410 = '';
					break;
					case 8:
						global_dot_411 = '';
					break;
					default:
					break;
				}
				for(var j=0;j<13;j++){
						
						
					var span_id = 'short_r_'+(global_shortcalrowindex+3)+ '_'+ (j+1);
					var span = document.getElementById(span_id);					
					if(span != null){
						span.innerHTML = '&nbsp;';						
					}
					
				}
				for(var j=0;j<13;j++){
					var text_id = 'short_text_r_'+ (global_shortcalrowindex+3)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){						
						input_text.disabled = '';
						input_text.style.backgroundColor = 'white';
					}
				}
				for(var i=0;i<4;i++){
					document.getElementById('short_button_finishing_'+ (i+1)).disabled = '';
					document.getElementById('short_button_finishing_'+ (i+1)).style.visibility = 'hidden';
					//document.getElementById('short_button_finishing3_'+ (i+1)).disabled = '';
					//document.getElementById('short_button_finishing3_'+ (i+1)).style.visibility = 'hidden';
					document.getElementById('short_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('short_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('short_button_finishing_'+ global_shortcalrowindex).disabled = '';
				document.getElementById('short_button_finishing_'+ global_shortcalrowindex).style.visibility = 'visible';
				//document.getElementById('short_button_finishing3_'+ global_shortcalrowindex).disabled = '';
				//document.getElementById('short_button_finishing3_'+ global_shortcalrowindex).style.visibility = 'visible';
				document.getElementById('short_button_finishing2_'+ global_shortcalrowindex).disabled = '';
				document.getElementById('short_button_finishing2_'+ global_shortcalrowindex).style.visibility = 'visible';
				//document.getElementById('input_button_upload_response').style.visibility = 'hidden';
			}
			//global_calrowindex--;					
			
		break;
		
		
		default:			
			break;
	}
			

	if(global_shortcalrowindex > 0){
		global_shortcalrowindex--;
	}
	if(global_shortcalrowindex2 > 0){
		global_shortcalrowindex2--;
	}
	flag_shortcalrowindex=-1;
	if(global_shortcalrowindex == 0){
		//回上一列按鈕
		document.getElementById('input_button_btp').disabled = 'true';
	}
}



function recalculating(){  //ing?
	//if(global_calrowindex > -1){
		document.getElementById('input_hidden_response2').value += ';'+ get_responses2()+ ';O';
		document.getElementById('input_hidden_shortresponse2').value += ';'+ get_shortresponses2()+ ';O';
		clearResponse();
		initialized();
		$("#math_textarea").html("").mathquill('revert').mathquill('editable').mathquill('write',"");	
		$("#latex_Code").val(" ");
		$("#latex_Code1").val(" ");			
		document.getElementById('math_box').style.visibility = 'visible';
		document.getElementById('math_textarea').style.visibility = 'visible';
		document.getElementById('cel_0_15').innerHTML = '&nbsp;'
		document.getElementById('cel_0_23').innerHTML = '&nbsp;'

	//}	
}

//忽略中斷
date_default_timezone_set('Asia/Taipei');
// Ignore user aborts and allow the script to run forever
ignore_user_abort(true);
// disable php time limit
set_time_limit(0);


//上傳答案
function upload_responses(){  //抓取答案
	//alert(get_responses2());
	
	var responses = '';
	var responses_short='';
	var answer='';
	var answer_f='';
	var latexSource=$("#latex_Code");
	var latexSource1=$("#latex_Code1");
	var Semantic=document.getElementById('math_Semantic').value;
	var stu_answer = '';
	
	if(document.getElementById('input_hidden_response2').value == '')
	{
			//alert('執行測試1');
		responses = get_responses2();
		//alert(responses);
	}
	else
	{
		//alert('test');
		var data = document.getElementById('input_hidden_response2').value;
		data = data.substr(1,data.length-1);
		responses = data+ ';'+ get_responses2();
		//alert(responses);
	}
	
	
	//短除法
	
	if(document.getElementById('input_hidden_shortresponse2').value == '')
	{
			//alert('執行測試');
		responses_short = get_shortresponses2();
	}
	else
	{
		//alert('test');
		var data = document.getElementById('input_hidden_shortresponse2').value;
		data = data.substr(1,data.length-1);
		responses_short = data+ ';'+ get_shortresponses2();
	}
	//alert(responses);
	//alert(responses_short);
	
	
	
		
	
	
	
	if((responses==0)&&(responses_short==0))
	{
			//responses = responses.substr(1,responses.length-1);			
			answer="*"+"選擇題答案:"+latexSource1.val()+"|"+latexSource.val()+"|"+"|"+Semantic.replace(/\s+/g, "")+"|";
			//alert(stu_answer);
			answer_f="*"+"學生回答:"+latexSource.val();
			stu_answer = document.getElementById("latex_as").value;
			
			if(Semantic === ""){
				//alert("123");
				stu_answer = stu_answer + "\n" + answer_f;
			}else{
				stu_answer = stu_answer + "\n" + answer_f +"\n"+"*學生發問："+Semantic.replace(/\s+/g, "");
			}
			//stu_answer = stu_answer + "\n" + answer_f +"\n"+"*學生發問："+Semantic.replace(/\s+/g, "");
			//alert(stu_answer);
			//document.getElementById("input_hidden_stu_answer").value = stu_answer;
			document.getElementById("latexCode").value=answer;
			document.getElementById("latex_as").value=stu_answer;
			//alert(answer+"asd");
			
			document.getElementById('input_hidden_response').value = responses;	
			document.getElementById('input_hidden_shortresponse').value = responses_short;				
			document.forms['form_draw'].submit();
		
	
	}
	else 
	{
		if(responses!=''){
		var index_array = new Array();
		var counter = 0;
		//alert(responses);
		var split = responses.split(';');
		var length = split.length;
		for(var i=0;i<length;i++){
			var response = split[i];
			if(response.indexOf('R') == -1 && response.indexOf(',') > -1){
				index_array[counter] = i;
				counter++;
				//alert(response);
			}
			//alert(response.indexOf('R'));
			//alert(response);
		}
		
		responses = '';
		var answer_index = index_array[index_array.length-1];
		for(var i=0;i<length;i++){
			var response = split[i];
			if(response.indexOf(',') == -1){
				responses += ';'+ response;
			}
			else{
				if(i == answer_index){
					var split2 = response.split(',');
					responses += ';'+ split2[1];
				}
				else{
					responses += ';'+ response;
				}
			}
		}
		responses = responses.substr(1,responses.length-1);
	 }
		
		
		answer="*"+"選擇題答案:"+latexSource1.val()+"|"+latexSource.val()+"|"+responses+"|"+responses_short;
		//alert(latexSource.val()+"橫式答案");
		answer_f="*"+"學生回答:"+latexSource.val();
		stu_answer = document.getElementById("latex_as").value;
		stu_answer = stu_answer + "\n" + answer_f ;
		//alert(stu_answer);
		//document.getElementById("input_hidden_stu_answer").value = stu_answer;
		document.getElementById("latexCode").value=answer;		
		document.getElementById("latex_as").value=stu_answer;
		//alert(answer+"asdddd");
		//downloadxls(answer);
		
		document.getElementById('input_hidden_response').value = responses;
		document.getElementById('input_hidden_shortresponse').value = responses_short;		
		document.forms['form_draw'].submit();

		
	}
	
}



function get_responses2(){  //取得答案2
	var responses = '';
	switch(global_caltype){
		case 1:
			//被加數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//加數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			//alert(responses);
			responses = 'A;'+ variable_1+ ';'+ variable_2;
			//alert(responses);
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		case 2:
			//減數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//被減數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'B;'+ variable_1+ ';'+ variable_2;
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		case 3:
			//被乘數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//乘數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'C;'+ variable_1+ ';'+ variable_2;
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		case 4:
			//商數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var img_divisionline = 'img_divisionline_'+(j-2);   //ing123
					//alert(img_divisionline + ' = ' + document.getElementById(img_divisionline).style.display);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//被除數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<10;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}
					}
				}
			}
			//除數
			var variable_3 = '';
			for(var i=1;i<2;i++){
				for(var j=0;j<5;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_3 += '*';
						}
						else{
							variable_3 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_3 += span.innerHTML;
						}
					}
				}
			}
			//responses = 'D;'+ variable_1+ ';'+ variable_2+ ';'+ variable_3;
			if(document.getElementById('input_hidden_response').value == ''){
				responses = 'D;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'D;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
			
		case 5:
			//被乘數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//乘數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'E;'+ variable_1+ ';'+ variable_2;
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		case 6:
			//商數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//被除數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}
					}
				}
			}
			//除數
			var variable_3 = '';
			for(var i=1;i<2;i++){
				for(var j=0;j<5;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_3 += '*';
						}
						else{
							variable_3 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_3 += span.innerHTML;
						}
					}
				}
			}
			//responses = 'D;'+ variable_1+ ';'+ variable_2+ ';'+ variable_3;
			if(document.getElementById('input_hidden_response').value == ''){
				responses = 'F;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'F;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
		
		case 7:
			//被乘數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//乘數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'G;'+ variable_1+ ';'+ variable_2;
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		case 8:
			//商數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//被除數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}
					}
				}
			}
			//除數
			var variable_3 = '';
			for(var i=1;i<2;i++){
				for(var j=0;j<5;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_3 += '*';
						}
						else{
							variable_3 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_3 += span.innerHTML;
						}
					}
				}
			}
			//responses = 'D;'+ variable_1+ ';'+ variable_2+ ';'+ variable_3;
			if(document.getElementById('input_hidden_response').value == ''){
				responses = 'H;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'H;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
		
		case 10:
			//被乘數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//乘數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'J;'+ variable_1+ ';'+ variable_2;
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		
		case 11:
			//被乘數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//乘數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}						
					}
				}
			}
			responses = 'K;'+ variable_1+ ';'+ variable_2;
			//alert(responses);
			if(document.getElementById('input_hidden_response').value == ''){
				return responses;
			}
			else{
				responses = responses+ ';'+ document.getElementById('input_hidden_response').value;
				return responses;
			}
		break;
		
		
		case 12:
			//商數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}
				}
			}
			//被除數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<12;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}
					}
				}
			}
			//除數
			var variable_3 = '';
			for(var i=1;i<2;i++){
				for(var j=0;j<5;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_3 += '*';
						}
						else{
							variable_3 += input_text.value;
						}
					}
					var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_3 += span.innerHTML;
						}
					}
				}
			}
			//responses = 'D;'+ variable_1+ ';'+ variable_2+ ';'+ variable_3;
			if(document.getElementById('input_hidden_response').value == ''){
				responses = 'L;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'L;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
		
		
		
		default:
		break;
	}	
	
	return 0;

	
}

function get_shortresponses2(){ //取得 短除法 答案 2
	var responses = '';
	switch(global_shortcaltype){		
			
		case 9:
			//商數
			var variable_1 = '';
			for(var i=0;i<1;i++){
				for(var j=5;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					//var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_1 += '*';
						}
						else{
							variable_1 += input_text.value;
						}
					}
					/*var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_1 += span.innerHTML;
						}
					}*/
				}
			}
			//被除數
			var variable_2 = '';
			for(var i=1;i<2;i++){
				for(var j=5;j<13;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					//var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_2 += '*';
						}
						else{
							variable_2 += input_text.value;
						}
					}
					/*var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_2 += span.innerHTML;
						}
					}*/
				}
			}
			//除數
			var variable_3 = '';
			for(var i=1;i<2;i++){
				for(var j=0;j<5;j++){
					var text_id = 'short_text_r_'+ (i+1)+ '_'+ (j+1);
					//var span_id = 'span_r_'+ (i+1)+ '_'+ (j+1);
					
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(input_text.value == ''){
							variable_3 += '*';
						}
						else{
							variable_3 += input_text.value;
						}
					}
					/*var span = document.getElementById(span_id);
					if(span != null){
						if(span.innerHTML != '&nbsp;'){
							variable_3 += span.innerHTML;
						}
					}*/
				}
			}
			//responses = 'D;'+ variable_1+ ';'+ variable_2+ ';'+ variable_3;
			if(document.getElementById('input_hidden_shortresponse').value == ''){
				//responses = 'I;'+ variable_2+ ';'+ variable_3+ ';'+variable_1;
				responses = 'I;'+ variable_2+ ';'+ variable_3+ ';';
				return responses;
			}
			else{
				responses = 'I;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_shortresponse').value+ ';';
				return responses;
			}
		break;
		default:
		break;
	}	
	
	return 0;	
}

function get_responses(){  //取得答案1
	//alert(global_calrowindex);
	var responses = '';
if(global_calrowindex >-1){
		switch(global_caltype){
			case 1:
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype1(global_calrowindex);				
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}	
			//alert('測試');				
			//alert(responses);					
			break;
			case 2:
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype2(global_calrowindex);
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}							
			break;
			case 3:				
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype3(global_calrowindex);
				
				if(flag_calrowindex == global_calrowindex){					
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}				
				else{					
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;					
				}
				//alert(responses);				
			break;
			case 4:				
				var data = document.getElementById('input_hidden_response').value;
				var rowdata = get_rowdata_caltype4(global_calrowindex);
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}
				//alert(responses);				
			break;
						
			case 5:				
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype6(global_calrowindex);
				
				if(flag_calrowindex == global_calrowindex){					
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}				
				else{					
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;					
				}
				//alert(responses);				
			break;
			case 6:				
				var data = document.getElementById('input_hidden_response').value;
				var rowdata = get_rowdata_caltype4(global_calrowindex);
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}
				//alert(responses);				
			break;
			
			case 7:				
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype6(global_calrowindex);
				
				if(flag_calrowindex == global_calrowindex){					
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}				
				else{					
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;					
				}
				//alert(responses);				
			break;
			case 8:				
				var data = document.getElementById('input_hidden_response').value;
				var rowdata = get_rowdata_caltype4(global_calrowindex);
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}
				//alert(responses);				
			break;
			case 10:				
				var data = document.getElementById('input_hidden_response').value;				
				var rowdata = get_rowdata_caltype6(global_calrowindex);
				
				if(flag_calrowindex == global_calrowindex){					
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}				
				else{					
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;					
				}
				//alert(responses);				
			break;
			case 11:				
				var data = document.getElementById('input_hidden_response').value;	
					alert(data);
				var rowdata = get_rowdata_caltype6(global_calrowindex);
				
				if(flag_calrowindex == global_calrowindex){					
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}				
				else{					
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;					
				}
				//alert(responses);				
			break;
			
			case 12:				
				var data = document.getElementById('input_hidden_response').value;
				var rowdata = get_rowdata_caltype4(global_calrowindex);
				if(flag_calrowindex == global_calrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_calrowindex = global_calrowindex;
				}
				//alert(responses);				
			break;
			
			
			
			default:
			break;
		}
	}
	//alert(responses);
	//responses = responses.substr(1,responses.length-1);	
	if(responses.substr(0,1) == ';'){
		responses = responses.substr(1,responses.length-1);
	}
	
	return responses;
	
}
function get_shortresponses(){ //取得 短除法 答案 1
	//alert(global_calrowindex);
	var responses = '';
	if(global_shortcalrowindex > -1){
		switch(global_shortcaltype){
				
			case 9:				
				var data = document.getElementById('input_hidden_shortresponse').value;
				var rowdata = get_rowdata_caltype5(global_shortcalrowindex);
				if(flag_shortcalrowindex == global_shortcalrowindex){			
					var split = data.split(';');
					var length = split.length;									
					for(var i=0;i<length-1;i++){
						responses += ';'+ split[i];
					}
					responses += ';'+ rowdata;						
				}
				else{
					responses = data+ ';'+ rowdata;					
					flag_shortcalrowindex = global_shortcalrowindex;
				}
				//alert(responses);				
			break;
			default:
			break;
		
		}		
	}
	//alert(responses);
	//responses = responses.substr(1,responses.length-1);	
	if(responses.substr(0,1) == ';'){
		responses = responses.substr(1,responses.length-1);
	}
	
	return responses;
	
}






function get_rowdata_caltype1(calrowindex){  //ing? 2
	//alert(calrowindex);
	var rowdata = '';
	for(var i=calrowindex;i<(calrowindex+1);i++){
		//variable_3 += ';';
		for(var j=0;j<10;j++){
			var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
			var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);						
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				if(input_text.value == ''){
					rowdata += '*';
				}
				else{
					rowdata += input_text.value;
				}
			}
			var span = document.getElementById(span_id);
			if(span != null){				
				if(span.innerHTML != '&nbsp;'){
					rowdata += span.innerHTML;
				}						
			}
		}
	}
	return rowdata;
}
function get_rowdata_caltype2(calrowindex){  //ing? 3
	//alert(calrowindex);
	var rowdata = '';
	for(var i=calrowindex;i<(calrowindex+1);i++){
		//variable_3 += ';';
		for(var j=0;j<10;j++){
			var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
			var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);						
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				if(input_text.value == ''){
					rowdata += '*';
				}
				else{
					rowdata += input_text.value;
				}
			}
			var span = document.getElementById(span_id);
			if(span != null){
				if(span.innerHTML != '&nbsp;'){
					rowdata += span.innerHTML;
				}						
			}
		}
	}
	return rowdata;
}
function get_rowdata_caltype3(calrowindex){	 //ing? 4
	var rowdata = (calrowindex+1)+ ',';
	for(var j=0;j<11;j++){
		var text_id = 'input_text_r_'+ (calrowindex+3)+ '_'+ (j+1);
		var span_id = 'span_r_'+ (calrowindex+3)+ '_'+ (j+1);						
		var input_text = document.getElementById(text_id);
		if(input_text != null){
			if(input_text.value == ''){
				rowdata += '*';
			}
			else{
				rowdata += input_text.value;
			}
		}
		var span = document.getElementById(span_id);
		if(span != null){
			if(span.innerHTML != '&nbsp;'){
				rowdata += span.innerHTML;
			}						
		}
	}	
	return rowdata;
}
function get_rowdata_caltype4(calrowindex){  //ing? 5
	//alert(calrowindex);
	var rowdata = (calrowindex+1)+ ',';		
	for(var j=5;j<13;j++){
		var text_id = 'input_text_r_'+ (calrowindex+3)+ '_'+ (j+1);
		var span_id = 'span_r_'+ (calrowindex+3)+ '_'+ (j+1);						
		var input_text = document.getElementById(text_id);
		if(input_text != null){
			if(input_text.value == ''){
				rowdata += '*';
			}
			else{
				rowdata += input_text.value;
			}
		}
		var span = document.getElementById(span_id);
		if(span != null){
			if(span.innerHTML != '&nbsp;'){
				rowdata += span.innerHTML;
			}						
		}
	}	
	return rowdata;
}
function get_rowdata_caltype5(calrowindex){  //ing? 6
			//alert('測試');
	//alert(calrowindex);
	/*var calrowindex_number=calrowindex+1;
	var rowdata = calrowindex_number+ ',';*/	
	var rowdata = (calrowindex+1)+ ',';	
	//alert(rowdata);
	if(calrowindex==4)
	{
		for(var j=5;j<13;j++){
			var text_id = 'short_text_r_'+ (calrowindex+3)+ '_'+ (j+1);
			//var span_id = 'span_r_'+ (calrowindex+3)+ '_'+ (j+1);						
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				if(input_text.value == ''){
					rowdata += '*';
				}
				else{
					rowdata += input_text.value;
				}
			}
			/*var span = document.getElementById(span_id);
			if(span != null){
				if(span.innerHTML != '&nbsp;'){
					rowdata += span.innerHTML;
				}						
			}*/
		}
		return rowdata;
	}
	else
	{
		for(var j=0;j<13;j++){
			var text_id = 'short_text_r_'+ (calrowindex+3)+ '_'+ (j+1);
			//var span_id = 'span_r_'+ (calrowindex+3)+ '_'+ (j+1);						
			var input_text = document.getElementById(text_id);
			if(input_text != null){
				if(input_text.value == ''){
					rowdata += '*';
				}
				else{
					rowdata += input_text.value;
				}
			}
			/*var span = document.getElementById(span_id);
			if(span != null){
				if(span.innerHTML != '&nbsp;'){
					rowdata += span.innerHTML;
				}						
			}*/
		}
		return rowdata;
	}
	
		

}

function get_rowdata_caltype6(calrowindex){	 //ing? 7
	//alert(calrowindex);
	//alert("就是這裡");
	var rowdata = (calrowindex+1)+ ',';
	for(var j=0;j<12;j++){
		var text_id = 'input_text_r_'+ (calrowindex+3)+ '_'+ (j+1);
		var span_id = 'span_r_'+ (calrowindex+3)+ '_'+ (j+1);						
		var input_text = document.getElementById(text_id);
		if(input_text != null){
			if(input_text.value == ''){
				rowdata += '*';
			}
			else{
				rowdata += input_text.value;
			}
		}
		var span = document.getElementById(span_id);
		if(span != null){
			if(span.innerHTML != '&nbsp;'){
				rowdata += span.innerHTML;
			}						
		}
	}	
	alert(rowdata+"-----------------859632145859632541785412541");
	return rowdata;
}



//事件-資料
function keypress(event){
	//alert('keypress-event.keyCode:'+ event.keyCode);
	switch(event.keyCode){
		case 8:
			//刪除			
			if(obj_text.value == ''){
				var id = obj_text.id;
				var split = id.split('_');
				var row_index = split[3];
				var cel_index = split[4];
				cel_index--;
				var text_id = 'input_text_r_'+ row_index+ '_'+ cel_index;
				if(document.getElementById(text_id) != null){
					obj_text = document.getElementById(text_id);
					obj_text.focus();
				}				
			}	
						
		break;
		default:
		break;
	}
	switch(event.charCode){
		case 48:
			inputNumber('0');			
		break;
		case 49:
			inputNumber('1');			
		break;
		case 50:
			inputNumber('2');			
		break;
		case 51:
			inputNumber('3');			
		break;
		case 52:
			inputNumber('4');			
		break;
		case 53:
			inputNumber('5');			
		break;
		case 54:
			inputNumber('6');			
		break;
		case 55:
			inputNumber('7');			
		break;
		case 56:
			inputNumber('8');			
		break;
		case 57:
			inputNumber('9');			
		break;
		default:
		break;
	}
}
//資料-事件
function keyup(event){
	//alert('keyup-event.keyCode:'+ event.keyCode);
	switch(event.keyCode){		
		case 37:
			//左
			//alert(event.clientX);
			
			obj_text.style.backgroundColor = '#FFFFFF';
			var id = obj_text.id;
			var split = id.split('_');
			var row_index = split[3];
			var cel_index = split[4];
			cel_index--;
			var text_id = 'input_text_r_'+ row_index+ '_'+ cel_index;
			var next_text = document.getElementById(text_id);
			if(next_text != null && next_text.style.visibility == 'visible' && next_text.disabled == ''){
				obj_text = next_text;
				obj_text.style.backgroundColor = '#FFFF00';
				obj_text.focus();
			}
					
		break;
		case 38:
			//上
			obj_text.style.backgroundColor = '#FFFFFF';
			var id = obj_text.id;			
			var split = id.split('_');
			var row_index = split[3];
			var cel_index = split[4];
			row_index--;
			var text_id = 'input_text_r_'+ row_index+ '_'+ cel_index;
			var next_text = document.getElementById(text_id);
			if(next_text != null && next_text.style.visibility == 'visible' && next_text.disabled == ''){
				obj_text = next_text;
				obj_text.style.backgroundColor = '#FFFF00';
				obj_text.focus();
			}	
		break;
		case 39:
			//右
			obj_text.style.backgroundColor = '#FFFFFF';
			var id = obj_text.id;
			var split = id.split('_');
			var row_index = split[3];
			var cel_index = split[4];
			cel_index++;
			var text_id = 'input_text_r_'+ row_index+ '_'+ cel_index;
			var next_text = document.getElementById(text_id);
			if(next_text != null && next_text.style.visibility == 'visible' && next_text.disabled == ''){
				var text = next_text.value;
				next_text.value = '';
				obj_text = next_text;
				obj_text.value = text;
				obj_text.style.backgroundColor = '#FFFF00';
				obj_text.focus();
			}	
		break;
		case 40:
			//下
			obj_text.style.backgroundColor = '#FFFFFF';
			var id = obj_text.id;
			var split = id.split('_');
			var row_index = split[3];
			var cel_index = split[4];
			row_index++;
			var text_id = 'input_text_r_'+ row_index+ '_'+ cel_index;
			var next_text = document.getElementById(text_id);
			if(next_text != null && next_text.style.visibility == 'visible' && next_text.disabled == ''){
				obj_text = next_text;
				obj_text.style.backgroundColor = '#FFFF00';
				obj_text.focus();
			}	
		break;
		case 110:			
			if(obj_text.value == '.'){
				obj_text.value = '';
			}
			inputDot('.');
			//obj_text.value = '';
		break;
		case 190:			
			if(obj_text.value == '.'){
				obj_text.value = '';
			}
			inputDot('.');
			//obj_text.value = '';
		break;		
		default:
		break;
	}
}

//線按鈕 出 線
function finishing3_1(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_caltype){
		case 3:
			document.getElementById('img_line_1').style.display = 'block';
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ '@||@';
		break;
		case 4:
			document.getElementById('img_divisionline_3').style.display = 'block';
		break;
		case 5:
			document.getElementById('img_line_1').style.display = 'block';
		break;		
		case 6:
			document.getElementById('img_divisionline_3').style.display = 'block';			
		break;
		case 7:
			document.getElementById('img_line_1').style.display = 'block';
		break;		
		case 8:
			document.getElementById('img_divisionline_3').style.display = 'block';			
		break;

		case 10:
			document.getElementById('img_line_1').style.display = 'block';
		break;
		case 11:
			document.getElementById('img_line_1').style.display = 'block';
			//document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ '@XX@';
			//responses = responses + "@##@" ;
			alert(responses);
			alert(data);
		break;
		
		case 12:
			document.getElementById('img_divisionline_3').style.display = 'block';			
		break;
		
		default:
		break;
	}		
}

function finishing3_2(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_caltype){
		case 3:
			document.getElementById('img_line_2').style.display = 'block';
		break;
		case 4:
			document.getElementById('img_divisionline_4').style.display = 'block';
		break;
		case 5:
			document.getElementById('img_line_2').style.display = 'block';
		break;		
		case 6:
			document.getElementById('img_divisionline_4').style.display = 'block';			
		break;
		case 7:
			document.getElementById('img_line_2').style.display = 'block';
		break;		
		case 8:
			document.getElementById('img_divisionline_4').style.display = 'block';			
		break;

		case 10:
			document.getElementById('img_line_2').style.display = 'block';
		break;
		case 11:
			document.getElementById('img_line_2').style.display = 'block';
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ '@||@';
		break;
		case 12:
			document.getElementById('img_divisionline_4').style.display = 'block';			
		break;
		
		default:
		break;
	}		
}

function finishing3_3(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_caltype){
		case 3:
			document.getElementById('img_line_3').style.display = 'block';
		break;
		case 4:
			document.getElementById('img_divisionline_5').style.display = 'block';
		break;
		case 5:
			document.getElementById('img_line_3').style.display = 'block';
		break;		
		case 6:
			document.getElementById('img_divisionline_5').style.display = 'block';			
		break;
		case 7:
			document.getElementById('img_line_3').style.display = 'block';
		break;		
		case 8:
			document.getElementById('img_divisionline_5').style.display = 'block';			
		break;

		case 10:
			document.getElementById('img_line_3').style.display = 'block';
		break;
		case 11:
			document.getElementById('img_line_3').style.display = 'block';
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ '@||@';
		break;
		
		case 12:
			document.getElementById('img_divisionline_5').style.display = 'block';			
		break;
		
		default:
		break;
	}		
}

function finishing3_4(btn){
	//alert('finishing2_1');
	//return;	
	switch(global_caltype){
		case 3:
			document.getElementById('img_line_4').style.display = 'block';
		break;
		case 4:
			document.getElementById('img_divisionline_6').style.display = 'block';
		break;
		case 5:
			document.getElementById('img_line_4').style.display = 'block';
		break;		
		case 6:
			document.getElementById('img_divisionline_6').style.display = 'block';			
		break;
		case 7:
			document.getElementById('img_line_4').style.display = 'block';
		break;		
		case 8:
			document.getElementById('img_divisionline_6').style.display = 'block';			
		break;

		case 10:
			document.getElementById('img_line_4').style.display = 'block';
		break;
		case 11:
			document.getElementById('img_line_4').style.display = 'block';
			document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ '@||@';
		break;	
		
		case 12:
			document.getElementById('img_divisionline_6').style.display = 'block';			
		break;
		
		default:
		break;
	}		
}




</script>