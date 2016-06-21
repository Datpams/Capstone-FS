@extends('home-base')

@section('home-body')

<script type="text/javascript" src="/js/base.min.js"></script>


	<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
				<h1 class="heading">Shopping Cart</h1>
				<p>Click on product name to edit quantity</p>
				<span class="glyphicon glyphicon-tags"></span>
			</div>
		</div>
	</div>
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
					<p class="modal-title"><i class="icon icon-create"></i>Edit Cart</p>
				</div>
				<div class="modal-inner">
					<form method="post" action="/shoppingCart/{{$cart->id}}" role="form">
						<input type="hidden" name="_method" value="PATCH">
						{{csrf_field()}}
							<div class="container">
								<div class="panel container-fluid">
								<div class="panel-body">
										<div class="row">
							        		<div class="col-md-4">
							        			<img src="/img/{{$cart->fimage}}" style="height: 300px; width: 250px">
							        		</div>
							        		<div class="col-md-6 form-group">
								        		<h1 style="margin-left: 15px" class="pull-left">{{ $cart->name }}</h1>
								        		<input id="float-text" type="number" value="{{$cart->quantity}}" name="qty" min="1" class="form-control"></input>

								        		<script type="text/javascript">
								        			
								        		</script>
							        		</div>
						        		</div>
						      		</div>
								</div>
								<div class="panel-footer"></div>
								<a href="{{ URL::previous()}}"><input type="button" value="Cancel" class="pull-right btn btn-flat"></input></a>
								<input type="submit" value="Save Quantity" class="pull-right btn btn-flat btn-blue"></input>
								<h1></h1>
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer">
				<h2></h2>
				</div>
			</div>
		</div>
	</div>

@stop