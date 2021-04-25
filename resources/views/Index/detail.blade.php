<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" href="/X-admin/lib/layui/css/layui.css" media="all">
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

<script type="text/javascript" src="/Index/js/jquery.js"></script>
<script type="text/javascript" src="/Index/js/jqueryui.js"></script>
<script type="text/javascript" src="/Index/js/framework.plugins.js"></script>
<script type="text/javascript" src="/Index/js/custom.js"></script>
</head>
<body>
<div id="preloader">
	<div id="status">
    	<p class="center-text">
            <b>拼 命 加 载 中...</b>
        </p>
    </div>
</div>
<div class="all-elements">
<div id="perspective" class="perspective effect-airbnb"><!--this houses the entire page, and creates the effect-->
    <div class="header">
            <a href="" id="showMenu"><i class="fa fa-navicon"></i></a>
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
    <div class="header-clear"></div>
    <div class="perspective_container"><!--the "moving to the left" content box-->
        <div class="wrapper"><!-- wrapper needed for scroll -->



        <div class="layui-carousel" id="test1"  style="margin-bottom:10px;">
            <div carousel-item >
                <div><img src="{{$detail['0']['goods_picture']}}" class="responsive-image"  alt="img"></div>

                @if($detail_pic['0']['pic1'])
                <div>
                    <img src="{{$detail_pic['0']['pic1']}}" class="responsive-image" alt="img">
                </div>
                @endif
                


            </div>
        </div>

        <script src="/X-admin/lib/layui/layui.js"></script>
        <script type="text/javascript" src="/Index/js/jquery.js"></script>
        <script>
                var ins;
                
                layui.use(['carousel', 'form'], function () {
                            var carousel = layui.carousel;
                            ins = carousel.render({
                                elem: '#test1'
                                , width: '100%'
                                , interval: 4000
                                // , arrow: 'none' //始终不显示箭头
                            });
                        });

                $("#test1").on("touchstart", function (e) {
                    var startX = e.originalEvent.targetTouches[0].pageX;//开始坐标X
                    $(this).on('touchmove', function (e) {
                        arguments[0].preventDefault();//阻止手机浏览器默认事件
                    });
                    $(this).on('touchend', function (e) {
                        var endX = e.originalEvent.changedTouches[0].pageX;//结束坐标X
                        e.stopPropagation();//停止DOM事件逐层往上传播
                        if (endX - startX > 30) {
                            ins.slide("sub"); 
                        }
                        else if (startX - endX > 30) {
                            ins.slide("add"); 
                        }
                        $(this).off('touchmove touchend');
                    });
                });
        </script>





        
        <div class="content">
            <div class="container no-bottom">
                <div class="sidebar-left-small staff-sidebar-small">
                    
                    <h2 class="no-bottom">{{$detail['0']['goods_name']}}</h2>

                    <div class="one-half" style="margin-top: 9px;">
                        <p >
                            {{$detail['0']['goods_cate']}}
                         </p>
                    </div>
                    <div class="two-half last-column" >
                        <p>
                        <span  class="right-text" style="font-size:25px;color:red;margin-right:10px;"> ￥ <strong>{{$detail['0']['goods_price']}}</strong></span>
                        </p>        
                    </div>




                    

                    <div class="decoration"></div>
                    <ul class="font-icon-list">
                        <!-- <li><a href="/Index/#"><i class="fa fa-phone"></i>+ 1 234 556 887</a></li> -->
                        <!-- <li><a href="/Index/#"><i class="fa fa-envelope"></i>mail@domain.com</a></li> -->
                        
                        <!-- <li><a href="/Index/#"><i class="fa fa-clock-o"></i>Available 24/7</a></li> -->
                        <li>
                            <p>{{$detail['0']['goods_desc']}}</p>
                        </li>
                    </ul>
                    <br>
                    @if($detail_pic['0']['pic1'])
                    <img src="{{$detail_pic['0']['pic1']}}" class="responsive-image" alt="img">
                    @endif
                    @if($detail_pic['0']['pic2'])
                    <img src="{{$detail_pic['0']['pic2']}}" class="responsive-image" alt="img">
                    @endif
                    @if($detail_pic['0']['pic3'])
                    <img src="{{$detail_pic['0']['pic3']}}" class="responsive-image" alt="img">
                    @endif
                    @if($detail_pic['0']['pic4'])
                    <img src="{{$detail_pic['0']['pic4']}}" class="responsive-image" alt="img">
                    @endif
                </div>
                <!-- <div class="decoration hide-if-responsive"></div> -->
                <!-- 
                <div class="sidebar-right-big">
                    <h3>About John Doe</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere 
                        convallis urna id mollis. Maecenas justo tellus, tristique vel dignissim non, 
                        pharetra vitae magna.
                    </p>
                    <h3>Skills</h3>
                    <div class="sidebar-left-small">
                        <ul>
                            <li>Front End Coding</li>
                            <li>Back End Coding</li>
                            <li>UI / UX Design </li>
                            <li>WordPress Coding</li>
                            <li>HTML 5 Coding</li>
                            <li>CSS 3 Coding</li>
                        </ul>
                    </div>
                    <div class="sidebar-right-big">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere 
                            convallis urna id mollis. Maecenas justo tellus, tristique vel dignissim non, 
                            pharetra vitae magna. Maecenas justo tellus, tristique vel dignissim non, 
                            pharetra vitae magna.
                        </p>
                    </div>
                    <div class="clear"></div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere 
                        convallis urna id mollis. Maecenas justo tellus, tristique vel dignissim non, 
                        pharetra vitae magna. Nunc mattis pretium dictum. In aliquam lacus est, eu 
                        vestibulum arcu ultrices sed.Nunc mattis pretium dictum. In aliquam lacus est, eu 
                        vestibulum arcu ultrices sed. 
                    </p>
                </div>
            </div>
            
            <div class="decoration"></div>
            
            <div class="footer-section">
                <p class="footer-text">
                    Copyright 2014.<br>
                    All rights reserved.
                </p>
                <div class="footer-icons">
                    <a href="/Index/#" class="footer-facebook-icon"><i class="fa fa-facebook"></i></a>
                    <a href="/Index/#" class="footer-google-icon"><i class="fa fa-google-plus"></i></a>
                    <a href="/Index/#" class="footer-twitter-icon"><i class="fa fa-twitter"></i></a>
                    <a href="/Index/#" class="footer-up-icon"><i class="fa fa-angle-up"></i></a>
                </div>
            </div> -->
            
        </div>         
      
        </div><!-- wrapper -->
    </div><!-- /perspective container -->
</div><!-- /perspective -->
</div>
<script type="text/javascript" src="/Index/js/menu.js"></script>
</body>
</html>
