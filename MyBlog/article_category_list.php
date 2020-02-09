<?php
	require './lib/admin.php';
	//判断是否提交了数据
	//如果提交了数据，就连接数据库，将数据保存下来
	//引入操作数据库类
	require './lib/public.php';
	$db = database();
	//插入数据
	$rows = $db-> order(array('id'=>'asc'))-> select('article_category');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>
		</title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<script type="text/javascript" src="js/jquery.js" ></script>
		<script type="text/javascript" src="js/bootstrap.js" ></script>
		<style>#list th,
#list tf {
	vertical-align: middle;
}

#list img {
	max-height: 30px;
}

body {
	padding-top: 70px;
}</style>
	</head>
	<body>
		<nav class="nav navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="padding-top: 10px;">
						<img src="img/timg.jpg" class="img-circle" style="max-height: 35px;"/>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="article_category_list.php">
								文章分类
							</a>
						</li>
						<li>
							<a href="article_list.php">
								文章
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle='dropdown'>
								四哥
								<span class="caret">
								</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container" id="list">
			<!--<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>隔壁老王在搖一搖，请看好自己的老婆！
			</div>-->
			<a href="article_category_add.php" class="btn btn-success" style="margin-bottom: 10px;">
				添加分类
			</a>
			<table class="table table-bordered table-striped">
				<tr>
					<th>
						分类id
					</th>
					<th>
						分类名称
					</th>
					<th>
						分类英文名称
					</th>
					<th>
						操作
					</th>
				</tr>
				<?php foreach($rows as $row){ ?>
				<tr>
					<td>
						<?php echo $row['id'];?>
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['sug'];?>
					</td>
					<td>
						<a href="<?php echo 'article_category_edit.php?id='.$row['id'] ?>" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-pencil">
							</span>
						</a>
						<a href="article_category_del.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-trash">
							</span>
						</a>
					</td>
				</tr>
				<?php }?>
				
			</table>
		</div>
	</body>
</html>
