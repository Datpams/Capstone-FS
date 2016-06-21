@section('page-title')
	Markup Maintenance
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
	        <h4>Markup Event</h4>
	      </h4>
	    </div>
	    <div class="panel">
	      <div class="panel-body">
			<form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-markup/{{$markup->id}}" method="POST" role="form">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">


				<div class="row">
						<div class="form-group col-md-8" style="padding-top: 50px">
							@if ($errors->has('markup_name'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Markup Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('markup_name')}}"name="markup_name">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Markup Name:</label>
							<input type="text" class="form-control" value="{{$markup->markup_name}}" id = "markup_name" name="markup_name">
						@endif
							<label>Markup Description:</label>
							<input type="text" class="form-control" value="{{$markup->markup_desc}}" name="markup_desc" id="markupdesc"></input>

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
