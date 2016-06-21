<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies th e "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {

//PagesController Routes
    //home side    
    Route::get('/', 'PagesController@home');
    Route::get('bouquets', 'PagesController@bouquets');
    Route::get('events', 'PagesController@events');
    Route::get('flowers', 'PagesController@flowers');
    //admin side
    Route::get('admin', 'PagesController@admin');
    Route::post('admin/log', 'PagesController@adminlogin');
    Route::get('maintenance', 'PagesController@maintenance');
    Route::get('report', 'PagesController@report');
    Route::get('checkout', 'PagesController@checkout');
    
    Route::get('maintenance-dashboard','PagesController@dashboard');
    Route::get('search','PagesController@search');
    Route::get('calendar','PagesController@calendar');

//Inventory Routes
    Route::get('inventory', 'InventoryController@showinventory');
    Route::post('inventory', 'InventoryController@addinventory');
    Route::get('inventory/{inventory}/delete', 'InventoryController@deleteinventory');
    Route::get('transfer', 'PagesController@transfer');      


//MaintenanceController Routes
    Route::get('maintenance-flowers', 'MaintenanceController@flowers');
    Route::get('maintenance-bouquets', 'MaintenanceController@bouquets');
    Route::get('maintenance-events', 'MaintenanceController@events');
    //Route::get('maintenance-categories', 'MaintenanceController@categories');
    Route::get('maintenance-payments', 'MaintenanceController@payments');
    Route::get('maintenance-events', 'MaintenanceController@events');
    Route::get('maintenance-markup', 'MaintenanceController@markups');
    Route::get('maintenance-employees', 'MaintenanceController@employees');
    Route::get('maintenance-suppliers', 'MaintenanceController@suppliers');
    Route::get('maintenance-items', 'MaintenanceController@items');
    Route::get('maintenance-packages','MaintenanceController@packages');



    //FlowerController Routes
    Route::post('maintenance-flowers', 'FlowerController@add');
    Route::get('maintenance-flowers/{flower}/show', 'FlowerController@show');
    Route::patch('maintenance-flowers/{flower}', 'FlowerController@edit');
    Route::get('maintenance-flowers/{flower}/delete', 'FlowerController@delete');

    //EventController Routes
    Route::post('maintenance-events', 'EventController@add');
    Route::get('maintenance-events/{occasion}/show', 'EventController@show');
    Route::patch('maintenance-events/{occasion}', 'EventController@edit');

    Route::get('maintenance-events/{occasion}/delete', 'EventController@delete');

    //bouquetController Routes
    Route::post('maintenance-bouquets', 'bouquetController@add');
    Route::get('maintenance-bouquets/{bouquet}/show', 'bouquetController@show');
    Route::patch('maintenance-bouquets/{bouquet}', 'bouquetController@edit');
    Route::get('maintenance-bouquets/{bouquet}/delete', 'bouquetController@delete');


    //CategoriesController Routes
    Route::post('maintenance-categories', 'CategoriesController@add');
    Route::get('maintenance-categories/{category}/show', 'CategoriesController@show');
    Route::patch('maintenance-categories/{category}', 'CategoriesController@edit');

    //PaymentController Routes
    Route::post('maintenance-payments', 'PaymentController@add');
    Route::get('maintenance-payments/{payments}/show', 'PaymentController@show');
    Route::patch('maintenance-payments/{payments}', 'PaymentController@edit');   


    Route::get('maintenance-payments/{payments}/delete', 'PaymentController@delete');

    //MarkupController
    Route::post('maintenance-markup', 'MarkupController@add');
    Route::get('maintenance-markup/{markup}/show', 'MarkupController@show');
    Route::patch('maintenance-markup/{markup}','MarkupController@edit');

    Route::get('maintenance-markup/{markup}/delete', 'MarkupController@delete');

    //EmployeeController
    Route::post('maintenance-employees', 'EmployeeController@add');
    Route::get('maintenance-employees/{employee}/show', 'EmployeeController@show');
    Route::patch('maintenance-employees/{employee}','EmployeeController@edit');

    Route::get('maintenance-employees/{employee}/delete', 'EmployeeController@delete');

    //SupplierController Routes
    Route::post('maintenance-suppliers', 'SupplierController@add');
    Route::get('maintenance-suppliers/{supplier}/show', 'SupplierController@show');
    Route::patch('maintenance-suppliers/{supplier}','SupplierController@edit');

    Route::get('maintenance-suppliers/{supplier}/delete', 'SupplierController@delete');


    //ItemController Routes
    Route::post('maintenance-items', 'ItemController@add');
    Route::get('maintenance-items/{item}/show', 'ItemController@show');
    Route::patch('maintenance-items/{item}','ItemController@edit');

    Route::get('maintenance-items/{item}', 'ItemController@delete');

    //PackageController --Wala pa
    Route::post('maintenance-package', 'PackageController@add');
    Route::get('maintenance-package/{pack}/show', 'PackageController@show');
    Route::patch('maintenance-package/{pack}','PackageController@edit');

//--------------------SHOPPING ROUTES-----------------//

    //CartController
    Route::get('shoppingCart', 'CartController@index');
    Route::get('shoppingCart/{cart}/show', 'CartController@show');
    Route::patch('shoppingCart/{cart}', 'CartController@edit');
    Route::get('shoppingCart/{cart}/delete', 'CartController@delete');
    Route::post('shoppingCartx', 'CartController@qty');

    //shopCartController
    Route::post('shopAddBouquet', 'shopCartController@bouquet');    


    //checkoutController
    Route::post('checkout', 'checkoutController@confirm');
    Route::post('checkout/finish', 'checkoutController@finish');
    Route::post('checkout/finish-del', 'checkoutController@finish_del');

    //shopBouquetController



});


