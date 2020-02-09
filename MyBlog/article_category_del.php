<?php
	require './lib/admin.php';
	require './lib/public.php';
	$db = database();
	
	//删除指定的分类
	$id = $_GET['id'];	
	$db->where(array("id"=>$id))->delete('article_category');
	
	header("location:article_category_list.php")
?>