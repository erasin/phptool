<?php 
$title = "网页百度收录查询";
include_once('./header.php'); 
?>
<script type='text/javascript'>
function tocopy(){
  	tbc = document.getElementById('tbc');
}
</script>
<div id="section">
<h1>网页百度排名查询</h1> 
<div class="info">
    每行只能出现一条url地址<br>
    最好查询同一资源的批量链接<br>
	
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
    <textarea name='url' id='url' style='width:600px;height:200px;' placeholder="输入html代码组" autofocus="autofocus"><?php if(isset($_POST['url'])) echo $_POST['url']; ?></textarea>
    <br/>
    <input type="submit" name="convert" value="提交">
</form>
<table border=1>
<tr><th>链接</th><th>标题</th><th>收录</th></tr>
<?php                              
#header("Content-Type:text/html;charset=gb2312");
if(isset($_POST['url'])){
  include_once('baidu.php');
  //$url=array("http://www.szlcsy.com/wiki/status/1309435438.html",'http://www.lchssy.com/zhanshi/show31.html','http://www.0571lkhs.com/a/zhuyi/1134.html');
  //$arr_url=explode(',',file_get_contents('url.txt'));
	$url=trim($_POST['url']);
	$enter   = array("\r\n", "\n", "\r");
	$url = str_replace($enter,",",$url);
	$arr_url=explode(',',$url);
	#echo $url;
	#print_r($arr_url);
	$bai=new Baidu();
	$str='';
	foreach ($arr_url as $k => $u){
	    $li = $bai->shouLu($u);
	    //var_dump($li);
	    if(!$li){
	    	$str.="<tr><td style='color:red' colspan='3'>输入错误！</td></tr>";
	    }else{
	     	$sl=$li[2]?"<span style='color:green'>已收录</span>":"<span style='color:red'>未收录</span>";
	    	$str.="<tr><td>$u</td><td><a href=$u  target='_blank'>$li[0]</a></td><td><a href=$li[1]  target='_blank'>$sl</a></td></tr>";
	     }
	}	
	unset($bai);
	echo $str;
}
?>
</table>
</div>
<div class='help'>
	<h2>使用</h2>
	
</div>
<?php include_once('./footer.php'); ?>
