
@section('page-title')
	Checkout
@stop

@extends('home-base')

<style type="text/css">
	.something {

	}
</style>

@section('home-body')

<script type="text/javascript" src="/js/base.min.js"></script>

@section('heading')
	Checkout
@stop

<form action="checkout" method="POST">
{{csrf_field()}}
<div class="row col-md-12"><!--whole-->
	<div class="row col-md-9"><!--divider-->
		

<div class="container">
<div class="row col-md-9">
<div class = "row col-md-12"><!--customerInfo and OrderForm-->
	<div class="card">
		<div class="row col-md-12">
			<div class="container">
				<div class = "container">
					<h4 class = "title">Customer Information</h4>
					<div class="card-inner">
						<div class="container">
							<div class="form-group form-group-label form-group-purple">
								<div class="col-lg-4 col-md-12 col-sm-8">
									<label class="floating-label" for="float-text-purple">Name</label>
									<input class="form-control" id="float-text-purple" type="text" name="custname" required>	
								</div>
							</div>
						</div>
						<div class="container">
							<div class="form-group form-group-label form-group-purple">
								<div class="col-lg-4 col-md-6 col-sm-8">
									<label class="floating-label" for="float-text-purple">Contact Number</label>
									<input class="form-control" id="float-text-purple" type="number" name="contactno" required>
								</div>
								<div class="form-group form-group-label form-group-purple">
									<div class="col-lg-4 col-md-6 col-sm-8">
										<label class="floating-label" for="float-text-purple">Email</label>
										<input class="form-control" id="float-text-purple" type="email" name="custemail" required>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="form-group form-group-label form-group-purple">
								<div class="col-lg-4 col-md-12 col-sm-8">
									<label class="floating-label" for="float-text-purple">Address</label>
									<input class="form-control" id="float-text-purple" type="text" name="custaddress" required>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="form-group form-group-label form-group-purple">
						<div class="col-lg-4 col-md-12 col-sm-8">
							<label class="floating-label" for="float-text-purple">Business</label>
							<input class="form-control" id="float-text-purple" type="text" name="custbusiness">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--div class=card-->
	<!--orderForm-->
	<div class = "container" style="margin-bottom: 100px">
		<div class="container">
		
		</div>
	</div>
	<!--end orderForm-->
</div><!--end customerInfo and orderForm-->	
	<!--eto mga formsss-->
</div><!--col-md-12-->
<div class = "pull-right">

</div>
</div><!--customer and order information-->

</div><!--end divider-->
<!--000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->
	<!--right form-->
</div>
</div>
<div style="margin-left: 650px; margin-bottom: 100%" class="row col-md-6">
			<div class="container">
				<div class="row col-md-12">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner">
										<p class="title">Order Summary</p>
											<div class="container">
												<!--dito ilalagay ung mga flowers-->
											
											</div>
											<div class="row col-md-6 text-center">
												<p>Items</p>
												@foreach($carts as $cart)
												<p>{{$cart->name}} ({{$cart->quantity}})</p>
												@endforeach
												<hr>
												<p>Sub total:</p>
												<p>Shipping fee:(fixed)</p>
												<p>Taxes: (12%)</p>
												<hr>
												<h3>TOTAL:</h3>
											</div>
											<div class="row col-md-6s text-center">
												<p>Amount</p>
												@foreach($carts as $cart)
												<p>P {{$cart->price*$cart->quantity}}</p>
												@endforeach
												<hr>
												<p>P {{$subtotal}}</p>
												<p>P100</p>
												<p>P {{$subtotal*.12}}</p>
												<hr>
												<h3>P {{$subtotal+$subtotal*.12+100}}</h3>
											</div>
											<div class="col-md-10 text-center" style="margin-left: 45px">
											<button class="btn btn-red btn-flat waves button waves-effect" type = "button">CANCEL</button>
											<input value="CONFIRM" class="btn btn-blue btn-flat waves button waves-effect" type ="submit"></input>
											</div>

									</div>
									<div class="card-action">
										
									</div>
								</div>
							</div>
							</div>

				</div>
				
		</div>
	</div>
</div><!--end whole-->
</form>
<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->	
@stop