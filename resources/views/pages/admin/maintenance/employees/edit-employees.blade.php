@section('page-title')
	Employee Maintenance
@stop

@extends('admin-base')

@section('body')

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
			<h1 class="heading">Employee</h1>
		</div>
	</div>
</div>
	<div class="panel-group container-fluid">
	  <div class="panel panel-default">
	    <div class="panel">
	      <div class="panel-body">
	      <div class="container">
	      <div class="card">
			<form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-employees/{{$employee->id}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PATCH">


				<div class="row">
					<div class="col-md-4 text-center" style="padding-top: 10px">
						<img id="img" src= "/img/{{$employee->empimage}}" class="img-circle" id="selectedimage" style="height: 250px; width: 280px; margin: 15px">
						<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image"></input>
						<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
					</div>
						<div class="form-group col-md-8" style="padding-top: 50px">

						@if ($errors->has('name'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Employee Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('name')}}"name="name">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Employee Name:</label>
							<input type="text" class="form-control" value="{{$employee->name}}" id = "name" name="name">
						@endif

						@if ($errors->has('email'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Email Adress:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('email')}}"name="email">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Email Adress:</label>
							<input type="text" class="form-control" value="{{$employee->email}}" id = "email" name="email">
						@endif


						@if ($errors->has('username'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Username:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('username')}}"name="username">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Username:</label>
							<input type="text" class="form-control" value="{{$employee->username}}" id = "username" name="username">
						@endif

						@if ($errors->has('password'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Password:</label>
								 <input type="password" class="form-control" placeholder="{{$errors->first('password')}}"name="password">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Password:</label>
							<input type="password" class="form-control" value="{{$employee->password}}" id = "password" name="password">
						@endif

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
