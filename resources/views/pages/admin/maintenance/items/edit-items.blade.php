@section('page-title')
	Other Item Maintenance
@stop

@extends('admin-base')

@section('body')

<div class="content">
	<div class="content-heading" style = "background-color:#E91E63">
		<div class="container">
			<h1 class="heading">Other Items</h1>
		</div>
	</div>
</div>	


	<div class="panel-group container-fluid">
	  <div class="panel bg-maroon">
	    <div class="panel">
	      <div class="panel-body">
	    <div class="container">
	      <div class="card">
			<form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-items/{{$item->id}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PATCH">


				<div class="row">
					<div class="col-md-4 text-center" style="padding-top: 10px">
						<img id="img" src= "/img/{{$item->item_image}}" class="img-circle" id="selectedimage" style="height: 250px; width: 280px; margin: 15px">
						<input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image"></input>
						<input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
					</div>
						<div class="form-group col-md-8" style="padding-top: 50px">
							@if ($errors->has('item_name'))
							<div class="form-group has-error has-feedback" style="padding-top: 5px">
								<label >Item Name:</label>
								 <input type="text" class="form-control" placeholder="{{$errors->first('item_name')}}"name="item_name">
								 <span class="glyphicon glyphicon-remove form-control-feedback"></span>
							</div>
						@else
							<label>Item Name:</label>
							<input type="text" class="form-control" value="{{$item->item_name}}" id = "item_name" name="item_name">
						@endif
							<label>Event Description:</label>
							<input type="text" class="form-control" value="{{$item->item_desc}}" name="item_desc" id="item_desc"></input>

							<label>Item Price:</label>
							<input type="number" min="0" class="form-control" value="{{$item->price}}" id="itemprice" name="itepmrice"></input>

							<input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes"></input>
										<!--{{ var_dump('$errors') }}-->
						</div>
					</div>
				</div>
			</form>
		 </div>
	    </div>
	  </div>
	</div>



@stop
@section('footer')
<script> 

	$(document).ready(function(e){
		$('#thug').select2();
	});

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
         $('#img').attr('src', '/assets/no_preview.png');
    }
}
</script>
@stop