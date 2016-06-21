@section('page-title')
Categories
@stop
@extends('admin-base')
@section('body')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class = "heading">Categories</h1>
		<ol class="breadcrumb">
			<li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
			<li class="active">Categories</li>
		</ol>
	</section>
	<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Data Table With Full Features</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Category Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($categories as $category)
									<tr>
										<td>{{ $category->fc_name }}</td>
										<td>{{ $category->fc_desc }}</td>
										<td>
											<div class="col-md-10">
												<button class="btn btn-primary btn flat"data-toggle="modal" href="#modal-iframe"><i class="fa fa-edit"></i> Edit</button>
												<button class="btn btn-danger btn flat" data-toggle="modal" href="#modal-iframe3"><i class="fa fa-trash"></i> Delete</button>
											</div>
										</td>
									</tr>
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
				<div aria-hidden="true" class="modal fade" id="modal-iframe3" role="dialog" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Delete</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete this Category?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary pull-right">YES</button>
								<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
							</div>
							</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
						<!--EDIT-->
						<div aria-hidden="true" class="modal fade" id="modal-iframe" role="dialog" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-warning">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Edit Category</h4>
									</div>
									<div class="modal-body" src="" title="edit">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary pull-right">YES</button>
										<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
									</div>
									</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<button type="button" class=" btn bg-maroon" style="position: fixed; bottom: 20px; right: 20px; border-radius: 150px 150px 150px 150px; padding: 10px 15px; font-size: 20px; cursor: pointer;">
								<a href="#modal-iframe2" data-toggle="modal"><span class="fa fa-plus" style="color:#ffffff"></span></a>
								</button>
							</div>
						</div>
						<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
						<div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
							<div class="modal-dialog modal-full">
								<div class="modal-content">
									<div class="modal-header bg-maroon">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Add Category</h4>
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
														<form enctype="multipart/form-data" class="container-fluid" action="/maintenance-categories" method="POST" role="form" style="width:90%">
															{{csrf_field()}}
															
															<div class="row">
																<div class="col-md-11">
																	@if ($errors->has('fc_name'))
																	<div class="form-group has-error has-feedback" style="padding-top: 5px">
																		<label >Category Name:</label>
																		<input type="text" class="form-control" placeholder="{{$errors->first('fc_name')}}"name="fc_name">
																		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																	</div>
																	@else
																	<div class="form-group" style="padding-top: 10%">
																		<label>Category Name:</label>
																		<input type="text" class="form-control" placeholder="eg: Rose, Lily" name="fc_name">
																	</div>
																	@endif
																	@if ($errors->has('fc_desc'))
																	<div class="form-group has-error has-feedback" style="padding-top: 5px">
																		<label>Category Description:</label>
																		<input type="text" class="form-control" placeholder="{{$errors->first('fc_desc')}}" name="fc_desc" id="fc_desc">
																		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
																	</div>
																	@else
																	<div class="form-group" style="padding-top: 5px">
																		<label>Category Description:</label>
																		<input type="text" class="form-control" placeholder="Color, class, type" name="fc_desc" id="fc_desc"></input>
																	</div>
																	@endif
																</div>
															</div>
															<input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Add"></input>
															<button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
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