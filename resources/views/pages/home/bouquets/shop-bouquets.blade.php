@section('page-title')
	Bouquets
@stop
@extends('home-base')


@section('heading')
	<div class = "container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Bouquets</li>
			</ol>
		</div><!--/breadcrums-->
	</div>
@stop
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

	@if (Session::has('message'))
		<script type="text/javascript">
		    $(window).load(function(){
		        $('#myModal').modal('show');
		    });
		</script>
		<div aria-hidden="true" class="modal fade" id="myModal" role="dialog" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-heading">
						<a class="modal-close" data-dismiss="modal">&times;</a>
						<h2 class = "title">Notice!</p>
					</div>
					<div class="modal-inner">
						<h3 id="msg" class="text-center">{{ Session::get('message') }}</h3>
					</div>
					<div class="modal-footer">
						<p class="text-right"><button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
						<a style = "font-color:#" href="{{ action('CartController@index') }}" class= "btn btn-default cart" type = "button"><i class="fa fa-shopping-cart"></i> Cart</a>
					</div>
				</div>
			</div>
		</div>
	@endif
	<!--<script type="text/javascript">
		$('#myModal').delay(3000).fadeOut('slow');
	</script>-->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<script>
		function myFunction() {
	    	
		}
	</script>

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Bouquets</h2>


    @foreach($bouquets as $bouquet)                                          
        <div class ="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img alt="alt text" src="/img/{{ $bouquet->fimage }}" style="height: 250px; width: 100%">
                        <h4>{{ $bouquet->name }}</h4>
                        <p class="text-muted">{{ $bouquet->desc }}</p>
                        <h2 class="title">Php {{ $bouquet->price }}</h2>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>ADD TO CART</a>
                    </div>

                    <div class="product-overlay" style = "background-color:rgba(255, 0, 0, 0.8)">
                        <div class="overlay-content">
                            <form method="POST" action="shopAddBouquet">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class = "col sm-4">
                                    <label style = "color:#ffffff">Quantity</label>
                                    <input class="form-control" type="number" name="boqQty" min="1">
                                </div>
                                <input type="hidden" value="{{ $bouquet->name }}" name="name"></input>
                                <input type="hidden" value="{{ $bouquet->price }}" name="price"></input>
                                <input type="hidden" value="{{ $bouquet->fimage }}" name="fimage"></input>
                            </div>
                                <input type="submit" class="btn btn-default add-to-cart" value="ADD TO CART" style="margin-bottom: 15px" name="addToCart"></input>
                            </form>
                        </div><!--single products-->
                    </div><!--product wrapper-->
                </div><!--col 5-->
            </div><!--product info-->
        </div> <!--col 7-->                 
    
@endforeach
</div><!--col 4-->


                    @yield('mid-body')
                </div>
    </div><!--row-->
</div><!--container-->
</aside><!--side navbar-->
@stop



