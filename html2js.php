
<?php 
$title = "JS 封装 HTML";
include_once('./header.php'); 
?>

<script src="./js/html2js.js" type="text/javascript" charset="utf8"></script> 
<div id="section">
<h2>HTML2JS</h2>
<h3>用javascript封装HTML</h3>
<textarea id="osource" class="HJtxt" onfocus="change()" onkeyup="change()" placeholder="输入html代码" autofocus="autofocus" ></textarea>
<textarea id="oresult2" class="HJtxt" readonly=true placeholder="此处显示转换为javascript输出html的代码"></textarea>
<div class='clear' style="padding:10px 0;border-top:1px solid #f2f2f2;margin-top:10px;"></div>
<h3>将javascript输出的内容还原为HTML源码</h3>
<textarea id="oresult" class="HJtxt" onfocus="rechange()" onkeyup="rechange()" placeholder="输入javascript代码"></textarea>
<textarea id="re" class="HJtxt" readonly=true placeholder="此处显示 javascript 输出后显示 的 html的代码"></textarea>

</div>

<div class='help'>
	<p>使用工具</p>
</div>
<?php include_once('./footer.php'); ?>
