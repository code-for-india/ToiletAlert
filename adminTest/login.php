<?php
session_start();
require 'api/webservices/login.php';
error_reporting(E_ERROR);

date_default_timezone_set ( 'Asia/Calcutta' );

// get the page name where to redirect
if (isset ( $_POST ['login'] ) == "login") {
	$paramsd->username = $_POST ['uname'];
	$paramsd->password = $_POST ['pass'];
	$paramsd->type=$_POST['role'];
// 	echo var_dump($_POST);
	
	$jsonData = authenticate($paramsd, true);
	$data= parseResponse($jsonData);
	if(isset($data)){
// 		$_SESSION['userName'] = $data;
		$_SESSION['username'] = $data[0]['username'];
		header ( "Location: index.php" );
	}else{
		$_SESSION ['login_msg'] = "Wrong User Name and Password";
	}
}
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
<meta charset="UTF-8">
<title>Toilet Alert | Admin Login</title>
<meta
	content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>
<body class="bg-black">
	<div class="form-box" id="login-box">
		<div class="header">Sign In</div>
		<form action="login.php" method="post">
			<div class="body bg-gray">
				<div class="form-group">
					<input type="text" name="uname" class="form-control"
						placeholder="User ID" id="uname" />
				</div>
				<div class="form-group">
					<input type="password" name="pass" class="form-control"
						placeholder="Password" id="pass" />
				</div>
				<div class="form-group">
					<select name="role" class="form-control" >
						<option value="admin">Admin</option>
						<option value="authority">Authority</option>
						<option value="general">General</option>
					</select>
				</div>
			</div>
			<button type="submit" name="login" value="login"
				class="btn bg-olive btn-block">Sign me in</button>
			<div class="footer">
				<p style="color: #F00;"><?php	
								//display the error msg if the login credentials are wrong!
									if(isset($_SESSION['login_msg'])){
										echo $_SESSION['login_msg'];
										unset($_SESSION['login_msg']);
									}
					?></p>
			</div>
			<input type="hidden" name="ch" value="login">
		</form>
	</div>
	<!-- jQuery 2.0.2 -->
	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

