<?php
require_once('response1.php');

 $arr =array(
		'id'=>1,
		'name'=>'John',
	);
 Response::json(200,'数据返回成功',$arr);
