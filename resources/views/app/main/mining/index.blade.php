@extends('app.layout.app')
@section('app_content')
    <div class="container">
        <!--<div class="logo">-->
        <!--    <a href="#"><img src="{{asset('public/v2')}}/img/logo.png" alt="img-not found"></a>-->
        <!--</div>-->

        <div class="menu">
            <ul>
                <li><a href="{{route('user.mining')}}" id="active">Less</a></li>
                <li><a href="{{route('user.mining.my')}}">Purchase</a></li>
            </ul>
        </div>

        <div class="all-items">
            @foreach(\App\Models\Package::get() as $key=>$element)
                <div class="items" style="width:100%">
                    <div class="product-img">
                        <img style="border-radius: 6px;" src="{{asset($element->photo)}}" alt="">
                    </div>

                    <div class="product-text">
                        <h2>{{$element->name}}</h2>
                        <p>valid Period: {{$element->validity}} days</p>
                        <p>Settlement currency: BDT(৳)</p>
                        <p>daily income {{price($element->commission_with_avg_amount / $element->validity)}}</p>
                        <p>Total revenue: {{price($element->commission_with_avg_amount)}}</p>

                        <div class="item-rent">
                            <h3>{{price($element->price)}}</h3>
                            @if(in_array($element->id ,my_vips()))
                                <button type="button">Current</button>
                            @else
                                <button type="button" onclick="openPopPurchase('package{{$element->id}}')">RENT</button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="pop_purchase" id="package{{$element->id}}" style="display: none">
                    <div class="pop_container_purchase">
                        <h3>Tips</h3>
                        <p>Are you sure you want to buy this product?</p>

                        <div class="purchase_btns">
                            <button style="color: red;" onclick="closePopPurchase('package{{$element->id}}')">Cancel</button>
                            <button style="color: green;" onclick="window.location.href='{{route('purchase.confirmation', $element->id)}}'">OK</button>
                            <div class="h_border"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div style="height: 120px;"></div>
    <script>
        function closePopPurchase(id){
            document.getElementById(id).style.display='none';
        }
        function openPopPurchase(id){
            document.getElementById(id).style.display='block';
        }
    </script>
@endsection
