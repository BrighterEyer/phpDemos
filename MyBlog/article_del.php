<?php
	require './lib/admin.php';
	require './lib/public.php';
	$db = database();
	
	//获取要删除的文章标注id
	$id = $_GET['id'];
	
	$db->where(array("id"=>$id))->delete("article");
	
	header("location:article_list.php");
