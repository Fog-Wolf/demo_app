<?php
	$redis=new Redis();
	$redis->connect('127.0.0.1',6379);//设置本地连接端口和ip
	$redis->set('say','hello');
	Echo $redis->get('say');
?>