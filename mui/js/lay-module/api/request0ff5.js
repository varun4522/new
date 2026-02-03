// 后端XL
let LOCALITY_URL = "https://manage.hxpay.online/console/";//域名-平台后台访问域名 -正
let LOGIN_URL = "https://manage.hxpay.online";//后台异常登陆地址 -正

let CHECKOUT_COUNTER_URL="https://cashier.hxpay.online/collection/" //收银台-正

let COMMON_URL = LOCALITY_URL+"pay/console/opera/common/syscode/querySelectOptionInfo/";//码表公共地址-平台后台访问域名



// 跳转到登陆页面
function navigateToLogin() {
    localStorage.setItem('token', "");
    location.assign(LOGIN_URL+"/login.html");
}