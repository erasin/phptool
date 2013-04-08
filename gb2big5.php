
<?php 
$title = "汉字简体繁体转换";
include_once('./header.php'); 
?>
<script src="./js/gb2big5-min.js" type="text/javascript" charset="utf8"></script> 
<div id="section">
    <h1><?php echo $title;?></h1>
    <input onclick="paste('txt')" type="button" value="粘贴"> 
    <input onclick="convert(0)" type="button" value="转化为简体"> 
    <input onclick="convert(1)" type="button" value="转化为繁体"> 
    <input onclick="convert(2)" type="button" value="转化为QQ个性繁体(火星文)"> 
    <input onclick="copy('txt')" type="button" value="复制"> 
    <input onclick="cut('txt')" type="button" value="剪切"> 
    <input onclick="txt.value=''" type="button" value="清空">
    <br/><br/>
    <textarea id="txt" rows="15" cols="80" value="" placeholder="输入内容... 简体字 》》》 繁體字 ...."></textarea>
<br/><br/>
</div>
<div class='help'>
	<p>help</p>
</div>
<?php include_once('./footer.php'); ?>
