layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  form= layui.form;
    var  flow= layui.flow;
    var  laytpl= layui.laytpl;

    $.post('/api/vip/lists',{},function (res) {
        var data = res.result;
        var VipTpl = document.getElementById('VipTpl').innerHTML;
        var elemView = document.getElementById('vip_contents');
        laytpl(VipTpl).render(data, function(str){
            elemView.innerHTML = str;
        });
    })

});

