var product_price = 0;
var product_daily_income = 0;
var product_total_income = 0;
var currency = '₹';
layui.use(function(){
    var  $= layui.jquery;
    var  layer= layui.layer;
    var  form= layui.form;
    var  laytpl= layui.laytpl;

    $('.product_nav_type').click(function () {
        var type = $(this).attr('data-type')
        $('.product_nav_type').removeClass('product_nav_type_active');
        $(this).addClass('product_nav_type_active')
        $('.product_list').removeClass('hide')
        $('.product_list').removeClass('show')
        $('.product_list').addClass('hide')
        $('.product_type_'+type).removeClass('hide').addClass('show')
        $('.product_nav_type_desc').removeClass('hide')
        $('.product_nav_type_desc').removeClass('show')
        $('.product_nav_type_desc').addClass('hide')
        $('.product_nav_type_desc_'+type).removeClass('hide').addClass('show')
    })

    var service_index = layer.open({
        type: 1,
        area: ['325px', '305px'], // 宽高
        title: false, // 不显示标题栏
        closeBtn: true,
        shadeClose: true, // 点击遮罩关闭层
        content: $('#telegram_dialog')
    });

    form.on('submit(buy_product)', function(data){

        var data = data.field;
        $.post('/product_buy', data,function (res) {
            if(res.status==1){
                $('#dialog_text').text(res.msg)
                $('#jump_url').attr('href',"/orders/"+res.result.order_id)
                $('#jump_url').text('View Order')

                layer.open({
                    type: 1,
                    title: false,
                    closeBtn: true,
                    anim: 'slideDown',
                    area: ['90%', 'auto'],
                    shade: 0.5,
                    shadeClose: true,
                    id: 'balance_dialog',
                    content: $('#dialog'),
                });
                return false;
            }else{
                if(res.status==-1){
                    $('#dialog_text').text(res.msg)
                    $('#jump_url').attr('href','/recharge')
                    $('#jump_url').text('Go recharge')
                    layer.open({
                        type: 1,
                        title: false,
                        closeBtn: true,
                        anim: 'slideDown',
                        area: ['90%', 'auto'],
                        shade: 0.5,
                        shadeClose: true,
                        id: 'balance_dialog',
                        content: $('#dialog'),
                    });
                    return false;
                }else{
                    layer.msg(res.msg);
                }
            }
        })
        return false;
    });

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



    $.post('/api/user/info',{},function (res) {
        $('.user_balance').text(res.result.currency+res.result.balance)
        $('.user_avatar').text(res.result.avatar)
        $('.user_nickname').text(res.result.nickname)
        $('.user_username').text(res.result.username+" ID: "+res.result.id)
        $('.product_income').text(res.result.currency+res.result.product_income)
    })
    // $.post('/api/product/lists',{},function (res) {
    //     var data = res.result;
    //     var ProductTpl = document.getElementById('ProductTpl').innerHTML;
    //     var product_type_1_View = document.getElementById('product_type_1');

    //     laytpl(ProductTpl).render(data.type_1, function(str){
    //         product_type_1_View.innerHTML = str;
    //     });

    //     var product_type_2_View = document.getElementById('product_type_2');
    //     laytpl(ProductTpl).render(data.type_2, function(str){
    //         product_type_2_View.innerHTML = str;
    //     });

    //     var product_type_3_View = document.getElementById('product_type_3');
    //     laytpl(ProductTpl).render(data.type_3, function(str){
    //         product_type_3_View.innerHTML = str;
    //     });
    // })
    
    
    $(document).on('click','.layui-icon-up', function () {
        var buy_num = $('#buy_num').val()
        var product_pay_total_income = buy_num*product_total_income
        var product_pay_money = buy_num * product_price
        product_pay_total_income = product_pay_total_income.toFixed(0)
        product_pay_money = product_pay_money.toFixed(0)
        currency = '₹';
        $('#product_dialog .product_pay_money').text(currency+product_pay_money)
        $('#product_dialog .product_pay_total_income').text(currency+product_pay_total_income)
        
    })
     $(document).on('click','.layui-icon-down', function () {
        var buy_num = $('#buy_num').val()
        var product_pay_total_income = buy_num*product_total_income
        var product_pay_money = buy_num * product_price
        
        product_pay_total_income = product_pay_total_income.toFixed(0)
        product_pay_money = product_pay_money.toFixed(0)
        $('#product_dialog .product_pay_money').text(currency+product_pay_money)
        $('#product_dialog .product_pay_total_income').text(currency+product_pay_total_income)
        
    })
});

function buyDialog(id,name,image,price,revenue_days,daily_income,total_income,maximum_share,level,currency='') {
    var $=layui.jquery
    product_price = price;
    product_daily_income = daily_income
    product_total_income = total_income
    currency = currency
    console.log(currency)
    $('#product_id').val(id)
    $('#product_dialog .product_vip_icon').attr('src',"/public/v1/img/vip/lv"+level+".png")
    $('#product_dialog .vip_level').text("VIP"+level)
    $('#product_dialog .product_title').text(name)
    $('#product_dialog .product_dialog_image').attr('src',image)
    $('#product_dialog .product_price').text(currency+price)
    $('#product_dialog .product_days').text(revenue_days)
    $('#product_dialog .product_daily_income').text(currency+daily_income)
    $('#product_dialog .product_total_income').text(currency+total_income)
    $('#product_dialog .product_pay_money').text(currency+price)
    $('#product_dialog .product_pay_total_income').text(currency+total_income)
    $('#product_dialog .product_maximum_share').text(maximum_share)
    $('#buy_num').val(1)
    $('#buy_num').attr('min',1)
    $('#buy_num').attr('max',maximum_share)
    layer.open({
        type: 1,
        title: false,
        closeBtn: false,
        offset: 'b',
        anim: 'slideUp',
        area: ['100%', 'auto'],
        shade: 0.5,
        shadeClose: true,
        id: 'product_dialog',
        content: $('#product_dialog'),
    });
}