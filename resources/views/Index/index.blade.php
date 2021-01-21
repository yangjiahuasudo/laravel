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
<title>崔锋宠物店-welcome </title>
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
    .three-line-on{
        overflow: hidden;
        text-overflow: ellipsis;
        display: box;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
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
    <div class="perspective_container"><!--the "moving to the left" content box-->
        <div class="wrapper"><!-- wrapper needed for scroll -->
<!--轮播图计时器-->
            <div class="header-clear"><i class="fa fa-times"></i></div>
<!--轮播图图片-->
            <div class="slider-container full-bottom">
                
                
                <div class="homepage-slider" data-snap-ignore="true">  
                    
                    @foreach($lunbos as $lunbo)
                    <div>
                        <div class="overlay"></div>
                        <div class="homepage-slider-caption">
                            <h3>{{$lunbo['name']}}</h3>
                            <p>{{$lunbo['desc']}}</p>
                        </div>
                        <img src="{{$lunbo['pic']}}" class="responsive-image" alt="img">
                    </div>
                    @endforeach
<!--                    <div>
                        <div class="overlay"></div>
                        <div class="homepage-slider-caption">
                            <h3>Slider</h3>
                            <p>Our slider is awesome!</p>
                        </div>
                        <img src="/Index/images/5ww.jpg" class="responsive-image" alt="img">
                    </div>
                    <div>
                        <div class="overlay"></div>
                        <div class="homepage-slider-caption">
                            <h3>Responsive</h3>
                            <p>And it's fully responsive!</p>
                        </div>
                        <img src="/Index/images/6ww.jpg" class="responsive-image" alt="img">
                    </div>-->
                </div>
            </div>

<!-- 一层 -->
            @if(isset($floor['1']))
            <div class="content">
            	<div class="page-heading container">
                    <p>
						{{$first_floor['0']->first_line}}
                    </p>
                    
                    <a href="#">{{$first_floor['0']->second_line}}</a>
                </div>    
                <!-- <div class="decoration"></div>         -->
            </div>
            @endif
            
<!--二层  店长推荐-->
            @if(isset($floor['2']))
            <!-- 楼层标题 -->
            <div class="content-strip">
                <h4>{{$second_floor['0']['goods_name']}}</h4>
                <p> {{$second_floor['0']['goods_price']}} /只</p>
                <!--<i class="fa fa-cogs"></i>-->
                <i class="">{{$floor['2']['name']}}</i>
                <div class="overlay"></div>
                <img src="{{$floor['2']['pic']}}" alt="img">
            </div>
            <!-- 楼层内容 -->
            <div class="content">
            	<!--<div class="decoration"></div>-->
                <div class="container no-bottom">
                    <div class="one-half-responsive">
                        <p class=" no-bottom">
                            <a href="/goods/detail/{{$second_floor['0']['id']}}">
                            <img src="{{$second_floor['0']['goods_picture']}}" alt="img"></a>
                            
                            <!--<strong>巴西臭水湖鳄鱼</strong>-->
                            <!--<em><br>越吃越香，贼几把下饭</em>-->
                        </p>
                        <div class="thumb-clear"></div>
                    </div>
                    <!--<div class="decoration hide-if-responsive"></div>-->
                </div>
            </div>
            @endif

<!--三层    分类信息-->
            @if(isset($floor['3']))
            <!-- 楼层标题 -->
            <div class="content-strip">
                <h4>{{$floor['3']['name']}}</h4>
                <p>{{$floor['3']['title']}}</p>
                <i class="fa fa-picture-o"></i>
                <div class="overlay"></div>
                <img src="{{$floor['3']['pic']}}" alt="img">
            </div>
            <!-- 楼层内容 -->
            <div class="content">
                <!-- <div class="decoration"></div> -->
                <!--<div class="container">
                    <p class="no-bottom">
                        A touch image gallery is here to complete the template, 
                        you can add titles, and text, or simply leave the thumbnails 
                        there with no text around them! Nothing complicated, 
                        just a copy paste!
                    </p>
                </div>         -->
    
                <ul class="gallery">
                    
                    @foreach($cates as $cate)
                    <li>
                        <a class="" href="/goods/list/{{$cate['id']}}" title="{{$cate['name']}}">
                            <img src="{{$cate['pic']}}" alt="img" />
                        <br>
                        {{$cate['name']}}
                        </a>
                    </li>
                    @endforeach
                </ul>   
                <!-- <div class="decoration"></div>         -->
            </div>
            @endif
            
<!--四层    店内精选-->
            @if(isset($floor['4']))
            <!-- 楼层标题 -->
             <div class="content-strip">
                <!--<h4>350元/KG</h4>-->
                <!--<p>巴 西 精 选 鳄 鱼 肋 骨</p>-->
                <!--<i class="fa fa-cogs"></i>-->
                <i class="" style="left:30px;">{{$floor['4']['name']}}</i>
                <!--<div class="overlay"></div>-->
                <img src="{{$floor['4']['pic']}}" alt="img">
            </div>

            <!-- 楼层内容 -->
            <div class="content">
            	<!-- <div class="decoration"></div> -->
                <div class="container no-bottom">
                    @foreach($fourth_floors as $fourth_floor)
                        @if($fourth_floor['location'] == 'left')
                        <div class="one-half-responsive">
                            <a href="/goods/detail/{{$fourth_floor['id']}}">
                                <p class="thumb-left no-bottom">
                                    <img src="{{$fourth_floor['goods_picture']}}" alt="img">
                                    <strong>{{$fourth_floor['goods_name']}}</strong><br>
                                    <em class="three-line-on">{{$fourth_floor['goods_desc']}}</em>
                                </p>
                            </a>
                            <div class="thumb-clear"></div>
                        </div>
                        <div class="decoration hide-if-responsive"></div>
                        @else
                        <div class="one-half-responsive last-column">   
                            <a href="/goods/detail/{{$fourth_floor['id']}}">         
                                <p class="thumb-right no-bottom">
                                    <img src="{{$fourth_floor['goods_picture']}}" alt="img">
                                    <strong>{{$fourth_floor['goods_name']}}</strong>
                                    <em><br>{{$fourth_floor['goods_desc']}}</em>
                                </p>
                            </a>
                            <div class="thumb-clear"></div>
                        </div>
                        <div class="decoration hide-if-responsive"></div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif


            <!--另类肉食-->
            @if(isset($floor['5']))
            <div class="content-strip">
                <h4>{{$floor['5']['name']}}</h4>
                <p>{{$floor['5']['title']}}</p>
                <!--<i class="fa fa-user"></i>-->
                <div class="overlay"></div>
                <img src="/Index/images/6w.jpg" alt="img">
            </div>         
            <div class="content">
                <div class="decoration"></div>
                <div class="container">
                    <a href="#" class="next-staff"></a>
                    <a href="#" class="prev-staff"></a>
                    <div class="staff-slider">
                        <div>
                            <div class="staff-item">
                                <img src="/Index/images/1s.jpg" alt="img">
                                <h4>非洲灵猴</h4>
                                <em>猴脑</em>
                                <strong>现捉的非洲灵猴，一猴顶10猴，快快下单吧，点击图片了解详情</strong>
                                <!--<a href="#" class="button button-red center-button">Call</a>-->
                            </div>
                        </div>
                        <div>
                            <div class="staff-item">
                                <img src="/Index/images/2s.jpg" alt="img">
                                <h4>中国熊猫</h4>
                                <em>熊掌</em>
                                <strong>东北辽宁捉住的熊猫，一只大熊猫八条腿，特别大补，皇帝专供，点击图片了解详情</strong>
                                <!--<a href="#" class="button button-green center-button">Text</a>-->
                            </div>
                        </div>
                        <div>
                            <div class="staff-item">
                                <img src="/Index/images/3s.jpg" alt="img">
                                <h4>欧洲白鸽</h4>
                                <em>整只</em>
                                <strong>专门饲养的鸽子，欧洲空运，活的，可吃，可养，贼好玩，你不来一只吗，点击图片了解详情</strong>
                                <!--<a href="#" class="button button-blue center-button">Mail</a>-->
                            </div>
                        </div>
                        
                    </div>
                </div>  
                <div class="decoration"></div>
            </div>
            @endif
            
            <!-- 六楼 -->
            @if(isset($floor['6']))
            <div class="content-strip">
                <h4>{{$floor['6']['name']}}</h4>
                <p>{{$floor['6']['title']}}</p>
                <i class="fa fa-star-o"></i>
                <div class="overlay"></div>
                <img src="/Index/images/7w.jpg" alt="img">
            </div>
            
            <div class="content">
                <div class="decoration"></div>
                    <div class="container">
                        <div class="one-half-responsive">
                            <img src="/Index/images/mobile.png" alt="img" class="responsive-image">
                        </div>
                        <div class="one-half-responsive last-column">
                            <h3 class="center-if-mobile">苹果15</h3>
                            <em class="center-if-mobile small-text">现在只需1500即可预约</em>
                            <p class="center-if-mobile no-bottom">
                                1.外观设计 1、iPhone 12系列采用了类似iPhone 4的直角边框的硬朗设计,超窄幅前额全屏,正面依然为刘海全面屏设计。同时,iPhone 12系列缩小了一部分...
                                2.性能续航 1、硬件方面iPhone 12全系均搭载基于5nm工艺制程打造的A14处理器...
                                3.影像系统 1、iPhone 12系列还将延续前作的方形相机模组,其中,两款 iPhone...
                                4.价格 1、在售价方面,外媒也对iPhone12系列手机进行了价格推测,iPhone 12
                            </p>
                        </div>
                    </div>
                <div class="decoration"></div>
            </div>
            @endif
            
            
            

            <!-- 七楼 -->
            @if(isset($floor['7']))
            <div class="content-strip">
            	<h4>{{$floor['7']['name']}}</h4>
                <p>{{$floor['7']['title']}}</p>
                <i class="fa fa-user"></i>
                <div class="overlay"></div>
                <img src="/Index/images/6w.jpg" alt="img">
            </div>
            
            <div class="content">
            	<div class="decoration"></div>
                
                <div class="quote-slider full-bottom">
                    <div>
                    	<h4>
                            忆梅下西洲，折梅寄江北。
                            单衫杏子红，双鬓鸦雏色。
                            西洲在何处？两桨桥头渡。
                        </h4>
                        <a href="#">《西洲曲节选一》</a>
                    </div>
                    <div>
                    	<h4>
                            日暮伯劳飞，风吹乌臼树。
                            树下即门前，门中露翠钿。
                            开门郎不至，出门采红莲。
                        </h4>
                        <a href="#">《西洲曲节选二》</a>
                    </div>
                    <div>
                    	<h4>
                            采莲南塘秋，莲花过人头。
                            低头弄莲子，莲子清如水。
                            置莲怀袖中，莲心彻底红。
                        </h4>
                        <a href="#">《西洲曲节选三》</a>
                    </div>
                </div>
                
                <div class="decoration"></div>            
            </div>
            @endif
            
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
