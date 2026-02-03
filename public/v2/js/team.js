layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  laytpl= layui.laytpl;
    var json_data = {}

    $.post('/api/user/invite',{},function (res) {
        var data = res.result;
        json_data = data.posters
        $('#copyTxt').val(data.promotion_link)
        var InviteTpl = document.getElementById('InviteTpl').innerHTML;
        var elemView = document.getElementById('invite_friends_card');
        laytpl(InviteTpl).render(data, function(str){
            elemView.innerHTML = str;
        });

    })

    $.post('/api/user/team',{},function (res) {
        var data = res.result;
        var TeamTpl = document.getElementById('TeamTpl').innerHTML;
        var TeamView = document.getElementById('team_level_card');
        laytpl(TeamTpl).render(data, function(str){
            TeamView.innerHTML = str;
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

