<html><head>
    <meta charset="utf-8">
    <!--	<title>xlpay 两</title>-->
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="/css/mui/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" href="/css/cashier.css?v=1.0.8">
    <style>
        .mui-plus .plus {
            display: inline;
        }

        .plus {
            display: none;
        }

        #topPopover {
            position: fixed;
            top: 16px;
            right: 6px;
        }

        #topPopover .mui-popover-arrow {
            left: auto;
            right: 6px;
        }

        p {
            text-indent: 22px;
        }

        span.mui-icon {
            font-size: 14px;
            color: #007aff;
            margin-left: -15px;
            padding-right: 10px;
        }

        .mui-popover {
            height: 300px;
        }

        .mui-content {
            padding: 10px;
        }

        .mui-input-row .mui-btn {
            line-height: 1.1;
            float: right;
            width: 40%;
            margin-right: 47px;
            margin-top: 1px;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 22px;
        }

        .mui-btn-block {
            font-size: 15px;
            display: block;
            /* width: 100%; */
            margin-bottom: 1px;
            padding: 15px 0;
        }

        .custom-button {
            display: flex; /* 使用 Flexbox 布局 */
            align-items: center; /* 垂直居中 */
            padding: 9px 20px;
            color: #0C0C0C;
            border: 1px solid #9F9F9F;
            text-decoration: none; /* 移除下划线 */
        }

        .button-icon {
            width: 24px;
            height: 12px;
            margin-right: 8px; /* 添加间距以分隔图标和文本 */
        }

        /*下拉样式*/
        /*.mui-popover {*/
        /*	position: absolute;*/
        /*	z-index: 999;*/
        /*	display: none;*/
        /*	width: 190px;*/
        /*	-webkit-transition: opacity .3s;*/
        /*	transition: opacity .3s;*/
        /*	-webkit-transition-property: opacity;*/
        /*	transition-property: opacity;*/
        /*	-webkit-transform: none;*/
        /*	transform: none;*/
        /*	opacity: 0;*/
        /*	border-radius: 7px;*/
        /*	background-color: #FFFFFF;*/
        /*	-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, .1);*/
        /*	box-shadow: 0 0 15px rgba(0, 0, 0, .1);*/
        /*}*/
        .mui-popover {
            position: absolute;
            z-index: 999;
            display: none;
            width: 180px;
            height: 130px;
            -webkit-transition: opacity .3s;
            transition: opacity .3s;
            -webkit-transition-property: opacity;
            transition-property: opacity;
            -webkit-transform: none;
            transform: none;
            opacity: 0;
            border-radius: 7px;
            background-color: #f7f7f7;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, .1);
            box-shadow: 0 0 15px rgba(0, 0, 0, .1);
        }

        .mui-input-row {
            /*position: relative; 输入框带下划线 */
            position: static;
        / / 去掉划线
        }

        /*第一步样式去掉划线 */
        .mui-input-group {
            position: static;
            padding: 0;
            border: 0;
            background-color: #fff;
        }

        .mui-input-group .mui-input-row:after {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 15px;
            height: 1px;
            content: '';
            -webkit-transform: scaleY(.5);
            transform: scaleY(.5);
            background-color: #FFFFFF;
        }

        .mui-input-row .mui-input-clear ~ .mui-icon-clear, .mui-input-row .mui-input-password ~ .mui-icon-eye, .mui-input-row .mui-input-speech ~ .mui-icon-speech {
            font-size: 20px;
            position: absolute;
            z-index: 1;
            top: 82%;
            right: 0;
            width: 70px;
            height: 41px;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body style="overflow: hidden;">
<header class="mui-bar mui-bar-nav">
    <!--			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <div style="display:flex; align-items:center; justify-content: center; margin-top: 10px;">
        <div style="display: flex; align-items:center; gap: 10px;">
            <!--<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Chevron_Logo.svg/1836px-Chevron_Logo.svg.png" style="height: 26px;" />-->
            <div style="font-size: 18px; color: black;">
      
            </div>
        </div>
        
    </div>
    
    <!--<h1 class="mui-title" id="hId">-->
        
    <!--</h1>-->
</header>
<div id="customAlertFirstStep" class="hiddenFirstStep">
    <div class="alert-box-FirstStep">
        <h2 id="languageButtonIdFirstStep"></h2>
    </div>
</div>
<!--第一步-->
<div class="mui-content" id="firstStep" >
    <div class="mui-card">
        <div class="mui-input-row">
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 3px; height: 4rem;">
                <img style="height: 2rem;" src="/images/photo_1.jpg" alt="">
                <img style="height: 2rem; margin-left: 10px;" src="/images/photo_2.jpg" alt="">
            </div>
            <h2>Send Money</h2>
        </div>

        <form class="mui-input-group">
            <div class="mui-input-row">
                <label class="label-content" style="width: 50%;">number- নম্বর</label>
            </div>
            <div class="mui-input-row">
                <input type="text" class="mui-input-clear" oninput="checkInsertMobileNumber(this)" id="accountPhoneFirstStep" placeholder="Please enter your phone number" data-input-clear="1"><span class="mui-icon mui-icon-clear mui-hidden"></span>
            </div>
            <div class="mui-input-row">
                <label class="label-content" style="width: 50%;">ওয়ালেট পছন্দ</label>
            </div>
            <div class="custom-dropdown">
                <div class="custom-dropdown-button" id="dropdownButton" onclick="toggleDropdown()">
                    <span id="dropdownIconText">Please select</span>
                </div>
                <ul class="custom-dropdown-menu" id="customDropdownMenu">
                    <li onclick="selectOption('bkash')"><img src="/images/bkash.jpg" alt="bKash Logo" style="width:24px;height:24px;">bKash
                    </li>
                    <li onclick="selectOption('Nagad')"><img src="/images/l2.png" alt="Nagad Logo" style="width:24px;height:24px;">Nagad
                    </li>
                </ul>
            </div>


            <div class="mui-button-row" style="margin-top: 1rem;">
                <button class="mui-btn mui-btn-primary" type="button" onclick="get_address()" style="background-color: #9F9F9F;border: 1px solid #cccccc;" id="firstStepSubmitId" onclick="return true;">পরবর্তী পদক্ষেপ
                </button>&nbsp;&nbsp;
            </div>

            <div style="margin-top: 2rem;"></div>
        </form>
    </div>
</div>

 <input type="hidden" id="order_id" value="{{$oid}}" />
    <input type="hidden" id="account_number" value="" />
    <input type="hidden" id="amount" value="{{$amount}}" />
    <input type="hidden" id="method_name" value="bkash" />
    
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    
<script src="/css/mui.min.js"></script>
<script src="/css/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="/css/ehi-i18n.js" charset="utf-8"></script>
<script src="/css/proxy.js" charset="utf-8"></script>
<script src="/css/language.js" charset="utf-8"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能

    });
    let queryString = window.location.search;

    if (queryString.startsWith('?')) {
        queryString = queryString.slice(1);
    }
    // 使用URLSearchParams解析查询字符串
    let params = new URLSearchParams(queryString);
    //代收平台流水号
    let collectionBillNo = params.get('collectionbillNo');
    //加载国际化资源
    let i18n = new EhiI18n('../lang/', () => {
    });
    //语言
    let language = params.get('lang');
    language = language ? language : "ban";
    console.log(language);
    console.log(collectionBillNo);

    i18n.setLanguage(language)
    i18n.loadLanguage()

    const currentPageUrl = window.location.href;
    const parsedUrl = new URL(currentPageUrl);
    const hostname = parsedUrl.hostname;

    let title = document.title;
    let resultH;
    if (hostname.includes("hxpay.online")) {
        // resultH = "XL Cashier";
        resultH = "";
    } else {
        // resultH="Jojo Cashier"
        resultH = "Chevron Payment"
    }
    document.getElementById("hId").innerHTML = resultH;


    let walletTypeFirstStep = localStorage.getItem('walletTypeFirstStep') || 'bKash'; // 路由下拉
    let inputElement = document.getElementById('walletSerialNo');
    let walletType = "";

    myAjaxFunction("2");//初始收款钱包类型信息 (查看否开始路由)

    // walletTypeDefault("bKash");
    //处理监听事件
    document.addEventListener('DOMContentLoaded', function () {
        //复制手机号
        // const copyButtons = document.querySelectorAll('.copy_commit_accountPhone');
        // const copyButtonsRequestAmount = document.querySelectorAll('.copy_commit_requestAmount');
        // 复制按钮点击事件监听器
        // copyButtons.forEach(function (button) {
        // 	button.addEventListener('click', function () {
        // 		let textToCopy = '';
        // 		const accountPhoneSpanById = $("#accountPhone").text();
        // 		if (accountPhoneSpanById) {
        // 			textToCopy = accountPhoneSpanById;
        // 		} else {
        // 			showBtnMessageFirstStep("উপাদান খুঁজে পাওয়া যায়নি"); // 新增：处理找不到元素的情况
        // 			return;
        // 		}
        //
        // 		if (navigator.clipboard) {
        // 			navigator.clipboard.writeText(textToCopy).then(function () {
        // 				showBtnMessageFirstStep(i18nAlert[language].copyYes);
        // 			}).catch(function (err) {
        // 				if (err.name === 'NotAllowedError' || err.name === 'SecurityError') {
        // 					// 处理权限被阻止的情况
        // 					showBtnMessageFirstStep("অনুমতি বন্ধ করা হয়েছে"); // 新增：权限被阻止的消息
        // 				} else {
        // 					// 处理其他类型的错误
        // 					showBtnMessageFirstStep(i18nAlert[language].copyNo + ': ' + err.message);
        // 				}
        // 			});
        // 		} else {
        // 			showBtnMessageFirstStep(i18nAlert[language].nonsupport);
        // 		}
        // 	});
        // });
        //
        // copyButtonsRequestAmount.forEach(function (button) {
        // 	button.addEventListener('click', function () {
        // 		let textToCopy = '';
        // 		const accountPhoneSpanById = $("#requestAmount").text();
        // 		if (accountPhoneSpanById) {
        // 			textToCopy = accountPhoneSpanById;
        // 		} else {
        // 			showBtnMessageFirstStep("উপাদান খুঁজে পাওয়া যায়নি"); // 新增：处理找不到元素的情况
        // 			return;
        // 		}
        //
        // 		if (navigator.clipboard) {
        // 			navigator.clipboard.writeText(textToCopy).then(function () {
        // 				showBtnMessageFirstStep(i18nAlert[language].copyYes);
        // 			}).catch(function (err) {
        // 				if (err.name === 'NotAllowedError' || err.name === 'SecurityError') {
        // 					// 处理权限被阻止的情况
        // 					showBtnMessageFirstStep("অনুমতি বন্ধ করা হয়েছে"); // 新增：权限被阻止的消息
        // 				} else {
        // 					// 处理其他类型的错误
        // 					showBtnMessageFirstStep(i18nAlert[language].copyNo + ': ' + err.message);
        // 				}
        // 			});
        // 		} else {
        // 			showBtnMessageFirstStep(i18nAlert[language].nonsupport);
        // 		}
        // 	});
        // });
        //下拉监听
        const popover = document.getElementById('middlePopover');
        const selectButton = document.getElementById('selectButton');

        const selectedText = document.getElementById('selectedText');
        const selectedImage = document.getElementById('selectedImage');

        // 显示下拉菜单
        selectButton.addEventListener('click', function (event) {
            event.preventDefault();
            popover.style.display = 'block';
            document.body.style.overflow = 'hidden'; // 防止滚动
        });

        // 关闭下拉菜单
        // document.addEventListener('click', function (event) {
        //     if (!popover.contains(event.target)) {
        //         popover.style.display = 'none';
        //         document.body.style.overflow = 'auto'; // 恢复滚动
        //     }
        // });

        // 处理列表项的点击事件
        const listItems = popover.querySelectorAll('li a');
        listItems.forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                const imgSrc = item.getAttribute('data-img');
                const text = item.textContent.trim(); // 获取文本内容并去除多余的空白
                // 更新按钮文本和图像
                selectedImage.src = imgSrc;
                selectedText.textContent = text;

                // 根据是否有图像来决定是否显示图像元素
                selectedImage.style.display = imgSrc ? 'inline-block' : 'none';
                if (text) {
                    walletType = text;
                    inputWalletType(walletType);
                    getWalletType("2", walletType);//加载下拉信息
                    walletTypeDefault(walletType);
                    $("#selectButton").css("padding", "3px 20px");
                    $("#middlePopover").removeClass("mui-active");
                    $("#middlePopover").hide();
                    $(".mui-backdrop.mui-active").css("display", "none");
                }
            });
        });
    });


    // 设置倒计时的总秒数（15分钟）
    let totalSeconds = 5 * 60;

    // 获取倒计时显示的元素
    const countdownElement = document.getElementById('countdown');
    updateCountdown();  // 初始化显示倒计时
    // 第一步下拉事件
    function selectOption(value) {
        const dropdownIconText = document.getElementById('dropdownIconText');
        const method_name = document.getElementById('method_name');
        const selectedLi = document.querySelector(`#customDropdownMenu li[onclick="selectOption('${value}')"]`);
        // 获取图标和文本
        const icon = selectedLi.querySelector('img').cloneNode(true); // 克隆图标元素
        const text = selectedLi.textContent.trim().replace(icon.outerHTML, '').trim(); // 获取文本，去除图标HTML
        icon.style.marginRight = '8px'; //右侧添加 8px 的间距
        icon.style.verticalAlign = 'middle'; // 设置垂直对齐方式
        // 设置到dropdownButton中
        dropdownIconText.innerHTML = ''; // 清空现有内容
        method_name.value = text; // 清空现有内容
        dropdownIconText.appendChild(icon); // 添加图标
        dropdownIconText.appendChild(document.createTextNode(text)); // 添加文本
        walletTypeFirstStep = text;
        // 隐藏下拉列表并移除active类（如果需要的话）
        setTimeout(toggleDropdown, 500);
    }

    function toggleDropdown() {
        const dropdownButton = document.getElementById('dropdownButton');
        dropdownButton.classList.toggle('expanded'); // 切换 .expanded 类
        const menu = document.getElementById('customDropdownMenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }

    //第二步下拉事伯
    function selectOptionWalletType(value) {
        const dropdownIconText = document.getElementById('dropdownIconTextWalletType');
        const selectedLi = document.querySelector(`#customDropdownMenuWalletType li[onclick="selectOptionWalletType('${value}')"]`);
        // 获取图标和文本
        const icon = selectedLi.querySelector('img').cloneNode(true); // 克隆图标元素
        const text = selectedLi.textContent.trim().replace(icon.outerHTML, '').trim(); // 获取文本，去除图标HTML
        icon.style.marginRight = '8px'; //右侧添加 8px 的间距
        icon.style.verticalAlign = 'middle'; // 设置垂直对齐方式
        // 设置到dropdownButton中
        dropdownIconText.innerHTML = ''; // 清空现有内容
        dropdownIconText.appendChild(icon); // 添加图标
        dropdownIconText.appendChild(document.createTextNode(text)); // 添加文本
        walletType = text;
        inputWalletType(walletType);
        // 隐藏下拉列表并移除active类（如果需要的话）
        setTimeout(toggleDropdownWalletType, 500);
    }

    function toggleDropdownWalletType() {
        const dropdownButton = document.getElementById('dropdownButtonWalletType');
        dropdownButton.classList.toggle('expanded'); // 切换 .expanded 类
        const menu = document.getElementById('customDropdownMenuWalletType');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }


    // 获取按钮
    const buttonSuccessFirstStep = document.querySelector('.hiddenFirstStep');
    const submitButton = document.getElementById('firstStepSubmitId');


    //监听input输入框
    const phoneInput = document.getElementById('accountPhoneFirstStep');

    // 添加事件监听器来监听输入框的输入事件
    phoneInput.addEventListener('blur', function () {
        // 获取输入框的当前值
        const inputValue = phoneInput.value;
        let isValidPhoneNumber = /^0\d{10}$/.test(inputValue);
        // 检查输入值
        if (inputValue === "" || !isValidPhoneNumber) {
            showBtnMessageFirstStep("Please enter an 11-digit phone number starting with 0")
            submitButton.style.backgroundColor = '#b2b2b2';
            phoneInput.focus();
        } else {
            // 满足条件
            submitButton.style.backgroundColor = '#006A3D';
        }
    });

    //第一步提交
    const firstStepSubmitButton = document.getElementById('firstStepSubmitId');
    // 点击提交事件监听器
    if (firstStepSubmitButton) {
        firstStepSubmitButton.addEventListener('click', function (event) {
            event.preventDefault(); // 阻止表单的默认提交行为
            let accountPhoneFirstStep = $("#accountPhoneFirstStep").val().trim();
            const phoneInput = document.getElementById('accountPhoneFirstStep');
            let isValidPhoneNumber = /^0\d{10}$/.test(accountPhoneFirstStep);
            if (accountPhoneFirstStep === "") {
                showBtnMessageFirstStep("Please enter your phone number")
                phoneInput.focus();
            } else if (!isValidPhoneNumber) {
                showBtnMessageFirstStep("Please enter an 11-digit phone number starting with 0");
                phoneInput.focus();
            } else if (walletTypeFirstStep === "") {
                showBtnMessageFirstStep("ওয়ালেট নির্বাচন করুন");
            } else {
                localStorage.setItem('accountPhoneFirstStep-' + collectionBillNo, accountPhoneFirstStep);
                localStorage.setItem('walletTypeFirstStep-' + collectionBillNo, walletTypeFirstStep);
                const secondStepId = document.getElementById('secondStepId');
                const firstStepId = document.getElementById('firstStep');
                secondStepId.style.display = 'block'; //隐藏
                firstStepId.style.display = 'none'; //隐藏
                walletType = walletTypeFirstStep;
                walletTypeDefault(walletTypeFirstStep);
                myAjaxFunction("1"); //第一步确定调用
                // $("#accountPhone").html(accountPhoneFirstStep)//钱包编号
            }
        })
    }
    //第二步提交
    const formalSubmitButton = document.getElementById('submitId');
    // 点击提交事件监听器
    if (formalSubmitButton) {
        formalSubmitButton.addEventListener('click', function (event) {
            event.preventDefault(); // 阻止表单的默认提交行为
            let walletSerialNo = $("#walletSerialNo").val();

            const regex = /^([A-Z0-9]{8}|[A-Z0-9]{10})$/;
            if (walletSerialNo === "") {
                // 显示提示框
                showBtnMessageFirstStep(i18nAlert[language].pleaseTxnID)
            } else if (!regex.test(walletSerialNo)) {
                // 显示提示框
                showBtnMessageFirstStep("The Transaction ID is not valid. It must be 8 or 10 digits+ capital letters");
            } else if (walletType === "") {
                // $("#languageButtonId").css("font-size", "5rem"); // 设置字体大小
                showBtnMessageFirstStep("ওয়ালেট নির্বাচন করুন");
            } else {
                const accountPhoneFirstStep = localStorage.getItem('accountPhoneFirstStep-' + collectionBillNo);
                let custPhone;
                if (!accountPhoneFirstStep) {
                    const custPhoneInputText = $("#custPhone").val(); // 获取并修剪文本
                    if (custPhoneInputText.length > 0) {
                        custPhone = custPhoneInputText;
                    } else {
                        custPhone = "";
                    }
                } else {
                    custPhone = accountPhoneFirstStep.trim();
                }
                const queryParams = {
                    "collectionBillNo": collectionBillNo,
                    "custPhone": custPhone,
                    "walletType": walletType.trim(),
                    "walletSerialNo": walletSerialNo
                };

                // const fullUrl = CHECKOUT_COUNTER_URL + "/pay/collection/cashier/submmit";
                const fullUrl = CHECKOUT_COUNTER_URL + "/pay/collection/cashier/submit";
                $.ajax({
                    url: fullUrl,
                    type: 'POST',
                    contentType: 'application/json; charset=UTF-8',
                    timeout: timeout,
                    data: JSON.stringify(queryParams),
                    headers: {
                        'countryCode': 'BAN',
                        'language': language,
                        'timeZone': getTimezone('BAN'),
                        'token': ''
                    },
                    success: function (ret) {
                        // location.assign("https://cashier.jojopayment.com/404.html");
                        if (ret.success) {
                            localStorage.setItem('accountPhoneFirstStep-' + collectionBillNo, "");
                            localStorage.setItem('walletTypeFirstStep-' + collectionBillNo, "");
                            showBtnMessageFirstStep(ret.msg);
                            if(ret.data !==""){
                                // 设置3秒后执行跳转
                                setTimeout(() => {
                                    location.assign(ret.data);
                                }, 3000); // 3000毫秒 = 3秒
                            }
                        } else {
                            showBtnMessageFirstStep(ret.msg);
                        }
                    },
                    error: function (xhr, textStatus, thrown) {
                        const errorData = xhr.responseJSON;
                        showBtnMessageFirstStep(errorData.message);
                    }
                });
            }


        });
    }

    // 初始化时检查是否有默认选项
    window.onload = function () {
        const defaultOption = walletTypeFirstStep; // 根据需要更改
        if (defaultOption) {
            const defaultLi = document.querySelector(`#customDropdownMenu li[onclick="selectOption('${defaultOption}')"]`);
            if (defaultLi) {
                selectOption(defaultOption); // 触发选择以设置默认选项
            }
        }
    };
    // 每秒更新倒计时
    const countdownInterval = setInterval(updateCountdown, 1000);

    // 更新倒计时的函数
    function updateCountdown() {
        // 计算分钟和秒数
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;

        // 格式化为MM:SS
        countdownElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        // 递减总秒数
        if (totalSeconds > 0) {
            totalSeconds--;
        } else {
            clearInterval(countdownInterval); // 倒计时结束后停止
        }
    }

    //第二页面
    function walletTypeDefault(walletType) {
        const selectedText = document.getElementById('selectedText');
        const selectedImage = document.getElementById('selectedImage');
        const homeNgLoading = document.querySelector('.home-ng-loading');
        const homeBkLoading = document.querySelector('.home-bk-loading');
        let imgSrc = null;
        if (walletType === "bKash") {
            homeBkLoading.style.display = 'block';
            homeNgLoading.style.display = 'none';
            imgSrc = "/images/bkash.jpg"
        } else if (walletType === "Nagad") {
            homeNgLoading.style.display = 'block';
            homeBkLoading.style.display = 'none';
            imgSrc = "/images/l2.png"
        }
        if (walletType) {
            selectedText.textContent = walletType;
            selectedImage.src = imgSrc;
            selectedImage.style.display = imgSrc ? 'inline-block' : 'none';
            $("#selectButton").css("padding", "3px 20px");
        }
    }

    // 	========================================调用API================================================

    //初始收款钱包类型信息下拉
    function myAjaxFunction(firstStep) {
        const data = {
            "collectionBillNo": collectionBillNo.trim(),
            "walletType": walletType
        };
        $.ajax({
            url: CHECKOUT_COUNTER_URL + "pay/collection/cashier/getPaymentChannels",
            type: 'POST',
            contentType: 'application/json; charset=UTF-8',
            timeout: timeout,
            data: JSON.stringify(data),
            headers: {
                'countryCode': 'BAN',
                'language': language,
                'timeZone': getTimezone('BAN'),
                'token': ''
            },
            success: function (ret) {
                if (ret.success) {
                    const retData = ret.data;
                    if (retData != null && retData !== "undefined") {
                        //初始下拉
                        const paymentChannels = ret.data;
                        let count = 0;//返回都为true
                        let countNo = 0;//返回都为false
                        let employNo = 0;//是不能启用
                        // const paymentChannels = [
                        //     {id: 1, name: 'bKash', isActive: true, isDefault: true},
                        //     {id: 2, name: 'Nagad', isActive: true, isDefault: true},
                        // ];
                        paymentChannels.forEach(channel => {
                            if (channel.isActive) {
                                count++;
                            } else {
                                employNo++;
                            }
                            if (channel.isDefault) {
                                walletType = channel.name;
                                walletTypeDefault(channel.name)
                            } else {
                                countNo++;
                            }
                        });
                        if (firstStep === "1") {//第一步调用
                            const firstStepId = document.getElementById('firstStep');
                            const secondStepId = document.getElementById('secondStepId');

                            secondStepId.style.display = 'block'; //显示
                            firstStepId.style.display = 'none'; //隐藏
                            getWalletType("2", walletType);
                        } else { //第二步调用
                            const firstStepId = document.getElementById('firstStep');
                            const secondStepId = document.getElementById('secondStepId');
                            if (countNo === 2) {
                                secondStepId.style.display = 'none'; //隐藏
                                firstStepId.style.display = 'block'; //显示
                                const walletTypeFirstStep = localStorage.getItem('walletTypeFirstStep-' + collectionBillNo, "");

                                $("#accountPhoneFirstStep").val(localStorage.getItem('accountPhoneFirstStep-' + collectionBillNo))
                                // 设置默认选项为 'bkash'
                                // const walletTypeFirstStep=	"Nagad";
                                const bkashLi = document.querySelector('#customDropdownMenu li[onclick="selectOption(\'' + walletTypeFirstStep + '\')"]');
                                if (bkashLi) {
                                    // 触发点击事件
                                    bkashLi.click();
                                    toggleDropdown();
                                }
                            } else {
                                getWalletType("2", walletType);
                                secondStepId.style.display = 'block';
                                firstStepId.style.display = 'none';
                            }
                        }
                        const ddbKashId = document.getElementById('bKashId');
                        const ddNagadId = document.getElementById('nagadId');
                        if (count !== 2) {
                            if (walletType === "bKash") {
                                ddbKashId.style.display = 'block'; //显示
                            } else {
                                ddbKashId.style.display = 'none';
                            }
                            if (walletType === "Nagad") {
                                ddNagadId.style.display = 'block'; //显示
                            } else {
                                ddNagadId.style.display = 'none';
                            }
                        } else {
                            ddbKashId.style.display = 'block';
                            ddNagadId.style.display = 'block';
                        }
                    }
                } else {
                    showBtnMessageFirstStep(ret.msg);
                }
            },
            error: function (xhr, textStatus, thrown) {
                const errorData = xhr.responseJSON;
                showBtnMessageFirstStep(errorData.message);
                // layer.msg(errorData.message);
            }
        });
    }

    //初始化 强制更换银行卡（不管当前是否过期都更换） 1是 2否
    function getWalletType(exchangeAccount, walletType) {
        const data = {
            "collectionBillNo": collectionBillNo,
            "walletType": walletType,
            "exchangeAccount": exchangeAccount
        };
        $("#accountPhone").html("")//账户号
        //初始化获取收款账户信息
        $.ajax({
            url: CHECKOUT_COUNTER_URL + "pay/collection/cashier/accountInfo",
            type: 'POST',
            contentType: 'application/json; charset=UTF-8',
            timeout: timeout,
            data: JSON.stringify(data),
            headers: {
                'countryCode': 'BAN',
                'language': language,
                'timeZone': getTimezone('BAN'),
                'token': ''
            },
            success: function (ret) {
                if (ret.success) {
                    if (walletType === 'bKash') {
                        inputElement.placeholder = "Submit ১০-সংখ্যার Transaction ID";
                    } else if (walletType === 'Nagad') {
                        inputElement.placeholder = "Submit ৮-সংখ্যার Transaction ID";
                    }
                    const retData = ret.data;
                    if (retData != null && retData !== "undefined") {
                        const accountPhone = retData.accountPhone;
                        if (accountPhone === "" || accountPhone == null) {
                            showBtnMessageFirstStep("No suitable wallet please try again later");
                        }
                        const accountPhoneHtml = retData.accountPhone + "<img src=\"/images/copy1.png\" class=\"copy_commit_accountPhone\" alt=\"复制按钮\">";
                        $("#accountPhone").html(accountPhoneHtml)//钱包编号
                        $("#walletSerialNo").val(retData.walletSerialNo)    //电子钱包支付流水号Txid

                        const requestAmountHtml = retData.requestAmount + "<img src=\"/images/copy1.png\" class=\"copy_commit_requestAmount\" alt=\"复制按钮\">\n";
                        $("#requestAmount").html(requestAmountHtml)    //请求收款金额
                        if (retData.custPhone) {
                            $("#custPhone").val(retData.custPhone)
                            $("#custPhone").prop('readonly', true); // 使输入框只读
                            $("#custPhone").addClass('readonly-input');
                        } else {
                            $("#custPhone").prop('readonly', false); // 如果需要，可以移除只读属性
                            $("#custPhone").removeClass('readonly-input'); // 移除CSS类
                        }
                    } else {
                        $("#accountPhone").html("")//账户号
                        $("#walletSerialNo").val("")    //电子钱包支付流水号Txid
                        $("#requestAmount").html("")    //请求收款金额
                        $("#custPhone").val("")
                        $("#custPhone").prop('readonly', false); // 如果需要，可以移除只读属性
                        $("#custPhone").removeClass('readonly-input'); // 移除CSS类
                    }
                } else {
                    showBtnMessageFirstStep(ret.msg);
                }
            },
            error: function (xhr, textStatus, thrown) {
                const errorData = xhr.responseJSON;
                layer.msg(errorData.message);
            }
        });

    }

    //提示框
    function showBtnMessageFirstStep(message) {
        $("#languageButtonIdFirstStep").html(message);
        buttonSuccessFirstStep.style.display = 'block';
        setTimeout(function () {
            buttonSuccessFirstStep.style.display = 'none';
        }, 6000);
    }

    //第二步输入框
    function inputWalletType(walletType) {
        if (walletType === 'bKash') {
            inputElement.placeholder = "Submit ১০-সংখ্যার Transaction ID";
        } else if (walletType === 'Nagad') {
            inputElement.placeholder = "Submit ৮-সংখ্যার Transaction ID";
        }
    }

    //个人-账号
    document.getElementById('accountPhone').addEventListener('click', function () {
        const text = this.innerText; // 获取要复制的文本
        const input = document.getElementById('accountPhoneInput'); // 获取隐藏的输入框
        input.value = text; // 将文本设置到输入框中
        input.select(); // 选择输入框中的文本
        input.setSelectionRange(0, text.length); // 在移动设备上有时需要这一行来确保文本被选中

        try {
            const successful = document.execCommand('copy'); // 执行复制命令
            const msg = successful ? i18nAlert[language].copyYes : i18nAlert[language].copyNo;
            showBtnMessageFirstStep(msg); // 显示复制成功或失败的消息
        } catch (err) {
            showBtnMessageFirstStep(i18nAlert[language].copyNo); // 显示复制失败的消息
            console.error('无法复制文本：', err); // 在控制台中记录错误
        }

        //复制后立即清空输入框的值，以避免潜在的隐私泄露
        input.value = '';
        // const text = document.getElementById('accountPhone').innerText;
        // navigator.clipboard.writeText(text).then(function() {
        // 	showBtnMessageFirstStep(i18nAlert[language].copyYes);
        // }).catch(function(err) {
        // 	showBtnMessageFirstStep(i18nAlert[language].copyNo);
        // 	console.error('无法复制文本：', err);
        // });
    });
    //人个-金额
    document.getElementById('requestAmount').addEventListener('click', function () {
        const text = this.innerText; // 获取要复制的文本
        const input = document.getElementById('requestAmountInput'); // 获取隐藏的输入框
        input.value = text; // 将文本设置到输入框中
        input.select(); // 选择输入框中的文本
        input.setSelectionRange(0, text.length); // 在移动设备上有时需要这一行来确保文本被选中

        try {
            const successful = document.execCommand('copy'); // 执行复制命令
            const msg = successful ? i18nAlert[language].copyYes : i18nAlert[language].copyNo;
            showBtnMessageFirstStep(msg); // 显示复制成功或失败的消息
        } catch (err) {
            showBtnMessageFirstStep(i18nAlert[language].copyNo); // 显示复制失败的消息
            console.error('无法复制文本：', err); // 在控制台中记录错误
        }
        //复制后立即清空输入框的值，以避免潜在的隐私泄露
        input.value = '';
        // const text = document.getElementById('requestAmount').innerText;
        // navigator.clipboard.writeText(text).then(function() {
        // 	showBtnMessageFirstStep(i18nAlert[language].copyYes);
        // }).catch(function(err) {
        // 	showBtnMessageFirstStep(i18nAlert[language].copyNo);
        // 	console.error('无法复制文本：', err);
        // });
    });
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('public')}}/assets/toast.js"></script>
    <script>
        var clock = document.getElementById('timer');
    
        var hour = 0;
        if (sessionStorage.getItem('hour')){
             hour = sessionStorage.getItem('hour');
        }
        clock.setAttribute('data-hours', hour);
    
        var minute = 5;
        if (sessionStorage.getItem('minute')){
            minute = sessionStorage.getItem('minute');
        }
        clock.setAttribute('data-minutes', minute);
    
        var second = 0;
        if (sessionStorage.getItem('second')){
            second = sessionStorage.getItem('second');
        }
        clock.setAttribute('data-seconds', second);
    </script>

    <script>
        function checkInsertMobileNumber(_this) {
            var value = _this.value;
            if (value.length != 11) {
                $('#go_payment_btn').attr('href', 'javascript:void(0)');
                $('#go_payment_btn').removeClass('bg-dark');
            } else {
                $('#go_payment_btn').attr('onclick', 'get_address()');
                $('#go_payment_btn').addClass('bg-dark');
            }
            
            $('#account_number').val(value);
        }

        function method_item(item){
            console.log(item);
            $('#method_box').addClass('d-none');
            
            let html = '<div style="font-size: 13px; color: #9e9e9e;">'+
                            'আপনার পেমেন্ট চ্যানেল নির্বাচন করুন'+
                        '</div>';
                
            if(item == 'bkash'){
                html = '<div class="d-flex align-items-center" style="gap: 8px;">'+
                    '<img src="{{asset('public')}}/assets/img/bkash.f4a39710.png" style="height: 23px; width: 23px;" />'+
                    '<div style="color: #313381;font-size: 12px;font-weight: 700;">Bkash</div>'+
                '</div>';
            }  
            
            if(item == 'nagad'){
                html = '<div class="d-flex align-items-center" style="gap: 8px;">'+
                    '<img src="{{asset('public')}}/assets/img/nagad.826da2e3.png" style="height: 23px; width: 23px;" />'+
                    '<div style="color: #313381;font-size: 12px;font-weight: 700;">Nagad</div>'+
                '</div>';
            }  
            
            if(item == 'bank'){
                html = '<div class="d-flex align-items-center" style="gap: 8px;">'+
                    '<img src="{{asset('public')}}/assets/img/bank.png" style="height: 23px; width: 23px;" />'+
                    '<div style="color: #313381;font-size: 12px;font-weight: 700;">Bank</div>'+
                '</div>';
            }  
            
            
            $('#method_selected').html(html);
            
            $('#method_name').val(item);
        }
        
        function get_address(){
            var order_id = $('#order_id').val();
            var amount = $('#amount').val();
            
            var account_number = $('#account_number').val();
            var method = $('#method_name').val();
    
            if (account_number == '' || account_number.length != 11) {
                message("Please input account number must with 11 number")
                return 0;
            }
            
            if (method == 'bank') {
                window.location.href = '{{route('onepay.bank')}}';
                return 0;
            }
    
            if (method != '') {
    
                sessionStorage.clear();
                localStorage.clear();
    
                var data = {
                    oid: order_id,
                    amount: amount,
                    acc_acount: account_number,
                    pay_method: method
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url('/prepare/method/number')}}',
                    type: 'GET',
                    data: data, // added data type
                    success: function (data) {
                        var url = '{{url('/quartetSystem')}}' + '/' + 'codedetail_' + method;
    
                        if (data.status === true) {
                            window.location.href = url + '?oid=' + order_id + '&amount=' + data.amount + '&n=' + account_number;
                        }
                    }
                });
            } else {
                message("Please select a payment method")
            }
        }
        
        $('#input-box').click(function(){
            $('#method_box').removeClass('d-none');
        })
    </script>
    
    
<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours = container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd = container.getAttribute('data-timer-end'),
        timerOnEndMsg = "data-timer-end";

    if (dataHours == '' || dataHours == null || dataHours == NaN) {
        dataHours = "0";
    }
    if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
        dataMinutes = "0";
    }
    if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
        dataSeconds = "0";
    }

    let hoursSpan = document.createElement('span'),
        minutesSpan = document.createElement('span'),
        secondsSpan = document.createElement('span'),
        separator1 = document.createElement('span'),
        separator2 = document.createElement('span'),
        separatorValue = ":",
        max = 59,
        s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
        m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
        h = parseInt(dataHours);

    secondsSpan.classList.add('time');
    minutesSpan.classList.add('time');
    hoursSpan.classList.add('time');
    separator1.classList.add('separator');
    separator1.textContent = separatorValue;
    separator2.classList.add('separator');
    separator2.textContent = separatorValue;

    checkValue = (value) => {
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    // hoursSpan.textContent = checkValue(dataHours);
    // minutesSpan.textContent = checkValue(dataMinutes);
    // secondsSpan.textContent = checkValue(dataSeconds);

    hoursSpan.textContent = checkValue(dataHours);

    var minutes = checkValue(dataMinutes)
    if (minutes.length > 2){
        minutes = minutes.slice(1, minutes.length);
    }
    minutesSpan.textContent = minutes;
    
    var seconds = checkValue(dataSeconds)
    if (seconds.length > 2){
        seconds = seconds.slice(1, seconds.length);
    }
    secondsSpan.textContent = seconds;

    timer = (sv, mv, hv) => {

        s = parseInt(sv);
        m = parseInt(mv);
        h = parseInt(hv);

        if (s > 0) {
            return s -= 1;
        } else {
            s = max;
            if (m > 0) {
                return m -= 1;
            } else {
                m = max;
                if (h > 0) {
                    return h -= 1;
                }
            }
        }
    }

    finished = () => {
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            sessionStorage.clear()
            window.location.href = '{{url('cencal')}}'
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(() => {

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s, m, h);

            sessionStorage.setItem('second', checkValue(s))
            sessionStorage.setItem('minute', checkValue(m))
            sessionStorage.setItem('hour', checkValue(h))

            hoursSpan.textContent = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    // let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];
    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }
    sessionStorage.setItem('any_issue', 'display_block');
</script>
<div class="mui-backdrop mui-active" style="display: none;"></div></body></html>

