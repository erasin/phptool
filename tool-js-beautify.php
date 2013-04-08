<?php 
$title = "Javascript格式化工具";
include_once('./header.php'); 
?>

<script src="./js/tool-js-beautify-min.js" type="text/javascript" charset="utf8"></script> 
<script src="./js/tool-beautify-min.js" type="text/javascript" charset="utf8"></script> 
<script src="./js/tool-html-beautify-min.js" type="text/javascript" charset="utf8"></script>
<style type="text/css">
textarea{width:98%;height:400px;}
input[type=text]{border:1px solid gray;}

</style>
<div id="section">
 <h1>格式化 Javascript</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">      
   <input type="submit" onclick="return do_js_beautify()" id="beautify" name="beautify" value="格式化">
   <select name="tabsize" id="tabsize">
     <option value="1">用“tab”键缩进</option>
     <option value="2">缩进2个空格</option>
     <option value="4" selected="selected">缩进4个空格</option>
     <option value="8">缩进6个空格</option>
   </select>
   <input type="checkbox" id="preserve-newlines" checked="checked" />
   <br /><br />
   <textarea name="content" id="content" >/*   粘贴你代码到这里并点击格式化按钮   */
/*   例如格式化以下这段代码   */
if('this_is'==/an_example/){do_something();}else{var a=b?(c%d):e[f];}
   </textarea>
  </form>
</div>

<div class='help'>
<ol>
<li>该工具主要用于将去掉空格的代码或者压缩成一行的格式化，方便阅读，不能将加密过的js还原破解;</li>
<li>粘贴你代码到文本区域并点击格式化按钮就可以将代码格式化；支持jQuery，YUI等框架.</li>
<li>JavaScript <a target="_blank" href="./tool-js-compressor.php">压缩工具 tool-js-compressor</a></li>
<li>由<a target="_blank" href="http://jsbeautifier.org/">http://jsbeautifier.org/</a>提供技术支持</li>
</ol>

</div>
<?php include_once('./footer.php'); ?>

