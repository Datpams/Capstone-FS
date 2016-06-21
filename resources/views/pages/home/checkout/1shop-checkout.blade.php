@extends('home-base')
@section('page-title')
	Checkout
@stop



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

@section('home-body')

<script type="text/javascript" src="/js/base.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap.css">


	@if (Session::has('message'))
		<script type="text/javascript">
		    $(window).load(function(){
		        $('#myModal').modal('show');
		    });
		</script>
		<div aria-hidden="true" class="modal fade" id="myModal" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-xs">
				<div class="modal-content">
					<div class="modal-heading">
						<a class="modal-close" data-dismiss="modal">&times;</a>
						<p class="modal-title"><i class="icon icon-error"></i> Warning!</p>
					</div>
					<div class="modal-inner">
						<h1 id="msg" class="text-center">{{ Session::get('message') }}</h1>
					</div>
					<div class="modal-footer">
						<p class="text-right"><button class="btn btn-flat btn-alt" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>
	@endif

<section>
<div class="container" ng-app>
	<div class="row" ng-app>
		<div class="col-md-9">
		   <div class="box">
			    
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Order Type</a></li>
						<li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a></li>
						<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a></li>
					</ul>
					
					<div class="col-md-12">
            			<h2 class = "text-center"> Choose your Order Type</h2>
					</div>

					<div class = "col-md-6">
						<div class = "box">
						<div class="panel-heading"><h3>Delivery</h3></div>
							<div class="col-md-12">
					    		<form class="form-group" method="POST" action="checkout">
					    			{{csrf_field()}}
					    				<label><i class="icon icon-person-outline"></i>First & Last Name:</label>
					    		<input name="custname" type="text" class="form-control" required=""></input>
					    		<p></p>
					    		<label><i class="icon icon-home"></i> Complete Address:</label>
					    		<textarea name="address" class="form-control"></textarea>
					    		<p></p>
					    		<label><i class="icon icon-phone"></i> Mobile Number:</label>
					    		<input name="contactno" type="number"class="form-control" required pattern="[0-9]{11}"></input>
					    		<p></p>
					    		<label><i class="icon icon-event"></i>Delivery Date:</label>
					    		<input name="deldate" type="Datetime-local" class="form-control" required="">
					    		<p></p>
					    		<hr>
					    		<input type="checkbox" ng-model="val"><p>Deliver to a different address</p></input>
							</div>
							<div class="form-group col-md-12" ng-show="val">
								<label><i class="icon icon-home"></i> Complete Address:</label>
							    	<textarea rows="8" name="address2" class="form-control"></textarea>
							    	<p class="text-muted"><i class="icon icon-warning"></i>
										When providing the delivery address, we ask for special instructions. We can either leave it to any representative or even with a neighbour.
										</p>
							    	<p></p>
							</div><!--form group-->
								<div class="container-fluid form-group col-md-12">
							    	<input type="submit" name="ship" value="Proceed" class="btn btn-blue waves-button waves-effect pull-right">
							    </div>
				    			</form>
						</div><!--box-->
						<div class="panel-footer">
									<p class="text-muted"><i class="icon icon-warning"></i> All fields are required</p>
								</div>
					</div><!--col 6-->

					<div class = "col-md-6">
						<div class = "box">
						<div class="panel-heading"><h3>Pick up</h3></div>
							<div class="col-md-12">
					    		<form class="form-group" method="POST" action="checkout">
					    			{{csrf_field()}}
					    			<label><i class="icon icon-person-outline"></i>First & Last Name:</label>
					    		<input type="text" class="form-control" required name="custname"></input>
					    		<p></p>
					    		<label><i class="icon icon-phone"></i> Mobile Number:</label>
					    		<input type="number" placeholder="+639" class="form-control" required name="contactno"></input>
					    		<p></p>
					    		<label><i class="icon icon-event"></i>Pick up date and Time:</label><br/>
					    		<input name="pickdate" type="Datetime-local" required name="pickdate"></input>
					    		<input type="submit" name="pick" value="Proceed" class="btn btn-blue pull-right">
							</div>
				    			</form>
						</div><!--box-->
						<div class="panel-footer">
									<p class="text-muted"><i class="icon icon-warning"></i> All fields are required</p>
								</div>
					</div><!--col 6-->

					<div class="box-footer col-md-12">
                        <div class="pull-left">
                            <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                        </div>
                     <!--   <div class="pull-right">
                            <button type="submit" class="btn btn-template-main">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                            </button>
                         </div>-->
                     </div>
                      
					


						

			</div><!--box-->
		</div><!--col 9-->
		
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