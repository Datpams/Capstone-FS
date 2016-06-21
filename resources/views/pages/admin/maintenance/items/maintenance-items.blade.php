@section('page-title')
Item Maintenance
@stop
@extends('admin-base')
@section('body')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Other Product</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Other Product</li>
		</ol>
		<style type="text/css">
		@media  screen and (min-width: 768px) {
		.modal-dialog {
		width: 850px; /* New width for default modal */
		}
		.modal-sm {
		width: 350px; /* New width for small modal */
		}
		}
		@media  screen and (min-width: 992px) {
		.modal-lg {
		width: 950px; /* New width for large modal */
		}
		}
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
		<!--ooooooooooooooooooooooooLISTofFLOWERSooooooooooooooooooooooooooooooo-->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Data Table With Full Features</h3>
							</div><!-- /.box-header -->
							<div class="box-body table-responsive">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Item Name</th>
											<th>Item Description</th>
											<th>Item Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($items as $item)
										<tr>
											<td>{{ $item->item_name }}</td>
											<td width="350">{{ $item->item_desc }}</td>
											<td> P{{ $item->price }}</td>
											<td>
												<div class="col-md-10">
													<button class="btn btn-primary btn flat"data-toggle="modal" href="#{{$item->id}}"><i class="fa fa-edit"></i> Edit</button>
													<button class="btn btn-danger btn flat" data-toggle="modal" href="#{{$item->id}}2"><i class="fa fa-trash"></i> Delete</button>
												</div>
											</td>
										</tr>
										<!--Edit Modal-->
										<div aria-hidden="true" class="modal fade" id="{{$item->id}}" role="dialog" style="padding-top: 7%">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-maroon">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title">Edit Item</h4>
													</div>
													<div class="modal-body">
														<form enctype="multipart/form-data" class="container col-md-12 css-form" action="/maintenance-items/{{$item->id}}" method="POST" role="form">
															<input type="hidden" name="_method" value="PATCH">
															{{csrf_field()}}
															<div class="row">
																<div class="col-md-4 text-center" style="padding-top: 5px">
																	<img id="img" src= "/img/{{$item->item_image}}" class="img-circle" id="selectedimage" style="height: 250px; width: 250px; margin-bottom: 5px">
																	<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
																	<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
																</div>
																<div class="col-md-8">
																	<div class="form-group" style="padding-top: 2px">
																		<label>Type:</label>
																		<select style="width: 100%; padding-bottom: 3px" class="form-control editselect" name="itype">
																			@foreach($tags as $tag)
																			<option value="{{$tag->id}}">{{$tag->name}}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="form-group" style="padding-top: 5px">
																		<label>Item Name:</label>
																		<input type="text" class="form-control" placeholder="eg: Bear, Perfume"name="item_name" value="{{$item->item_name}}">
																	</div>
																	<div class="form-group" style="padding-top: 5px">
																		<label>Item Description:</label>
																		<textarea class="form-control" name="item_desc" id="item_desc" rows="5">{{$item->item_desc}}</textarea>
																	</div>
																	<div class="form-group" style="padding-top: 5px">
																		<label>Item Price:</label>
																		<input type="number" min="0" step="0.01" class="form-control" placeholder="eg: P250.50" name="item_price" id="item_price" value="{{$item->price}}">
																	</div>
																</div>
																<div class="modal-footer">
																	<input type="submit" class="btn-flat btn btn-primary pull-right" value="Confirm" />
																	<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div>
									<!-- Delete Modal -->
									<div aria-hidden="true" class="modal fade" id="{{$item->id}}2" role="dialog" tabindex="-1">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Delete</h4>
												</div>
												<div class="modal-body">
													<h3>Are you sure you want to delete <strong>{{$item->item_name}}</strong>?</h3>
												</div>
												<div class="modal-footer">
													<a href="maintenance-items/{{$item->id}}" type="button" class="btn btn-primary pull-right">YES</a>
													<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
													</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div>
											</div>
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
						<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal"></div>
						<a style="color:#fff">Add</a>
						</button>
						<?php
							$image = "/img/default-image.jpg";
						?>
						<!-- Add Other Item -->
						<div id="modal-iframe2" class="modal fade" role="dialog" style="padding-top: 7%">
							<div class="modal-dialog center-block">
								<div class="modal-content">
									<div class="modal-header bg-maroon">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Other Product</h4>
									</div>
									<div class="modal-body">
										<form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-items" method="POST" role="form" style="width:101%" name="form" ng-controller="angularController" novalidate>
											{{csrf_field()}}
											<div class="row">
												<div class="col-md-4 text-center" style="padding-top: 5px; padding-right: 5%">
													<img id="img2" src= "{{$image}}" class="img-circle" style="height: 250px; width: 250px; margin-bottom: 5px">
													<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
													<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
												</div>
												<div class="col-md-8">
													<div class="form-group" style="padding-top: 2px">
														<label>Type:</label>
														<select style="width: 100%; padding-bottom: 3px" class="form-control" name="itype" id="thug">
															@foreach($tags as $tag)
															@if($tag->id == $item->itype->id)
															<option selected="" value="{{$tag->id}}">{{$tag->name}}</option>
															@else
															<option value="{{$tag->id}}">{{$tag->name}}</option>
															@endif
															@endforeach
														</select>
													</div>
													<div class="form-group" style="padding-top: 5px">
														<label>Item Name:</label>
														<input type="text" class="form-control" placeholder="eg: Bear, Perfume"name="item_name" ng-model="item_name" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
														<span ng-show="form.item_name.$touched && form.item_name.$invalid" style="color: red">Item Name is invalid</span>
													</div>
													<div class="form-group" style="padding-top: 5px">
														<label>Item Description:</label>
														<textarea class="form-control" name="item_desc" id="item_desc" rows="5" ng-model="item_desc" ng-trim="true" capitalize-first required></textarea>
														<span ng-show="form.item_desc.$touched && form.item_desc.$invalid" style="color: red">Item Name is invalid</span>
													</div>
													<div class="form-group" style="padding-top: 3px">
														<label>Item Price:</label>
														<input type="number" min="0" step="0.01" class="form-control" placeholder="eg: P250.50" name="item_price" id="item_price" ng-model="item.number" ng-trim="true" required></input>
														<span ng-show="form.item_price.$touched && form.item_price.$invalid" style="color: red">flower price is invalid</span>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Add" ng-disabled="form.item_name.$invalid || form.item_desc.$invalid || form.item_price.$invalid"></input>
												<button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					@stop
@section('footer')
<script>
$(document).ready(function(e){
	$('#thug').select2({
		placeholder: 'Choose item type',
	});
});
$(document).ready(function(e){
	$('.editselect').select2({
	});
});
$(document).ready(function(e){
	$('.editselect2').select2({
		placeholder: 'Edit tag',
	});
});

</script>
<script type="text/javascript">
	$(document).ready(function () {
$("#example2").DataTable();
});
</script>
<script type="text/javascript">/*//update image selection*/
	(function readURL(input) {
	var url = input.value;
	var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
	if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('#img2').attr('src', e.target.result);
	}
	reader.readAsDataURL(input.files[0]);
	}else{
	$('#img2').attr('src', '/img/default-image.jpg');
	}
	}
</script>

@stop