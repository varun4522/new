// let LOCALITY_URL = "http://test-manage.jojopayment.com/console/";//域名-平台后台访问域名 -测
// let LOGIN_URL = "http://test-manage.jojopayment.com";//后台异常登陆地址-测
// let LOCALITY_URL = "http://test-merchant.jojopayment.com/console/";//域名-商户后台访问域名-测
// let LOGIN_URL = "http://test-merchant.jojopayment.com";//-商户异常登陆地址-测
// let CHECKOUT_COUNTER_URL="http://test-cashier.jojopayment.com/collection/" //收银台-测


// let LOCALITY_URL = "https://manage.jojopayment.com/console/";//域名-平台后台访问域名 -正
// let LOGIN_URL = "https://manage.jojopayment.com";//后台异常登陆地址 -正
// let LOCALITY_URL = "https://merchant.jojopayment.com/console/";//域名-商户后台访问域名 -正
// let LOGIN_URL = "https://merchant.jojopayment.com";//商户异常登陆地址 -正
// let CHECKOUT_COUNTER_URL="https://cashier.jojopayment.com/collection/" //收银台-正

// XL
// let LOCALITY_URL = "https://manage.hxpay.online/console/";//域名-平台后台访问域名 -正
// let LOGIN_URL = "https://manage.hxpay.online";//后台异常登陆地址 -正
// let LOCALITY_URL = "https://merchant.hxpay.online/console/";//域名-商户后台访问域名 -正
// let LOGIN_URL = "https://merchant.hxpay.online/";//商户异常登陆地址 -正
// let CHECKOUT_COUNTER_URL="https://cashier.hxpay.online/collection/" //收银台-正


// coingo
// let LOCALITY_URL = "https://manage.coingo.win/console/";//域名-平台后台访问域名 -正
// let LOGIN_URL = "https://manage.coingo.win";//后台异常登陆地址 -正
// let LOCALITY_URL = "https://merchant.coingo.win/console/";//域名-商户后台访问域名 -正
// let LOGIN_URL = "https://merchant.coingo.win/";//商户异常登陆地址 -正
// let CHECKOUT_COUNTER_URL="https://cashier.coingo.win/collection/" //收银台-正

// let COMMON_URL = LOCALITY_URL+"pay/console/opera/common/syscode/querySelectOptionInfo/";//码表公共地址-平台后台访问域名
//token
let GLOBAL_TOKEN = localStorage.getItem('token')
//lang
let LANG = localStorage.getItem('lang') || 'ban';
let countryCode = localStorage.getItem('countryCode') || 'BAN';
let merchantCode = localStorage.getItem('merchantCode');//商户code
let userType = localStorage.getItem('userType');//用户类型
let userNum = localStorage.getItem('userNum');//用户类型

let startDate1 = new Date(new Date().setDate(1));
let timestamp = new Date().getTime(); // 获取当前时间的时间戳
//定义接收上个月的第一天和最后一天
let startDate2 = new Date(new Date(new Date().setMonth(new Date().getMonth() - 1)).setDate(1));
let endDate2 = new Date(new Date().setDate(0));
let now = new Date(); //今日
let nowDayOfWeek = now.getDay(); //今天本周的第几天
let pageNo = 1; //默认页码
let timeout = 60000; //设置超时时间为60000毫秒（60秒）
//时区
let timezones = {
    BAN: "GMT+6",
    CHN: "GMT+8",
    US: "HST+10"
};
//请求头
let headers = {
    'countryCode': countryCode,
    'language': LANG,
    'token': GLOBAL_TOKEN,
    'timeZone': getTimezone(countryCode)
};
//导出请求头
let exportHeaders = {
    'countryCode': countryCode,
    'language': LANG,
    'token': GLOBAL_TOKEN,
    'timeZone': getTimezone(countryCode),
    'Content-Type': 'application/json;charset=UTF-8',
};

// 跳转到登陆页面
// function navigateToLogin() {
//     localStorage.setItem('token', "");
//     location.assign(LOGIN_URL);
// }
// function navigateToLogin() {
//     const pathArray = window.location.pathname.split('/');
//     let basePath = '';
//     if (pathArray.length > 1) {
//         basePath = pathArray[1];
//     }
//     // 构造登录页面的完整URL
//     window.location = `/${basePath}/login.html`;
// }

function getTimezone(countryCode) {
    return timezones[countryCode] || "Unknown timezone";
}
/**
 * 获取当前时间
 * @param date
 * @returns {string}
 */
function formatDate(date) {
    let year = date.getFullYear();
    let month = String(date.getMonth() + 1).padStart(2, '0');
    let day = String(date.getDate()).padStart(2, '0');
    let hours = String(date.getHours()).padStart(2, '0');
    let minutes = String(date.getMinutes()).padStart(2, '0');
    let seconds = String(date.getSeconds()).padStart(2, '0');

    return `${year}-${month}-${day}_${hours}_${minutes}`;
}


//国际化操作按钮
function getCurrentLanguageToolbarId(value) {
    if (LANG === 'en') {
        return '#'+value+'ManipulateEn';
    } else if (LANG === 'ban') {
        return '#'+value+'ManipulateBan';
    }
    return '#'+value+'ManipulateZh';
}
//table表格字段过长，鼠标放到上面展示完整信息
// function tabTitle(){
//     $('th').each(function(index,element){
//         $(element).attr('title',$(element).text());
//     });
//     $('td').each(function(index,element){
//         $(element).attr('title',$(element).text());
//     });
// }
//---------------------------------------弹窗---------------------------------


//存入缓存
function setItemWithExpiry(key, value, ttl) {
    const now = new Date().getTime();
    const item = {
        value,
        expiry: now + ttl, // 假设 ttl 是毫秒
    };
    localStorage.setItem(key, JSON.stringify(item));
}
//获取缓存
function getItemWithExpiry(key) {
    const itemStr = localStorage.getItem(key);
    if (!itemStr) {
        return null;
    }
    const item = JSON.parse(itemStr);
    const now = new Date().getTime();
    if (now > item.expiry) {
        // 数据已过期，删除
        localStorage.removeItem(key);
        return null;
    }
    return item.value;
}

// 创建一个模块或对象来封装相关功能
const AgentLoader = {
    // 缓存和加载代理
    async loadAgents(selectId, requestUrl, cacheData, pleaseSelectText) {
        const gainCacheData = getItemWithExpiry(cacheData);
        if (gainCacheData && gainCacheData.data !=null ) {
            try {
                const parsedData = JSON.parse(gainCacheData);
                if (parsedData.success) {
                    this.populateDropdown(selectId, parsedData.data, pleaseSelectText);
                } else {
                    this.handleError(parsedData);
                }
            } catch (error) {
                console.error('缓存数据解析失败', error);
                await this.fetchAgents(selectId, requestUrl, cacheData, pleaseSelectText, 'GET');
            }
        } else {
            await this.fetchAgents(selectId, requestUrl, cacheData, pleaseSelectText, 'GET');
        }
    },

    // 通用请求函数，支持GET和POST
    async fetchAgents(selectId, requestUrl, cacheData, pleaseSelectText, method = 'GET') {
        try {
            const response = await $.ajax({
                url: requestUrl,
                type: method,
                timeout: timeout,
                contentType: 'application/json; charset=UTF-8',
                headers: headers, // 注意：headers需要在这之前被定义或作为参数传递
            });
            if (response.success) {
                setItemWithExpiry(cacheData, JSON.stringify(response), 6 * 3600000);
                this.populateDropdown(selectId, response.data, pleaseSelectText);
            } else {
                this.handleError(response);
            }
        } catch (error) {
            // const errorData = error.responseJSON || { message: '未知错误' };
            // const errorData = error.responseJSON || { message: 'The drop-down parameters cannot be obtained' };
            // layer.msg(errorData.message);
            // setTimeout(navigateToLogin, 3000);
        }
    },

    // 动态下拉渲染
    populateDropdown(selectId, options, pleaseSelectText) {
        const $select = $(selectId);
        $select.empty();
        $select.append(new Option(pleaseSelectText, ''));
        $.each(options, function(index, item) {
            $select.append(new Option(item.value, item.key));
        });
        layui.form.render("select");
    },

    // 异常提示
    handleError(response) {
        if (response.code === -10 || response.code === -2) {
            layer.msg(response.msg);
            setTimeout(navigateToLogin, 3000); // 注意：navigateToLogin需要在这之前被定义或作为回调函数传递
        } else {
            layer.msg(response.msg);
        }
    }
};
// 本周的开始日期（周一）
let weekStartDate = new Date(now);
weekStartDate.setDate(now.getDate() - nowDayOfWeek + (nowDayOfWeek === 0 ? -6 : 1));
let extrabtns=[
    {id: 'today', text: '今日', range: [now, now]},
    {id: 'yesterday',	text: '昨日', range: [new Date(new Date().setDate(new  Date().getDate() - 1)), new Date(new Date().setDate(new Date().getDate() - 1))]},
    {id: 'week',text: '本周',range: [new Date(new Date().setDate(new Date().getDate() - nowDayOfWeek + 1)), new Date()]},
    // {id: 'week',text: '本2周',range: [weekStartDate, new Date()]},
    {id: 'lastday-7',text: '过去7天',range: [new Date(new Date().setDate(new Date().getDate() - 7)), new Date(new Date().setDate(new Date().getDate() - 1))]},
    {id: 'lastday-30',text: '过去30天',range: [new Date(new Date().setDate(new Date().getDate() - 30)), new Date(new Date().setDate(new Date().getDate() - 1))]},
    {id: 'thismonth', text: '本月', range: [startDate1, now]},
    {id: 'lastmonth', text: '上个月', range: [startDate2, endDate2]}];

/**
 * 封装ajax请求
 * @param $
 * @param url
 * @param method
 * @param headers
 * @param data
 * @param layer
 * @param async
 * @returns {*}
 */
function sendAjaxRequest($, url, method, headers, data, layer) {
    return new Promise((resolve, reject) => {
        const ajaxOptions = {
            url: url,
            type: method,
            headers: headers,
            data: method === 'POST' || method === 'PUT' ? JSON.stringify(data) : null,
            contentType: method === 'POST' || method === 'PUT' ? 'application/json; charset=UTF-8' : 'application/x-www-form-urlencoded',
        };

        $.ajax(ajaxOptions)
            .done(function(response) {
                if (!response.success) {
                    layer.msg(response.msg);
                    if (response.code === -10) {
                        setTimeout(navigateToLogin, 3000);
                    }
                    return reject(new Error(response.msg || 'Unknown error'));
                }
                resolve(response); // 返回响应数据
            })
            .fail(function(xhr, textStatus) {
                let errorMessage = "Request failed";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (textStatus === 'parsererror') {
                    errorMessage = 'Server returned unparsable JSON';
                }
                reject(new Error(errorMessage)); // 拒绝 Promise
            });
    });
}


// let LOCALITY_URL = "http://localhost:19010/";//本地
// let LOCALITY_URL = "http://8.219.139.102:19010/";//ip
// let LOCALITY_URL = "http://test-pay.vvy-ngvy.shop/api/";//域名


// LOCALITY_URL = "http://test-manage.jojopayment.com/console/";//域名-平台后台访问域名 -测
// LOGIN_URL = "http://test-manage.jojopayment.com";//后台异常登陆地址-测
// let LOCALITY_URL = "http://test-merchant.jojopayment.com/console/";//域名-商户后台访问域名-测
// let LOGIN_URL = "http://test-merchant.jojopayment.com";//-商户异常登陆地址-测
// let CHECKOUT_COUNTER_URL="http://test-cashier.jojopayment.com/collection/" //收银台-测


// let LOCALITY_URL = "https://manage.jojopayment.com/console/";//域名-平台后台访问域名 -正
// let LOGIN_URL = "https://manage.jojopayment.com";//后台异常登陆地址 -正
// let LOCALITY_URL = "https://merchant.jojopayment.com/console/";//域名-商户后台访问域名 -正
// let LOGIN_URL = "https://merchant.jojopayment.com";//商户异常登陆地址 -正
// let CHECKOUT_COUNTER_URL="https://cashier.jojopayment.com/collection/" //收银台-正


// let LOCALITY_URL = "http://manage.hxpay.online/console/";//域名-平台后台访问域名 -正
// let LOGIN_URL = "http://manage.hxpay.online";//后台异常登陆地址 -正
// let LOCALITY_URL = "http://merchant.hxpay.online/console/";//域名-商户后台访问域名 -正
// let LOGIN_URL = "http://merchant.hxpay.online/";//商户异常登陆地址 -正
// let CHECKOUT_COUNTER_URL="http://cashier.hxpay.online/collection/" //收银台-正