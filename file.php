<?php

class File{
	private $_dir;
	const EXT='.txt';
	public function __construct(){
		//默认存放缓存数据的文件夹
		$this->_dir=dirname(__FILE__).'/files/';
	}
	/**
	 * 缓存封装
	 * @param  [type] $key   [缓存文件名]
	 * @param  string $value [缓存数据]
	 * @param  string $path  [路径]
	 * @return [type]        [description]
	 */
	public function cacheData($key,$value='',$path=''){
		$filename=$this->_dir.$path.$key.self::EXT;
		//生成缓存
		if ($value !=='') {//将value值写入缓存
			if (is_null($value)){
				//如果value是空，就会将缓存文件删除
				return unlink($filename);
			}
			$dir =dirname($filename);
			if (!is_dir($dir)) {//如果没有该目录就创建该目录
				mkdir($dir,0777);
			}
			//写入成功，返回字节数
			return file_put_contents($filename, json_encode($value));
		}

		//获取缓存
		if (!is_file($filename)) {
			return FALSE;
		}else{
			return json_decode(file_get_contents($filename),true);
		}
	}
}