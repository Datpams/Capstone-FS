@section('page-title')
Payment Methods
@stop
@extends('admin-base')
@section('body')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class = "heading">Payment Methods</h1>
    <ol class="breadcrumb">
      <li><a href="{{action('PagesController@maintenance')}}"><i class="fa fa-laptop"></i> Maintenance</a></li>
      <li class="active">Payment Method</li>
    </ol>
  </section>
  <!--ooooooooooooooooooooooooLISTofFLOWERSooooooooooooooooooooooooooooooo-->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Payment Method Table</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Payment Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($payments as $payment)
                  <tr>
                    <td>{{ $payment->payment_name }}</td>
                    <td>{{ $payment->payment_desc }}</td>
                    <td>
                      <div class="col-md-10">
                        <button class="btn btn-primary btn flat"data-toggle="modal" href="#{{$payment->id}}"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn flat" data-toggle="modal" href="#{{$payment->id}}2"><i class="fa fa-trash"></i> Delete</button>
                      </div>
                      
                    </div>
                  </td>
                </tr>
                <!-- Delete Modal -->
                <div aria-hidden="true" class="modal fade" id="{{$payment->id}}2" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete</h4>
                      </div>
                      <div class="modal-body">
                        <h3>Are you sure you want to delete <strong>{{$payment->payment_name}}</strong>?</h3>
                      </div>
                      <div class="modal-footer">
                        <a class="btn btn-primary pull-right" href="maintenance-payments/{{$payment->id}}/delete">Yes</a>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">NO</button>
                      </div>
                      </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div>
                    <!--EDIT-->
                    <div aria-hidden="true" class="modal fade" id="{{$payment->id}}" role="dialog" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Payment Method</h4>
                          </div>
                          <div class="modal-body">
                            <form enctype="multipart/form-data" class="container col-md-12" action="/maintenance-payments/{{$payment->id}}" method="POST" role="form">
                              <input type="hidden" name="_method" value="PATCH">
                              {{csrf_field()}}
                              <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                  <div class="form-group" style="padding-top: 10%">
                                    <label>Payment Method Name:</label>
                                    <input type="text" class="form-control" placeholder="" name="payment_name" value="{{ $payment->payment_name }}">
                                  </div>
                                  <div class="form-group" style="padding-top: 5px">
                                    <label>Payment Method Description:</label>
                                    <input type="text" class="form-control" placeholder="" name="payment_desc" id="payment_desc" value="{{ $payment->payment_desc }}"></input>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="modal-footer">
                              <input id="add" name = "add" type="submit" class="btn btn-info pull-right" value="Save Changes"></input>
                              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                            </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </form>
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
            <button type="button" class=" btn btn-lg" style="position: fixed; bottom: 20px; right: 20px; cursor: pointer; background-color: #e6004c" href="#modal-iframe2" data-toggle="modal"></div>
            <a style="color:#ffffff">Add</a>
            </button>
          </div>
        </div>
        <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
        <!-- Add Modal -->
        <div aria-hidden="true" class="modal fade" id="modal-iframe2" role="dialog" tabindex="-1">
          <div class="modal-dialog modal-full">
            <div class="modal-content">
              <div class="modal-header bg-maroon">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Payment Method</h4>
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
                        <form enctype="multipart/form-data" class="container-fluid css-form" action="/maintenance-payments" method="POST" role="form" style="width:90%" ng-controller="angularController" name="paymentForm">
                          {{csrf_field()}}
                          <div class = "row">
                            <div class="col-md-11">
                              @if ($errors->has('payment_name'))
                              <div class="form-group has-error has-feedback" style="padding-top: 5px">
                                <label >Payment Method Name:</label>
                                <input type="text" class="form-control" placeholder="{{$errors->first('payment_name')}}"name="payment_name">
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                              </div>
                              @else
                              <div class="form-group" style="padding-top: 10%">
                                <label>Payment Method Name:</label>
                                <input type="text" class="form-control" placeholder="" name="payment_name" ng-model="payment.text"  ng-Pattern="/^[a-z\'\_\-\&\  A-Z]+$/" ng-trim="true" capitalize-first min="5" required>
                              </div>
                              <span ng-show="paymentForm.payment_name.$touched && paymentForm.payment_name.$invalid" style="color: red">Payment Name is invalid</span>
                            </div>
                            @endif
                            @if ($errors->has('payment_desc'))
                            <div class="form-group has-error has-feedback" style="padding-top: 5px">
                              <label>Payment Method Description:</label>
                              <textarea type="text" class="form-control" placeholder="{{$errors->first('payment_desc')}}" name="payment_desc" id="payment_desc"></textarea>
                              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            </div>
                            @else
                            <div class="form-group" style="padding-top: 5px">
                              <label>Payment Method Description:</label>
                              <textarea type="text" class="form-control" placeholder="description..." name="payment_desc" id="payment_desc" ng-model="markup.text" ng-trim="true" capitalize-first required></textarea>
                            </div>
                            <div>
                              <span ng-show="paymentForm.payment_desc.$touched && paymentForm.payment_desc.$invalid" style="color: red">Payment Description is invalid</span>
                            </div>
                            @endif
                            
                            <input id="add" name = "add" type="submit" class="btn bg-maroon btn-flat pull-right col-md-2" value="Save" ng-disabled="paymentForm.payment_name.$invalid || paymentForm.payment_desc.$invalid"></input>
                            <button type="button" class="btn btn-flat pull-right" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer"></div>
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