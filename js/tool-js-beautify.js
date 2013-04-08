window.onload = function() {
    var c = document.forms[0].content;
    c && c.setSelectionRange && c.setSelectionRange(0, 0);
    c && c.focus && c.focus();
}
function do_js_beautify()
{
    document.getElementById('beautify').disabled = true;
    var js_source = document.getElementById('content').value.replace(/^\s+/, '');
    var indent_size = document.getElementById('tabsize').value;
    var indent_char = ' ';
    var preserve_newlines = document.getElementById('preserve-newlines').checked;

    if (indent_size == 1) {
        indent_char = '\t';
    }


    if (js_source && js_source[0] === '<') {
        document.getElementById('content').value = style_html(js_source, indent_size, indent_char, 80);
    } else {
        document.getElementById('content').value =
        js_beautify(js_source, {indent_size: indent_size, indent_char: indent_char, preserve_newlines:preserve_newlines});
    }

    document.getElementById('beautify').disabled = false;
    return false;
}
