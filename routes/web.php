<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    route::resource('career','CareerController');
    // route::resource('study_plan','StudyPlanController');
    // route::resource('model','ModeloController');
    // route::resource('trademark','TrademarkController');
    // route::resource('reason','ReasonController');
    // route::resource('frequency','FrequencyController');
    // route::resource('priority','PriorityController');
    // route::resource('maintenance_plan','MaintenancePlanController');
    // route::resource('place','PlaceController');
    // route::resource('software_type','SoftwareTypeController');
    // route::resource('state','StateController');
    // route::resource('position','PositionController');
    // route::resource('type_inventory','TypeInventoryController');
    // route::resource('type_shrinkage','TypeShrinkageController');
    // route::resource('active_input','ActiveInputController');
    // route::resource('liable','LiableController');
    // route::resource('inventory_process','InventoryProcessController');
    // route::resource('equipment_plan_study','EquipmentPlanStudyController');
    // route::resource('inventory','InventoryController');
    // route::resource('lending','LendingController');
    // route::resource('maintenance','MaintenanceController');
    // route::resource('software','SoftwareController');
    // route::resource('shrinkage','ShrinkageController');
    // route::resource('loan_registration','LoanRegistrationController');
    // route::resource('difference_inventory','DifferenceInventoryController');
    // route::resource('software_plan_study','SoftwarePlanStudyController');
    // route::resource('place_software','PlaceSoftwareController');
    // Route::get('/index', 'HomeController@index')->name('index'); 
});