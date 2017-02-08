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

</style>

<script language="javascript">

function goLite(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#ffffff";
}

function goDim(FRM,BTN)
{
   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#1cb569";
}

</script>
										<table valign="top" width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<!--<tr bgcolor="">-->
													<!--<td colspan="2">
														<div align="center">
															<span>算式編輯器</span>
														</div>
														<hr size="1" width="100%">
													</td>-->
												<!--</tr>-->
												
												<!--<tr bgcolor="">-->
													
													<td width="22.2%">
														<!--<hr size="1" width="100%">-->
														&nbsp;	
													</td>
													<td width="2.3%" background="images/frame_3.jpg">
														<!--<hr size="1" width="100%">-->
														&nbsp;	
													</td>
													
												<!--</tr>-->
												<!--<tr valign="middle" bgcolor="lightgreen">-->													
													<td>
														<table align="left" bgcolor="#ffe4b5" >
															<tr >
																<td align="left" >
																	<!--<span>計算輸入</span>-->
																</td>
															</tr>
															<tr>
																<td>
																	<table border="0" >
																		<tr>
																			<dt style="visibility:hidden;">
																				<input onclick="javascript:selectingEquation('1','');" value="1" id="input_radio_equation_1" name="input_radio_equation" type="radio" style=""><span style="font-size:12px;">日-時</span></input>																				
																			</dt>
																			<dt style="visibility:hidden;">
																				<input onclick="javascript:selectingEquation('2','');" value="2" id="input_radio_equation_2" name="input_radio_equation" type="radio" style=""><span style="font-size:12px;">時-分</span></input>
																			</dt>
																			<dt>
																				<input onclick="javascript:selectingEquation('3','');" value="3" id="input_radio_equation_3" name="input_radio_equation" type="radio" style=""><span style="font-size:12px;">分-秒</span></input>
																			</dt>
																			<dt style="visibility:hidden;">
																				<input onclick="javascript:selectingEquation('4','');" value="4" id="input_radio_equation_4" name="input_radio_equation" type="radio" style=""><span style="font-size:12px;">除法</span></input>
																			</dt>
																			<dt>
																				<input id="input_button_equation" onclick="javascript:finishedEquationSelection(this);" value="確定" name="" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style=""></input>
																			</dt>
																			
																		</tr>
																	</table>
																</td>
																<td width="35">
																	&nbsp;																		
																</td>
																<td>
																	<table border="0" >
																		<tr>
																			<td width="35">
																				<input id="input_button_number_1" onclick="javascript:inputNumber('1');" value="1" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_2" onclick="javascript:inputNumber('2');" value="2" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_3" onclick="javascript:inputNumber('3');" value="3" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_4" onclick="javascript:inputNumber('4');" value="4" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_5" onclick="javascript:inputNumber('5');" value="5" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																		</tr>
																		<tr>
																			<td width="35">
																				<input id="input_button_number_6" onclick="javascript:inputNumber('6');" value="6" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_7" onclick="javascript:inputNumber('7');" value="7" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_8" onclick="javascript:inputNumber('8');" value="8" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_9" onclick="javascript:inputNumber('9');" value="9" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_number_0" onclick="javascript:inputNumber('0');" value="0" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																		</tr>
																		<tr>
																			<td width="35">
																				<input id="input_button_point" onclick="javascript:inputDot('.');" value="." name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_zero2" onclick="javascript:inputNumber('Ø');" value="Ø" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				<input id="input_button_delete" onclick="javascript:delNumber();" value="←" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:35px;">
																			</td>
																			<td width="35">
																				&nbsp;
																			</td>
																			<td width="35">
																				&nbsp;																		
																			</td>
																		</tr>																		
																	</table>
																	<td width="35">
																			&nbsp;																		
																	</td>
																	<td>
																		<table align="center" border="0">
																			<tr>
																				<dl>
																					<dt width="75" colspan="2" >
																							<input id="input_button_btp" onclick="javascript:back_to_prestep();" value="回上一列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:75px;">
																					</dt>
																					<dt width="35">
																						&nbsp;
																					</dt>
																					<dt width="75" colspan="2" >
																							<input id="input_button_recal" onclick="javascript:if(confirm('確定重新計算?')){recalculating();};" value="重新計算" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:75px;">
																					</dt>
																					<dt width="35">
																						&nbsp;
																					</dt>
																				</dl>
																			</tr>																																															
																		</table>
																	</td>
																</td>
															</tr>
														</table>
													</td>
												<!--</tr>-->
												<!--<tr bgcolor="">-->
													<td>
														<hr size="1" width="100%">
													</td>
												<!--</tr>-->
												<!--<tr valign="middle" bgcolor="lightgreen">-->													
													<td>
														<!--<table align="center" border="0">
															<tr>
																<td width="75" colspan="2">
																	<input id="input_button_btp" onclick="javascript:back_to_prestep();" value="回上一列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:75px;">
																</td>
																<td width="75" colspan="2">
																	<input id="input_button_recal" onclick="javascript:if(confirm('確定重新計算?')){recalculating();};" value="重新計算" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:75px;">
																</td>																
																<td width="35">
																	&nbsp;																		
																</td>
															</tr>																																															
														</table>-->
														
													</td>
												<!--</tr>-->
												<!--<tr bgcolor="">-->
													<td>
														<hr size="1" width="100%">
													</td>
												<!--</tr>-->
											</tbody>
										</table><br>
										

<script type="text/javascript">
var obj_text = null;
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
var global_calrowindex = -1;
var global_calrowindex2 = -1;
var flag_calrowindex = -1;
var isDotMode = false;
var back_c = 0; //AT 使用

clearResponse();
initialized();
function clearResponse(){
	document.getElementById('input_hidden_response').value = '';
	document.getElementById('input_hidden_response2').value = '';
}
function initialized(){	
	
	//初始化變數值
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
	global_calrowindex = -1;
	global_calrowindex2 = -1;
	isDotMode = false;
	back_c = 0; //AT 使用
	
	//算式選項
	for(var i=0;i<4;i++){
		document.getElementById('input_radio_equation_'+ (i+1)).disabled = '';
		document.getElementById('input_radio_equation_'+ (i+1)).checked = false;
	}	
	
	//回上一列按鈕
	document.getElementById('input_button_btp').disabled = 'true';
	//重新計算按鈕
	document.getElementById('input_button_recal').disabled = 'true';
	
	//算式確定按鈕
	document.getElementById('input_button_confirm_equation').disabled = '';
	document.getElementById('input_button_confirm_equation').style.visibility = 'hidden';
	for(var i=0;i<8;i++){
		var btn = document.getElementById('input_button_finishing_'+ (i+1));
		if(btn != null){
			btn.style.visibility = 'hidden';
		}
	}
	
	//被加,減,乘,除數與加,減,乘,除數確定按鈕
	document.getElementById('input_button_equation').disabled = '';
	
	//除法圖片
	document.getElementById('div_operator').innerHTML = '&nbsp;';
	
	//答案送出鈕
	document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
	//結束按鈕
	for(var i=0;i<8;i++){
		var btn = document.getElementById('input_button_finishing2_'+ (i+1));
		if(btn != null){
			btn.style.visibility = 'hidden';
		}
	}
	
	//加減乘分隔線
	for(var i=0;i<4;i++){		
		var img_line = document.getElementById('img_line_'+ (i+1));
		if(img_line != null){
			img_line.style.visibility = 'hidden';
		}		
	}
	
	//除法分隔線
	for(var i=0;i<10;i++){		
		var img_divisionline = document.getElementById('img_divisionline_'+ (i+1));
		if(img_divisionline != null){
			img_divisionline.style.visibility = 'hidden';
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
	
	//去除 日時分
	document.getElementById('cel_0_11').innerHTML = '&nbsp;'
	document.getElementById('cel_0_17').innerHTML = '&nbsp;'
	document.getElementById('cel_0_15').innerHTML = '&nbsp;';
	document.getElementById('cel_0_23').innerHTML = '&nbsp;';
	
	
}
function selectingEquation(type, operator){
	switch(type){
		case '1':
			global_caltype = 1;
			
			//document.getElementById('span_operator').innerHTML = operator;
			//document.getElementById('img_2').style.visibility = 'visible';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';
			
			document.getElementById('img_line_1').style.visibility = 'hidden';
			document.getElementById('img_divisionline_1').style.visibility = 'visible';			
			//document.getElementById('img_2').style.visibility = 'visible';
			//document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			//document.getElementById('input_button_finishing_4').style.visibility = 'visible';			
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '日';
			document.getElementById('cel_0_19').innerHTML = '時';
			
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							//input_text.style.visibility = 'visible';
						}
						//if(i>0 && i<=2 && j>=0 && j<=9){
						if(i==1 && j<10){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
			
			//document.getElementById('button_finishing_step1OfEquation123').style.visibility = 'hidden';
			//document.getElementById('button_finishing_step1OfEquation4').style.visibility = 'visible';
			
		break;
		case '2':
			global_caltype = 2;			
			
			//document.getElementById('span_operator').innerHTML = operator;
			//document.getElementById('img_2').style.visibility = 'visible';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';
			
			document.getElementById('img_line_1').style.visibility = 'hidden';
			document.getElementById('img_divisionline_1').style.visibility = 'visible';			
			//document.getElementById('img_2').style.visibility = 'visible';
			//document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			//document.getElementById('input_button_finishing_4').style.visibility = 'visible';			
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '時';
			document.getElementById('cel_0_19').innerHTML = '分';
			
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							//input_text.style.visibility = 'visible';
						}
						//if(i>0 && i<=2 && j>=0 && j<=9){
						if(i==1 && j<10){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
			
			//document.getElementById('button_finishing_step1OfEquation123').style.visibility = 'hidden';
			//document.getElementById('button_finishing_step1OfEquation4').style.visibility = 'visible';
			
			
		break;
		case '3':
			global_caltype = 3;			
			
			//document.getElementById('span_operator').innerHTML = operator;
			//document.getElementById('img_2').style.visibility = 'visible';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';
			
			document.getElementById('img_line_1').style.visibility = 'hidden';
			document.getElementById('img_divisionline_1').style.visibility = 'visible';			
			//document.getElementById('img_2').style.visibility = 'visible';
			//document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			//document.getElementById('input_button_finishing_4').style.visibility = 'visible';			
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
							//input_text.style.visibility = 'visible';
						}
						//if(i>0 && i<=2 && j>=0 && j<=9){
						if(i==1 && j<12){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
			
			//document.getElementById('button_finishing_step1OfEquation123').style.visibility = 'hidden';
			//document.getElementById('button_finishing_step1OfEquation4').style.visibility = 'visible';
			
		break;
		case '4':
			global_caltype = 4;
			//document.getElementById('span_operator').innerHTML = operator;
			//document.getElementById('img_2').style.visibility = 'visible';
			document.getElementById('div_operator').innerHTML = '<img id="img_2" border="0" src="images/line2.gif">';
			
			document.getElementById('img_line_1').style.visibility = 'hidden';
			document.getElementById('img_divisionline_1').style.visibility = 'visible';			
			//document.getElementById('img_2').style.visibility = 'visible';
			//document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			//document.getElementById('input_button_finishing_4').style.visibility = 'visible';			
			document.getElementById('cel_0_11').innerHTML = '&nbsp;'
			document.getElementById('cel_0_17').innerHTML = '&nbsp;'
			document.getElementById('cel_0_15').innerHTML = '日';
			document.getElementById('cel_0_19').innerHTML = '時';
			
			
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);
					if(input_text != null){
						if(i<2 && j<13){
							input_text.style.visibility = 'hidden';
						}
						if(i==0 && j>=5){
							//input_text.style.visibility = 'visible';
						}
						//if(i>0 && i<=2 && j>=0 && j<=9){
						if(i==1 && j<10){
							input_text.style.visibility = 'visible';							
						}
					}
				}
			}			
			
			//document.getElementById('button_finishing_step1OfEquation123').style.visibility = 'hidden';
			//document.getElementById('button_finishing_step1OfEquation4').style.visibility = 'visible';
		
		break;
		default:
		
			
		break;
	}
	
}
function finishedEquationSelection(e){
	if(global_caltype == 0){
		alert('請選擇算式.');
		return;
	}
	if(confirm('按確定後，不能再更改算式，確定選擇的算式?')){
		for(var i=0;i<4;i++){
			document.getElementById('input_radio_equation_'+ (i+1)).disabled = 'true';
		}
		switch(global_caltype){
			case 1:
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
			case 2:
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
			case 3:
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
				//document.getElementById('input_button_finishing_1').disabled = '';
				//document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				//document.getElementById('input_button_finishing_1').value = '確定';
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
	//obj_text.value = '';
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
	//document.getElementById('input_hidden_response').value = get_responses();
}
function delNumber(){
	if(obj_text != null){
		//obj_text.style.backgroundColor = '#FFFFFF';
		obj_text.value = '';
		obj_text.style.backgroundColor = '#FFFF00';
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
			break;
			case 2:
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
			break;
			case 3:
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
			break;
			default:
			break;
		}		
	}
	//alert(global_calrowindex);
	document.getElementById('input_hidden_response').value = get_responses();
	//alert(document.getElementById('input_hidden_response').value);
}
function inputDot(dot){
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
function confirm_equation(btn){
	//alert('confirm_equation.');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	switch(global_caltype){
		case 1:
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
				document.getElementById('img_divisionline_3').style.visibility = 'visible';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
		break;
		case 2:
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
				document.getElementById('img_divisionline_3').style.visibility = 'visible';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
				global_calrowindex = 0;
				obj_text = null;
				//document.getElementById('input_hidden_response').value = get_responses();
			}
			
		break;
		case 3:
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
				document.getElementById('img_divisionline_3').style.visibility = 'visible';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
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
				document.getElementById('img_divisionline_3').style.visibility = 'visible';
				document.getElementById('input_button_finishing_1').disabled = '';
				document.getElementById('input_button_finishing_1').style.visibility = 'visible';
				document.getElementById('input_button_finishing2_1').disabled = '';
				document.getElementById('input_button_finishing2_1').style.visibility = 'visible';
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
function finishing_1(btn){
	//alert('finishing_1');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 1;
	global_calrowindex2 = 1;
	isDotMode = false;
	switch(global_caltype){
		case 1:
			document.getElementById('img_divisionline_3').style.visibility = 'visible';
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
			back_c = 0; //AT 
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
			
		break;
		case 2:
			document.getElementById('img_divisionline_3').style.visibility = 'visible';
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
			back_c = 0; //AT 
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 3:
			document.getElementById('img_divisionline_3').style.visibility = 'visible';
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
			back_c = 0; //AT 
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'visible';
		break;
		case 4:
			document.getElementById('img_divisionline_3').style.visibility = 'visible';
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
			back_c = 0; //AT 
			document.getElementById('input_button_finishing_1').disabled = '';
			document.getElementById('input_button_finishing_1').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_1').disabled = '';
			document.getElementById('input_button_finishing2_1').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'visible';
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
function finishing2_1(btn){
	//alert('finishing2_1');
	//return;	
	var global_caltype_at = 4; //AT 讓此版只有除法
	switch(global_caltype_at){
		case 4:
			global_calrowindex = 1;
			global_calrowindex2 = 1;
			isDotMode = true;	
			document.getElementById('img_divisionline_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_2').disabled = '';
			document.getElementById('input_button_finishing_2').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'visible';
			
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_2(btn){ //處理 第二個結束按鈕
	//alert('finishing2_2');
	global_calrowindex = 2;
	global_calrowindex2 = 2;
	isDotMode = true;
	var global_caltype_at = 4; //AT 讓所有的模式已除法處理
	switch(global_caltype_at){
		case 1:
			document.getElementById('img_line_2').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_2').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_2').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
			if(confirm('確定結束? 按結束將送出答案.')){				
				upload_responses();
			}
			/*
			document.getElementById('img_divisionline_4').style.visibility = 'visible';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 4 && j>=5){
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
			document.getElementById('input_button_finishing2_2').disabled = '';
			document.getElementById('input_button_finishing2_2').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			*/
		break;
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing_3(btn){
	//alert('finishing_3');
	//return;
	if(obj_text != null){
		obj_text.style.backgroundColor = '#FFFFFF';
	}
	global_calrowindex = 3;
	global_calrowindex2 = 3;
	isDotMode = false;
	var global_caltype_at = 4;
	switch(global_caltype_at){
		case 1:
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';		
		break;
		case 4:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_5').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_3').disabled = '';
			document.getElementById('input_button_finishing_3').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'visible';			
			
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_3(btn){
	//alert('finishing2_3');
	global_calrowindex = 3;
	global_calrowindex2 = 3;
	isDotMode = true;
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:
			document.getElementById('img_line_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_3').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
			document.getElementById('img_divisionline_5').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_3').disabled = '';
			document.getElementById('input_button_finishing2_3').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.visibility = 'visible';			
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.visibility = 'visible';			
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			//btn.style.visibility = 'hidden';
			document.getElementById('img_line_4').style.visibility = 'visible';			
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_4').disabled = '';
			document.getElementById('input_button_finishing_4').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'visible';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'visible';			
			
		break;
		default:
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
}
function finishing2_4(btn){
	//alert('finishing2_4');
	global_calrowindex = 4;
	global_calrowindex2 = 4;
	isDotMode = true;
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:
			document.getElementById('img_line_4').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 2:
			document.getElementById('img_line_4').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 3:
			document.getElementById('img_line_4').style.visibility = 'visible';
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
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
	
		break;
		case 4:
			if(confirm('確定結束? 按結束將送出答案.')){				
				upload_responses();
			}
			/*
			document.getElementById('img_divisionline_6').style.visibility = 'visible';
			for(var i=0;i<11;i++){
				for(var j=0;j<13;j++){
					var text_id = 'input_text_r_'+ (i+1)+ '_'+ (j+1);
					var input_text = document.getElementById(text_id);	
					if(input_text != null){
						if(i == 0 && j>=5){
							input_text.disabled = '';
							input_text.style.visibility = 'visible';
						}
						else if(i == 6 && j>=5 && j<=13){
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
			document.getElementById('input_button_finishing2_4').disabled = '';
			document.getElementById('input_button_finishing2_4').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			*/
		break;
		default:			
		break;
	}
	document.getElementById('input_hidden_response').value = get_responses();
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_7').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_5').disabled = '';
			document.getElementById('input_button_finishing2_5').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'visible';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_7').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_5').disabled = '';
			document.getElementById('input_button_finishing_5').style.visibility = 'hidden';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';				
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'visible';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			if(confirm('確定結束? 按結束將送出答案.')){				
				upload_responses();
			}
			/*
			document.getElementById('img_divisionline_8').style.visibility = 'visible';
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
						else{
							input_text.disabled = 'true';
							input_text.style.backgroundColor = 'white';
						}
					}
				}
			}
			document.getElementById('input_button_finishing_6').disabled = '';
			document.getElementById('input_button_finishing_6').style.visibility = 'hidden';
			document.getElementById('input_button_finishing2_6').disabled = '';
			document.getElementById('input_button_finishing2_6').style.visibility = 'hidden';
			document.getElementById('input_button_upload_response').style.visibility = 'visible';
			*/
		break;
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_9').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_7').disabled = '';
			document.getElementById('input_button_finishing_7').style.visibility = 'hidden';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_9').style.visibility = 'visible';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:			
			//btn.style.visibility = 'hidden';
			document.getElementById('img_divisionline_10').style.visibility = 'visible';
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
			back_c = 0; //AT
			document.getElementById('input_button_finishing_8').disabled = '';
			document.getElementById('input_button_finishing_8').style.visibility = 'hidden';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
		break;
		case 2:			
		break;
		case 3:				
		break;
		case 4:
			document.getElementById('img_divisionline_10').style.visibility = 'visible';
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
	var global_caltype_at = 4; //AT 讓所有都走除法運算
	switch(global_caltype_at){
		case 1:			
			var variable_1 = '';
			for(var i=global_calrowindex;i<(global_calrowindex+1);i++){
				for(var j=0;j<10;j++){
					var text_id = 'input_text_r_'+ (i+3)+ '_'+ (j+1);
					var span_id = 'span_r_'+ (i+3)+ '_'+ (j+1);
					//alert(text_id);
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
			//alert(document.getElementById('input_hidden_response').value.length);
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案
			//alert(document.getElementById('input_hidden_response').value.length);
			var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
			//alert(document.getElementById('input_hidden_response').value.substr(0,back_st_3));
			var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
			back_c = 1; //AT 
			//alert(get_responses());
			
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案 end
				
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			//alert(variable_1);
			//document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R'; //原本算式
			//document.getElementById('input_hidden_response').value = '';
			document.getElementById('input_hidden_response').value = stu_st_anw; //007 對應AT 改動
			//alert("blac_c 3 = " + document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
		break;
		case 2:			
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
			
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案
			
				var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
				//alert(document.getElementById('input_hidden_response').value.substr(0,back_st_3));
				var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
				back_c = 1; //AT 
			
			
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案 end
			
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			//document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R'; //原本算式
			document.getElementById('input_hidden_response').value = stu_st_anw; //007 對應AT 改動
			//alert(document.getElementById('input_hidden_response').value);
			//alert('B;'+variable_1+';'+variable_2+';'+variable_3);
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
			
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案
			var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
			//alert(document.getElementById('input_hidden_response').value.substr(0,back_st_3));
			var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
			back_c = 1; //AT 
			//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案 end
				
			
			//var data = document.getElementById('input_hidden_response').value;			
			//data = data.replace(variable_1+'R',variable_1);
			//data = data.replace(variable_1,variable_1+'R');
			//document.getElementById('input_hidden_response').value = data;
			//document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R'; //原本算式
			document.getElementById('input_hidden_response').value = stu_st_anw; //007 對應AT 改動
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
				//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案
				var back_st_4 = document.getElementById('input_hidden_response').value.length - 11; 
				//alert(document.getElementById('input_hidden_response').value.substr(0,back_st_4));
				var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_4);
				back_c = 1; //AT 
				//007 新加 為了配合 AT 使用 去除 R 的部分 直接覆蓋 學生輸入錯的答案 end
				
				//String.substr( document.getElementById('input_hidden_response').value , Length )
				//var data = document.getElementById('input_hidden_response').value;
				//data = data.replace(variable_1+'R',variable_1);
				//data = data.replace(variable_1,variable_1+'R');
				//document.getElementById('input_hidden_response').value = data;				
				//document.getElementById('input_hidden_response').value = document.getElementById('input_hidden_response').value+ ';'+ variable_1+ 'R'; //原本算式
				document.getElementById('input_hidden_response').value = stu_st_anw ; //007 為了對應AT 所改
			}
		break;
		default:
		break;
	}
	//alert(global_caltype);
	//alert(global_calrowindex);
	switch(global_caltype_at){		
		case 4:
			//alert(global_calrowindex);
			if(global_calrowindex == 0){				
			}			
			else if(global_calrowindex >= 1){
				//alert(global_calrowindex);
				document.getElementById('img_divisionline_'+ (global_calrowindex+2)).style.visibility = 'hidden';
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
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_upload_response').style.visibility = 'visible';
			}
			//global_calrowindex--;					
			
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
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_upload_response').style.visibility = 'visible';
			}			
			else if(global_calrowindex > 1){
				//alert(global_calrowindex);				
				document.getElementById('img_line_'+ global_calrowindex).style.visibility = 'hidden';
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
					document.getElementById('input_button_finishing2_'+ (i+1)).disabled = '';
					document.getElementById('input_button_finishing2_'+ (i+1)).style.visibility = 'hidden';
				}
				document.getElementById('input_button_finishing_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).disabled = '';
				document.getElementById('input_button_finishing2_'+ global_calrowindex).style.visibility = 'visible';
				document.getElementById('input_button_upload_response').style.visibility = 'visible';
			}
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
function recalculating(){
	//if(global_calrowindex > -1){
		//document.getElementById('input_hidden_response2').value += ';'+ get_responses2()+ ';O'; //原本的
		document.getElementById('input_hidden_response2').value = '';
		initialized();
	//}	
}
function upload_responses(){
	//alert(get_responses2());
	var responses = '';
	var Semantic=document.getElementById('math_Semantic').value; //AT 語意部份
	var stu_answer ='';//AT 學生作答
	
	if(document.getElementById('input_hidden_response2').value == ''){
		responses = get_responses2();
	}
	else{
		var data = document.getElementById('input_hidden_response2').value;
		data = data.substr(1,data.length-1);
		responses = data+ ';'+ get_responses2();
	}
	
	var index_array = new Array();
	var counter = 0;
	//alert(responses);
	if(responses == 0){ //AT 對應 判斷如沒有直式作答 但可發問的情況 
		responses = "|"+Semantic;
		stu_answer = document.getElementById("latex_as").value;
		stu_answer = stu_answer+"\n"+"*學生發問："+Semantic.replace(/\s+/g, "");
		document.getElementById("latex_as").value=stu_answer;
		document.getElementById('input_hidden_response').value = responses;
	}else{ //原本情況 
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
		//alert(answer_index);
		//AT 回答記錄
		stu_answer = document.getElementById("latex_as").value;
		stu_answer = stu_answer+"\n"+"*"+"學生回答:"+"直式作答"+"\n"+"*學生發問："+Semantic.replace(/\s+/g, "");
		document.getElementById("latex_as").value=stu_answer;
		//AT 回答記錄 end 
		
		responses2 = responses + "|" +Semantic; //加上 存語意 AT 專用
		document.getElementById('input_hidden_response').value = responses2;
		//alert(document.getElementById('input_hidden_response').value);
		//alert(document.forms[1].id);
		//alert(document.forms['form_draw'].id);
	
	} 
	
	
	document.forms['form_draw'].submit();
	//var responses = document.getElementById('input_hidden_response2').value;
	//responses = responses.substr(1,responses.length-1);
	//alert(responses);
}
function get_responses2(){
	var responses = '';
	switch(global_caltype){
		case 1:
			//除法-日時
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
				responses = 'A;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'A;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
		case 2:
			//除法-時分
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
				responses = 'B;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'B;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
				return responses;
			}
		break;
		case 3:
			//除法-分秒
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
				responses = 'C;'+ variable_2+ ';'+ variable_3+ ';'+ variable_1;
				return responses;
			}
			else{
				responses = 'C;'+ variable_2+ ';'+ variable_3+ ';'+ document.getElementById('input_hidden_response').value+ ';'+ variable_1;
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
		default:
		break;
	}	
	
	return 0;
	//document.getElementById('input_hidden_response2').value += ';'+ responses;
	//alert(get_response());get_
	//alert(responses);
	
	//window.location.href = 'answer.php';
	//document.forms['notes'].submit();
}
function get_responses(){
	//alert(global_calrowindex);
	var responses = '';
	if(global_calrowindex > -1){
		var global_caltype_at = 4; //AT 
		switch(global_caltype_at){
			case 1:
				//AT 修改 回上一列 
				//alert(back_c);
				if(back_c == 1){
					//alert("blac_c 5 = " + document.getElementById('input_hidden_response').value.length);
					var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
					//alert("blac_c = " + document.getElementById('input_hidden_response').value.substr(0,back_st_3));
					var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
					document.getElementById('input_hidden_response').value = stu_st_anw;
					//alert("blac_c 4 = " + document.getElementById('input_hidden_response').value);
					back_c = 0;
				}
				//AT 修改 回上一列 end 
				
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
			case 2:
				//AT 修改 回上一列 
				//alert(back_c);
				if(back_c == 1){
					//alert("blac_c 5 = " + document.getElementById('input_hidden_response').value.length);
					var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
					//alert("blac_c = " + document.getElementById('input_hidden_response').value.substr(0,back_st_3));
					var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
					document.getElementById('input_hidden_response').value = stu_st_anw;
					//alert("blac_c 4 = " + document.getElementById('input_hidden_response').value);
					back_c = 0;
				}
				//AT 修改 回上一列 end 
				
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
			case 3:				
				//AT 修改 回上一列 
				//alert(back_c);
				if(back_c == 1){
					//alert("blac_c 5 = " + document.getElementById('input_hidden_response').value.length);
					var back_st_3 = document.getElementById('input_hidden_response').value.length - 13; 
					//alert("blac_c = " + document.getElementById('input_hidden_response').value.substr(0,back_st_3));
					var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
					document.getElementById('input_hidden_response').value = stu_st_anw;
					//alert("blac_c 4 = " + document.getElementById('input_hidden_response').value);
					back_c = 0;
				}
				//AT 修改 回上一列 end 
				
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
				//alert(back_c);
				if(back_c == 1){
					//alert("blac_c 5 = " + document.getElementById('input_hidden_response').value.length);
					var back_st_3 = document.getElementById('input_hidden_response').value.length - 11; 
					//alert("blac_c = " + document.getElementById('input_hidden_response').value.substr(0,back_st_3));
					var stu_st_anw = document.getElementById('input_hidden_response').value.substr(0,back_st_3);
					document.getElementById('input_hidden_response').value = stu_st_anw;
					//alert("blac_c 4 = " + document.getElementById('input_hidden_response').value);
					back_c = 0;
				}
				//AT 修改 回上一列 end
				
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
	//alert("blac_c 2 = " + responses);
	return responses;
	
}
function get_rowdata_caltype1(calrowindex){
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
function get_rowdata_caltype2(calrowindex){
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
function get_rowdata_caltype3(calrowindex){	
	var rowdata = (calrowindex+1)+ ',';
	for(var j=0;j<10;j++){
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
function get_rowdata_caltype4(calrowindex){
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

</script>