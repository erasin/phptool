<?php
/**
 * 关于百度查询的一个工具封装
 * @version 0.1.0
 * @author erasin.wang
 * @license LGPL2
 */
class Baidu{
	private $fengefu;	//百度查询时关键词分割符号（红色部分）
	private $prel_rule;	//存储查询字符串规则
	
	/**
	 * 初始化
	 */
	function __construct(){
		$this->fengefu	=array("&lt;em&gt;","&lt;/em&gt;","&lt;font&gt;","&lt;/font&gt;","&lt;tr&gt;","&lt;/tr&gt;","&lt;td&gt;","&lt;/td&gt;","&lt;br&gt;","&lt;/a&gt;","&lt;/span&gt;","&lt;span class=&quot;g&quot;&gt;");
		$this-> prel_rule = array(
			"biaoTi"	=>	"#&lt;title&gt;(.*?)&lt;/title&gt;#is",
			"shouLu"	=>	"#&lt;div class=&quot;nors&quot;&gt;#is", // 判断百度是否有提示没有
			"paiMing"	=>	"#&lt;span class=&quot;g&quot;&gt;(.*?)&lt;/span&gt;#s",
			"keywordTags"	=>	"#id=&quot;([0-9]{1,2})&quot;(.*?)&lt;/table&gt;#s"
		);	
	}

	/**
	 * 按照所给的链接查询收录情况
	 * @access public
	 * @param string $url
	 * 
	 * @return array 返回结果: [标题链接,查询链接,是否收录bool]
	 */
	 public function shouLu($url){
	 	$return = array();
   		$url=trim($url);
    	if(!$url) exit();
    	
    	# 短链接
		preg_match("/http:\/\/(.*)/s",$url,$url_str);
		$short_url=$url_str[1];    
		unset($url_str);
	 	
	 	# 标题链接
	 	$page= $this->gb2utf8($url) or false;
		if($page){
			preg_match($this->prel_rule['biaoTi'],$page,$title);
			unset($page);
			if(!empty($title)){
				$title=trim($title[1]);
				$return[0]=$this->msubstr($title,0,20); //取前20个字				
			}else{
				return false;
			}
		}else{
			return false;
		}	 	
		
	 	# 查询链接
		$url_code=$this->baiduUrlEncode($url);
		$return[1]="http://www.baidu.com/s?wd=$url_code";
		
	 	# 判断收录
		$page = $this->gb2utf8($return[1]) or false;
		if($page){
			preg_match($this->prel_rule['shouLu'],$page,$shoulu);  //使用一次匹配
	      unset($page);
	      $return[2]=!empty($shoulu[0])?false:true; //空置表示收录 非空表示收录
		}
	 	return $return;
	 }
	 
	 /**
	  * 查询 在一个"关键词"百度查询结果中,1个"标记 tag"或2个标记同时出现的次数
	  * @access public
	  * @param string keyword
	  * @param string tag1
	  * @param int $lm 百度参数,查询天数内 默认为 0
	  * @param string tag2 默认为空
	  * 
	  * @return Array baidu_url 查询链接 int 出现次数
	  */
	  public function keywordTags($keyword,$tag1,$lm=0,$tag2=0){
	  	$keyword = $this->baiduUrlEncode($keyword);
		$baidu_url="http://www.baidu.com/s?wd=".$keyword;
		if($lm) $baidu_url.="&lm=$lm"; 
		$return[0]=$baidu_url;
		$page = $this->gb2utf8($baidu_url) or false;
		if($page){
			$page = str_replace($this->fengefu,"",$page);
			preg_match_all($this->prel_rule['keywordTags'],$page,$tables);
			$tables = $tables[0];
			unset($page);
			$count=0;
		  foreach ($tables as $k => $u){
			if(!!$tag2){           
				if(!!stripos($u,$tag1) && stripos($u,$tag2)){
					$count+=1;
				}
			}else{
				if(!!stripos($u,$tag1)){
					$count+=1;
				}
		    }
		  }
		  unset($tables);
		  $return[1]=$count;
		}else{
			return false;			
		}
	  	return $return;
	  }
	  
	  /**
	   *  @ 关键词标记
	   *  for ajax
	   * @return json jsonString
	   */
	 public function keywordTagsAJAX(){}
	 
	 /**
	  * 查询首页 首页关键词排名
	  */
	 public function keywordIndex(){}

	
	/**
	 * 采集内容并将内容转化为utf8编码
	 * @access protected
	 * @param string $url 采集路径
	 * 
	 * @return string $str 转化后的内容
	 */
   protected function gb2utf8($url){
        $str = htmlspecialchars(file_get_contents($url)); 
        //$str = $this->isUTF8($str)?trim($str):iconv("gb2312","utf-8//TRANSLIT",$str);
        $str = $this->isUTF8($str)?trim($str):iconv("gb2312","utf-8//IGNORE",$str);
        return $str;
    }
    
    /**
     * 判定字符串是否我utf-8编码
     * @access protected
     * @param string $word
     * 
     * @return bool description
     */
	protected function isUTF8($word)    {    
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){    
			return true;    
		}else{    
			return false;    
		}
	}
    
	/**
	 * 将字符串编码为百度搜索的字符
	 * @access protected
	 * @param string $str
	 * 
	 * @return string 
	 */
	protected function baiduUrlEncode($str){
		//filter_var($str_keyword,FILTER_SANITIZE_ENCODED);
		//return urlencode(mb_convert_encoding($url, 'gb2312', 'utf-8'));
		return urlencode(iconv('utf-8','gb2312',$str));
	}					
	
	/**
	* 剪切字符串
	* @link thinkphp 来自thinkphp的字符串库文件
	* @access public
	* @param string $str
	* @param int $start 开始位置
	* @param int $length 截取长度
	* @param string charset 默认utf8
	* @param bool $suffix 显示后缀符号...
	* 
	* @return string
	*/     
	public function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
	{
		if(function_exists("mb_substr"))
			return mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			return iconv_substr($str,$start,$length,$charset);
		}
		$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']	  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']	  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
		if($suffix) return $slice."…";
		return $slice;
	}

} 
?>
