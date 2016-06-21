@section('page-title')
	Supplier Maintenance
@stop

@extends('admin-base')

@section('body')

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
			<h1 class="heading">Supplier</h1>
		</div>
	</div>
</div>


	<div class="panel-group container-fluid">
	  <div class="panel panel-default">
	    <div class="panel">
	      <div class="panel-body">
	    <div class="container">
	      <div class="card">
			<form enctype="multipart/form-data" class="container col-md-11" action="/maintenance-suppliers/{{$supplier->id}}" method="POST" role="form">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">
		

				<div class="row">
						<div class="form-group col-md-10" style="padding-top: 50px">
							@if ($errors->has('supplier_compname'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Supplier Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('supplier_compname')}}"name="supplier_compname">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Supplier Name:</label>
							<input type="text" class="form-control" value="{{$supplier->supplier_compname}}" id = "supplier_compname" name="supplier_compname">
						@endif
							<label>Supplier Address:</label>
							<input type="text" class="form-control" value="{{$supplier->supplier_add}}" name="supplier_add" id="supplier_add"></input>

							<label>Supplier Contact Number:</label>
							<input type="text" class="form-control" value="{{$supplier->supplier_contact}}" name="supplier_contact" id="supplier_contact"></input>


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

@stop