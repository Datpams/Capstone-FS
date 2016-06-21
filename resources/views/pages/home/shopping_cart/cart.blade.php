@section('page-title')
	Your Shopping Cart!
@stop


@extends('home-base')

@section('home-body')

<script type="text/javascript" src="/js/base.min.js"></script>


@section('heading')
	<div class = "container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{action('PagesController@home')}}">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div><!--/breadcrumb-->
	</div>
	
@stop	


<script type="text/javascript">
	
	function e (){
		document.getElementById("quantity").setAttribute("disabled", false);
	}
});
</script>

<section>
    <div class="container">
     <div class="row">

        <div class="col-md-12">
            <p class = "lead">You currently have * item(s) in your cart.</p>
        </div>

        <div class="col-md-9">
           <div class="box">
                <div class="table-responsive">
                    	<table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
							<th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                        <tr>
                        	<td><img src="/img/{{ $cart->fimage }}" style="height: 50px; width: 50px"></td>
							<td>{{ $cart->name }}</td>
							<td>Php {{number_format($cart->price, 2)}}</td>
							<td>{{$cart->quantity}}</td>
							<td>Php {{$cart->price * $cart->quantity}}.00</td>
							<td>
							<div class="col-md-10">
							<a class="btn btn-default" href="shoppingCart/{{$cart->id}}/show"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger" href="shoppingCart/{{$cart->id}}/delete"><i class="fa fa-edit"></i></a>
							</div>
							</td>
						</tr>
						@endforeach	
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <th colspan="2">P {{number_format($subtotal, 2)}}</th>
                        </tr>
                        </tfoot>
                        </table>
					</div><!-- /.table-responsive -->
					<div class="box-footer">
                    	<div class="pull-left">
                        	<a href="{{ action('PagesController@bouquets')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                        </div>
                            
                        <div class="pull-right">
                        	<!--<button class="btn btn-default"><i class="fa fa-refresh"></i> Update cart</button>
                            <!--<button type="submit" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i></button>-->

                            <a class="btn btn-default" href="{{ action('PagesController@checkout') }}">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
                        </div>
                        </div>
                    </div>
			</div>
<!--ooooooooooooooooooooooOrder Summaryoooooooooooooooooooooooooooo-->
			@if(!empty($subtotal))
                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tbody>
                                    	<tr>
                                    		<td>SHIPPING COST</td>
                                    		<th>P 0.00</th>
                                    	</tr>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th>P {{number_format($subtotal, 2)}}</th>
                                        </tr>
                                        <tr>
                                            <td>Taxes: (12%)</td>
                                            <th>P {{number_format($subtotal*0.12,2)}}</th>
                                        </tr>
                                        <tr>
                                            <td>TOTAL<small>(VAT Incl)</small>:</td>
                                            <th><span>P {{number_format($subtotal+$subtotal*.12, 2)}}</span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--table-->

                    </div><!--ordersummary-->
                </div>
               	@else
		<div class="container">
			<div style="margin-top: 5px">
				<div class="card">
					<div class="card-main">
						<div class="card-inner">
						<p class="title">Your Cart is empty!<br/></p>
						<div class="row col-md-6 text-center">
							<p>Sub total:</p>
							<p>Taxes: (12%)</p>
							<hr>
							<h3>TOTAL(VAT Incl):</h3>
						</div>
						<div class="row col-md-6s text-center">
							<p>-</p>
							<p>-</p>
							<hr>
							<h3>-</h3>
						</div>
						<div class="card-action">
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
</div>
            </div><!--col-md-12-->
    </div><!--row-->
</section>
<!--00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->


<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', function($scope) {
	    $scope.showMe = false;
	    $scope.myFunc = function() {
	        $scope.showMe = !$scope.showMe;
	    }
	});
</script>

@stop