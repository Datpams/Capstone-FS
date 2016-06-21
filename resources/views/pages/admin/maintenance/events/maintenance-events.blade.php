@section('page-title')
Events
@stop
@extends('admin-base')
@section('body')
<style type="text/css">
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
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Events</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Events</li>
		</ol>
	</section>
	<!--oooooooooooooooooooooooooooooooooooLISTofEVENTSooooooooooooooooooooooooooooo-->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Event Table @{{message}}</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Event Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($occasions as $occasion)
									<tr>
										<td>{{ $occasion->occasionname }}</td>
										<td>{{ $occasion->occasiondesc }}</td>
										<td>
											<div class="col-md-10">
												<a class="btn btn-primary btn flat"data-toggle="modal" href="#{{$occasion->id}}2"><i class="fa fa-edit"></i> Edit</a>
												<a class="btn btn-danger btn flat" data-toggle="modal" href="#{{$occasion->id}}"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</td>
									</tr>
									<!--Edit Modal-->
									<div aria-hidden="true" class="modal fade" id="{{$occasion->id}}2" role="dialog" tabindex="-1">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header bg-maroon">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Edit Events</h4>
												</div>
												<div class="modal-body">
													<div class="card">
														<form enctype="multipart/form-data" class="container-fluid" action="/maintenance-events/{{$occasion->id}}" method="POST" role="form" style="width:90%">
															<input type="hidden" name="_method" value="PATCH">
															<div class="row">
																<div class="col-md-6 text-center" style="padding-top: 5px">
																	<img id="img" src= "/img/{{$occasion->oimage}}" class="img-circle" id="selectedimage" style="height: 50%; width: 50%; margin: margin: 5% 5% 5% 5%; padding: 5% 5% 5% 5%">
																	<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*" style="margin: 5% 5% 5% 5%"></input>
																	<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
																</div>
																<div class="col-md-6">
																	<div class="form-group" style="padding-top: 5px">
																		<label>Event Name:</label>
																		<input type="text" class="form-control" name="occasionname" value="{{$occasion->occasionname}}">
																	</div>
																	<div class="form-group" style="padding-top: 5px">
																		<label>Event Description:</label>
																		<input type="text" class="form-control" name="occasiondesc" id="occasiondesc" value="{{$occasion->occasiondesc}}"></input>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" type="button" class="btn btn-primary pull-right">YES</button>
														<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
													</div>
												</form>
												</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div>
											<!-- Delete Modal -->
											<div aria-hidden="true" class="modal fade" id="{{$occasion->id}}" role="dialog" tabindex="-1">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Delete</h4>
														</div>
														<div class="modal-body">
															<h3>Are you sure you want to delete <strong>{{$occasion->occasionname}}</strong>?</h3>
														</div>
														<div class="modal-footer">
															<a href="maintenance-events/{{$occasion->id}}/delete" type="button" class="btn btn-primary pull-right">YES</a>
															<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
														</div>
														</div><!-- /.modal-content -->
														</div><!-- /.modal-dialog -->
													</div>
													@endforeach
												</tr>
											</tbody>
										</table>
										</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>
								</section><!-- /.content -->
								</aside><!-- /.right-side -->
								</div><!-- ./wrapper -->
							<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal"></div>
							<a style="color:#ffffff">Add</a>
							</button>
						</div>
					</div>
					<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
					<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
						<div class="modal-dialog modal-full">
							<div class="modal-content">
								<div class="modal-header bg-maroon">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Event</h4>
								</div>
								<div class="modal-body">
									<?php
									$image = "/img/default-image.jpg";
									?>
									<div class="panel-group container-fluid">
										<div class="panel panel-default">
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
													<form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-events" method="POST" role="form" style="width:90%" name="eventForm" novalidate>
														{{csrf_field()}}
														<div class="row">
															<div class="col-md-6 text-center" style="padding-top: 5px">
																<img id="img" src= "{{$image}}" class="img-circle" id="selectedimage" style="height: 50%; width: 100%; margin: margin: 5% 5% 5% 5%; padding: 5% 5% 5% 5%">
																<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*" style="margin: 5% 5% 5% 5%"></input>
																<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
															</div>
															<div class="col-md-6">
																@if ($errors->has('occasionname'))
																<div class="form-group has-error has-feedback" style="padding-top: 5px">
																	<label >Event Name:</label>
																	<input type="text" class="form-control" placeholder="{{$errors->first('occasionname')}}"name="occasionname">
																	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																</div>
																@else
																<div class="form-group" style="padding-top: 5px">
																	<label>Event Name:</label>
																	<input type="text" class="form-control" placeholder="eg: Party, Wedding" name="occasionname" ng-model="eventname.text"  ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
																	<span ng-show="eventForm.occasionname.$touched && eventForm.occasionname.$invalid" style="color: red">Event name is invalid</span>
																</div>
																@endif
																@if ($errors->has('occasiondesc'))
																<div class="form-group has-error has-feedback" style="padding-top: 5px">
																	<label>Event Description:</label>
																	<input type="text" class="form-control" placeholder="{{$errors->first('occasiondesc')}}" name="occasiondesc
																	" id="occasiondesc">
																	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																</div>
																@else
																<div class="form-group" style="padding-top: 5px">
																	<label>Event Description:</label>
																	<input type="text" class="form-control" placeholder="Color, class, type" name="occasiondesc" id="occasiondesc"
																	ng-model="eventdesc.text" ng-trim="true" capitalize-first></textarea>
																	<span ng-show="eventForm.occasiondesc.$touched && eventForm.occasiondesc.$invalid" style="color: red">event description is invalid</span>
																</div>
															</div>
															@endif
															<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Save" ng-disabled="eventForm.occasionname.$invalid || eventForm.eventdesc.$invalid"></input>
															<button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									
								</div>
							</form>
						</div>
					</div>
				</div>
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