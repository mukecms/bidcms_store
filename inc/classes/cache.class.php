<?php

class cache {
    //Path to cache folder
    public $cache_path = 'cache/';
    //Cache file extension
    public $cache_extension = '#';
    
    /**
     * 构造函数
     */
    public function __construct($cache_path = 'cache/', $cache_exttension = '#') {
        $this->cache_path = $cache_path;
        $this->cache_exttension = $cache_exttension;
    }
    
    //增加一对缓存数据
    public function set($key, $value,$timeout=0) {
	
		$data['timeout']=$timeout>0?(time()+$timeout):0;
		$data['data']=$value;
	
		$filename = $this->_get_cache_file($key);
	
		//写文件, 文件锁避免出错
		file_put_contents($filename, serialize($data), LOCK_EX);
    }
    
    //删除对应的一个缓存
    public function delete($key) {
        $filename = $this->_get_cache_file($key);
        if(!unlink($filename)){
			file_put_contents($filename, '', LOCK_EX);
		}
    }
    
    //获取缓存
    public function get($key) {
		if ($this->_has_cache($key)) {
            $filename = $this->_get_cache_file($key);
			$data = file_get_contents($filename);
            
            if (empty($data)) {
                return false;
            }
            $data=unserialize($data);
            
			if($data['timeout']=='0' || $data['timeout']>time()){
				return $data['data'];
			}
			$this->delete($key);
			return false;
        }
    }
    
    //删除所有缓存
    public function flush() {
        $fp = opendir($this->cache_path);
        while(!false == ($fn = readdir($fp))) {
            if($fn == '.' || $fn =='..') {
                continue;
            }
            unlink($this->cache_path . $fn);
        }
    }
    
    //是否存在缓存
    private function _has_cache($key) {
        $filename = $this->_get_cache_file($key);
		if(file_exists($filename)) {
            return true;
        }
        return false;
    }
    
    //验证cache key是否合法，可以自行增加规则
    private function _is_valid_key($key) {
        if ($key != null) {
            return true;
        }
        return false;
    }
    
    //私有方法
    private function _safe_filename($key) {
        if ($this->_is_valid_key($key)) {
            return md52($key);
        }
        //key不合法的时候，均使用默认文件'unvalid_cache_key'，不使用抛出异常，简化使用，增强容错性
        return 'unvalid_cache_key';
    }
    
    //拼接缓存路径
    private function _get_cache_file($key) {
		$dir=explode(':',$key);
		$d=$this->cache_path.$dir[0];
		if (!is_dir($d)) {
            mkdir($d, 0777);
        }
		if(count($dir)>2){
			$d=$this->cache_path.$dir[0].'/'.$dir[1];
			if (!is_dir($d)) {
				mkdir($d, 0777);
			}
		}
		return $d.'/'.$this->_safe_filename($key).$this->cache_extension;
    }
}
?>
