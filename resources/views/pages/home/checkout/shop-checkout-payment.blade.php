@section('page-title')
	Checkout Payment
@stop

@extends('home-base')

@section('home-body')

@section('heading')
	<div class = "container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{action('PagesController@home')}}">Home</a></li>
				<li><a href="{{ action('CartController@index') }}">Shopping Cart</a></li>
				<li class = "active">Checkout</li>
			</ol>
		</div><!--/breadcrumb-->
	</div>
@stop



<script type="text/javascript" src="/js/base.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap.css">


<div aria-hidden="true" class="modal fade" id="myModal" role="dialog" tabindex="-1">
	
	<div class="modal-dialog row">
		<div class="modal-content col-md-12">
			<div class="modal-heading">
				<a class="modal-close" data-dismiss="modal">&times;</a>
				<p class="modal-title">Order Review</p>
			</div>
			<div class="modal-inner">

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>	
			@foreach($carts as $cart)
			<tr>
				<td>{{ $cart->name }}</td>
				<td>Php {{number_format($cart->price, 2)}}</td>
				<td>{{$cart->quantity}}</td>
				<td>Php {{number_format($cart->price * $cart->quantity, 2)}}.00</td>
			</tr>
			@endforeach	
		</tbody>
	</table>


</div>
<div class="col-md-12 pull-right">
			<div class="card">
				<div class="card-main">
					<div class="card-inner">
						<p class="card-heading title ">Order Summary</p>
							<div class="col-md-6 text-center">
								@foreach($carts as $cart)
									<p>{{$cart->name}}({{$cart->quantity}})</p>
								@endforeach
								<hr>
								<p>Sub total:</p>
								<p>Taxes: (12%)</p>
								<hr>
								<h3>TOTAL(VAT Incl):</h3>
							</div>
							<div class="col-md-6 text-center">
								@foreach($carts as $cart)
									<p>P {{number_format($cart->price*$cart->quantity, 2)}}</p>
								@endforeach
								<hr>
								<p>P {{number_format($subtotal, 2)}}</p>
								<p>P {{number_format($subtotal*0.12,2)}}</p>
								<hr>
								<h3>P {{number_format($subtotal+$subtotal*.12, 2)}}</h3>
							</div>
					</div>
				</div>
			</div>
		</div>
			<div class="modal-footer">
			<div class="row">
				<form method="POST" action="checkout/finish-del">
				{{csrf_field()}}
					<div class="col-md-6">
						<input type="hidden" name="cust" value="{{$cust->name}}"></input>
						<input type="hidden" name="custc" value="{{$cust->contactno}}"></input>
						<input type="hidden" name="custa" value="{{$cust->address}}"></input>
						<input type="hidden" name="transaction" value="{{$transaction->id}}"></input>
						<input type="hidden" name="transactiondate" value="{{$transaction->delpick}}"></input>
						<input type="submit" value="PLACE ORDER" class="btn btn-red waves-button waves-effect pull-right"></input>
					</div>
				</form>
				<div class="col-md-6">
				<p class="text-right col-md-6"><button class="btn btn-flat btn-alt" data-dismiss="modal" type="button">Close</button>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>



<section>
<div class="container" ng-app>
	<div class="row" ng-app>
		<div class="col-md-9">
		   <div class="box">
			    
                    <ul class="nav nav-pills nav-justified">
                        <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Order Type</a></li>
						<li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a></li>
						<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a></li>
					</ul>
					
					<div class="col-md-12">
            			<h2 class = "text-center"> Choose from Payment Method</h2>
					</div>

					<div class="content">
						@foreach($pm as $p)
							<div class="col-sm-6">
								
								<div class="box shipping-method">
                                	<h4>{{$p->payment_name}}</h4>
									<p>{{$p->payment_desc}}</p>
                                <div class="box-footer text-center">
									<input data-toggle= "modal" data-target="#myModal" value="Choose"  type="submit" href="myModal" name="{{$p->id}}" class="btn btn-red waves-button waves-effect pull-right"></input>
                               	</div>
                           		</div>
                        </div>	
                        @endforeach                        
                    </div>
			

			<div class="box-footer col-md-12">
                        <div class="pull-left">
                            <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                        </div>
                     <!--   <div class="pull-right">
                            <button type="submit" class="btn btn-template-main">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                            </button>
                         </div>-->
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
</div><!--container-->
</section>
@stop