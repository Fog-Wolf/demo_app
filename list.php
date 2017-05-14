<?php
//http:app.com/list.php?page-=1&&pagesize=12
require_once('response1.php');
require_once('db.php');
$page =isset($_GET['page'])?$_GET['page']:1;
$pagesize =isset($_GET['pagesize'])?$_GET['pagesize']:2;
if (!is_numeric($page)||!is_numeric($pagesize)) {
	return Response::show(401,'数据不合法');
}
$offset =($page-1)*$pagesize;
$sql ="select * from yii_test limit ".$offset.",".$pagesize;
try{
	$connect = Db::getInstance()->connect();
}catch(Exception $e){
	//$e->getMessage();//做调试用，不建议把数据放到这里来
	return Response::show(403,'数据库连接失败');
}

$result = mysql_query($sql,$connect);
$videos =array();
while ($video = mysql_fetch_assoc($result)) {
	$videos[]=$video;
}

//转换成接口数据
if ($videos) {
	return Response::show(200,'首页数据获取成功',$videos);
}else{
	return Response::show(400,'首页数据获取失败');
}