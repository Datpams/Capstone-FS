@extends('admin-base')
@section('page-title')
Supplier Maintenance
@stop
@section('body')
<style type="text/css">
.css-form input.ng-invalid.ng-touched {
background-color: #ffcccc;
}
.css-form input.ng-valid.ng-touched {
background-color: #fff;
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Supplier</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Supplier</li>
		</ol>
	</section>
	<!--ooooooooooooooooooooooooLISTofFLOWERSooooooooooooooooooooooooooooooo-->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"  ng-controller="angularController">Suppliers Table</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Supplier Name</th>
										<th>Supplier Address</th>
										<th>Supplier Contact Number</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($suppliers as $supplier)
									<tr>
										<td>{{ $supplier->supplier_compname }}</td>
										<td>{{ $supplier->supplier_add }}</td>
										<td>{{ $supplier->supplier_contact }}</td>
										<td>
											<div class="col-md-10">
												<button class="btn btn-primary btn flat col-md-4"data-toggle="modal" href="#{{$supplier->id}}"><i class="fa fa-edit"></i> Edit</button>
												<button class="btn btn-danger btn flat col-md-4" data-toggle="modal" href="#{{$supplier->id}}2"><i class="fa fa-trash"></i> Delete</button>
											</div>
										</td>
									</tr>
									<!-- Delete Modal -->
									<div aria-hidden="true" class="modal fade" id="{{$supplier->id}}2" role="dialog" tabindex="-1">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Delete</h4>
												</div>
												<div class="modal-body">
													<h3>Are you sure you want to delete <strong>{{ $supplier->supplier_compname }}</strong>?</h3>
												</div>
												<div class="modal-footer">
													<a class="btn btn-danger pull-right" href="maintenance-suppliers/{{$supplier->id}}/delete">Yes</a>
													<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
												</div>
												</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div>
											<!--EDIT-->
											<div aria-hidden="true" class="modal fade" id="{{$supplier->id}}" role="dialog" tabindex="-1">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Edit Supplier</h4>
														</div>
														<div class="modal-body">
															<div class="card">
																<form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-suppliers/{{$supplier->id}}" method="POST" role="form" style="width:90%" ng-controller="angularController" name="suppForm" novalidate>
																	{{csrf_field()}}
																	<input type="hidden" name="_method" value="PATCH">
																	<div class="row">
																		<div class="form-group col-md-10" style="padding-top: 50px;padding-left: 50px">
																			
																			<div class="form-group" style="padding-top: 5px">
																				<label>Supplier Name:</label>
																				<input value="{{ $supplier->supplier_compname }}" type="text" class="form-control" placeholder="" name="supplier_compname"  ng-model="supplier.text" ng-Pattern="/^[a-z\'\WA-Z]+$/" ng-trim="true" capitalize-first required>
																				<span ng-show="suppForm.supplier_compname.$touched && suppForm.supplier_compname.$invalid" style="color: red">Supplier Name is invalid</span>
																			</div>
																			
																			<div class="form-group" style="padding-top: 5px">
																				<label>Supplier Address:</label>
																				<input value="{{ $supplier->supplier_add }}" type="text" class="form-control" placeholder="" name="supplier_add" id="supplier_add" ng-model="supplier_add" ng-Pattern="/^[0-9a-zA-Z]+$/;" ng-trim="true" capitalize-first required></input>
																				<span ng-show="suppForm.supplier_add.$touched && suppForm.supplier_add.$invalid" style="color: red">Supplier Address is invalid</span>
																			</div>
																			
																			<div class="form-group" style="padding-top: 5px">
																				<label>Supplier Contact Number:</label>
																				<input value="{{ $supplier->supplier_contact }}" type="text" class="form-control" placeholder="" name="supplier_contact" id="supplier_contact" max-length="11" ng-model="supplier_num" ng-Pattern="/^\d+$/" ng-trim="true" required></input>
																				<span ng-show="suppForm.supplier_contact.$touched && suppForm.supplier_contact.$invalid" style="color: red">Supplier Contact Number is invalid</span>
																			</div>
																			
																		</div>
																		
																	</div>
																</div>
																<div class="modal-footer">
																	<input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes"></input>
																	<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
																</div>
															</form>
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
									<button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal">
									<a style="color:#ffffff">Add</a>
									</button>
									<!-- Add Modal -->
									<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
										<div class="modal-dialog modal-full">
											<div class="modal-content">
												<div class="modal-header bg-maroon">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Add Supplier</h4>
												</div>
												<div class="modal-body">
													<div class="panel-group">
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
																	<form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-suppliers" method="POST" role="form" style="width:90%" ng-controller="angularController" name="suppForm" novalidate>
																		{{csrf_field()}}
																		<div class="row">
																			<div class="form-group col-md-10" style="padding-top: 50px;padding-left: 50px">
																				@if ($errors->has('supplier_compname'))
																				<div class="form-group has-error has-feedback" style="padding-top: 5px">
																					<label >Supplier Name:</label>
																					<input type="text" class="form-control" placeholder="{{$errors->first('supplier_compname')}}"name="supplier_compname">
																					<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																				</div>
																				@else
																				<div class="form-group" style="padding-top: 5px">
																					<label>Supplier Name:</label>
																					<input type="text" class="form-control" placeholder="" name="supplier_compname"  ng-model="supplier.text" ng-Pattern="/^[a-z\'\WA-Z]+$/" ng-trim="true" capitalize-first required>
																					<span ng-show="suppForm.supplier_compname.$touched && suppForm.supplier_compname.$invalid" style="color: red">Supplier Name is invalid</span>
																				</div>
																				@endif
																				@if ($errors->has('markup_desc'))
																				<div class="form-group has-error has-feedback">
																					<label>Supplier Address:</label>
																					<input type="text" class="form-control" placeholder="{{$errors->first('supplier_add')}}" name="supplier_add" id="supplier_add">
																					<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																				</div>
																				@else
																				<div class="form-group" style="padding-top: 5px">
																					<label>Supplier Address:</label>
																					<input type="text" class="form-control" placeholder="" name="supplier_add" id="supplier_add" ng-model="supplier_add" ng-Pattern="/^[0-9a-zA-Z]+$/;" ng-trim="true" capitalize-first required></input>
																					<span ng-show="suppForm.supplier_add.$touched && suppForm.supplier_add.$invalid" style="color: red">Supplier Address is invalid</span>
																				</div>
																				@endif
																				@if ($errors->has('supplier_contact'))
																				<div class="form-group has-error has-feedback">
																					<label>Supplier Contact Number:</label>
																					<input type="text" class="form-control" placeholder="{{$errors->first('supplier_contact')}}" name="supplier_contact" id="supplier_contact" max="11">
																					<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																				</div>
																				@else
																				<div class="form-group" style="padding-top: 5px">
																					<label>Supplier Contact Number:</label>
																					<input type="text" class="form-control" placeholder="" name="supplier_contact" id="supplier_contact" max-length="11" ng-model="supplier_num" ng-Pattern="/^\d+$/" ng-trim="true" required></input>
																					<span ng-show="suppForm.supplier_contact.$touched && suppForm.supplier_contact.$invalid" style="color: red">Supplier Contact Number is invalid</span>
																				</div>
																				@endif
																				
																			</div>
																		</div>
																		<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Add"
																		ng-disabled="suppForm.supplier_compname.$invalid || suppForm.supplier_add.$invalid || suppForm.supplier_contact.$invalid"></input>
																		<button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										</div><!-- /.modal-content -->
									</div>
								</div>
								<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
							</div>
						</div>
					</aside>
					@stop
					@section('footer')
					<script type="text/javascript">
					$(document).ready(function () {
					$("#data").DataTable();
					});
					</script>
					@stop