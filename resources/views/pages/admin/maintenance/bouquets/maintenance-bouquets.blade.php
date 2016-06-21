@section('page-title')
Bouquets Maintenance
@stop
@extends('admin-base')
@section('body')
<style type="text/css">
@media screen and (min-width: 768px) {
.modal-dialog {
width: 850px; /* New width for default modal */
}
.modal-sm {
width: 350px; /* New width for small modal */
}
}
@media screen and (min-width: 992px) {
.modal-lg {
width: 1180px; /* New width for large modal */
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
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1 class = "heading" ng-controller="angularController">Bouquets</h1>
<ol class="breadcrumb">
<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
<li class="active">Bouquets</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">Bouquets Table</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
	<th>Bouquet Name</th>
	<th>Description</th>
	<th>Price</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($bouquets as $bouquet)
<tr>
	<td>{{ $bouquet->name }}</td>
	<td>{{ $bouquet->desc }}</td>
	<td>P {{ $bouquet->price }}</td>
	<td>
		<div class="col-md-10">
			<a class="btn btn-primary btn flat" href="{{ action('bouquetController@show', $bouquet->id) }}" id="edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i>Edit</a>
			<button class="btn btn-danger btn flat" data-toggle="modal" data-target = "#{{$bouquet->id}}2"><i class="fa fa-trash"></i> Delete</button>
		</div>
	</td>
</tr>
<!-- Delete Modal -->
<div aria-hidden="true" class="modal fade" id="{{$bouquet->id}}2" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				<h3>Are you sure you want to delete <strong>{{$bouquet->name}}</strong>?</h3>
			</div>
			<div class="modal-footer">
				<a class="btn btn-primary pull-right" href="maintenance-bouquets/{{$bouquet->id}}/delete">Yes</a>
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
		</div>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>
</section><!-- /.content -->
</aside><!-- /.right-side -->
<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal">
<a style="color:#ffffff">Add</a>
</button>
<!-- Add Bouquet Modal -->
<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
<div class="modal-lg center-block text-center">
<div class="modal-content">
<div class="modal-header bg-maroon">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Bouquet</h4>
</div>
<div class="modal-body">
<div class="container">
	<div class="panel-body">
		<div class="card">
			<form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-bouquets" method="POST" role="form" name="flowerForm" ng-controller="angularController" novalidate>
				{{csrf_field()}}
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Input Error!</strong><br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>x
				@endif
				<div class="row">
					<div class="col-md-4">
						<img id="img" src= "/img/default-image.jpg" class="img-circle" id="selectedimage" style="height: 30%; width: 85%; margin-bottom: 5px">
						<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
						<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
						<div class="form-group" style="padding-top: 2%;">
							<label><span style="color:red">*</span>Bouquet Name:</label>
							<input type="text" class="form-control" name="boqname" ng-model="boqname" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
							<span ng-show="flowerForm.boqname.$touched && flowerForm.boqname.$invalid" style="color: red">Flower Name is invalid</span>
						</div>
						<div class="form-group" style="padding-top: 2%;">
							<label>Bouquet Description:</label>
							<textarea class="form-control" name="boqdesc" rows="4" ng-model="boqdesc" ng-trim="true" capitalize-first></textarea>
							<span ng-show="flowerForm.boqdesc.$touched && flowerForm.boqdesc.$invalid" style="color: red">Flower Description is required</span>
						</div>
						<div class="form-group" style="padding-top: 2%;">
							<input type="submit" class="btn btn-flat bg-maroon" value="Create Bouquet" ng-disabled="flowerForm.boqname.$invalid || flowerForm.boqdesc.$invalid"></input>
						</div>
						<legend>Pieces here:</legend>
					</div>
					<div class="col-md-8" style="border-style: ridge; margin-top: 2%;height: 75%; overflow:scroll">
						<div class="box box-solid">
							<div class="box-header with-border">
								<h3 class="box-title">Customize Bouquet</h3>
								</div><!-- /.box-header -->
								<div class="box-body">
									<div class="box-group" id="accordion">
										<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
										<div class="panel box box-success">
											<div class="box-header with-border">
												<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
													Containers
												</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="box-body">
													<table id="example3" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Item</th>
																<th>Use</th>
															</tr>
														</thead>
														<tbody>
															@foreach($items = DB::table('other_items')->where('itype_id', '=', '1')->get()as $item)
															<div class="card col-md-4">
																<tr>
																	<td>
																		<img src="/img/{{$item->item_image}}" class="center-block" style="height: 150px; width: 150px; padding-top:10%" id="{{$item->item_name}}">
																		<h4 class="text-center">{{$item->item_name}}</h4>
																	</td>
																	<td>
																		<a id="usebtn" data-id="{{$item->id}}" onclick="use()" style="margin-left:40%;margin-top: 40%" class="btn btn-primary btn-flat" data-toggle="tab" href="#menu1">Use</a>
																		<input type="hidden" id="cont_id" name="cont_id" value="{{$item->id}}"></input>
																		<input name="con_price" type="hidden" value="{{$item->price}}"></input>
																	</td>
																</tr>
															</div>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="panel box box-success">
											<div class="box-header with-border">
												<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
													Accessories
												</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="box-body">
													<table id="example4" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Item</th>
																<th>Use:</th>
															</tr>
														</thead>
														<tbody>
															@foreach($items = DB::table('other_items')->where('itype_id', '=', '2')->get()as $item)
															<div class="card col-md-4">
																<tr>
																	<td>
																		<img src="/img/{{$item->item_image}}" class="center-block" style="height: 150px; width: 150px; padding-top:10%" id="{{$item->item_name}}">
																		<h4 class="text-center">{{$item->item_name}}</h4>
																	</td>
																	<td>
																		<h5><strong>Set Quantity:</strong></h5>
																		<hr>
																		<input step="1" type="number" class="form-control" placeholder="Quantity" style="margin-bottom: 15px" name="acc_qty[]" min="0"></input><!-- send qty -->
																		<input type="hidden" value="{{$item->id}}" name="acc_id[]"></input><!-- send the id of the item -->
																		<input name="acc_price[]" type="hidden" value="{{$item->price}}"></input><!-- send the price of the item -->
																	</td>
																</tr>
															</div>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="panel box box-success">
											<div class="box-header with-border">
												<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
													Add-Ons
												</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="box-body">
													<table id="example5" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Item</th>
																<th>Use:</th>
															</tr>
														</thead>
														<tbody>
															@foreach($items = DB::table('other_items')->where('itype_id', '=', '3')->get()as $item)
															<div class="card col-md-4">
																<tr>
																	<td>
																		<img src="/img/{{$item->item_image}}" class="center-block" style="height: 150px; width: 150px; padding-top:10%" id="{{$item->item_name}}">
																		<h4 class="text-center">{{$item->item_name}}</h4>
																	</td>
																	<td>
																		<h5><strong>Set Quantity:</strong></h5>
																		<hr>
																		<input step="1" type="number" class="form-control" placeholder="Quantity" style="margin-bottom: 15px" name="addon_qty[]" min="0"></input><!-- send qty -->
																		<input type="hidden" value="{{$item->id}}" name="addon_id[]"></input><!-- send the id of the item -->
																		<input name="addon_price[]" type="hidden" value="{{$item->price}}"></input><!-- send the price of the item -->
																	</td>
																</tr>
															</div>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="panel box box-success">
											<div class="box-header with-border">
												<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
													Flowers
												</a>
												</h4>
											</div>
											<div id="collapseFour" class="panel-collapse collapse">
												<div class="box-body">
													<table id="example2" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>Flower</th>
																<th>Quantity:</th>
															</tr>
														</thead>
														<tbody>
															@foreach($flowers as $flower)
															<div class="card col-md-4">
																<tr>
																	<td>
																		<img src="/img/{{$flower->fimage}}" class="center-block" style="height: 150px; width: 150px; padding-top:10%" id="{{$flower->name}}">
																		<h4 class="text-center">{{$flower->name}}</h4>
																	</td>
																	<td>
																		<h5><strong>Set Quantity:</strong></h5>
																		<hr>
																		<input step="1" type="number" class="form-control" placeholder="Quantity" style="margin-bottom: 15px" name="qty[]" min="0"></input>
																		<input type="hidden" value="{{$flower->price}}" name="ff[]">
																		<input type="hidden" value="{{$flower->id}}" name="id[]">
																	</td>
																</tr>
															</div>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									</div><!-- /.box-body -->
									</div><!-- /.box -->
									</div><!-- col-md-8 -->
								</div>
							</form>
							<h4 class="pull-right">Total Amount: P</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="modal fade" role="dialog" style="padding-top: 3%">
	<div class="modal-lg center-block">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@stop
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
@section('footer')
<script>
//update image selection
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
$("#example1").DataTable();
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
$("#example2").DataTable();
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
$("#example3").DataTable();
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
$("#example4").DataTable();
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
$("#example5").DataTable();
});
</script>
<script type="text/javascript">
	$(function use(){
		$('#usebtn').click(function () {
			alert($(this).data('id'));
		});
	});
</script>
@stop