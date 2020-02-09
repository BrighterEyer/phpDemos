<?php
	header("Content-Type:text/html;charset=utf-8");
	//检查用户是否登录
	/*if(!isset($_COOKIE['login_flag']) || $_COOKIE['login_flag']!=1){
		header("location:jump.php?code=1&url=login.php&msg=请登录！");
		exit;
	}*/
	session_start();
	if(!isset($_SESSION['login_flag']) || $_SESSION['login_flag']!=1){
		header("location:jump.php?code=1&url=login.php&msg=请登录！");
		exit;
	}
?>