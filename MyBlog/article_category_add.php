<?php
	require './lib/admin.php';	
	//判断是否提交了数据
	//如果提交了数据，就连接数据库，将数据保存下来
	if($_POST){
		$data = array(
			'name'=> $_POST['name'],
			'sug'=> $_POST['sug']
		); 
		//引入操作数据库类
		require './lib/public.php';
		$db = database();
		//插入数据
		$rst = $db->insert('article_category',$data);
		header('location:article_category_list.php');
		exit;
	}	

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<style type="text/css">
			body {
				padding-top: 70px;
			}
		</style>
	</head>

	<body>
		<nav class="nav navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="padding-top: 10px;"><img src="img/timg.jpg" class="img-circle" style="max-height: 35px;" /></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="article_category_list.php">文章分类</a></li>
						<li><a href="article_list.php">文章</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle='dropdown'>四哥<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">退出</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<form class="" method="post">
				<div class="form-group">
					<lable>
						分类名称
					</lable>
					<input type="text" name="name" id="name" value="" class="form-control" placeholder="请输入分类名称" />
				</div>

				<div class="form-group">
					<lable>
						英文名称
					</lable>
					<input type="text" name="sug" value="" class="form-control" placeholder="请输入英文名称" />
				</div>
				<input type="submit" id="" name="" value="创建" class="btn btn-primary" />
			</form>
		</div>

	</body>

</html>