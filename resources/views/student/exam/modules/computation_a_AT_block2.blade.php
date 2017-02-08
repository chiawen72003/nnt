  <!--<link href="include/mathquill.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="include/mathquill.min.js"></script>-->
  <link href="include/dialog.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
  * html{
  margin:0;
  padding:0;
  }
  #page{
  font-family:Arial,Helvetica,sans-serif;
  font-size:11px;
  color:#333333;
  }
  form{
  margin:0;
  padding:0;
  }
  #latexeditor{
  width:100%;
  float:left;
  margin:0px auto;
  }
  #latexCode,#latexCodeWrapper{
  color:#333;
  background-color:#fff;
  font-family:Ariel,Helvetica,sans-serif;
  font-size:12px;
  }
  #latexCodeWrapper{
  margin:0;
  padding:0;
  border:1px dotted #c0c0ff;
  text-align:right;
  }
  #latexCode{
  width:98%;
  border:0;
  color:#990000;
  }
  #toolbarArea{
  padding:2px;
  background-color:#e0e0e0;
  border:1px solid #999;
  border-top:0;
  clear:both;
  }
  #toolbarArea a img{
  border:0;
  margin:2px;
  }
  #toolbarArea a{
  background-color:#ffffff;
  margin:1px;
  padding:1px;
  border:1px solid #999999;
  display:block;
  float:left;
  }
  #toolbarArea a.tbiconsplit{
  background-color:#e0e0e0;
  border:1px solid #e0e0e0;
  border-right:1px solid #ccc;
  margin-right:4px;
  }
  #toolbarArea a:hover{
  border:1px solid red;
  }
  #toolbarArea a.tbiconsplit:hover{
  border:1px solid #e0e0e0;
  }
  #Tabs a{
  height:18px;
  padding:1px 3px 1 3px;
  margin:0;
  color:#666;
  cursor:pointer;
  border 1px solid #fff;
  }
  #Tabs a.activeMenuItem{
  border-left:1px solid #000;
  border-top:1px solid #000;
  border-right:1px solid #000;
  border-bottom:1px solid #e0e0e0;
  background-color:#e0e0e0;
  cursor:pointer;
  color:#000;
  }
  #Tabs a.inactiveMenuItem{
  color:#666666;
  cursor:pointer;
  }
  .tbicon{
  width:1px;
  height:1px;
  background-image:url(http://www.sitmo.com/gg/latex/img/spacer.gif);
  padding:0;
  margin:0;
  float:left;
  }
  #latexImageWrapper{
  padding:8px;
  border:2px solid #000066;
  background-color:#fff;
  }
  .wrap1,.wrap2,.wrap3{
  display:inline-table;
  display:block;
  }
  .wrap0{width:150px;float:right;}
  .wrap1{background:url(http://www.sitmo.com/gg/latex/img/shadow.gif) right bottom no-repeat;}
  .wrap2{background:url(http://www.sitmo.com/gg/latex/img/corner_bl.gif) -12px 100% no-repeat;}
  .wrap3{
  padding:0 9px 9px 0;
  background:url(http://www.sitmo.com/gg/latex/img/corner_tr.gif) 100% -12px no-repeat;}</style>		
  														<div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; visibility: hidden;">
  															<div id='latexCodeWrapper'>
  																<textarea name="latex_Code" id="latex_Code"></textarea>
  																
  																<!--傳給inputMadTestItemStuAns.php用↓-->
  																<textarea name="latexCode" id="latexCode"></textarea>
  															</div>
  														</div>
  														<table align="left" >
  														
  															<tr>
  																<td >
  																	<!--<font size = "6" color="#000000" style="font-family:標楷體;" >作答請用下方的功能選單</font>-->
  																	<textarea name="latex_Code1" id="latex_Code1" style="height:30px;width:30px;visibility:hidden;display:none;"></textarea>
  																<!--<br>-->
  																
  																<div id="math_box" align ="left" >
  																<!--橫式算式:<br>-->
  																
  																<!--style="border-style:none;" -->
                                 
  																	<table align="left" >
                                 
                                    <tr >
                                    
                                    <td>
                                    <div  style="background-color:#FFFFFF;" ">
                                       <tr>
                                     算式輸入區：<br>
                                    </tr>
                                      <span id="math_textarea" onclick="javascript:get_math(this);" style="height:75px;width:440px;border:3px #00C700 solid;" ></span>                             
                                    </div>
                                  <br>
@if($cs_id == '019021106' OR $cs_id == '019080101' )
<div align ="left" style="width:300;" style="display:block" >
發問區：
<textarea name="math_semantic" id="math_semantic" style="height:75px;width:450px;resize:none;border:3px #00C700 solid;-color:#9999FF;" ></textarea>
</div>    
@else
<div align ="left" style="width:300;display:none;" >
發問區：
<textarea name="math_semantic" id="math_semantic" style="height:75px;width:450px;resize:none;border:3px #00C700 solid;-color:#9999FF;" ></textarea>
</div>	
@endif	
    																   	       	
                                    </td> 
                                    <td>   
                                     
                                    </td> 
                                    </tr> 
                                   
                                    </table>
                                     <table><tr > </tr></table>
                                    
                                    <table align="left" >
                                     <tr>
                                     <div align="left" >
        																<!--<center>-->
        																	<input id="input_button_upload_response" type="IMAGE" value="回答" src="./images/take.png" name="upload" class="butn01" type="button" style="height:75px;width:200px;" onclick="javascript:upload_responses();">
        																	<input type="hidden" id="input_hidden_response" name="input_hidden_response"></input>
        																	<input type="hidden" id="input_hidden_response2" name="input_hidden_response2"></input>
        																	<input type="hidden" id="input_hidden_shortresponse" name="input_hidden_shortresponse"></input>
        																	<input type="hidden" id="input_hidden_shortresponse2" name="input_hidden_shortresponse2"></input>
        																	<input type="hidden" id="input_hidden_stu_answer" name="input_hidden_stu_answer"></input>
        																	<!--<a href="modules.php?op=main" target="_blank"><span>回到首頁</span></a>-->
        																	<!--<a href="http://120.108.208.83/bnat_test/modules.php?op=modload&name=MultipleAssessmentDesign&file=queryStuAns" target="_blank"><span>測驗查詢</span></a>-->
        																	<!--<input type="button" value="回到首頁" id="submit_main" onclick="location.href='http://210.240.193.249/bnat/modules.php?op=main'">
        																	<input type="button" value="測驗查詢" id="submit_result" onclick="location.href='http://210.240.193.249/bnat/modules.php?op=modload&name=MultipleAssessmentDesign&file=queryStuAns'">-->
        																	
        																<!--</center>-->   
        															</div>
                                    </tr>
                                    </table>
                                     <br>
                                      <!--嘗試-->
                                         </td>
                                         <td valign="top" > 
                                              <table HEIGHT=18><tr ><p</p></tr></table>
                                    
                                            <table align="lef" bgcolor="#FFFF99">
                                            
        																			<tr>
        																				<td width="50" style="display:none;">
        																					<!--<font face="標楷體" size="2"align="center"><u><b>常用符號</b></u></font>-->
        																				</td>
        																				<td>
        																					<!--<font face="標楷體" size="2"align="center"><u><b>常用單位</b></u></font> -->
        																				</td style="display:none;">
    																					
        																			</tr>
        																			<tr>															
        																				<td align="left">																
        																					  <table border="0"bgcolor="#FFFF99" style="width:530px;">
                                         <tr>
                                         <td>
                                              <table border="1"bgcolor="#FFFF99" align="left">
            																		<tr >
            																			<td width="50">
            																				<input id="input_button_number_1" onclick="javascript:inputNumber('1');" value="1" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;" >
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_2" onclick="javascript:inputNumber('2');" value="2" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_3" onclick="javascript:inputNumber('3');" value="3" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_4" onclick="javascript:inputNumber('4');" value="4" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_5" onclick="javascript:inputNumber('5');" value="5" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
                                                    
            																		</tr >
            																		<tr>
            																			<td width="50">
            																				<input id="input_button_number_6" onclick="javascript:inputNumber('6');" value="6" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_7" onclick="javascript:inputNumber('7');" value="7" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_8" onclick="javascript:inputNumber('8');" value="8" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_9" onclick="javascript:inputNumber('9');" value="9" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_number_0" onclick="javascript:inputNumber('0');" value="0" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																		</tr>
            																		<tr >
            																			<td width="50">
            																				<input id="input_button_point" onclick="javascript:inputDot('.');" value="." name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50" style="display:none;">
            																				<input id="input_button_zero2" onclick="javascript:inputNumber('Ø');" value="Ø" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_threepoint" onclick="javascript:inputNumber('、、、');" value="餘" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50" style="width:35px;display:none;">
            																				<input id="input_button_delete" onclick="javascript:delNumber();" value="←" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50" style="display:none;">
            																				&nbsp;
            																			</td>
            																		</tr>	
            																		<tr bgcolor="#FFFF99">
            																			<td colspan="5"><!--<font face="標楷體" size="3"><u><b><center>符號</center></b></u></font>--></td>
            																		 </tr>
            																		 <tr >
            																			<td width="50">
            																				<input id="input_button_add" onclick="javascript:inputNumber('+');" value="+" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;bold;font-size:20px;">
            																			</td>
            																			<td width="50">                                                                                                                                
            																				<input id="input_button_sub" onclick="javascript:inputNumber('-');" value="-" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_times" onclick="javascript:inputNumber('×');" value="×" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_division" onclick="javascript:inputNumber('÷');" value="÷" name="alex" type="button" style="width:50px;font-family:標楷體;font-weight:bold;bold;font-size:20px;">
            																			</td>
            																			<td width="50">
            																				<input id="input_button_equal" onclick="javascript:inputNumber('=');" value="=" name="alex" type="button" style="width:50px;font-weight:bold;font-size:20px;">
            																			</td>
            																			<td width="50" style="width:35px;display:none;" >
            																				<input id="input_button_null" onclick="javascript:inputNumber('☐');" value="☐" name="alex" type="button" style="width:50px;font-family:標楷體;">
            																			</td>
            																		</tr>
            																		   
            																	</table>
                                                  <table align="right">
        																						<tr>
        																							<td>	
        																								<input type="button"  onclick="javascript:insert_math('(')" style="background-image:url(include/image/Open_parenthesis.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>																		
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math(')')" style="background-image:url(include/image/Close_parenthesis.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('>')" style="background-image:url(include/image/is_more_than.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('<')" style="background-image:url(include/image/is_less_than.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('{/}ge')" style="background-image:url(include/image/ge.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >
        																							</td>
        																							<td>																				
        																								<input type="button"  onclick="javascript:insert_math('{/}le')" style="background-image:url(include/image/le.png);width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>																			
        																						</tr> 
                                                       		<tr>
                                                  <td>
                                                    <input type="button"  onclick="javascript:insert_math('{/}frac{}{}')" style="background-image:url(include/image/frac.png);background-size:30px 30px;width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;font-family:標楷體;" >
                                                  </td>
                                                  <td>																				
    																								<input type="button"  onclick="javascript:insert_math('公里')" style="background-image:url(include/image/km.png);background-size:30px 30px;width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;font-family:標楷體;font-size:20px;" >																				
    																							</td>
                                                  <td>
                                                  	<input type="button"  onclick="javascript:insert_math('公尺')" style="background-image:url(include/image/m.png);background-size:30px 30px;width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;font-family:標楷體;font-size:20px;" >																				
    																								</td><td>
                                                    <input type="button"  onclick="javascript:insert_math('公分')" style="background-image:url(include/image/cm.png);background-size:30px 30px;width:35px;height:39px;background-repeat:no-repeat;background-position:center;background-color:white;font-family:標楷體;font-size:20px;" >																				
    																							</td>
    																					
    																						</tr> 
        																						<!--
        																						<tr>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('{/}because')" style="background-image:url(include/image/because.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>		
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('{/}therefore')" style="background-image:url(include/image/therefore.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>																			
        																						</tr>
        																						-->
        																					</table>
                                                  <table align="right">
                                                  	<tr>
    																								<td >
    																									<input id="input_button_recal" onclick="javascript:if(confirm('確定重新計算?')){recalculating();};" value="全部清空" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:120px;font-family:標楷體;font-size:15px;">																
    																								</td>
    																								<td>
    																									<input id="input_button_btp" onclick="javascript:back_to_prestep();" value="回上一列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:110px;font-family:標楷體;font-size:15px;">																
    																									<input id="input_button_change" onclick="javascript:newline()" value="橫式換列" name="alex" type="button" class="groovybutton"  onMouseOver="javascript:goLite(this.form.name,this.id)" onMouseOut="javascript:goDim(this.form.name,this.id)" style="width:100px;font-family:標楷體;font-size:15px;">
    																								</td>																
    																							</tr>		
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  </table>
        																				</td>
        																				<td align="center" style="display:none;">																
        																					<!--<table>
        																						<tr>
        																							<td>																				
        																								<input type="button"  onclick="javascript:insert_math('包')" style="background-image:url(include/image/bale.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('個')" style="background-image:url(include/image/PCS.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('塊')" style="background-image:url(include/image/Block.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('周')" style="background-image:url(include/image/cycle.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
        																							</td>                                                                                                                     
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('顆')" style="background-image:url(include/image/Stars.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >
        																							</td>
        																							<td>
        																								<input type="button"  onclick="javascript:insert_math('條')" style="background-image:url(include/image/Strip.png);width:25px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >
        																							</td>		
        																						</tr>																		
        																					</table>-->
        																				</td>
        																			</tr>
        																			
        																			<tr style="display:none;">
        																				<td style="display:none;">
                                         </td>
                                         </tr>
                                         </table >
                                        
                                      
                                      																													
    																				<!--移除除法的1/2-->
                                            
    																					  <table>
                                                <!--<tr>
        																				<td>
        																					<font face="標楷體" size="3"align="center"><u><b>分數數學式</b></u></font>
        																				</td>
        																				<td>
        																					<font face="標楷體" size="3"align="center"><u><b>長度單位</b></u></font>
        																				</td>
    																					<td>
    																						<font face="標楷體" size="3"align="center"><u><b>時間單位</b></u></font>
    																					</td>
        																			</tr>-->
    																				
    																																										
    																					</table>
                                             
    																																				
    																					
    																				</td>
    																			</tr>
    																			
    																			<!--
    																			<tr>
    																				<td>
    																					<font face="標楷體" size="3"align="center"><u><b>重量單位</b></u></font>
    																				</td>
    																			</tr>
    																			<tr>
    																				<td align="left">																
    																					<table>
    																						<tr>
    																							<td>																				
    																								<input type="button"  onclick="javascript:insert_math('公斤')" style="background-image:url(include/image/kg.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																							<td>
    																								<input type="button"  onclick="javascript:insert_math('公克')" style="background-image:url(include/image/g.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																						</tr>
    																					</table>
    																				</td>	
    																			</tr>
    																			-->
    																			<!--
    																			<tr>
    																				<td>
    																					<font face="標楷體" size="3"align="center"><u><b>容積單位</b></u></font>
    																				</td>
    																			</tr>
    																			<tr>
    																				<td align="left">																
    																					<table>
    																						<tr>
    																							<td>																				
    																								<input type="button"  onclick="javascript:insert_math('公升')" style="background-image:url(include/image/liter.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																							<td>
    																								<input type="button"  onclick="javascript:insert_math('毫公升')" style="background-image:url(include/image/ml.png);width:34px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>																				
    																						</tr>																		
    																					</table>
    																				</td>
    																			</tr>
    																			-->
    																			
    																			<tr style="display:none;">
    																				
    																			</tr>
    																			<!--<tr>
    																				<td>
    																					<font face="標楷體" size="3"align="center"><u><b>清除</b></u></font>
    																				</td>
    																				<td>
    																					<font face="標楷體" size="3"align="center"><u><b>體積與面積單位</b></u></font>
    																				</td>
    																			</tr>-->
    																			<tr style="display:none;">
    																																	
    																					<td style="display:none;">
    																						
    																					</td>
    																				
    																				<td align="left">																
    																					<!--<table>
    																						<tr>
    																							<td>																				
    																								<input type="button"  onclick="javascript:insert_math('平方公尺')" style="background-image:url(include/image/m2.png);width:55px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																							<td>
    																								<input type="button"  onclick="javascript:insert_math('平方公分')" style="background-image:url(include/image/cm2.png);width:55px;height:28px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																							<!--
    																							<td>
    																								<input type="button"  onclick="javascript:insert_math('立方公尺')" style="background-image:url(include/image/m3.png);width:55px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>
    																							<td>
    																								<input type="button"  onclick="javascript:insert_math('立方公分')" style="background-image:url(include/image/cm3.png);width:55px;height:37px;background-repeat:no-repeat;background-position:center;background-color:white;" >																				
    																							</td>			
    																							-->
    																						<!--</tr>																		
    																					</table> -->
    																				</td>
    																			</tr>
    																			
    																			
    																			<tr>
    																				
    																			</tr>
    																	</table>
                                    <!--嘗試 end -->
  																	
  																</div>
  																</td>
                                  
                                  <td valign="top">
  														<div id ="latex_proxy" align ="right"  >
  																	
  																	<textarea name="latex_as" id="latex_as" style="resize:none;height:150px;width:300;display:none;" readonly="readonly" valign="top" ></textarea> 
  																
                                                      
  																	
  														</div>
  														
                                  </td>
  															</tr>
  														</table>
  														<!--<div id ="latex_proxy" align ="right" >
  																	
  																	<textarea name="latex_as" id="latex_as" style="resize:none;height:150px;width:30%;" readonly="readonly" ></textarea>
  																	<br>
  																	<center style="width:30%;">
  																	<font size = "6" color="#a52a2a" style="font-family:標楷體;" >我有問題想發問</font>
  																	</center>
  																	<br>
  																	<textarea name="math_Semantic" id="math_Semantic" style="resize:none;height:75px;width:30%;" ></textarea>
  														</div>-->
                            
  														<p>
  														
  														
  															
  
  														<!--
  														<div id="math_box">
  															<ul>	
  																<li>
  																	橫式算式:
  																</li>
  																<li>
  																-->
  																<!--style="border-style:none;" -->
  																<!--
  																	<span id="math_textarea" onclick="javascript:get_math(this);" ></span>
  																</li>
  															</ul>	
  														</div>
  														-->
  														</p>
  														<!--<br>
  														<br>
  														<br>
  														<br>
  														<br>-->														
  														<div style="overflow-x:hidden;overflow-y:auto;height:500px;display:none; " onkeydown="return false">
  														<table align="center" border="0" width="600px" cellpadding="0" cellspacing="0" id="div_1">
  															<tr>
  																<td>	
  																&nbsp;
  																</td>																
  																<td align="center">
  																	<table border="0" cellpadding="0" cellspacing="0">
  																		<tr id="row_0">
  																			<td id="cel_0_1" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_2" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_3" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_4" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_5" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_6" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_7" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_8" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_9" width="10">
  																				&nbsp;
  																			</td>																			
  																			<td id="cel_0_10" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_11" align="right" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_12" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_13" align="right" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_14" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_15" align="center" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_16" width="10">
  																				&nbsp;	
  																			</td>
  																			<td id="cel_0_17" align="right" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_18" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_19" align="right" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_20" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_21"align="center" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_22" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_23" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_24" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_25" width="30">
  																				&nbsp;
  																			</td>
  																			<td id="cel_0_26" width="100">
  																				&nbsp;
  																			</td>
  																		</tr>
  																		<tr id="row_1">
  																			<td id="cel_1_1" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_2" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_3" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_4" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_5" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_6" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_7" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_8" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_9" width="10">
  																				&nbsp;
  																			</td>																			
  																			<td id="cel_1_10" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="cel_1_11" align="right" width="30">
  																				<input id="input_text_r_1_6" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_12" width="10">
  																				<span id="span_r_1_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_13" align="right" width="30">
  																				<input id="input_text_r_1_7" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_14" width="10">
  																				<span id="span_r_1_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_15" align="right" width="30">
  																				<input id="input_text_r_1_8" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_16" width="10">
  																				<span id="span_r_1_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>	
  																			</td>
  																			<td id="cel_1_17" align="right" width="30">
  																				<input id="input_text_r_1_9" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_18" width="10">
  																				<span id="span_r_1_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_19" align="right" width="30">
  																				<input id="input_text_r_1_10" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_20" width="10">
  																				<span id="span_r_1_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_21" align="right" width="30">
  																				<input id="input_text_r_1_11" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_22"  width="10">
  																				<span id="span_r_1_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_23" align="right" width="30">
  																				<input id="input_text_r_1_12" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_24" width="10">
  																				<span id="span_r_1_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_1_25" align="right" width="30">
  																				<input id="input_text_r_1_13" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_1_26" width="100">
  																				&nbsp;
  																			</td>
  																		</tr>
  																		<!-- 除法長線1 !-->
  																		<tr id="row_2" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_1" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																	
  																	
  																		<tr id="row_4">
  																			<td id="cel_4_1" width="10">
  																				<input id="input_text_r_2_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_2" width="10">
  																				<span id="span_r_2_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_3" width="10">
  																				<input id="input_text_r_2_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_4" width="10">
  																				<span id="span_r_2_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_5" width="10">
  																				<input id="input_text_r_2_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_6" width="10">
  																				<span id="span_r_2_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_7" width="10">
  																				<input id="input_text_r_2_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_8" width="10">
  																				<span id="span_r_2_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_9" width="10">																				
  																				<input id="input_text_r_2_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_10" width="10">																				
  																				<div id="div_operator">																				
  																				</div>	
  																			</td>
  																			<td id="cel_4_11" align="right" width="30">
  																				<input id="input_text_r_2_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_4_12" width="10">
  																				<span id="span_r_2_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_13" align="right" width="30">
  																				<input id="input_text_r_2_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_14" width="10">
  																				<span id="span_r_2_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_15" align="right" width="30">
  																				<input id="input_text_r_2_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_16" width="10">
  																				<span id="span_r_2_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_17" align="right" width="30">
  																				<input id="input_text_r_2_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_4_18" width="10">
  																				<span id="span_r_2_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_4_19" align="right" width="30">
  																				<input id="input_text_r_2_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_20" width="10">
  																				<span id="span_r_2_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_21" align="right" width="30">
  																				<input id="input_text_r_2_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_22" width="10">	
  																				<span id="span_r_2_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_23" align="center" width="30">
  																				<input id="input_text_r_2_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_4_24" width="10">
  																				<span id="span_r_2_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_4_25" align="center" width="30">																			
  																				<input id="input_text_r_2_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>												
  																			<td id="cel_4_26" width="100">																				
  																				<input onclick="javascript:confirm_equation(this);" id="input_button_confirm_equation" type="button" value="確定"></input>
  																			</td>
  																		</tr>	
  																		<!-- 加減乘長線1 !-->
  																		<tr id="row_5" height="5">
  																			<td valign="bottom" colspan="22">																			
  																				<img id="img_line_1" src="images/line1-1.gif" border="0" width="100%">
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="100">																				
  																			</td>
  																		</tr>																		
  																		<!-- 除法長線2 !-->
  																		<tr id="row_6" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_2" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																		
  																		<tr id="row_7">
  																			<td id="cel_7_1" align="right" width="30">																			
  																				<input id="input_text_r_3_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_2" width="10">																				
  																				<span id="span_r_3_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>																				
  																			</td>
  																			<td id="cel_7_3" align="right" width="30">																				
  																				<input id="input_text_r_3_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_4" width="10">
  																				<span id="span_r_3_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_5" align="right" width="30">																				
  																				<input id="input_text_r_3_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_6" width="10">
  																				<span id="span_r_3_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_7" align="right" width="30">																				
  																				<input id="input_text_r_3_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_8" width="10">
  																				<span id="span_r_3_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_9" align="right" width="30">																				
  																				<input id="input_text_r_3_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_7_10" width="10">																				
  																				<span id="span_r_3_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>													
  																			</td>
  																			<td id="cel_7_11" align="right" width="30">
  																				<input id="input_text_r_3_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_12" width="10">
  																				<span id="span_r_3_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_13" align="right" width="30">
  																				<input id="input_text_r_3_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_14" width="10">
  																				<span id="span_r_3_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_15" align="right" width="30">
  																				<input id="input_text_r_3_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_16" width="10">
  																				<span id="span_r_3_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_17" align="right" width="30">
  																				<input id="input_text_r_3_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_18" width="10">
  																				<span id="span_r_3_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_19" align="right" width="30">
  																				<input id="input_text_r_3_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_20" width="10">
  																				<span id="span_r_3_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_21" align="right" width="30">
  																				<input id="input_text_r_3_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_22" width="10">
  																				<span id="span_r_3_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_23" align="right" width="30">
  																				<input id="input_text_r_3_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_24" width="10">
  																				<span id="span_r_3_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_7_25" align="right" width="30">
  																				<input id="input_text_r_3_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_7_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_1(this);" id="input_button_finishing_1" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線-->
  																						<td>
  																							<input onclick="javascript:finishing3_1(this);" id="input_button_finishing3_1" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_1(this);" id="input_button_finishing2_1" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>
  																			</td>
  																		</tr>			
  																		<!-- 除法長線3 !-->
  																		<tr id="row_8" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_3" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																	
  																		<tr id="row_9">
  																			<td id="cel_9_1" align="right" width="30">
  																				<input id="input_text_r_4_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_2" width="10">
  																				<span id="span_r_4_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_3" align="right" width="30">
  																				<input id="input_text_r_4_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_4" width="10">
  																				<span id="span_r_4_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_5" align="right" width="30">
  																				<input id="input_text_r_4_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_6" width="10">
  																				<span id="span_r_4_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_7" align="right" width="30">
  																				<input id="input_text_r_4_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_8" width="10">
  																				<span id="span_r_4_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_9" align="right" width="30">
  																				<input id="input_text_r_4_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_9_10" width="10">
  																				<span id="span_r_4_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_9_11" align="right" width="30">
  																				<input id="input_text_r_4_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_12" width="10">
  																				<span id="span_r_4_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_13" align="right" width="30">
  																				<input id="input_text_r_4_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_14" width="10">
  																				<span id="span_r_4_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>																			
  																			</td>
  																			<td id="cel_9_15" align="right" width="30">
  																				<input id="input_text_r_4_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_16" width="10">
  																				<span id="span_r_4_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_17" align="right" width="30">
  																				<input id="input_text_r_4_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_18" width="10">
  																				<span id="span_r_4_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_19" align="right" width="30">
  																				<input id="input_text_r_4_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_20" width="10">
  																				<span id="span_r_4_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_21" align="right" width="30">
  																				<input id="input_text_r_4_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_22" width="10">
  																				<span id="span_r_4_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_23" align="right" width="30">
  																				<input id="input_text_r_4_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_24" width="10">
  																				<span id="span_r_4_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_9_25" align="right" width="30">
  																				<input id="input_text_r_4_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_9_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_2(this);" id="input_button_finishing_2" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線2-->
  																						<td>
  																							<input onclick="javascript:finishing3_2(this);" id="input_button_finishing3_2" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_2(this);" id="input_button_finishing2_2" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>																		
  																		<!-- 加減乘長線2 !-->
  																		<tr id="row_10" height="5">																			
  																			<td valign="bottom" colspan="22">																		
  																				<img id="img_line_2" src="images/line1-1.gif" border="0" width="100%">
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="100">																				
  																			</td>
  																		</tr>
  																		<!-- 除法長線4 !-->
  																		<tr id="row_11" height="5">
  																			<td width="10">																			
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_4" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		<tr id="row_12">
  																			<td id="cel_12_1" align="right" width="30">
  																				<input id="input_text_r_5_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_2" width="10">
  																				<span id="span_r_5_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_3" align="right" width="30">
  																				<input id="input_text_r_5_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_4" width="10">
  																				<span id="span_r_5_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_5" align="right" width="30">
  																				<input id="input_text_r_5_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_6" width="10">
  																				<span id="span_r_5_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_7" align="right" width="30">
  																				<input id="input_text_r_5_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_8" width="10">
  																				<span id="span_r_5_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_9" align="right" width="30">
  																				<input id="input_text_r_5_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_12_10" width="10">
  																				<span id="span_r_5_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_12_11" align="right" width="30">
  																				<input id="input_text_r_5_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_12" width="10">
  																				<span id="span_r_5_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_13" align="right" width="30">
  																				<input id="input_text_r_5_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_14" width="10">
  																				<span id="span_r_5_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_15" align="right" width="30">
  																				<input id="input_text_r_5_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_16" width="10">
  																				<span id="span_r_5_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_17" align="right" width="30">
  																				<input id="input_text_r_5_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_18" width="10">
  																				<span id="span_r_5_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_19" align="right" width="30">
  																				<input id="input_text_r_5_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_20" width="10">
  																				<span id="span_r_5_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_21" align="right" width="30">
  																				<input id="input_text_r_5_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_22" width="10">
  																				<span id="span_r_5_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_23" align="right" width="30">
  																				<input id="input_text_r_5_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_24" width="10">
  																				<span id="span_r_5_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_12_25" align="right" width="30">
  																				<input id="input_text_r_5_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_12_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_3(this);" id="input_button_finishing_3" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線3-->
  																						<td>
  																							<input onclick="javascript:finishing3_3(this);" id="input_button_finishing3_3" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_3(this);" id="input_button_finishing2_3" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>		
  																		<!-- 加減乘長線3 !-->
  																		<tr id="row_13" height="5">																			
  																			<td valign="bottom" colspan="22">																	
  																				<img id="img_line_3" src="images/line1-1.gif" border="0" width="100%">
  																			</td>
  																			<td width="10">																			
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="100">																				
  																			</td>
  																		</tr>
  																		<!-- 除法長線5 !-->
  																		<tr id="row_14" height="5">
  																			<td width="10">
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_5" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		<tr id="row_15">
  																			<td id="cel_15_1" align="right" width="30">
  																				<input id="input_text_r_6_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_2" width="10">
  																				<span id="span_r_6_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_3" align="right" width="30">
  																				<input id="input_text_r_6_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_4" width="10">
  																				<span id="span_r_6_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_5" align="right" width="30">
  																				<input id="input_text_r_6_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_6" width="10">
  																				<span id="span_r_6_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_7" align="right" width="30">
  																				<input id="input_text_r_6_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_8" width="10">																				
  																				<span id="span_r_6_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_9" align="right" width="30">
  																				<input id="input_text_r_6_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_15_10" width="10">
  																				<span id="span_r_6_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_15_11" align="right" width="30">
  																				<input id="input_text_r_6_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_12" width="10">
  																				<span id="span_r_6_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_13" align="right" width="30">
  																				<input id="input_text_r_6_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_14" width="10">
  																				<span id="span_r_6_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_15" align="right" width="30">
  																				<input id="input_text_r_6_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_16" width="10">
  																				<span id="span_r_6_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_17" align="right" width="30">
  																				<input id="input_text_r_6_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_18" width="10">
  																				<span id="span_r_6_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_19" align="right" width="30">
  																				<input id="input_text_r_6_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_20" width="10">
  																				<span id="span_r_6_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_21" align="right" width="30">
  																				<input id="input_text_r_6_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_22" width="10">
  																				<span id="span_r_6_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_23" align="right" width="30">
  																				<input id="input_text_r_6_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_24" width="10">
  																				<span id="span_r_6_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_15_25" align="right" width="30">
  																				<input id="input_text_r_6_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_15_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_4(this);" id="input_button_finishing_4" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線4-->
  																						<td>
  																							<input onclick="javascript:finishing3_4(this);" id="input_button_finishing3_4" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_4(this);" id="input_button_finishing2_4" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>																		
  																		<!-- 加減乘長線4 !-->
  																		<tr id="row_16" height="5">	
  																			
  																			<td valign="bottom" colspan="22">																			
  																				<img id="img_line_4" src="images/line1-1.gif" border="0" width="100%">
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="30">																				
  																			</td>
  																			
  																			<td width="100">																				
  																			</td>
  																		</tr>
  																		<!-- 除法長線6 !-->
  																		<tr id="row_17" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>																																						
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_6" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																		
  																		<tr id="row_18">
  																			<td id="cel_18_1" align="right" width="30">
  																				<input id="input_text_r_7_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_2" width="10">
  																				<span id="span_r_7_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_3" align="right" width="30">
  																				<input id="input_text_r_7_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_4" width="10">
  																				<span id="span_r_7_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_5" align="right" width="30">
  																				<input id="input_text_r_7_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_6" width="10">
  																				<span id="span_r_7_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_7" align="right" width="30">
  																				<input id="input_text_r_7_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_8" width="10">
  																				<span id="span_r_7_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_9" align="right" width="30">
  																				<input id="input_text_r_7_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_18_10" width="10">
  																				<span id="span_r_7_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_18_11" align="right" width="30">
  																				<input id="input_text_r_7_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_12" width="10">
  																				<span id="span_r_7_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_13" align="right" width="30">
  																				<input id="input_text_r_7_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_14" width="10">
  																				<span id="span_r_7_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_15" align="right" width="30">
  																				<input id="input_text_r_7_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_16" width="10">
  																				<span id="span_r_7_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_17" align="right" width="30">
  																				<input id="input_text_r_7_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_18" width="10">
  																				<span id="span_r_7_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_19" align="right" width="30">
  																				<input id="input_text_r_7_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_20" width="10">
  																				<span id="span_r_7_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_21" align="right" width="30">
  																				<input id="input_text_r_7_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_22" width="10">
  																				<span id="span_r_7_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_23" align="right" width="30">
  																				<input id="input_text_r_7_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_24" width="10">
  																				<span id="span_r_7_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_18_25" align="right" width="30">
  																				<input id="input_text_r_7_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_18_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_5(this);" id="input_button_finishing_5" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線5-->
  																						<td>
  																							<input onclick="javascript:finishing3_5(this);" id="input_button_finishing3_5" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_5(this);" id="input_button_finishing2_5" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		<tr id="row_19" height="5">																			
  																			<td valign="bottom" colspan="26">
  																			</td>																			
  																		</tr>
  																		<!-- 除法長線7 !-->
  																		<tr id="row_20" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_7" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																		
  																		<tr id="row_21">
  																			<td id="cel_21_1" align="right" width="30">
  																				<input id="input_text_r_8_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_2" width="10">
  																				<span id="span_r_8_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_3" align="right" width="30">
  																				<input id="input_text_r_8_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_4" width="10">
  																				<span id="span_r_8_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_5" align="right" width="30">
  																				<input id="input_text_r_8_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_6" width="10">
  																				<span id="span_r_8_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_7" align="right" width="30">
  																				<input id="input_text_r_8_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_8" width="10">
  																				<span id="span_r_8_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_9" align="right" width="30">
  																				<input id="input_text_r_8_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_21_10" width="10">
  																				<span id="span_r_8_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_21_11" align="right" width="30">
  																				<input id="input_text_r_8_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_12" width="10">
  																				<span id="span_r_8_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_13" align="right" width="30">
  																				<input id="input_text_r_8_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_14" width="10">
  																				<span id="span_r_8_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_15" align="right" width="30">
  																				<input id="input_text_r_8_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_16" width="10">
  																				<span id="span_r_8_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_17" align="right" width="30">
  																				<input id="input_text_r_8_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_18" width="10">
  																				<span id="span_r_8_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_19" align="right" width="30">
  																				<input id="input_text_r_8_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_20" width="10">
  																				<span id="span_r_8_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_21" align="right" width="30">
  																				<input id="input_text_r_8_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_22" width="10">
  																				<span id="span_r_8_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_23" align="right" width="30">
  																				<input id="input_text_r_8_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_24" width="10">
  																				<span id="span_r_8_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_21_25" align="right" width="30">
  																				<input id="input_text_r_8_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_21_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_6(this);" id="input_button_finishing_6" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線6-->
  																						<td>
  																							<input onclick="javascript:finishing3_6(this);" id="input_button_finishing3_6" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_6(this);" id="input_button_finishing2_6" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		<tr id="row_22" height="5">																			
  																			<td valign="bottom" colspan="26">
  																			</td>																			
  																		</tr>
  																		<!-- 除法長線8 !-->
  																		<tr id="row_23" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>																																						
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_8" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																																				
  																			<td width="100">																				
  																			</td>
  																		</tr>
  																		<tr id="row_24">
  																			<td id="cel_24_1" align="right" width="30">
  																				<input id="input_text_r_9_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_2" width="10">
  																				<span id="span_r_9_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_3" align="right" width="30">
  																				<input id="input_text_r_9_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_4" width="10">
  																				<span id="span_r_9_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_5" align="right" width="30">
  																				<input id="input_text_r_9_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_6" width="10">
  																				<span id="span_r_9_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_7" align="right" width="30">
  																				<input id="input_text_r_9_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_8" width="10">
  																				<span id="span_r_9_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_9" align="right" width="30">
  																				<input id="input_text_r_9_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_24_10" width="10">
  																				<span id="span_r_9_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_24_11" align="right" width="30">
  																				<input id="input_text_r_9_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_12" width="10">
  																				<span id="span_r_9_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_13" align="right" width="30">
  																				<input id="input_text_r_9_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_14" width="10">
  																				<span id="span_r_9_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_15" align="right" width="30">
  																				<input id="input_text_r_9_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_16" width="10">
  																				<span id="span_r_9_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_17" align="right" width="30">
  																				<input id="input_text_r_9_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_18" width="10">
  																				<span id="span_r_9_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_19" align="right" width="30">
  																				<input id="input_text_r_9_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_20" width="10">
  																				<span id="span_r_9_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_21" align="right" width="30">
  																				<input id="input_text_r_9_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_22" width="10">
  																				<span id="span_r_9_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_23" align="right" width="30">
  																				<input id="input_text_r_9_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_24" width="10">
  																				<span id="span_r_9_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_24_25" align="right" width="30">
  																				<input id="input_text_r_9_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_24_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_7(this);" id="input_button_finishing_7" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線7-->
  																						<td>
  																							<input onclick="javascript:finishing3_7(this);" id="input_button_finishing3_7" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_7(this);" id="input_button_finishing2_7" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		<tr id="row_25" height="5">																			
  																			<td valign="bottom" colspan="26">
  																			</td>																			
  																		</tr>
  																		<!-- 除法長線9 !-->
  																		<tr id="row_26" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_9" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		<tr id="row_27">
  																			<td id="cel_27_1" align="right" width="30">
  																				<input id="input_text_r_10_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_2" width="10">
  																				<span id="span_r_10_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_3" align="right" width="30">
  																				<input id="input_text_r_10_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_4" width="10">
  																				<span id="span_r_10_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_5" align="right" width="30">
  																				<input id="input_text_r_10_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_6" width="10">
  																				<span id="span_r_10_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_7" align="right" width="30">
  																				<input id="input_text_r_10_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_8" width="10">
  																				<span id="span_r_10_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_9" align="right" width="30">
  																				<input id="input_text_r_10_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_27_10" width="10">
  																				<span id="span_r_10_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_27_11" align="right" width="30">
  																				<input id="input_text_r_10_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_12" width="10">
  																				<span id="span_r_10_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_13" align="right" width="30">
  																				<input id="input_text_r_10_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_14" width="10">
  																				<span id="span_r_10_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_15" align="right" width="30">
  																				<input id="input_text_r_10_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_16" width="10">
  																				<span id="span_r_10_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_17" align="right" width="30">
  																				<input id="input_text_r_10_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_18" width="10">
  																				<span id="span_r_10_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_19" align="right" width="30">
  																				<input id="input_text_r_10_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_20" width="10">
  																				<span id="span_r_10_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_21" align="right" width="30">
  																				<input id="input_text_r_10_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_22" width="10">
  																				<span id="span_r_10_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_23" align="right" width="30">
  																				<input id="input_text_r_10_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_24" width="10">
  																				<span id="span_r_10_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_27_25" align="right" width="30">
  																				<input id="input_text_r_10_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_27_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_8(this);" id="input_button_finishing_8" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 總結線8-->
  																						<td>
  																							<input onclick="javascript:finishing3_8(this);" id="input_button_finishing3_8" type="button" value="線"></input>
  																						</td>
  																						<td>
  																							<input onclick="javascript:finishing2_8(this);" id="input_button_finishing2_8" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		<tr id="row_28" height="5">																			
  																			<td valign="bottom" colspan="26">
  																			</td>																			
  																		</tr>
  																		<!-- 除法長線10 !-->
  																		<tr id="row_29" height="5">
  																			<td width="10">
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>																																						
  																			<td valign="bottom" colspan="15">
  																				<img id="img_divisionline_10" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																																					
  																			<td width="100">																				
  																			</td>
  																		</tr>
  																		<tr id="row_30">
  																			<td id="cel_30_1" align="right" width="30">
  																				<input id="input_text_r_11_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_2" width="10">
  																				<span id="span_r_11_1" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_3" align="right" width="30">
  																				<input id="input_text_r_11_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_4" width="10">
  																				<span id="span_r_11_2" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_5" align="right" width="30">
  																				<input id="input_text_r_11_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_6" width="10">
  																				<span id="span_r_11_3" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_7" align="right" width="30">
  																				<input id="input_text_r_11_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_8" width="10">
  																				<span id="span_r_11_4" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_9" align="right" width="30">
  																				<input id="input_text_r_11_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>																			
  																			<td id="cel_30_10" width="10">
  																				<span id="span_r_11_5" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>																			
  																			<td id="cel_30_11" align="right" width="30">
  																				<input id="input_text_r_11_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_12" width="10">
  																				<span id="span_r_11_6" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_13" align="right" width="30">
  																				<input id="input_text_r_11_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_14" width="10">
  																				<span id="span_r_11_7" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_15" align="right" width="30">
  																				<input id="input_text_r_11_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_16" width="10">
  																				<span id="span_r_11_8" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_17" align="right" width="30">
  																				<input id="input_text_r_11_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_18" width="10">
  																				<span id="span_r_11_9" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_19" align="right" width="30">
  																				<input id="input_text_r_11_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_20" width="10">
  																				<span id="span_r_11_10" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_21" align="right" width="30">
  																				<input id="input_text_r_11_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_22" width="10">
  																				<span id="span_r_11_11" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_23" align="right" width="30">
  																				<input id="input_text_r_11_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_24" width="10">
  																				<span id="span_r_11_12" style="font-size:32px;text-align:center;" onclick="javascript:dotoff(this);">&nbsp;</span>
  																			</td>
  																			<td id="cel_30_25" align="right" width="30">
  																				<input id="input_text_r_11_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText(this);"></input>
  																			</td>
  																			<td id="cel_30_26" width="100">
  																				&nbsp;
  																			</td>
  																		</tr>
  																	</table>																	
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  															</tr>															
  															<tr>
  																<td align="center">
  																	&nbsp;
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  															</tr>
  															
  														</table>
  														<!--短除法-->
  														<table align="center" border="0" width="600px" cellpadding="0" cellspacing="0" id="div_2">
  															<tr>
  																<td>	
  																&nbsp;
  																</td>
  																<td align="center">
  																	<table border="0" cellpadding="0" cellspacing="0">
  																		<tr id="row_1">
  																			<td id="short_1_1" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_2" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_3" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_4" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_5" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_6" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_7" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_8" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_9" width="10">
  																				&nbsp;
  																			</td>																			
  																			<td id="short_1_10" width="10">
  																				&nbsp;
  																			</td>
  																			<td id="short_1_11" align="right" width="30">
  																				<input id="short_text_r_1_6" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_12" width="10">
  																				<span id="short_r_1_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_13" align="right" width="30">
  																				<input id="short_text_r_1_7" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_14" width="10">
  																				<span id="short_r_1_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_15" align="right" width="30">
  																				<input id="short_text_r_1_8" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_16" width="10">
  																				<span id="short_r_1_8" style="font-size:32px;text-align:center;" >&nbsp;</span>	
  																			</td>
  																			<td id="short_1_17" align="right" width="30">
  																				<input id="short_text_r_1_9" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_18" width="10">
  																				<span id="short_r_1_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_19" align="right" width="30">
  																				<input id="short_text_r_1_10" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_20" width="10">
  																				<span id="short_r_1_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_21" align="right" width="30">
  																				<input id="short_text_r_1_11" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_22"  width="10">
  																				<span id="short_r_1_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_23" align="right" width="30">
  																				<input id="short_text_r_1_12" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_24" width="10">
  																				<span id="short_r_1_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_1_25" align="right" width="30">
  																				<input id="short_text_r_1_13" type="text" style="width:25px;height:24px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_1_26" width="100">
  																				&nbsp;
  																			</td>
  																		</tr>
  																																				
  																		<tr id="row_4">
  																			<td id="short_4_1" width="10">
  																				<input id="short_text_r_2_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_2" width="10">
  																				<span id="short_r_2_1" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_3" width="10">
  																				<input id="short_text_r_2_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_4" width="10">
  																				<span id="short_r_2_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_5" width="10">
  																				<input id="short_text_r_2_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_6" width="10">
  																				<span id="short_r_2_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_7" width="10">
  																				<input id="short_text_r_2_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_8" width="10">
  																				<span id="short_r_2_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_9" width="10">																				
  																				<input id="short_text_r_2_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_10" width="10">
  																				<div id="shortdiv_operator">																				
  																				</div>																	
  																			</td>
  																			<td id="short_4_11" align="right" width="30">
  																				<input id="short_text_r_2_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_4_12" width="10">
  																				<span id="short_r_2_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_13" align="right" width="30">
  																				<input id="short_text_r_2_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_14" width="10">
  																				<span id="short_r_2_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_15" align="right" width="30">
  																				<input id="short_text_r_2_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_16" width="10">
  																				<span id="short_r_2_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_17" align="right" width="30">
  																				<input id="short_text_r_2_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_4_18" width="10">
  																				<span id="short_r_2_9" style="font-size:32px;text-align:center;" ></span>
  																			</td>																			
  																			<td id="short_4_19" align="right" width="30">
  																				<input id="short_text_r_2_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_20" width="10">
  																				<span id="short_r_2_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_21" align="right" width="30">
  																				<input id="short_text_r_2_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_22" width="10">	
  																				<span id="short_r_2_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_23" align="center" width="30">
  																				<input id="short_text_r_2_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_4_24" width="10">
  																				<span id="short_r_2_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_4_25" align="center" width="30">																			
  																				<input id="short_text_r_2_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>	
  											
  																			<td id="short_4_26" width="100">																				
  																				<input onclick="javascript:confirm_equation_short(this);" id="short_button_confirm_equation" type="button" value="確定"></input>
  																			</td>
  																		</tr>																		
  																		<!--短除法長線1 -->
  																		<tr id="row5" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="top" colspan="15">
  																				<img id="short_division_1" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		
  																		<tr id="row_7">
  																			<td id="short_7_1" align="right" width="30">																			
  																				<input id="short_text_r_3_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_2" width="10">																				
  																				<span id="span_r_3_1" style="font-size:32px;text-align:center;" >&nbsp;</span>																				
  																			</td>
  																			<td id="short_7_3" align="right" width="30">																				
  																				<input id="short_text_r_3_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_4" width="10">
  																				<span id="short_r_3_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_5" align="right" width="30">																				
  																				<input id="short_text_r_3_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_6" width="10">
  																				<span id="short_r_3_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_7" align="right" width="30">																				
  																				<input id="short_text_r_3_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_8" width="10">
  																				<span id="short_r_3_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_9" align="right" width="30">																				
  																				<input id="short_text_r_3_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_7_10" width="10">																				
  																				<span id="short_r_3_5" style="font-size:32px;text-align:center;" >&nbsp;</span>														
  																			</td>
  																			<td id="short_7_11" align="right" width="30">
  																				<input id="short_text_r_3_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_12" width="10">
  																				<span id="short_r_3_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_13" align="right" width="30">
  																				<input id="short_text_r_3_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_14" width="10">
  																				<span id="short_r_3_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_15" align="right" width="30">
  																				<input id="short_text_r_3_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_16" width="10">
  																				<span id="short_r_3_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_17" align="right" width="30">
  																				<input id="short_text_r_3_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_18" width="10">
  																				<span id="short_r_3_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_19" align="right" width="30">
  																				<input id="short_text_r_3_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_20" width="10">
  																				<span id="short_r_3_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_21" align="right" width="30">
  																				<input id="short_text_r_3_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_22" width="10">
  																				<span id="short_r_3_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_23" align="right" width="30">
  																				<input id="short_text_r_3_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_24" width="10">
  																				<span id="short_r_3_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_7_25" align="right" width="30">
  																				<input id="short_text_r_3_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_7_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_short1(this);" id="short_button_finishing_1" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 短除法 總結線-->
  																						<!--
  																						<td>
  																							<input onclick="javascript:finishing_short3_1(this);" id="short_button_finishing3_1" type="button" value="線"></input>
  																						</td>
  																						-->
  																						<td>
  																							<input onclick="javascript:finishing_short2_1(this);" id="short_button_finishing2_1" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>
  																			</td>
  																		</tr>																		
  																		<!--短除法2 -->
  																		<tr id="row_short_division2" height="5">
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="top" colspan="15">
  																				<img id="short_division_2" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		<tr id="row_9">
  																			<td id="short_9_1" align="right" width="30">
  																				<input id="short_text_r_4_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_2" width="10">
  																				<span id="short_r_4_1" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_3" align="right" width="30">
  																				<input id="short_text_r_4_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_4" width="10">
  																				<span id="short_r_4_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_5" align="right" width="30">
  																				<input id="short_text_r_4_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_6" width="10">
  																				<span id="short_r_4_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_7" align="right" width="30">
  																				<input id="short_text_r_4_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_8" width="10">
  																				<span id="short_r_4_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_9" align="right" width="30">
  																				<input id="short_text_r_4_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_9_10" width="10">
  																				<span id="short_r_4_5" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>																			
  																			<td id="short_9_11" align="right" width="30">
  																				<input id="short_text_r_4_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_12" width="10">
  																				<span id="short_r_4_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_13" align="right" width="30">
  																				<input id="short_text_r_4_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_14" width="10">
  																				<span id="short_r_4_7" style="font-size:32px;text-align:center;" >&nbsp;</span>																			
  																			</td>
  																			<td id="short_9_15" align="right" width="30">
  																				<input id="short_text_r_4_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_16" width="10">
  																				<span id="short_r_4_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_17" align="right" width="30">
  																				<input id="short_text_r_4_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_18" width="10">
  																				<span id="short_r_4_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_19" align="right" width="30">
  																				<input id="short_text_r_4_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_20" width="10">
  																				<span id="short_r_4_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_21" align="right" width="30">
  																				<input id="short_text_r_4_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_22" width="10">
  																				<span id="short_r_4_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_23" align="right" width="30">
  																				<input id="short_text_r_4_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_24" width="10">
  																				<span id="short_r_4_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_9_25" align="right" width="30">
  																				<input id="short_text_r_4_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_9_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_short2(this);" id="short_button_finishing_2" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 短除法 總結線2-->
  																						<!--
  																						<td>
  																							<input onclick="javascript:finishing_short3_2(this);" id="short_button_finishing3_2" type="button" value="線"></input>
  																						</td>
  																						-->
  																						<td>
  																							<input onclick="javascript:finishing_short2_2(this);" id="short_button_finishing2_2" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		<!-- 短除法3 -->
  																		<tr id="row_short_division3" height="5">
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td valign="top" colspan="15">
  																				<img id="short_division_3" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>																		
  																		
  																		<tr id="row_12">
  																			<td id="short_12_1" align="right" width="30">
  																				<input id="short_text_r_5_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_2" width="10">
  																				<span id="short_r_5_1" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_3" align="right" width="30">
  																				<input id="short_text_r_5_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_4" width="10">
  																				<span id="short_r_5_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_5" align="right" width="30">
  																				<input id="short_text_r_5_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_6" width="10">
  																				<span id="short_r_5_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_7" align="right" width="30">
  																				<input id="short_text_r_5_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_8" width="10">
  																				<span id="short_r_5_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_9" align="right" width="30">
  																				<input id="short_text_r_5_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_12_10" width="10">
  																				<span id="short_r_5_5" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>																			
  																			<td id="short_12_11" align="right" width="30">
  																				<input id="short_text_r_5_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_12" width="10">
  																				<span id="short_r_5_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_13" align="right" width="30">
  																				<input id="short_text_r_5_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_14" width="10">
  																				<span id="short_r_5_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_15" align="right" width="30">
  																				<input id="short_text_r_5_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_16" width="10">
  																				<span id="short_r_5_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_17" align="right" width="30">
  																				<input id="short_text_r_5_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_18" width="10">
  																				<span id="short_r_5_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_19" align="right" width="30">
  																				<input id="short_text_r_5_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_20" width="10">
  																				<span id="short_r_5_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_21" align="right" width="30">
  																				<input id="short_text_r_5_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_22" width="10">
  																				<span id="short_r_5_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_23" align="right" width="30">
  																				<input id="short_text_r_5_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_24" width="10">
  																				<span id="short_r_5_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_12_25" align="right" width="30">
  																				<input id="short_text_r_5_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_12_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_short3(this);" id="short_button_finishing_3" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 短除法 總結線3-->
  																						<!--
  																						<td>
  																							<input onclick="javascript:finishing_short3_3(this);" id="short_button_finishing3_3" type="button" value="線"></input>
  																						</td>
  																						-->
  																						<td>
  																							<input onclick="javascript:finishing_short2_3(this);" id="short_button_finishing2_3" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		
  																		<!-- 短除法4 -->
  																		<tr id="row_short_division4" height="5">
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			
  																			<td valign="top" colspan="15">
  																				<img id="short_division_4" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																		<tr id="row_15">
  																			<td id="short_15_1" align="right" width="30">
  																				<input id="short_text_r_6_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_2" width="10">
  																				<span id="short_r_6_1" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_3" align="right" width="30">
  																				<input id="short_text_r_6_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_4" width="10">
  																				<span id="short_r_6_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_5" align="right" width="30">
  																				<input id="short_text_r_6_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_6" width="10">
  																				<span id="short_r_6_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_7" align="right" width="30">
  																				<input id="short_text_r_6_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_8" width="10">																				
  																				<span id="short_r_6_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_9" align="right" width="30">
  																				<input id="short_text_r_6_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_15_10" width="10">
  																				<span id="short_r_6_5" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>																			
  																			<td id="short_15_11" align="right" width="30">
  																				<input id="short_text_r_6_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_12" width="10">
  																				<span id="short_r_6_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_13" align="right" width="30">
  																				<input id="short_text_r_6_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_14" width="10">
  																				<span id="short_r_6_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_15" align="right" width="30">
  																				<input id="short_text_r_6_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_16" width="10">
  																				<span id="short_r_6_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_17" align="right" width="30">
  																				<input id="short_text_r_6_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_18" width="10">
  																				<span id="short_r_6_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_19" align="right" width="30">
  																				<input id="short_text_r_6_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_20" width="10">
  																				<span id="short_r_6_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_21" align="right" width="30">
  																				<input id="short_text_r_6_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_22" width="10">
  																				<span id="short_r_6_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_23" align="right" width="30">
  																				<input id="short_text_r_6_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_24" width="10">
  																				<span id="short_r_6_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_15_25" align="right" width="30">
  																				<input id="short_text_r_6_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_15_26" width="100">
  																				<table>
  																					<tr>
  																						<td>
  																							<input onclick="javascript:finishing_short4(this);" id="short_button_finishing_4" type="button" value="換列"></input>
  																						</td>
  																						<!--20150608修改增加 短除法 總結線4-->
  																						<!--
  																						<td>
  																							<input onclick="javascript:finishing_short3_4(this);" id="short_button_finishing3_4" type="button" value="線"></input>
  																						</td>
  																						-->
  																						<td>
  																							<input onclick="javascript:finishing_short2_4(this);" id="short_button_finishing2_4" type="button" value="結束"></input>
  																						</td>
  																					</tr>
  																				</table>																				
  																			</td>
  																		</tr>
  																		
  																		
  																		<!-- 短除法5 !-->
  																		<tr id="row_short_division5" height="5">
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td  width="10">																
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			<td width="10">																				
  																			</td>
  																			
  																			<td valign="top" colspan="15">
  																				<img id="short_division_5" src="images/line1-1.gif" border="0" width="100%">
  																			</td>																			
  																			<td width="100">																				
  																			</td>																			
  																		</tr>
  																																				
  																		<tr id="row_18">
  																			<td id="short_18_1" align="right" width="30">
  																				<input id="short_text_r_7_1" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_2" width="10">
  																				<span id="short_r_7_1" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_3" align="right" width="30">
  																				<input id="short_text_r_7_2" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_4" width="10">
  																				<span id="short_r_7_2" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_5" align="right" width="30">
  																				<input id="short_text_r_7_3" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_6" width="10">
  																				<span id="short_r_7_3" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_7" align="right" width="30">
  																				<input id="short_text_r_7_4" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_8" width="10">
  																				<span id="short_r_7_4" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_9" align="right" width="30">
  																				<input id="short_text_r_7_5" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>																			
  																			<td id="short_18_10" width="10">
  																				<span id="short_r_7_5" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>																			
  																			<td id="short_18_11" align="right" width="30">
  																				<input id="short_text_r_7_6" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_12" width="10">
  																				<span id="short_r_7_6" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_13" align="right" width="30">
  																				<input id="short_text_r_7_7" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_14" width="10">
  																				<span id="short_r_7_7" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_15" align="right" width="30">
  																				<input id="short_text_r_7_8" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_16" width="10">
  																				<span id="short_r_7_8" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_17" align="right" width="30">
  																				<input id="short_text_r_7_9" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_18" width="10">
  																				<span id="short_r_7_9" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_19" align="right" width="30">
  																				<input id="short_text_r_7_10" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_20" width="10">
  																				<span id="short_r_7_10" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_21" align="right" width="30">
  																				<input id="short_text_r_7_11" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_22" width="10">
  																				<span id="short_r_7_11" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_23" align="right" width="30">
  																				<input id="short_text_r_7_12" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																			<td id="short_18_24" width="10">
  																				<span id="short_r_7_12" style="font-size:32px;text-align:center;" >&nbsp;</span>
  																			</td>
  																			<td id="short_18_25" align="right" width="30">
  																				<input id="short_text_r_7_13" type="text" style="width:25px;height:40px;font-size:26px;text-align:center;" maxlength="1" onclick="javascript:getText_short(this);"></input>
  																			</td>
  																		</tr>
  																		<tr id="row_19" height="5">																			
  																			<td valign="bottom" colspan="26">
  																			</td>																			
  																		</tr>
  																	</table>																	
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  															</tr>															
  															<tr>
  																<td align="center">
  																	&nbsp;
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  																<td align="center">
  																	&nbsp;
  																</td>
  															</tr>
  														</table>
  														</div>
  													</form>
  												</td>
  											</tr>
  										</tbody>
  									</table>
  								</td>
  								<td valign="top">
  									<script language="JavaScript" type="text/javascript" src="include/fraction.js"></script>
  									<form id="form_keypad" name="keypad">
                    
                    