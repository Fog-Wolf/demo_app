<?php

$arr =array(
		'id'=>1,
		'name'=>'John'
	);

$data = "输出json数据";
//将变量data由UTF-8的编码方式转换为GBK的编码方式
$new = iconv('UTF-8','GBK',$data);
//该函数只能接收UTF-8编码的数据，如果传递其他格式的数据改函数会返回null
echo json_encode($arr);