window.onload=function(){var a=document.forms[0].content;a&&a.setSelectionRange&&a.setSelectionRange(0,0);a&&a.focus&&a.focus()};function do_js_beautify(){document.getElementById("beautify").disabled=true;var c=document.getElementById("content").value.replace(/^\s+/,"");var b=document.getElementById("tabsize").value;var a=" ";var d=document.getElementById("preserve-newlines").checked;if(b==1){a="\t"}if(c&&c[0]==="<"){document.getElementById("content").value=style_html(c,b,a,80)}else{document.getElementById("content").value=js_beautify(c,{indent_size:b,indent_char:a,preserve_newlines:d})}document.getElementById("beautify").disabled=false;return false};