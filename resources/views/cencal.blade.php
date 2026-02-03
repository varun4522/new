<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('public')}}/assets/style.css">
</head>
<body>
<section class="onepay-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="time_over">আদেশের সময় শেষ হয়েছে৷</p>
                <div>
                    <a href="javascript:void(0)" class="order_cancel" onclick="cancele_order()">অর্ডার বন্ধ করুন</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function cancele_order()
    {
        sessionStorage.clear()
        window.location.href = '{{base64_decode($response_url)}}';

    }
</script>
</body>
</html>
