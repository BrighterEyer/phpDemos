<?php
	header("Content-Type:text/html;charset=utf-8");
	if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username && $password){
			//获取用户名对应的盐
			//引入操作数据库类
			require './lib/public.php';
			$db = database();
			$rows = $db->where(array('username'=>'"'.$username.'"'))->select('admin');
			
			$row = $rows[0];
			//拿到密码进行比较
			$password = md5(md5($password).$row['salt']);
			session_start();
			if($password==$row['password']){
				//setcookie("login_flag",'1');
				$_SESSION['login_flag'] = 1;
				header("location:jump.php?code=1&url=artical_list.php&msg=登录成功！");
				exit;
			}
		}
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>管理员登录</title>
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
					<h3 class="text-center">登录</h3>
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
					<input type="submit" name="" id="" value=" 登录 " class="btn btn-primary" />
					<a href="register.php" class="btn btn-success" role="button"> 注册 </a>
				</form>
			</div>
		</div>
	</body>
</html>