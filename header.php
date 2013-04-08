<?php
$title = isset($title) ? $title : "工具箱";
$keyword = isset($keyword) ? $keyword : "";
$info = isset($info) ? $info : "";
include_once('../config.php');
include_once(LIB.'function.php');
?>
<!DOCTYPE HTML> 
<html> 
<head> 
<title><?php echo ($title);?></title> 
<meta name="keywords" content="<?php echo $keyword ;?>" /> 
<meta name="Description" content="<?php echo $info ;?>" /> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
link_script('jquery16.js');
link_style('og.css');
link_style('markdown.css');
?> 
<link href="style.css" rel="stylesheet" type="text/css" /></link>
</head> 
<body> 
