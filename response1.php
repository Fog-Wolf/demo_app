<?php
class Response{
	/**
	 * 综合方式输出通信数据
	 * @param  [type] $code    [状态码]
	 * @param  string $message [提示信息]
	 * @param  array  $data    [数据]
	 * @param  [type] $type    [传输格式]
	 * @return [type]          [description]
	 */
	const JSON="json";
	public static function show($code,$message='',$data=array(),$type=self::JSON){
		if (!is_numeric($code)) {	
			return '';
		}
		//xxx.php?format=json
		$type=isset($_GET['format'])?$_GET['format']:self::JSON;
		$result=array(
				'code'=>$code,
				'message'=>$message,
				'data'=>$data,
			);
		if ($type=='json') {
			self::json($code,$message,$data);
			exit;
		}elseif($type == 'xml') {
			self::xmlEncode($code,$message,$data);
			exit;
		}else{
			//TODO
		}
	}



	/**
	 * 按json方式输出通信数据
	 * @param  [type] $code    [状态码]
	 * @param  string $message [提示信息]
	 * @param  array  $data    [数据]
	 * @return [type] $result  [description]
	 */
	public static function json($code,$message='',$data=array()){
		header("Content-Type:application/json");
		if(!is_numeric($code)){
			return '';
		}
		$result =array(
			'code'=>$code,
			'message'=>$message,
			'data'=>$data,
			);
		echo json_encode($result);
		exit;
	}
	/**
	 * Php生成xml四种方法:
	 * 手动拼xml字符串
	 * Domdocument
	 * Xmlwriter
	 * Simplexml
 	*/
 	public static function xmlEncode($code,$message="",$data=array()){
 		/**
 		header("Content-Type:text/xml");
 		$xml ="<?xml version='1.0' encoding='UTF-8'?>\n";
 		$xml.="<root>\n";
 		$xml.="<code>200</code>\n";
 		$xml.="<message>数据返回成功</message>\n";
 		$xml.="<data>\n";
 		$xml.="<id>1</id>\n";
 		$xml.="<name>John</name>\n";
 		$xml.="</data>\n";
 		$xml.="</root>\n";
 		echo $xml;
 		*/
 	if(!is_numeric($code)){
 		return '';
 	}
 	$result=array(
 			'code'=>$code,
 			'message'=>$message,
 			'data'=>$data,
 		);

 	header("Content-Type:text/xml");
 	$xml="<?xml version='1.0' encoding='UTF-8'?>";
 	$xml.="<root>";
 	$xml.=self::xmlToEncode($result);
 	$xml.="</root>";
 	echo $xml;
 	}

 	public static function xmlToEncode($data){
 		$xml=$num="";
 		foreach ($data as $key => $value) {
 			if(is_numeric($key)){
 				$num="id='{$key}'";
 				$key="item";
 			}
 			$xml.="<{$key} {$num}>";
 			$xml.=is_array($value)? self::xmlToEncode($value):$value;//递归
 			$xml.="</{$key}>";
 		}
 		return $xml;
 	}
}
