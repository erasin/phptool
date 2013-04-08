<?php 
$title = "网页百度排名查询";
include_once('./header.php'); 
?>
<script type='text/javascript'>
function tocopy(){
  	tbc = document.getElementById('tbc');
}
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
  <script type='text/javascript'>
  $(document).ready(function(){
    $('#shownum').click(function(){
     $('#tbc').html($('#tbr').html());
     $("#tbr").css({'display':'block','float':'left'}); 
     $('#tbc').css({'display':'block','float':'left'}); 
     $("#tbc .key").remove();            
     $("#tbc .xu").remove();
    });
    
	$("form").submit( function () {
	    $('#result').html('正在登录中～～～');
	    $.ajax({
	        url:'<?php echo $_SERVER['PHP_SELF']; ?>',
	        data:{
	        	
	          },
	        type:'post',
	        dataType:'json',
	        success:function(data){
	            $('#password').val('');
	            $('#result').html(data.info);
	            if(data.status!=1) $('#verifyImg').attr('src','__URL__/_verify/adv/1/' + (new Date().getTime()));
	            else window.location.href='__APP__/Index';
	            }
	    });
	    return false;
	});
    
    
  });
  </script>
<div id="section">

<h1>关键词查询</h1>
<div class="frm">
<form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>' autocomplete="on"> 
    <strong>关键词：</strong>每行只能出现一个关键词 <br>
    <textarea name='keywords' id='keywords' style='width:600px;height:200px;' required="required" placeholder="按行输入关键词,按行输入，不可为空" autofocus="autofocus" ><?php if(isset($_POST['keywords'])) echo $_POST['keywords']; ?></textarea>
    <br><label><span>标记1:</span><input type="input" name="tag" id="tag" list="list_tag1" required="required" placeholder="标记符号，不可为空" value="<?php echo isset($_POST['tag'])?trim($_POST['tag']):'';?>" /></label>
    <label><span>标记2:</span><input type="input" name="tag2" id="tag2" value="<?php echo isset($_POST['tag2'])?trim($_POST['tag2']):'';?>" placeholder="第二个标记符号,默认为空" /></label>
    <br><label><span>天数:</span><input type="input" name="lm" id="lm" step="7" pattern='[0-9]{3}' placeholder="0" title="365天以内数字,默认0不限" /></label>
    <input type="submit" name="convert" value="提交">
    <br>
</form>
</div>
<button id='shownum'>只显示数字</button>
<div class='clear'></div>
<?php
include_once('baidu.php');
$tag=0;
$keywords=array();
//$wd=filter_var($str_title,FILTER_SANITIZE_ENCODED);
$tag1=isset($_POST['tag'])?htmlspecialchars(trim($_POST['tag'])):0;     
$tag2=isset($_POST['tag2'])?htmlspecialchars(trim($_POST['tag2'])):0;
$lm=isset($_POST['lm'])?trim($_POST['lm']):0;
$keyword=isset($_POST['keywords'])?htmlspecialchars(trim($_POST['keywords'])):0;
$enter   = array("\r\n", "\n", "\r");
$keyword = str_replace($enter,",",$keyword);
$keywords=explode(',',$keyword);
  
if($tag1 && $keywords){
  echo "<div class='clear info'>标记为<strong>$tag1,$tag2</strong>; 共有".count($keywords)."个关键词";
  echo $lm?" $lm 天以内的排名状况":" 默认情况百度查询首页排名状况。";
  echo "</div>";
  echo "<table id='tbr' border=1>";
  echo "<tr><th class='xu'>序号</th><th class='key'>关键词</th><th>统计</th></tr>";
  $baidu=new Baidu();
  $str = '';
  foreach ($keywords as $k => $u){ 
 	$li = $baidu -> keywordTags($u,$tag1,$lm,$tag2);
 	$i = $k+1;
 	if(!$li){
 		$str.="<tr><td class='xu'>$i</td><td style='color:red' colspan='2'>读取错误！</td></tr>";
 	}else{
		$str .= "<tr> <td class='xu'>$i</td> <td class='key'><a href='".$li[0]."' target='_blank' >$u</a></td> <td class='count'>".$li[1]."</td> </tr>";
 	} 	
  }
  unset($baidu);
  echo $str;
  echo "</table>";
}else{
  echo "<div class='clear' style='color:red' >请输入正确的参数</div>";
}
?> 
<table id='tbc' border=1></table>
</div>
<div class='help'>
	<h2>使用</h2>
	<p> 现在还没有使用 ajax，所以查询的时候数量太多，则需要很长时间内才能显示，建议20个词查询。</p>
</div>
<?php include_once('./footer.php'); ?>
