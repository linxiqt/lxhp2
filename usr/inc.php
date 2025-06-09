<?php
session_start(); #session
error_reporting(1); #非致命错误不报错
define('ROOT', dirname(dirname(__FILE__)));
date_default_timezone_set("PRC"); #时区
$date = date('Y-m-d h:i:s', time()); #时间
include_once(ROOT . "/usr/tool/function.php"); #引入相关文件
include_once(ROOT . "/usr/tool/sqlite.php");
@include_once(ROOT . "/config.php"); #config
//-------------------------------
#安装1
$redirect_path = "./usr/install";
// 跳转到指定路径
if (!$dbconfig['dir']) {
	alert('你还没有安装哦,记得使用PHP7.4', $redirect_path);
}
//-------------------------------
if (!file_exists($dbconfig['dir'])) {
	alert('数据库文件丢失，请删除配置文件重新安装', '');
}
#连接数据库及操作类
@$DB = DB::connect($dbconfig['dir']);
if (!$DB) {
	alert('数据库链接错误! 请检查数据库配置文件和数据库文件', '');
}

//-------------------------------


#检测数据表
if (DB::query("select * from zyyo_data where 1") == FALSE) {

	alert('关键数据表缺失，请删除config.php后重新安装', '');
}
#获取数据
$data = DB::get_row("SELECT * FROM zyyo_data WHERE id=1 limit 1");

#mysql操作类

include_once(ROOT . "/usr/tool/content.php");
#后台登录
if (isset($_COOKIE["admin_token"])) {
	$session = md5($data['user'] . $data['pwd']);
	$session1 = $_COOKIE["admin_token"];
	if ($session == $session1) {
		$adminlogin = 1;
	}
}
