<?php

$title='php markdown 编辑器';
include_once(dirname(__FILE__).'/header.php'); 
link_style('dingus-min.css');

	error_reporting(E_ALL);
	if (!empty($_POST['input'])) {
      include_once(ROOT.'lib/markdownify/markdownify_extra.php');
		if (!isset($_POST['leap'])) {
			$leap = MDFY_LINKS_EACH_PARAGRAPH;
		} else {
			$leap = $_POST['leap'];
		}
		
		if (!isset($_POST['keepHTML'])) {
			$keephtml = MDFY_KEEPHTML;
		} else {
			$keephtml = $_POST['keepHTML'];
		}
		if (!empty($_POST['extra'])) {
			$md = new Markdownify_Extra($leap, MDFY_BODYWIDTH, $keephtml);
		} else {
			$md = new Markdownify($leap, MDFY_BODYWIDTH, $keephtml);
		}
		if (ini_get('magic_quotes_gpc')) {
			$_POST['input'] = stripslashes($_POST['input']);
		}
		$output = $md->parseString($_POST['input']);
	} else {
		$_POST['input'] = '';
	}
?>
<div  id="section">
<div id="app" style="width:96%;max-width:96%">
<h1>HTML2Markdown 转化器</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
HTML Input &gt;&gt;<br/>
				<textarea style="width:100%;"name="input"rows="25" cols="80"><?php echo htmlspecialchars($_POST['input'], ENT_NOQUOTES, 'UTF-8'); ?></textarea>
			<label for="extra">Markdownify Extra: <input name="extra" checked="checked" id="extra" type="checkbox" value="1"  /></label>
			<label for="leap">Links after each block elem: <input name="leap" id="leap" type="checkbox" value="1"  /></label>
			<label for="keepHTML">keep HTML: <input name="keepHTML" id="keepHTML" type="checkbox" value="1" checked="checked" /></label>
			<input type="submit" name="submit" value="submit" />
		</form>
		<?php if (!empty($_POST['input'])): ?>
		<pre><?php echo htmlspecialchars($output, ENT_NOQUOTES, 'UTF-8'); ?></pre>
		<?php endif; ?>
<div class='clear'></div>
</div>
</div>

<?php
include_once(dirname(__FILE__).'/footer.php'); 
?>
