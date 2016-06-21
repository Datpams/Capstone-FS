<!DOCTYPE html><!--EDITTING-->
<html>
<head>
	<title>@yield('page-title')</title>
	
<meta content="initial-scale=1.0, width=device-width" name="viewport">



<link href="home/css/bootstrap.min.css" rel="stylesheet">
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/css/prettyPhoto.css" rel="stylesheet">
    <link href="home/css/price-range.css" rel="stylesheet">
    <link href="home/css/animate.css" rel="stylesheet">
    <link href="home/css/main.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="home/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="home/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="home/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="home/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="home/images/ico/apple-touch-icon-57-precomposed.png">

</head>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 09234567910</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> flowershop@gmail.com</a></li>
                        </ul>
                    </div>
                </div><!--col 6-->
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </uf>
                    </div>
                </div><!--col 6-->
            </div><!--row-->
        </div><!--container-->
    </div><!--/header_top-->
        
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <h4><a style = "color: #ff3385" href="{{action('PagesController@home')}}">Flower Shop</a></h4>
                    </div>
                </div><!--col 4-->
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                        <li><a href="{{action('PagesController@checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        <li><a href="{{ action('CartController@index') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                        <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div><!--col 8-->
            </div>
        </div>
    </div><!--/header-middle-->
    
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- navbar header-->
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="index.html" class="active">Flowers</a></li>
                        	<ul role="menu" class="sub-menu">
                            	<li><a href="#">Rpses</a></li>
                                <li><a href="#">Lily</a></li> 
                                <li><a href="#">Herbium</a></li> 
                                <li><a href="#">Anthurium</a></li> 
                            </ul>
                        <li class="dropdown"><a href="#">Bouquet Types<i class="fa fa-angle-down"></i></a></li> 
                        <li><a href="404.html">Event Motifs</a></li>
                        <li><a href="contact-us.html">Your Budget</a></li>
                    </ul>
                </div><!--mainmenu pull-left -->
              	</div><!-- col 9-->
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div><!--col 3-->
            </div><!--row-->
       	</div><!-- container-->
    </div><!--/header-bottom-->
</header><!--  /header  -->

<section>
    @yield('heading')
</section>

@yield('banner')


@yield('aside')




		
				  			<!--<li {{{ (Request::is('/') ? 'class=active' : '') }}}>
								<a href="{{action('PagesController@home')}}"><span class="icon icon-home">HOME</span>
								</a>
				 			</li>
							<li {{{ (Request::is('flowers') ? 'class=active' : '') }}}>
								<a href="{{action('PagesController@flowers')}}"><strong>FLOWERS</strong></a>
				  			</li>
							<li {{{ (Request::is('events') ? 'class=active' : '') }}}>
								<a href="{{action('PagesController@events')}}"><strong>EVENTS</strong></a>
				  			</li>
				  			<li {{{ (Request::is('events') ? 'class=active' : '') }}}>
								<a href="{{action('PagesController@events')}}"><strong>PACKAGES</strong></a>
				  			</li>
				  			<li {{{ (Request::is('events') ? 'class=active' : '') }}}>
								<a href="{{action('PagesController@events')}}"><strong>OTHER ITEMS</strong></a>
				  			</li>-->
						
@yield('home-body')

	<script src="home/js/jquery.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/jquery.scrollUp.min.js"></script>
    <script src="home/js/price-range.js"></script>
    <script src="home/js/jquery.prettyPhoto.js"></script>
    <script src="home/js/main.js"></script>
	
</body>
</html>


