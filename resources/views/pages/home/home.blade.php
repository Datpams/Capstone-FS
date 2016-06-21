
@section('page-title')
    Home
@stop

@extends('home-base')

<style type="text/css">
    .something {

    }
</style>
@section('banner')
<section><!-- banner-->
<div class= "container"><img src="home/images/home/j.jpg" class="girl img-responsive" alt="" /></div>
</section>
@stop
@section('aside')
<aside><!--navbar-->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Services</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title" {{{ (Request::is('bouquets') ? 'class=active' : '') }}}>
                            <a href="{{action('PagesController@bouquets')}}" >Birthdays</a></h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title" {{{ (Request::is('bouquets') ? 'class=active' : '') }}}>
                            <a href="{{action('PagesController@bouquets')}}" >Weddings</a></h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title" {{{ (Request::is('bouquets') ? 'class=active' : '') }}}>
                            <a href="{{action('PagesController@bouquets')}}" >Party Needs</a></h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title" {{{ (Request::is('bouquets') ? 'class=active' : '') }}}>
                            <a href="{{action('PagesController@bouquets')}}" >Funeral</a></h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title" {{{ (Request::is('bouquets') ? 'class=active' : '') }}}>
                            <a href="{{action('PagesController@bouquets')}}" >Inaugurations</a></h4>
                        </div>
                    </div>
                     
                </div><!--/category-products-->
                    

                        
                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[100,1000]" id="sl2" ><br />
                        <b class="pull-left">P 0</b> <b class="pull-right">P 10,000</b>
                    </div>
                </div><!--/price-range-->
            </div><!--left side-bar-->
        </div><!--col 3-->
        <div class="col-md-9">
                   <script type="text/javascript" src="/js/base.min.js"></script>



<div class="padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product3.jpg" alt="" />
                                <h2>BOUQUETS</h2>
                                <a href="{{action('PagesController@bouquets')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product3.jpg" alt="" />
                                <h2>CHOCOLATES</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product3.jpg" alt="" />
                                <h2>EVENTS</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product1.jpg" alt="" />
                                <h2>WINES</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product3.jpg" alt="" />
                                <h2>CAKES</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="home/images/home/product1.jpg" alt="" />
                                <h2>VASES</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Start Shopping</a>
                        </div>
                    </div><!--single products-->
                </div><!--product wrapper-->
            </div><!--col 4-->
    </div><!--/feature items-->
</div><!--paddiing right-->
                    @yield('mid-body')
                </div>
    </div><!--row-->
</div><!--container-->
</aside><!--side navbar-->
@stop


@section('mid-body')
@stop

