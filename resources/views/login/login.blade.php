<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	[! Html::style('style/reset.css') !]
	[! Html::style('style/style.css') !]

</head>
<body>
	<div class="wrapper">
		<div id="login-wrap">
			<div id="login-logo"></div>
			<div class="login-inner">
				<h3>登入<span>Login</span></h3>
				<div class="login-input-wrap">
[! Form::open(array('url'=>route('mem.loginchk'),'id'=>'addForm', 'name'=>'addForm')) !]
[! Form::hidden('domain', 'addForm') !] 				
					<input class="login-input" type="text" placeholder="帳號" name="username" id="username" />
					<input class="login-input" type="password" placeholder="密碼" name="password" id="password" />
[! Form::close() !]
				</div>
				<input id="doLogin" class="btn-login" name="doLogin" type="button" value="登入" onclick="chk()">
@if (\Session::has('error'))
    <div class="login-error-msg">帳號或密碼有誤！</div>
@endif				
				
			</div>
		</div>
		<div class="img-school"></div>
		<div class="img-footer01"></div>
	</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
	function chk(){
		var isOk = true;
		var errdsc = '';
		if($('#username').val() == ''){
			isOk = false;
			errdsc = errdsc + '請輸入帳號!!\r\n';
		}	
		if($('#password').val() == ''){
			//isOk = false;
			errdsc = errdsc + '請輸入密碼!!\r\n';
		}
		
		if(isOk){
			$('#addForm').submit();
		}else{
			alert(errdsc);
		}
	}
</script>		
</body>
</html>