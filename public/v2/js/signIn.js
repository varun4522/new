layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  laytpl= layui.laytpl;



    $(document).on('click','#sign_in', function () {
        $.post('/doSignIn',{},function (res) {
            var data = res.result;
            if(res.status==1){
                layer.msg(res.msg,{time:3000},function () {
                    window.location.reload();
                });
            }else{
                layer.msg(res.msg);
            }


        })
    })

});

