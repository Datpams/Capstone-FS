@section('page-title')
Flowers
@stop
@extends('admin-base')
@section('body')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class = "heading">Flowers</h1>
    <ol class="breadcrumb">
      <li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
      <li class="active">Flowers</li>
    </ol>
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
              <h3 class="box-title" ng-controller="angularController">Flowers Table</h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="data" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Flower Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($flowers as $flower)
                    @if($flower->price < 100)
                    <tr class="danger">
                      @else
                      <tr class="success">
                        @endif
                        <td>{{ $flower->name }}</td>
                        <td style="overflow-y:scroll;height:10%;max-width:370px">{{ $flower->desc }}</td>
                        <td>P {{ $flower->price }}</td>
                        <td>
                          <div class="col-md-10">
                            <button class="btn btn-primary btn flat"data-toggle="modal" data-target = "#{{$flower->id}}" ><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn flat" data-toggle="modal" data-target ="#{{$flower->id}}2"><i class="fa fa-trash"></i> Delete</button>
                          </div>
                          </div><!--table responsive-->
                        </td>
                      </tr>
                      <!--EDIT Modal-->
                      <div aria-hidden="true" class="modal fade" id="{{$flower->id}}" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-maroon">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Flowers</h4>
                            </div>
                            <div class="modal-body">
                              <div class="card">
                                <form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-flowers/{{$flower->id}}" method="POST" role="form" name="editFlowerform" ng-controller="angularController" novalidate>
                                  <input type="hidden" name="_method" value="PATCH">
                                  <div class="row">
                                    <div class="col-md-4 text-center" style="padding-top: 10px">
                                      <img id="img" src= "/img/{{$flower->fimage}}" class="img-circle" id="selectedimage" style="height: 230px; width: 260px; margin: 15px">
                                      <input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*">
                                      <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    </div>
                                    <div class="form-group col-md-4" style="padding-top: 5px">
                                      @if ($errors->has('flowername'))
                                      <div class="form-group has-error has-feedback" style="padding-top: 5px">
                                        <label >New Flower Name:</label>
                                        <input type="text" class="form-control" placeholder="{{$errors->first('flowername')}}" name="flowername">
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                      </div>
                                      @else
                                      <div class="form-group css-form" style="padding-top: 5px">
                                        <label>New Flower Name:</label>
                                        <input type="text" class="form-control" id = "flowername" name="flowername" value="{{$flower->name}}" ng-model="editFlower{!!$flower->id!!}" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first>
                                        <span ng-show="editFlowerform.flowername.$invalid" style="color: red">New Flower Name is invalid</span>
                                      </div>
                                      @endif
                                      <div class="form-group" style="padding-top: 5px">
                                        <label>New Flower Description:</label>
                                        <textarea class="form-control" name="flowerdesc" id="flowerdesc">{{$flower->desc}}</textarea>
                                      </div>
                                      <div class="form-group" style="padding-top: 5px">
                                        <label>New Flower Price:</label>
                                        <input type="number" min="0" class="form-control" value="{{$flower->price}}" id="flowerprice" name="flowerprice">
                                      </div>
                                      <div class="form-group" style="padding-top: 2px">
                                        <label>New Tags:</label>
                                        @unless($flower->ftags->isEmpty())
                                        <select style="width: 100%; padding-bottom: 3px" class="form-control editselect2" multiple="multiple" name="tags[]">
                                          @foreach($flower->ftags as $tag)
                                          <option selected value="{{$tag->id}}">{{$tag->name}}</option>
                                          @endforeach
                                        </select>
                                        @endunless
                                        <select style="width: 100%; padding-bottom: 3px" class="form-control editselect" multiple="multiple" name="tags[]">
                                          @foreach($ftags as $tag)
                                          <option value="{{$tag->id}}">{{$tag->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <hr>
                                      <input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes">
                                      <button type="button" class="btn  btn-default pull-right" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="form-group col-md-4" style="padding-top:5px">
                                      <div class="form-group" style="padding-top: 5px" >
                                        <label>Previous Flower Name:</label>
                                        <h4 ng-show="editFlower{!!$flower->id!!} == string || editFlower{!!$flower->id!!}==''">{{$flower->name}}</h4>
                                        <h4 ng-hide="editFlower{!!$flower->id!!}.$dirty">@{{editFlower{!!$flower->id!!}}}</h4>
                                      </div>
                                      <div class="form-group" style="padding-top: 5px; height:90px">
                                        <label>Previous Flower Description:</label>
                                        <h4 style="overflow:scroll">{{$flower->desc}}</h4>
                                      </div>
                                      <div class="form-group" style="padding-top: 5px">
                                        <label>Previous Flower Price:</label>
                                        <h4> {{$flower->price}}</h4>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div>
                          
                          <!-- Delete Modal -->
                          <div aria-hidden="true" class="modal fade" id="{{$flower->id}}2" role="dialog" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-danger">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                  <h3>Are you sure you want to delete <strong>{{$flower->name}}</strong>?</h3>
                                </div>
                                <div class="modal-footer">
                                  <a class="btn btn-primary pull-right" href="maintenance-flowers/{{$flower->id}}/delete">Yes</a>
                                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
                                  </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div>
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
                  <button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" data-target="#modal-iframe2" data-toggle="modal"></div>
                  <a style="color:#fff">Add</a>
                  </button>
                  <!-- Add Flower Modal -->
                  <div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-full">
                      <div class="modal-content">
                        <div class="modal-header bg-maroon">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Add Flower</h4>
                        </div>
                        <div class="modal-body">
                          <?php
                          $image = "/img/default-image.jpg";
                          ?>
                          <div class="panel-group">
                            <div class="panel panel-default" >
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
                                  <form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-flowers" method="POST" role="form" style="width:90%" name="flowerForm" ng-controller="angularController" novalidate>
                                    {{csrf_field()}}
                                    <div class="row">
                                      <div class="col-md-6 text-center" style="padding-top: 5px">
                                        <img id="img" src= "{{$image}}" class="img-circle" id="selectedimage" style="height: 230px; width: 260px; margin: 15px">
                                        <input id="upload" onchange="readURL(this)" type="file" name="file" id="file" class="center-block btn btn-default" accept="image/*" style="margin: 5% 5% 5% 5%"></input>
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-top: 5px">
                                          <label><span style="color:red">*</span>Flower Name:</label>
                                          <input type="text" class="form-control" placeholder="eg: Rose, Sunflower" name="flowername" ng-model="flowername" ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
                                          <span ng-show="flowerForm.flowername.$touched && flowerForm.flowername.$invalid" style="color: red">Flower Name is invalid</span>
                                        </div>
                                        <div class="form-group" style="padding-top: 5px">
                                          <label><span style="color:red">*</span>Flower Price:</label>
                                          <input type="number" step="0.01" min='0' class="form-control" placeholder="eg: P250.50" name="flowerprice" id="flowerprice" ng-model="flower.number" ng-trim="true" required></input>
                                          <span ng-show="flowerForm.flowerprice.$touched && flowerForm.flowerprice.$invalid" style="color: red">flower price is invalid</span>
                                        </div>
                                        
                                        <div class="form-group" style="padding-top: 5px">
                                          <label>Flower Description:</label>
                                          <textarea rows="5" class="form-control" placeholder="Color, class, type" name="flowerdesc" id="flowerdesc" ng-model="flowerdesc.text" ng-trim="true" capitalize-first ></textarea>
                                          <span ng-show="flowerForm.flowerdesc.$touched && flowerForm.flowerdesc.$invalid" style="color: red">flower description is invalid</span>
                                        </div>
                                        
                                        <div class="form-group" style="padding-top: 2px"></div>
                                        <label>Tags:</label>
                                        <select style="width: 100%; padding-bottom: 3px" class="form-control" multiple="multiple" name="tags[]" id="ftag" ng-model="flower.select" ng-trim="true" required>
                                          @foreach($ftags as $tag)
                                          <option value="{{$tag->id}}">{{$tag->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      
                                      <input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Add" ng-disabled="flowerForm.flowername.$invalid || flowerForm.flowerdesc.$invalid || flowerForm.flowerprice.$invalid"></input>
                                      <button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
                                    </div>
                                  </div>
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
@section('footer')
<script type="text/javascript">
$('#ftag').select2({
placeholder: 'Choose a tag',
tags: true,
tokenSeparators: [",", " "],
createTag: function(newTag){
return{
id: 'new:' + newTag.term,
text: newTag.term + ' (new)'
};
}
});
$(document).ready(function(e){
$('.editselect').select2({
placeholder: 'Edit tag',
tags: true,
tokenSeparators: [",", " "],
createTag: function(newTag){
return{
id: 'new:' + newTag.term,
text: newTag.term + ' (new)'
};
}
});
});
$(document).ready(function(e){
$('.editselect2').select2({
placeholder: 'Edit tag',
});
});
</script>
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
<script>
$(function () {
$("#data").DataTable();
});
</script>
<script>
$('body').on('hidden.bs.modal', '.modal', function () { 
  $(this).find('input[type="text"],input[type="email"],textarea,select').each(function() { 
    if (this.defaultValue != '' || this.value != this.defaultValue) {
         this.value = this.defaultValue; 
    } else { this.value = ''; }
  }); 
}); 
</script>
@stop