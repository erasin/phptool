<?php
$tool = array(
	'tool.seo.link.php' => '网页收录排名',
	'tool.seo.keywords.php' => '关键词排名数量查',
	'html2js.php' => 'html 2 js',
	'tool-js-compressor.php' => 'JS 压缩',
	'tool-js-beautify.php' => 'JS 格式化',
	'base64.php' => 'php的base64解密和加密 ',
	'markdown.php' => 'Markdown2HTML',
	'markdownify.php' => 'HTML2Markdown',
	'md5.php' => 'md5',
	'range.keywords.php' => '随机生成',
	'gb2big5.php' => '简繁字体转换',
	'hanzi2pinyin.php' => '汉字转换为拼音',
	'wannianli.php' => '万年历'
);
echo "<menu>";
foreach($tool as $url => $name ){
	echo "<li><a href='".$url."'>".$name."</a></li>";
}
echo "</menu>";
?>

<?php
  set_error_handler("customError");
  function customError($errno, $errstr) { 
    echo "error:".$errno.'=>'.$errstr.'<br/>';
  }
  #ini_set('max_execution_time', '100'); //超时问题
?>
