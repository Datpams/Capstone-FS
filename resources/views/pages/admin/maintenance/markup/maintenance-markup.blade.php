@section('page-title')
Markup Maintenance
@stop
@extends('admin-base')
@section('body')
<style type="text/css">
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
    <h1 class = "heading">Markup</h1>
    <ol class="breadcrumb">
      <li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
      <li class="active">Markup</li>
    </ol>
  </section>
  <!--ooooooooooooooooooooooooLISTofFLOWERSooooooooooooooooooooooooooooooo-->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Markup Table</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Markup Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($markups as $markup)
                  <tr>
                    <td>{{ $markup->markup_name }}</td>
                    <td>{{ $markup->markup_desc }}</td>
                    <td>
                      <div class="col-md-10">
                        <button class="btn btn-primary btn flat"data-toggle="modal" data-target="#{{$markup->id}}"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn flat" data-toggle="modal" data-target="#{{$markup->id}}2"><i class="fa fa-trash"></i> Delete</button>
                      </div>
                    </td>
                  </tr>
                  <!-- Delete Modal -->
                  <div aria-hidden="true" class="modal fade" id="{{$markup->id}}2" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete</h4>
                        </div>
                        <div class="modal-body">
                          <h3>Are you sure you want to delete <strong>{{$markup->markup_name}}</strong> Markup?</h3>
                        </div>
                        <div class="modal-footer">
                          <a class="btn btn-primary pull-right" href="maintenance-markup/{{$markup->id}}/delete">Yes</a>
                          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
                        </div>
                        </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div>
                      <!--EDIT-->
                      <div aria-hidden="true" class="modal fade" id="{{$markup->id}}" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-warning">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Markup</h4>
                            </div>
                            <div class="modal-body">
                              <form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-markup/{{$markup->id}}" method="POST" role="form" style="width:90%" name="myForm" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="row">
                                  <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group" style="padding-top: 10%" ng-controller="angularController">
                                      <label>Markup Name:</label>
                                      <input value="{{ $markup->markup_name }}" type="text" class="form-control" placeholder="valentines markup, new year markup.." name="markup_name" ng-model="markup.text"  ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
                                      <span ng-show="myForm.markup_name.$touched && myForm.markup_name.$invalid" style="color: red">Markup name is invalid</span>
                                    </div>
                                    <div class="form-group">
                                      <label>Markup Percentage:</label>
                                      <input value="{{ $markup->markup_value }}"  type="number" class="form-control" placeholder="20, 30, 50.." step=".10" min="1" ng-model="markup.number" name="markupRate" required>
                                      <span ng-show="myForm.markupRate.$touched && myForm.markupRate.$invalid" style="color: red">Markup rate is invalid</span>
                                    </div>
                                    <div class="form-group" style="padding-top: 5px">
                                      <label>Markup Description:</label>
                                      <textarea type="text" class="form-control" placeholder="" name="markup_desc" id="markup_desc"  ng-model="markup.text" ng-trim="true" capitalize-first required> {{ $markup->markup_desc }} </textarea>
                                      <span ng-show="myForm.markup_desc.$touched && myForm.markup_desc.$invalid" style="color: red">Markup Description is invalid</span>
                                    </div>
                                    <div class="form-group">
                                      <label>Date range:</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="reservation" name="date" ng-model="date" value="{{$markup->markup_range}}">
                                        </div><!-- /.input group -->
                                        <span ng-show="myForm.date.$touched && myForm.date.$invalid" style="color: red">Markup duration is invalid</span>
                                        </div><!-- /.form group -->
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes"></input>
                                        <button style="margin-right: 1px" type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                                      </div>
                                      </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div>
                                  </form>
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
                          <button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal">
                          <a style="color:#ffffff">Add</a>
                          </button>
                          <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                          <!-- Add Modal -->
                          <div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-full">
                              <div class="modal-content">
                                <div class="modal-header bg-maroon">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title">Add Markup</h4>
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
                                          <form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-markup" method="POST" role="form" style="width:90%" name="myForm" novalidate>
                                            {{csrf_field()}}
                                            <div class="row">
                                              <div class="col-md-11">
                                                <div class="form-group" style="padding-top: 10%" ng-controller="angularController">
                                                  <label><span style="color:red">*</span>Markup Name:</label>
                                                  <input type="text" class="form-control" placeholder="valentines markup, new year markup.." name="markup_name" ng-model="markup.text"  ng-Pattern="/^[a-z\'\-\  A-Z]+$/" ng-trim="true" capitalize-first required>
                                                  <span ng-show="myForm.markup_name.$touched && myForm.markup_name.$invalid" style="color: red">Markup name is invalid</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                  <label><span style="color:red">*</span>Markup Rate</label>
                                                  <input type="number" class="form-control" placeholder="20%, 30%, 50%.." step=".10" min="1" ng-model="markup.number" name="markupRate" required>
                                                  <span ng-show="myForm.markupRate.$touched && myForm.markupRate.$invalid" style="color: red">Markup rate is invalid</span>
                                                </div>
                                                
                                                <div class="form-group" style="padding-top: 5px">
                                                  <label>Markup Description:</label>
                                                  <textarea type="text" class="form-control" placeholder="" name="markup_desc" id="markup_desc"  ng-model="markup.text" ng-trim="true" capitalize-first></textarea>
                                                  <span ng-show="myForm.markup_desc.$touched && myForm.markup_desc.$invalid" style="color: red">Markup Description is invalid</span>
                                                </div>
                                                <div class="form-group">
                                                  <label><span style="color:red">*</span>Date range:</label>
                                                  <div class="input-group">
                                                    <div class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="reservation" name="date" ng-model="date">
                                                    </div><!-- /.input group -->
                                                    <span ng-show="myForm.date.$touched && myForm.date.$invalid" style="color: red">Markup duration is invalid</span>
                                                    </div><!-- /.form group -->
                                                  </div>
                                                  <input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right" value="Add"  ng-disabled="myForm.markup_name.$invalid || myForm.markupRate.$invalid || myForm.markup_desc.$invalid || myForm.markupTime.$invalid"></input>
                                                  <button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
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
                                <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                              </div>
                            </div>
                          </aside>
                          @stop
                          @section('footer')
                          <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
                          <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
                          <script>
                          $(document).ready(function (e){
                          $('input[id="reservation"]').daterangepicker();
                          });
                          $(function () {
                          $("#example1").dataTable();
                          $('#example2').dataTable({
                          "paging": true,
                          "lengthChange": false,
                          "searching": false,
                          "ordering": true,
                          "info": true,
                          "autoWidth": false
                          });
                          });
                          </script>
                          @stop