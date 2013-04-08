<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>xunlei</title>
<style type="text/css" media="screen">
	/** GLOBAL 全局 **/
body {
	position: relative;
	background-color: #fff;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #222;
	line-height: 27px;
}

a {
	text-decoration: none;
	color: #15c;
	cursor: pointer;
}

a:visited {
	color: #61c;
}

a:active {
	color: #d14836;
}


/*------------------------------------------------------------------
Component: Buttons
------------------------------------------------------------------*/
button,input[type='submit'] {
	min-width: 72px;
	border:1px solid #DCDCDC;
	color: #444;
	font-size: 11px;
	font-weight: bold;
	height: 27px;
	padding: 0 8px;
	line-height: 27px;
	border-radius:2px;
	-webkit-transition: all 0.218s;
	-moz-transition: all 0.218s;
	-o-transition: all 0.218s;
	background-image: -webkit-gradient(linear, left top, left bottom,
	from(#f5f5f5), to(#f1f1f1));
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
}

button:hover,input[type='submit']:hover {
	border: 1px solid #C6C6C6;
	color: #222;
	transition: all 0.0s;
	background-image: -webkit-gradient(linear, left top, left bottom,
	from(#f8f8f8), to(#f1f1f1));
	box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.1);
}

button:active,input[type='submit']:active{
	background: #f6f6f6 -webkit-gradient(linear,left top,left bottom,
	from(#f6f6f6),to(#f1f1f1));
	box-shadow: inset 0px 1px 3px rgba(0, 0, 0, 0.2);
}

button:focus,input[type='submit']:focus{
	outline: none;
	border: 1px solid #4d90fe;
}

button[disabled], button[disabled]:hover, button[disabled]:active {
	background: linear-gradient(#fafafa, #f4f4f4 40%, #e5e5e5);
	border-color: #aaa;
	color: #888;
	box-shadow: none;
}

/*------------------------------------------------------------------
Component: Text Field
------------------------------------------------------------------*/
input[type=text],
input[type=password]{ 
	border-radius:2px;
	height: 27px;
	background-color: #ffffff;
	border: 1px solid #cccccc;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
	-moz-transition: border linear 0.2s, box-shadow linear 0.2s;
	-o-transition: border linear 0.2s, box-shadow linear 0.2s;
	transition: border linear 0.2s, box-shadow linear 0.2s;
}
input[type=text]:hover,
input[type=password]:hover {
	border: 1px solid #b9b9b9;
	border-top: 1px solid #a0a0a0;
	-webkit-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.1);
	-moz-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.1);
	-o-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.1);
}
input[type=text]:focus,
input[type=password]:focus {
	border-color: rgba(82, 168, 236, 0.8);
	outline: 0;
	outline: thin dotted \9;
	/* IE6-9 */

	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}

#result-table{
	border: 1px solid #e5e5e5;
	background: #f9f9f9;
	padding: 20px 30px 20px 30px;
	border-radius: 3px;
	box-shadow: 0 2px 5px rgba(0,0,0,0.07);
	position: relative;
}

</style>
	</head>
	<body>
		<section style="margin-top: 20px;">
		<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script src="http://dynamic.vod.lixian.xunlei.com/fx"></script>
		<script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script>
		<form id="xunlei-form">
			<input id="xunlei-url" type="text" placeholder="在这里填入各种链接" style="width:550px"> <input type="submit" value="go" id="xunlei-go">
		</form>

		<table><tbody id="result-table"></tbody></table>

		<script>
			$("#xunlei-form").on("submit", function() {
				var url = $("#xunlei-url").val();
				if (url) {
					$("#result-table").empty().append("<tr><td>loading</td></tr>")
					$.getJSON("http://roybinux.duapp.com/get?callback=?", {url: url},
					function(data) {
						data = data.data;
						if (data.items && data.items.length) {
							$("#result-table").empty()
							$.each(data.items, function(n, e) {
								if (e.url) {
									$("#result-table").append("<tr><td><a href='"+e.url+"' target='_blank'>"+e.title+"</a></td><td>"+format_size(parseInt(e.size))+"</td></tr>");
									} else {
									$("#result-table").append("<tr><td>"+e.title+"</td><td>"+format_size(parseInt(e.size))+"</td></tr>");
								}
							});
							} else {
							$("#result-table").empty().append("<tr><td>没有找到资源</td></tr>");
						}
						}).error(function() {
						$("#result-table").empty().append("<tr><td>请求出错</td></tr>")
					});
					} else {
					$("#result-table").empty().append("<tr><td>需要url</td></tr>")
				}
				return false;
			});
			function format_size(spare_size)
			{
				if (spare_size == 0)
				return "0B";
				var spare_str;
				var spare_left;
				if( spare_size >= 1024*1024*1024  )
				{
					spare_left = Math.floor(spare_size/(1024*1024*1024)*10);
					spare_str = (spare_left/10).toString()+"GB";
					}else if( spare_size >= 1024*1024 ){
					spare_left = (Math.floor(spare_size*100/(1024*1024)))/100;
					spare_str = spare_left.toString()+"MB";
				}
				else if(spare_size >= 1024){
					spare_left = Math.floor(spare_size/1024);
					spare_str = spare_left.toString()+"KB";
				}
				else{
					spare_str = spare_size + "B";
				}

				return spare_str;
			}
		</script>
		</section>

	</body>
</html>


