

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>My product</title>
  <link rel="stylesheet" href="/public/site/layui/css/layui.css">
  <link rel="stylesheet" href="/public/site/css/common.css">
  <style>
    .index_header {
      background: linear-gradient(136deg, #17A278 0%, #18CA72 100%);
      border-bottom-left-radius: 8%;
      border-bottom-right-radius: 8%;
    }

    .back {
      display: block;
      width: 100%;
      font-family: Arial, Arial;
      font-weight: 700;
      font-size: 20px;
      color: #FFFFFF;
      text-align: center;
      padding: 0;
      line-height: 36px;
    }

    .back .btn {
      width: 36px;
      height: 36px;
      background: #2FAB86;
      border-radius: 12px 12px 12px 12px;
      border: 1px solid #74BC8E;
      line-height: 36px;
      text-align: center;
      position: absolute;
      top: 0px;
      left: 15px;
    }


    .order_details {
      width: 80px;
      height: 30px;
      background: #FFFFFF;
      border-radius: 100px 100px 100px 100px;
      border: 1px solid #CDCDCD;
      font-family: PingFang SC, PingFang SC;
      font-weight: 400;
      font-size: 16px;
      color: #666666;
      line-height: 30px;
      text-align: center;
    }

    .product_details_status {
      font-family: Arial, Arial;
      font-weight: 400;
      font-size: 16px;
      color: #818393;
    }

    .normal {
      color: #0F7A5A;
    }

    .layui-flow-more {
      display: none
    }

    .product_details_name {
      font-family: Arial, Arial;
      font-weight: 700;
      font-size: 18px;
      color: #333333;
      margin-bottom: 0px !important;
    }

    .label {
      color: #666666 !important;
      margin-bottom: 0px !important;
      line-height: 25px !important;
    }

    .value {
      color: #333333 !important;
      margin-bottom: 0px !important;
      line-height: 25px !important;
    }

    .product_details_item {
      padding: 0px !important;
      border-bottom: none !important;
      width: 100%
    }

    .border_bottom {
      border-bottom: 1px solid #EAEAEA !important;
    }
    
    .show{
        display: block;
    }
    
    .hidden{
        display: none;
    }
    
    .product_card .buy {
    width: 95px;
    height: 30px;
    background: #FFFFFF;
    border-radius: 8px 8px 8px 8px;
    text-align: center;
    font-family: Arial, Arial;
    font-weight: 700;
    font-size: 14px;
    color: #3D3D3D;
    line-height: 30px;
}
  </style>
</head>

<body>
  <div class="index_header" style="">
    <a href="javascript:history.back(-1)" class="back position">
      <p class="btn"><i class="layui-icon layui-icon-left layui-font-20"></i></p>
      My product
    </a>

    <div class="index_menu" style="position: relative;bottom: -20px;margin-top: 0px">
      <div class="nav nav_active" id="fund_btn" style="text-align: center;width: 33%;" data-type="1" data-image="fixed">
        <p class="title">VIP</p>
      </div>
      <!--<div class="nav" id="vip_btn" style="text-align: center;width: 33%" data-type="2" data-image="welfare">-->
      <!--  <p class="title">Fixed Fund</p>-->
      <!--</div>-->
      <!--<div class="nav" style="text-align: center;width: 33%" data-type="3" data-image="activity">-->
      <!--  <p class="title">Activity Fund</p>-->
      <!--</div>-->

    </div>
  </div>
  
  <?php
            use \App\Models\PackageCategory;
            use \App\Models\Package;
            $menu = PackageCategory::get()->toArray();
            $packageOne = Package::where('Status', '!=','inactive')->where('tab','vip')->get();
            $packagetwo = Package::where('Status', '!=','inactive')->where('tab', 'fixed')->get();
            $packagethree = Package::where('Status', '!=','inactive')->where('tab', 'event')->get();
        ?>  


  <div class="common_main" style="margin-top: 30px;">
    <div id="fund" style="background: none;border-radius: 8px;">
         @if($packageOne->count() > 0)
                @foreach($packageOne as $key=>$element)
                    <?php
                        $myVip = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
                        $ddIncome = $element->commission_with_avg_amount != 0 ? $element->commission_with_avg_amount / $element->validity : 0;
                    ?>
                    
                    @if($myVip)
                    
           <a href="#" class="product_card position">
            <div style="padding: 10px">
              <div class="product_title_card">
                <div class="flex_space">
                  <div>
                    <img src="/public/site/img/vip/lv0.png" class="lv"> {{$element->name}}
                  </div>
                  
                    @php
                        $last_claim = \App\Models\UserLedger::where(['user_id' => auth()->id(), 'reason' => 'daily_claim_'.$element->id])->latest()->first();
                        $lastPurchaseDate = $last_claim->created_at ?? $myVip->created_at; 
                        $diffInHours = $lastPurchaseDate->diffInHours(now());
                    @endphp
                    
                      <div class="buy"  id="countdown-{{ $element->id }}">00:00:00</div>

                    @if($diffInHours >= 24)
                      @if(!App\Models\UserLedger::where(['user_id' => auth()->id(), 'reason' => 'daily_claim_'.$element->id])->whereDate('created_at', today())->exists())
                      <div class="buy"  onclick='window.location.href="/my/vip?vip_id={{$element->id}}"'  id="claim-{{ $element->id }}">Claim</div>
                      @else
                      <div class="buy">Done</div>
                      @endif
                    @endif
                </div>
    
              </div>
              <div class="product_content position">
                <div class="product_title flex_left">
                  <div class="product_image">
                    <img src="{{asset($element->photo)}}">
                  </div>
    
                  <div class="product_info">
                    <div class="product_item flex_space">
                      <p class="label">Each Price</p>
                      <p class="value position" style="font-weight: 700">
                        <!--<span class="unit">₹</span>-->
                        <span class="price">{{price($element->price)}}</span>
                      </p>
    
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Revenue</p>
                      <p class="value position">
                         {{ $element->validity }} Days
                      </p>
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Daily Earnings</p>
                      <p class="value">
                        <span class="position">
                          <!--<span class="unit">₹</span>-->
                          {{price($element->daily_limit)}} </span>
                      </p>
    
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Total Revenue</p>
                      <p class="value">
                        <span class="position">
                          <!--<span class="unit">₹</span>-->
                           {{ $element->daily_limit * $element->validity }} </span>
                      </p>
                    </div>
    
                  </div>
                </div>
    
              </div>
            </div>
           </a>
          
        
            <script>
                (function() {
                    let lastPurchaseDate = @json($lastPurchaseDate);
                    let purchaseDate = new Date(lastPurchaseDate);
                    let endTime = new Date(purchaseDate.getTime() + 24 * 60 * 60 * 1000);
    
                    function updateCountdown() {
                        let now = new Date().getTime();
                        let distance = endTime - now;
    
                        if (distance < 0) {
                            clearInterval(countdownInterval);
                            document.getElementById("countdown-{{ $element->id }}").style.display = 'none';
                            document.getElementById("claim-{{ $element->id }}").style.display = 'block';
                            return;
                        }
    
                        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
                        document.getElementById("countdown-{{ $element->id }}").innerText = `${hours}h ${minutes}m ${seconds}s`;
                    }
    
                    var countdownInterval = setInterval(updateCountdown, 1000);
                })();
            </script>
        @endif
        @endforeach
        @endif
          
    </div>
    
    
    <div id="vip" class="hidden" style="background: none;border-radius: 8px;">
         @if($packagetwo->count() > 0)
                @foreach($packagetwo as $key=>$element1)
                    <?php
                        $myVip = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id', $element1->id)->where('status', 'active')->first();
                        $ddIncome = $element1->commission_with_avg_amount != 0 ? $element1->commission_with_avg_amount / $element1->validity : 0;
                    ?>
                    
                    @if($myVip)
                    
           <a href="#" class="product_card position">
            <div style="padding: 10px">
              <div class="product_title_card">
                <div class="flex_space">
                  <div>
                    <img src="/public/site/img/vip/lv0.png" class="lv"> {{$element1->name}}
                  </div>
                 
                 
                  @if($myVip->created_at->addDays($element1->validity) <= now())
                  <div class="buy"  onclick='window.location.href="/my/vip?vip_id={{$element1->id}}"' >Claim</div>
                  @endif
                </div>
    
              </div>
              <div class="product_content position">
                <div class="product_title flex_left">
                  <div class="product_image">
                    <img src="{{asset($element1->photo)}}">
                  </div>
    
                  <div class="product_info">
                    <div class="product_item flex_space">
                      <p class="label">Each Price</p>
                      <p class="value position" style="font-weight: 700">
                        <!--<span class="unit">₹</span>-->
                        <span class="price">{{price($element1->price)}}</span>
                      </p>
    
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Revenue</p>
                      <p class="value position">
                         {{ $element1->validity }} Days
                      </p>
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Daily Earnings</p>
                      <p class="value">
                        <span class="position">
                          <!--<span class="unit">₹</span>-->
                          {{price($element1->daily_limit)}} </span>
                      </p>
    
                    </div>
                    <div class="product_item flex_space">
                      <p class="label">Total Revenue</p>
                      <p class="value">
                        <span class="position">
                          <!--<span class="unit">₹</span>-->
                           {{ $element1->daily_limit * $element1->validity }} </span>
                      </p>
                    </div>
    
                  </div>
                </div>
    
              </div>
            </div>
           </a>
          
          
        @endif
        @endforeach
        @endif
          
    </div>
  </div>

  <!--	底部内容-开始	  -->
  <a href="/service" id="service">
    <img src="/public/site/img/common/service.png" style="width: 40px;height: 40px">
  </a>
  <!--	底部内容-结束	  -->

  <!-- body 末尾处引入 layui -->
  <script src="/public/site/layui/layui.js"></script>

  <script>
    layui.use(function () {
      var $ = layui.jquery;
      var layer = layui.layer;
      var form = layui.form;
      var laydate = layui.laydate;
      var slider = layui.slider;
      var element = layui.element;
      var order_status = '';
      var flow = layui.flow;
      var lang = 'En'

      // 流加载实例
      flow.load({
        elem: '#order_liste', // 流加载容器
        scrollElem: '#order_liset', // 滚动条所在元素，一般不用填，此处只是演示需要。
        isAuto: true,
        end: 'No more',
        done: function (page, next) { // 执行下一页的回调
          console.log(page)
          var lis = [];
          $.get('/getOrders?page=' + page + '&status=' + order_status, function (res) {

            if (page == 1 && res.result.total == 0) {
              $('#order_list').append('<div class="product_details_card" style="margin: auto;text-align: center">\n' +
                '           <img src="/public/site/img/order/none_order.png" style="width:160px ">\n' +
                '            <p style="font-family: Arial, Arial;font-weight: 700;font-size: 18px;color: #FFFFFF;margin-top: 15px;"> No Order</p>\n' +
                '        </div>')
            }
            layui.each(res.result.list, function (index, item) {
              var order_status = item.status == 1 ? '<div class="product_details_status normal">Normal</div>' : '<div class="product_details_status">Finish</div>';

              var html = '  <div class="product_details_card">\n' +
                '            <div class="product_details_item product_details_order border_bottom" >\n' +
                '                <div class="product_details_name" style="padding-bottom: 10px">' + item.name + ' <img src="/public/site/img/vip/lv' + item.level + '.png" style="height: 16px;width: 16px"></div>\n' +
                ' ' + order_status + '' +
                '           </div>\n' +
                '           <div class="flex_left border_bottom"  style="margin: 10px 0;padding-bottom: 10px">' +
                '            <img src="' + item.image + '" style="width: 100px;height: 100px;border-radius: 4px">' +
                '           <div style="width: 100%;padding-left: 10px"> ' +
                '           <div class="product_details_item">\n' +
                '                <p class="label">Buy Share</p>\n' +
                '                <p class="value price"> ' + item.buy_share + '</p>\n' +
                '            </div>\n' +
                '            <div class="product_details_item">\n' +
                '                <p class="label">Days</p>\n' +
                '                <p class="value">' + item.revenue_days + '</p>\n' +
                '            </div>\n' +
                '            <div class="product_details_item">\n' +
                '                <p class="label">Daily Income</p>\n' +
                '                <p class="value position"><span class="unit">₹</span> ' + item.daily_income + '</p>\n' +
                '            </div>\n' +
                '            <div class="product_details_item">\n' +
                '                <p class="label">Total Income</p>\n' +
                '                <p class="value position"><span class="unit">₹</span> ' + item.generated_income + '</p>\n' +
                '            </div>\n' +
                '       </div>\n' +
                '        </div>' +
                '            <div class="product_details_item" style="justify-content: right;margin-top: 10px;">\n' +
                '                <a href="/orders/' + item.id + '" class="order_details">Details</a>\n' +
                '            </div>' +
                '</div>'
              lis.push(html);
            })

            next(lis.join(''), page < res.result.page); // 此处假设总页数为 10

          })



          // 执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
          // pages 为 Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
        }
      });


     
      $('.nav').click(function () {
        var type = $(this).attr('data-type')
        order_status = $(this).attr('data-type')
        var image_value = $(this).attr('data-image')
        console.log(image_value)
        if (image_value == 'all') {
          $('.nav_all').attr('src', '/public/site/img/order/all_active.png')
          $('.nav_normal').attr('src', '/public/site/img/order/normal.png')
          $('.nav_finish').attr('src', '/public/site/img/order/finish.png')
        }
        if (image_value == 'normal') {
          $('.nav_all').attr('src', '/public/site/img/order/all.png')
          $('.nav_normal').attr('src', '/public/site/img/order/normal_active.png')
          $('.nav_finish').attr('src', '/public/site/img/order/finish.png')
        }
        if (image_value == 'finish') {
          $('.nav_all').attr('src', '/public/site/img/order/all.png')
          $('.nav_normal').attr('src', '/public/site/img/order/normal.png')
          $('.nav_finish').attr('src', '/public/site/img/order/finish_active.png')
        }
        $('.nav').removeClass('nav_active');
        $(this).addClass('nav_active')
        $('.no_order').removeClass('layui-show').addClass('layui-hide');
    

        

      })
    });
  </script>
  
   @include('alert-message')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
    
        $('#fund_btn').click(function(){
            $('#vip').addClass('hidden');
            $('#fund').removeClass('hidden');
            $('#vip_btn').removeClass('active');
            $(this).addClass('active');
        });
        
        $('#vip_btn').click(function(){
            $('#fund').addClass('hidden');
            $('#vip').removeClass('hidden');
            $('#fund_btn').removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>