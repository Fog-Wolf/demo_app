<?php
require_once('response1.php');
require_once('file.php');
 $arr =array(
		'id'=>1,
		'name'=>'John',
	);
 // Response::json(200,'数据返回成功',$arr);
$file = new File();
//生成缓存
// if ($file->cacheData('index_mk_cach',$arr)) {
// 	echo 'success';
// }else{
// 	echo 'error';
// }
//读取缓存
//$file->cacheData('index_mk_cach',null)第二个参数传$value=null
if ($file->cacheData('index_mk_cach')) {
	var_dump($file->cacheData('index_mk_cach'));exit;
	echo 'success';
}else{
	echo 'error';
}

?>
