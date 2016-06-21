@extends('admin-base')
@section('page-title')
Transfers
@stop
@section('body')
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Transfers</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Transfers</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title" ng-controller="angularController">Manage Incoming Inventory Product</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="data" class="table table-bordered table-striped" ng-controller="angularController">
								<thead>
									<tr>
										<th>Reference Number</th>
										<th>product Name</th>
										<th>status</th>
										<th>Expected Arrival</th>
										<th>Supplier</th>
										<th>Received</th>
									</tr>
								</thead>
								<tbody>
								@foreach($inventories as $inventory)
									<tr>
										<th>{{$inventory->name}}</th>
										<th>{{$inventory->name}}</th>
										<th>{{$inventory->name}}</th>
										<th>{{$inventory->name}}</th>
										
									</tr>
								@endforeach
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
					<h4 class="modal-title">Add Incoming Product</h4>
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
														<tr>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="card col-md-12 pull-left">
												<form action="/maintenance-markup" method="POST" role="form" class="row">
													<div class="form-group col-md-6">
														<label>Date range:</label>
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
															<input type="text" class="form-control pull-right" id="reservation">
															</div><!-- /.input group -->
															</div><!-- /.form group -->
															<div class="form-group col-md-6">
																<label>Supplier:</label>
															<select class="form-control"></select>
														</div>
														<div class="form-group col-md-6">
															<label>Referrence Number</label>
															<input type="text" class="form-control pull-left">
														</div>
														<div class="form-group container col-md-6">
															<input id="add" name = "add" type="submit" class="btn bg-maroon btn flat form-control" value="Save"></input>
															<button type="button" class="form-control btn btn-default" data-dismiss="modal">Cancel</button>
														</div>
													</form>
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
		$(document).ready(function (e){
		$('input[id="reservation"]').daterangepicker();
		});
			$(function () {
				$("#data").DataTable();
			});
		</script>
		<script>
			$(function () {
				$("#data1").DataTable();
			});
		</script>
		@stop