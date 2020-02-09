<?php
	require './lib/admin.php';
	header("Content-Type:text/html;charset=utf-8");
	//引入数据库操作类
	require "./lib/public.php";
	$db = database();
	$id = $_GET['id'];
	$rows = $db->where(array("id"=>$id))->select("article");
	echo $rows[0]['content'];
	
	# 主流的权限控制系统方案有两种，一种称之为基于角色的控制系统RBAC （role based access control）
	# Oauth2.0 跨应用间授权
?>