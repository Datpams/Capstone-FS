@extends('admin-base')
@section('page-title')
Inventory
@stop
@section('body')
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Inventory</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Inventory</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title" ng-controller="angularController">Inventory Table</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="data" class="table table-bordered table-striped" ng-controller="angularController">
								<thead>
									<tr>
										<th>Flower Name</th>
										<th>Stocks Remaining</th>
										<th>Total Stock Price</th>
										<th>Date Added</th>
										<th>Expiration Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($inventories as $inventory)
									@if($inventory->pieces < 50)
									<tr class="danger">
										@else
										<tr class="success">
											@endif
											<td>{{ $inventory->name }}</td>
											<td>{{ $inventory->pieces }}</td>
											<td>P {{ $inventory->price*$inventory->pieces }}</td>
											<td>{{$inventory->created_at}}</td>
											<td>{{ $inventory->expiration }}</td>
											<td>
												<button class="btn btn-danger btn flat" data-toggle="modal" data-target ="#{{$inventory->id}}1"><i class="fa fa-trash"></i> Delete</button>
											</td>
										</tr>
										<div aria-hidden="true" class="modal fade" id="{{$inventory->id}}1" role="dialog" tabindex="-1">
										  <div class="modal-dialog">
										    <div class="modal-content" style="background-color: #ff1a66; color: #fff">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title">Delete</h4>
										      </div>
										      <div class="modal-body" style="background-color:#F48FB1">
										        <h3>Are you sure you want to Untrack <strong>{{$inventory->name}}</strong> in your Inventory?</h3>
										      </div>
										      <div class="modal-footer">
										        <a class="btn btn-primary pull-right" href="inventory/{{$inventory->id}}/delete">Yes</a>
										        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
										        </div><!-- /.modal-content -->
										        </div><!-- /.modal-dialog -->
										      </div>
										    </div>
										@endforeach
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</aside>
	<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal">
	<a style="color:#ffffff">Add</a>
	</button>
	<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header bg-maroon">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Track Product Inventory</h4>
				</div>
				<div class="modal-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div id="collapse1">
								<div class="box">
									<div class="box-body">
										<div class="container col-md-12">
											<div class=" col-md-12">
												<table id="data1" class="table table-bordered table-striped">
													<thead>
														<th>Item Name</th>
														<th>Action</th>
													</thead>
													<tbody>
														@foreach ($items as $item)
														<tr>
															<td>
															<img id="img" src= "/img/{{$item->item_image}}" class="img-circle" id="selectedimage" style="height: 40px; width: 10%; margin: 15px">
															{{ $item->item_name }}
															</td>
															<td>
																<div class="container-fluid">
																<button type="button" class="btn bg-maroon btn-flat"  data-toggle="collapse" data-parent="#accordion" href="#{{$item->id}}2">Track</button>
																</div>
															</td>
														</tr>
															<div id="{{$item->id}}2" class="panel-collapse collapse" class="col-md-12">
															<form class="form-group" enctype="multipart/form-data" class="container-fluid css-form" action="/inventory" method="POST" role="form" style="width:90%">
																{{csrf_field()}}
																<div class="col-md-6">
																<img id="img" src= "/img/{{$item->item_image}}" class="img-circle" id="selectedimage" style="height: 100px; width: 100%; margin: 15px">
                                      							<input type="hidden" value="{{ csrf_token() }}" name="_token">
                                      							</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Item Name:</label>
																	<input type="text" class="form-control" name="name" value="{{$item->item_name}}">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Item Price:</label>
																	<input type="text" class="form-control" name="price" value="{{$item->price}}">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Quantity:</label>
																	<input type="number" class="form-control" name="pieces">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Expiration Date:</label>
																	<input type="date" class="form-control" name="expiration">
																</div>
																<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Save">
																<button type="button" class="btn btn-flat pull-right" data-toggle="collapse" data-parent="#accordion" href="#{{$item->id}}2">Cancel</button>	
															</form>
														</div>
														</div>
														@endforeach
														@foreach($flowers as $flower)
														<tr>
															<td>
																<img id="img" src= "/img/{{$flower->fimage}}" class="img-circle" id="selectedimage" style="height: 40px; width: 10%; margin: 15px">
																{{$flower->name}}
															</td>
															<td>
																<div class="container-fluid">
																<button type="button" class="btn bg-maroon btn-flat"  data-toggle="collapse" data-parent="#accordion" href="#{{$flower->id}}">Track</button>
																</div>
															</td>
														</tr>
														<div class="container-fluid" style="padding-bottom:5px">
														<div id="{{$flower->id}}" class="panel-collapse collapse" class="col-md-12">
															<form class="form-group" enctype="multipart/form-data" class="container-fluid css-form" action="/inventory" method="POST" role="form" style="width:90%">
																{{csrf_field()}}
																<div class="col-md-6">
																<img id="img" src= "/img/{{$flower->fimage}}" class="img-circle" id="selectedimage" style="height: 100px; width: 100%; margin: 15px">
                                      							<input type="hidden" value="{{ csrf_token() }}" name="_token">
                                      							</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Item Name:</label>
																	<input type="text" class="form-control" name="name" value="{{$flower->name}}">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Item Price:</label>
																	<input type="text" class="form-control" name="price" value="{{$flower->price}}">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Quantity:</label>
																	<input type="number" class="form-control" name="pieces">
																</div>
																<div class="form-group col-md-6" style="padding-top: 5px">
																	<label>Expiration Date:</label>
																	<input type="date" class="form-control" name="expiration">
																</div>
																<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Save">
																<button type="button" class="btn btn-flat pull-right" data-toggle="collapse" data-parent="#accordion" href="#{{$flower->id}}">Cancel</button>	
															</form>
														</div>
														</div>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop
	@section('footer')
	<script>
	$(function () {
	$("#data").DataTable();
	});
	</script>
	<script>
	$(document).ready(function() {
    $('#data1').DataTable( {
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
    } );
} );
	</script>
	@stop