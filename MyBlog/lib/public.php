<?php
//数据库连接
function database() {
	require_once ('./lib/mysql.class.php');
	//连接数据库
	$configArr = array('host' => 'localhost', 'port' => '3306', 'user' => 'root', 'passwd' => '', 'dbname' => 'blog', );
	return $mysql = new MMysql($configArr);
}

/**
 * 截取字符串，去除所有的标签
 */
function export($content, $len = 80) {
	$content = strip_tags($content);
	$str_len = mb_strlen($content, "UTF-8");
	if ($str_len > $len) {
		$content = mb_substr($content, 0, $len,"UTF-8") . "...";
	}
	return $content;
}
