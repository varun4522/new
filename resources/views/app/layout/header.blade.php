
<style>
    img.rng_logo {
    width: 90px;
    height: 55px;
}
.header-with-logo {
    background: #666699;
}

i.fa.fa-microphone {
        background: #999966;
        display: inline-block;
        width: 50px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        padding: 2px;
        border-radius: 5px;
    }

</style>
<div class="header-with-logo">
    <div class="d-flex justify-content-between">
        <div>
            <img class="rng_logo" src="{{view_image(setting('logo'))}}">
        </div>
        <div>
            <h4 class="to_time" onclick="window.location.href = '{{route('help.center')}}'" style="color: #fff;margin-top: 12px;margin-right: 20px;font-size: 25px; "> <img style="width:35px;height:35px;border-radius:50px" class="h_logo" src="{{asset('public/app/help.jpg')}}"> </h4>
        </div>
    </div>
</div>
