@section('page-title')
	Event Maintenance
@stop

@extends('admin-base')

@section('body')

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
			<h1 class="heading">Events</h1>
		</div>
	</div>
</div>


	<div class="panel-group container-fluid">
	  <div class="panel panel-default">
	    <div class="panel">
	    <div class="panel-body">
	    	<div class="container">
	      <div class="card">
			<form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-events/{{$occasion->id}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PATCH">
			 @if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <strong>Input Error!</strong><br><br>
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li> 
				            @endforeach
				        </ul>
				    </div>
			@endif

				<div class="row ">
					<div class="col-md-4 text-center" style="padding-top: 10px">
						<img id="img" src= "/img/{{$occasion->oimage}}" class="img-circle" id="selectedimage" style="height: 250px; width: 280px; margin: 15px">
						<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image"></input>
						<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
					</div>
						<div class="form-group col-md-8" style="padding-top: 50px">
						@if ($errors->has('occasionname'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Event Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('occasionname')}}"name="occasionname">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Event Name:</label>
							<input type="text" class="form-control" value="{{$occasion->occasionname}}" id = "occasionname" name="occasionname">
						@endif

						@if($errors->has('ocassiodesc'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label>Event Description:</label>
								<input type="text" class="form-control" placeholder="{{$errors->first('occasiondesc')}}" name="occasiondesc" id="occasiondesc"></input>
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Event Description:</label>
							<input type="text" class="form-control" value="{{$occasion->occasiondesc}}" name="occasiondesc" id="occasiondesc"></input>
						@endif
							<input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes" style="margin-top: 10px"></input>
										<!--{{ var_dump('$errors') }}-->
						</div>
					</div>
				</div>
			</form>
			</div>
		 </div>
	    </div>
	  </div>
	</div>



@stop

<script> //update image selection
function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
         $('#img').attr('src', '/assets/no_preview.png');
    }
}
</script>
