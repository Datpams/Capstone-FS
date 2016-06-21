@extends('admin-base')
@section('page-title')
	Maintenance
@stop


@section('body')
<aside class="right-side">
<!-- Content Header (Page header) -->
	<section class="content-header">
         <h1 class = "heading">Maintenance</h1>
         <ol class="breadcrumb">
            <li class = "active"><a href="#"><i class="fa fa-laptop"></i> Maintenance</a></li>
         </ol>
    </section>

 <!--0000000000000000000000000000000000000000000000000-->

<!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
			<div class="row">
            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="box box-widget box-default box-solid ">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle'>
                    <span class='username'><a href="#">Inventory Maintenance</a></span>
                    <span class='description'>Pati description haha</span>
                  </div><!-- /.user-block -->
                  <div class='box-tools'>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img class="img-responsive pad" alt="alt text" style="height: 180px; width:100%" src="/img/ros37.jpg">
										<p class="card-img-heading">Flowers</p>
									</div>
									<div class="card-action" >
										<ul class="nav nav-list push-center" >
											<li>
												<a href="{{action('MaintenanceController@flowers')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
				<!-- /.col-lg-4 -->
		       <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%" src="/img/roses.jpg">
										<p class="card-img-heading">Bouquet</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@bouquets')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

<!-- /.col-lg-4 -->
			<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:50%" src="/img/bea11.jpg">
										<p class="card-img-heading">Other Items</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@items')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
<!-- /.col-lg-4 -->
			<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%" src="/img/rec4.jpg">
										<p class="card-img-heading">Packages</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="#"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
               
                </div><!--body-->
                  
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
            

<!---sales maintenance-->           
<div class="row">
            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="box box-widget box-default box-solid ">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle'>
                    <span class='username'><a href="#">Sales Maintenance</a></span>
                    <span class='description'>Pati description haha</span>
                  </div><!-- /.user-block -->
                  <div class='box-tools'>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img class="img-responsive pad" alt="alt text" style="height:180px; width:100%" src="/img/per10.jpg">Payment Method</p>
									</div>
									<div class="card-action" >
										<ul class="nav nav-list push-center" >
											<li>
												<a href="{{action('MaintenanceController@payments')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
				<!-- /.col-lg-4 -->
		       <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%"src="/img/markup2.jpg">Markup</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@markups')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
                </div><!--body-->
                  
                </div><!-- /.box-footer -->
          

<!--miscellaneous-->
<div class="row">
            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="box box-widget box-default box-solid ">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle'>
                    <span class='username'><a href="#">Miscellaneous Maintenance</a></span>
                    <span class='description'>Pati description haha</span>
                  </div><!-- /.user-block -->
                  <div class='box-tools'>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class='box-body'>
<!-- /.col-lg-4 -->
		       <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%" src="/img/wed2.jpg">
										<p class="card-img-heading">Events</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@events')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
			<!-- /.col-lg-4 -->
<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%" src="/img/Employee.png">
										<p class="card-img-heading">Employee</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@employees')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
<!-- /.col-lg-4 -->
<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-img">
										<img alt="alt text" style="height: 180px; width:100%" src="/img/images.jpg">
										<p class="card-img-heading">Supplier</p>
									</div>
									<div class="card-action">
										<ul class="nav nav-list push-center">
											<li>
												<a href="{{action('MaintenanceController@suppliers')}}"><span class="icon icon-check text-purple"></span>&nbsp;<span style = "color:#E91E63">Modify</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
<!-- /.col-lg-4 -->
               
                </div><!--body-->
                  
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>

            </div>
            </div>
            </div>
        </section><!-- /.content -->
</aside>
@stop
