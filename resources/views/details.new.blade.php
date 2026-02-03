
<html lang="en"
    style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + 0px); --window-bottom: 0px;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>detalhes do pedido</title>
    <script>var coverSupport = 'CSS' in window && typeof CSS.supports === 'function' && (CSS.supports('top: env(a)') || CSS.supports('top: constant(a)'))
        document.write('<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' + (coverSupport ? ', viewport-fit=cover' : '') + '" />')</script>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/static/index.2da1efab.css">
     <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style type="text/css">
        @charset "UTF-8";

        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        /* 文字尺寸 */
        .conview {
            background-color: var(--page, #fff)
        }

        .botline {
            width: 34px;
            height: 2px;
            color: #4c63c1;
            border-radius: 26px
        }

        .zkline1 {
            width: 100%;
            height: 1px;
            background: #f7f7fa
        }

        .zkline2 {
            width: 100%;
            height: 2px;
            background: #f7f7fa
        }

        /* 边距 */
        /* 图片尺寸 */
        /* 颜色变量 */
        .aclffffff {
            color: #fff
        }

        .tipsSH {
            background: linear-gradient(135deg, red, #ffb17d) !important;
            color: #fff !important
        }

        .tipsHK {
            background: linear-gradient(143deg, #f70, #ffc47d) !important;
            color: #fff !important
        }

        .tipsUS {
            background: linear-gradient(135deg, #09f, #7dedff) !important;
            color: #fff !important
        }

        .par {
            height: 4px;
            background: #f7f7fa;
            margin-top: 9px
        }

        .zkimg1 {
            height: 30px;
            width: 30px
        }

        .zkimg2 {
            height: 14px !important;
            width: 14px !important
        }

        .zkimg3 {
            height: 26px;
            width: 26px
        }

        .zkimg4 {
            height: 34px;
            width: 34px
        }

        .zkimg5 {
            height: 19px;
            width: 19px
        }

        .img24 {
            height: 23px !important;
            width: 23px !important
        }

        .img16 {
            height: 15px;
            width: 15px
        }

        .img36 {
            height: 17px;
            width: 17px
        }

        .text_en {
            font-size: 10px !important
        }

        .bigpd {
            padding: 0 20px;
            width: 100%;
            min-height: 100vh;
            background-color: var(--page, #fff)
        }

        .blue_contain {
            background-color: var(--page, #fff)
        }

        .bigmg {
            margin: 20px
        }

        .mgt20 {
            margin-top: 19px
        }

        .bigbtn {
            height: 38px;
            font-size: 15px
        }

        .smallbtn {
            height: 28px;
            font-size: 15px
        }

        .loginun {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #373737;
            box-shadow: 0 3px 6px #dfdfdf;
            border-radius: 22px;
            font-size: 15px;
            font-weight: 500;
            color: #fff
        }

        .loginsele {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #5370e5;
            box-shadow: 0 2px 5px #b7c5ff;
            border-radius: 40px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 38px;
            text-align: center
        }

        .buttonsele {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #537ed1;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 57px
        }

        .bdtab {
            display: flex;
            flex-direction: row;
            white-space: nowrap
        }

        .bdtab .bdtab_i {
            display: inline-block;
            flex-wrap: nowrap;
            margin: 9px
        }

        .bdtab .bdtab_isele {
            font-size: 13px;
            color: #000;
            background-color: #3f4476;
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdtab .bdtab_iun {
            font-size: 13px;
            color: #999;
            opacity: .78;
            background-color: var(--page, #fff);
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdul {
            padding: 0 9px;
            height: 1022px
        }

        .bdul .bdlitit {
            display: flex;
            align-items: center;
            height: 34px;
            line-height: 34px;
            font-size: 11px;
            color: #000
        }

        .bdul .bdlicon {
            display: flex;
            align-items: center;
            padding: 4px
        }

        .bdul .bdlicon .bdlicon_tit {
            font-size: 14px;
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .bdul .bdlicon .tips1 {
            background-color: linear-gradient(143deg, #ff8c00, #ffc47d);
            border-radius: 3px;
            font-size: 9px;
            padding: 0 3px;
            margin-right: 4px;
            height: 17px;
            line-height: 17px
        }

        .bdul .bdlicon .tips2 {
            font-size: 9px;
            color: #999;
            margin-left: 3px
        }

        .bdul .bdlicon .dai {
            font-size: 13px;
            color: #999
        }

        .bdul .bdlicon .bdlicon_pri {
            font-size: 14px;
            color: #000;
            flex: 1
        }

        .bdul .bdlicon .zhangdie {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .zhang {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .die {
            font-size: 14px;
            color: #00ce60;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .inpname {
            margin-right: 9px;
            font-size: 13px;
            color: #000;
            padding: 9px 0 9px 0
        }

        .inp {
            display: flex;
            align-items: center;
            height: 46px;
            width: 100%;
            padding: 0 9px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(208, 211, 226, .38);
            border-radius: 20px
        }

        .inpval {
            font-size: 13px;
            color: #000;
            width: 100%
        }

        .inpplace {
            font-size: 13px;
            color: #ccc
        }

        .code_text {
            width: 76px;
            color: #000
        }

        .logininp {
            margin-top: 14px;
            display: flex;
            align-items: center;
            height: 33px;
            width: 100%;
            border-bottom: 1px solid #979797
        }

        .loginbot {
            display: flex;
            justify-content: space-between;
            margin-top: 19px;
            color: #4c63c1;
            font-size: 13px
        }

        .loginbotfix {
            font-size: 11px;
            color: #000;
            bottom: 48px;
            left: 16px;
            width: calc(100% - 33px)
        }

        ._bottom {
            position: absolute;
            bottom: 28px;
            left: 16px
        }

        .language {
            float: right;
            color: #3a87f8
        }

        .loginbottext {
            font-size: 11px;
            color: #4c63c1
        }

        .loginback {
            color: #999990;
            margin-top: 14px
        }

        .status_bar {
            background-color: var(--page, #fff);
            width: 100%
        }

        .logintip {
            padding-top: 19px;
            font-size: 24px;
            color: #000;
            font-weight: 700;
            line-height: 38px
        }

        .icon_right {
            width: 11px;
            height: 11px;
            margin-right: 11px
        }

        .tips {
            display: flex;
            align-items: center;
            font-size: 9px;
            color: #ae1111;
            margin-top: 4px
        }

        .clearfix:after {
            /*伪元素是行内元素 正常浏览器清除浮动方法*/
            content: "";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden
        }

        /* 字体 */
        .afz06 {
            font-size: 5px
        }

        .afz08 {
            font-size: 7px
        }

        .afz09 {
            font-size: 8px
        }

        .afz10 {
            font-size: 9px !important
        }

        .afz11 {
            font-size: 10px
        }

        .afz12 {
            font-size: 11px
        }

        .afz13 {
            font-size: 12px
        }

        .afz14 {
            font-size: 13px
        }

        .afz16 {
            font-size: 15px
        }

        .afz18 {
            font-size: 17px
        }

        .afz20 {
            font-size: 19px
        }

        .afz22 {
            font-size: 21px
        }

        .afz24 {
            font-size: 23px
        }

        .afz26 {
            font-size: 24px
        }

        .afz36 {
            font-size: 34px
        }

        /* 行高 */
        .lineh10 {
            min-height: 9px;
            line-height: 9px
        }

        .lineh12 {
            min-height: 11px;
            line-height: 11px
        }

        .lineh16 {
            min-height: 15px;
            line-height: 15px
        }

        .lineh18 {
            min-height: 17px;
            line-height: 17px
        }

        .lineh24 {
            min-height: 23px;
            line-height: 23px
        }

        .lineh28 {
            min-height: 26px;
            line-height: 26px
        }

        .lineh32 {
            min-height: 30px;
            line-height: 30px
        }

        .lineh44 {
            min-height: 42px;
            line-height: 42px
        }

        .lineh50 {
            min-height: 48px;
            line-height: 48px
        }

        /* 颜色 */
        .acl000000 {
            color: #000
        }

        .acl585858 {
            color: #585858
        }

        .acl283558 {
            color: #283558
        }

        .acl303f69 {
            color: #303f69
        }

        .acl22294b {
            color: #22294b
        }

        .acl3a4c80 {
            color: #3a4c80
        }

        .acld8d8d8 {
            color: #d8d8d8
        }

        .aclfdfdff {
            color: #fdfdff
        }

        .aclffffff {
            color: #fff
        }

        .acla2a4af {
            color: #a2a4af
        }

        .acl6f6f6f {
            color: #6f6f6f
        }

        .acl979797 {
            color: #979797
        }

        .acle2ae22 {
            color: #e2ae22
        }

        .aclFAB001 {
            color: #fab001
        }

        .acl38a3a2 {
            color: #38a3a2
        }

        .aclfedf93 {
            color: #fedf93
        }

        .aclea9424 {
            color: #ea9424
        }

        .acl262e55 {
            color: #262e55
        }

        .aclf5f5ff {
            color: #f5f5ff
        }

        .acl419eff {
            color: #419eff
        }

        .aclfbd993 {
            color: #fbd993
        }

        .acl26f296 {
            color: #26f296
        }

        .acl1d2431 {
            color: #1d2431
        }

        .acl2d3c65 {
            color: #2d3c65
        }

        .acl32426b {
            color: #32426b
        }

        .aclced6e8 {
            color: #ced6e8
        }

        .aclfee093 {
            color: #fee093
        }

        .acl9b9b9b {
            color: #9b9b9b
        }

        .acled0163 {
            color: #ed0163
        }

        .acl65788c {
            color: #65788c
        }

        .aclffdf66 {
            color: #ffdf66
        }

        .acl9d9fa8 {
            color: #9d9fa8
        }

        .aclb4c3d3 {
            color: #b4c3d3
        }

        .aclafb6cc {
            color: #afb6cc
        }

        .acl25bea1 {
            color: #25bea1
        }

        .aclffcc5d {
            color: #ffcc5d
        }

        .aclff9e1a {
            color: #ff9e1a
        }

        .aclfe8509 {
            color: #fe8509
        }

        .acl25bea1 {
            color: #25bea1
        }

        .aclf5428c {
            color: #f5428c
        }

        .acl333333 {
            color: #333
        }

        .acl666666 {
            color: #666
        }

        .aclB8B8B8 {
            color: #b8b8b8
        }

        .acl999999 {
            color: #999
        }

        .acl9A9A9A {
            color: #9a9a9a
        }

        .aclCCCCCC {
            color: #ccc !important
        }

        .aclB2B2B2 {
            color: #b2b2b2
        }

        .acl313381 {
            color: #313381
        }

        .aclBBBBBB {
            color: #bbb
        }

        .aclB4B4B4 {
            color: #b4b4b4
        }

        .acl9E9E9E {
            color: #9e9e9e
        }

        .aclC1CDFF {
            color: #c1cdff
        }

        .aclC8C8C8 {
            color: #c8c8c8
        }

        .acl252525 {
            color: #252525
        }

        .acl303030 {
            color: #303030
        }

        .aclFF3939 {
            color: #ff3939
        }

        .aclA8A8A8 {
            color: #a8a8a8
        }

        .aclF19B4F {
            color: #f19b4f
        }

        .aclF5F5F5 {
            color: #f5f5f5
        }

        .aclC9CCD8 {
            color: #c9ccd8
        }

        .acl5370E5 {
            color: #5370e5
        }

        .aclCEDEFF {
            color: #cedeff
        }

        .acl29B5E7 {
            color: #29b5e7
        }

        .aclA4A4A4 {
            color: #a4a4a4
        }

        .acl888888 {
            color: #888
        }

        .aclABABAB {
            color: #ababab
        }

        .acl2E2E2E {
            color: #2e2e2e
        }

        .acl6B6B6B {
            color: #6b6b6b
        }

        .animat {
            position: relative;
            animation: mymove 3s infinite;
            -webkit-animation: mymove 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        @keyframes mymove {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        @-webkit-keyframes mymove {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        .spin_ing {
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 1s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 1s;
            -webkit-animation: rotate 3s linear infinite;
            -moz-animation: rotate 3s linear infinite;
            -o-animation: rotate 3s linear infinite;
            animation: rotate 3s linear infinite
        }

        @-webkit-keyframes rotate {
            from {
                -webkit-transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(1turn)
            }
        }

        @-moz-keyframes rotate {
            from {
                -moz-transform: rotate(0deg)
            }

            to {
                -moz-transform: rotate(359deg)
            }
        }

        @-o-keyframes rotate {
            from {
                -o-transform: rotate(0deg)
            }

            to {
                -o-transform: rotate(359deg)
            }
        }

        @keyframes rotate {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        .orderBuying {
            color: #537ed1
        }

        .orderNopaid {
            color: #d36868
        }

        .orderCancel {
            color: #9b9b9b
        }

        .orderCompleted {
            color: #03c087
        }

        .orderExplain {
            color: #9b9b9b
        }

        /* 背景 */
        .abg283558 {
            background-color: #283558
        }

        .abg666666 {
            background-color: #666
        }

        .abg303f69 {
            background-color: #303f69
        }

        .abg3a4c80 {
            background-color: #3a4c80
        }

        .abg626e8c {
            background-color: #626e8c
        }

        .abg65788c {
            background-color: #65788c
        }

        .abg4e5e8c {
            background-color: #4e5e8c
        }

        .abg419eff {
            background-color: #419eff
        }

        .abg2a385f {
            background-color: #2a385f
        }

        .abg2d3c65 {
            background-color: #2d3c65
        }

        .abgf5428c {
            background-color: #f5428c
        }

        .abg25bea1 {
            background-color: #25bea1
        }

        .abg537ED1 {
            background-color: #537ed1
        }

        .abgD36868 {
            background-color: #d36868
        }

        /* start--文本行数限制--start */
        .singline {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .singline4 {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4
        }

        .line_single {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .line_two {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .cursor {
            cursor: pointer
        }

        .left {
            text-align: left
        }

        .center {
            text-align: center
        }

        .right {
            text-align: right
        }

        .fontweight {
            font-weight: 700
        }

        .fontweight6 {
            font-weight: 600
        }

        .fontweight5 {
            font-weight: 500
        }

        .line {
            height: 1px;
            background: hsla(0, 0%, 100%, .1)
        }

        .flex_ {
            display: flex
        }

        .flex_row {
            display: flex;
            align-items: center
        }

        .flex_row_center {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center
        }

        .flex_row_between {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .flex_row_left {
            display: flex;
            align-items: center
        }

        .flex1center {
            flex: 1;
            text-align: center
        }

        .flexauto {
            flex: auto
        }

        .flex1 {
            flex: 1
        }

        .flex2 {
            flex: 2
        }

        .flex3 {
            flex: 3
        }

        .underline {
            text-decoration: underline
        }

        .relative {
            position: relative
        }

        .Block {
            width: 100%;
            height: 5px;
            background: #fbfbfb
        }

        /* 宽度 */
        .alw1 {
            width: 1px
        }

        .alw2 {
            width: 1px
        }

        .alh1 {
            height: 1px
        }

        .alh2 {
            height: 1px
        }

        .abw100 {
            width: 48px
        }

        .abw160 {
            width: 76px
        }

        .abh80 {
            height: 38px
        }

        .abh100 {
            height: 48px
        }

        /* 外边距 */
        .amgl10 {
            margin-left: 9px
        }

        .amgl15 {
            margin-left: 14px
        }

        .amgr5 {
            margin-right: 4px
        }

        .amgr10 {
            margin-right: 9px
        }

        .amgr15 {
            margin-right: 14px
        }

        .amgt5 {
            margin-top: 4px
        }

        .amgt10 {
            margin-top: 9px
        }

        .amgt15 {
            margin-top: 14px
        }

        .amgb10 {
            margin-bottom: 9px
        }

        .amgb15 {
            margin-bottom: 14px
        }

        .margin10 {
            margin: 4px
        }

        .margin20 {
            margin: 9px
        }

        .marginlr20 {
            margin-left: 9px;
            margin-right: 9px
        }

        .marginlr30 {
            margin-left: 14px;
            margin-right: 14px
        }

        .margintb10 {
            margin-top: 4px;
            margin-bottom: 4px
        }

        .margintb20 {
            margin-top: 9px;
            margin-bottom: 9px
        }

        .margintb30 {
            margin-top: 14px;
            margin-bottom: 14px
        }

        .margintb40 {
            margin-top: 19px;
            margin-bottom: 19px
        }

        /* 内边距 */
        .apdl10 {
            padding-left: 9px
        }

        .apdl15 {
            padding-left: 14px
        }

        .apdr10 {
            padding-right: 9px
        }

        .apdr15 {
            padding-right: 14px
        }

        .apdt10 {
            padding-top: 9px
        }

        .apdt15 {
            padding-top: 14px
        }

        .apdb10 {
            padding-bottom: 9px
        }

        .apdb15 {
            padding-bottom: 14px
        }

        .apdl20 {
            padding-left: 19px
        }

        .apdl25 {
            padding-left: 24px
        }

        .apdl30 {
            padding-left: 28px
        }

        .apdr20 {
            padding-right: 19px
        }

        .apdr25 {
            padding-right: 24px
        }

        .apdr30 {
            padding-right: 14px
        }

        .apdt20 {
            padding-top: 19px
        }

        .apdt25 {
            padding-top: 24px
        }

        .apdt30 {
            padding-top: 28px
        }

        .apdb20 {
            padding-bottom: 19px
        }

        .apdb25 {
            padding-bottom: 24px
        }

        .apdb30 {
            padding-bottom: 28px
        }

        .padding20 {
            padding: 9px
        }

        .padding30 {
            padding: 14px
        }

        .padding36 {
            padding: 17px
        }

        .padding40 {
            padding: 19px
        }

        .padding50 {
            padding: 24px
        }

        .paddingtb10 {
            padding-top: 6px;
            padding-bottom: 6px
        }

        .paddingtb20 {
            padding-top: 9px;
            padding-bottom: 9px
        }

        .paddingtb40 {
            padding-top: 19px;
            padding-bottom: 19px
        }

        .paddinglr20 {
            padding-left: 9px;
            padding-right: 9px
        }

        .paddinglr40 {
            padding-left: 19px;
            padding-right: 19px
        }

        /* 图片大小 */
        .img12_12 {
            width: 11px;
            height: 11px
        }

        .img14_14 {
            width: 13px;
            height: 13px
        }

        .img24_24 {
            width: 23px;
            height: 23px
        }

        .img36_36 {
            width: 34px;
            height: 34px
        }

        .img8_13 {
            width: 7px;
            height: 12px
        }

        .img33_33 {
            width: 31px;
            height: 31px
        }

        .img6_6 {
            width: 5px;
            height: 5px
        }

        .img14_2 {
            width: 13px;
            height: 9px
        }

        .img17_17 {
            width: 16px;
            height: 16px
        }

        .img11_11 {
            width: 10px;
            height: 10px
        }

        /* 高与行高 */
        /* 宽高与行高 */
        /* 字体 */
        .afz08 {
            font-size: 7px !important
        }

        .afz10 {
            font-size: 9px !important
        }

        .afz11 {
            font-size: 10px
        }

        .afz12 {
            font-size: 11px
        }

        .afz13 {
            font-size: 12px
        }

        .afz14 {
            font-size: 13px
        }

        .afz15 {
            font-size: 14px
        }

        .afz16 {
            font-size: 15px
        }

        .afz18 {
            font-size: 17px
        }

        .afz20 {
            font-size: 19px
        }

        .afz22 {
            font-size: 21px
        }

        .afz24 {
            font-size: 23px
        }

        .afz25 {
            font-size: 24px
        }

        .afz26 {
            font-size: 24px
        }

        .afz28 {
            font-size: 26px
        }

        .afz32 {
            font-size: 30px
        }

        .afz36 {
            font-size: 34px
        }

        /* 手机端下的样式 */
        /*每个页面公共css */
        .col_666 {
            color: #666
        }

        .col_999 {
            color: #999
        }

        .col_316EDE {
            color: #316ede
        }

        .f_s20 {
            font-size: 9px
        }

        .f_s22 {
            font-size: 10px
        }

        .f_s27 {
            font-size: 12px
        }

        .f_s29 {
            font-size: 13px
        }

        .f_s36 {
            font-size: 17px
        }

        .f_wb {
            font-weight: 700
        }

        .borders {
            border: 1px solid #ededed
        }

        .borderd {
            border: 1px dashed #707070
        }

        .borderbottomd {
            border-bottom: 1px dashed #b2b2b2
        }

        .borderbottoms {
            border-bottom: 1px solid #f5f5f5
        }

        .line1 {
            width: 100%;
            height: 1px;
            background: #e6e6e6
        }

        .bg3BA52B {
            background: #46b536;
            border-radius: 7px
        }

        .bgDF2A2A {
            background: #df2a2a;
            border-radius: 7px
        }

        .zan10 {
            width: 100%;
            height: 4px;
            background: #f1f3f4
        }

        .arrowright {
            width: 15px !important;
            height: 15px !important;
            padding: 9px !important
        }

        .arrowleft {
            width: 42px;
            padding: 9px
        }

        .lishi {
            width: 42px;
            height: 42px;
            padding: 9px
        }

        .myiconimg {
            width: 23px;
            height: 23px;
            color: #999
        }

        .mytipimg {
            width: 42px;
            height: 42px
        }

        .bgwhite {
            background: #fff
        }

        .lii_up {
            font-size: 11px;
            color: #ff5a75
        }

        .lii_down {
            font-size: 11px;
            color: #00ce60
        }

        .title_v {
            width: 3px;
            height: 11px;
            background: #5370e5
        }

        .sellcardbutton_l {
            width: 84px;
            height: 30px;
            border: 1px solid #466ef2;
            color: #466ef2;
            border-radius: 3px
        }

        .sellcardbutton_r {
            width: 84px;
            height: 30px;
            background: #466ef2;
            border-radius: 3px
        }

        .inputstyle1 {
            width: 100%;
            padding: 14px;
            min-height: 48px;
            background: #fff;
            box-shadow: 0 4px 20px 0 #d3e0e8
        }

        .styleN1 {
            min-height: 100vh;
            background: linear-gradient(0deg, #f8fcff 0, #e3f5ff)
        }

        .expireTimediv {
            padding: 2px 6px;
            height: 24px;
            background: rgba(217, 242, 255, .59);
            border-radius: 12px
        }

        .border_b_0 {
            border-bottom: 1px solid #cce5f1
        }

        .img20 {
            width: 19px;
            height: 19px
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        .element {
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite
        }

        .u-relative,
        .u-rela {
            position: relative
        }

        .u-absolute,
        .u-abso {
            position: absolute
        }

        uni-image {
            display: inline-block
        }

        uni-view,
        uni-text {
            box-sizing: border-box
        }

        .u-font-xs {
            font-size: 10px
        }

        .u-font-sm {
            font-size: 12px
        }

        .u-font-md {
            font-size: 13px
        }

        .u-font-lg {
            font-size: 14px
        }

        .u-font-xl {
            font-size: 16px
        }

        .u-flex {
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .u-flex-wrap {
            flex-wrap: wrap
        }

        .u-flex-nowrap {
            flex-wrap: nowrap
        }

        .u-col-center {
            align-items: center
        }

        .u-col-top {
            align-items: flex-start
        }

        .u-col-bottom {
            align-items: flex-end
        }

        .u-row-center {
            justify-content: center
        }

        .u-row-left {
            justify-content: flex-start
        }

        .u-row-right {
            justify-content: flex-end
        }

        .u-row-between {
            justify-content: space-between
        }

        .u-row-around {
            justify-content: space-around
        }

        .u-text-left {
            text-align: left
        }

        .u-text-center {
            text-align: center
        }

        .u-text-right {
            text-align: right
        }

        .u-flex-col {
            display: flex;
            flex-direction: column
        }

        .u-flex-0 {
            flex: 0
        }

        .u-flex-1 {
            flex: 1
        }

        .u-flex-2 {
            flex: 2
        }

        .u-flex-3 {
            flex: 3
        }

        .u-flex-4 {
            flex: 4
        }

        .u-flex-5 {
            flex: 5
        }

        .u-flex-6 {
            flex: 6
        }

        .u-flex-7 {
            flex: 7
        }

        .u-flex-8 {
            flex: 8
        }

        .u-flex-9 {
            flex: 9
        }

        .u-flex-10 {
            flex: 10
        }

        .u-flex-11 {
            flex: 11
        }

        .u-flex-12 {
            flex: 12
        }

        .u-font-9 {
            font-size: 9px
        }

        .u-font-10 {
            font-size: 10px
        }

        .u-font-11 {
            font-size: 11px
        }

        .u-font-12 {
            font-size: 12px
        }

        .u-font-13 {
            font-size: 13px
        }

        .u-font-14 {
            font-size: 14px
        }

        .u-font-15 {
            font-size: 15px
        }

        .u-font-16 {
            font-size: 16px
        }

        .u-font-17 {
            font-size: 17px
        }

        .u-font-18 {
            font-size: 18px
        }

        .u-font-19 {
            font-size: 19px
        }

        .u-font-20 {
            font-size: 9px
        }

        .u-font-21 {
            font-size: 10px
        }

        .u-font-22 {
            font-size: 10px
        }

        .u-font-23 {
            font-size: 11px
        }

        .u-font-24 {
            font-size: 11px
        }

        .u-font-25 {
            font-size: 12px
        }

        .u-font-26 {
            font-size: 12px
        }

        .u-font-27 {
            font-size: 12px
        }

        .u-font-28 {
            font-size: 13px
        }

        .u-font-29 {
            font-size: 13px
        }

        .u-font-30 {
            font-size: 14px
        }

        .u-font-31 {
            font-size: 14px
        }

        .u-font-32 {
            font-size: 15px
        }

        .u-font-33 {
            font-size: 15px
        }

        .u-font-34 {
            font-size: 16px
        }

        .u-font-35 {
            font-size: 16px
        }

        .u-font-36 {
            font-size: 17px
        }

        .u-font-37 {
            font-size: 17px
        }

        .u-font-38 {
            font-size: 18px
        }

        .u-font-39 {
            font-size: 18px
        }

        .u-font-40 {
            font-size: 19px
        }

        .u-margin-0,
        .u-m-0 {
            margin: 0px !important
        }

        .u-padding-0,
        .u-p-0 {
            padding: 0px !important
        }

        .u-m-l-0 {
            margin-left: 0px !important
        }

        .u-p-l-0 {
            padding-left: 0px !important
        }

        .u-margin-left-0 {
            margin-left: 0px !important
        }

        .u-padding-left-0 {
            padding-left: 0px !important
        }

        .u-m-t-0 {
            margin-top: 0px !important
        }

        .u-p-t-0 {
            padding-top: 0px !important
        }

        .u-margin-top-0 {
            margin-top: 0px !important
        }

        .u-padding-top-0 {
            padding-top: 0px !important
        }

        .u-m-r-0 {
            margin-right: 0px !important
        }

        .u-p-r-0 {
            padding-right: 0px !important
        }

        .u-margin-right-0 {
            margin-right: 0px !important
        }

        .u-padding-right-0 {
            padding-right: 0px !important
        }

        .u-m-b-0 {
            margin-bottom: 0px !important
        }

        .u-p-b-0 {
            padding-bottom: 0px !important
        }

        .u-margin-bottom-0 {
            margin-bottom: 0px !important
        }

        .u-padding-bottom-0 {
            padding-bottom: 0px !important
        }

        .u-margin-2,
        .u-m-2 {
            margin: 1px !important
        }

        .u-padding-2,
        .u-p-2 {
            padding: 1px !important
        }

        .u-m-l-2 {
            margin-left: 1px !important
        }

        .u-p-l-2 {
            padding-left: 1px !important
        }

        .u-margin-left-2 {
            margin-left: 1px !important
        }

        .u-padding-left-2 {
            padding-left: 1px !important
        }

        .u-m-t-2 {
            margin-top: 1px !important
        }

        .u-p-t-2 {
            padding-top: 1px !important
        }

        .u-margin-top-2 {
            margin-top: 1px !important
        }

        .u-padding-top-2 {
            padding-top: 1px !important
        }

        .u-m-r-2 {
            margin-right: 1px !important
        }

        .u-p-r-2 {
            padding-right: 1px !important
        }

        .u-margin-right-2 {
            margin-right: 1px !important
        }

        .u-padding-right-2 {
            padding-right: 1px !important
        }

        .u-m-b-2 {
            margin-bottom: 1px !important
        }

        .u-p-b-2 {
            padding-bottom: 1px !important
        }

        .u-margin-bottom-2 {
            margin-bottom: 1px !important
        }

        .u-padding-bottom-2 {
            padding-bottom: 1px !important
        }

        .u-margin-4,
        .u-m-4 {
            margin: 1px !important
        }

        .u-padding-4,
        .u-p-4 {
            padding: 1px !important
        }

        .u-m-l-4 {
            margin-left: 1px !important
        }

        .u-p-l-4 {
            padding-left: 1px !important
        }

        .u-margin-left-4 {
            margin-left: 1px !important
        }

        .u-padding-left-4 {
            padding-left: 1px !important
        }

        .u-m-t-4 {
            margin-top: 1px !important
        }

        .u-p-t-4 {
            padding-top: 1px !important
        }

        .u-margin-top-4 {
            margin-top: 1px !important
        }

        .u-padding-top-4 {
            padding-top: 1px !important
        }

        .u-m-r-4 {
            margin-right: 1px !important
        }

        .u-p-r-4 {
            padding-right: 1px !important
        }

        .u-margin-right-4 {
            margin-right: 1px !important
        }

        .u-padding-right-4 {
            padding-right: 1px !important
        }

        .u-m-b-4 {
            margin-bottom: 1px !important
        }

        .u-p-b-4 {
            padding-bottom: 1px !important
        }

        .u-margin-bottom-4 {
            margin-bottom: 1px !important
        }

        .u-padding-bottom-4 {
            padding-bottom: 1px !important
        }

        .u-margin-5,
        .u-m-5 {
            margin: 2px !important
        }

        .u-padding-5,
        .u-p-5 {
            padding: 2px !important
        }

        .u-m-l-5 {
            margin-left: 2px !important
        }

        .u-p-l-5 {
            padding-left: 2px !important
        }

        .u-margin-left-5 {
            margin-left: 2px !important
        }

        .u-padding-left-5 {
            padding-left: 2px !important
        }

        .u-m-t-5 {
            margin-top: 2px !important
        }

        .u-p-t-5 {
            padding-top: 2px !important
        }

        .u-margin-top-5 {
            margin-top: 2px !important
        }

        .u-padding-top-5 {
            padding-top: 2px !important
        }

        .u-m-r-5 {
            margin-right: 2px !important
        }

        .u-p-r-5 {
            padding-right: 2px !important
        }

        .u-margin-right-5 {
            margin-right: 2px !important
        }

        .u-padding-right-5 {
            padding-right: 2px !important
        }

        .u-m-b-5 {
            margin-bottom: 2px !important
        }

        .u-p-b-5 {
            padding-bottom: 2px !important
        }

        .u-margin-bottom-5 {
            margin-bottom: 2px !important
        }

        .u-padding-bottom-5 {
            padding-bottom: 2px !important
        }

        .u-margin-6,
        .u-m-6 {
            margin: 2px !important
        }

        .u-padding-6,
        .u-p-6 {
            padding: 2px !important
        }

        .u-m-l-6 {
            margin-left: 2px !important
        }

        .u-p-l-6 {
            padding-left: 2px !important
        }

        .u-margin-left-6 {
            margin-left: 2px !important
        }

        .u-padding-left-6 {
            padding-left: 2px !important
        }

        .u-m-t-6 {
            margin-top: 2px !important
        }

        .u-p-t-6 {
            padding-top: 2px !important
        }

        .u-margin-top-6 {
            margin-top: 2px !important
        }

        .u-padding-top-6 {
            padding-top: 2px !important
        }

        .u-m-r-6 {
            margin-right: 2px !important
        }

        .u-p-r-6 {
            padding-right: 2px !important
        }

        .u-margin-right-6 {
            margin-right: 2px !important
        }

        .u-padding-right-6 {
            padding-right: 2px !important
        }

        .u-m-b-6 {
            margin-bottom: 2px !important
        }

        .u-p-b-6 {
            padding-bottom: 2px !important
        }

        .u-margin-bottom-6 {
            margin-bottom: 2px !important
        }

        .u-padding-bottom-6 {
            padding-bottom: 2px !important
        }

        .u-margin-8,
        .u-m-8 {
            margin: 3px !important
        }

        .u-padding-8,
        .u-p-8 {
            padding: 3px !important
        }

        .u-m-l-8 {
            margin-left: 3px !important
        }

        .u-p-l-8 {
            padding-left: 3px !important
        }

        .u-margin-left-8 {
            margin-left: 3px !important
        }

        .u-padding-left-8 {
            padding-left: 3px !important
        }

        .u-m-t-8 {
            margin-top: 3px !important
        }

        .u-p-t-8 {
            padding-top: 3px !important
        }

        .u-margin-top-8 {
            margin-top: 3px !important
        }

        .u-padding-top-8 {
            padding-top: 3px !important
        }

        .u-m-r-8 {
            margin-right: 3px !important
        }

        .u-p-r-8 {
            padding-right: 3px !important
        }

        .u-margin-right-8 {
            margin-right: 3px !important
        }

        .u-padding-right-8 {
            padding-right: 3px !important
        }

        .u-m-b-8 {
            margin-bottom: 3px !important
        }

        .u-p-b-8 {
            padding-bottom: 3px !important
        }

        .u-margin-bottom-8 {
            margin-bottom: 3px !important
        }

        .u-padding-bottom-8 {
            padding-bottom: 3px !important
        }

        .u-margin-10,
        .u-m-10 {
            margin: 4px !important
        }

        .u-padding-10,
        .u-p-10 {
            padding: 4px !important
        }

        .u-m-l-10 {
            margin-left: 4px !important
        }

        .u-p-l-10 {
            padding-left: 4px !important
        }

        .u-margin-left-10 {
            margin-left: 4px !important
        }

        .u-padding-left-10 {
            padding-left: 4px !important
        }

        .u-m-t-10 {
            margin-top: 4px !important
        }

        .u-p-t-10 {
            padding-top: 4px !important
        }

        .u-margin-top-10 {
            margin-top: 4px !important
        }

        .u-padding-top-10 {
            padding-top: 4px !important
        }

        .u-m-r-10 {
            margin-right: 4px !important
        }

        .u-p-r-10 {
            padding-right: 4px !important
        }

        .u-margin-right-10 {
            margin-right: 4px !important
        }

        .u-padding-right-10 {
            padding-right: 4px !important
        }

        .u-m-b-10 {
            margin-bottom: 4px !important
        }

        .u-p-b-10 {
            padding-bottom: 4px !important
        }

        .u-margin-bottom-10 {
            margin-bottom: 4px !important
        }

        .u-padding-bottom-10 {
            padding-bottom: 4px !important
        }

        .u-margin-12,
        .u-m-12 {
            margin: 5px !important
        }

        .u-padding-12,
        .u-p-12 {
            padding: 5px !important
        }

        .u-m-l-12 {
            margin-left: 5px !important
        }

        .u-p-l-12 {
            padding-left: 5px !important
        }

        .u-margin-left-12 {
            margin-left: 5px !important
        }

        .u-padding-left-12 {
            padding-left: 5px !important
        }

        .u-m-t-12 {
            margin-top: 5px !important
        }

        .u-p-t-12 {
            padding-top: 5px !important
        }

        .u-margin-top-12 {
            margin-top: 5px !important
        }

        .u-padding-top-12 {
            padding-top: 5px !important
        }

        .u-m-r-12 {
            margin-right: 5px !important
        }

        .u-p-r-12 {
            padding-right: 5px !important
        }

        .u-margin-right-12 {
            margin-right: 5px !important
        }

        .u-padding-right-12 {
            padding-right: 5px !important
        }

        .u-m-b-12 {
            margin-bottom: 5px !important
        }

        .u-p-b-12 {
            padding-bottom: 5px !important
        }

        .u-margin-bottom-12 {
            margin-bottom: 5px !important
        }

        .u-padding-bottom-12 {
            padding-bottom: 5px !important
        }

        .u-margin-14,
        .u-m-14 {
            margin: 6px !important
        }

        .u-padding-14,
        .u-p-14 {
            padding: 6px !important
        }

        .u-m-l-14 {
            margin-left: 6px !important
        }

        .u-p-l-14 {
            padding-left: 6px !important
        }

        .u-margin-left-14 {
            margin-left: 6px !important
        }

        .u-padding-left-14 {
            padding-left: 6px !important
        }

        .u-m-t-14 {
            margin-top: 6px !important
        }

        .u-p-t-14 {
            padding-top: 6px !important
        }

        .u-margin-top-14 {
            margin-top: 6px !important
        }

        .u-padding-top-14 {
            padding-top: 6px !important
        }

        .u-m-r-14 {
            margin-right: 6px !important
        }

        .u-p-r-14 {
            padding-right: 6px !important
        }

        .u-margin-right-14 {
            margin-right: 6px !important
        }

        .u-padding-right-14 {
            padding-right: 6px !important
        }

        .u-m-b-14 {
            margin-bottom: 6px !important
        }

        .u-p-b-14 {
            padding-bottom: 6px !important
        }

        .u-margin-bottom-14 {
            margin-bottom: 6px !important
        }

        .u-padding-bottom-14 {
            padding-bottom: 6px !important
        }

        .u-margin-15,
        .u-m-15 {
            margin: 7px !important
        }

        .u-padding-15,
        .u-p-15 {
            padding: 7px !important
        }

        .u-m-l-15 {
            margin-left: 7px !important
        }

        .u-p-l-15 {
            padding-left: 7px !important
        }

        .u-margin-left-15 {
            margin-left: 7px !important
        }

        .u-padding-left-15 {
            padding-left: 7px !important
        }

        .u-m-t-15 {
            margin-top: 7px !important
        }

        .u-p-t-15 {
            padding-top: 7px !important
        }

        .u-margin-top-15 {
            margin-top: 7px !important
        }

        .u-padding-top-15 {
            padding-top: 7px !important
        }

        .u-m-r-15 {
            margin-right: 7px !important
        }

        .u-p-r-15 {
            padding-right: 7px !important
        }

        .u-margin-right-15 {
            margin-right: 7px !important
        }

        .u-padding-right-15 {
            padding-right: 7px !important
        }

        .u-m-b-15 {
            margin-bottom: 7px !important
        }

        .u-p-b-15 {
            padding-bottom: 7px !important
        }

        .u-margin-bottom-15 {
            margin-bottom: 7px !important
        }

        .u-padding-bottom-15 {
            padding-bottom: 7px !important
        }

        .u-margin-16,
        .u-m-16 {
            margin: 7px !important
        }

        .u-padding-16,
        .u-p-16 {
            padding: 7px !important
        }

        .u-m-l-16 {
            margin-left: 7px !important
        }

        .u-p-l-16 {
            padding-left: 7px !important
        }

        .u-margin-left-16 {
            margin-left: 7px !important
        }

        .u-padding-left-16 {
            padding-left: 7px !important
        }

        .u-m-t-16 {
            margin-top: 7px !important
        }

        .u-p-t-16 {
            padding-top: 7px !important
        }

        .u-margin-top-16 {
            margin-top: 7px !important
        }

        .u-padding-top-16 {
            padding-top: 7px !important
        }

        .u-m-r-16 {
            margin-right: 7px !important
        }

        .u-p-r-16 {
            padding-right: 7px !important
        }

        .u-margin-right-16 {
            margin-right: 7px !important
        }

        .u-padding-right-16 {
            padding-right: 7px !important
        }

        .u-m-b-16 {
            margin-bottom: 7px !important
        }

        .u-p-b-16 {
            padding-bottom: 7px !important
        }

        .u-margin-bottom-16 {
            margin-bottom: 7px !important
        }

        .u-padding-bottom-16 {
            padding-bottom: 7px !important
        }

        .u-margin-18,
        .u-m-18 {
            margin: 8px !important
        }

        .u-padding-18,
        .u-p-18 {
            padding: 8px !important
        }

        .u-m-l-18 {
            margin-left: 8px !important
        }

        .u-p-l-18 {
            padding-left: 8px !important
        }

        .u-margin-left-18 {
            margin-left: 8px !important
        }

        .u-padding-left-18 {
            padding-left: 8px !important
        }

        .u-m-t-18 {
            margin-top: 8px !important
        }

        .u-p-t-18 {
            padding-top: 8px !important
        }

        .u-margin-top-18 {
            margin-top: 8px !important
        }

        .u-padding-top-18 {
            padding-top: 8px !important
        }

        .u-m-r-18 {
            margin-right: 8px !important
        }

        .u-p-r-18 {
            padding-right: 8px !important
        }

        .u-margin-right-18 {
            margin-right: 8px !important
        }

        .u-padding-right-18 {
            padding-right: 8px !important
        }

        .u-m-b-18 {
            margin-bottom: 8px !important
        }

        .u-p-b-18 {
            padding-bottom: 8px !important
        }

        .u-margin-bottom-18 {
            margin-bottom: 8px !important
        }

        .u-padding-bottom-18 {
            padding-bottom: 8px !important
        }

        .u-margin-20,
        .u-m-20 {
            margin: 9px !important
        }

        .u-padding-20,
        .u-p-20 {
            padding: 9px !important
        }

        .u-m-l-20 {
            margin-left: 9px !important
        }

        .u-p-l-20 {
            padding-left: 9px !important
        }

        .u-margin-left-20 {
            margin-left: 9px !important
        }

        .u-padding-left-20 {
            padding-left: 9px !important
        }

        .u-m-t-20 {
            margin-top: 9px !important
        }

        .u-p-t-20 {
            padding-top: 9px !important
        }

        .u-margin-top-20 {
            margin-top: 9px !important
        }

        .u-padding-top-20 {
            padding-top: 9px !important
        }

        .u-m-r-20 {
            margin-right: 9px !important
        }

        .u-p-r-20 {
            padding-right: 9px !important
        }

        .u-margin-right-20 {
            margin-right: 9px !important
        }

        .u-padding-right-20 {
            padding-right: 9px !important
        }

        .u-m-b-20 {
            margin-bottom: 9px !important
        }

        .u-p-b-20 {
            padding-bottom: 9px !important
        }

        .u-margin-bottom-20 {
            margin-bottom: 9px !important
        }

        .u-padding-bottom-20 {
            padding-bottom: 9px !important
        }

        .u-margin-22,
        .u-m-22 {
            margin: 10px !important
        }

        .u-padding-22,
        .u-p-22 {
            padding: 10px !important
        }

        .u-m-l-22 {
            margin-left: 10px !important
        }

        .u-p-l-22 {
            padding-left: 10px !important
        }

        .u-margin-left-22 {
            margin-left: 10px !important
        }

        .u-padding-left-22 {
            padding-left: 10px !important
        }

        .u-m-t-22 {
            margin-top: 10px !important
        }

        .u-p-t-22 {
            padding-top: 10px !important
        }

        .u-margin-top-22 {
            margin-top: 10px !important
        }

        .u-padding-top-22 {
            padding-top: 10px !important
        }

        .u-m-r-22 {
            margin-right: 10px !important
        }

        .u-p-r-22 {
            padding-right: 10px !important
        }

        .u-margin-right-22 {
            margin-right: 10px !important
        }

        .u-padding-right-22 {
            padding-right: 10px !important
        }

        .u-m-b-22 {
            margin-bottom: 10px !important
        }

        .u-p-b-22 {
            padding-bottom: 10px !important
        }

        .u-margin-bottom-22 {
            margin-bottom: 10px !important
        }

        .u-padding-bottom-22 {
            padding-bottom: 10px !important
        }

        .u-margin-24,
        .u-m-24 {
            margin: 11px !important
        }

        .u-padding-24,
        .u-p-24 {
            padding: 11px !important
        }

        .u-m-l-24 {
            margin-left: 11px !important
        }

        .u-p-l-24 {
            padding-left: 11px !important
        }

        .u-margin-left-24 {
            margin-left: 11px !important
        }

        .u-padding-left-24 {
            padding-left: 11px !important
        }

        .u-m-t-24 {
            margin-top: 11px !important
        }

        .u-p-t-24 {
            padding-top: 11px !important
        }

        .u-margin-top-24 {
            margin-top: 11px !important
        }

        .u-padding-top-24 {
            padding-top: 11px !important
        }

        .u-m-r-24 {
            margin-right: 11px !important
        }

        .u-p-r-24 {
            padding-right: 11px !important
        }

        .u-margin-right-24 {
            margin-right: 11px !important
        }

        .u-padding-right-24 {
            padding-right: 11px !important
        }

        .u-m-b-24 {
            margin-bottom: 11px !important
        }

        .u-p-b-24 {
            padding-bottom: 11px !important
        }

        .u-margin-bottom-24 {
            margin-bottom: 11px !important
        }

        .u-padding-bottom-24 {
            padding-bottom: 11px !important
        }

        .u-margin-25,
        .u-m-25 {
            margin: 12px !important
        }

        .u-padding-25,
        .u-p-25 {
            padding: 12px !important
        }

        .u-m-l-25 {
            margin-left: 12px !important
        }

        .u-p-l-25 {
            padding-left: 12px !important
        }

        .u-margin-left-25 {
            margin-left: 12px !important
        }

        .u-padding-left-25 {
            padding-left: 12px !important
        }

        .u-m-t-25 {
            margin-top: 12px !important
        }

        .u-p-t-25 {
            padding-top: 12px !important
        }

        .u-margin-top-25 {
            margin-top: 12px !important
        }

        .u-padding-top-25 {
            padding-top: 12px !important
        }

        .u-m-r-25 {
            margin-right: 12px !important
        }

        .u-p-r-25 {
            padding-right: 12px !important
        }

        .u-margin-right-25 {
            margin-right: 12px !important
        }

        .u-padding-right-25 {
            padding-right: 12px !important
        }

        .u-m-b-25 {
            margin-bottom: 12px !important
        }

        .u-p-b-25 {
            padding-bottom: 12px !important
        }

        .u-margin-bottom-25 {
            margin-bottom: 12px !important
        }

        .u-padding-bottom-25 {
            padding-bottom: 12px !important
        }

        .u-margin-26,
        .u-m-26 {
            margin: 12px !important
        }

        .u-padding-26,
        .u-p-26 {
            padding: 12px !important
        }

        .u-m-l-26 {
            margin-left: 12px !important
        }

        .u-p-l-26 {
            padding-left: 12px !important
        }

        .u-margin-left-26 {
            margin-left: 12px !important
        }

        .u-padding-left-26 {
            padding-left: 12px !important
        }

        .u-m-t-26 {
            margin-top: 12px !important
        }

        .u-p-t-26 {
            padding-top: 12px !important
        }

        .u-margin-top-26 {
            margin-top: 12px !important
        }

        .u-padding-top-26 {
            padding-top: 12px !important
        }

        .u-m-r-26 {
            margin-right: 12px !important
        }

        .u-p-r-26 {
            padding-right: 12px !important
        }

        .u-margin-right-26 {
            margin-right: 12px !important
        }

        .u-padding-right-26 {
            padding-right: 12px !important
        }

        .u-m-b-26 {
            margin-bottom: 12px !important
        }

        .u-p-b-26 {
            padding-bottom: 12px !important
        }

        .u-margin-bottom-26 {
            margin-bottom: 12px !important
        }

        .u-padding-bottom-26 {
            padding-bottom: 12px !important
        }

        .u-margin-28,
        .u-m-28 {
            margin: 13px !important
        }

        .u-padding-28,
        .u-p-28 {
            padding: 13px !important
        }

        .u-m-l-28 {
            margin-left: 13px !important
        }

        .u-p-l-28 {
            padding-left: 13px !important
        }

        .u-margin-left-28 {
            margin-left: 13px !important
        }

        .u-padding-left-28 {
            padding-left: 13px !important
        }

        .u-m-t-28 {
            margin-top: 13px !important
        }

        .u-p-t-28 {
            padding-top: 13px !important
        }

        .u-margin-top-28 {
            margin-top: 13px !important
        }

        .u-padding-top-28 {
            padding-top: 13px !important
        }

        .u-m-r-28 {
            margin-right: 13px !important
        }

        .u-p-r-28 {
            padding-right: 13px !important
        }

        .u-margin-right-28 {
            margin-right: 13px !important
        }

        .u-padding-right-28 {
            padding-right: 13px !important
        }

        .u-m-b-28 {
            margin-bottom: 13px !important
        }

        .u-p-b-28 {
            padding-bottom: 13px !important
        }

        .u-margin-bottom-28 {
            margin-bottom: 13px !important
        }

        .u-padding-bottom-28 {
            padding-bottom: 13px !important
        }

        .u-margin-30,
        .u-m-30 {
            margin: 14px !important
        }

        .u-padding-30,
        .u-p-30 {
            padding: 14px !important
        }

        .u-m-l-30 {
            margin-left: 14px !important
        }

        .u-p-l-30 {
            padding-left: 14px !important
        }

        .u-margin-left-30 {
            margin-left: 14px !important
        }

        .u-padding-left-30 {
            padding-left: 14px !important
        }

        .u-m-t-30 {
            margin-top: 14px !important
        }

        .u-p-t-30 {
            padding-top: 14px !important
        }

        .u-margin-top-30 {
            margin-top: 14px !important
        }

        .u-padding-top-30 {
            padding-top: 14px !important
        }

        .u-m-r-30 {
            margin-right: 14px !important
        }

        .u-p-r-30 {
            padding-right: 14px !important
        }

        .u-margin-right-30 {
            margin-right: 14px !important
        }

        .u-padding-right-30 {
            padding-right: 14px !important
        }

        .u-m-b-30 {
            margin-bottom: 14px !important
        }

        .u-p-b-30 {
            padding-bottom: 14px !important
        }

        .u-margin-bottom-30 {
            margin-bottom: 14px !important
        }

        .u-padding-bottom-30 {
            padding-bottom: 14px !important
        }

        .u-margin-32,
        .u-m-32 {
            margin: 15px !important
        }

        .u-padding-32,
        .u-p-32 {
            padding: 15px !important
        }

        .u-m-l-32 {
            margin-left: 15px !important
        }

        .u-p-l-32 {
            padding-left: 15px !important
        }

        .u-margin-left-32 {
            margin-left: 15px !important
        }

        .u-padding-left-32 {
            padding-left: 15px !important
        }

        .u-m-t-32 {
            margin-top: 15px !important
        }

        .u-p-t-32 {
            padding-top: 15px !important
        }

        .u-margin-top-32 {
            margin-top: 15px !important
        }

        .u-padding-top-32 {
            padding-top: 15px !important
        }

        .u-m-r-32 {
            margin-right: 15px !important
        }

        .u-p-r-32 {
            padding-right: 15px !important
        }

        .u-margin-right-32 {
            margin-right: 15px !important
        }

        .u-padding-right-32 {
            padding-right: 15px !important
        }

        .u-m-b-32 {
            margin-bottom: 15px !important
        }

        .u-p-b-32 {
            padding-bottom: 15px !important
        }

        .u-margin-bottom-32 {
            margin-bottom: 15px !important
        }

        .u-padding-bottom-32 {
            padding-bottom: 15px !important
        }

        .u-margin-34,
        .u-m-34 {
            margin: 16px !important
        }

        .u-padding-34,
        .u-p-34 {
            padding: 16px !important
        }

        .u-m-l-34 {
            margin-left: 16px !important
        }

        .u-p-l-34 {
            padding-left: 16px !important
        }

        .u-margin-left-34 {
            margin-left: 16px !important
        }

        .u-padding-left-34 {
            padding-left: 16px !important
        }

        .u-m-t-34 {
            margin-top: 16px !important
        }

        .u-p-t-34 {
            padding-top: 16px !important
        }

        .u-margin-top-34 {
            margin-top: 16px !important
        }

        .u-padding-top-34 {
            padding-top: 16px !important
        }

        .u-m-r-34 {
            margin-right: 16px !important
        }

        .u-p-r-34 {
            padding-right: 16px !important
        }

        .u-margin-right-34 {
            margin-right: 16px !important
        }

        .u-padding-right-34 {
            padding-right: 16px !important
        }

        .u-m-b-34 {
            margin-bottom: 16px !important
        }

        .u-p-b-34 {
            padding-bottom: 16px !important
        }

        .u-margin-bottom-34 {
            margin-bottom: 16px !important
        }

        .u-padding-bottom-34 {
            padding-bottom: 16px !important
        }

        .u-margin-35,
        .u-m-35 {
            margin: 16px !important
        }

        .u-padding-35,
        .u-p-35 {
            padding: 16px !important
        }

        .u-m-l-35 {
            margin-left: 16px !important
        }

        .u-p-l-35 {
            padding-left: 16px !important
        }

        .u-margin-left-35 {
            margin-left: 16px !important
        }

        .u-padding-left-35 {
            padding-left: 16px !important
        }

        .u-m-t-35 {
            margin-top: 16px !important
        }

        .u-p-t-35 {
            padding-top: 16px !important
        }

        .u-margin-top-35 {
            margin-top: 16px !important
        }

        .u-padding-top-35 {
            padding-top: 16px !important
        }

        .u-m-r-35 {
            margin-right: 16px !important
        }

        .u-p-r-35 {
            padding-right: 16px !important
        }

        .u-margin-right-35 {
            margin-right: 16px !important
        }

        .u-padding-right-35 {
            padding-right: 16px !important
        }

        .u-m-b-35 {
            margin-bottom: 16px !important
        }

        .u-p-b-35 {
            padding-bottom: 16px !important
        }

        .u-margin-bottom-35 {
            margin-bottom: 16px !important
        }

        .u-padding-bottom-35 {
            padding-bottom: 16px !important
        }

        .u-margin-36,
        .u-m-36 {
            margin: 17px !important
        }

        .u-padding-36,
        .u-p-36 {
            padding: 17px !important
        }

        .u-m-l-36 {
            margin-left: 17px !important
        }

        .u-p-l-36 {
            padding-left: 17px !important
        }

        .u-margin-left-36 {
            margin-left: 17px !important
        }

        .u-padding-left-36 {
            padding-left: 17px !important
        }

        .u-m-t-36 {
            margin-top: 17px !important
        }

        .u-p-t-36 {
            padding-top: 17px !important
        }

        .u-margin-top-36 {
            margin-top: 17px !important
        }

        .u-padding-top-36 {
            padding-top: 17px !important
        }

        .u-m-r-36 {
            margin-right: 17px !important
        }

        .u-p-r-36 {
            padding-right: 17px !important
        }

        .u-margin-right-36 {
            margin-right: 17px !important
        }

        .u-padding-right-36 {
            padding-right: 17px !important
        }

        .u-m-b-36 {
            margin-bottom: 17px !important
        }

        .u-p-b-36 {
            padding-bottom: 17px !important
        }

        .u-margin-bottom-36 {
            margin-bottom: 17px !important
        }

        .u-padding-bottom-36 {
            padding-bottom: 17px !important
        }

        .u-margin-38,
        .u-m-38 {
            margin: 18px !important
        }

        .u-padding-38,
        .u-p-38 {
            padding: 18px !important
        }

        .u-m-l-38 {
            margin-left: 18px !important
        }

        .u-p-l-38 {
            padding-left: 18px !important
        }

        .u-margin-left-38 {
            margin-left: 18px !important
        }

        .u-padding-left-38 {
            padding-left: 18px !important
        }

        .u-m-t-38 {
            margin-top: 18px !important
        }

        .u-p-t-38 {
            padding-top: 18px !important
        }

        .u-margin-top-38 {
            margin-top: 18px !important
        }

        .u-padding-top-38 {
            padding-top: 18px !important
        }

        .u-m-r-38 {
            margin-right: 18px !important
        }

        .u-p-r-38 {
            padding-right: 18px !important
        }

        .u-margin-right-38 {
            margin-right: 18px !important
        }

        .u-padding-right-38 {
            padding-right: 18px !important
        }

        .u-m-b-38 {
            margin-bottom: 18px !important
        }

        .u-p-b-38 {
            padding-bottom: 18px !important
        }

        .u-margin-bottom-38 {
            margin-bottom: 18px !important
        }

        .u-padding-bottom-38 {
            padding-bottom: 18px !important
        }

        .u-margin-40,
        .u-m-40 {
            margin: 19px !important
        }

        .u-padding-40,
        .u-p-40 {
            padding: 19px !important
        }

        .u-m-l-40 {
            margin-left: 19px !important
        }

        .u-p-l-40 {
            padding-left: 19px !important
        }

        .u-margin-left-40 {
            margin-left: 19px !important
        }

        .u-padding-left-40 {
            padding-left: 19px !important
        }

        .u-m-t-40 {
            margin-top: 19px !important
        }

        .u-p-t-40 {
            padding-top: 19px !important
        }

        .u-margin-top-40 {
            margin-top: 19px !important
        }

        .u-padding-top-40 {
            padding-top: 19px !important
        }

        .u-m-r-40 {
            margin-right: 19px !important
        }

        .u-p-r-40 {
            padding-right: 19px !important
        }

        .u-margin-right-40 {
            margin-right: 19px !important
        }

        .u-padding-right-40 {
            padding-right: 19px !important
        }

        .u-m-b-40 {
            margin-bottom: 19px !important
        }

        .u-p-b-40 {
            padding-bottom: 19px !important
        }

        .u-margin-bottom-40 {
            margin-bottom: 19px !important
        }

        .u-padding-bottom-40 {
            padding-bottom: 19px !important
        }

        .u-margin-42,
        .u-m-42 {
            margin: 20px !important
        }

        .u-padding-42,
        .u-p-42 {
            padding: 20px !important
        }

        .u-m-l-42 {
            margin-left: 20px !important
        }

        .u-p-l-42 {
            padding-left: 20px !important
        }

        .u-margin-left-42 {
            margin-left: 20px !important
        }

        .u-padding-left-42 {
            padding-left: 20px !important
        }

        .u-m-t-42 {
            margin-top: 20px !important
        }

        .u-p-t-42 {
            padding-top: 20px !important
        }

        .u-margin-top-42 {
            margin-top: 20px !important
        }

        .u-padding-top-42 {
            padding-top: 20px !important
        }

        .u-m-r-42 {
            margin-right: 20px !important
        }

        .u-p-r-42 {
            padding-right: 20px !important
        }

        .u-margin-right-42 {
            margin-right: 20px !important
        }

        .u-padding-right-42 {
            padding-right: 20px !important
        }

        .u-m-b-42 {
            margin-bottom: 20px !important
        }

        .u-p-b-42 {
            padding-bottom: 20px !important
        }

        .u-margin-bottom-42 {
            margin-bottom: 20px !important
        }

        .u-padding-bottom-42 {
            padding-bottom: 20px !important
        }

        .u-margin-44,
        .u-m-44 {
            margin: 21px !important
        }

        .u-padding-44,
        .u-p-44 {
            padding: 21px !important
        }

        .u-m-l-44 {
            margin-left: 21px !important
        }

        .u-p-l-44 {
            padding-left: 21px !important
        }

        .u-margin-left-44 {
            margin-left: 21px !important
        }

        .u-padding-left-44 {
            padding-left: 21px !important
        }

        .u-m-t-44 {
            margin-top: 21px !important
        }

        .u-p-t-44 {
            padding-top: 21px !important
        }

        .u-margin-top-44 {
            margin-top: 21px !important
        }

        .u-padding-top-44 {
            padding-top: 21px !important
        }

        .u-m-r-44 {
            margin-right: 21px !important
        }

        .u-p-r-44 {
            padding-right: 21px !important
        }

        .u-margin-right-44 {
            margin-right: 21px !important
        }

        .u-padding-right-44 {
            padding-right: 21px !important
        }

        .u-m-b-44 {
            margin-bottom: 21px !important
        }

        .u-p-b-44 {
            padding-bottom: 21px !important
        }

        .u-margin-bottom-44 {
            margin-bottom: 21px !important
        }

        .u-padding-bottom-44 {
            padding-bottom: 21px !important
        }

        .u-margin-45,
        .u-m-45 {
            margin: 21px !important
        }

        .u-padding-45,
        .u-p-45 {
            padding: 21px !important
        }

        .u-m-l-45 {
            margin-left: 21px !important
        }

        .u-p-l-45 {
            padding-left: 21px !important
        }

        .u-margin-left-45 {
            margin-left: 21px !important
        }

        .u-padding-left-45 {
            padding-left: 21px !important
        }

        .u-m-t-45 {
            margin-top: 21px !important
        }

        .u-p-t-45 {
            padding-top: 21px !important
        }

        .u-margin-top-45 {
            margin-top: 21px !important
        }

        .u-padding-top-45 {
            padding-top: 21px !important
        }

        .u-m-r-45 {
            margin-right: 21px !important
        }

        .u-p-r-45 {
            padding-right: 21px !important
        }

        .u-margin-right-45 {
            margin-right: 21px !important
        }

        .u-padding-right-45 {
            padding-right: 21px !important
        }

        .u-m-b-45 {
            margin-bottom: 21px !important
        }

        .u-p-b-45 {
            padding-bottom: 21px !important
        }

        .u-margin-bottom-45 {
            margin-bottom: 21px !important
        }

        .u-padding-bottom-45 {
            padding-bottom: 21px !important
        }

        .u-margin-46,
        .u-m-46 {
            margin: 22px !important
        }

        .u-padding-46,
        .u-p-46 {
            padding: 22px !important
        }

        .u-m-l-46 {
            margin-left: 22px !important
        }

        .u-p-l-46 {
            padding-left: 22px !important
        }

        .u-margin-left-46 {
            margin-left: 22px !important
        }

        .u-padding-left-46 {
            padding-left: 22px !important
        }

        .u-m-t-46 {
            margin-top: 22px !important
        }

        .u-p-t-46 {
            padding-top: 22px !important
        }

        .u-margin-top-46 {
            margin-top: 22px !important
        }

        .u-padding-top-46 {
            padding-top: 22px !important
        }

        .u-m-r-46 {
            margin-right: 22px !important
        }

        .u-p-r-46 {
            padding-right: 22px !important
        }

        .u-margin-right-46 {
            margin-right: 22px !important
        }

        .u-padding-right-46 {
            padding-right: 22px !important
        }

        .u-m-b-46 {
            margin-bottom: 22px !important
        }

        .u-p-b-46 {
            padding-bottom: 22px !important
        }

        .u-margin-bottom-46 {
            margin-bottom: 22px !important
        }

        .u-padding-bottom-46 {
            padding-bottom: 22px !important
        }

        .u-margin-48,
        .u-m-48 {
            margin: 23px !important
        }

        .u-padding-48,
        .u-p-48 {
            padding: 23px !important
        }

        .u-m-l-48 {
            margin-left: 23px !important
        }

        .u-p-l-48 {
            padding-left: 23px !important
        }

        .u-margin-left-48 {
            margin-left: 23px !important
        }

        .u-padding-left-48 {
            padding-left: 23px !important
        }

        .u-m-t-48 {
            margin-top: 23px !important
        }

        .u-p-t-48 {
            padding-top: 23px !important
        }

        .u-margin-top-48 {
            margin-top: 23px !important
        }

        .u-padding-top-48 {
            padding-top: 23px !important
        }

        .u-m-r-48 {
            margin-right: 23px !important
        }

        .u-p-r-48 {
            padding-right: 23px !important
        }

        .u-margin-right-48 {
            margin-right: 23px !important
        }

        .u-padding-right-48 {
            padding-right: 23px !important
        }

        .u-m-b-48 {
            margin-bottom: 23px !important
        }

        .u-p-b-48 {
            padding-bottom: 23px !important
        }

        .u-margin-bottom-48 {
            margin-bottom: 23px !important
        }

        .u-padding-bottom-48 {
            padding-bottom: 23px !important
        }

        .u-margin-50,
        .u-m-50 {
            margin: 24px !important
        }

        .u-padding-50,
        .u-p-50 {
            padding: 24px !important
        }

        .u-m-l-50 {
            margin-left: 24px !important
        }

        .u-p-l-50 {
            padding-left: 24px !important
        }

        .u-margin-left-50 {
            margin-left: 24px !important
        }

        .u-padding-left-50 {
            padding-left: 24px !important
        }

        .u-m-t-50 {
            margin-top: 24px !important
        }

        .u-p-t-50 {
            padding-top: 24px !important
        }

        .u-margin-top-50 {
            margin-top: 24px !important
        }

        .u-padding-top-50 {
            padding-top: 24px !important
        }

        .u-m-r-50 {
            margin-right: 24px !important
        }

        .u-p-r-50 {
            padding-right: 24px !important
        }

        .u-margin-right-50 {
            margin-right: 24px !important
        }

        .u-padding-right-50 {
            padding-right: 24px !important
        }

        .u-m-b-50 {
            margin-bottom: 24px !important
        }

        .u-p-b-50 {
            padding-bottom: 24px !important
        }

        .u-margin-bottom-50 {
            margin-bottom: 24px !important
        }

        .u-padding-bottom-50 {
            padding-bottom: 24px !important
        }

        .u-margin-52,
        .u-m-52 {
            margin: 24px !important
        }

        .u-padding-52,
        .u-p-52 {
            padding: 24px !important
        }

        .u-m-l-52 {
            margin-left: 24px !important
        }

        .u-p-l-52 {
            padding-left: 24px !important
        }

        .u-margin-left-52 {
            margin-left: 24px !important
        }

        .u-padding-left-52 {
            padding-left: 24px !important
        }

        .u-m-t-52 {
            margin-top: 24px !important
        }

        .u-p-t-52 {
            padding-top: 24px !important
        }

        .u-margin-top-52 {
            margin-top: 24px !important
        }

        .u-padding-top-52 {
            padding-top: 24px !important
        }

        .u-m-r-52 {
            margin-right: 24px !important
        }

        .u-p-r-52 {
            padding-right: 24px !important
        }

        .u-margin-right-52 {
            margin-right: 24px !important
        }

        .u-padding-right-52 {
            padding-right: 24px !important
        }

        .u-m-b-52 {
            margin-bottom: 24px !important
        }

        .u-p-b-52 {
            padding-bottom: 24px !important
        }

        .u-margin-bottom-52 {
            margin-bottom: 24px !important
        }

        .u-padding-bottom-52 {
            padding-bottom: 24px !important
        }

        .u-margin-54,
        .u-m-54 {
            margin: 25px !important
        }

        .u-padding-54,
        .u-p-54 {
            padding: 25px !important
        }

        .u-m-l-54 {
            margin-left: 25px !important
        }

        .u-p-l-54 {
            padding-left: 25px !important
        }

        .u-margin-left-54 {
            margin-left: 25px !important
        }

        .u-padding-left-54 {
            padding-left: 25px !important
        }

        .u-m-t-54 {
            margin-top: 25px !important
        }

        .u-p-t-54 {
            padding-top: 25px !important
        }

        .u-margin-top-54 {
            margin-top: 25px !important
        }

        .u-padding-top-54 {
            padding-top: 25px !important
        }

        .u-m-r-54 {
            margin-right: 25px !important
        }

        .u-p-r-54 {
            padding-right: 25px !important
        }

        .u-margin-right-54 {
            margin-right: 25px !important
        }

        .u-padding-right-54 {
            padding-right: 25px !important
        }

        .u-m-b-54 {
            margin-bottom: 25px !important
        }

        .u-p-b-54 {
            padding-bottom: 25px !important
        }

        .u-margin-bottom-54 {
            margin-bottom: 25px !important
        }

        .u-padding-bottom-54 {
            padding-bottom: 25px !important
        }

        .u-margin-55,
        .u-m-55 {
            margin: 26px !important
        }

        .u-padding-55,
        .u-p-55 {
            padding: 26px !important
        }

        .u-m-l-55 {
            margin-left: 26px !important
        }

        .u-p-l-55 {
            padding-left: 26px !important
        }

        .u-margin-left-55 {
            margin-left: 26px !important
        }

        .u-padding-left-55 {
            padding-left: 26px !important
        }

        .u-m-t-55 {
            margin-top: 26px !important
        }

        .u-p-t-55 {
            padding-top: 26px !important
        }

        .u-margin-top-55 {
            margin-top: 26px !important
        }

        .u-padding-top-55 {
            padding-top: 26px !important
        }

        .u-m-r-55 {
            margin-right: 26px !important
        }

        .u-p-r-55 {
            padding-right: 26px !important
        }

        .u-margin-right-55 {
            margin-right: 26px !important
        }

        .u-padding-right-55 {
            padding-right: 26px !important
        }

        .u-m-b-55 {
            margin-bottom: 26px !important
        }

        .u-p-b-55 {
            padding-bottom: 26px !important
        }

        .u-margin-bottom-55 {
            margin-bottom: 26px !important
        }

        .u-padding-bottom-55 {
            padding-bottom: 26px !important
        }

        .u-margin-56,
        .u-m-56 {
            margin: 26px !important
        }

        .u-padding-56,
        .u-p-56 {
            padding: 26px !important
        }

        .u-m-l-56 {
            margin-left: 26px !important
        }

        .u-p-l-56 {
            padding-left: 26px !important
        }

        .u-margin-left-56 {
            margin-left: 26px !important
        }

        .u-padding-left-56 {
            padding-left: 26px !important
        }

        .u-m-t-56 {
            margin-top: 26px !important
        }

        .u-p-t-56 {
            padding-top: 26px !important
        }

        .u-margin-top-56 {
            margin-top: 26px !important
        }

        .u-padding-top-56 {
            padding-top: 26px !important
        }

        .u-m-r-56 {
            margin-right: 26px !important
        }

        .u-p-r-56 {
            padding-right: 26px !important
        }

        .u-margin-right-56 {
            margin-right: 26px !important
        }

        .u-padding-right-56 {
            padding-right: 26px !important
        }

        .u-m-b-56 {
            margin-bottom: 26px !important
        }

        .u-p-b-56 {
            padding-bottom: 26px !important
        }

        .u-margin-bottom-56 {
            margin-bottom: 26px !important
        }

        .u-padding-bottom-56 {
            padding-bottom: 26px !important
        }

        .u-margin-58,
        .u-m-58 {
            margin: 27px !important
        }

        .u-padding-58,
        .u-p-58 {
            padding: 27px !important
        }

        .u-m-l-58 {
            margin-left: 27px !important
        }

        .u-p-l-58 {
            padding-left: 27px !important
        }

        .u-margin-left-58 {
            margin-left: 27px !important
        }

        .u-padding-left-58 {
            padding-left: 27px !important
        }

        .u-m-t-58 {
            margin-top: 27px !important
        }

        .u-p-t-58 {
            padding-top: 27px !important
        }

        .u-margin-top-58 {
            margin-top: 27px !important
        }

        .u-padding-top-58 {
            padding-top: 27px !important
        }

        .u-m-r-58 {
            margin-right: 27px !important
        }

        .u-p-r-58 {
            padding-right: 27px !important
        }

        .u-margin-right-58 {
            margin-right: 27px !important
        }

        .u-padding-right-58 {
            padding-right: 27px !important
        }

        .u-m-b-58 {
            margin-bottom: 27px !important
        }

        .u-p-b-58 {
            padding-bottom: 27px !important
        }

        .u-margin-bottom-58 {
            margin-bottom: 27px !important
        }

        .u-padding-bottom-58 {
            padding-bottom: 27px !important
        }

        .u-margin-60,
        .u-m-60 {
            margin: 28px !important
        }

        .u-padding-60,
        .u-p-60 {
            padding: 28px !important
        }

        .u-m-l-60 {
            margin-left: 28px !important
        }

        .u-p-l-60 {
            padding-left: 28px !important
        }

        .u-margin-left-60 {
            margin-left: 28px !important
        }

        .u-padding-left-60 {
            padding-left: 28px !important
        }

        .u-m-t-60 {
            margin-top: 28px !important
        }

        .u-p-t-60 {
            padding-top: 28px !important
        }

        .u-margin-top-60 {
            margin-top: 28px !important
        }

        .u-padding-top-60 {
            padding-top: 28px !important
        }

        .u-m-r-60 {
            margin-right: 28px !important
        }

        .u-p-r-60 {
            padding-right: 28px !important
        }

        .u-margin-right-60 {
            margin-right: 28px !important
        }

        .u-padding-right-60 {
            padding-right: 28px !important
        }

        .u-m-b-60 {
            margin-bottom: 28px !important
        }

        .u-p-b-60 {
            padding-bottom: 28px !important
        }

        .u-margin-bottom-60 {
            margin-bottom: 28px !important
        }

        .u-padding-bottom-60 {
            padding-bottom: 28px !important
        }

        .u-margin-62,
        .u-m-62 {
            margin: 29px !important
        }

        .u-padding-62,
        .u-p-62 {
            padding: 29px !important
        }

        .u-m-l-62 {
            margin-left: 29px !important
        }

        .u-p-l-62 {
            padding-left: 29px !important
        }

        .u-margin-left-62 {
            margin-left: 29px !important
        }

        .u-padding-left-62 {
            padding-left: 29px !important
        }

        .u-m-t-62 {
            margin-top: 29px !important
        }

        .u-p-t-62 {
            padding-top: 29px !important
        }

        .u-margin-top-62 {
            margin-top: 29px !important
        }

        .u-padding-top-62 {
            padding-top: 29px !important
        }

        .u-m-r-62 {
            margin-right: 29px !important
        }

        .u-p-r-62 {
            padding-right: 29px !important
        }

        .u-margin-right-62 {
            margin-right: 29px !important
        }

        .u-padding-right-62 {
            padding-right: 29px !important
        }

        .u-m-b-62 {
            margin-bottom: 29px !important
        }

        .u-p-b-62 {
            padding-bottom: 29px !important
        }

        .u-margin-bottom-62 {
            margin-bottom: 29px !important
        }

        .u-padding-bottom-62 {
            padding-bottom: 29px !important
        }

        .u-margin-64,
        .u-m-64 {
            margin: 30px !important
        }

        .u-padding-64,
        .u-p-64 {
            padding: 30px !important
        }

        .u-m-l-64 {
            margin-left: 30px !important
        }

        .u-p-l-64 {
            padding-left: 30px !important
        }

        .u-margin-left-64 {
            margin-left: 30px !important
        }

        .u-padding-left-64 {
            padding-left: 30px !important
        }

        .u-m-t-64 {
            margin-top: 30px !important
        }

        .u-p-t-64 {
            padding-top: 30px !important
        }

        .u-margin-top-64 {
            margin-top: 30px !important
        }

        .u-padding-top-64 {
            padding-top: 30px !important
        }

        .u-m-r-64 {
            margin-right: 30px !important
        }

        .u-p-r-64 {
            padding-right: 30px !important
        }

        .u-margin-right-64 {
            margin-right: 30px !important
        }

        .u-padding-right-64 {
            padding-right: 30px !important
        }

        .u-m-b-64 {
            margin-bottom: 30px !important
        }

        .u-p-b-64 {
            padding-bottom: 30px !important
        }

        .u-margin-bottom-64 {
            margin-bottom: 30px !important
        }

        .u-padding-bottom-64 {
            padding-bottom: 30px !important
        }

        .u-margin-65,
        .u-m-65 {
            margin: 31px !important
        }

        .u-padding-65,
        .u-p-65 {
            padding: 31px !important
        }

        .u-m-l-65 {
            margin-left: 31px !important
        }

        .u-p-l-65 {
            padding-left: 31px !important
        }

        .u-margin-left-65 {
            margin-left: 31px !important
        }

        .u-padding-left-65 {
            padding-left: 31px !important
        }

        .u-m-t-65 {
            margin-top: 31px !important
        }

        .u-p-t-65 {
            padding-top: 31px !important
        }

        .u-margin-top-65 {
            margin-top: 31px !important
        }

        .u-padding-top-65 {
            padding-top: 31px !important
        }

        .u-m-r-65 {
            margin-right: 31px !important
        }

        .u-p-r-65 {
            padding-right: 31px !important
        }

        .u-margin-right-65 {
            margin-right: 31px !important
        }

        .u-padding-right-65 {
            padding-right: 31px !important
        }

        .u-m-b-65 {
            margin-bottom: 31px !important
        }

        .u-p-b-65 {
            padding-bottom: 31px !important
        }

        .u-margin-bottom-65 {
            margin-bottom: 31px !important
        }

        .u-padding-bottom-65 {
            padding-bottom: 31px !important
        }

        .u-margin-66,
        .u-m-66 {
            margin: 31px !important
        }

        .u-padding-66,
        .u-p-66 {
            padding: 31px !important
        }

        .u-m-l-66 {
            margin-left: 31px !important
        }

        .u-p-l-66 {
            padding-left: 31px !important
        }

        .u-margin-left-66 {
            margin-left: 31px !important
        }

        .u-padding-left-66 {
            padding-left: 31px !important
        }

        .u-m-t-66 {
            margin-top: 31px !important
        }

        .u-p-t-66 {
            padding-top: 31px !important
        }

        .u-margin-top-66 {
            margin-top: 31px !important
        }

        .u-padding-top-66 {
            padding-top: 31px !important
        }

        .u-m-r-66 {
            margin-right: 31px !important
        }

        .u-p-r-66 {
            padding-right: 31px !important
        }

        .u-margin-right-66 {
            margin-right: 31px !important
        }

        .u-padding-right-66 {
            padding-right: 31px !important
        }

        .u-m-b-66 {
            margin-bottom: 31px !important
        }

        .u-p-b-66 {
            padding-bottom: 31px !important
        }

        .u-margin-bottom-66 {
            margin-bottom: 31px !important
        }

        .u-padding-bottom-66 {
            padding-bottom: 31px !important
        }

        .u-margin-68,
        .u-m-68 {
            margin: 32px !important
        }

        .u-padding-68,
        .u-p-68 {
            padding: 32px !important
        }

        .u-m-l-68 {
            margin-left: 32px !important
        }

        .u-p-l-68 {
            padding-left: 32px !important
        }

        .u-margin-left-68 {
            margin-left: 32px !important
        }

        .u-padding-left-68 {
            padding-left: 32px !important
        }

        .u-m-t-68 {
            margin-top: 32px !important
        }

        .u-p-t-68 {
            padding-top: 32px !important
        }

        .u-margin-top-68 {
            margin-top: 32px !important
        }

        .u-padding-top-68 {
            padding-top: 32px !important
        }

        .u-m-r-68 {
            margin-right: 32px !important
        }

        .u-p-r-68 {
            padding-right: 32px !important
        }

        .u-margin-right-68 {
            margin-right: 32px !important
        }

        .u-padding-right-68 {
            padding-right: 32px !important
        }

        .u-m-b-68 {
            margin-bottom: 32px !important
        }

        .u-p-b-68 {
            padding-bottom: 32px !important
        }

        .u-margin-bottom-68 {
            margin-bottom: 32px !important
        }

        .u-padding-bottom-68 {
            padding-bottom: 32px !important
        }

        .u-margin-70,
        .u-m-70 {
            margin: 33px !important
        }

        .u-padding-70,
        .u-p-70 {
            padding: 33px !important
        }

        .u-m-l-70 {
            margin-left: 33px !important
        }

        .u-p-l-70 {
            padding-left: 33px !important
        }

        .u-margin-left-70 {
            margin-left: 33px !important
        }

        .u-padding-left-70 {
            padding-left: 33px !important
        }

        .u-m-t-70 {
            margin-top: 33px !important
        }

        .u-p-t-70 {
            padding-top: 33px !important
        }

        .u-margin-top-70 {
            margin-top: 33px !important
        }

        .u-padding-top-70 {
            padding-top: 33px !important
        }

        .u-m-r-70 {
            margin-right: 33px !important
        }

        .u-p-r-70 {
            padding-right: 33px !important
        }

        .u-margin-right-70 {
            margin-right: 33px !important
        }

        .u-padding-right-70 {
            padding-right: 33px !important
        }

        .u-m-b-70 {
            margin-bottom: 33px !important
        }

        .u-p-b-70 {
            padding-bottom: 33px !important
        }

        .u-margin-bottom-70 {
            margin-bottom: 33px !important
        }

        .u-padding-bottom-70 {
            padding-bottom: 33px !important
        }

        .u-margin-72,
        .u-m-72 {
            margin: 34px !important
        }

        .u-padding-72,
        .u-p-72 {
            padding: 34px !important
        }

        .u-m-l-72 {
            margin-left: 34px !important
        }

        .u-p-l-72 {
            padding-left: 34px !important
        }

        .u-margin-left-72 {
            margin-left: 34px !important
        }

        .u-padding-left-72 {
            padding-left: 34px !important
        }

        .u-m-t-72 {
            margin-top: 34px !important
        }

        .u-p-t-72 {
            padding-top: 34px !important
        }

        .u-margin-top-72 {
            margin-top: 34px !important
        }

        .u-padding-top-72 {
            padding-top: 34px !important
        }

        .u-m-r-72 {
            margin-right: 34px !important
        }

        .u-p-r-72 {
            padding-right: 34px !important
        }

        .u-margin-right-72 {
            margin-right: 34px !important
        }

        .u-padding-right-72 {
            padding-right: 34px !important
        }

        .u-m-b-72 {
            margin-bottom: 34px !important
        }

        .u-p-b-72 {
            padding-bottom: 34px !important
        }

        .u-margin-bottom-72 {
            margin-bottom: 34px !important
        }

        .u-padding-bottom-72 {
            padding-bottom: 34px !important
        }

        .u-margin-74,
        .u-m-74 {
            margin: 35px !important
        }

        .u-padding-74,
        .u-p-74 {
            padding: 35px !important
        }

        .u-m-l-74 {
            margin-left: 35px !important
        }

        .u-p-l-74 {
            padding-left: 35px !important
        }

        .u-margin-left-74 {
            margin-left: 35px !important
        }

        .u-padding-left-74 {
            padding-left: 35px !important
        }

        .u-m-t-74 {
            margin-top: 35px !important
        }

        .u-p-t-74 {
            padding-top: 35px !important
        }

        .u-margin-top-74 {
            margin-top: 35px !important
        }

        .u-padding-top-74 {
            padding-top: 35px !important
        }

        .u-m-r-74 {
            margin-right: 35px !important
        }

        .u-p-r-74 {
            padding-right: 35px !important
        }

        .u-margin-right-74 {
            margin-right: 35px !important
        }

        .u-padding-right-74 {
            padding-right: 35px !important
        }

        .u-m-b-74 {
            margin-bottom: 35px !important
        }

        .u-p-b-74 {
            padding-bottom: 35px !important
        }

        .u-margin-bottom-74 {
            margin-bottom: 35px !important
        }

        .u-padding-bottom-74 {
            padding-bottom: 35px !important
        }

        .u-margin-75,
        .u-m-75 {
            margin: 36px !important
        }

        .u-padding-75,
        .u-p-75 {
            padding: 36px !important
        }

        .u-m-l-75 {
            margin-left: 36px !important
        }

        .u-p-l-75 {
            padding-left: 36px !important
        }

        .u-margin-left-75 {
            margin-left: 36px !important
        }

        .u-padding-left-75 {
            padding-left: 36px !important
        }

        .u-m-t-75 {
            margin-top: 36px !important
        }

        .u-p-t-75 {
            padding-top: 36px !important
        }

        .u-margin-top-75 {
            margin-top: 36px !important
        }

        .u-padding-top-75 {
            padding-top: 36px !important
        }

        .u-m-r-75 {
            margin-right: 36px !important
        }

        .u-p-r-75 {
            padding-right: 36px !important
        }

        .u-margin-right-75 {
            margin-right: 36px !important
        }

        .u-padding-right-75 {
            padding-right: 36px !important
        }

        .u-m-b-75 {
            margin-bottom: 36px !important
        }

        .u-p-b-75 {
            padding-bottom: 36px !important
        }

        .u-margin-bottom-75 {
            margin-bottom: 36px !important
        }

        .u-padding-bottom-75 {
            padding-bottom: 36px !important
        }

        .u-margin-76,
        .u-m-76 {
            margin: 36px !important
        }

        .u-padding-76,
        .u-p-76 {
            padding: 36px !important
        }

        .u-m-l-76 {
            margin-left: 36px !important
        }

        .u-p-l-76 {
            padding-left: 36px !important
        }

        .u-margin-left-76 {
            margin-left: 36px !important
        }

        .u-padding-left-76 {
            padding-left: 36px !important
        }

        .u-m-t-76 {
            margin-top: 36px !important
        }

        .u-p-t-76 {
            padding-top: 36px !important
        }

        .u-margin-top-76 {
            margin-top: 36px !important
        }

        .u-padding-top-76 {
            padding-top: 36px !important
        }

        .u-m-r-76 {
            margin-right: 36px !important
        }

        .u-p-r-76 {
            padding-right: 36px !important
        }

        .u-margin-right-76 {
            margin-right: 36px !important
        }

        .u-padding-right-76 {
            padding-right: 36px !important
        }

        .u-m-b-76 {
            margin-bottom: 36px !important
        }

        .u-p-b-76 {
            padding-bottom: 36px !important
        }

        .u-margin-bottom-76 {
            margin-bottom: 36px !important
        }

        .u-padding-bottom-76 {
            padding-bottom: 36px !important
        }

        .u-margin-78,
        .u-m-78 {
            margin: 37px !important
        }

        .u-padding-78,
        .u-p-78 {
            padding: 37px !important
        }

        .u-m-l-78 {
            margin-left: 37px !important
        }

        .u-p-l-78 {
            padding-left: 37px !important
        }

        .u-margin-left-78 {
            margin-left: 37px !important
        }

        .u-padding-left-78 {
            padding-left: 37px !important
        }

        .u-m-t-78 {
            margin-top: 37px !important
        }

        .u-p-t-78 {
            padding-top: 37px !important
        }

        .u-margin-top-78 {
            margin-top: 37px !important
        }

        .u-padding-top-78 {
            padding-top: 37px !important
        }

        .u-m-r-78 {
            margin-right: 37px !important
        }

        .u-p-r-78 {
            padding-right: 37px !important
        }

        .u-margin-right-78 {
            margin-right: 37px !important
        }

        .u-padding-right-78 {
            padding-right: 37px !important
        }

        .u-m-b-78 {
            margin-bottom: 37px !important
        }

        .u-p-b-78 {
            padding-bottom: 37px !important
        }

        .u-margin-bottom-78 {
            margin-bottom: 37px !important
        }

        .u-padding-bottom-78 {
            padding-bottom: 37px !important
        }

        .u-margin-80,
        .u-m-80 {
            margin: 38px !important
        }

        .u-padding-80,
        .u-p-80 {
            padding: 38px !important
        }

        .u-m-l-80 {
            margin-left: 38px !important
        }

        .u-p-l-80 {
            padding-left: 38px !important
        }

        .u-margin-left-80 {
            margin-left: 38px !important
        }

        .u-padding-left-80 {
            padding-left: 38px !important
        }

        .u-m-t-80 {
            margin-top: 38px !important
        }

        .u-p-t-80 {
            padding-top: 38px !important
        }

        .u-margin-top-80 {
            margin-top: 38px !important
        }

        .u-padding-top-80 {
            padding-top: 38px !important
        }

        .u-m-r-80 {
            margin-right: 38px !important
        }

        .u-p-r-80 {
            padding-right: 38px !important
        }

        .u-margin-right-80 {
            margin-right: 38px !important
        }

        .u-padding-right-80 {
            padding-right: 38px !important
        }

        .u-m-b-80 {
            margin-bottom: 38px !important
        }

        .u-p-b-80 {
            padding-bottom: 38px !important
        }

        .u-margin-bottom-80 {
            margin-bottom: 38px !important
        }

        .u-padding-bottom-80 {
            padding-bottom: 38px !important
        }

        .u-reset-nvue {
            flex-direction: row;
            align-items: center
        }

        .u-type-primary-light {
            color: #ecf5ff
        }

        .u-type-warning-light {
            color: #fdf6ec
        }

        .u-type-success-light {
            color: #dbf1e1
        }

        .u-type-error-light {
            color: #fef0f0
        }

        .u-type-info-light {
            color: #f4f4f5
        }

        .u-type-primary-light-bg {
            background-color: #ecf5ff
        }

        .u-type-warning-light-bg {
            background-color: #fdf6ec
        }

        .u-type-success-light-bg {
            background-color: #dbf1e1
        }

        .u-type-error-light-bg {
            background-color: #fef0f0
        }

        .u-type-info-light-bg {
            background-color: #f4f4f5
        }

        .u-type-primary-dark {
            color: #2b85e4
        }

        .u-type-warning-dark {
            color: #f29100
        }

        .u-type-success-dark {
            color: #18b566
        }

        .u-type-error-dark {
            color: #dd6161
        }

        .u-type-info-dark {
            color: #82848a
        }

        .u-type-primary-dark-bg {
            background-color: #2b85e4
        }

        .u-type-warning-dark-bg {
            background-color: #f29100
        }

        .u-type-success-dark-bg {
            background-color: #18b566
        }

        .u-type-error-dark-bg {
            background-color: #dd6161
        }

        .u-type-info-dark-bg {
            background-color: #82848a
        }

        .u-type-primary-disabled {
            color: #a0cfff
        }

        .u-type-warning-disabled {
            color: #fcbd71
        }

        .u-type-success-disabled {
            color: #71d5a1
        }

        .u-type-error-disabled {
            color: #fab6b6
        }

        .u-type-info-disabled {
            color: #c8c9cc
        }

        .u-type-primary {
            color: #2979ff
        }

        .u-type-warning {
            color: #f90
        }

        .u-type-success {
            color: #19be6b
        }

        .u-type-error {
            color: #fa3534
        }

        .u-type-info {
            color: #909399
        }

        .u-type-primary-bg {
            background-color: #2979ff
        }

        .u-type-warning-bg {
            background-color: #f90
        }

        .u-type-success-bg {
            background-color: #19be6b
        }

        .u-type-error-bg {
            background-color: #fa3534
        }

        .u-type-info-bg {
            background-color: #909399
        }

        .u-main-color {
            color: #303133
        }

        .u-content-color {
            color: #606266
        }

        .u-tips-color {
            color: #909399
        }

        .u-light-color {
            color: #c0c4cc
        }

        uni-page-body {
            color: #303133;
            font-size: 13px
        }

        /* start--去除webkit的默认样式--start */
        .u-fix-ios-appearance {
            -webkit-appearance: none
        }

        /* end--去除webkit的默认样式--end */
        /* start--icon图标外层套一个view，让其达到更好的垂直居中的效果--start */
        .u-icon-wrap {
            display: flex;
            align-items: center
        }

        /* end-icon图标外层套一个view，让其达到更好的垂直居中的效果--end */
        /* start--iPhoneX底部安全区定义--start */
        .safe-area-inset-bottom {
            padding-bottom: 0;
            padding-bottom: constant(safe-area-inset-bottom);
            padding-bottom: env(safe-area-inset-bottom)
        }

        /* end-iPhoneX底部安全区定义--end */
        /* start--各种hover点击反馈相关的类名-start */
        .u-hover-class {
            opacity: .6
        }

        .u-cell-hover {
            background-color: #f7f8f9 !important
        }

        /* end--各种hover点击反馈相关的类名--end */
        /* start--文本行数限制--start */
        .u-line-1 {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .u-line-2 {
            -webkit-line-clamp: 2
        }

        .u-line-3 {
            -webkit-line-clamp: 3
        }

        .u-line-4 {
            -webkit-line-clamp: 4
        }

        .u-line-5 {
            -webkit-line-clamp: 5
        }

        .u-line-2,
        .u-line-3,
        .u-line-4,
        .u-line-5 {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical
        }

        /* end--文本行数限制--end */
        /* start--Retina 屏幕下的 1px 边框--start */
        .u-border,
        .u-border-bottom,
        .u-border-left,
        .u-border-right,
        .u-border-top,
        .u-border-top-bottom {
            position: relative
        }

        .u-border-bottom:after,
        .u-border-left:after,
        .u-border-right:after,
        .u-border-top-bottom:after,
        .u-border-top:after,
        .u-border:after {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            box-sizing: border-box;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            width: 199.8%;
            height: 199.7%;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            border: 0 solid #e4e7ed;
            z-index: 2
        }

        .u-border-top:after {
            border-top-width: 1px
        }

        .u-border-left:after {
            border-left-width: 1px
        }

        .u-border-right:after {
            border-right-width: 1px
        }

        .u-border-bottom:after {
            border-bottom-width: 1px
        }

        .u-border-top-bottom:after {
            border-width: 1px 0
        }

        .u-border:after {
            border-width: 1px
        }

        /* end--Retina 屏幕下的 1px 边框--end */
        /* start--clearfix--start */
        .u-clearfix:after,
        .clearfix:after {
            content: "";
            display: table;
            clear: both
        }

        /* end--clearfix--end */
        /* start--高斯模糊tabbar底部处理--start */
        .u-blur-effect-inset {
            width: 360px;
            height: var(--window-bottom);
            background-color: #fff
        }

        /* end--高斯模糊tabbar底部处理--end */
        /* start--提升H5端uni.toast()的层级，避免被uView的modal等遮盖--start */
        uni-toast {
            z-index: 10090
        }

        uni-toast .uni-toast {
            z-index: 10090
        }

        /* end--提升H5端uni.toast()的层级，避免被uView的modal等遮盖--end */
        /* start--去除button的所有默认样式--start */
        .u-reset-button {
            padding: 0;
            font-size: inherit;
            line-height: inherit;
            background-color: initial;
            color: inherit
        }

        .u-reset-button::after {
            border: none
        }

        /* end--去除button的所有默认样式--end */
        /* H5的时候，隐藏滚动条 */
        ::-webkit-scrollbar {
            display: none;
            width: 0 !important;
            height: 0 !important;
            -webkit-appearance: none;
            background: transparent
        }

        .u-relative,
        .u-rela {
            position: relative
        }

        .u-absolute,
        .u-abso {
            position: absolute
        }

        uni-image {
            display: inline-block
        }

        uni-view,
        uni-text {
            box-sizing: border-box
        }

        .u-font-xs {
            font-size: 10px
        }

        .u-font-sm {
            font-size: 12px
        }

        .u-font-md {
            font-size: 13px
        }

        .u-font-lg {
            font-size: 14px
        }

        .u-font-xl {
            font-size: 16px
        }

        .u-flex {
            display: flex;
            flex-direction: row;
            align-items: center
        }

        .u-flex-wrap {
            flex-wrap: wrap
        }

        .u-flex-nowrap {
            flex-wrap: nowrap
        }

        .u-col-center {
            align-items: center
        }

        .u-col-top {
            align-items: flex-start
        }

        .u-col-bottom {
            align-items: flex-end
        }

        .u-row-center {
            justify-content: center
        }

        .u-row-left {
            justify-content: flex-start
        }

        .u-row-right {
            justify-content: flex-end
        }

        .u-row-between {
            justify-content: space-between
        }

        .u-row-around {
            justify-content: space-around
        }

        .u-text-left {
            text-align: left
        }

        .u-text-center {
            text-align: center
        }

        .u-text-right {
            text-align: right
        }

        .u-flex-col {
            display: flex;
            flex-direction: column
        }

        .u-flex-0 {
            flex: 0
        }

        .u-flex-1 {
            flex: 1
        }

        .u-flex-2 {
            flex: 2
        }

        .u-flex-3 {
            flex: 3
        }

        .u-flex-4 {
            flex: 4
        }

        .u-flex-5 {
            flex: 5
        }

        .u-flex-6 {
            flex: 6
        }

        .u-flex-7 {
            flex: 7
        }

        .u-flex-8 {
            flex: 8
        }

        .u-flex-9 {
            flex: 9
        }

        .u-flex-10 {
            flex: 10
        }

        .u-flex-11 {
            flex: 11
        }

        .u-flex-12 {
            flex: 12
        }

        .u-font-9 {
            font-size: 9px
        }

        .u-font-10 {
            font-size: 10px
        }

        .u-font-11 {
            font-size: 11px
        }

        .u-font-12 {
            font-size: 12px
        }

        .u-font-13 {
            font-size: 13px
        }

        .u-font-14 {
            font-size: 14px
        }

        .u-font-15 {
            font-size: 15px
        }

        .u-font-16 {
            font-size: 16px
        }

        .u-font-17 {
            font-size: 17px
        }

        .u-font-18 {
            font-size: 18px
        }

        .u-font-19 {
            font-size: 19px
        }

        .u-font-20 {
            font-size: 9px
        }

        .u-font-21 {
            font-size: 10px
        }

        .u-font-22 {
            font-size: 10px
        }

        .u-font-23 {
            font-size: 11px
        }

        .u-font-24 {
            font-size: 11px
        }

        .u-font-25 {
            font-size: 12px
        }

        .u-font-26 {
            font-size: 12px
        }

        .u-font-27 {
            font-size: 12px
        }

        .u-font-28 {
            font-size: 13px
        }

        .u-font-29 {
            font-size: 13px
        }

        .u-font-30 {
            font-size: 14px
        }

        .u-font-31 {
            font-size: 14px
        }

        .u-font-32 {
            font-size: 15px
        }

        .u-font-33 {
            font-size: 15px
        }

        .u-font-34 {
            font-size: 16px
        }

        .u-font-35 {
            font-size: 16px
        }

        .u-font-36 {
            font-size: 17px
        }

        .u-font-37 {
            font-size: 17px
        }

        .u-font-38 {
            font-size: 18px
        }

        .u-font-39 {
            font-size: 18px
        }

        .u-font-40 {
            font-size: 19px
        }

        .u-margin-0,
        .u-m-0 {
            margin: 0px !important
        }

        .u-padding-0,
        .u-p-0 {
            padding: 0px !important
        }

        .u-m-l-0 {
            margin-left: 0px !important
        }

        .u-p-l-0 {
            padding-left: 0px !important
        }

        .u-margin-left-0 {
            margin-left: 0px !important
        }

        .u-padding-left-0 {
            padding-left: 0px !important
        }

        .u-m-t-0 {
            margin-top: 0px !important
        }

        .u-p-t-0 {
            padding-top: 0px !important
        }

        .u-margin-top-0 {
            margin-top: 0px !important
        }

        .u-padding-top-0 {
            padding-top: 0px !important
        }

        .u-m-r-0 {
            margin-right: 0px !important
        }

        .u-p-r-0 {
            padding-right: 0px !important
        }

        .u-margin-right-0 {
            margin-right: 0px !important
        }

        .u-padding-right-0 {
            padding-right: 0px !important
        }

        .u-m-b-0 {
            margin-bottom: 0px !important
        }

        .u-p-b-0 {
            padding-bottom: 0px !important
        }

        .u-margin-bottom-0 {
            margin-bottom: 0px !important
        }

        .u-padding-bottom-0 {
            padding-bottom: 0px !important
        }

        .u-margin-2,
        .u-m-2 {
            margin: 1px !important
        }

        .u-padding-2,
        .u-p-2 {
            padding: 1px !important
        }

        .u-m-l-2 {
            margin-left: 1px !important
        }

        .u-p-l-2 {
            padding-left: 1px !important
        }

        .u-margin-left-2 {
            margin-left: 1px !important
        }

        .u-padding-left-2 {
            padding-left: 1px !important
        }

        .u-m-t-2 {
            margin-top: 1px !important
        }

        .u-p-t-2 {
            padding-top: 1px !important
        }

        .u-margin-top-2 {
            margin-top: 1px !important
        }

        .u-padding-top-2 {
            padding-top: 1px !important
        }

        .u-m-r-2 {
            margin-right: 1px !important
        }

        .u-p-r-2 {
            padding-right: 1px !important
        }

        .u-margin-right-2 {
            margin-right: 1px !important
        }

        .u-padding-right-2 {
            padding-right: 1px !important
        }

        .u-m-b-2 {
            margin-bottom: 1px !important
        }

        .u-p-b-2 {
            padding-bottom: 1px !important
        }

        .u-margin-bottom-2 {
            margin-bottom: 1px !important
        }

        .u-padding-bottom-2 {
            padding-bottom: 1px !important
        }

        .u-margin-4,
        .u-m-4 {
            margin: 1px !important
        }

        .u-padding-4,
        .u-p-4 {
            padding: 1px !important
        }

        .u-m-l-4 {
            margin-left: 1px !important
        }

        .u-p-l-4 {
            padding-left: 1px !important
        }

        .u-margin-left-4 {
            margin-left: 1px !important
        }

        .u-padding-left-4 {
            padding-left: 1px !important
        }

        .u-m-t-4 {
            margin-top: 1px !important
        }

        .u-p-t-4 {
            padding-top: 1px !important
        }

        .u-margin-top-4 {
            margin-top: 1px !important
        }

        .u-padding-top-4 {
            padding-top: 1px !important
        }

        .u-m-r-4 {
            margin-right: 1px !important
        }

        .u-p-r-4 {
            padding-right: 1px !important
        }

        .u-margin-right-4 {
            margin-right: 1px !important
        }

        .u-padding-right-4 {
            padding-right: 1px !important
        }

        .u-m-b-4 {
            margin-bottom: 1px !important
        }

        .u-p-b-4 {
            padding-bottom: 1px !important
        }

        .u-margin-bottom-4 {
            margin-bottom: 1px !important
        }

        .u-padding-bottom-4 {
            padding-bottom: 1px !important
        }

        .u-margin-5,
        .u-m-5 {
            margin: 2px !important
        }

        .u-padding-5,
        .u-p-5 {
            padding: 2px !important
        }

        .u-m-l-5 {
            margin-left: 2px !important
        }

        .u-p-l-5 {
            padding-left: 2px !important
        }

        .u-margin-left-5 {
            margin-left: 2px !important
        }

        .u-padding-left-5 {
            padding-left: 2px !important
        }

        .u-m-t-5 {
            margin-top: 2px !important
        }

        .u-p-t-5 {
            padding-top: 2px !important
        }

        .u-margin-top-5 {
            margin-top: 2px !important
        }

        .u-padding-top-5 {
            padding-top: 2px !important
        }

        .u-m-r-5 {
            margin-right: 2px !important
        }

        .u-p-r-5 {
            padding-right: 2px !important
        }

        .u-margin-right-5 {
            margin-right: 2px !important
        }

        .u-padding-right-5 {
            padding-right: 2px !important
        }

        .u-m-b-5 {
            margin-bottom: 2px !important
        }

        .u-p-b-5 {
            padding-bottom: 2px !important
        }

        .u-margin-bottom-5 {
            margin-bottom: 2px !important
        }

        .u-padding-bottom-5 {
            padding-bottom: 2px !important
        }

        .u-margin-6,
        .u-m-6 {
            margin: 2px !important
        }

        .u-padding-6,
        .u-p-6 {
            padding: 2px !important
        }

        .u-m-l-6 {
            margin-left: 2px !important
        }

        .u-p-l-6 {
            padding-left: 2px !important
        }

        .u-margin-left-6 {
            margin-left: 2px !important
        }

        .u-padding-left-6 {
            padding-left: 2px !important
        }

        .u-m-t-6 {
            margin-top: 2px !important
        }

        .u-p-t-6 {
            padding-top: 2px !important
        }

        .u-margin-top-6 {
            margin-top: 2px !important
        }

        .u-padding-top-6 {
            padding-top: 2px !important
        }

        .u-m-r-6 {
            margin-right: 2px !important
        }

        .u-p-r-6 {
            padding-right: 2px !important
        }

        .u-margin-right-6 {
            margin-right: 2px !important
        }

        .u-padding-right-6 {
            padding-right: 2px !important
        }

        .u-m-b-6 {
            margin-bottom: 2px !important
        }

        .u-p-b-6 {
            padding-bottom: 2px !important
        }

        .u-margin-bottom-6 {
            margin-bottom: 2px !important
        }

        .u-padding-bottom-6 {
            padding-bottom: 2px !important
        }

        .u-margin-8,
        .u-m-8 {
            margin: 3px !important
        }

        .u-padding-8,
        .u-p-8 {
            padding: 3px !important
        }

        .u-m-l-8 {
            margin-left: 3px !important
        }

        .u-p-l-8 {
            padding-left: 3px !important
        }

        .u-margin-left-8 {
            margin-left: 3px !important
        }

        .u-padding-left-8 {
            padding-left: 3px !important
        }

        .u-m-t-8 {
            margin-top: 3px !important
        }

        .u-p-t-8 {
            padding-top: 3px !important
        }

        .u-margin-top-8 {
            margin-top: 3px !important
        }

        .u-padding-top-8 {
            padding-top: 3px !important
        }

        .u-m-r-8 {
            margin-right: 3px !important
        }

        .u-p-r-8 {
            padding-right: 3px !important
        }

        .u-margin-right-8 {
            margin-right: 3px !important
        }

        .u-padding-right-8 {
            padding-right: 3px !important
        }

        .u-m-b-8 {
            margin-bottom: 3px !important
        }

        .u-p-b-8 {
            padding-bottom: 3px !important
        }

        .u-margin-bottom-8 {
            margin-bottom: 3px !important
        }

        .u-padding-bottom-8 {
            padding-bottom: 3px !important
        }

        .u-margin-10,
        .u-m-10 {
            margin: 4px !important
        }

        .u-padding-10,
        .u-p-10 {
            padding: 4px !important
        }

        .u-m-l-10 {
            margin-left: 4px !important
        }

        .u-p-l-10 {
            padding-left: 4px !important
        }

        .u-margin-left-10 {
            margin-left: 4px !important
        }

        .u-padding-left-10 {
            padding-left: 4px !important
        }

        .u-m-t-10 {
            margin-top: 4px !important
        }

        .u-p-t-10 {
            padding-top: 4px !important
        }

        .u-margin-top-10 {
            margin-top: 4px !important
        }

        .u-padding-top-10 {
            padding-top: 4px !important
        }

        .u-m-r-10 {
            margin-right: 4px !important
        }

        .u-p-r-10 {
            padding-right: 4px !important
        }

        .u-margin-right-10 {
            margin-right: 4px !important
        }

        .u-padding-right-10 {
            padding-right: 4px !important
        }

        .u-m-b-10 {
            margin-bottom: 4px !important
        }

        .u-p-b-10 {
            padding-bottom: 4px !important
        }

        .u-margin-bottom-10 {
            margin-bottom: 4px !important
        }

        .u-padding-bottom-10 {
            padding-bottom: 4px !important
        }

        .u-margin-12,
        .u-m-12 {
            margin: 5px !important
        }

        .u-padding-12,
        .u-p-12 {
            padding: 5px !important
        }

        .u-m-l-12 {
            margin-left: 5px !important
        }

        .u-p-l-12 {
            padding-left: 5px !important
        }

        .u-margin-left-12 {
            margin-left: 5px !important
        }

        .u-padding-left-12 {
            padding-left: 5px !important
        }

        .u-m-t-12 {
            margin-top: 5px !important
        }

        .u-p-t-12 {
            padding-top: 5px !important
        }

        .u-margin-top-12 {
            margin-top: 5px !important
        }

        .u-padding-top-12 {
            padding-top: 5px !important
        }

        .u-m-r-12 {
            margin-right: 5px !important
        }

        .u-p-r-12 {
            padding-right: 5px !important
        }

        .u-margin-right-12 {
            margin-right: 5px !important
        }

        .u-padding-right-12 {
            padding-right: 5px !important
        }

        .u-m-b-12 {
            margin-bottom: 5px !important
        }

        .u-p-b-12 {
            padding-bottom: 5px !important
        }

        .u-margin-bottom-12 {
            margin-bottom: 5px !important
        }

        .u-padding-bottom-12 {
            padding-bottom: 5px !important
        }

        .u-margin-14,
        .u-m-14 {
            margin: 6px !important
        }

        .u-padding-14,
        .u-p-14 {
            padding: 6px !important
        }

        .u-m-l-14 {
            margin-left: 6px !important
        }

        .u-p-l-14 {
            padding-left: 6px !important
        }

        .u-margin-left-14 {
            margin-left: 6px !important
        }

        .u-padding-left-14 {
            padding-left: 6px !important
        }

        .u-m-t-14 {
            margin-top: 6px !important
        }

        .u-p-t-14 {
            padding-top: 6px !important
        }

        .u-margin-top-14 {
            margin-top: 6px !important
        }

        .u-padding-top-14 {
            padding-top: 6px !important
        }

        .u-m-r-14 {
            margin-right: 6px !important
        }

        .u-p-r-14 {
            padding-right: 6px !important
        }

        .u-margin-right-14 {
            margin-right: 6px !important
        }

        .u-padding-right-14 {
            padding-right: 6px !important
        }

        .u-m-b-14 {
            margin-bottom: 6px !important
        }

        .u-p-b-14 {
            padding-bottom: 6px !important
        }

        .u-margin-bottom-14 {
            margin-bottom: 6px !important
        }

        .u-padding-bottom-14 {
            padding-bottom: 6px !important
        }

        .u-margin-15,
        .u-m-15 {
            margin: 7px !important
        }

        .u-padding-15,
        .u-p-15 {
            padding: 7px !important
        }

        .u-m-l-15 {
            margin-left: 7px !important
        }

        .u-p-l-15 {
            padding-left: 7px !important
        }

        .u-margin-left-15 {
            margin-left: 7px !important
        }

        .u-padding-left-15 {
            padding-left: 7px !important
        }

        .u-m-t-15 {
            margin-top: 7px !important
        }

        .u-p-t-15 {
            padding-top: 7px !important
        }

        .u-margin-top-15 {
            margin-top: 7px !important
        }

        .u-padding-top-15 {
            padding-top: 7px !important
        }

        .u-m-r-15 {
            margin-right: 7px !important
        }

        .u-p-r-15 {
            padding-right: 7px !important
        }

        .u-margin-right-15 {
            margin-right: 7px !important
        }

        .u-padding-right-15 {
            padding-right: 7px !important
        }

        .u-m-b-15 {
            margin-bottom: 7px !important
        }

        .u-p-b-15 {
            padding-bottom: 7px !important
        }

        .u-margin-bottom-15 {
            margin-bottom: 7px !important
        }

        .u-padding-bottom-15 {
            padding-bottom: 7px !important
        }

        .u-margin-16,
        .u-m-16 {
            margin: 7px !important
        }

        .u-padding-16,
        .u-p-16 {
            padding: 7px !important
        }

        .u-m-l-16 {
            margin-left: 7px !important
        }

        .u-p-l-16 {
            padding-left: 7px !important
        }

        .u-margin-left-16 {
            margin-left: 7px !important
        }

        .u-padding-left-16 {
            padding-left: 7px !important
        }

        .u-m-t-16 {
            margin-top: 7px !important
        }

        .u-p-t-16 {
            padding-top: 7px !important
        }

        .u-margin-top-16 {
            margin-top: 7px !important
        }

        .u-padding-top-16 {
            padding-top: 7px !important
        }

        .u-m-r-16 {
            margin-right: 7px !important
        }

        .u-p-r-16 {
            padding-right: 7px !important
        }

        .u-margin-right-16 {
            margin-right: 7px !important
        }

        .u-padding-right-16 {
            padding-right: 7px !important
        }

        .u-m-b-16 {
            margin-bottom: 7px !important
        }

        .u-p-b-16 {
            padding-bottom: 7px !important
        }

        .u-margin-bottom-16 {
            margin-bottom: 7px !important
        }

        .u-padding-bottom-16 {
            padding-bottom: 7px !important
        }

        .u-margin-18,
        .u-m-18 {
            margin: 8px !important
        }

        .u-padding-18,
        .u-p-18 {
            padding: 8px !important
        }

        .u-m-l-18 {
            margin-left: 8px !important
        }

        .u-p-l-18 {
            padding-left: 8px !important
        }

        .u-margin-left-18 {
            margin-left: 8px !important
        }

        .u-padding-left-18 {
            padding-left: 8px !important
        }

        .u-m-t-18 {
            margin-top: 8px !important
        }

        .u-p-t-18 {
            padding-top: 8px !important
        }

        .u-margin-top-18 {
            margin-top: 8px !important
        }

        .u-padding-top-18 {
            padding-top: 8px !important
        }

        .u-m-r-18 {
            margin-right: 8px !important
        }

        .u-p-r-18 {
            padding-right: 8px !important
        }

        .u-margin-right-18 {
            margin-right: 8px !important
        }

        .u-padding-right-18 {
            padding-right: 8px !important
        }

        .u-m-b-18 {
            margin-bottom: 8px !important
        }

        .u-p-b-18 {
            padding-bottom: 8px !important
        }

        .u-margin-bottom-18 {
            margin-bottom: 8px !important
        }

        .u-padding-bottom-18 {
            padding-bottom: 8px !important
        }

        .u-margin-20,
        .u-m-20 {
            margin: 9px !important
        }

        .u-padding-20,
        .u-p-20 {
            padding: 9px !important
        }

        .u-m-l-20 {
            margin-left: 9px !important
        }

        .u-p-l-20 {
            padding-left: 9px !important
        }

        .u-margin-left-20 {
            margin-left: 9px !important
        }

        .u-padding-left-20 {
            padding-left: 9px !important
        }

        .u-m-t-20 {
            margin-top: 9px !important
        }

        .u-p-t-20 {
            padding-top: 9px !important
        }

        .u-margin-top-20 {
            margin-top: 9px !important
        }

        .u-padding-top-20 {
            padding-top: 9px !important
        }

        .u-m-r-20 {
            margin-right: 9px !important
        }

        .u-p-r-20 {
            padding-right: 9px !important
        }

        .u-margin-right-20 {
            margin-right: 9px !important
        }

        .u-padding-right-20 {
            padding-right: 9px !important
        }

        .u-m-b-20 {
            margin-bottom: 9px !important
        }

        .u-p-b-20 {
            padding-bottom: 9px !important
        }

        .u-margin-bottom-20 {
            margin-bottom: 9px !important
        }

        .u-padding-bottom-20 {
            padding-bottom: 9px !important
        }

        .u-margin-22,
        .u-m-22 {
            margin: 10px !important
        }

        .u-padding-22,
        .u-p-22 {
            padding: 10px !important
        }

        .u-m-l-22 {
            margin-left: 10px !important
        }

        .u-p-l-22 {
            padding-left: 10px !important
        }

        .u-margin-left-22 {
            margin-left: 10px !important
        }

        .u-padding-left-22 {
            padding-left: 10px !important
        }

        .u-m-t-22 {
            margin-top: 10px !important
        }

        .u-p-t-22 {
            padding-top: 10px !important
        }

        .u-margin-top-22 {
            margin-top: 10px !important
        }

        .u-padding-top-22 {
            padding-top: 10px !important
        }

        .u-m-r-22 {
            margin-right: 10px !important
        }

        .u-p-r-22 {
            padding-right: 10px !important
        }

        .u-margin-right-22 {
            margin-right: 10px !important
        }

        .u-padding-right-22 {
            padding-right: 10px !important
        }

        .u-m-b-22 {
            margin-bottom: 10px !important
        }

        .u-p-b-22 {
            padding-bottom: 10px !important
        }

        .u-margin-bottom-22 {
            margin-bottom: 10px !important
        }

        .u-padding-bottom-22 {
            padding-bottom: 10px !important
        }

        .u-margin-24,
        .u-m-24 {
            margin: 11px !important
        }

        .u-padding-24,
        .u-p-24 {
            padding: 11px !important
        }

        .u-m-l-24 {
            margin-left: 11px !important
        }

        .u-p-l-24 {
            padding-left: 11px !important
        }

        .u-margin-left-24 {
            margin-left: 11px !important
        }

        .u-padding-left-24 {
            padding-left: 11px !important
        }

        .u-m-t-24 {
            margin-top: 11px !important
        }

        .u-p-t-24 {
            padding-top: 11px !important
        }

        .u-margin-top-24 {
            margin-top: 11px !important
        }

        .u-padding-top-24 {
            padding-top: 11px !important
        }

        .u-m-r-24 {
            margin-right: 11px !important
        }

        .u-p-r-24 {
            padding-right: 11px !important
        }

        .u-margin-right-24 {
            margin-right: 11px !important
        }

        .u-padding-right-24 {
            padding-right: 11px !important
        }

        .u-m-b-24 {
            margin-bottom: 11px !important
        }

        .u-p-b-24 {
            padding-bottom: 11px !important
        }

        .u-margin-bottom-24 {
            margin-bottom: 11px !important
        }

        .u-padding-bottom-24 {
            padding-bottom: 11px !important
        }

        .u-margin-25,
        .u-m-25 {
            margin: 12px !important
        }

        .u-padding-25,
        .u-p-25 {
            padding: 12px !important
        }

        .u-m-l-25 {
            margin-left: 12px !important
        }

        .u-p-l-25 {
            padding-left: 12px !important
        }

        .u-margin-left-25 {
            margin-left: 12px !important
        }

        .u-padding-left-25 {
            padding-left: 12px !important
        }

        .u-m-t-25 {
            margin-top: 12px !important
        }

        .u-p-t-25 {
            padding-top: 12px !important
        }

        .u-margin-top-25 {
            margin-top: 12px !important
        }

        .u-padding-top-25 {
            padding-top: 12px !important
        }

        .u-m-r-25 {
            margin-right: 12px !important
        }

        .u-p-r-25 {
            padding-right: 12px !important
        }

        .u-margin-right-25 {
            margin-right: 12px !important
        }

        .u-padding-right-25 {
            padding-right: 12px !important
        }

        .u-m-b-25 {
            margin-bottom: 12px !important
        }

        .u-p-b-25 {
            padding-bottom: 12px !important
        }

        .u-margin-bottom-25 {
            margin-bottom: 12px !important
        }

        .u-padding-bottom-25 {
            padding-bottom: 12px !important
        }

        .u-margin-26,
        .u-m-26 {
            margin: 12px !important
        }

        .u-padding-26,
        .u-p-26 {
            padding: 12px !important
        }

        .u-m-l-26 {
            margin-left: 12px !important
        }

        .u-p-l-26 {
            padding-left: 12px !important
        }

        .u-margin-left-26 {
            margin-left: 12px !important
        }

        .u-padding-left-26 {
            padding-left: 12px !important
        }

        .u-m-t-26 {
            margin-top: 12px !important
        }

        .u-p-t-26 {
            padding-top: 12px !important
        }

        .u-margin-top-26 {
            margin-top: 12px !important
        }

        .u-padding-top-26 {
            padding-top: 12px !important
        }

        .u-m-r-26 {
            margin-right: 12px !important
        }

        .u-p-r-26 {
            padding-right: 12px !important
        }

        .u-margin-right-26 {
            margin-right: 12px !important
        }

        .u-padding-right-26 {
            padding-right: 12px !important
        }

        .u-m-b-26 {
            margin-bottom: 12px !important
        }

        .u-p-b-26 {
            padding-bottom: 12px !important
        }

        .u-margin-bottom-26 {
            margin-bottom: 12px !important
        }

        .u-padding-bottom-26 {
            padding-bottom: 12px !important
        }

        .u-margin-28,
        .u-m-28 {
            margin: 13px !important
        }

        .u-padding-28,
        .u-p-28 {
            padding: 13px !important
        }

        .u-m-l-28 {
            margin-left: 13px !important
        }

        .u-p-l-28 {
            padding-left: 13px !important
        }

        .u-margin-left-28 {
            margin-left: 13px !important
        }

        .u-padding-left-28 {
            padding-left: 13px !important
        }

        .u-m-t-28 {
            margin-top: 13px !important
        }

        .u-p-t-28 {
            padding-top: 13px !important
        }

        .u-margin-top-28 {
            margin-top: 13px !important
        }

        .u-padding-top-28 {
            padding-top: 13px !important
        }

        .u-m-r-28 {
            margin-right: 13px !important
        }

        .u-p-r-28 {
            padding-right: 13px !important
        }

        .u-margin-right-28 {
            margin-right: 13px !important
        }

        .u-padding-right-28 {
            padding-right: 13px !important
        }

        .u-m-b-28 {
            margin-bottom: 13px !important
        }

        .u-p-b-28 {
            padding-bottom: 13px !important
        }

        .u-margin-bottom-28 {
            margin-bottom: 13px !important
        }

        .u-padding-bottom-28 {
            padding-bottom: 13px !important
        }

        .u-margin-30,
        .u-m-30 {
            margin: 14px !important
        }

        .u-padding-30,
        .u-p-30 {
            padding: 14px !important
        }

        .u-m-l-30 {
            margin-left: 14px !important
        }

        .u-p-l-30 {
            padding-left: 14px !important
        }

        .u-margin-left-30 {
            margin-left: 14px !important
        }

        .u-padding-left-30 {
            padding-left: 14px !important
        }

        .u-m-t-30 {
            margin-top: 14px !important
        }

        .u-p-t-30 {
            padding-top: 14px !important
        }

        .u-margin-top-30 {
            margin-top: 14px !important
        }

        .u-padding-top-30 {
            padding-top: 14px !important
        }

        .u-m-r-30 {
            margin-right: 14px !important
        }

        .u-p-r-30 {
            padding-right: 14px !important
        }

        .u-margin-right-30 {
            margin-right: 14px !important
        }

        .u-padding-right-30 {
            padding-right: 14px !important
        }

        .u-m-b-30 {
            margin-bottom: 14px !important
        }

        .u-p-b-30 {
            padding-bottom: 14px !important
        }

        .u-margin-bottom-30 {
            margin-bottom: 14px !important
        }

        .u-padding-bottom-30 {
            padding-bottom: 14px !important
        }

        .u-margin-32,
        .u-m-32 {
            margin: 15px !important
        }

        .u-padding-32,
        .u-p-32 {
            padding: 15px !important
        }

        .u-m-l-32 {
            margin-left: 15px !important
        }

        .u-p-l-32 {
            padding-left: 15px !important
        }

        .u-margin-left-32 {
            margin-left: 15px !important
        }

        .u-padding-left-32 {
            padding-left: 15px !important
        }

        .u-m-t-32 {
            margin-top: 15px !important
        }

        .u-p-t-32 {
            padding-top: 15px !important
        }

        .u-margin-top-32 {
            margin-top: 15px !important
        }

        .u-padding-top-32 {
            padding-top: 15px !important
        }

        .u-m-r-32 {
            margin-right: 15px !important
        }

        .u-p-r-32 {
            padding-right: 15px !important
        }

        .u-margin-right-32 {
            margin-right: 15px !important
        }

        .u-padding-right-32 {
            padding-right: 15px !important
        }

        .u-m-b-32 {
            margin-bottom: 15px !important
        }

        .u-p-b-32 {
            padding-bottom: 15px !important
        }

        .u-margin-bottom-32 {
            margin-bottom: 15px !important
        }

        .u-padding-bottom-32 {
            padding-bottom: 15px !important
        }

        .u-margin-34,
        .u-m-34 {
            margin: 16px !important
        }

        .u-padding-34,
        .u-p-34 {
            padding: 16px !important
        }

        .u-m-l-34 {
            margin-left: 16px !important
        }

        .u-p-l-34 {
            padding-left: 16px !important
        }

        .u-margin-left-34 {
            margin-left: 16px !important
        }

        .u-padding-left-34 {
            padding-left: 16px !important
        }

        .u-m-t-34 {
            margin-top: 16px !important
        }

        .u-p-t-34 {
            padding-top: 16px !important
        }

        .u-margin-top-34 {
            margin-top: 16px !important
        }

        .u-padding-top-34 {
            padding-top: 16px !important
        }

        .u-m-r-34 {
            margin-right: 16px !important
        }

        .u-p-r-34 {
            padding-right: 16px !important
        }

        .u-margin-right-34 {
            margin-right: 16px !important
        }

        .u-padding-right-34 {
            padding-right: 16px !important
        }

        .u-m-b-34 {
            margin-bottom: 16px !important
        }

        .u-p-b-34 {
            padding-bottom: 16px !important
        }

        .u-margin-bottom-34 {
            margin-bottom: 16px !important
        }

        .u-padding-bottom-34 {
            padding-bottom: 16px !important
        }

        .u-margin-35,
        .u-m-35 {
            margin: 16px !important
        }

        .u-padding-35,
        .u-p-35 {
            padding: 16px !important
        }

        .u-m-l-35 {
            margin-left: 16px !important
        }

        .u-p-l-35 {
            padding-left: 16px !important
        }

        .u-margin-left-35 {
            margin-left: 16px !important
        }

        .u-padding-left-35 {
            padding-left: 16px !important
        }

        .u-m-t-35 {
            margin-top: 16px !important
        }

        .u-p-t-35 {
            padding-top: 16px !important
        }

        .u-margin-top-35 {
            margin-top: 16px !important
        }

        .u-padding-top-35 {
            padding-top: 16px !important
        }

        .u-m-r-35 {
            margin-right: 16px !important
        }

        .u-p-r-35 {
            padding-right: 16px !important
        }

        .u-margin-right-35 {
            margin-right: 16px !important
        }

        .u-padding-right-35 {
            padding-right: 16px !important
        }

        .u-m-b-35 {
            margin-bottom: 16px !important
        }

        .u-p-b-35 {
            padding-bottom: 16px !important
        }

        .u-margin-bottom-35 {
            margin-bottom: 16px !important
        }

        .u-padding-bottom-35 {
            padding-bottom: 16px !important
        }

        .u-margin-36,
        .u-m-36 {
            margin: 17px !important
        }

        .u-padding-36,
        .u-p-36 {
            padding: 17px !important
        }

        .u-m-l-36 {
            margin-left: 17px !important
        }

        .u-p-l-36 {
            padding-left: 17px !important
        }

        .u-margin-left-36 {
            margin-left: 17px !important
        }

        .u-padding-left-36 {
            padding-left: 17px !important
        }

        .u-m-t-36 {
            margin-top: 17px !important
        }

        .u-p-t-36 {
            padding-top: 17px !important
        }

        .u-margin-top-36 {
            margin-top: 17px !important
        }

        .u-padding-top-36 {
            padding-top: 17px !important
        }

        .u-m-r-36 {
            margin-right: 17px !important
        }

        .u-p-r-36 {
            padding-right: 17px !important
        }

        .u-margin-right-36 {
            margin-right: 17px !important
        }

        .u-padding-right-36 {
            padding-right: 17px !important
        }

        .u-m-b-36 {
            margin-bottom: 17px !important
        }

        .u-p-b-36 {
            padding-bottom: 17px !important
        }

        .u-margin-bottom-36 {
            margin-bottom: 17px !important
        }

        .u-padding-bottom-36 {
            padding-bottom: 17px !important
        }

        .u-margin-38,
        .u-m-38 {
            margin: 18px !important
        }

        .u-padding-38,
        .u-p-38 {
            padding: 18px !important
        }

        .u-m-l-38 {
            margin-left: 18px !important
        }

        .u-p-l-38 {
            padding-left: 18px !important
        }

        .u-margin-left-38 {
            margin-left: 18px !important
        }

        .u-padding-left-38 {
            padding-left: 18px !important
        }

        .u-m-t-38 {
            margin-top: 18px !important
        }

        .u-p-t-38 {
            padding-top: 18px !important
        }

        .u-margin-top-38 {
            margin-top: 18px !important
        }

        .u-padding-top-38 {
            padding-top: 18px !important
        }

        .u-m-r-38 {
            margin-right: 18px !important
        }

        .u-p-r-38 {
            padding-right: 18px !important
        }

        .u-margin-right-38 {
            margin-right: 18px !important
        }

        .u-padding-right-38 {
            padding-right: 18px !important
        }

        .u-m-b-38 {
            margin-bottom: 18px !important
        }

        .u-p-b-38 {
            padding-bottom: 18px !important
        }

        .u-margin-bottom-38 {
            margin-bottom: 18px !important
        }

        .u-padding-bottom-38 {
            padding-bottom: 18px !important
        }

        .u-margin-40,
        .u-m-40 {
            margin: 19px !important
        }

        .u-padding-40,
        .u-p-40 {
            padding: 19px !important
        }

        .u-m-l-40 {
            margin-left: 19px !important
        }

        .u-p-l-40 {
            padding-left: 19px !important
        }

        .u-margin-left-40 {
            margin-left: 19px !important
        }

        .u-padding-left-40 {
            padding-left: 19px !important
        }

        .u-m-t-40 {
            margin-top: 19px !important
        }

        .u-p-t-40 {
            padding-top: 19px !important
        }

        .u-margin-top-40 {
            margin-top: 19px !important
        }

        .u-padding-top-40 {
            padding-top: 19px !important
        }

        .u-m-r-40 {
            margin-right: 19px !important
        }

        .u-p-r-40 {
            padding-right: 19px !important
        }

        .u-margin-right-40 {
            margin-right: 19px !important
        }

        .u-padding-right-40 {
            padding-right: 19px !important
        }

        .u-m-b-40 {
            margin-bottom: 19px !important
        }

        .u-p-b-40 {
            padding-bottom: 19px !important
        }

        .u-margin-bottom-40 {
            margin-bottom: 19px !important
        }

        .u-padding-bottom-40 {
            padding-bottom: 19px !important
        }

        .u-margin-42,
        .u-m-42 {
            margin: 20px !important
        }

        .u-padding-42,
        .u-p-42 {
            padding: 20px !important
        }

        .u-m-l-42 {
            margin-left: 20px !important
        }

        .u-p-l-42 {
            padding-left: 20px !important
        }

        .u-margin-left-42 {
            margin-left: 20px !important
        }

        .u-padding-left-42 {
            padding-left: 20px !important
        }

        .u-m-t-42 {
            margin-top: 20px !important
        }

        .u-p-t-42 {
            padding-top: 20px !important
        }

        .u-margin-top-42 {
            margin-top: 20px !important
        }

        .u-padding-top-42 {
            padding-top: 20px !important
        }

        .u-m-r-42 {
            margin-right: 20px !important
        }

        .u-p-r-42 {
            padding-right: 20px !important
        }

        .u-margin-right-42 {
            margin-right: 20px !important
        }

        .u-padding-right-42 {
            padding-right: 20px !important
        }

        .u-m-b-42 {
            margin-bottom: 20px !important
        }

        .u-p-b-42 {
            padding-bottom: 20px !important
        }

        .u-margin-bottom-42 {
            margin-bottom: 20px !important
        }

        .u-padding-bottom-42 {
            padding-bottom: 20px !important
        }

        .u-margin-44,
        .u-m-44 {
            margin: 21px !important
        }

        .u-padding-44,
        .u-p-44 {
            padding: 21px !important
        }

        .u-m-l-44 {
            margin-left: 21px !important
        }

        .u-p-l-44 {
            padding-left: 21px !important
        }

        .u-margin-left-44 {
            margin-left: 21px !important
        }

        .u-padding-left-44 {
            padding-left: 21px !important
        }

        .u-m-t-44 {
            margin-top: 21px !important
        }

        .u-p-t-44 {
            padding-top: 21px !important
        }

        .u-margin-top-44 {
            margin-top: 21px !important
        }

        .u-padding-top-44 {
            padding-top: 21px !important
        }

        .u-m-r-44 {
            margin-right: 21px !important
        }

        .u-p-r-44 {
            padding-right: 21px !important
        }

        .u-margin-right-44 {
            margin-right: 21px !important
        }

        .u-padding-right-44 {
            padding-right: 21px !important
        }

        .u-m-b-44 {
            margin-bottom: 21px !important
        }

        .u-p-b-44 {
            padding-bottom: 21px !important
        }

        .u-margin-bottom-44 {
            margin-bottom: 21px !important
        }

        .u-padding-bottom-44 {
            padding-bottom: 21px !important
        }

        .u-margin-45,
        .u-m-45 {
            margin: 21px !important
        }

        .u-padding-45,
        .u-p-45 {
            padding: 21px !important
        }

        .u-m-l-45 {
            margin-left: 21px !important
        }

        .u-p-l-45 {
            padding-left: 21px !important
        }

        .u-margin-left-45 {
            margin-left: 21px !important
        }

        .u-padding-left-45 {
            padding-left: 21px !important
        }

        .u-m-t-45 {
            margin-top: 21px !important
        }

        .u-p-t-45 {
            padding-top: 21px !important
        }

        .u-margin-top-45 {
            margin-top: 21px !important
        }

        .u-padding-top-45 {
            padding-top: 21px !important
        }

        .u-m-r-45 {
            margin-right: 21px !important
        }

        .u-p-r-45 {
            padding-right: 21px !important
        }

        .u-margin-right-45 {
            margin-right: 21px !important
        }

        .u-padding-right-45 {
            padding-right: 21px !important
        }

        .u-m-b-45 {
            margin-bottom: 21px !important
        }

        .u-p-b-45 {
            padding-bottom: 21px !important
        }

        .u-margin-bottom-45 {
            margin-bottom: 21px !important
        }

        .u-padding-bottom-45 {
            padding-bottom: 21px !important
        }

        .u-margin-46,
        .u-m-46 {
            margin: 22px !important
        }

        .u-padding-46,
        .u-p-46 {
            padding: 22px !important
        }

        .u-m-l-46 {
            margin-left: 22px !important
        }

        .u-p-l-46 {
            padding-left: 22px !important
        }

        .u-margin-left-46 {
            margin-left: 22px !important
        }

        .u-padding-left-46 {
            padding-left: 22px !important
        }

        .u-m-t-46 {
            margin-top: 22px !important
        }

        .u-p-t-46 {
            padding-top: 22px !important
        }

        .u-margin-top-46 {
            margin-top: 22px !important
        }

        .u-padding-top-46 {
            padding-top: 22px !important
        }

        .u-m-r-46 {
            margin-right: 22px !important
        }

        .u-p-r-46 {
            padding-right: 22px !important
        }

        .u-margin-right-46 {
            margin-right: 22px !important
        }

        .u-padding-right-46 {
            padding-right: 22px !important
        }

        .u-m-b-46 {
            margin-bottom: 22px !important
        }

        .u-p-b-46 {
            padding-bottom: 22px !important
        }

        .u-margin-bottom-46 {
            margin-bottom: 22px !important
        }

        .u-padding-bottom-46 {
            padding-bottom: 22px !important
        }

        .u-margin-48,
        .u-m-48 {
            margin: 23px !important
        }

        .u-padding-48,
        .u-p-48 {
            padding: 23px !important
        }

        .u-m-l-48 {
            margin-left: 23px !important
        }

        .u-p-l-48 {
            padding-left: 23px !important
        }

        .u-margin-left-48 {
            margin-left: 23px !important
        }

        .u-padding-left-48 {
            padding-left: 23px !important
        }

        .u-m-t-48 {
            margin-top: 23px !important
        }

        .u-p-t-48 {
            padding-top: 23px !important
        }

        .u-margin-top-48 {
            margin-top: 23px !important
        }

        .u-padding-top-48 {
            padding-top: 23px !important
        }

        .u-m-r-48 {
            margin-right: 23px !important
        }

        .u-p-r-48 {
            padding-right: 23px !important
        }

        .u-margin-right-48 {
            margin-right: 23px !important
        }

        .u-padding-right-48 {
            padding-right: 23px !important
        }

        .u-m-b-48 {
            margin-bottom: 23px !important
        }

        .u-p-b-48 {
            padding-bottom: 23px !important
        }

        .u-margin-bottom-48 {
            margin-bottom: 23px !important
        }

        .u-padding-bottom-48 {
            padding-bottom: 23px !important
        }

        .u-margin-50,
        .u-m-50 {
            margin: 24px !important
        }

        .u-padding-50,
        .u-p-50 {
            padding: 24px !important
        }

        .u-m-l-50 {
            margin-left: 24px !important
        }

        .u-p-l-50 {
            padding-left: 24px !important
        }

        .u-margin-left-50 {
            margin-left: 24px !important
        }

        .u-padding-left-50 {
            padding-left: 24px !important
        }

        .u-m-t-50 {
            margin-top: 24px !important
        }

        .u-p-t-50 {
            padding-top: 24px !important
        }

        .u-margin-top-50 {
            margin-top: 24px !important
        }

        .u-padding-top-50 {
            padding-top: 24px !important
        }

        .u-m-r-50 {
            margin-right: 24px !important
        }

        .u-p-r-50 {
            padding-right: 24px !important
        }

        .u-margin-right-50 {
            margin-right: 24px !important
        }

        .u-padding-right-50 {
            padding-right: 24px !important
        }

        .u-m-b-50 {
            margin-bottom: 24px !important
        }

        .u-p-b-50 {
            padding-bottom: 24px !important
        }

        .u-margin-bottom-50 {
            margin-bottom: 24px !important
        }

        .u-padding-bottom-50 {
            padding-bottom: 24px !important
        }

        .u-margin-52,
        .u-m-52 {
            margin: 24px !important
        }

        .u-padding-52,
        .u-p-52 {
            padding: 24px !important
        }

        .u-m-l-52 {
            margin-left: 24px !important
        }

        .u-p-l-52 {
            padding-left: 24px !important
        }

        .u-margin-left-52 {
            margin-left: 24px !important
        }

        .u-padding-left-52 {
            padding-left: 24px !important
        }

        .u-m-t-52 {
            margin-top: 24px !important
        }

        .u-p-t-52 {
            padding-top: 24px !important
        }

        .u-margin-top-52 {
            margin-top: 24px !important
        }

        .u-padding-top-52 {
            padding-top: 24px !important
        }

        .u-m-r-52 {
            margin-right: 24px !important
        }

        .u-p-r-52 {
            padding-right: 24px !important
        }

        .u-margin-right-52 {
            margin-right: 24px !important
        }

        .u-padding-right-52 {
            padding-right: 24px !important
        }

        .u-m-b-52 {
            margin-bottom: 24px !important
        }

        .u-p-b-52 {
            padding-bottom: 24px !important
        }

        .u-margin-bottom-52 {
            margin-bottom: 24px !important
        }

        .u-padding-bottom-52 {
            padding-bottom: 24px !important
        }

        .u-margin-54,
        .u-m-54 {
            margin: 25px !important
        }

        .u-padding-54,
        .u-p-54 {
            padding: 25px !important
        }

        .u-m-l-54 {
            margin-left: 25px !important
        }

        .u-p-l-54 {
            padding-left: 25px !important
        }

        .u-margin-left-54 {
            margin-left: 25px !important
        }

        .u-padding-left-54 {
            padding-left: 25px !important
        }

        .u-m-t-54 {
            margin-top: 25px !important
        }

        .u-p-t-54 {
            padding-top: 25px !important
        }

        .u-margin-top-54 {
            margin-top: 25px !important
        }

        .u-padding-top-54 {
            padding-top: 25px !important
        }

        .u-m-r-54 {
            margin-right: 25px !important
        }

        .u-p-r-54 {
            padding-right: 25px !important
        }

        .u-margin-right-54 {
            margin-right: 25px !important
        }

        .u-padding-right-54 {
            padding-right: 25px !important
        }

        .u-m-b-54 {
            margin-bottom: 25px !important
        }

        .u-p-b-54 {
            padding-bottom: 25px !important
        }

        .u-margin-bottom-54 {
            margin-bottom: 25px !important
        }

        .u-padding-bottom-54 {
            padding-bottom: 25px !important
        }

        .u-margin-55,
        .u-m-55 {
            margin: 26px !important
        }

        .u-padding-55,
        .u-p-55 {
            padding: 26px !important
        }

        .u-m-l-55 {
            margin-left: 26px !important
        }

        .u-p-l-55 {
            padding-left: 26px !important
        }

        .u-margin-left-55 {
            margin-left: 26px !important
        }

        .u-padding-left-55 {
            padding-left: 26px !important
        }

        .u-m-t-55 {
            margin-top: 26px !important
        }

        .u-p-t-55 {
            padding-top: 26px !important
        }

        .u-margin-top-55 {
            margin-top: 26px !important
        }

        .u-padding-top-55 {
            padding-top: 26px !important
        }

        .u-m-r-55 {
            margin-right: 26px !important
        }

        .u-p-r-55 {
            padding-right: 26px !important
        }

        .u-margin-right-55 {
            margin-right: 26px !important
        }

        .u-padding-right-55 {
            padding-right: 26px !important
        }

        .u-m-b-55 {
            margin-bottom: 26px !important
        }

        .u-p-b-55 {
            padding-bottom: 26px !important
        }

        .u-margin-bottom-55 {
            margin-bottom: 26px !important
        }

        .u-padding-bottom-55 {
            padding-bottom: 26px !important
        }

        .u-margin-56,
        .u-m-56 {
            margin: 26px !important
        }

        .u-padding-56,
        .u-p-56 {
            padding: 26px !important
        }

        .u-m-l-56 {
            margin-left: 26px !important
        }

        .u-p-l-56 {
            padding-left: 26px !important
        }

        .u-margin-left-56 {
            margin-left: 26px !important
        }

        .u-padding-left-56 {
            padding-left: 26px !important
        }

        .u-m-t-56 {
            margin-top: 26px !important
        }

        .u-p-t-56 {
            padding-top: 26px !important
        }

        .u-margin-top-56 {
            margin-top: 26px !important
        }

        .u-padding-top-56 {
            padding-top: 26px !important
        }

        .u-m-r-56 {
            margin-right: 26px !important
        }

        .u-p-r-56 {
            padding-right: 26px !important
        }

        .u-margin-right-56 {
            margin-right: 26px !important
        }

        .u-padding-right-56 {
            padding-right: 26px !important
        }

        .u-m-b-56 {
            margin-bottom: 26px !important
        }

        .u-p-b-56 {
            padding-bottom: 26px !important
        }

        .u-margin-bottom-56 {
            margin-bottom: 26px !important
        }

        .u-padding-bottom-56 {
            padding-bottom: 26px !important
        }

        .u-margin-58,
        .u-m-58 {
            margin: 27px !important
        }

        .u-padding-58,
        .u-p-58 {
            padding: 27px !important
        }

        .u-m-l-58 {
            margin-left: 27px !important
        }

        .u-p-l-58 {
            padding-left: 27px !important
        }

        .u-margin-left-58 {
            margin-left: 27px !important
        }

        .u-padding-left-58 {
            padding-left: 27px !important
        }

        .u-m-t-58 {
            margin-top: 27px !important
        }

        .u-p-t-58 {
            padding-top: 27px !important
        }

        .u-margin-top-58 {
            margin-top: 27px !important
        }

        .u-padding-top-58 {
            padding-top: 27px !important
        }

        .u-m-r-58 {
            margin-right: 27px !important
        }

        .u-p-r-58 {
            padding-right: 27px !important
        }

        .u-margin-right-58 {
            margin-right: 27px !important
        }

        .u-padding-right-58 {
            padding-right: 27px !important
        }

        .u-m-b-58 {
            margin-bottom: 27px !important
        }

        .u-p-b-58 {
            padding-bottom: 27px !important
        }

        .u-margin-bottom-58 {
            margin-bottom: 27px !important
        }

        .u-padding-bottom-58 {
            padding-bottom: 27px !important
        }

        .u-margin-60,
        .u-m-60 {
            margin: 28px !important
        }

        .u-padding-60,
        .u-p-60 {
            padding: 28px !important
        }

        .u-m-l-60 {
            margin-left: 28px !important
        }

        .u-p-l-60 {
            padding-left: 28px !important
        }

        .u-margin-left-60 {
            margin-left: 28px !important
        }

        .u-padding-left-60 {
            padding-left: 28px !important
        }

        .u-m-t-60 {
            margin-top: 28px !important
        }

        .u-p-t-60 {
            padding-top: 28px !important
        }

        .u-margin-top-60 {
            margin-top: 28px !important
        }

        .u-padding-top-60 {
            padding-top: 28px !important
        }

        .u-m-r-60 {
            margin-right: 28px !important
        }

        .u-p-r-60 {
            padding-right: 28px !important
        }

        .u-margin-right-60 {
            margin-right: 28px !important
        }

        .u-padding-right-60 {
            padding-right: 28px !important
        }

        .u-m-b-60 {
            margin-bottom: 28px !important
        }

        .u-p-b-60 {
            padding-bottom: 28px !important
        }

        .u-margin-bottom-60 {
            margin-bottom: 28px !important
        }

        .u-padding-bottom-60 {
            padding-bottom: 28px !important
        }

        .u-margin-62,
        .u-m-62 {
            margin: 29px !important
        }

        .u-padding-62,
        .u-p-62 {
            padding: 29px !important
        }

        .u-m-l-62 {
            margin-left: 29px !important
        }

        .u-p-l-62 {
            padding-left: 29px !important
        }

        .u-margin-left-62 {
            margin-left: 29px !important
        }

        .u-padding-left-62 {
            padding-left: 29px !important
        }

        .u-m-t-62 {
            margin-top: 29px !important
        }

        .u-p-t-62 {
            padding-top: 29px !important
        }

        .u-margin-top-62 {
            margin-top: 29px !important
        }

        .u-padding-top-62 {
            padding-top: 29px !important
        }

        .u-m-r-62 {
            margin-right: 29px !important
        }

        .u-p-r-62 {
            padding-right: 29px !important
        }

        .u-margin-right-62 {
            margin-right: 29px !important
        }

        .u-padding-right-62 {
            padding-right: 29px !important
        }

        .u-m-b-62 {
            margin-bottom: 29px !important
        }

        .u-p-b-62 {
            padding-bottom: 29px !important
        }

        .u-margin-bottom-62 {
            margin-bottom: 29px !important
        }

        .u-padding-bottom-62 {
            padding-bottom: 29px !important
        }

        .u-margin-64,
        .u-m-64 {
            margin: 30px !important
        }

        .u-padding-64,
        .u-p-64 {
            padding: 30px !important
        }

        .u-m-l-64 {
            margin-left: 30px !important
        }

        .u-p-l-64 {
            padding-left: 30px !important
        }

        .u-margin-left-64 {
            margin-left: 30px !important
        }

        .u-padding-left-64 {
            padding-left: 30px !important
        }

        .u-m-t-64 {
            margin-top: 30px !important
        }

        .u-p-t-64 {
            padding-top: 30px !important
        }

        .u-margin-top-64 {
            margin-top: 30px !important
        }

        .u-padding-top-64 {
            padding-top: 30px !important
        }

        .u-m-r-64 {
            margin-right: 30px !important
        }

        .u-p-r-64 {
            padding-right: 30px !important
        }

        .u-margin-right-64 {
            margin-right: 30px !important
        }

        .u-padding-right-64 {
            padding-right: 30px !important
        }

        .u-m-b-64 {
            margin-bottom: 30px !important
        }

        .u-p-b-64 {
            padding-bottom: 30px !important
        }

        .u-margin-bottom-64 {
            margin-bottom: 30px !important
        }

        .u-padding-bottom-64 {
            padding-bottom: 30px !important
        }

        .u-margin-65,
        .u-m-65 {
            margin: 31px !important
        }

        .u-padding-65,
        .u-p-65 {
            padding: 31px !important
        }

        .u-m-l-65 {
            margin-left: 31px !important
        }

        .u-p-l-65 {
            padding-left: 31px !important
        }

        .u-margin-left-65 {
            margin-left: 31px !important
        }

        .u-padding-left-65 {
            padding-left: 31px !important
        }

        .u-m-t-65 {
            margin-top: 31px !important
        }

        .u-p-t-65 {
            padding-top: 31px !important
        }

        .u-margin-top-65 {
            margin-top: 31px !important
        }

        .u-padding-top-65 {
            padding-top: 31px !important
        }

        .u-m-r-65 {
            margin-right: 31px !important
        }

        .u-p-r-65 {
            padding-right: 31px !important
        }

        .u-margin-right-65 {
            margin-right: 31px !important
        }

        .u-padding-right-65 {
            padding-right: 31px !important
        }

        .u-m-b-65 {
            margin-bottom: 31px !important
        }

        .u-p-b-65 {
            padding-bottom: 31px !important
        }

        .u-margin-bottom-65 {
            margin-bottom: 31px !important
        }

        .u-padding-bottom-65 {
            padding-bottom: 31px !important
        }

        .u-margin-66,
        .u-m-66 {
            margin: 31px !important
        }

        .u-padding-66,
        .u-p-66 {
            padding: 31px !important
        }

        .u-m-l-66 {
            margin-left: 31px !important
        }

        .u-p-l-66 {
            padding-left: 31px !important
        }

        .u-margin-left-66 {
            margin-left: 31px !important
        }

        .u-padding-left-66 {
            padding-left: 31px !important
        }

        .u-m-t-66 {
            margin-top: 31px !important
        }

        .u-p-t-66 {
            padding-top: 31px !important
        }

        .u-margin-top-66 {
            margin-top: 31px !important
        }

        .u-padding-top-66 {
            padding-top: 31px !important
        }

        .u-m-r-66 {
            margin-right: 31px !important
        }

        .u-p-r-66 {
            padding-right: 31px !important
        }

        .u-margin-right-66 {
            margin-right: 31px !important
        }

        .u-padding-right-66 {
            padding-right: 31px !important
        }

        .u-m-b-66 {
            margin-bottom: 31px !important
        }

        .u-p-b-66 {
            padding-bottom: 31px !important
        }

        .u-margin-bottom-66 {
            margin-bottom: 31px !important
        }

        .u-padding-bottom-66 {
            padding-bottom: 31px !important
        }

        .u-margin-68,
        .u-m-68 {
            margin: 32px !important
        }

        .u-padding-68,
        .u-p-68 {
            padding: 32px !important
        }

        .u-m-l-68 {
            margin-left: 32px !important
        }

        .u-p-l-68 {
            padding-left: 32px !important
        }

        .u-margin-left-68 {
            margin-left: 32px !important
        }

        .u-padding-left-68 {
            padding-left: 32px !important
        }

        .u-m-t-68 {
            margin-top: 32px !important
        }

        .u-p-t-68 {
            padding-top: 32px !important
        }

        .u-margin-top-68 {
            margin-top: 32px !important
        }

        .u-padding-top-68 {
            padding-top: 32px !important
        }

        .u-m-r-68 {
            margin-right: 32px !important
        }

        .u-p-r-68 {
            padding-right: 32px !important
        }

        .u-margin-right-68 {
            margin-right: 32px !important
        }

        .u-padding-right-68 {
            padding-right: 32px !important
        }

        .u-m-b-68 {
            margin-bottom: 32px !important
        }

        .u-p-b-68 {
            padding-bottom: 32px !important
        }

        .u-margin-bottom-68 {
            margin-bottom: 32px !important
        }

        .u-padding-bottom-68 {
            padding-bottom: 32px !important
        }

        .u-margin-70,
        .u-m-70 {
            margin: 33px !important
        }

        .u-padding-70,
        .u-p-70 {
            padding: 33px !important
        }

        .u-m-l-70 {
            margin-left: 33px !important
        }

        .u-p-l-70 {
            padding-left: 33px !important
        }

        .u-margin-left-70 {
            margin-left: 33px !important
        }

        .u-padding-left-70 {
            padding-left: 33px !important
        }

        .u-m-t-70 {
            margin-top: 33px !important
        }

        .u-p-t-70 {
            padding-top: 33px !important
        }

        .u-margin-top-70 {
            margin-top: 33px !important
        }

        .u-padding-top-70 {
            padding-top: 33px !important
        }

        .u-m-r-70 {
            margin-right: 33px !important
        }

        .u-p-r-70 {
            padding-right: 33px !important
        }

        .u-margin-right-70 {
            margin-right: 33px !important
        }

        .u-padding-right-70 {
            padding-right: 33px !important
        }

        .u-m-b-70 {
            margin-bottom: 33px !important
        }

        .u-p-b-70 {
            padding-bottom: 33px !important
        }

        .u-margin-bottom-70 {
            margin-bottom: 33px !important
        }

        .u-padding-bottom-70 {
            padding-bottom: 33px !important
        }

        .u-margin-72,
        .u-m-72 {
            margin: 34px !important
        }

        .u-padding-72,
        .u-p-72 {
            padding: 34px !important
        }

        .u-m-l-72 {
            margin-left: 34px !important
        }

        .u-p-l-72 {
            padding-left: 34px !important
        }

        .u-margin-left-72 {
            margin-left: 34px !important
        }

        .u-padding-left-72 {
            padding-left: 34px !important
        }

        .u-m-t-72 {
            margin-top: 34px !important
        }

        .u-p-t-72 {
            padding-top: 34px !important
        }

        .u-margin-top-72 {
            margin-top: 34px !important
        }

        .u-padding-top-72 {
            padding-top: 34px !important
        }

        .u-m-r-72 {
            margin-right: 34px !important
        }

        .u-p-r-72 {
            padding-right: 34px !important
        }

        .u-margin-right-72 {
            margin-right: 34px !important
        }

        .u-padding-right-72 {
            padding-right: 34px !important
        }

        .u-m-b-72 {
            margin-bottom: 34px !important
        }

        .u-p-b-72 {
            padding-bottom: 34px !important
        }

        .u-margin-bottom-72 {
            margin-bottom: 34px !important
        }

        .u-padding-bottom-72 {
            padding-bottom: 34px !important
        }

        .u-margin-74,
        .u-m-74 {
            margin: 35px !important
        }

        .u-padding-74,
        .u-p-74 {
            padding: 35px !important
        }

        .u-m-l-74 {
            margin-left: 35px !important
        }

        .u-p-l-74 {
            padding-left: 35px !important
        }

        .u-margin-left-74 {
            margin-left: 35px !important
        }

        .u-padding-left-74 {
            padding-left: 35px !important
        }

        .u-m-t-74 {
            margin-top: 35px !important
        }

        .u-p-t-74 {
            padding-top: 35px !important
        }

        .u-margin-top-74 {
            margin-top: 35px !important
        }

        .u-padding-top-74 {
            padding-top: 35px !important
        }

        .u-m-r-74 {
            margin-right: 35px !important
        }

        .u-p-r-74 {
            padding-right: 35px !important
        }

        .u-margin-right-74 {
            margin-right: 35px !important
        }

        .u-padding-right-74 {
            padding-right: 35px !important
        }

        .u-m-b-74 {
            margin-bottom: 35px !important
        }

        .u-p-b-74 {
            padding-bottom: 35px !important
        }

        .u-margin-bottom-74 {
            margin-bottom: 35px !important
        }

        .u-padding-bottom-74 {
            padding-bottom: 35px !important
        }

        .u-margin-75,
        .u-m-75 {
            margin: 36px !important
        }

        .u-padding-75,
        .u-p-75 {
            padding: 36px !important
        }

        .u-m-l-75 {
            margin-left: 36px !important
        }

        .u-p-l-75 {
            padding-left: 36px !important
        }

        .u-margin-left-75 {
            margin-left: 36px !important
        }

        .u-padding-left-75 {
            padding-left: 36px !important
        }

        .u-m-t-75 {
            margin-top: 36px !important
        }

        .u-p-t-75 {
            padding-top: 36px !important
        }

        .u-margin-top-75 {
            margin-top: 36px !important
        }

        .u-padding-top-75 {
            padding-top: 36px !important
        }

        .u-m-r-75 {
            margin-right: 36px !important
        }

        .u-p-r-75 {
            padding-right: 36px !important
        }

        .u-margin-right-75 {
            margin-right: 36px !important
        }

        .u-padding-right-75 {
            padding-right: 36px !important
        }

        .u-m-b-75 {
            margin-bottom: 36px !important
        }

        .u-p-b-75 {
            padding-bottom: 36px !important
        }

        .u-margin-bottom-75 {
            margin-bottom: 36px !important
        }

        .u-padding-bottom-75 {
            padding-bottom: 36px !important
        }

        .u-margin-76,
        .u-m-76 {
            margin: 36px !important
        }

        .u-padding-76,
        .u-p-76 {
            padding: 36px !important
        }

        .u-m-l-76 {
            margin-left: 36px !important
        }

        .u-p-l-76 {
            padding-left: 36px !important
        }

        .u-margin-left-76 {
            margin-left: 36px !important
        }

        .u-padding-left-76 {
            padding-left: 36px !important
        }

        .u-m-t-76 {
            margin-top: 36px !important
        }

        .u-p-t-76 {
            padding-top: 36px !important
        }

        .u-margin-top-76 {
            margin-top: 36px !important
        }

        .u-padding-top-76 {
            padding-top: 36px !important
        }

        .u-m-r-76 {
            margin-right: 36px !important
        }

        .u-p-r-76 {
            padding-right: 36px !important
        }

        .u-margin-right-76 {
            margin-right: 36px !important
        }

        .u-padding-right-76 {
            padding-right: 36px !important
        }

        .u-m-b-76 {
            margin-bottom: 36px !important
        }

        .u-p-b-76 {
            padding-bottom: 36px !important
        }

        .u-margin-bottom-76 {
            margin-bottom: 36px !important
        }

        .u-padding-bottom-76 {
            padding-bottom: 36px !important
        }

        .u-margin-78,
        .u-m-78 {
            margin: 37px !important
        }

        .u-padding-78,
        .u-p-78 {
            padding: 37px !important
        }

        .u-m-l-78 {
            margin-left: 37px !important
        }

        .u-p-l-78 {
            padding-left: 37px !important
        }

        .u-margin-left-78 {
            margin-left: 37px !important
        }

        .u-padding-left-78 {
            padding-left: 37px !important
        }

        .u-m-t-78 {
            margin-top: 37px !important
        }

        .u-p-t-78 {
            padding-top: 37px !important
        }

        .u-margin-top-78 {
            margin-top: 37px !important
        }

        .u-padding-top-78 {
            padding-top: 37px !important
        }

        .u-m-r-78 {
            margin-right: 37px !important
        }

        .u-p-r-78 {
            padding-right: 37px !important
        }

        .u-margin-right-78 {
            margin-right: 37px !important
        }

        .u-padding-right-78 {
            padding-right: 37px !important
        }

        .u-m-b-78 {
            margin-bottom: 37px !important
        }

        .u-p-b-78 {
            padding-bottom: 37px !important
        }

        .u-margin-bottom-78 {
            margin-bottom: 37px !important
        }

        .u-padding-bottom-78 {
            padding-bottom: 37px !important
        }

        .u-margin-80,
        .u-m-80 {
            margin: 38px !important
        }

        .u-padding-80,
        .u-p-80 {
            padding: 38px !important
        }

        .u-m-l-80 {
            margin-left: 38px !important
        }

        .u-p-l-80 {
            padding-left: 38px !important
        }

        .u-margin-left-80 {
            margin-left: 38px !important
        }

        .u-padding-left-80 {
            padding-left: 38px !important
        }

        .u-m-t-80 {
            margin-top: 38px !important
        }

        .u-p-t-80 {
            padding-top: 38px !important
        }

        .u-margin-top-80 {
            margin-top: 38px !important
        }

        .u-padding-top-80 {
            padding-top: 38px !important
        }

        .u-m-r-80 {
            margin-right: 38px !important
        }

        .u-p-r-80 {
            padding-right: 38px !important
        }

        .u-margin-right-80 {
            margin-right: 38px !important
        }

        .u-padding-right-80 {
            padding-right: 38px !important
        }

        .u-m-b-80 {
            margin-bottom: 38px !important
        }

        .u-p-b-80 {
            padding-bottom: 38px !important
        }

        .u-margin-bottom-80 {
            margin-bottom: 38px !important
        }

        .u-padding-bottom-80 {
            padding-bottom: 38px !important
        }

        .u-reset-nvue {
            flex-direction: row;
            align-items: center
        }

        .u-type-primary-light {
            color: #ecf5ff
        }

        .u-type-warning-light {
            color: #fdf6ec
        }

        .u-type-success-light {
            color: #dbf1e1
        }

        .u-type-error-light {
            color: #fef0f0
        }

        .u-type-info-light {
            color: #f4f4f5
        }

        .u-type-primary-light-bg {
            background-color: #ecf5ff
        }

        .u-type-warning-light-bg {
            background-color: #fdf6ec
        }

        .u-type-success-light-bg {
            background-color: #dbf1e1
        }

        .u-type-error-light-bg {
            background-color: #fef0f0
        }

        .u-type-info-light-bg {
            background-color: #f4f4f5
        }

        .u-type-primary-dark {
            color: #2b85e4
        }

        .u-type-warning-dark {
            color: #f29100
        }

        .u-type-success-dark {
            color: #18b566
        }

        .u-type-error-dark {
            color: #dd6161
        }

        .u-type-info-dark {
            color: #82848a
        }

        .u-type-primary-dark-bg {
            background-color: #2b85e4
        }

        .u-type-warning-dark-bg {
            background-color: #f29100
        }

        .u-type-success-dark-bg {
            background-color: #18b566
        }

        .u-type-error-dark-bg {
            background-color: #dd6161
        }

        .u-type-info-dark-bg {
            background-color: #82848a
        }

        .u-type-primary-disabled {
            color: #a0cfff
        }

        .u-type-warning-disabled {
            color: #fcbd71
        }

        .u-type-success-disabled {
            color: #71d5a1
        }

        .u-type-error-disabled {
            color: #fab6b6
        }

        .u-type-info-disabled {
            color: #c8c9cc
        }

        .u-type-primary {
            color: #2979ff
        }

        .u-type-warning {
            color: #f90
        }

        .u-type-success {
            color: #19be6b
        }

        .u-type-error {
            color: #fa3534
        }

        .u-type-info {
            color: #909399
        }

        .u-type-primary-bg {
            background-color: #2979ff
        }

        .u-type-warning-bg {
            background-color: #f90
        }

        .u-type-success-bg {
            background-color: #19be6b
        }

        .u-type-error-bg {
            background-color: #fa3534
        }

        .u-type-info-bg {
            background-color: #909399
        }

        .u-main-color {
            color: #303133
        }

        .u-content-color {
            color: #606266
        }

        .u-tips-color {
            color: #909399
        }

        .u-light-color {
            color: #c0c4cc
        }

        uni-page-body {
            color: #303133;
            font-size: 13px
        }

        /* start--去除webkit的默认样式--start */
        .u-fix-ios-appearance {
            -webkit-appearance: none
        }

        /* end--去除webkit的默认样式--end */
        /* start--icon图标外层套一个view，让其达到更好的垂直居中的效果--start */
        .u-icon-wrap {
            display: flex;
            align-items: center
        }

        /* end-icon图标外层套一个view，让其达到更好的垂直居中的效果--end */
        /* start--iPhoneX底部安全区定义--start */
        .safe-area-inset-bottom {
            padding-bottom: 0;
            padding-bottom: constant(safe-area-inset-bottom);
            padding-bottom: env(safe-area-inset-bottom)
        }

        /* end-iPhoneX底部安全区定义--end */
        /* start--各种hover点击反馈相关的类名-start */
        .u-hover-class {
            opacity: .6
        }

        .u-cell-hover {
            background-color: #f7f8f9 !important
        }

        /* end--各种hover点击反馈相关的类名--end */
        /* start--文本行数限制--start */
        .u-line-1 {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .u-line-2 {
            -webkit-line-clamp: 2
        }

        .u-line-3 {
            -webkit-line-clamp: 3
        }

        .u-line-4 {
            -webkit-line-clamp: 4
        }

        .u-line-5 {
            -webkit-line-clamp: 5
        }

        .u-line-2,
        .u-line-3,
        .u-line-4,
        .u-line-5 {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical
        }

        /* end--文本行数限制--end */
        /* start--Retina 屏幕下的 1px 边框--start */
        .u-border,
        .u-border-bottom,
        .u-border-left,
        .u-border-right,
        .u-border-top,
        .u-border-top-bottom {
            position: relative
        }

        .u-border-bottom:after,
        .u-border-left:after,
        .u-border-right:after,
        .u-border-top-bottom:after,
        .u-border-top:after,
        .u-border:after {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            box-sizing: border-box;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            width: 199.8%;
            height: 199.7%;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            border: 0 solid #e4e7ed;
            z-index: 2
        }

        .u-border-top:after {
            border-top-width: 1px
        }

        .u-border-left:after {
            border-left-width: 1px
        }

        .u-border-right:after {
            border-right-width: 1px
        }

        .u-border-bottom:after {
            border-bottom-width: 1px
        }

        .u-border-top-bottom:after {
            border-width: 1px 0
        }

        .u-border:after {
            border-width: 1px
        }

        /* end--Retina 屏幕下的 1px 边框--end */
        /* start--clearfix--start */
        .u-clearfix:after,
        .clearfix:after {
            content: "";
            display: table;
            clear: both
        }

        /* end--clearfix--end */
        /* start--高斯模糊tabbar底部处理--start */
        .u-blur-effect-inset {
            width: 360px;
            height: var(--window-bottom);
            background-color: #fff
        }

        /* end--高斯模糊tabbar底部处理--end */
        /* start--提升H5端uni.toast()的层级，避免被uView的modal等遮盖--start */
        uni-toast {
            z-index: 10090
        }

        uni-toast .uni-toast {
            z-index: 10090
        }

        /* end--提升H5端uni.toast()的层级，避免被uView的modal等遮盖--end */
        /* start--去除button的所有默认样式--start */
        .u-reset-button {
            padding: 0;
            font-size: inherit;
            line-height: inherit;
            background-color: initial;
            color: inherit
        }

        .u-reset-button::after {
            border: none
        }

        /* end--去除button的所有默认样式--end */
        /* H5的时候，隐藏滚动条 */
        ::-webkit-scrollbar {
            display: none;
            width: 0 !important;
            height: 0 !important;
            -webkit-appearance: none;
            background: transparent
        }

        @font-face {
            font-family: GlikerBold;
            src: url(/static/GlikerBold.ttf) format("truetype")
        }

        @font-face {
            font-family: Helvetica;
            src: url(/static/Helvetica.ttf) format("truetype")
        }

        .styleN0 uni-view {
            font-family: Helvetica, sans-serif
        }

        .styleN1 uni-view {
            font-family: Helvetica, sans-serif
        }

        .styleN2 uni-view {
            font-family: KohinoorBangla
        }

        .GlikerBold {
            font-family: GlikerBold, sans-serif !important
        }

        .Helvetica {
            font-family: Helvetica, sans-serif
        }

        .PingFangSC {
            font-family: PingFangSC, PingFang SC
        }

        .tra_icon_ {
            width: 86px;
            height: 86px;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 99
        }

        uni-page-body {
            background-color: var(--page, #fff) !important;
            font-size: 13px
        }

        body {
            background-color: var(--page, #fff) !important
        }

        uni-page {
            background-color: var(--page, #fff) !important
        }

        uni-page-body {
            background-color: var(--page, #fff) !important
        }

        uni-image {
            display: inline-block
        }

        uni-view {
            display: block
        }

        uni-view,
        uni-text {
            box-sizing: border-box
        }

        ::-webkit-scrollbar {
            display: none;
            width: 0 !important;
            height: 0 !important;
            -webkit-appearance: none;
            background: transparent
        }

        .u-fix-ios-appearance {
            -webkit-appearance: none
        }

        .safe-area-inset-bottom {
            padding-bottom: 0;
            padding-bottom: constant(safe-area-inset-bottom);
            padding-bottom: env(safe-area-inset-bottom)
        }
    </style>



    <style type="text/css">
        .uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"]~uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }
    </style>
    <style type="text/css">
        .uni-transition[data-v-4393e7c5] {
            transition-timing-function: ease;
            transition-duration: .3s;
            transition-property: opacity, -webkit-transform;
            transition-property: transform, opacity;
            transition-property: transform, opacity, -webkit-transform
        }

        .fade-in[data-v-4393e7c5] {
            opacity: 0
        }

        .fade-active[data-v-4393e7c5] {
            opacity: 1
        }

        .slide-top-in[data-v-4393e7c5] {
            /* transition-property: transform, opacity; */
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%)
        }

        .slide-top-active[data-v-4393e7c5] {
            -webkit-transform: translateY(0);
            transform: translateY(0)
                /* opacity: 1; */
        }

        .slide-right-in[data-v-4393e7c5] {
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        .slide-right-active[data-v-4393e7c5] {
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .slide-bottom-in[data-v-4393e7c5] {
            -webkit-transform: translateY(100%);
            transform: translateY(100%)
        }

        .slide-bottom-active[data-v-4393e7c5] {
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .slide-left-in[data-v-4393e7c5] {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%)
        }

        .slide-left-active[data-v-4393e7c5] {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1
        }

        .zoom-in-in[data-v-4393e7c5] {
            -webkit-transform: scale(.8);
            transform: scale(.8)
        }

        .zoom-out-active[data-v-4393e7c5] {
            -webkit-transform: scale(1);
            transform: scale(1)
        }

        .zoom-out-in[data-v-4393e7c5] {
            -webkit-transform: scale(1.2);
            transform: scale(1.2)
        }
    </style>
    <style type="text/css">
        @charset "UTF-8";

        .uni-popup[data-v-37fc548c] {
            position: fixed;
            z-index: 99
        }

        .uni-popup__mask[data-v-37fc548c] {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, .4);
            opacity: 0
        }

        .mask-ani[data-v-37fc548c] {
            transition-property: opacity;
            transition-duration: .2s
        }

        .uni-top-mask[data-v-37fc548c] {
            opacity: 1
        }

        .uni-bottom-mask[data-v-37fc548c] {
            opacity: 1
        }

        .uni-center-mask[data-v-37fc548c] {
            opacity: 1
        }

        .uni-popup__wrapper[data-v-37fc548c] {
            display: block;
            position: absolute
        }

        .top[data-v-37fc548c] {
            top: var(--window-top);
        }

        .bottom[data-v-37fc548c] {
            bottom: 0
        }

        .uni-popup__wrapper-box[data-v-37fc548c] {
            display: block;
            position: relative;
            /* iphonex 等安全区设置，底部安全区适配 */
            padding-bottom: constant(safe-area-inset-bottom);
            padding-bottom: env(safe-area-inset-bottom)
        }

        .content-ani[data-v-37fc548c] {
            transition-property: opacity, -webkit-transform;
            transition-property: transform, opacity;
            transition-property: transform, opacity, -webkit-transform;
            transition-duration: .2s
        }

        .uni-top-content[data-v-37fc548c] {
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .uni-bottom-content[data-v-37fc548c] {
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .uni-center-content[data-v-37fc548c] {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1
        }
    </style>
    <style type="text/css">
        @charset "UTF-8";

        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        /* 文字尺寸 */
        .conview[data-v-737de4f6] {
            background-color: var(--page, #fff)
        }

        .botline[data-v-737de4f6] {
            width: 34px;
            height: 2px;
            color: #4c63c1;
            border-radius: 26px
        }

        .zkline1[data-v-737de4f6] {
            width: 100%;
            height: 1px;
            background: #f7f7fa
        }

        .zkline2[data-v-737de4f6] {
            width: 100%;
            height: 2px;
            background: #f7f7fa
        }

        /* 边距 */
        /* 图片尺寸 */
        /* 颜色变量 */
        .aclffffff[data-v-737de4f6] {
            color: #fff
        }

        .tipsSH[data-v-737de4f6] {
            background: linear-gradient(135deg, red, #ffb17d) !important;
            color: #fff !important
        }

        .tipsHK[data-v-737de4f6] {
            background: linear-gradient(143deg, #f70, #ffc47d) !important;
            color: #fff !important
        }

        .tipsUS[data-v-737de4f6] {
            background: linear-gradient(135deg, #09f, #7dedff) !important;
            color: #fff !important
        }

        .par[data-v-737de4f6] {
            height: 4px;
            background: #f7f7fa;
            margin-top: 9px
        }

        .zkimg1[data-v-737de4f6] {
            height: 30px;
            width: 30px
        }

        .zkimg2[data-v-737de4f6] {
            height: 14px !important;
            width: 14px !important
        }

        .zkimg3[data-v-737de4f6] {
            height: 26px;
            width: 26px
        }

        .zkimg4[data-v-737de4f6] {
            height: 34px;
            width: 34px
        }

        .zkimg5[data-v-737de4f6] {
            height: 19px;
            width: 19px
        }

        .img24[data-v-737de4f6] {
            height: 23px !important;
            width: 23px !important
        }

        .img16[data-v-737de4f6] {
            height: 15px;
            width: 15px
        }

        .img36[data-v-737de4f6] {
            height: 17px;
            width: 17px
        }

        .text_en[data-v-737de4f6] {
            font-size: 10px !important
        }

        .bigpd[data-v-737de4f6] {
            padding: 0 20px;
            width: 100%;
            min-height: 100vh;
            background-color: var(--page, #fff)
        }

        .blue_contain[data-v-737de4f6] {
            background-color: var(--page, #fff)
        }

        .bigmg[data-v-737de4f6] {
            margin: 20px
        }

        .mgt20[data-v-737de4f6] {
            margin-top: 19px
        }

        .bigbtn[data-v-737de4f6] {
            height: 38px;
            font-size: 15px
        }

        .smallbtn[data-v-737de4f6] {
            height: 28px;
            font-size: 15px
        }

        .loginun[data-v-737de4f6] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #373737;
            box-shadow: 0 3px 6px #dfdfdf;
            border-radius: 22px;
            font-size: 15px;
            font-weight: 500;
            color: #fff
        }

        .loginsele[data-v-737de4f6] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #5370e5;
            box-shadow: 0 2px 5px #b7c5ff;
            border-radius: 40px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 38px;
            text-align: center
        }

        .buttonsele[data-v-737de4f6] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #537ed1;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 57px
        }

        .bdtab[data-v-737de4f6] {
            display: flex;
            flex-direction: row;
            white-space: nowrap
        }

        .bdtab .bdtab_i[data-v-737de4f6] {
            display: inline-block;
            flex-wrap: nowrap;
            margin: 9px
        }

        .bdtab .bdtab_isele[data-v-737de4f6] {
            font-size: 13px;
            color: #000;
            background-color: #3f4476;
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdtab .bdtab_iun[data-v-737de4f6] {
            font-size: 13px;
            color: #999;
            opacity: .78;
            background-color: var(--page, #fff);
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdul[data-v-737de4f6] {
            padding: 0 9px;
            height: 1022px
        }

        .bdul .bdlitit[data-v-737de4f6] {
            display: flex;
            align-items: center;
            height: 34px;
            line-height: 34px;
            font-size: 11px;
            color: #000
        }

        .bdul .bdlicon[data-v-737de4f6] {
            display: flex;
            align-items: center;
            padding: 4px
        }

        .bdul .bdlicon .bdlicon_tit[data-v-737de4f6] {
            font-size: 14px;
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .bdul .bdlicon .tips1[data-v-737de4f6] {
            background-color: linear-gradient(143deg, #ff8c00, #ffc47d);
            border-radius: 3px;
            font-size: 9px;
            padding: 0 3px;
            margin-right: 4px;
            height: 17px;
            line-height: 17px
        }

        .bdul .bdlicon .tips2[data-v-737de4f6] {
            font-size: 9px;
            color: #999;
            margin-left: 3px
        }

        .bdul .bdlicon .dai[data-v-737de4f6] {
            font-size: 13px;
            color: #999
        }

        .bdul .bdlicon .bdlicon_pri[data-v-737de4f6] {
            font-size: 14px;
            color: #000;
            flex: 1
        }

        .bdul .bdlicon .zhangdie[data-v-737de4f6] {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .zhang[data-v-737de4f6] {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .die[data-v-737de4f6] {
            font-size: 14px;
            color: #00ce60;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .inpname[data-v-737de4f6] {
            margin-right: 9px;
            font-size: 13px;
            color: #000;
            padding: 9px 0 9px 0
        }

        .inp[data-v-737de4f6] {
            display: flex;
            align-items: center;
            height: 46px;
            width: 100%;
            padding: 0 9px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(208, 211, 226, .38);
            border-radius: 20px
        }

        .inpval[data-v-737de4f6] {
            font-size: 13px;
            color: #000;
            width: 100%
        }

        .inpplace[data-v-737de4f6] {
            font-size: 13px;
            color: #ccc
        }

        .code_text[data-v-737de4f6] {
            width: 76px;
            color: #000
        }

        .logininp[data-v-737de4f6] {
            margin-top: 14px;
            display: flex;
            align-items: center;
            height: 33px;
            width: 100%;
            border-bottom: 1px solid #979797
        }

        .loginbot[data-v-737de4f6] {
            display: flex;
            justify-content: space-between;
            margin-top: 19px;
            color: #4c63c1;
            font-size: 13px
        }

        .loginbotfix[data-v-737de4f6] {
            font-size: 11px;
            color: #000;
            bottom: 48px;
            left: 16px;
            width: calc(100% - 33px)
        }

        ._bottom[data-v-737de4f6] {
            position: absolute;
            bottom: 28px;
            left: 16px
        }

        .language[data-v-737de4f6] {
            float: right;
            color: #3a87f8
        }

        .loginbottext[data-v-737de4f6] {
            font-size: 11px;
            color: #4c63c1
        }

        .loginback[data-v-737de4f6] {
            color: #999990;
            margin-top: 14px
        }

        .status_bar[data-v-737de4f6] {
            background-color: var(--page, #fff);
            width: 100%
        }

        .logintip[data-v-737de4f6] {
            padding-top: 19px;
            font-size: 24px;
            color: #000;
            font-weight: 700;
            line-height: 38px
        }

        .icon_right[data-v-737de4f6] {
            width: 11px;
            height: 11px;
            margin-right: 11px
        }

        .tips[data-v-737de4f6] {
            display: flex;
            align-items: center;
            font-size: 9px;
            color: #ae1111;
            margin-top: 4px
        }

        .clearfix[data-v-737de4f6]:after {
            /*伪元素是行内元素 正常浏览器清除浮动方法*/
            content: "";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden
        }

        /* 字体 */
        .afz06[data-v-737de4f6] {
            font-size: 5px
        }

        .afz08[data-v-737de4f6] {
            font-size: 7px
        }

        .afz09[data-v-737de4f6] {
            font-size: 8px
        }

        .afz10[data-v-737de4f6] {
            font-size: 9px !important
        }

        .afz11[data-v-737de4f6] {
            font-size: 10px
        }

        .afz12[data-v-737de4f6] {
            font-size: 11px
        }

        .afz13[data-v-737de4f6] {
            font-size: 12px
        }

        .afz14[data-v-737de4f6] {
            font-size: 13px
        }

        .afz16[data-v-737de4f6] {
            font-size: 15px
        }

        .afz18[data-v-737de4f6] {
            font-size: 17px
        }

        .afz20[data-v-737de4f6] {
            font-size: 19px
        }

        .afz22[data-v-737de4f6] {
            font-size: 21px
        }

        .afz24[data-v-737de4f6] {
            font-size: 23px
        }

        .afz26[data-v-737de4f6] {
            font-size: 24px
        }

        .afz36[data-v-737de4f6] {
            font-size: 34px
        }

        /* 行高 */
        .lineh10[data-v-737de4f6] {
            min-height: 9px;
            line-height: 9px
        }

        .lineh12[data-v-737de4f6] {
            min-height: 11px;
            line-height: 11px
        }

        .lineh16[data-v-737de4f6] {
            min-height: 15px;
            line-height: 15px
        }

        .lineh18[data-v-737de4f6] {
            min-height: 17px;
            line-height: 17px
        }

        .lineh24[data-v-737de4f6] {
            min-height: 23px;
            line-height: 23px
        }

        .lineh28[data-v-737de4f6] {
            min-height: 26px;
            line-height: 26px
        }

        .lineh32[data-v-737de4f6] {
            min-height: 30px;
            line-height: 30px
        }

        .lineh44[data-v-737de4f6] {
            min-height: 42px;
            line-height: 42px
        }

        .lineh50[data-v-737de4f6] {
            min-height: 48px;
            line-height: 48px
        }

        /* 颜色 */
        .acl000000[data-v-737de4f6] {
            color: #000
        }

        .acl585858[data-v-737de4f6] {
            color: #585858
        }

        .acl283558[data-v-737de4f6] {
            color: #283558
        }

        .acl303f69[data-v-737de4f6] {
            color: #303f69
        }

        .acl22294b[data-v-737de4f6] {
            color: #22294b
        }

        .acl3a4c80[data-v-737de4f6] {
            color: #3a4c80
        }

        .acld8d8d8[data-v-737de4f6] {
            color: #d8d8d8
        }

        .aclfdfdff[data-v-737de4f6] {
            color: #fdfdff
        }

        .aclffffff[data-v-737de4f6] {
            color: #fff
        }

        .acla2a4af[data-v-737de4f6] {
            color: #a2a4af
        }

        .acl6f6f6f[data-v-737de4f6] {
            color: #6f6f6f
        }

        .acl979797[data-v-737de4f6] {
            color: #979797
        }

        .acle2ae22[data-v-737de4f6] {
            color: #e2ae22
        }

        .aclFAB001[data-v-737de4f6] {
            color: #fab001
        }

        .acl38a3a2[data-v-737de4f6] {
            color: #38a3a2
        }

        .aclfedf93[data-v-737de4f6] {
            color: #fedf93
        }

        .aclea9424[data-v-737de4f6] {
            color: #ea9424
        }

        .acl262e55[data-v-737de4f6] {
            color: #262e55
        }

        .aclf5f5ff[data-v-737de4f6] {
            color: #f5f5ff
        }

        .acl419eff[data-v-737de4f6] {
            color: #419eff
        }

        .aclfbd993[data-v-737de4f6] {
            color: #fbd993
        }

        .acl26f296[data-v-737de4f6] {
            color: #26f296
        }

        .acl1d2431[data-v-737de4f6] {
            color: #1d2431
        }

        .acl2d3c65[data-v-737de4f6] {
            color: #2d3c65
        }

        .acl32426b[data-v-737de4f6] {
            color: #32426b
        }

        .aclced6e8[data-v-737de4f6] {
            color: #ced6e8
        }

        .aclfee093[data-v-737de4f6] {
            color: #fee093
        }

        .acl9b9b9b[data-v-737de4f6] {
            color: #9b9b9b
        }

        .acled0163[data-v-737de4f6] {
            color: #ed0163
        }

        .acl65788c[data-v-737de4f6] {
            color: #65788c
        }

        .aclffdf66[data-v-737de4f6] {
            color: #ffdf66
        }

        .acl9d9fa8[data-v-737de4f6] {
            color: #9d9fa8
        }

        .aclb4c3d3[data-v-737de4f6] {
            color: #b4c3d3
        }

        .aclafb6cc[data-v-737de4f6] {
            color: #afb6cc
        }

        .acl25bea1[data-v-737de4f6] {
            color: #25bea1
        }

        .aclffcc5d[data-v-737de4f6] {
            color: #ffcc5d
        }

        .aclff9e1a[data-v-737de4f6] {
            color: #ff9e1a
        }

        .aclfe8509[data-v-737de4f6] {
            color: #fe8509
        }

        .acl25bea1[data-v-737de4f6] {
            color: #25bea1
        }

        .aclf5428c[data-v-737de4f6] {
            color: #f5428c
        }

        .acl333333[data-v-737de4f6] {
            color: #333
        }

        .acl666666[data-v-737de4f6] {
            color: #666
        }

        .aclB8B8B8[data-v-737de4f6] {
            color: #b8b8b8
        }

        .acl999999[data-v-737de4f6] {
            color: #999
        }

        .acl9A9A9A[data-v-737de4f6] {
            color: #9a9a9a
        }

        .aclCCCCCC[data-v-737de4f6] {
            color: #ccc !important
        }

        .aclB2B2B2[data-v-737de4f6] {
            color: #b2b2b2
        }

        .acl313381[data-v-737de4f6] {
            color: #313381
        }

        .aclBBBBBB[data-v-737de4f6] {
            color: #bbb
        }

        .aclB4B4B4[data-v-737de4f6] {
            color: #b4b4b4
        }

        .acl9E9E9E[data-v-737de4f6] {
            color: #9e9e9e
        }

        .aclC1CDFF[data-v-737de4f6] {
            color: #c1cdff
        }

        .aclC8C8C8[data-v-737de4f6] {
            color: #c8c8c8
        }

        .acl252525[data-v-737de4f6] {
            color: #252525
        }

        .acl303030[data-v-737de4f6] {
            color: #303030
        }

        .aclFF3939[data-v-737de4f6] {
            color: #ff3939
        }

        .aclA8A8A8[data-v-737de4f6] {
            color: #a8a8a8
        }

        .aclF19B4F[data-v-737de4f6] {
            color: #f19b4f
        }

        .aclF5F5F5[data-v-737de4f6] {
            color: #f5f5f5
        }

        .aclC9CCD8[data-v-737de4f6] {
            color: #c9ccd8
        }

        .acl5370E5[data-v-737de4f6] {
            color: #5370e5
        }

        .aclCEDEFF[data-v-737de4f6] {
            color: #cedeff
        }

        .acl29B5E7[data-v-737de4f6] {
            color: #29b5e7
        }

        .aclA4A4A4[data-v-737de4f6] {
            color: #a4a4a4
        }

        .acl888888[data-v-737de4f6] {
            color: #888
        }

        .aclABABAB[data-v-737de4f6] {
            color: #ababab
        }

        .acl2E2E2E[data-v-737de4f6] {
            color: #2e2e2e
        }

        .acl6B6B6B[data-v-737de4f6] {
            color: #6b6b6b
        }

        .animat[data-v-737de4f6] {
            position: relative;
            animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        @keyframes mymove-data-v-737de4f6 {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        @-webkit-keyframes mymove-data-v-737de4f6 {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        .spin_ing[data-v-737de4f6] {
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 1s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 1s;
            -webkit-animation: rotate-data-v-737de4f6 3s linear infinite;
            -moz-animation: rotate-data-v-737de4f6 3s linear infinite;
            -o-animation: rotate-data-v-737de4f6 3s linear infinite;
            animation: rotate-data-v-737de4f6 3s linear infinite
        }

        @-webkit-keyframes rotate-data-v-737de4f6 {
            from {
                -webkit-transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(1turn)
            }
        }

        @-moz-keyframes rotate-data-v-737de4f6 {
            from {
                -moz-transform: rotate(0deg)
            }

            to {
                -moz-transform: rotate(359deg)
            }
        }

        @-o-keyframes rotate-data-v-737de4f6 {
            from {
                -o-transform: rotate(0deg)
            }

            to {
                -o-transform: rotate(359deg)
            }
        }

        @keyframes rotate-data-v-737de4f6 {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        .orderBuying[data-v-737de4f6] {
            color: #537ed1
        }

        .orderNopaid[data-v-737de4f6] {
            color: #d36868
        }

        .orderCancel[data-v-737de4f6] {
            color: #9b9b9b
        }

        .orderCompleted[data-v-737de4f6] {
            color: #03c087
        }

        .orderExplain[data-v-737de4f6] {
            color: #9b9b9b
        }

        /* 背景 */
        .abg283558[data-v-737de4f6] {
            background-color: #283558
        }

        .abg666666[data-v-737de4f6] {
            background-color: #666
        }

        .abg303f69[data-v-737de4f6] {
            background-color: #303f69
        }

        .abg3a4c80[data-v-737de4f6] {
            background-color: #3a4c80
        }

        .abg626e8c[data-v-737de4f6] {
            background-color: #626e8c
        }

        .abg65788c[data-v-737de4f6] {
            background-color: #65788c
        }

        .abg4e5e8c[data-v-737de4f6] {
            background-color: #4e5e8c
        }

        .abg419eff[data-v-737de4f6] {
            background-color: #419eff
        }

        .abg2a385f[data-v-737de4f6] {
            background-color: #2a385f
        }

        .abg2d3c65[data-v-737de4f6] {
            background-color: #2d3c65
        }

        .abgf5428c[data-v-737de4f6] {
            background-color: #f5428c
        }

        .abg25bea1[data-v-737de4f6] {
            background-color: #25bea1
        }

        .abg537ED1[data-v-737de4f6] {
            background-color: #537ed1
        }

        .abgD36868[data-v-737de4f6] {
            background-color: #d36868
        }

        /* start--文本行数限制--start */
        .singline[data-v-737de4f6] {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .singline4[data-v-737de4f6] {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4
        }

        .line_single[data-v-737de4f6] {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .line_two[data-v-737de4f6] {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .cursor[data-v-737de4f6] {
            cursor: pointer
        }

        .left[data-v-737de4f6] {
            text-align: left
        }

        .center[data-v-737de4f6] {
            text-align: center
        }

        .right[data-v-737de4f6] {
            text-align: right
        }

        .fontweight[data-v-737de4f6] {
            font-weight: 700
        }

        .fontweight6[data-v-737de4f6] {
            font-weight: 600
        }

        .fontweight5[data-v-737de4f6] {
            font-weight: 500
        }

        .line[data-v-737de4f6] {
            height: 1px;
            background: hsla(0, 0%, 100%, .1)
        }

        .flex_[data-v-737de4f6] {
            display: flex
        }

        .flex_row[data-v-737de4f6] {
            display: flex;
            align-items: center
        }

        .flex_row_center[data-v-737de4f6] {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center
        }

        .flex_row_between[data-v-737de4f6] {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .flex_row_left[data-v-737de4f6] {
            display: flex;
            align-items: center
        }

        .flex1center[data-v-737de4f6] {
            flex: 1;
            text-align: center
        }

        .flexauto[data-v-737de4f6] {
            flex: auto
        }

        .flex1[data-v-737de4f6] {
            flex: 1
        }

        .flex2[data-v-737de4f6] {
            flex: 2
        }

        .flex3[data-v-737de4f6] {
            flex: 3
        }

        .underline[data-v-737de4f6] {
            text-decoration: underline
        }

        .relative[data-v-737de4f6] {
            position: relative
        }

        .Block[data-v-737de4f6] {
            width: 100%;
            height: 5px;
            background: #fbfbfb
        }

        /* 宽度 */
        .alw1[data-v-737de4f6] {
            width: 1px
        }

        .alw2[data-v-737de4f6] {
            width: 1px
        }

        .alh1[data-v-737de4f6] {
            height: 1px
        }

        .alh2[data-v-737de4f6] {
            height: 1px
        }

        .abw100[data-v-737de4f6] {
            width: 48px
        }

        .abw160[data-v-737de4f6] {
            width: 76px
        }

        .abh80[data-v-737de4f6] {
            height: 38px
        }

        .abh100[data-v-737de4f6] {
            height: 48px
        }

        /* 外边距 */
        .amgl10[data-v-737de4f6] {
            margin-left: 9px
        }

        .amgl15[data-v-737de4f6] {
            margin-left: 14px
        }

        .amgr5[data-v-737de4f6] {
            margin-right: 4px
        }

        .amgr10[data-v-737de4f6] {
            margin-right: 9px
        }

        .amgr15[data-v-737de4f6] {
            margin-right: 14px
        }

        .amgt5[data-v-737de4f6] {
            margin-top: 4px
        }

        .amgt10[data-v-737de4f6] {
            margin-top: 9px
        }

        .amgt15[data-v-737de4f6] {
            margin-top: 14px
        }

        .amgb10[data-v-737de4f6] {
            margin-bottom: 9px
        }

        .amgb15[data-v-737de4f6] {
            margin-bottom: 14px
        }

        .margin10[data-v-737de4f6] {
            margin: 4px
        }

        .margin20[data-v-737de4f6] {
            margin: 9px
        }

        .marginlr20[data-v-737de4f6] {
            margin-left: 9px;
            margin-right: 9px
        }

        .marginlr30[data-v-737de4f6] {
            margin-left: 14px;
            margin-right: 14px
        }

        .margintb10[data-v-737de4f6] {
            margin-top: 4px;
            margin-bottom: 4px
        }

        .margintb20[data-v-737de4f6] {
            margin-top: 9px;
            margin-bottom: 9px
        }

        .margintb30[data-v-737de4f6] {
            margin-top: 14px;
            margin-bottom: 14px
        }

        .margintb40[data-v-737de4f6] {
            margin-top: 19px;
            margin-bottom: 19px
        }

        /* 内边距 */
        .apdl10[data-v-737de4f6] {
            padding-left: 9px
        }

        .apdl15[data-v-737de4f6] {
            padding-left: 14px
        }

        .apdr10[data-v-737de4f6] {
            padding-right: 9px
        }

        .apdr15[data-v-737de4f6] {
            padding-right: 14px
        }

        .apdt10[data-v-737de4f6] {
            padding-top: 9px
        }

        .apdt15[data-v-737de4f6] {
            padding-top: 14px
        }

        .apdb10[data-v-737de4f6] {
            padding-bottom: 9px
        }

        .apdb15[data-v-737de4f6] {
            padding-bottom: 14px
        }

        .apdl20[data-v-737de4f6] {
            padding-left: 19px
        }

        .apdl25[data-v-737de4f6] {
            padding-left: 24px
        }

        .apdl30[data-v-737de4f6] {
            padding-left: 28px
        }

        .apdr20[data-v-737de4f6] {
            padding-right: 19px
        }

        .apdr25[data-v-737de4f6] {
            padding-right: 24px
        }

        .apdr30[data-v-737de4f6] {
            padding-right: 14px
        }

        .apdt20[data-v-737de4f6] {
            padding-top: 19px
        }

        .apdt25[data-v-737de4f6] {
            padding-top: 24px
        }

        .apdt30[data-v-737de4f6] {
            padding-top: 28px
        }

        .apdb20[data-v-737de4f6] {
            padding-bottom: 19px
        }

        .apdb25[data-v-737de4f6] {
            padding-bottom: 24px
        }

        .apdb30[data-v-737de4f6] {
            padding-bottom: 28px
        }

        .padding20[data-v-737de4f6] {
            padding: 9px
        }

        .padding30[data-v-737de4f6] {
            padding: 14px
        }

        .padding36[data-v-737de4f6] {
            padding: 17px
        }

        .padding40[data-v-737de4f6] {
            padding: 19px
        }

        .padding50[data-v-737de4f6] {
            padding: 24px
        }

        .paddingtb10[data-v-737de4f6] {
            padding-top: 6px;
            padding-bottom: 6px
        }

        .paddingtb20[data-v-737de4f6] {
            padding-top: 9px;
            padding-bottom: 9px
        }

        .paddingtb40[data-v-737de4f6] {
            padding-top: 19px;
            padding-bottom: 19px
        }

        .paddinglr20[data-v-737de4f6] {
            padding-left: 9px;
            padding-right: 9px
        }

        .paddinglr40[data-v-737de4f6] {
            padding-left: 19px;
            padding-right: 19px
        }

        /* 图片大小 */
        .img12_12[data-v-737de4f6] {
            width: 11px;
            height: 11px
        }

        .img14_14[data-v-737de4f6] {
            width: 13px;
            height: 13px
        }

        .img24_24[data-v-737de4f6] {
            width: 23px;
            height: 23px
        }

        .img36_36[data-v-737de4f6] {
            width: 34px;
            height: 34px
        }

        .img8_13[data-v-737de4f6] {
            width: 7px;
            height: 12px
        }

        .img33_33[data-v-737de4f6] {
            width: 31px;
            height: 31px
        }

        .img6_6[data-v-737de4f6] {
            width: 5px;
            height: 5px
        }

        .img14_2[data-v-737de4f6] {
            width: 13px;
            height: 9px
        }

        .img17_17[data-v-737de4f6] {
            width: 16px;
            height: 16px
        }

        .img11_11[data-v-737de4f6] {
            width: 10px;
            height: 10px
        }

        /* 高与行高 */
        /* 宽高与行高 */
        /* 字体 */
        .afz08[data-v-737de4f6] {
            font-size: 7px !important
        }

        .afz10[data-v-737de4f6] {
            font-size: 9px !important
        }

        .afz11[data-v-737de4f6] {
            font-size: 10px
        }

        .afz12[data-v-737de4f6] {
            font-size: 11px
        }

        .afz13[data-v-737de4f6] {
            font-size: 12px
        }

        .afz14[data-v-737de4f6] {
            font-size: 13px
        }

        .afz15[data-v-737de4f6] {
            font-size: 14px
        }

        .afz16[data-v-737de4f6] {
            font-size: 15px
        }

        .afz18[data-v-737de4f6] {
            font-size: 17px
        }

        .afz20[data-v-737de4f6] {
            font-size: 19px
        }

        .afz22[data-v-737de4f6] {
            font-size: 21px
        }

        .afz24[data-v-737de4f6] {
            font-size: 23px
        }

        .afz25[data-v-737de4f6] {
            font-size: 24px
        }

        .afz26[data-v-737de4f6] {
            font-size: 24px
        }

        .afz28[data-v-737de4f6] {
            font-size: 26px
        }

        .afz32[data-v-737de4f6] {
            font-size: 30px
        }

        .afz36[data-v-737de4f6] {
            font-size: 34px
        }

        /* 手机端下的样式 */
        /*每个页面公共css */
        .col_666[data-v-737de4f6] {
            color: #666
        }

        .col_999[data-v-737de4f6] {
            color: #999
        }

        .col_316EDE[data-v-737de4f6] {
            color: #316ede
        }

        .f_s20[data-v-737de4f6] {
            font-size: 9px
        }

        .f_s22[data-v-737de4f6] {
            font-size: 10px
        }

        .f_s27[data-v-737de4f6] {
            font-size: 12px
        }

        .f_s29[data-v-737de4f6] {
            font-size: 13px
        }

        .f_s36[data-v-737de4f6] {
            font-size: 17px
        }

        .f_wb[data-v-737de4f6] {
            font-weight: 700
        }

        .borders[data-v-737de4f6] {
            border: 1px solid #ededed
        }

        .borderd[data-v-737de4f6] {
            border: 1px dashed #707070
        }

        .borderbottomd[data-v-737de4f6] {
            border-bottom: 1px dashed #b2b2b2
        }

        .borderbottoms[data-v-737de4f6] {
            border-bottom: 1px solid #f5f5f5
        }

        .line1[data-v-737de4f6] {
            width: 100%;
            height: 1px;
            background: #e6e6e6
        }

        .bg3BA52B[data-v-737de4f6] {
            background: #46b536;
            border-radius: 7px
        }

        .bgDF2A2A[data-v-737de4f6] {
            background: #df2a2a;
            border-radius: 7px
        }

        .zan10[data-v-737de4f6] {
            width: 100%;
            height: 4px;
            background: #f1f3f4
        }

        .arrowright[data-v-737de4f6] {
            width: 15px !important;
            height: 15px !important;
            padding: 9px !important
        }

        .arrowleft[data-v-737de4f6] {
            width: 42px;
            padding: 9px
        }

        .lishi[data-v-737de4f6] {
            width: 42px;
            height: 42px;
            padding: 9px
        }

        .myiconimg[data-v-737de4f6] {
            width: 23px;
            height: 23px;
            color: #999
        }

        .mytipimg[data-v-737de4f6] {
            width: 42px;
            height: 42px
        }

        .bgwhite[data-v-737de4f6] {
            background: #fff
        }

        .lii_up[data-v-737de4f6] {
            font-size: 11px;
            color: #ff5a75
        }

        .lii_down[data-v-737de4f6] {
            font-size: 11px;
            color: #00ce60
        }

        .title_v[data-v-737de4f6] {
            width: 3px;
            height: 11px;
            background: #5370e5
        }

        .sellcardbutton_l[data-v-737de4f6] {
            width: 84px;
            height: 30px;
            border: 1px solid #466ef2;
            color: #466ef2;
            border-radius: 3px
        }

        .sellcardbutton_r[data-v-737de4f6] {
            width: 84px;
            height: 30px;
            background: #466ef2;
            border-radius: 3px
        }

        .inputstyle1[data-v-737de4f6] {
            width: 100%;
            padding: 14px;
            min-height: 48px;
            background: #fff;
            box-shadow: 0 4px 20px 0 #d3e0e8
        }

        .styleN1[data-v-737de4f6] {
            min-height: 100vh;
            background: linear-gradient(0deg, #f8fcff 0, #e3f5ff)
        }

        .expireTimediv[data-v-737de4f6] {
            padding: 2px 6px;
            height: 24px;
            background: rgba(217, 242, 255, .59);
            border-radius: 12px
        }

        .border_b_0[data-v-737de4f6] {
            border-bottom: 1px solid #cce5f1
        }

        .img20[data-v-737de4f6] {
            width: 19px;
            height: 19px
        }

        @-webkit-keyframes spin-data-v-737de4f6 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        @keyframes spin-data-v-737de4f6 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        .element[data-v-737de4f6] {
            -webkit-animation: spin-data-v-737de4f6 3s linear infinite;
            animation: spin-data-v-737de4f6 3s linear infinite
        }

        .animation[data-v-737de4f6] {
            animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .inputstyle1[data-v-737de4f6] {
            width: 100%;
            padding: 14px;
            min-height: 48px;
            background: #fff;
            box-shadow: 0 4px 20px 0 #d3e0e8
        }

        .btndiv[data-v-737de4f6] {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 10;
            width: 100%;
            height: 86px;
            background: #fcfeff
        }

        .button_pay0[data-v-737de4f6] {
            width: 100%;
            height: 53px;
            font-family: Kodchasan;
            background: linear-gradient(to right bottom, #7cffff 0, #29b5e7 50%, #7cffff);
            animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .btn_but0[data-v-737de4f6] {
            width: 100%;
            height: 53px;
            background: #a79f9f;
            font-family: Kodchasan;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5)
        }

        .textInpdiv[data-v-737de4f6] {
            position: relative;
            margin-top: 28px
        }

        .textInpt[data-v-737de4f6] {
            padding: 0 3px;
            position: absolute;
            left: 28px;
            top: -9px;
            background: #fff
        }

        .textInp[data-v-737de4f6] {
            border: 1px solid #8d8ecb;
            border-radius: 26px;
            padding: 0 23px
        }

        .button_pay1[data-v-737de4f6] {
            position: fixed;
            bottom: 19px;
            width: 343px;
            height: 56px;
            background: #313381;
            border-radius: 26px;
            animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .btn_but1[data-v-737de4f6] {
            position: fixed;
            bottom: 19px;
            width: 343px;
            height: 56px;
            background: #a79f9f;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            border-radius: 26px
        }

        .seldev1[data-v-737de4f6] {
            width: 318px;
            overflow: hidden;
            border: 1px solid #8d8ecb;
            border-radius: 26px;
            margin-top: 9px
        }

        .topbg1[data-v-737de4f6] {
            background: url(/static/new1/topbg.png) no-repeat;
            height: 115px;
            background-size: 100% 100%
        }

        .orderAmount[data-v-737de4f6] {
            background: url(/static/new/paybg.png) no-repeat;
            background-size: 100% 100%;
            margin-top: 15px;
            height: 124px;
            margin-bottom: 19px;
            padding: 24px;
            font-family: NHaasGroteskTXPro
        }

        .btn_[data-v-737de4f6] {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-size: 100% 100%;
            height: 78px;
            left: 0
        }

        .btn_but[data-v-737de4f6] {
            width: 94px;
            height: 94px;
            background: linear-gradient(180deg, #f73c3c, #ff8300);
            border-radius: 50%;
            margin-top: -39px;
            opacity: .3
        }

        .button_pay[data-v-737de4f6] {
            width: 94px;
            height: 94px;
            background: #d32b12;
            border-radius: 50%;
            margin-top: -39px;
            position: relative;
            animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-737de4f6 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .filterdiv[data-v-737de4f6] {
            position: fixed;
            z-index: 8;
            width: 100%
        }

        .filterselect[data-v-737de4f6] {
            background: #eef1ff;
            color: #3250c9
        }

        .showdiv[data-v-737de4f6] {
            position: absolute;
            z-index: 10;
            top: 14px;
            left: 0;
            border-radius: 15px;
            overflow: hidden;
            width: 318px;
            background: #fff;
            box-shadow: 0 3px 6px rgba(208, 211, 226, .38)
        }

        .selectdiv[data-v-737de4f6] {
            height: 46px;
            background: #fff;
            border: 2px solid #d8e4ed;
            box-shadow: 0 3px 6px rgba(208, 211, 226, .38);
            opacity: 1;
            border-radius: 23px
        }

        .inputD[data-v-737de4f6] {
            height: 33px;
            background: #fff;
            border: 1px solid #707070;
            opacity: 1;
            border-radius: 9px
        }

        .collectionT[data-v-737de4f6] {
            padding: 9px;
            background: url(/static/Collection/amount.png) no-repeat;
            background-size: 100% 100%;
            height: 134px;
            border-radius: 14px;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .49)
        }

        .collectionT1[data-v-737de4f6] {
            padding: 9px;
            background-size: 100% 100%;
            border-radius: 14px;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .49)
        }

        .selTTT[data-v-737de4f6] {
            height: 53px;
            background: #000;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 12px;
            margin-top: 24px
        }

        .selTTT1[data-v-737de4f6] {
            height: 53px;
            background: #7035d1;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 12px;
            margin-top: 24px
        }

        .button_pay2[data-v-737de4f6] {
            height: 53px;
            background: #a79f9f;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 12px;
            margin-top: 24px
        }

        .selTTT2[data-v-737de4f6] {
            position: fixed;
            bottom: 38px;
            width: 327px;
            height: 53px;
            background: #7d8fb0;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 24px;
            margin-top: 24px
        }
    </style>

    <style type="text/css">
        .uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"]~uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }
    </style>
    <style type="text/css">
        @charset "UTF-8";

        /* 颜色变量 */
        /* 行为相关颜色 */
        /* 文字基本颜色 */
        /* 背景颜色 */
        /* 边框颜色 */
        /* 尺寸变量 */
        /* 文字尺寸 */
        /* 图片尺寸 */
        /* Border Radius */
        /* 水平间距 */
        /* 垂直间距 */
        /* 透明度 */
        /* 文章场景相关 */
        /* 文字尺寸 */
        .conview[data-v-6f99be09] {
            background-color: var(--page, #fff)
        }

        .botline[data-v-6f99be09] {
            width: 34px;
            height: 2px;
            color: #4c63c1;
            border-radius: 26px
        }

        .zkline1[data-v-6f99be09] {
            width: 100%;
            height: 1px;
            background: #f7f7fa
        }

        .zkline2[data-v-6f99be09] {
            width: 100%;
            height: 2px;
            background: #f7f7fa
        }

        /* 边距 */
        /* 图片尺寸 */
        /* 颜色变量 */
        .aclffffff[data-v-6f99be09] {
            color: #fff
        }

        .tipsSH[data-v-6f99be09] {
            background: linear-gradient(135deg, red, #ffb17d) !important;
            color: #fff !important
        }

        .tipsHK[data-v-6f99be09] {
            background: linear-gradient(143deg, #f70, #ffc47d) !important;
            color: #fff !important
        }

        .tipsUS[data-v-6f99be09] {
            background: linear-gradient(135deg, #09f, #7dedff) !important;
            color: #fff !important
        }

        .par[data-v-6f99be09] {
            height: 4px;
            background: #f7f7fa;
            margin-top: 9px
        }

        .zkimg1[data-v-6f99be09] {
            height: 30px;
            width: 30px
        }

        .zkimg2[data-v-6f99be09] {
            height: 14px !important;
            width: 14px !important
        }

        .zkimg3[data-v-6f99be09] {
            height: 26px;
            width: 26px
        }

        .zkimg4[data-v-6f99be09] {
            height: 34px;
            width: 34px
        }

        .zkimg5[data-v-6f99be09] {
            height: 19px;
            width: 19px
        }

        .img24[data-v-6f99be09] {
            height: 23px !important;
            width: 23px !important
        }

        .img16[data-v-6f99be09] {
            height: 15px;
            width: 15px
        }

        .img36[data-v-6f99be09] {
            height: 17px;
            width: 17px
        }

        .text_en[data-v-6f99be09] {
            font-size: 10px !important
        }

        .bigpd[data-v-6f99be09] {
            padding: 0 20px;
            width: 100%;
            min-height: 100vh;
            background-color: var(--page, #fff)
        }

        .blue_contain[data-v-6f99be09] {
            background-color: var(--page, #fff)
        }

        .bigmg[data-v-6f99be09] {
            margin: 20px
        }

        .mgt20[data-v-6f99be09] {
            margin-top: 19px
        }

        .bigbtn[data-v-6f99be09] {
            height: 38px;
            font-size: 15px
        }

        .smallbtn[data-v-6f99be09] {
            height: 28px;
            font-size: 15px
        }

        .loginun[data-v-6f99be09] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #373737;
            box-shadow: 0 3px 6px #dfdfdf;
            border-radius: 22px;
            font-size: 15px;
            font-weight: 500;
            color: #fff
        }

        .loginsele[data-v-6f99be09] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #5370e5;
            box-shadow: 0 2px 5px #b7c5ff;
            border-radius: 40px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 38px;
            text-align: center
        }

        .buttonsele[data-v-6f99be09] {
            width: 326px;
            height: 46px;
            line-height: 46px;
            background: #537ed1;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-top: 57px
        }

        .bdtab[data-v-6f99be09] {
            display: flex;
            flex-direction: row;
            white-space: nowrap
        }

        .bdtab .bdtab_i[data-v-6f99be09] {
            display: inline-block;
            flex-wrap: nowrap;
            margin: 9px
        }

        .bdtab .bdtab_isele[data-v-6f99be09] {
            font-size: 13px;
            color: #000;
            background-color: #3f4476;
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdtab .bdtab_iun[data-v-6f99be09] {
            font-size: 13px;
            color: #999;
            opacity: .78;
            background-color: var(--page, #fff);
            border-radius: 9px;
            padding: 2px 5px
        }

        .bdul[data-v-6f99be09] {
            padding: 0 9px;
            height: 1022px
        }

        .bdul .bdlitit[data-v-6f99be09] {
            display: flex;
            align-items: center;
            height: 34px;
            line-height: 34px;
            font-size: 11px;
            color: #000
        }

        .bdul .bdlicon[data-v-6f99be09] {
            display: flex;
            align-items: center;
            padding: 4px
        }

        .bdul .bdlicon .bdlicon_tit[data-v-6f99be09] {
            font-size: 14px;
            color: #000;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .bdul .bdlicon .tips1[data-v-6f99be09] {
            background-color: linear-gradient(143deg, #ff8c00, #ffc47d);
            border-radius: 3px;
            font-size: 9px;
            padding: 0 3px;
            margin-right: 4px;
            height: 17px;
            line-height: 17px
        }

        .bdul .bdlicon .tips2[data-v-6f99be09] {
            font-size: 9px;
            color: #999;
            margin-left: 3px
        }

        .bdul .bdlicon .dai[data-v-6f99be09] {
            font-size: 13px;
            color: #999
        }

        .bdul .bdlicon .bdlicon_pri[data-v-6f99be09] {
            font-size: 14px;
            color: #000;
            flex: 1
        }

        .bdul .bdlicon .zhangdie[data-v-6f99be09] {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .zhang[data-v-6f99be09] {
            font-size: 14px;
            color: #ff5a75;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .bdul .bdlicon .die[data-v-6f99be09] {
            font-size: 14px;
            color: #00ce60;
            width: 63px;
            height: 19px;
            flex: 1
        }

        .inpname[data-v-6f99be09] {
            margin-right: 9px;
            font-size: 13px;
            color: #000;
            padding: 9px 0 9px 0
        }

        .inp[data-v-6f99be09] {
            display: flex;
            align-items: center;
            height: 46px;
            width: 100%;
            padding: 0 9px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(208, 211, 226, .38);
            border-radius: 20px
        }

        .inpval[data-v-6f99be09] {
            font-size: 13px;
            color: #000;
            width: 100%
        }

        .inpplace[data-v-6f99be09] {
            font-size: 13px;
            color: #ccc
        }

        .code_text[data-v-6f99be09] {
            width: 76px;
            color: #000
        }

        .logininp[data-v-6f99be09] {
            margin-top: 14px;
            display: flex;
            align-items: center;
            height: 33px;
            width: 100%;
            border-bottom: 1px solid #979797
        }

        .loginbot[data-v-6f99be09] {
            display: flex;
            justify-content: space-between;
            margin-top: 19px;
            color: #4c63c1;
            font-size: 13px
        }

        .loginbotfix[data-v-6f99be09] {
            font-size: 11px;
            color: #000;
            bottom: 48px;
            left: 16px;
            width: calc(100% - 33px)
        }

        ._bottom[data-v-6f99be09] {
            position: absolute;
            bottom: 28px;
            left: 16px
        }

        .language[data-v-6f99be09] {
            float: right;
            color: #3a87f8
        }

        .loginbottext[data-v-6f99be09] {
            font-size: 11px;
            color: #4c63c1
        }

        .loginback[data-v-6f99be09] {
            color: #999990;
            margin-top: 14px
        }

        .status_bar[data-v-6f99be09] {
            background-color: var(--page, #fff);
            width: 100%
        }

        .logintip[data-v-6f99be09] {
            padding-top: 19px;
            font-size: 24px;
            color: #000;
            font-weight: 700;
            line-height: 38px
        }

        .icon_right[data-v-6f99be09] {
            width: 11px;
            height: 11px;
            margin-right: 11px
        }

        .tips[data-v-6f99be09] {
            display: flex;
            align-items: center;
            font-size: 9px;
            color: #ae1111;
            margin-top: 4px
        }

        .clearfix[data-v-6f99be09]:after {
            /*伪元素是行内元素 正常浏览器清除浮动方法*/
            content: "";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden
        }

        /* 字体 */
        .afz06[data-v-6f99be09] {
            font-size: 5px
        }

        .afz08[data-v-6f99be09] {
            font-size: 7px
        }

        .afz09[data-v-6f99be09] {
            font-size: 8px
        }

        .afz10[data-v-6f99be09] {
            font-size: 9px !important
        }

        .afz11[data-v-6f99be09] {
            font-size: 10px
        }

        .afz12[data-v-6f99be09] {
            font-size: 11px
        }

        .afz13[data-v-6f99be09] {
            font-size: 12px
        }

        .afz14[data-v-6f99be09] {
            font-size: 13px
        }

        .afz16[data-v-6f99be09] {
            font-size: 15px
        }

        .afz18[data-v-6f99be09] {
            font-size: 17px
        }

        .afz20[data-v-6f99be09] {
            font-size: 19px
        }

        .afz22[data-v-6f99be09] {
            font-size: 21px
        }

        .afz24[data-v-6f99be09] {
            font-size: 23px
        }

        .afz26[data-v-6f99be09] {
            font-size: 24px
        }

        .afz36[data-v-6f99be09] {
            font-size: 34px
        }

        /* 行高 */
        .lineh10[data-v-6f99be09] {
            min-height: 9px;
            line-height: 9px
        }

        .lineh12[data-v-6f99be09] {
            min-height: 11px;
            line-height: 11px
        }

        .lineh16[data-v-6f99be09] {
            min-height: 15px;
            line-height: 15px
        }

        .lineh18[data-v-6f99be09] {
            min-height: 17px;
            line-height: 17px
        }

        .lineh24[data-v-6f99be09] {
            min-height: 23px;
            line-height: 23px
        }

        .lineh28[data-v-6f99be09] {
            min-height: 26px;
            line-height: 26px
        }

        .lineh32[data-v-6f99be09] {
            min-height: 30px;
            line-height: 30px
        }

        .lineh44[data-v-6f99be09] {
            min-height: 42px;
            line-height: 42px
        }

        .lineh50[data-v-6f99be09] {
            min-height: 48px;
            line-height: 48px
        }

        /* 颜色 */
        .acl000000[data-v-6f99be09] {
            color: #000
        }

        .acl585858[data-v-6f99be09] {
            color: #585858
        }

        .acl283558[data-v-6f99be09] {
            color: #283558
        }

        .acl303f69[data-v-6f99be09] {
            color: #303f69
        }

        .acl22294b[data-v-6f99be09] {
            color: #22294b
        }

        .acl3a4c80[data-v-6f99be09] {
            color: #3a4c80
        }

        .acld8d8d8[data-v-6f99be09] {
            color: #d8d8d8
        }

        .aclfdfdff[data-v-6f99be09] {
            color: #fdfdff
        }

        .aclffffff[data-v-6f99be09] {
            color: #fff
        }

        .acla2a4af[data-v-6f99be09] {
            color: #a2a4af
        }

        .acl6f6f6f[data-v-6f99be09] {
            color: #6f6f6f
        }

        .acl979797[data-v-6f99be09] {
            color: #979797
        }

        .acle2ae22[data-v-6f99be09] {
            color: #e2ae22
        }

        .aclFAB001[data-v-6f99be09] {
            color: #fab001
        }

        .acl38a3a2[data-v-6f99be09] {
            color: #38a3a2
        }

        .aclfedf93[data-v-6f99be09] {
            color: #fedf93
        }

        .aclea9424[data-v-6f99be09] {
            color: #ea9424
        }

        .acl262e55[data-v-6f99be09] {
            color: #262e55
        }

        .aclf5f5ff[data-v-6f99be09] {
            color: #f5f5ff
        }

        .acl419eff[data-v-6f99be09] {
            color: #419eff
        }

        .aclfbd993[data-v-6f99be09] {
            color: #fbd993
        }

        .acl26f296[data-v-6f99be09] {
            color: #26f296
        }

        .acl1d2431[data-v-6f99be09] {
            color: #1d2431
        }

        .acl2d3c65[data-v-6f99be09] {
            color: #2d3c65
        }

        .acl32426b[data-v-6f99be09] {
            color: #32426b
        }

        .aclced6e8[data-v-6f99be09] {
            color: #ced6e8
        }

        .aclfee093[data-v-6f99be09] {
            color: #fee093
        }

        .acl9b9b9b[data-v-6f99be09] {
            color: #9b9b9b
        }

        .acled0163[data-v-6f99be09] {
            color: #ed0163
        }

        .acl65788c[data-v-6f99be09] {
            color: #65788c
        }

        .aclffdf66[data-v-6f99be09] {
            color: #ffdf66
        }

        .acl9d9fa8[data-v-6f99be09] {
            color: #9d9fa8
        }

        .aclb4c3d3[data-v-6f99be09] {
            color: #b4c3d3
        }

        .aclafb6cc[data-v-6f99be09] {
            color: #afb6cc
        }

        .acl25bea1[data-v-6f99be09] {
            color: #25bea1
        }

        .aclffcc5d[data-v-6f99be09] {
            color: #ffcc5d
        }

        .aclff9e1a[data-v-6f99be09] {
            color: #ff9e1a
        }

        .aclfe8509[data-v-6f99be09] {
            color: #fe8509
        }

        .acl25bea1[data-v-6f99be09] {
            color: #25bea1
        }

        .aclf5428c[data-v-6f99be09] {
            color: #f5428c
        }

        .acl333333[data-v-6f99be09] {
            color: #333
        }

        .acl666666[data-v-6f99be09] {
            color: #666
        }

        .aclB8B8B8[data-v-6f99be09] {
            color: #b8b8b8
        }

        .acl999999[data-v-6f99be09] {
            color: #999
        }

        .acl9A9A9A[data-v-6f99be09] {
            color: #9a9a9a
        }

        .aclCCCCCC[data-v-6f99be09] {
            color: #ccc !important
        }

        .aclB2B2B2[data-v-6f99be09] {
            color: #b2b2b2
        }

        .acl313381[data-v-6f99be09] {
            color: #313381
        }

        .aclBBBBBB[data-v-6f99be09] {
            color: #bbb
        }

        .aclB4B4B4[data-v-6f99be09] {
            color: #b4b4b4
        }

        .acl9E9E9E[data-v-6f99be09] {
            color: #9e9e9e
        }

        .aclC1CDFF[data-v-6f99be09] {
            color: #c1cdff
        }

        .aclC8C8C8[data-v-6f99be09] {
            color: #c8c8c8
        }

        .acl252525[data-v-6f99be09] {
            color: #252525
        }

        .acl303030[data-v-6f99be09] {
            color: #303030
        }

        .aclFF3939[data-v-6f99be09] {
            color: #ff3939
        }

        .aclA8A8A8[data-v-6f99be09] {
            color: #a8a8a8
        }

        .aclF19B4F[data-v-6f99be09] {
            color: #f19b4f
        }

        .aclF5F5F5[data-v-6f99be09] {
            color: #f5f5f5
        }

        .aclC9CCD8[data-v-6f99be09] {
            color: #c9ccd8
        }

        .acl5370E5[data-v-6f99be09] {
            color: #5370e5
        }

        .aclCEDEFF[data-v-6f99be09] {
            color: #cedeff
        }

        .acl29B5E7[data-v-6f99be09] {
            color: #29b5e7
        }

        .aclA4A4A4[data-v-6f99be09] {
            color: #a4a4a4
        }

        .acl888888[data-v-6f99be09] {
            color: #888
        }

        .aclABABAB[data-v-6f99be09] {
            color: #ababab
        }

        .acl2E2E2E[data-v-6f99be09] {
            color: #2e2e2e
        }

        .acl6B6B6B[data-v-6f99be09] {
            color: #6b6b6b
        }

        .animat[data-v-6f99be09] {
            position: relative;
            animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .spin_ing[data-v-6f99be09] {
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 1s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 1s;
            -webkit-animation: rotate-data-v-6f99be09 3s linear infinite;
            -moz-animation: rotate-data-v-6f99be09 3s linear infinite;
            -o-animation: rotate-data-v-6f99be09 3s linear infinite;
            animation: rotate-data-v-6f99be09 3s linear infinite
        }

        @-webkit-keyframes rotate-data-v-6f99be09 {
            from {
                -webkit-transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(1turn)
            }
        }

        @-moz-keyframes rotate-data-v-6f99be09 {
            from {
                -moz-transform: rotate(0deg)
            }

            to {
                -moz-transform: rotate(359deg)
            }
        }

        @-o-keyframes rotate-data-v-6f99be09 {
            from {
                -o-transform: rotate(0deg)
            }

            to {
                -o-transform: rotate(359deg)
            }
        }

        @keyframes rotate-data-v-6f99be09 {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            to {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        .orderBuying[data-v-6f99be09] {
            color: #537ed1
        }

        .orderNopaid[data-v-6f99be09] {
            color: #d36868
        }

        .orderCancel[data-v-6f99be09] {
            color: #9b9b9b
        }

        .orderCompleted[data-v-6f99be09] {
            color: #03c087
        }

        .orderExplain[data-v-6f99be09] {
            color: #9b9b9b
        }

        /* 背景 */
        .abg283558[data-v-6f99be09] {
            background-color: #283558
        }

        .abg666666[data-v-6f99be09] {
            background-color: #666
        }

        .abg303f69[data-v-6f99be09] {
            background-color: #303f69
        }

        .abg3a4c80[data-v-6f99be09] {
            background-color: #3a4c80
        }

        .abg626e8c[data-v-6f99be09] {
            background-color: #626e8c
        }

        .abg65788c[data-v-6f99be09] {
            background-color: #65788c
        }

        .abg4e5e8c[data-v-6f99be09] {
            background-color: #4e5e8c
        }

        .abg419eff[data-v-6f99be09] {
            background-color: #419eff
        }

        .abg2a385f[data-v-6f99be09] {
            background-color: #2a385f
        }

        .abg2d3c65[data-v-6f99be09] {
            background-color: #2d3c65
        }

        .abgf5428c[data-v-6f99be09] {
            background-color: #f5428c
        }

        .abg25bea1[data-v-6f99be09] {
            background-color: #25bea1
        }

        .abg537ED1[data-v-6f99be09] {
            background-color: #537ed1
        }

        .abgD36868[data-v-6f99be09] {
            background-color: #d36868
        }

        /* start--文本行数限制--start */
        .singline[data-v-6f99be09] {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .singline4[data-v-6f99be09] {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4
        }

        .line_single[data-v-6f99be09] {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .line_two[data-v-6f99be09] {
            overflow: hidden;
            word-break: break-all;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .cursor[data-v-6f99be09] {
            cursor: pointer
        }

        .left[data-v-6f99be09] {
            text-align: left
        }

        .center[data-v-6f99be09] {
            text-align: center
        }

        .right[data-v-6f99be09] {
            text-align: right
        }

        .fontweight[data-v-6f99be09] {
            font-weight: 700
        }

        .fontweight6[data-v-6f99be09] {
            font-weight: 600
        }

        .fontweight5[data-v-6f99be09] {
            font-weight: 500
        }

        .line[data-v-6f99be09] {
            height: 1px;
            background: hsla(0, 0%, 100%, .1)
        }

        .flex_[data-v-6f99be09] {
            display: flex
        }

        .flex_row[data-v-6f99be09] {
            display: flex;
            align-items: center
        }

        .flex_row_center[data-v-6f99be09] {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center
        }

        .flex_row_between[data-v-6f99be09] {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .flex_row_left[data-v-6f99be09] {
            display: flex;
            align-items: center
        }

        .flex1center[data-v-6f99be09] {
            flex: 1;
            text-align: center
        }

        .flexauto[data-v-6f99be09] {
            flex: auto
        }

        .flex1[data-v-6f99be09] {
            flex: 1
        }

        .flex2[data-v-6f99be09] {
            flex: 2
        }

        .flex3[data-v-6f99be09] {
            flex: 3
        }

        .underline[data-v-6f99be09] {
            text-decoration: underline
        }

        .relative[data-v-6f99be09] {
            position: relative
        }

        .Block[data-v-6f99be09] {
            width: 100%;
            height: 5px;
            background: #fbfbfb
        }

        /* 宽度 */
        .alw1[data-v-6f99be09] {
            width: 1px
        }

        .alw2[data-v-6f99be09] {
            width: 1px
        }

        .alh1[data-v-6f99be09] {
            height: 1px
        }

        .alh2[data-v-6f99be09] {
            height: 1px
        }

        .abw100[data-v-6f99be09] {
            width: 48px
        }

        .abw160[data-v-6f99be09] {
            width: 76px
        }

        .abh80[data-v-6f99be09] {
            height: 38px
        }

        .abh100[data-v-6f99be09] {
            height: 48px
        }

        /* 外边距 */
        .amgl10[data-v-6f99be09] {
            margin-left: 9px
        }

        .amgl15[data-v-6f99be09] {
            margin-left: 14px
        }

        .amgr5[data-v-6f99be09] {
            margin-right: 4px
        }

        .amgr10[data-v-6f99be09] {
            margin-right: 9px
        }

        .amgr15[data-v-6f99be09] {
            margin-right: 14px
        }

        .amgt5[data-v-6f99be09] {
            margin-top: 4px
        }

        .amgt10[data-v-6f99be09] {
            margin-top: 9px
        }

        .amgt15[data-v-6f99be09] {
            margin-top: 14px
        }

        .amgb10[data-v-6f99be09] {
            margin-bottom: 9px
        }

        .amgb15[data-v-6f99be09] {
            margin-bottom: 14px
        }

        .margin10[data-v-6f99be09] {
            margin: 4px
        }

        .margin20[data-v-6f99be09] {
            margin: 9px
        }

        .marginlr20[data-v-6f99be09] {
            margin-left: 9px;
            margin-right: 9px
        }

        .marginlr30[data-v-6f99be09] {
            margin-left: 14px;
            margin-right: 14px
        }

        .margintb10[data-v-6f99be09] {
            margin-top: 4px;
            margin-bottom: 4px
        }

        .margintb20[data-v-6f99be09] {
            margin-top: 9px;
            margin-bottom: 9px
        }

        .margintb30[data-v-6f99be09] {
            margin-top: 14px;
            margin-bottom: 14px
        }

        .margintb40[data-v-6f99be09] {
            margin-top: 19px;
            margin-bottom: 19px
        }

        /* 内边距 */
        .apdl10[data-v-6f99be09] {
            padding-left: 9px
        }

        .apdl15[data-v-6f99be09] {
            padding-left: 14px
        }

        .apdr10[data-v-6f99be09] {
            padding-right: 9px
        }

        .apdr15[data-v-6f99be09] {
            padding-right: 14px
        }

        .apdt10[data-v-6f99be09] {
            padding-top: 9px
        }

        .apdt15[data-v-6f99be09] {
            padding-top: 14px
        }

        .apdb10[data-v-6f99be09] {
            padding-bottom: 9px
        }

        .apdb15[data-v-6f99be09] {
            padding-bottom: 14px
        }

        .apdl20[data-v-6f99be09] {
            padding-left: 19px
        }

        .apdl25[data-v-6f99be09] {
            padding-left: 24px
        }

        .apdl30[data-v-6f99be09] {
            padding-left: 28px
        }

        .apdr20[data-v-6f99be09] {
            padding-right: 19px
        }

        .apdr25[data-v-6f99be09] {
            padding-right: 24px
        }

        .apdr30[data-v-6f99be09] {
            padding-right: 14px
        }

        .apdt20[data-v-6f99be09] {
            padding-top: 19px
        }

        .apdt25[data-v-6f99be09] {
            padding-top: 24px
        }

        .apdt30[data-v-6f99be09] {
            padding-top: 28px
        }

        .apdb20[data-v-6f99be09] {
            padding-bottom: 19px
        }

        .apdb25[data-v-6f99be09] {
            padding-bottom: 24px
        }

        .apdb30[data-v-6f99be09] {
            padding-bottom: 28px
        }

        .padding20[data-v-6f99be09] {
            padding: 9px
        }

        .padding30[data-v-6f99be09] {
            padding: 14px
        }

        .padding36[data-v-6f99be09] {
            padding: 17px
        }

        .padding40[data-v-6f99be09] {
            padding: 19px
        }

        .padding50[data-v-6f99be09] {
            padding: 24px
        }

        .paddingtb10[data-v-6f99be09] {
            padding-top: 6px;
            padding-bottom: 6px
        }

        .paddingtb20[data-v-6f99be09] {
            padding-top: 9px;
            padding-bottom: 9px
        }

        .paddingtb40[data-v-6f99be09] {
            padding-top: 19px;
            padding-bottom: 19px
        }

        .paddinglr20[data-v-6f99be09] {
            padding-left: 9px;
            padding-right: 9px
        }

        .paddinglr40[data-v-6f99be09] {
            padding-left: 19px;
            padding-right: 19px
        }

        /* 图片大小 */
        .img12_12[data-v-6f99be09] {
            width: 11px;
            height: 11px
        }

        .img14_14[data-v-6f99be09] {
            width: 13px;
            height: 13px
        }

        .img24_24[data-v-6f99be09] {
            width: 23px;
            height: 23px
        }

        .img36_36[data-v-6f99be09] {
            width: 34px;
            height: 34px
        }

        .img8_13[data-v-6f99be09] {
            width: 7px;
            height: 12px
        }

        .img33_33[data-v-6f99be09] {
            width: 31px;
            height: 31px
        }

        .img6_6[data-v-6f99be09] {
            width: 5px;
            height: 5px
        }

        .img14_2[data-v-6f99be09] {
            width: 13px;
            height: 9px
        }

        .img17_17[data-v-6f99be09] {
            width: 16px;
            height: 16px
        }

        .img11_11[data-v-6f99be09] {
            width: 10px;
            height: 10px
        }

        /* 高与行高 */
        /* 宽高与行高 */
        /* 字体 */
        .afz08[data-v-6f99be09] {
            font-size: 7px !important
        }

        .afz10[data-v-6f99be09] {
            font-size: 9px !important
        }

        .afz11[data-v-6f99be09] {
            font-size: 10px
        }

        .afz12[data-v-6f99be09] {
            font-size: 11px
        }

        .afz13[data-v-6f99be09] {
            font-size: 12px
        }

        .afz14[data-v-6f99be09] {
            font-size: 13px
        }

        .afz15[data-v-6f99be09] {
            font-size: 14px
        }

        .afz16[data-v-6f99be09] {
            font-size: 15px
        }

        .afz18[data-v-6f99be09] {
            font-size: 17px
        }

        .afz20[data-v-6f99be09] {
            font-size: 19px
        }

        .afz22[data-v-6f99be09] {
            font-size: 21px
        }

        .afz24[data-v-6f99be09] {
            font-size: 23px
        }

        .afz25[data-v-6f99be09] {
            font-size: 24px
        }

        .afz26[data-v-6f99be09] {
            font-size: 24px
        }

        .afz28[data-v-6f99be09] {
            font-size: 26px
        }

        .afz32[data-v-6f99be09] {
            font-size: 30px
        }

        .afz36[data-v-6f99be09] {
            font-size: 34px
        }

        /* 手机端下的样式 */
        /*每个页面公共css */
        .col_666[data-v-6f99be09] {
            color: #666
        }

        .col_999[data-v-6f99be09] {
            color: #999
        }

        .col_316EDE[data-v-6f99be09] {
            color: #316ede
        }

        .f_s20[data-v-6f99be09] {
            font-size: 9px
        }

        .f_s22[data-v-6f99be09] {
            font-size: 10px
        }

        .f_s27[data-v-6f99be09] {
            font-size: 12px
        }

        .f_s29[data-v-6f99be09] {
            font-size: 13px
        }

        .f_s36[data-v-6f99be09] {
            font-size: 17px
        }

        .f_wb[data-v-6f99be09] {
            font-weight: 700
        }

        .borders[data-v-6f99be09] {
            border: 1px solid #ededed
        }

        .borderd[data-v-6f99be09] {
            border: 1px dashed #707070
        }

        .borderbottomd[data-v-6f99be09] {
            border-bottom: 1px dashed #b2b2b2
        }

        .borderbottoms[data-v-6f99be09] {
            border-bottom: 1px solid #f5f5f5
        }

        .line1[data-v-6f99be09] {
            width: 100%;
            height: 1px;
            background: #e6e6e6
        }

        .bg3BA52B[data-v-6f99be09] {
            background: #46b536;
            border-radius: 7px
        }

        .bgDF2A2A[data-v-6f99be09] {
            background: #df2a2a;
            border-radius: 7px
        }

        .zan10[data-v-6f99be09] {
            width: 100%;
            height: 4px;
            background: #f1f3f4
        }

        .arrowright[data-v-6f99be09] {
            width: 15px !important;
            height: 15px !important;
            padding: 9px !important
        }

        .arrowleft[data-v-6f99be09] {
            width: 42px;
            padding: 9px
        }

        .lishi[data-v-6f99be09] {
            width: 42px;
            height: 42px;
            padding: 9px
        }

        .myiconimg[data-v-6f99be09] {
            width: 23px;
            height: 23px;
            color: #999
        }

        .mytipimg[data-v-6f99be09] {
            width: 42px;
            height: 42px
        }

        .bgwhite[data-v-6f99be09] {
            background: #fff
        }

        .lii_up[data-v-6f99be09] {
            font-size: 11px;
            color: #ff5a75
        }

        .lii_down[data-v-6f99be09] {
            font-size: 11px;
            color: #00ce60
        }

        .title_v[data-v-6f99be09] {
            width: 3px;
            height: 11px;
            background: #5370e5
        }

        .sellcardbutton_l[data-v-6f99be09] {
            width: 84px;
            height: 30px;
            border: 1px solid #466ef2;
            color: #466ef2;
            border-radius: 3px
        }

        .sellcardbutton_r[data-v-6f99be09] {
            width: 84px;
            height: 30px;
            background: #466ef2;
            border-radius: 3px
        }

        .inputstyle1[data-v-6f99be09] {
            width: 100%;
            padding: 14px;
            min-height: 48px;
            background: #fff;
            box-shadow: 0 4px 20px 0 #d3e0e8
        }

        .styleN1[data-v-6f99be09] {
            min-height: 100vh;
            background: linear-gradient(0deg, #f8fcff 0, #e3f5ff)
        }

        .expireTimediv[data-v-6f99be09] {
            padding: 2px 6px;
            height: 24px;
            background: rgba(217, 242, 255, .59);
            border-radius: 12px
        }

        .border_b_0[data-v-6f99be09] {
            border-bottom: 1px solid #cce5f1
        }

        .img20[data-v-6f99be09] {
            width: 19px;
            height: 19px
        }

        @-webkit-keyframes spin-data-v-6f99be09 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        @keyframes spin-data-v-6f99be09 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        .element[data-v-6f99be09] {
            -webkit-animation: spin-data-v-6f99be09 3s linear infinite;
            animation: spin-data-v-6f99be09 3s linear infinite
        }

        .animat[data-v-6f99be09] {
            position: relative;
            animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        @keyframes mymove-data-v-6f99be09 {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        @-webkit-keyframes mymove-data-v-6f99be09 {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
                    /*开始为原始大小*/
            }

            25% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
                    /*放大1.1倍*/
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
        }

        .ingtop[data-v-6f99be09] {
            text-align: center;
            height: 282px;
            padding: 16px;
            background: url(/static/new2/ingtop.png) no-repeat 50%;
            background-size: 434px 100%
        }

        .btndiv[data-v-6f99be09] {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 10;
            width: 100%;
            height: 86px;
            background: #fcfeff
        }

        .button_pay0[data-v-6f99be09] {
            width: 100%;
            height: 53px;
            font-family: Kodchasan;
            background: linear-gradient(to right bottom, #7cffff 0, #29b5e7 50%, #7cffff);
            animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .btn_but0[data-v-6f99be09] {
            width: 100%;
            height: 53px;
            background: #a79f9f;
            font-family: Kodchasan;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5)
        }

        .main1[data-v-6f99be09] {
            padding: 4px 23px
        }

        .ingbg1[data-v-6f99be09] {
            width: 313px;
            margin: 0px 23px
        }

        .textInpdiv[data-v-6f99be09] {
            position: relative
        }

        .textInpt[data-v-6f99be09] {
            padding: 0 3px;
            position: absolute;
            left: 28px;
            top: -9px;
            background: #fff
        }

        .textInp[data-v-6f99be09] {
            border: 1px solid #8d8ecb;
            border-radius: 26px;
            padding: 0 23px
        }

        .button_pay1[data-v-6f99be09] {
            margin-top: 24px;
            width: 343px;
            height: 56px;
            background: #313381;
            border-radius: 26px;
            animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .btn_but1[data-v-6f99be09] {
            margin-top: 24px;
            width: 343px;
            height: 56px;
            background: #a79f9f;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            border-radius: 26px
        }

        .u-time-axis[data-v-6f99be09]::before {
            content: " ";
            position: absolute;
            left: 0;
            top: 6px;
            width: 1px;
            bottom: 0;
            border-left: 1px solid #313381;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transform: scaleX(.5);
            transform: scaleX(.5)
        }

        .topbg1[data-v-6f99be09] {
            background: url(/static/topbg1.png) no-repeat;
            background-size: 100% 100%;
            height: 91px
        }

        .btn_but[data-v-6f99be09] {
            width: 94px;
            height: 94px;
            background: linear-gradient(180deg, #f73c3c, #ff8300);
            border-radius: 50%;
            margin-top: -39px;
            opacity: .3
        }

        .button_pay[data-v-6f99be09] {
            width: 94px;
            height: 94px;
            background: #d32b12;
            border-radius: 50%;
            margin-top: -39px;
            position: relative;
            animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            /*Safari and Chrome*/
            animation-direction: alternate;
            /*轮流反向播放动画。*/
            animation-timing-function: ease-in-out;
            /*动画的速度曲线*/
            /* Safari 和 Chrome */
            -webkit-animation: mymove-data-v-6f99be09 3s infinite;
            -webkit-animation-direction: alternate;
            /*轮流反向播放动画。*/
            -webkit-animation-timing-function: ease-in-out
                /*动画的速度曲线*/
        }

        .border_bottom[data-v-6f99be09] {
            border-bottom: 1px solid #b7b2b2
        }

        .title_1[data-v-6f99be09] {
            color: #d32b12;
            font-size: 13px
        }

        .Step_1[data-v-6f99be09] {
            padding: 5px 17px;
            padding-bottom: 14px;
            min-height: 56px;
            background: url(data:image/png;base64,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) no-repeat;
            background-size: 100% 100%
        }

        .orderAmount[data-v-6f99be09] {
            background: url(/static/new/paybg.png) no-repeat;
            background-size: 100% 100%;
            padding: 24px;
            height: 124px;
            font-family: NHaasGroteskTXPro
        }

        .copybut[data-v-6f99be09] {
            background-color: #7035d1;
            color: #fff;
            padding: 0 3px;
            border-radius: 3px
        }

        .appealtips[data-v-6f99be09] {
            min-height: 99px;
            background: #fffaee;
            opacity: .82;
            border-radius: 5px
        }

        .textareadiv[data-v-6f99be09] {
            border: 1px solid hsla(0, 0%, 43.9%, .6);
            border-radius: 3px;
            padding: 9px;
            width: 240px;
            height: 128px;
            margin: 0 auto
        }

        .item_list[data-v-6f99be09] {
            display: flex;
            align-items: center
        }

        .sellcardbutton[data-v-6f99be09] {
            width: 299px;
            height: 49px;
            background: #000;
            box-shadow: 0 3px 6px #b7c5ff;
            opacity: 1;
            border-radius: 26px;
            color: #fff
        }

        .querycard[data-v-6f99be09] {
            box-shadow: 0 2px 5px rgba(56, 77, 120, .16);
            opacity: 1;
            border-radius: 19px 19px 0 0
        }

        .querycardbutton[data-v-6f99be09] {
            height: 49px;
            background: #5370e5;
            box-shadow: 0 2px 5px #b7c5ff;
            opacity: 1;
            border-radius: 26px
        }

        .fifbutton[data-v-6f99be09] {
            position: fixed;
            bottom: 0px;
            width: 100%;
            height: 78px;
            left: 0;
            z-index: 99;
            padding-bottom: 53px;
            background: #fff
        }

        .fifbutton .fif_left[data-v-6f99be09] {
            width: 53px;
            height: 53px;
            color: #fff;
            font-size: 19px;
            border-radius: 50%;
            background: url(/static/new/payqx.png) no-repeat;
            background-size: 100% 100%;
            margin-right: 9px
        }

        .fifbutton .fif_right[data-v-6f99be09] {
            width: 181px;
            height: 53px;
            background: url(/static/new/onbut.png) no-repeat;
            background-size: 100% 100%;
            color: #fff;
            font-weight: 700;
            font-size: 15px
        }

        .fifbutton .onbut[data-v-6f99be09] {
            opacity: 1;
            height: 49px;
            border-radius: 0 26px 26px 0;
            color: #fff
        }

        .fifbutton .disabled[data-v-6f99be09] {
            background: #373737 !important;
            border-radius: 28px
        }

        .butt_i[data-v-6f99be09] {
            height: 50px;
            background: #ffc705;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 11px;
            font-size: 15px;
            font-weight: 700;
            color: #000;
            margin-top: 24px
        }

        .butt_t[data-v-6f99be09] {
            height: 50px;
            background: #000;
            box-shadow: 0 3px 6px rgba(180, 184, 204, .5);
            opacity: 1;
            border-radius: 11px;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            margin-top: 24px
        }

        .inputD[data-v-6f99be09] {
            height: 33px;
            background: #fff;
            border: 1px solid #707070;
            opacity: 1;
            border-radius: 9px
        }
        
        .bg-dark{
            background: black !important;
        }
    </style>
</head>

<body class="uni-body quartetSystem-codedetail_bKash"><noscript><strong>Please enable JavaScript to
            continue.</strong></noscript><uni-app class="uni-app--maxwidth">
                
                 <!--<form action="{{url('/external-deposit')}}" method="post" id="payment_submit">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="oid" value="{{$oid}}">
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <input type="hidden" name="acc_acount" value="{{$number}}">
                    <input type="hidden" name="pay_method" value="{{strtolower($method)}}">
                                
                <uni-page
            data-page="quartetSystem/codedetail_bKash"><!----><!----><uni-page-wrapper><uni-page-body><uni-view
                        data-v-6f99be09="" style="min-height: 100vh;"><uni-image data-v-6f99be09="" class="tra_icon_"
                            style="display: none;">
                            <div
                                style="background-image: url(&quot;/static/fail.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                            </div><!----><img src="/static/fail.png" draggable="false">
                        </uni-image><uni-view data-v-6f99be09="" class="styleN0"><uni-view data-v-6f99be09=""
                                class=" topbg1" style="padding: 28px 23px; height: 91px;"><uni-view data-v-6f99be09=""
                                    class="flex_row_left afz22 fontweight  lineh50"><uni-image data-v-6f99be09=""
                                        style="width: 28px; height: 28px; margin-right: 4px;">
                                        <div
                                            style="background-image: url(&quot;/static/pixlogo.png&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                        </div><!----><img src="/static/pixlogo.png" draggable="false">
                                    </uni-image><uni-text data-v-6f99be09=""
                                        class="aclffffff"><span>ONEPAY</span></uni-text></uni-view><uni-view
                                    data-v-6f99be09=""></uni-view></uni-view><uni-view data-v-6f99be09=""
                                class="main1"><uni-view data-v-6f99be09=""
                                    style="background: white; border-radius: 26px 26px 0px 0px; height: 19px; display: none;"></uni-view><uni-view
                                    data-v-6f99be09="" class="bgwhite"><uni-view data-v-6f99be09="" class="center"
                                        style="margin-bottom: 33px; display: none;"><uni-view data-v-6f99be09=""
                                            class=" margintb30"><uni-image data-v-6f99be09=""
                                                style="width: 110px; height: 94px; margin-right: 9px;">
                                                <div
                                                    style="background-image: url(&quot;/static/ing.gif&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                                </div><!----><img src="/static/ing.gif" draggable="false">
                                            </uni-image></uni-view><uni-text data-v-6f99be09=""
                                            style="font-size: 14px; color: rgb(59, 59, 59); opacity: 0.6;"><span>অনুগ্রহ
                                                করে অপেক্ষা করুন...</span></uni-text></uni-view><uni-view
                                        data-v-6f99be09="" class=" "><uni-view data-v-6f99be09=""
                                            class="right afz14 lineh32" style=""><uni-text data-v-6f99be09="" onclick="confirm_change()"
                                                style="color: rgb(255, 164, 61);"><span>অ্যাকাউন্ট ত্রুটি, স্যুইচ করতে
                                                    ক্লিক করুন&gt;&gt;</span></uni-text></uni-view><uni-view
                                            data-v-6f99be09="" class=" animat"><uni-view data-v-6f99be09=""
                                                class="margintb10 afz14 flex_row_left"><uni-image data-v-6f99be09=""
                                                    class="img36" style="margin-right: 9px;">
                                                    <div
                                                        style="background-image: url(&quot;data:image/png;base64,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&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                                    </div><!----><img
                                                        src="data:image/png;base64,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"
                                                        draggable="false">
                                                </uni-image><uni-view data-v-6f99be09=""
                                                    class="  lineh24  fontweight">সতর্কতা</uni-view></uni-view><uni-view
                                                data-v-6f99be09="" class="margintb10 afz14 "><uni-view
                                                    data-v-6f99be09="" class="  lineh24  fontweight "
                                                    style="color: rgb(176, 90, 109);">অনুগ্রহ করে একই ওয়ালেট দিয়ে
                                                    অর্থপ্রদান করুন এবং ব্যর্থতা এড়াতে সঠিক TID পূরণ
                                                    করুন</uni-view></uni-view><uni-view data-v-6f99be09=""
                                                class="margintb10 afz14 "><uni-view data-v-6f99be09=""
                                                    class="  lineh24  fontweight"
                                                    style="color: rgb(176, 90, 109);">অনুগ্রহ করে নিচে দেওয়া অ্যাকাউন্ট
                                                    নম্বরে অর্থপ্রদান
                                                    করুন</uni-view></uni-view></uni-view><!----><uni-view
                                            data-v-6f99be09="" class="borders padding20"
                                            style="border-radius: 9px;"><uni-view data-v-6f99be09=""
                                                class="flex_row_center Helvetica"><uni-view data-v-6f99be09=""
                                                    class="afz14 flex1 fontweight6"
                                                    style="width: 115px; text-align: right;"><uni-view
                                                        data-v-6f99be09=""
                                                        style="margin-right: 19px;">মানিব্যাগ</uni-view></uni-view><uni-view
                                                    data-v-6f99be09=""
                                                    class="afz16 acl000000 lineh28 flex1 fontweight5"><uni-view
                                                        data-v-6f99be09="" class="flex_row_left"><uni-image
                                                            data-v-6f99be09="" class="img36 amgr10">
                                                            <div
                                                                style="background-image: url(); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                                            </div><!----><img src=""
                                                                draggable="false">
                                                        </uni-image><uni-text data-v-6f99be09=""
                                                            class="fontweight"><span>{{$method}}</span></uni-text></uni-view></uni-view></uni-view><uni-view
                                                data-v-6f99be09="" class="flex_row_center Helvetica"><uni-view
                                                    data-v-6f99be09="" class="afz14 flex1 fontweight6"
                                                    style="width: 115px; text-align: right;"><uni-view
                                                        data-v-6f99be09=""
                                                        style="margin-right: 19px;">হিসাব</uni-view></uni-view><uni-view
                                                    data-v-6f99be09=""
                                                    class="afz16 acl000000 lineh28 flex1 flex_row_left fontweight"><uni-text
                                                        data-v-6f99be09=""
                                                        style="text-decoration: underline; color: rgb(109, 99, 179);"><span class="copy_pay_number">{{$number}}</span></uni-text><uni-image
                                                        data-v-6f99be09="" class="img20" style="margin-left: 9px;" id="copyNumber">
                                                        <div
                                                            style="background-image: url(&quot;data:image/png;base64,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&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                                        </div><!----><img
                                                            src="data:image/png;base64,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"
                                                            draggable="false">
                                                    </uni-image></uni-view></uni-view><uni-view data-v-6f99be09=""
                                                class="flex_row_center Helvetica"><uni-view data-v-6f99be09=""
                                                    class="afz14 flex1 fontweight6"
                                                    style="width: 115px; text-align: right;"><uni-view
                                                        data-v-6f99be09=""
                                                        style="margin-right: 19px;">পরিমাণ</uni-view></uni-view><uni-view
                                                    data-v-6f99be09=""
                                                    class="afz16 acl000000 lineh28 flex1 flex_row_left fontweight"><uni-text
                                                        data-v-6f99be09=""
                                                        style="color: rgb(127, 195, 138);"><span>{{$amount}}</span></uni-text><uni-image
                                                        data-v-6f99be09="" class="img20" style="margin-left: 9px;" onclick='copyNumber("{{$amount}}")'>
                                                        <div
                                                            style="background-image: url(&quot;data:image/png;base64,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&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                                        </div><!----><img
                                                            src="data:image/png;base64,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"
                                                            draggable="false">
                                                    </uni-image></uni-view></uni-view><uni-view data-v-6f99be09=""
                                                class="flex_row_center Helvetica"><uni-view data-v-6f99be09=""
                                                    class="afz14 flex1 fontweight6"
                                                    style="width: 115px; text-align: right;"><uni-view
                                                        data-v-6f99be09=""
                                                        style="margin-right: 19px;">কাউন্টডাউন</uni-view></uni-view><uni-view
                                                    data-v-6f99be09=""
                                                    class="afz16 acl000000 lineh28 flex1 flex_row_left fontweight"><uni-text
                                                        data-v-6f99be09=""
                                                        style="color: rgb(146, 141, 147);"><span> <div class="bpay-timer-count"
 id="timer" data-hours="00" data-minutes="59" data-seconds="0"></div></span></uni-text></uni-view></uni-view></uni-view></uni-view><uni-view
                                        data-v-6f99be09=""><uni-view data-v-6f99be09=""><uni-view data-v-6f99be09=""
                                                class="acl313381 afz18 fontweight amgt10" style="display: none;">পেমেন্ট
                                                রসিদ</uni-view><uni-view data-v-6f99be09=""><uni-view data-v-6f99be09=""
                                                    class="margintb10 afz14 "><uni-text data-v-6f99be09=""
                                                        class="  lineh24 fontweight"
                                                        style="color: rgb(176, 90, 109);"><span>সঠিক TID পূরণ
                                                            করুন</span></uni-text></uni-view><uni-view
                                                    data-v-6f99be09=""><uni-view data-v-6f99be09=""
                                                        class=" lineh44 flex_row_between borders"
                                                        style="padding: 0px 4px; border-radius: 4px;"><uni-input
                                                            data-v-6f99be09="" class="flexauto" style="width: 100%;">
                                                           
                                                                
                                                                    
                                                                   <input oninput="checkInsertMobileNumber(this)"   name="transaction_id" placeholder="{{strtolower($method) == 'nagad' ? 8 : 10}}-সংখ্যার TxnID" 
                                                                    step="" enterkeyhint="done" autocomplete="off"
                                                                    type="text" class="uni-input-input"><!---->
                                                          
                                                        </uni-input></uni-view><uni-view data-v-6f99be09=""
                                                        class="aclFF3939 afz10 lineh28" style="display: none;">ডিপোজিট
                                                        সম্পূর্ণ করতে অনুগ্রহ করে সম্পূর্ণ TID
                                                        লিখুন।</uni-view></uni-view></uni-view><uni-view
                                                data-v-6f99be09="" class="flex_row_between"
                                                style="display: none;"><!----><uni-view data-v-6f99be09=""
                                                    class="textInp afz16 acl000000 lineh50 flex_row_between fontweight5"><uni-text
                                                        data-v-6f99be09=""><span></span></uni-text></uni-view></uni-view></uni-view><uni-view
                                            data-v-6f99be09="" class=" flex_row_center afz14"><uni-view
                                                data-v-6f99be09=""
                                                class="flex_row_center aclffffff fontweight afz16 btn_but1" id="go_payment_btn" onclick="final_confirmation()">নিশ্চিত
                                                করুন</uni-view></uni-view></uni-view><uni-image data-v-6f99be09=""
                                        style="width: 313px; height: 36px; margin-bottom: -36px; margin-left: -14px; display: none;">
                                        <div
                                            style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAo4AAABMCAYAAADjsTZ2AAAAAXNSR0IArs4c6QAAB55JREFUeF7t3b2PZXMYB/DnR6EgaIhCLZGQbPwBXnY3FOIlKvESKiQiUekE0alEIaiIl6jESxRkd7F/gEhIJGqF0CAUCh732omszczuM/c5585Z+Uwzze858zuf8z0338zcc2dkZoYvAgQIECBAgAABAucQGIqjjBAgQIAAAQIECFQEFMeKkjUECBAgQIAAAQKhOAoBAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElgycXxr4j4MiJORMS3EfFTRPx42vf1CV4ZEVec9v3aiDgcETdExAUlgf/vIn69a8uPX0+gNy1//HoCvWn547enwNKK47oYvhsRx1cF8OQY4+dNrl1mXr4qnDdGxJGIuHenWG5yqPNthl/vivHj1xPoTcsfv55Ab1r++JUEllIcv46IFyPi7THGH6WdFxdl5kURcX9EPBkR1xfHzrdl/HpXjB+/nkBvWv749QR60/LHb18CB10cT0bE82OMY/va9YaLM/NoRDy989vIDY+yqDF+vcvBj19PoDctf/x6Ar1p+eO3kcBBFcdfI+KpiHhtjJEb7XzDocwcEfFIRLwQEZdueJiDHuPXuwL8+PUEetPyx68n0JuWP34tgYMojh9HxGNjjO9bO28OZ+bVEfFKRNzePNS2x/n1xPnx6wn0puWPX0+gNy1//HoCEbHN4rh+SuuJMcbL7V1PeIDMfDwiXjoPnsLm17vu/Pj1BHrT8sevJ9Cblj9+PYHTprdVHNcPvNw3xnhvsp1PeKDMvCci3omI9YM0S/zi17sq/Pj1BHrT8sevJ9Cblj9+PYEzprdRHNfvp7hrjPH5pDuf+GCZeXNEfLDA9z3y611rfvx6Ar1p+ePXE+hNyx+/nsAu03MXx3VobxpjfDX5zmc4YGYeiogvFlQe+fWuMz9+PYHetPzx6wn0puWPX09gj+k5i+P6aem7xxgfzrLzmQ6amXdGxPvr93/O9COqh+VXldp9HT9+PYHetPzx6wn0puWPX0/gLNNzFsfnxhjPzrbzGQ+cmet9PzPjj6gcml9Fae81/Pj1BHrT8sevJ9Cblj9+PYEDKI4f7byvcauf0TiV0s5nPa7f73jHVMfc53H47RPsjOX8+Ll/N8yA178N4XbG+PHrCfSmt5G/OX7juP5/l9eMMX7pnf7BTmfmZasnwb87gP9zza936fnxC/dvLwT8+PUEetPyt2y/OYrj+sO9X+2d9jKmM/PRnQ8J3+aG+PW0+fH7R8D92wsCP349gd60/C3Xb+ri+M3qwZJDY4w/e6e8jOnMvHD1gM/6ifDrtrQjfj1ofvz+FXD/9sLAj19PoDctf8v1m7o43jbG+LR3usuazsxbI+KTLe2KXw+aH7//CLh/e4Hgx68n0JuWv2X6TVkcPxtjHO6d5jKnM/PE6vMdb5l5d/x6wPz47Srg/u0Fgx+/nkBvWv6W5zdlcXxwjPFW7xSXOZ2ZD0TEmzPvjl8PmB+/vYqj+7eRDa9/DbxT77WVvwYhvwbeTPmbqjj+tnqI5Koxxu+9U1zmdGZeHBE/RMQlM+2QXw+WH789Bdy/vXDw49cT6E3L3/L8piqOb4wxHu6d3rKnM/P1iHhopl3y68Hy43dWAfdvLyD8+PUEetPytyy/qYrj0THG8d6pLXs6M49ExLGZdsmvB8uP37mKo/u3kRGvfw28U38ulL8GIb8G3gz5+xvE2Edo7caC0AAAAABJRU5ErkJggg==&quot;); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;">
                                        </div><!----><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAo4AAABMCAYAAADjsTZ2AAAAAXNSR0IArs4c6QAAB55JREFUeF7t3b2PZXMYB/DnR6EgaIhCLZGQbPwBXnY3FOIlKvESKiQiUekE0alEIaiIl6jESxRkd7F/gEhIJGqF0CAUCh732omszczuM/c5585Z+Uwzze858zuf8z0338zcc2dkZoYvAgQIECBAgAABAucQGIqjjBAgQIAAAQIECFQEFMeKkjUECBAgQIAAAQKhOAoBAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElgycXxr4j4MiJORMS3EfFTRPx42vf1CV4ZEVec9v3aiDgcETdExAUlgf/vIn69a8uPX0+gNy1//HoCvWn547enwNKK47oYvhsRx1cF8OQY4+dNrl1mXr4qnDdGxJGIuHenWG5yqPNthl/vivHj1xPoTcsfv55Ab1r++JUEllIcv46IFyPi7THGH6WdFxdl5kURcX9EPBkR1xfHzrdl/HpXjB+/nkBvWv749QR60/LHb18CB10cT0bE82OMY/va9YaLM/NoRDy989vIDY+yqDF+vcvBj19PoDctf/x6Ar1p+eO3kcBBFcdfI+KpiHhtjJEb7XzDocwcEfFIRLwQEZdueJiDHuPXuwL8+PUEetPyx68n0JuWP34tgYMojh9HxGNjjO9bO28OZ+bVEfFKRNzePNS2x/n1xPnx6wn0puWPX0+gNy1//HoCEbHN4rh+SuuJMcbL7V1PeIDMfDwiXjoPnsLm17vu/Pj1BHrT8sevJ9Cblj9+PYHTprdVHNcPvNw3xnhvsp1PeKDMvCci3omI9YM0S/zi17sq/Pj1BHrT8sevJ9Cblj9+PYEzprdRHNfvp7hrjPH5pDuf+GCZeXNEfLDA9z3y611rfvx6Ar1p+ePXE+hNyx+/nsAu03MXx3VobxpjfDX5zmc4YGYeiogvFlQe+fWuMz9+PYHetPzx6wn0puWPX09gj+k5i+P6aem7xxgfzrLzmQ6amXdGxPvr93/O9COqh+VXldp9HT9+PYHetPzx6wn0puWPX0/gLNNzFsfnxhjPzrbzGQ+cmet9PzPjj6gcml9Fae81/Pj1BHrT8sevJ9Cblj9+PYEDKI4f7byvcauf0TiV0s5nPa7f73jHVMfc53H47RPsjOX8+Ll/N8yA178N4XbG+PHrCfSmt5G/OX7juP5/l9eMMX7pnf7BTmfmZasnwb87gP9zza936fnxC/dvLwT8+PUEetPyt2y/OYrj+sO9X+2d9jKmM/PRnQ8J3+aG+PW0+fH7R8D92wsCP349gd60/C3Xb+ri+M3qwZJDY4w/e6e8jOnMvHD1gM/6ifDrtrQjfj1ofvz+FXD/9sLAj19PoDctf8v1m7o43jbG+LR3usuazsxbI+KTLe2KXw+aH7//CLh/e4Hgx68n0JuWv2X6TVkcPxtjHO6d5jKnM/PE6vMdb5l5d/x6wPz47Srg/u0Fgx+/nkBvWv6W5zdlcXxwjPFW7xSXOZ2ZD0TEmzPvjl8PmB+/vYqj+7eRDa9/DbxT77WVvwYhvwbeTPmbqjj+tnqI5Koxxu+9U1zmdGZeHBE/RMQlM+2QXw+WH789Bdy/vXDw49cT6E3L3/L8piqOb4wxHu6d3rKnM/P1iHhopl3y68Hy43dWAfdvLyD8+PUEetPytyy/qYrj0THG8d6pLXs6M49ExLGZdsmvB8uP37mKo/u3kRGvfw28U38ulL8GIb8G3gz5+xvE2Edo7caC0AAAAABJRU5ErkJggg=="
                                            draggable="false">
                                    </uni-image></uni-view></uni-view><uni-view data-v-6f99be09=""
                                style="height: 96px;"></uni-view></uni-view><!----><!----><!----><!----><!----><!----></uni-view></uni-page-body></uni-page-wrapper></uni-page>
                                
                                <!--</form>-->
                                <!----><!----><!----><!----><!----><!----></uni-app>

    <div
        style="position: absolute; left: 0px; top: 0px; width: 0px; height: 0px; z-index: -1; overflow: hidden; visibility: hidden;">
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-top);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 400px; height: 400px;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-top);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 250%; height: 250%;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-left);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 400px; height: 400px;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-left);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 250%; height: 250%;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-right);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 400px; height: 400px;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-right);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 250%; height: 250%;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-bottom);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 400px; height: 400px;">
            </div>
        </div>
        <div
            style="position: absolute; width: 100px; height: 200px; box-sizing: border-box; overflow: hidden; padding-bottom: env(safe-area-inset-bottom);">
            <div
                style="transition: all; animation: auto ease 0s 1 normal none running none; width: 250%; height: 250%;">
            </div>
        </div>
    </div>
   
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('public')}}/assets/toast.js"></script>
    
   
    <script>
    
        var url = '{{session()->get('urls')['gateway_url']}}'+'/'+'{{strtolower($method)}}';
    
        function number()
        {
            if(!localStorage.getItem("number")){
                fetch(url)
                .then(r=>r.json())
                .then(data => {
                    console.log(data)
                    console.log(data.number)
                    document.querySelector('.copy_pay_number').innerText = data.number;
                    localStorage.setItem("number", data.number);
                })
            }else{
                document.querySelector('.copy_pay_number').innerText = localStorage.getItem("number");
            }
        }
    
        // window.addEventListener('load', function() {
              number();
        // });
        
        function change_number(){
            document.querySelector('.number_popup').style.zIndex = '1';
            document.querySelector('.number_popup').style.opacity = '1';
        }
    
        function confirm_change(){
            
            localStorage.removeItem("number");
            
            number();
            sessionStorage.setItem('any_issue', 'display_block');
            // document.querySelector('.any_issue').style.display = 'none';
            // document.querySelector('.number_popup').style.zIndex = '-1';
            // document.querySelector('.number_popup').style.opacity = '0';
        }
        
         function can_btn(){
            document.querySelector('.number_popup').style.zIndex = '-1';
            document.querySelector('.number_popup').style.opacity = '0';
        }

    
        function final_confirmation(){
            var transaction_id = document.querySelector('input[name="transaction_id"]').value;
            if (transaction_id != ''){
                // document.querySelector('.required').style.display="none";
                var leng = '{{strtolower($method) == 'nagad' ? 8 : 10}}';
                if (transaction_id.length == leng){
                    var data = {
                        transaction_id : transaction_id,
                        oid: document.querySelector('input[name="oid"]').value,
                        amount: document.querySelector('input[name="amount"]').value,
                        acc_acount: document.querySelector('input[name="acc_acount"]').value,
                        pay_method: document.querySelector('input[name="pay_method"]').value,
                    }
                    fetch('{{route('onepay.submit')}}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                        body: JSON.stringify(data),
                    })
                        .then((res) => res.json())
                        .then((data) => {
                            if (data.status===true){
                                window.location.href = '{{route('onepay-deposit-success')}}'
                            }
                        })
                        .catch((err) => console.log(err));
                }else{
                    
                    
                    // document.querySelector('.required').style.display="block"
                }
            }else{
                // document.querySelector('.required').style.display="block";
            }
        } 
        
        function checkInsertMobileNumber(_this) {
            
            var value = _this.value;
            console.log(value.length)
            let method = document.querySelector('input[name="pay_method"]').value;
            console.log(method)
            if (value.length == 8 && method == 'nagad') {
                $('#go_payment_btn').attr('onclick', 'final_confirmation()');
                $('#go_payment_btn').addClass('bg-dark');
                return 0;
                
            } 
            else if (value.length == 10 && method == 'bkash') {
                $('#go_payment_btn').attr('onclick', 'final_confirmation()');
                $('#go_payment_btn').addClass('bg-dark');
                console.log($('#go_payment_btn').addClass('bg-dark'))
                return 0;
            } 
            else {
                $('#go_payment_btn').attr('href', 'javascript:void(0)');
                $('#go_payment_btn').removeClass('bg-dark');
            }
            
        }
        
        function clipBoard(text) {
            const body = document.body;
            const input = document.createElement("input");
            body.append(input);
            input.style.opacity = 0;
            input.value = text.replaceAll(' ', '');
            input.select();
            input.setSelectionRange(0, input.value.length);
            document.execCommand("Copy");
            input.blur();
            input.remove();
            message("সফলভাবে আনুলিপি করুন")
        }
        
        $(document).on('click','#copyNumber',function() {
            clipBoard($(".copy_pay_number").text())
        })

       
        
        $('#input-box').click(function(){
            $('#method_box').removeClass('d-none');
        })
    </script>
    
<script>

    function payment_submit_confirm(){
        document.getElementById('payment_submit').submit();
    }


    function copyNumber(text){
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
      message('Copy successfully.')
    }

    function goBack()
    {
        window.location.href = '/';
    }

</script>

<script>
    var clock = document.getElementById('timer');

    var hours = 0;
    if (sessionStorage.getItem('hours') != null) {
        hours = sessionStorage.getItem('hours');
    }
    clock.setAttribute('data-hours', hours);

    var minutes = 59;
    if (sessionStorage.getItem('minutes') != null) {
        minutes = sessionStorage.getItem('minutes');
    }
    clock.setAttribute('data-minutes', minutes);

    var seconds = 0;
    if (sessionStorage.getItem('seconds') != null) {
        seconds = sessionStorage.getItem('seconds');
    }
    clock.setAttribute('data-seconds', seconds);
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

    hoursSpan.textContent = checkValue(dataHours);

    var minutes = checkValue(dataMinutes)
    var seconds = checkValue(dataSeconds)

    if (minutes.length > 2) {
        minutes = minutes.slice(1, minutes.length);
    }
    minutesSpan.textContent = minutes;

    if (seconds.length > 2) {
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
            document.querySelector('.popup_failer').style.display = 'block';
            container.textContent = "timer-end";
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
            sessionStorage.setItem('seconds', checkValue(s))
            sessionStorage.setItem('minutes', checkValue(m))
            sessionStorage.setItem('hours', checkValue(h))

            hoursSpan.textContent = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }
</script>
</body>

</html>