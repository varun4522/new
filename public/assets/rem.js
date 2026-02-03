function font_size(devwidth){
    _size();
    window.onresize=function(){
        _size();
    };
    function _size() {
        var deviceWidth = document.documentElement.clientWidth;
        if (deviceWidth >= devwidth) deviceWidth = devwidth;
        document.documentElement.style.fontSize = deviceWidth / (devwidth / 100) + 'px';
    };
};

window.onload = font_size(750);

// if(window.screen.width>768){
// 	window.onload = font_size(1920);
// }
// else{
// 	window.onload = font_size(750);
// }
