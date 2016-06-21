@section('page-title')
	Payment Method Maintenance
@stop

@extends('admin-base')

@section('body')

	<style type="text/css">
		.bg-mid {
			background-color: #9a2f9b;
			color: #ffffff;

		}
		 @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 700px; /* New width for default modal */

        }
	</style>


	<div class="panel-group container-fluid">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <h4>Edit Payment Method</h4>
	      </h4>
	    </div>
	    <div class="panel">
	      <div class="panel-body">
			<form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-payments/{{$payment->id}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PATCH">
			{{csrf_field()}}

				<div class="row">
						<div class="form-group col-md-8" style="padding-top: 50px">
						@if ($errors->has('payment_name'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Payment Method Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('payment_name')}}" name="payment_name" value="{{$payment->payment_name}}">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Payment Method Name:</label>
							<input type="text" class="form-control" value="{{$payment->payment_name}}" id = "payment_name" name="payment_name">
						@endif
							<label>Payment Method Description:</label>
							<input type="text" class="form-control" value="{{$payment->payment_desc}}" name="payment_desc" id="payment_desc"></input>

							<input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes"></input>
										<!--{{ var_dump('$errors') }}-->
						</div>
					</div>
				</div>
			</form>
		 </div>
	    </div>
	  </div>
	</div>