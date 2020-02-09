<?php
	header("Content-Type:text/html;charset=utf-8");
	$password = 123456;
	$hash = password_hash($password,PASSWORD_DEFAULT);//将加密密码保存到数据库
	echo $hash;
	$a = ['ua'=>'2','zhangs'=>'shand'];
	var_dump($a);
?>