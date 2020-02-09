<?php
	//引入数据库操作类
	require "./lib/public.php";
	$db = database();
	
	//获取请求参数
	$cat = isset($_GET['cat'])?$_GET['cat']:"";
	$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";
	
	//获取文章分类
	$categories = $db->order(['id'=>'asc'])->select("article_category");
	//var_Dump($categories);
	
	//获取文章分类名称 ['id'=>'name']
	$categories_data = [];
	$cat_id = 0;
	foreach($categories as $category){
		$categories_data[$category['id']] = $category;
		if($category['sug']==$cat){
			$cat_id = $category['id'];
		}
	}
	
	//获取文章列表
	if($cat_id){
		$db = $db->where(['article_category_id'=>$cat_id]);
	}
	//如果设定了搜索关键字，就拼接
	if($keyword){
		$db = $db->where(['title'=>['"%'.$keyword.'%"','like','and']]);
	}
	
	//分页功能
	//1.取出总共有多少条
	$page_model = clone $db;
	$count = $page_model->field(['count(*) as count'])->select('article');
	//var_dump($count);
	$count = $count[0]['count'];
	$page = isset($_GET['page'])?$_GET['page']:1;//当前页码
	$size = 5;//每页尺寸
	$offset = ($page-1)*$size;//数据起始的行号
	$pages = ceil($count/$size);//总页数
	
	
	$articles = $db->order(['create_time'=>'desc'])->limit($page,$size)->select("article");
	
//	if($cat_id){
//		$articles = $db->where(['article_category_id'=>$cat_id])->where(['title'=>['"%'.$keyword.'%"','like','and']])->order(['create_time'=>'desc'])->select("article");
//		
//	}else{
//		$articles = $db->where(['title'=>['"%'.$keyword.'%"','like','and']])->order(['create_time'=>'desc'])->select("article");
//	}
//	
	//获取文章前3张图片
	$thumbs = $db->limit(3)->order(['create_time'=>'desc'])->select("article");
	//var_Dump($thumbs);
?>

<!doctype html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SwinJoy</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/nprogress.css"> -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="apple-touch-icon-precomposed" href="img/icon/icon.png">
		<link rel="shortcut icon" href="img/icon/favicon.ico">
		<script src="js/jquery-2.1.4.min.js"></script>
		<!-- <script src="js/nprogress.js"></script> -->
		<!-- <script src="js/jquery.lazyload.min.js"></script> -->
		<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
		<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
	</head>

	<body class="user-select">
		<header class="header">
			<nav class="navbar navbar-default" id="navbar">
				<div class="container">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<h1 class="logo hvr-bounce-in"><a href="index.php" title=""><img src="img/timg.jpg" alt="" style="height: 60px;"></a></h1>
					</div>
					<div class="collapse navbar-collapse" id="header-navbar">
						<ul class="nav navbar-nav navbar-right">
							<li class="hidden-index <?php echo $cat==''?'active':''?>">
								<a data-cont="SwinJoy" href="index.php">首页</a>
							</li>
							<?php foreach($categories as $category){?>
							<li class="<?php echo $cat==$category['sug']?'active':''?>">
								<a href="index.php?cat=<?php echo $category['sug']?>"><?php echo $category['name']?></a>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<section class="container">
			<div class="content-wrap">
				<div class="content">
					<div class="jumbotron">
						<h1>欢迎访问SwinJoy博客</h1>
						<p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
					</div>
					<div id="focusslide" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#focusslide" data-slide-to="0" class="active"></li>
							<li data-target="#focusslide" data-slide-to="1"></li>
							<li data-target="#focusslide" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<!--<div class="item active">
								<a href="" target="_blank"><img src="<?php echo $thumbs[0]['thumb'];?>" alt="" class="img-responsive"></a>
								
							</div>
							<div class="item">
								<a href="" target="_blank"><img src="<?php echo $thumbs[1]['thumb'];?>" alt="" class="img-responsive"></a>
								
							</div>
							<div class="item">
								<a href="" target="_blank"><img src="<?php echo $thumbs[2]['thumb'];?>" alt="" class="img-responsive"></a>
								
							</div>-->
							<div class="item active">
								<a href="" target="_blank"><img src="img/banner/banner_01.jpg" alt="" class="img-responsive"></a>
								
							</div>
							<div class="item">
								<a href="" target="_blank"><img src="img/banner/banner_02.jpg" alt="" class="img-responsive"></a>
								
							</div>
							<div class="item">
								<a href="" target="_blank"><img src="img/banner/banner_03.jpg" alt="" class="img-responsive"></a>
								
							</div>
						</div>
							
						<a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a>
						<a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a>
					</div>

					<div class="title">
						<h3>最新发布</h3>
					</div>
					<?php foreach($articles as $article){?>
					<article class="excerpt excerpt-2">
						<a class="focus" href="article.php?id=<?php echo $article['id']?>" title=""><img class="thumb" data-original="<?php echo $article['thumb'];?>" src="<?php echo $article['thumb'];?>" alt=""></a>
						<header>
							<a class="cat" href="index.php?cat=<?php echo $categories_data[$article['article_category_id']]['sug']?>"><?php echo $categories_data[$article['article_category_id']]['name']?><i></i></a>
							<h2><a href="article.php?id=<?php echo $article['id']?>" title=""><?php echo $article['title']?></a></h2>
						</header>
						<p class="meta">
							<time class="time"><i class="glyphicon glyphicon-time"></i><?php echo date("Y-m-d H:i:s",$article['create_time']);?></time>
							<p class="note"><?php echo export($article['content'])?></p>
					</article>
					<?php }?>

					 
			      <nav class="pagination">
			        <ul>
			        	<?php for($i=1;$i<=$pages;++$i){?>
			          	<li class="<?php echo $page==$i?'active':'';?>"><a href="?page=<?php echo $i?>"><?php echo $i?></a></li>
			         	<?php }?>
			          <li><span>共 <?php echo $pages?> 页</span></li>
			        </ul>
			      </nav> 
				</div>
			</div>
			<aside class="sidebar">
				<div class="fixed">
					<div class="widget widget-tabs">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a>
							</li>
							<li role="presentation">
								<a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane notice active" id="notice">
								今天天气不错

							</div>

							<div role="tabpanel" class="tab-pane contact" id="contact">
								<h2>Email:<br />
              <a href="mailto:1066684692@qq.com" data-toggle="tooltip" data-placement="bottom" title="1066684692@qq.com">1066684692@qq.com</a></h2>
							</div>
						</div>
					</div>
					<div class="widget widget_search">
						<form class="navbar-form" action="index.php" method="get">
							<div class="input-group">
								<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
								<span class="input-group-btn">
            <button class="btn btn-default btn-search"  type="submit">搜索</button>
            </span> </div>
						</form>
					</div>
				</div>

			</aside>
		</section>
		<footer class="footer">
			<div class="container">
				<p>&copy; 2018
					<a href="https://blog.kunx.org">blog.kunx.org</a> &nbsp;
					<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">川ICP备20151109-1</a> &nbsp;
					<!-- <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a> -->
				</p>
			</div>
			<div id="gotop">
				<a class="gotop"></a>
			</div>
		</footer>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.ias.js"></script>
		<!--<script src="js/scripts.js"></script>-->
	</body>

</html>