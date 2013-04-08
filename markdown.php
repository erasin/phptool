<?php 
$title='php markdown 编辑器';
include_once(dirname(__FILE__).'/header.php'); 
?>

<link rel="stylesheet" href="css/markdown.css" />
<script type="text/javascript" src="js/made.js"></script>
<script type="text/javascript" src="js/Markdown.Converter.js"></script>

<div class='help'>
<h2>帮助文档</h2>
<a href='http://opengit.org/open/?f=source_markdown-basics' target='_blank'> MARKDOWN 书写规则 </a>
</div>
<?php 
include_once(LIB.'markdown.php');
$title='php markdown 编辑器'; 
link_style('dingus.css');
link_style('markdown.css');
$mdtext = $_POST['markdown'];
$source=Markdown($mdtext);
?>
<div id="titre">
</div>
<div id="app">
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>" >
	<div>
		<label for="markdown">Text Source:</label><br />
		<textarea name="markdown" id="markdown" rows="25" cols="80"><?php echo $mdtext ?></textarea>
	</div>

	<div id="buttonrow">
	<label>Results:&nbsp;</label> 
	<label><input type="radio" name="view" value="source">HTML源码</label>
	<label><input type="radio" name="view" value="preview">预览效果</label>
	<label><input type="radio" name="view" value="both" checked="checked">HTML源码 &amp; 预览</label>	
	<input class='button' type="submit" name="convert" value="Convert" />
	</div>
	</form>
	
	<?php 
	if(isset($_POST['view'])):
	switch($_POST['view']){
		case 'source':
	?>	
	<div>
		<label for="xhtml">HTML Source:</label><br>
		<textarea id="xhtml" rows="25" cols="80" readonly="readonly"><?php echo $source; ?></textarea>
	</div>
	<?php 
			break;
		case 'preview':
	?>
	<div>
		<label for="preview">HTML Preview:</label>
		<div id="preview" class="html"><?php echo $source; ?></div>
	</div>
	<?php
			break;
		case 'both':
	?>	
	<div>
		<label for="xhtml">HTML Source:</label><br>
		<textarea id="xhtml" rows="25" cols="80" readonly="readonly"><?php echo $source; ?></textarea>
	</div>
	<div>
		<label for="preview">HTML Preview:</label>
		<div id="preview" class="html"><?php echo $source; ?></div>
	</div>
	<?php 
			break;
	}
	endif;
	?>
<div class='clear'></div>
</div>

<div id="cheatset">
<div>TIME:<?php echo(time());?></div>
<h2>Syntax 帮助脚本</h2>

<h3>语气词</h3>

<pre><code>*下划线*   **加粗**
_下划线_   __加粗__
</code></pre>

<h3>链接</h3>

<p>内嵌式:</p>

<pre><code>一个 [例子](http://url.com/ "Title")
</code></pre>

<p>辞典引用式 (其中'title提示'可省略):</p>

<pre><code>一个 [例子][id]. 添加辞典源后，
在页面内的任何位置都可以使用:

  [id]: http://example.com/  "Title提示"
</code></pre>

<h3>图片</h3>

<p>内嵌 (titile提示可选):</p>

<pre><code>![alt 文本](/path/img.jpg "Title提示")
</code></pre>

<p>辞典引用:</p>

<pre><code>![alt 文本][id]

  [id]: /url/to/img.jpg "Title"
</code></pre>

<h3>标题</h3>

<p>setext 样式:</p>

<pre><code>标题 1
========

标题 2
--------
</code></pre>

<p>atx-样式 (结束 #可省略（不建议省略）):</p>

<pre><code># 标题 1 #

## 标题 2 ##

###### 标题 6
</code></pre>

<h3>列表</h3>

<p>有序序列，不是不使用段落:</p>

<pre><code>1.  第一
2.  第二
</code></pre>

<p>无序序列:</p>

<pre><code>*   A list item.

    前天添加一些缩进，可形成多端落列表.

*   Bar
</code></pre>

<p>也可以这样使用他们:</p>

<pre><code>*   Abacus
    * ass
*   Bastard
    1.  bitch
    2.  bupkis
        * BELITTLER
    3. burper
*   Cunning
</code></pre>

<h3>引用块</h3>

<pre><code>&gt; Email-style angle brackets
&gt; are used for blockquotes.

&gt; &gt; And, they can be nested.

&gt; #### Headers in blockquotes
&gt; 
&gt; * You can quote a list.
&gt; * Etc.
</code></pre>

<h3>编码转义</h3>

<pre><code>`&lt;code&gt;` spans are delimited
by backticks.

You can include literal backticks
like `` `this` ``.
</code></pre>

<h3>预定义</h3>

<p>使用4个空格或者1一个缩进符号就可形成pre预定义格式化内容（自动转义）.</p>

<pre><code>This is a normal paragraph.

    This is a preformatted
    code block.
</code></pre>

<h3>水平线</h3>

<p>三个以上的星号 * 或者 - 加空格就可以了:</p>

<pre><code>---

* * *

- - - -
</code></pre>

<h3>编辑多行</h3>

<p>如果想不换段落换行则在行最后加上2个以上的空格即可:</p>

<pre><code>Roses are red,   
Violets are blue.
</code></pre>
</div>
<div class='clear'></div>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
