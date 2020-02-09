<?php
	header("Content-Type:text/html;charset=utf-8");
	if($_POST){
		//引入操作数据库类
		require './lib/public.php';
		$db = database();
		$username = $_POST['username'];
		$password = $_POST['password'];
		//加盐加密
		$salt = md5(mcrypt_create_iv(32));
		//从随机源创建初始向量。
		//初始向量只是为了给加密算法提供一个可用的种子， 所以它不需要安全保护， 你甚至可以随同密文一起发布初始向量也不会对安全性带来影响。
		$data = array(
			"username"=>$username,
			"password"=>md5(md5($password).$salt),
			"salt"=>$salt,
		);
		
		$db->insert("admin",$data);
		header("location:jump.php?code=1&url=login.php&msg=注册成功！");
		exit;
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>管理员注册</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<style type="text/css">
		.b1{
			width: 40%;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			padding: 10px;
		}
	</style>
	<body>
		<div class="container">
			<div class="container b1">
				<form method="post">
					<h3 class="text-center">注册</h3>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" name="username">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</div>
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					<input type="submit" name="" id="" value=" 注册 " class="btn btn-primary" />
					<a href="login.php" class="btn btn-success" role="button"> 返回登录 </a>
				</form>
			</div>
		</div>
	</body>
</html>