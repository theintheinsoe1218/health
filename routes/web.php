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
    return view('index');
})->name('index');
Route::get('/about',function(){
    return view('about');
})->name('about');
Route::get('/contact',function(){
    return view('contact');
})->name('contact');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/appointment','AppointmentController');


Route::post('/getTokenNo','AppointmentController@getTokenNo')->name('appointment.getTokenNo');

Route::resource('/user','UserController');

Route::get('/getAppointment', 'AppointmentController@getAppointment')->name('getAppointment');

Route::get('/getAppointmentview', 'AppointmentController@getAppointmentview')->name('getAppointmentview');

Route::get('/detail','AppointmentController@store')->name('detail');

Route::group(['middleware' => ['role:admin']],function(){
    Route::get('/backend','ReportController@getReports')->name('admin');
    Route::resource('/medicine','MedicineController');
    Route::resource('/treatment','TreatmentController');
});
Route::post('/report','ReportController@getReport')->name('report');
Route::get('/getreports','ReportController@getReports')->name('getreports');
Route::get('/getid','AppointmentController@getid')->name('getid');
Route::post('/getmedicines','MedicineController@getMedicines')->name('getmedicines');
Route::post('/updatemedicines','MedicineController@updateMedicines')->name('updatemedicines');



