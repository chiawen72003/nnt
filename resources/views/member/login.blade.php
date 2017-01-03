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
					<input class="login-input" type="text" placeholder="帳號" />
					<input class="login-input" type="text" placeholder="密碼" />
				</div>
				<input id="doLogin" class="btn-login" name="doLogin" type="submit" value="登入">
				<div class="login-error-msg">帳號或密碼有誤！</div>
			</div>
		</div>
		<div class="img-school"></div>
		<div class="img-footer01"></div>
	</div>
</body>
</html>