<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Index/images/splash-icon.png">
<link rel="apple-touch-startup-image" href="/Index/images/splash-screen.png" 			media="screen and (max-device-width: 320px)" />  
<link rel="apple-touch-startup-image" href="/Index/images/splash-screen@2x.png" 		media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" /> 
<link rel="apple-touch-startup-image" sizes="640x1096" href="/Index/images/splash-screen@3x.png" />
<link rel="apple-touch-startup-image" sizes="1024x748" href="/Index/images/splash/splash-screen-ipad-landscape" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)" />
<link rel="apple-touch-startup-image" sizes="768x1004" href="/Index/images/splash-screen-ipad-portrait.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)" />
<link rel="apple-touch-startup-image" sizes="1536x2008" href="/Index/images/splash-screen-ipad-portrait-retina.png"   media="(device-width: 768px)	and (orientation: portrait)	and (-webkit-device-pixel-ratio: 2)"/>
<link rel="apple-touch-startup-image" sizes="1496x2048" href="/Index/images/splash-screen-ipad-landscape-retina.png"   media="(device-width: 768px)	and (orientation: landscape)	and (-webkit-device-pixel-ratio: 2)"/>
<title>崔锋宠物店-welcome</title>
<link href="/Index/css/style.css"     		 rel="stylesheet" type="text/css">
<link href="/Index/css/framework.css" 		 rel="stylesheet" type="text/css">
<link href="/Index/css/menu.css" 		 	 rel="stylesheet" type="text/css">
<link href="/Index/css/owl.theme.css" 		 rel="stylesheet" type="text/css">
<link href="/Index/css/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="/Index/css/font-awesome.css"	 rel="stylesheet" type="text/css">
<link href="/Index/css/animate.css"			 rel="stylesheet" type="text/css">
<script src="/Index/js/glovebox.js"></script>
<script type="text/javascript" src="/Index/js/jquery.js"></script>
<script type="text/javascript" src="/Index/js/jqueryui.js"></script>
<script type="text/javascript" src="/Index/js/framework.plugins.js"></script>
<script type="text/javascript" src="/Index/js/custom.js"></script>
<style>
    /* 一行超出省略 */
    .oneaa-line
    {
        overflow: hidden;
        width:8em; 
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
</head>
<body>
<div id="preloader">
	<div id="status">
    	<p class="center-text">
			<b>拼 命 加 载 中...</b>
            <em></em>
        </p>
    </div>
</div>
<div class="all-elements">
    <!-- <div id="perspective" class="perspective effect-airbnb">this houses the entire page, and creates the effect -->
    <div id="perspective" class="perspective effect-airbnb"><!--this houses the entire page, and creates the effect-->
        <div class="header">
            <span href="#" id="showMenu"><i class="fa fa-navicon"></i></span>
            <a href="/" id="pageLogo"><img src="/Index/images/logo.png" alt="img"></a>
            <a href="/" id="openMail"><i class="fa fa-envelope-o"></i></a>
        </div> 	
        <div class="outer-nav">
        <div class="inner-nav">
            <div class="nav-item">
                <a href="/" class="active-item">
                    <i class="nav-icon fa fa-home"></i>
                    首页
                </a>
            </div>
            <div class="nav-item">
                <a href="/cates/all">
                    <i class="nav-icon fa fa-search-minus"></i>
                    全部分类
                </a>
            </div>
            
            <div class="nav-item">
                <a href="/list/all">
                    <i class="nav-icon fa fa-gift"></i>
                    全部商品
                </a>
            </div>
            
            <!-- <div class="nav-item">
                <a href="#" class="deploy-nav-sub-item">
                    <i class="nav-icon fa fa-picture-o"></i>
                    投资组合
                </a>
                <div class="nav-sub-item">
                    <a href="portfolio-adaptive.html">Adaptive</a>
                    <a href="portfolio-one.html">One Column</a>
                    <a href="portfolio-two.html">Two Columns</a>
                    <a href="portfolio-wide.html">Wide Columns</a>
                </div>
            </div> -->
            
            
            <div class="nav-item">
                <a id="closeMenu" href="#">
                    <i class="nav-icon fa fa-times"></i>
                    关闭
                </a>
            </div>
        </div>
    </div>
        <div class="perspective_container"><!--the "moving to the left" content box-->
            <div class="wrapper"><!-- wrapper needed for scroll -->

<!--轮播图计时器-->
<div class="header-clear"><i class="fa fa-times"></i></div>



            <!-- <div class="content-strip"> -->
                <!--<h4>350元/KG</h4>-->
                <!--<p>巴 西 精 选 鳄 鱼 肋 骨</p>-->
                <!--<i class="fa fa-cogs"></i>-->
                <!-- <i class="" style="left:30px;"></i> -->
                <!--<div class="overlay"></div>-->
                <!-- <img src="/Index/images/3.jpg" alt="img"> -->
            <!-- </div> -->
            <h3 class="center-text" style="margin-top:10px">{{$cate_name}}</h3>

                <div class="content">
                    <!-- <div class="decoration" style="margin-bottom:5px"></div> -->

                    <div class="container no-bottom">
                        @foreach($goods_list as $list)

                        <!-- <div class="one-half-responsive"  onclick="window.open('/goods/detail/{{$list['id']}}','_self')">
                                <p class="thumb-left-list no-bottom">
                                    <img src="{{$list['goods_picture']}}" alt="img">
                                    <div>
                                        <strong>{{$list['goods_name']}}</strong><br>
                                        <span class="oneaas-line">{{$list['goods_desc']}}</span>
                                        <br><strong style="font-size:150%;color:red">{{$list['goods_price']}}</strong> <font style="color:red;">元</font>
                                    </div>
                                    
                                </p>
                        </div> -->

                        <div onclick="window.open('/goods/detail/{{$list['id']}}','_self')">
                            <div class="one-half" style="margin-right:0%;width: 35%;">
                                <p class="thumb-left-list no-bottom">
                                    <img src="{{$list['goods_picture']}}" alt="img">
                                </p>
                            </div>
                            <div class="two-half last-column" style="line-height: 250%;">
                                <strong>{{$list['goods_name']}}</strong><br>
                                <span class="oneaa-line">{{$list['goods_desc']}}</span>
                                <br><strong style="font-size:150%;color:red">{{$list['goods_price']}}</strong> <font style="color:red;">元</font>
                            </div>
                        </div>
                    
                        <div class="decoration-list hide-if-responsive"></div>
                           
                        @endforeach
                    </div>
                </div>
            
                
                <!-- 尾巴 -->
                <!-- <div class="footer-section">
                    <p class="footer-text">
                        Copyright 2014.<br>
                        All rights reserved.
                    </p>
                    <div class="footer-icons">
                        <a href="#" class="footer-facebook-icon"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="footer-google-icon"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="footer-twitter-icon"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="footer-up-icon"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div> -->
            
            </div><!-- wrapper -->
        </div><!-- /perspective container -->
    </div><!-- /perspective -->
</div>
<script type="text/javascript" src="/Index/js/menu.js"></script>
</body>
</html>
