<?php 
$title = "IP";
include_once('header.php'); 
?>
<style>
#result{width:100%;}
dl{width:50%;float:left;}
dt{margin:5px; pading:3px;}
dd{border-bottom:#f2f2f2 solid 1px;margin:0;padding:3px;padding-left:40px;color:#666;}
</style>
<div id="section" class='frm'>
	<h1>ip查询</h1>

	<div class='clear' id='result'>
	<?php 
		$domain=isset($_GET['domain'])?trim($_GET['domain']):''; 
        $ip='';
	?>
	
	<form method="get" action='<?php echo $_SERVER['PHP_SELF']; ?>'  autocomplete="on"> 	
	<label><span>输入域名:</span><input type="input" name="md" id="md" placeholder="输入字符组合" value='<?php echo $pwd; ?>' /></label>
	<input type="submit" value="hash" >
	</form>
	<div class='clear' style='border-bottom:1px solid #f2f2f2;margin-top:8px;'></div>
    <script type="text/javascript" src="http://fw.qq.com/ipaddress" charset='gb2312'></script>
    <dl>
   <script type="text/javascript" charset="utf-8">
       document.writeln('<dt>'+IPData[2]+IPData[3]+'</dt><dd>'+IPData[0]+'</dd>');
   </script>  
	<?php
		echo "<dt>$domain</dt><dd>$ip</dd>";		
	?>
</dl>
	<div class='clear'></div>
	</div>

</div>
<div class='help'>
	<h2> <?php echo $title; ?> </h2>
</div>
<?php include_once('footer.php'); ?>

