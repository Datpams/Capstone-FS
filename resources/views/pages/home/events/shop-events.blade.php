@section('page-title')
	Events
@stop
@extends('home-base')

	
@section('home-body')

<script type="text/javascript" src="/js/base.min.js"></script>

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
			<div class="container">
				<h1 class="heading">Events</h1>
			</div>
		</div>
</div>

<div class = "container">
	<div class="card-wrap">
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<aside class="card-side card-side-img">
									<img alt="alt text" src="images/samples/portrait.jpg">
								</aside>
								<div class="card-main">
									<div class="card-inner">
										<p class="card-heading">Event Name</p>
										<form>
											<div class="form-group form-group-label form-group-purple">
												<div class="row">
													<div class="col-lg-10 col-sm-8">
														<label class="floating-label" for="float-text-purple">Enter Quantity</label>
														<input class="form-control" id="float-text-purple" type="text">
													</div>
												</div>
											</div>
										</form>
										<a class="btn btn-purple waves-button waves-effect pull-right">ADD TO CART</a>
									</div>
								</div>
							</div>
						</div>
</div><!--container-->
@stop