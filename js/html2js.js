function rechange(){
 document.getElementById('re').value=document.getElementById('oresult').value.replace(/document.writeln\("/g,"").replace(/"\);/g,"").replace(/\\\"/g,"\"").replace(/\\\'/g,"\'").replace(/\\\//g,"\/").replace(/\\\\/g,"\\")
}
function change(){
 document.getElementById('oresult2').value="document.writeln(\""+document.getElementById('osource').value.replace(/\\/g,"\\\\").replace(/\\/g,"\\/").replace(/\'/g,"\\\'").replace(/\"/g,"\\\"").split('\n').join("\");\ndocument.writeln(\"")+"\");"
}
