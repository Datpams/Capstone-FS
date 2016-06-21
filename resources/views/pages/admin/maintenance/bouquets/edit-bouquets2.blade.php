@section('page-title')
	Bouquets Maintenance
@stop
@extends('admin-base')


@section('body')

<!-- 
<div aria-hidden="true" class="modal fade" id="1editModal" role="dialog" tabindex="-1" style="padding-top: 8%">
  	<div class="modal-lg center-block text-center">
	    <div class="modal-content">
	      <div class="modal-header bg-maroon">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Edit Bouquet</h4>
	      </div>
	    	<div class="modal-body">
				<div class="container">
		    		<div class="panel-body">
		    			<div class="card text-center">
		    				<form enctype="multipart/form-data" class="container-fluid" action="/maintenance-bouquets" method="POST" role="form">
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
											<label>Bouquet Name:</label>
										 	<input value="{{$bouquet->name}}" type="text" class="form-control" name="boqname" id="boqname">
										 </div>

										 <div class="form-group" style="padding-top: 2%;">
											<label>Bouquet Description:</label>
											<textarea class="form-control" name="boqdesc" rows="5"></textarea>
										 </div>
										 <div class="form-group" style="padding-top: 2%;">
											<input type="submit" class="btn btn-primary" value="Create Bouquet"></input>
										</div>
									</div>		

									<div class="col-md-8" style="border-style: ridge; margin-top: 2%;height: 75%;">
										<div class="col-md-12 row">
										  <h2>Customize Bouquet</h2>
										  <ul class="nav nav-tabs">
										    <li class="active"><a data-toggle="tab" href="#home2">Home</a></li>
										    <li><a data-toggle="tab" href="#menu12">Container</a></li>
										    <li><a data-toggle="tab" href="#menu22">Add Ons</a></li>
										    <li><a data-toggle="tab" href="#menu32">Set Flowers</a></li>
										  </ul>

										  <div class="tab-content">
										    <div id="home2" class="tab-pane fade in active">
										      <h3>HOME</h3>
										      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										    </div>
										    <div id="menu12" class="tab-pane fade">
										      <h3>Menu 1</h3>
										      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										    </div>
										    <div id="menu22" class="tab-pane fade">
										      <h3>Menu 2</h3>
										      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
										    </div>
										    <div id="menu32" class="tab-pane fade">
										      <h3>Flower Composition</h3>
										      	<div class="col-md-12 row" style="overflow-y: scroll; height: 75%; width: 109%">

												</div>
										    </div>
										  </div>
										</div>
									</div>
								</div>
							</form>
							<h4 class="pull-right">Total Amount: P</h4>
		    			</div>
		    		</div>
		  		</div>
		  		<h1 class="text-primary" id="text-primary">wew</h1>
			</div>
		</div>
	</div>
</div>
1st edit modal -->



<aside class="right-side">

	<section class="content-header">
	<h1 class = "heading">Bouquets</h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-laptop"></i> Maintenance</a></li>
	    <li class="active">Edit Bouquet</li>
	  </ol>
	</section>

	<section class="content">
		<div class="panel-group container">
		  	<div class="panel panel-default">
		  		<div class="card">
		    		<div class="panel-body">
		    			<form enctype="multipart/form-data" class="container-fluid" action="/maintenance-bouquets/{{$bouquet->id}}" method="POST" role="form" style="width:90%">
						<input type="hidden" name="_method" value="PATCH">
						{{csrf_field()}}
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
							<div class="row">
								<div class="col-md-4">
									<img id="img" src="/img/{{$bouquet->fimage}}" class="img-circle" id="selectedimage" style="height: 250px; width: 280px; margin: 5% 5% 5% 5%">
									<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*" style=" margin: 5% 5% 5% 5%"></input>
									<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>

									<div class="form-group" style=" margin: 5% 5% 5% 5%">
										<label>Bouquet Name:</label>
									 	<input type="text" class="form-control" name="boqname" value="{{$bouquet->name}}">
									 </div>

									 <div class="form-group" style=" margin: 5% 5% 5% 5%">
										<label>Bouquet Description:</label>
									 	<input type="text" class="form-control" name="boqdesc" value="{{$bouquet->desc}}">
									 </div>
									 <div class="form-group" style=" margin: 5% 5% 5% 5%">	
									<input type="submit" class="btn btn-primary" value="Update Bouquet"></input>
								</div>
								</div>
								<?php 
								//	$flow = (object) array_merge((array) $flowers, (array) $flowers2);
								//$flow = (array_merge($flowers,$flowers2));
								$ctr = 0;
								?>
								<div class="col-md-8 row pull-right" style="border-style: ridge; margin-top: 14px">
									<div class="col-md-4">							
									</div>
									<div class="col-md-12 row" style="overflow-y: scroll; height: 470px; width: 720px">
										<legend class="text-center">Flower Composition</legend>

										@foreach($flowers as $flower)
											<div class="col-sm-4" style="margin-top: 5px">
												<img src="/img/{{$fimage[$ctr]}}" class="text-center" style="height: 150px; width: 150px; margin: 10px" id="{{$id[$ctr]}}">
												<h4 class="text-center">{{$name[$ctr]}}</h4>
												<input type="number" class="form-control" placeholder="Quantity" style="margin-bottom: 15px" name="qty[]" value="{{$flower->quantity}}" min="0"></input>
												<input type="hidden" value="{{$price[$ctr]}}" name="price[]">
												<input type="hidden" value="{{$id[$ctr]}}" name="id[]">
												<?php
												$ctr+=1
												?>
											</div>
										@endforeach
										<!--
											<div class="col-md-4 text-center" style="margin-top: 13%">
												<span class="glyphicon glyphicon-plus btn btn-primary">Add</span></input>
											</div>								
										-->
									</div>
								</div>

							
								
							</div>
						</form>
		    		</div>
		    	</div>	
		  	</div>
		</div>
	</section>
</aside>

@stop


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
