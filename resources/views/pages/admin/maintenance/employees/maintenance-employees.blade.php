@extends('admin-base')
@section('page-title')
Employee Maintenance
@stop
@section('body')
<style>
.css-form input.ng-invalid.ng-touched {
background-color: #ffcccc;
}
.css-form input.ng-valid.ng-touched {
background-color: #fff;
}
.css-form textarea.ng-invalid.ng-touched {
background-color: #ffcccc;
}
.css-form textarea.ng-valid.ng-touched {
background-color: #fff;
}
.material-switch > input[type="checkbox"] {
display: none;
}
.material-switch > label {
cursor: pointer;
height: 0px;
position: relative;
width: 40px;
}
.material-switch > label::before {
background: rgb(0, 0, 0);
box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
border-radius: 8px;
content: '';
height: 16px;
margin-top: -8px;
position:absolute;
opacity: 0.3;
transition: all 0.4s ease-in-out;
width: 40px;
}
.material-switch > label::after {
background: rgb(255, 255, 255);
border-radius: 16px;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
content: '';
height: 24px;
left: -4px;
margin-top: -8px;
position: absolute;
top: -4px;
transition: all 0.3s ease-in-out;
width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
background: inherit;
opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
background: inherit;
left: 20px;
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1 class = "heading">Employee</h1>
<ol class="breadcrumb">
<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
<li class="active">Employee</li>
</ol>
<!--ooooooooooooooooooooooooLISTofFLOWERSooooooooooooooooooooooooooooooo-->
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title" ng-controller="angularController">Employees Table</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="data" class="table table-bordered table-striped">
<thead>
<tr>
	<th>Employee Name</th>
	<th>Emloyee Email</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($employees as $employee)
<tr>
	<td>{{ $employee->name }}</td>
	<td>{{ $employee->email }}</td>
	<td>
		<div class="col-md-10">
			<button class="btn btn-primary btn flat col-md-4"data-toggle="modal" href="#{{$employee->id}}"><i class="fa fa-edit"></i> Edit</button>
			<button class="btn btn-danger btn flat col-md-4" data-toggle="modal" href="#{{$employee->id}}2"><i class="fa fa-trash"></i> Delete</button>
		</div>
	</td>
</tr>
<!-- Delete Modal -->
<div aria-hidden="true" class="modal fade" id="{{$employee->id}}2" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				<h3>Are you sure you want to delete <strong>{{$employee->name}}</strong>'s account?</h3>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger pull-right" href="maintenance-employees/{{$employee->id}}/delete">Yes</a>
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
		</div>
		<!--EDIT-->
		<div aria-hidden="true" class="modal fade" id="{{$employee->id}}" role="dialog" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-maroon">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Employee's Account</h4>
					</div>
					<div class="modal-body">
						<div class="card">
							<form enctype="multipart/form-data" class="container css-form" action="/maintenance-employees/{{$employee->id}}" method="POST" role="form" style="width:90%" name="empForm" novalidate>
								<input type="hidden" name="_method" value="PATCH">
								{{csrf_field()}}
								<div class="row">
									<div class="col-md-6 text-center" style="padding-top: 5px">
										<img id="img" src= "/img/{{$employee->empimage}}" class="img-circle" id="selectedimage" style="height: 40%; width: 100%; margin: 5% 5% 5% 5%">
										<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
										<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5">
										
										<div class="form-group" style="padding-top: 5px">
											<label>Employee Name:</label>
											<input value="{{ $employee->name }}" type="text" class="form-control" placeholder="Full name" name="name" ng-model="empname" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
											<span ng-show="empForm.name.$touched && empForm.name.$invalid"
											style="color: red">Employee name is invalid</span>
										</div>
										
										
										<div class="form-group" style="padding-top: 5px">
											<label>Email Adress:</label>
											<input value="{{ $employee->email }}" type="email" class="form-control" placeholder="eg: flowershop@flower.com" name="email" id="email" ng-model="empemail" ng-Pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;" required></input>
											<span ng-show="empForm.email.$touched && empForm.email.$invalid"
											style="color: red">Email Address is invalid</span>
										</div>
										
										
										<div class="form-group" style="padding-top: 5px">
											<label>Username:</label>
											<input value="{{ $employee->username }}" type="text" class="form-control"  name="username" id="username" placeholder="Username" ng-model="username" ng-Pattern="/^[a-z\'\-A-Z]+$/" required></input>
											<span ng-show="empForm.username.$touched && empForm.username.$invalid"
											style="color: red">Employee Username is invalid</span>
										</div>
										
										<div class="form-group" style="padding-top: 5px">
											<label>Password:</label>
											<input value="{{ $employee->password }}" type="password" class="form-control" name="password" id="password" placeholder="Password" ng-model="password" required>
											<span ng-show="empForm.password.$touched && empForm.password.$invalid"
											style="color: red">Employee Password is Required</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes">
							<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
						</div>
						</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div>
				</form>
				@endforeach
			</tbody>
		</table>
		</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal">
<a style="color:#ffffff">Add</a>
</button>
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-maroon">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Employee</h4>
			</div>
			<div class="modal-body">
				<?php
					$image = "/img/default-image.jpg";
				?>
				<div class="panel-group">
					<div class="panel panel-default" >
						<div id="collapse1" class="">
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
							<div class="card">
								<form enctype="multipart/form-data" class="container css-form" action="/maintenance-employees" method="POST" role="form" style="width:90%" name="empForm" novalidate>
									{{csrf_field()}}
									<div class="row">
										<div class="col-md-6 pull-left" style="padding-top: 5px">
											<img id="img" src= "{{$image}}" class="img-circle pull-left" id="selectedimage" style="height: 250px; width: 260px">
											<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
											<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
										</div>
										
										<div class="col-md-6 pull-right">
											@if ($errors->has('name'))
											<div class="form-group has-error has-feedback" style="padding-top: 5px">
												<label >Employee Name:</label>
												<input type="text" class="form-control" placeholder="{{$errors->first('name')}}"name="name">
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
											@else
											<div class="form-group" style="padding-top: 5px">
												<label>Employee Name:</label>
												<input type="text" class="form-control" placeholder="Full name" name="name" ng-model="empname" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
												<span ng-show="empForm.name.$touched && empForm.name.$invalid"
												style="color: red">Employee name is invalid</span>
											</div>
											@endif
											@if ($errors->has('email'))
											<div class="form-group has-error has-feedback" style="padding-top: 5px">
												<label>Email Adress:</label>
												<input type="text" class="form-control" placeholder="{{$errors->first('email')}}" name="email
												" id="email"></input>
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
											@else
											<div class="form-group" style="padding-top: 5px">
												<label>Email Adress:</label>
												<input type="email" class="form-control" placeholder="eg: flowershop@flower.com" name="email" id="email" ng-model="empemail" ng-Pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;" required></input>
												<span ng-show="empForm.email.$touched && empForm.email.$invalid"
												style="color: red">Email Address is invalid</span>
											</div>
											@endif
											@if ($errors->has('username'))
											<div class="form-group has-error has-feedback" style="padding-top: 5px">
												<label>Username:</label>
												<input type="text" class="form-control" placeholder="{{$errors->first('username')}}" name="username
												" id="username">
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
											@else
											<div class="form-group" style="padding-top: 5px">
												<label>Username:</label>
												<input type="text" class="form-control"  name="username" id="username" placeholder="Username" ng-model="username" ng-Pattern="/^[a-z\'\-A-Z]+$/" required></input>
												<span ng-show="empForm.username.$touched && empForm.username.$invalid"
												style="color: red">Employee Username is invalid</span>
											</div>
											@endif
											@if ($errors->has('password'))
											<div class="form-group has-error has-feedback" style="padding-top: 5px">
												<label>Password:</label>
												<input type="password" class="form-control" placeholder="{{$errors->first('password')}}" name="password
												" id="password">
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
											@else
											<div class="form-group" style="padding-top: 5px">
												<label>Password:</label>
												<input type="password" class="form-control" name="password" id="password" placeholder="Password" ng-model="password" required>
												<span ng-show="empForm.password.$touched && empForm.password.$invalid"
												style="color: red">Employee Password is Required</span>
											</div>
											@endif
											<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Save" ng-disabled="empForm.name.$invalid || empForm.email.$invalid || empForm.username.$invalid || empForm.password.$invalid"></input>
											<button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div><!-- /.modal-content -->
		</div>
	</div>
</div>
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
</div>
</div>
</aside>
@stop
@section('footer')
<script>
/*//update image selection*/
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
$('#img').attr('src', '/img/default-image.jpg');
}
}
</script>
<script type="text/javascript">
$(document).ready(function () {
$("#data").DataTable();
});
</script>
@stop