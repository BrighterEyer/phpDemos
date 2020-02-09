<?php
	//引入数据库操作类
	require "./lib/public.php";
	$db = database();
	
	//获取文章分类
	$categories = $db->order(['id'=>'asc'])->select("article_category");
	$id = isset($_GET['id'])?$_GET['id']:header("location:index.php");
	//获取文章详情
	$rows = $db->where(['id'=>$id])->select("article");
	//var_dump($rows);
	$row = $rows[0];
?>

<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $row['title']?> - SwinJoy</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/nprogress.css"> -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="img/icon/icon.png">
<link rel="shortcut icon" href="img/icon/favicon.ico">
<script src="js/jquery-2.1.4.min.js"></script>
<!-- <script src="js/nprogress.js"></script>
<script src="js/jquery.lazyload.min.js"></script> -->
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

<body class="user-select single">
<header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      
      <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<h1 class="logo hvr-bounce-in"><a href="index.php" title=""><img src="img/timg.jpg" alt="" style="height: 60px;"></a></h1>
					</div>
					<div class="collapse navbar-collapse" id="header-navbar">
						<ul class="nav navbar-nav navbar-right">
							<li class="hidden-index active">
								<a data-cont="SwinJoy" href="index.php">首页</a>
							</li>
							<?php foreach($categories as $category){?>
							<li class="">
								<a href="index.php"><?php echo $category['name']?></a>
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
      <header class="article-header">
        <h1 class="article-title"><?php echo $row['title']?></h1>
        <div class="article-meta"> 
        <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：<?php echo date("Y-m-d H:i:s",$row['create_time'])?>"><i class="glyphicon glyphicon-time"></i> <?php echo date("Y-m-d H:i:s",$row['create_time'])?></time>
          </span>
           </div>
      </header>
      <article class="article-content">
        <p><img data-original="<?php echo $row['thumb']?>" src="<?php echo $row['thumb']?>" alt="" /></p>
        <?php echo $row['content']?>
        <p class="article-copyright hidden-xs">未经允许不得转载：<a href="">SwinJoy博客</a> » <a href="<?php $_SERVER['PHP_SELF'];?>"><?php echo $row['title']?></a></p>
      </article>
      
      
      <div class="title" id="comment">
        <h3>评论 <small>抢沙发</small></h3>
      </div>
      <!--<div id="respond">
        <div class="comment-signarea">
          <h3 class="text-muted">评论前必须登录！</h3>
          <p> <a href="javascript:;" class="btn btn-primary login" rel="nofollow">立即登录</a> &nbsp; <a href="javascript:;" class="btn btn-default register" rel="nofollow">注册</a> </p>
          <h3 class="text-muted">当前文章禁止评论</h3>
        </div>
      </div>-->
      <!--PC版-->
	<div id="SOHUCS" sid="<?php echo $id;?>"></div>
    </div>
  </div>
  <aside class="sidebar">
    <div class="fixed">
      <div class="widget widget-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
          
          <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane notice active" id="notice">
            今天天气不错
          </div>
          
          <div role="tabpanel" class="tab-pane contact" id="contact">
            <h2>Email:<br />
              <a href="mailto:kunx-edu@qq.com" data-toggle="tooltip" data-placement="bottom" title="kunx-edu@qq.com">kunx-edu@qq.com</a></h2>
          </div>
        </div>
      </div>
      <div class="widget widget_search">
        <form class="navbar-form" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
    
  </aside>
</section>
<footer class="footer">
  <div class="container">
    <p>&copy; 2016 <a href="https://blog.kunx.org">https://blog.kunx.org</a> &nbsp; <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">川ICP备20151109-1</a> &nbsp; <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a></p>
  </div>
  <div id="gotop"><a class="gotop"></a></div>
</footer>


<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.ias.js"></script> 
<script src="js/scripts.js"></script> 
<!-- <script src="js/jquery.qqFace.js"></script> 
<script type="text/javascript">
$(function(){
	$('.emotion').qqFace({
		id : 'facebox', 
		assign:'comment-textarea', 
		path:'/Home/img/arclist/'	//表情存放的路径
	});
 });   
</script> -->
<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
	window.changyan.api.config({
		appid: 'cytFjdb0G',
		conf: 'prod_f9a08c8c029a151546c679af5d65cf4e'
	});
</script>
</body>
</html>