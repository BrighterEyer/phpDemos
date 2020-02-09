<?php
	require './lib/admin.php';
	require './lib/public.php';
	$db = database();
	$rows = $db->select('article');
	
	//查出所有的文章分类
	$categories = $db-> order(array("id"=>"asc")) ->select('article_category');
	$article_categories = array();
	foreach($categories as $category){
		$article_categories[$category['id']] = $category;
	}
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<script type="text/javascript" src="js/jquery.js" ></script>
		<script type="text/javascript" src="js/bootstrap.js" ></script>
		<style>
			#list th,#list tf{
				vertical-align:middle;
			}
			#list img{
				max-height: 30px;
			}
			body{
				padding-top: 70px;
			}
		</style>
	</head>
	<body>
		<nav class="nav navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="padding-top: 10px;"><img src="img/timg.jpg" class="img-circle" style="max-height: 35px;"/></a>
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
		
		<div class="container" id="list">
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>隔壁老王在搖一搖，请看好自己的老婆！
			</div>
			<table class="table table-bordered table-striped">
				<a href="article_add.php" class="btn btn-success" style="margin-bottom: 10px;">添加文章</a>
				<tr>
					<th>文章id</th>
					<th><span class="glyphicon glyphicon-picture" aria-hidden='true'></span></th>
					<th>文章标题</th>
					<th>文章分类</th>
					<th>文章发布时间</th>
					<th>操作</th>
				</tr>
				<?php foreach($rows as $row){ ?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><img src="<?php echo $row['thumb']?>" class="img-rounded"/></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $article_categories[$row['article_category_id']]['name']?></td>
					<td><?php echo date('Y-m-d H:i:s',$row['create_time'])?></td>
					<td><a href="article_edit.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a href="article_del.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>
