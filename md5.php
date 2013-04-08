<?php 
$title = "md5 生成器";
include_once('header.php'); 
?>
<style>
#result{width:100%;}
dl{width:50%;float:left;}
dt{margin:5px; pading:3px;}
dd{border-bottom:#f2f2f2 solid 1px;margin:0;padding:3px;padding-left:40px;color:#666;}
</style>
<div id="section" class='frm'>
	<h1>hash md5</h1>

	<div class='clear' id='result'>
	<?php 
		$pwd=isset($_GET['md'])?trim($_GET['md']):time(); 
		$md5=md5($pwd);
		$md5_r=md5($md5);
		$md5_32 = substr($md5,8,16);
		#$dede_userpwd=ereg_replace("[^0-9a-zA-Z_@!\.-]",'',$pwd);
		$md5_dede = substr($md5,5,20);		
		
		$sha1 = sha1($pwd);
		$sha1_r = sha1($sha1);
		
		//随机数字
		
		$rand_num = substr(time(),rand(0,9),rand(0,9)).rand();
		$md5_rand	= md5($rand_num);
		$sha1_rand = sha1($rand_num);
	?>
	
	<form method="get" action='<?php echo $_SERVER['PHP_SELF']; ?>'  autocomplete="on"> 	
	<label><span>输入:</span><input type="input" name="md" id="md" placeholder="输入字符组合" value='<?php echo $pwd; ?>' /></label>
	<input type="submit" value="hash" >
	</form>
	<div class='clear' style='border-bottom:1px solid #f2f2f2;margin-top:8px;'></div>
	<?php
		echo "<dl>";
		echo "<dt>Time:</dt><dd>".date("Y-m-d H:i:s",$pwd).'</dd>';
		echo "<dt>now is</dt><dd> ".date("Y-m-d H:i:s",time()).'</dd>';
		echo "<dt>md5:</dt><dd>$md5</dd>";		
		echo "<dt>md5(md5):</dt><dd>$md5_r</dd>";
		echo "<dt>md5(32位{8:16}):</dt><dd>$md5_32</dd>";
		echo "<dt>dedePWD{5:20}:</dt><dd>$md5_dede</dd>";
		echo "</dl>";
		
		echo "<dl>";
		echo "<dt>sha1:</dt><dd>$sha1</dd>";
		echo "<dt>sha1(sha1):</dt><dd>$sha1_r</dd>";
		echo "</dl>";
		
		echo "<dl>";
		echo "<dt>随机数字：</dt>";
		echo "<dd>$rand_num</dd>";
		echo "<dt>md5:</dt><dd>$md5_rand</dd><dt>sha1:</dt><dd>$sha1_rand</dd>";
		echo "</dl>";
		
	?>
	<div class='clear'></div>
	</div>

</div>
<div class='help'>
	<h2> <?php echo $title; ?> </h2>
</div>
<?php include_once('footer.php'); ?>

