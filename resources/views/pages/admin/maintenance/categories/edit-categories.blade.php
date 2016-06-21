@section('page-title')
	Categoryc Maintenance
@stop

@extends('admin-base')

@section('body')

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
			<h1 class="heading">Category</h1>
		</div>
	</div>
</div>


	<div class="panel-group container-fluid">
	  <div class="panel panel-default">
	    <div class="panel">
	      <div class="panel-body">
	      <div class="container">
	        
	    <div class="card">
	 
			<form enctype="multipart/form-data" class="container col-md-11" action="/maintenance-categories/{{$category->id}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PATCH">
			{{csrf_field()}}

				<div class="row">
						<div class="form-group col-md-8" style="padding-top: 50px">
						@if ($errors->has('fc_name'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label>Category Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('fc_name')}}"name="fc_name" value="{{$category->fc_name}}">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Category Name:</label>
							<input type="text" class="form-control" value="{{$category->fc_name}}" id = "fc_name" name="fc_name">
						@endif
							<label>Category Description:</label>
							<input type="text" class="form-control" value="{{$category->fc_desc}}" name="fc_desc" id="fc_desc"></input>

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
