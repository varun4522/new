layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  form= layui.form;
    var  flow= layui.flow;
    var  laytpl= layui.laytpl;
    var element = layui.element
    element.render('progress', 'demo-filter-progress');

    $.post('/api/user/info',{},function (res) {
        console.log(res);
        $('.user_avatar').attr('src',res.result.avatar)
        $('.user_nickname').text(res.result.nickname)
        $('.user_username').text(res.result.username+" 【ID:"+res.result.id+"】")
        $('.recharge_balance').text(res.result.currency+res.result.balance_in)
        $('.withdraw_balance').text(res.result.currency+res.result.balance_out)
        $('.commission_amount').text(res.result.currency+res.result.commission_amount)
        $('.product_income').text(res.result.currency+res.result.product_income)
        $('.order_num').text(res.result.order_num)
        $('#vip img').attr('src','/public/v1/img/vip/lv'+res.result.level+'.png');

    })


    $(document).on('click','#close', function () {
        layer.closeAll()
    })

    $('#vip').click(function () {

        var service_index = layer.open({
            type: 1,
            area: ['100%', 'auto'], // 宽高
            title: false, // 不显示标题栏
            closeBtn: true,
            shadeClose: true, // 点击遮罩关闭层
            content: $('#vip_swiper')
        });
    })
    $.post('/api/vip/lists',{},function (res) {
        console.log(res);
        var mySwiper = new Swiper(".mySwiper", {
            slidesPerView: 'auto',
            centeredSlides: true,
            freeMode: true,
            initialSlide :1,
            spaceBetween: 10,
            observer: true, //修改swiper自己或子元素时，自动初始化滑动
            observeParents: true, //修改swiper的父元素时，自动初始化滑动
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            dynamicBullets: true,
            on: {
                slideChangeTransitionStart: function(){
                    var level = this.activeIndex
                },
            }
        });
        var data = res.result;
        var VipTpl = document.getElementById('VipTpl').innerHTML;
        var elemView = document.getElementById('swiper-wrapper');
        // 渲染并输出结果
        laytpl(VipTpl).render(data, function(str){
            elemView.innerHTML = str;
        });
        mySwiper.update();
    })

    $('.rules').click(function () {
        layer.open({
            type: 1,
            title: false,
            closeBtn: true,
            offset: 'b',
            anim: 'slideUp',
            area: ['100%', 'auto'],
            shade: 0.5,
            shadeClose: true,
            id: 'open_blog_dialog',
            content: $('#blog_dialog'),
        });
    })
});

