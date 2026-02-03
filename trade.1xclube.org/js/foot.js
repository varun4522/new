function showT(){	
	var themData = document.querySelector('meta[name="theme-color"]').content
	Android.showTxt(themData);
}
showT();

function copyDivToClipboard(elem) {
    var range = document.createRange();
    range.selectNode(document.getElementById(elem));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
	var element = document.getElementById(elem);
	var selection = window.getSelection();        
	var range = document.createRange();
	range.selectNodeContents(element);
	selection.removeAllRanges();
	selection.addRange(range);
}
