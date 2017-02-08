<!--<link href="include/mathquill.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="include/mathquill.min.js"></script>
<link href="include/dialog.css" rel="stylesheet" type="text/css" />-->
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
<p>
<ul>
	<li>
		<!--選擇題答案:-->
	</li>
	<li>
		<textarea name="latex_Code1" id="latex_Code1" style="height:30px;width:30px; visibility: hidden; "></textarea>
	</li>
</ul>

<div id ="latex_proxy" align ="right" >
	<textarea name="latex_as" id="latex_as" style="height:150px;width:290px;"  ></textarea>
</div>
<div align ="center" >
	<input id="input_button_upload_response" type="IMAGE" value="下一步" src="[! url('/images/goto_n.png') !]" name="upload" class="butn01" type="button" style="height:75px;width:200px;" onclick="ans_analy()">
</div>