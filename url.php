<?php
$url = isset($_GET['url'])? $_GET['url'] : 'http://www.baidu.com';
?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>reader url</title>
		<base href="<?php echo $url;?>"/>
	</head>
	<body id="Hallo" onload="">
	<div class='top' style='display:block;border-bottom:2px solid #333;'>
	<form action="http://<?php echo $_SERVER['HTTP_HOST'];?>/url.php" method="get" accept-charset="utf-8">
			<label for="url" style="background-color:#333;color:#fff;">URL</label><input type="text" name="url" value="<?php echo $url;?>" id="url" style='border:1px solid #333;'>
			<input type="submit" value="Continue →" style="border:1px solid #333;">
<?php
echo 'remote&gt;'.$_SERVER['REMOTE_ADDR'].'--&gt;server&gt;'.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].'--&gt;status&gt;'.$_SERVER['REDIRECT_STATUS'].'<br/>';
?>
		</form>
	</div>
<?php
$str = file_get_contents(trim($url));
$str = isUTF8($str)?trim($str):iconv("gb2312","utf-8//IGNORE",$str);
echo $str;
// 编码切换
function isUTF8($word)    {    
	if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){    
		return true;    
	}else{    
		return false;    
	}
}
// 解析器
?>
	</body>
</html>

