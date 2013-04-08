<?php 
$title = "JavaScript代码压缩-js代码压缩-压缩JS";
include_once('./header.php'); 
?>
<script src="./js/tool-js-compressor-min.js" type="text/javascript" charset="utf8"></script> 
<style type="text/css">
textarea{width: 90%;	}
input[type=text]{border:1px solid gray;background-color: #fff;}
label{float: left;}
</style>

<div id="section" class="frm">

<h1>JavaScript 压缩</h1>
<form action="" onsubmit="return crunch(this)">
<h4><strong>输入</strong></h4>
<textarea name="codeIn" rows="10" ></textarea>
<div class="clear">
	<label><span>字节数:</span><input name="sizeIn" type="text" size="10" disabled="disabled" /></label>  
	<label><span>状态:</span><input name="statusMsg" type="text" size="30" disabled="disabled" /></label>
<input class="button" type="submit" value="压缩" /> 
<input class="button" type="reset" value="清除" />
</div>

<h4><strong>输出</strong></h4>
<textarea name="codeOut" rows="10"></textarea>
<p>
	<label><span>字节数:</span><input name="sizeOut"  type="text" size="10" disabled="disabled" /></label>
	<label><span>减少:</span><input name="sizeDiff" type="text" size="10" disabled="disabled" /></label>
	<label><span>% 减少率:</span><input name="pctOut"   type="text" size="10" disabled="disabled" /></label>
<input class="button" type="button" value="全选" onclick="this.form.codeOut.select();this.form.codeOut.focus();" />
</p>
</form>
<div>
<p>&nbsp;&nbsp;这程序是由Mike Hall写的，JavaScript的压缩不是为了保护代码而压缩，而是压缩后的js代码文件可以小一倍甚至多倍，从而使这个js代码快速的下载到客户端，特别js文件较大时速度效果非常明显．
<br />
<strong>使用方法:</strong><br />
&nbsp;&nbsp;使用下面的表单,你可以浓缩JavaScript代码.只用将任何脚本代码粘贴到输入的文本框,压下 '压缩' 按钮,那浓缩的版本就出现在 '输出' 里.
然后你可以使用 '全选' 按钮,快速选中'输出'里的代码,剪切粘贴到一个新的源码文件.<br />
</div>
</div>

<div class='help'>
<h3>使用须知：</h3>
<p>大量的代码运行效率较低，cpu占用较高，请耐心等待！呵呵</p>
<p>1.保存好您的开发版本，便于以后修改维护；</p>
<p class="STYLE2">2.压缩前，检查每一行代码确保以“;”结束;</p>
<p class="STYLE2">3.if...else...语句加上“{}”，即如果你的i语句为<br />
if(...)<br />
...//一条语句<br />
else<br />
...//一条语句</p>
<p class="STYLE2">请改为<br />
if(...)<br />
{...}//一条语句<br />
else<br />
{...}//一条语句</p>
-----------------------
<p>
格式化工具：<a href="./tool-js-beautify.php"> js格式化工具 </a><br>
yui压缩工具：<a href="http://www.refresh-sf.com/yui/" target="_blank">yuicmpressor</a>

</p>
</p>
</div>
<?php include_once('./footer.php'); ?>
