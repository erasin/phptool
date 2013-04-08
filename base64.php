<?php 

class base64{
    /**
    *  加密
    */
    function encodeBase64($str){
        $str_encode = "\n eval(gzinflate(base64_decode("."'".base64_encode(gzdeflate($str))."'".")));\n";
        return htmlspecialchars($str_encode);
    }
    
    function decodeBase64($str){
        $pos = strpos($str,'base64_decode');var_dump($pos);
        if($pos){
            preg_match_all("#base64_decode[(]{1}['\"]{1}(.*?)['\"]{1}[)]{1}#is",$str,$str2);
            $str = $str2[1][0];
        }
        $str_decode = gzinflate(base64_decode($str));
        return htmlspecialchars($str_decode);
    }
}

if($_POST && $_POST['code']){
    $base64 = new base64();
    $code=$_POST['code'];
    switch ($_POST['mode']){
        case 0:
            $str = $base64->encodeBase64($code);
            break;
        case 1:
            $str = $base64->decodeBase64($code);
            break;
        default:
            $str = 'error';
            break;
    }
}
?>

<?php 
$title = "php代码加密与解密";
include_once('header.php');
?>
<div id="section">
	<h1>php代码加密与解密</h1>
	<form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'  autocomplete="on"> 	
	<textarea name="code" rows="25" cols="80"><?php echo isset($str)?$str:''; ?> </textarea>
	<br/><label> <input type='radio' name='mode' value='0' > encode 加密 </label>
	     <label> <input type='radio' name='mode' value='1'  checked=checked> decode 解密 </label>
	<br/><input type="submit" value="Goooooooo" >
	</form>
</div>

<div class='help'>
	<h2> <?php echo $title; ?> </h2>
    <div class='clear'>
    <p><strong>解密注意:</strong><br/> 在输入解密的字符串的时候可以输入</p>
    <pre> eval(gzinflate(base64_decode("C3YCAA==")));</pre>
    <p>也可以直接输入其中的字符串 </p>
    <pre>C3YCAA==</pre>
    </div>
</div>
<?php include_once('footer.php'); ?>


