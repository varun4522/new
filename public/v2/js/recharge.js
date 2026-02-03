layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  laytpl= layui.laytpl;
    var json_data = {}

    $.post('/api/user/info',{},function (res) {
        var data = res.result;
        var BalanceTpl = document.getElementById('BalanceTpl').innerHTML;
        var elemView = document.getElementById('balance_card');
        laytpl(BalanceTpl).render(data, function(str){
            elemView.innerHTML = str;
        });

    })



    $(document).on('click','#copy', function () {
        var copyText = document.getElementById("copyTxt");
        copyText.select(); // 选择对象
        document.execCommand("Copy");
        layer.msg('copy success');
    })

    $(document).on('click','#poster', function () {
        layer.photos({
            photos: {
                "title": "Photos Demo",
                "start": 0,
                "data": json_data
            }
        });
    })
});

