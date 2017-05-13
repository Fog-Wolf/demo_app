<?php
require_once('response1.php');

 $data =array(
		'id'=>1,
		'name'=>'John',
		'type'=>array(1,2,3),
	);
Response::show(200,'success',$data,'json');