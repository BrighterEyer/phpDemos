<?php
	require './lib/admin.php';
	$id = $_GET['id'];
	//引入操作数据库类
	require './lib/public.php';
	$db = database();
	$rows = $db->where(array('id'=>$id))->select("article");
	$row = $rows[0];
	//获取文章分类标题
	$article_categories = $db-> order(array("id"=>"asc")) ->select('article_category');
	
	//判断是否提交了数据
	//如果提交了数据，就连接数据库，将数据保存下来
	if($_POST){
		$data = array(
			'title'=> $_POST['title'],
			'thumb'=> $_POST['thumb'],
			'content'=>$_POST['content'],
			'article_category_id'=>$_POST['article_category_id']
		); 
		//插入数据
		$rst = $db->where(array('id'=>$id))->update('article',$data);
		header('location:article_list.php');
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
						文章标题
					</lable>
					<input type="text" name="title"  value="<?php echo $row['title']?>" class="form-control" placeholder="请输入文章标题" />
				</div>
				
				<div class="form-group">
					<lable>
						文章分类
					</lable>
					<select class="form-control" name="article_category_id">
						<option>请选择</option>
						<?php foreach($article_categories as $category){ ?>
						<option value="<?php echo $category['id'] ?>" <?php if($category['id']==$row['article_category_id']){?>selected=""<?php }?> ><?php echo $category['name'] ?></option>
						<?php }?>
					</select>
				</div>

				<div class="form-group">
					<lable>
						文章配图
					</lable>
					<input type="text" name="thumb" value="<?php echo $row['thumb']?>" class="form-control" placeholder="请输入配图URL" />
				</div>
				
				<div class="form-group">
					<lable>
						文章详情
					</lable>
					<script type="text/plain" name="content" id="editor" name="content" ><?php echo $row['content']?></script>
				</div>
				<input type="submit" id="" name="" value="保存" class="btn btn-primary" />
			</form>
		</div>

		<script src="ext/ueditor/ueditor.config.js" type="text/javascript" charset="utf-8"></script>
		<script src="ext/ueditor/ueditor.all.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			UE.getEditor("editor", {
				toolbars: [
					[
						'bold', //加粗
						'indent', //首行缩进
						'snapscreen', //截图
						'italic', //斜体
						'underline', //下划线
						'strikethrough', //删除线
						'subscript', //下标
						'selectall', //全选
						'horizontal', //分隔线
						'removeformat', //清除格式
						'unlink', //取消链接
						'fontfamily', //字体
						'fontsize', //字号
						'paragraph', //段落格式
						'simpleupload', //单图上传
						'edittable', //表格属性
						'link', //超链接
						'emotion', //表情
						'spechars', //特殊字符
						'searchreplace', //查询替换
						'map', //Baidu地图
						'justifyleft', //居左对齐
						'justifyright', //居右对齐
						'justifycenter', //居中对齐
						'justifyjustify', //两端对齐
						'forecolor', //字体颜色
						'backcolor', //背景色
						'template', //模板
					]
				],
				initialFrameHeight:250
			})
		</script>

	</body>

</html>