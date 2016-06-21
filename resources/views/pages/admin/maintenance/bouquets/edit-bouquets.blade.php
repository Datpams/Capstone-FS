<!DOCTYPE html>
<html>
<link rel="stylesheet" href="links/bootstrap.min.css">
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
</style>

<head>
	<title></title>
</head>
<body>

	<aside class="center-block">

	<section class="content-header bg-maroon">
	<legend>Edit Bouquet</legend>
	  <ol class="breadcrumb">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	  </ol>
	</section>

	<section class="content">
		<div class="panel-group container">
		  	<div class="panel panel-default">
		  		<div class="card">
		    		<div class="panel-body">
		    			<form enctype="multipart/form-data" class="container-fluid" action="/maintenance-bouquets/{{$bouquet->id}}" method="POST" role="form" style="width:95%">
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
										<img id="img" src= "/img/{{$bouquet->fimage}}" class="img-circle" id="selectedimage" style="height: 30%; width: 85%; margin-bottom: 5px">
										<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*"></input>
										<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>

										<div class="form-group" style="padding-top: 2%;">
											<label>Bouquet Name:</label>
										 	<input type="text" class="form-control" name="boqname" value="{{$bouquet->name}}">
										 </div>

										 <div class="form-group" style="padding-top: 2%;">
											<label>Bouquet Description:</label>
											<textarea class="form-control" name="boqdesc" rows="5">{{$bouquet->desc}}</textarea>
										 </div>
										 <div class="form-group" style="padding-top: 2%;">
											<input type="submit" class="btn btn-primary" value="Update Bouquet"></input>
										</div>
									</div>	
								
								<?php 
								$ctr = 0;
								?>
								<div class="col-md-8" style="border-style: ridge; height: 75%;">
										<div class="col-md-12 row">
										  <h2 class="text-center">Customize Bouquet</h2>
										  <ul class="nav nav-tabs">
										    <li class="active"><a data-toggle="tab" href="#home1">Home</a></li>
										    <li><a data-toggle="tab" href="#menu11">Container</a></li>
										    <li><a data-toggle="tab" href="#menu21">Add Ons</a></li>
										    <li><a data-toggle="tab" href="#menu31">Set Flowers</a></li>
										  </ul>

										  <div class="tab-content">
										    <div id="home1" class="tab-pane fade in active">
										      <h3>HOME</h3>
										      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										    </div>
										    <div id="menu11" class="tab-pane fade">
										      <h3>Menu 1</h3>
										      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										    </div>
										    <div id="menu21" class="tab-pane fade">
										      <h3>Menu 2</h3>
										      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
										    </div>
										    <div id="menu31" class="tab-pane fade">
										      <legend class="text-center">Flower Composition</legend>
										      <div class="col-md-12 row" style="overflow-y: scroll; height: 75%; width: 109%">
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
										    </div>
										  </div>
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


</body>
</html>

<script src="links/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="links/bootstrap.min.js"></script>
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

	//redirect back to maintenance-bouquet when the modal closes
	$('#editModal').on('hide.bs.modal' , function (e){
		 window.location="{{URL::to('/maintenance-bouquets')}}";
	})


</script>

