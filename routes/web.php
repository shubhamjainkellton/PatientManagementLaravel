<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route::get('/appointment/create', 'AppointmentController@create');
    



Route::get('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@doLogin');

Route::get('/forgotPassword', 'forgotPassword@show');
Route::post('/forgotPassword', 'forgotPassword@sendPasswordResetToken');
Route::get('/resetpass/{token}', 'forgotPassword@showPasswordResetForm');
Route::post('/resetpass/{token}', 'forgotPassword@resetPassword');

Route::group(['middleware' => ['admin', 'loguser']], function () {

    Route::get('/admindashboard', function () {
        return view('admin.dashboard');
    });
        
    Route::get('/doctor/create', 'DoctorController@create');
    Route::post('/doctor', 'DoctorController@store');
    Route::get('/doctor', 'DoctorController@index');
    Route::get('/doctor/{user}/edit', 'DoctorController@edit');
    Route::post('/doctor/{user}', 'DoctorController@update')->name('doc_update');
    Route::delete('/doctor/{user}', 'DoctorController@destroy');
    Route::get('/doctor/search', 'DoctorController@search');

    Route::get('/staff/create', 'StaffController@create');
    Route::post('/staff', 'StaffController@store');
    Route::get('/staff', 'StaffController@index');
    Route::get('/staff/{staff}/edit', 'StaffController@edit');
    Route::put('/staff/{staff}', 'StaffController@update');
    Route::delete('/staff/{staff}', 'StaffController@destroy');
    Route::get('/staff/search', 'StaffController@search');

    Route::get('/patient/create', 'PatientController@create');
    Route::post('/patient', 'PatientController@store');
    Route::get('/patient', 'PatientController@index');
    Route::get('/patient/{patient}/edit', 'PatientController@edit');
    Route::put('/patient/{patient}', 'PatientController@update');
    Route::delete('/patient/{patient}', 'PatientController@destroy');
    Route::get('/appointment/{patient}/show', 'PatientController@show');
    Route::post('/appointment/{patient}', 'PatientController@newstore');
    Route::get('/patient/search', 'PatientController@search');



    Route::get('/admit_ward/create', 'WardController@create');
    Route::post('/admit_ward', 'WardController@store');
    Route::get('/admit_ward', 'WardController@index');
    Route::get('/admit_ward/{wardadmit}/edit', 'WardController@edit');
    Route::put('/admit_ward/{wardadmit}', 'WardController@update');
    Route::delete('/admit_ward/{wardadmit}', 'WardController@destroy');
    Route::get('/admit_ward/search', 'WardController@search');

    Route::get('/depart_ward/create', 'WardDepartController@create');
    Route::post('/depart_ward', 'WardDepartController@store');
    Route::get('/depart_ward', 'WardDepartController@index');
    Route::get('/depart_ward/{warddepart}/edit', 'WardDepartController@edit');
    Route::put('/depart_ward/{warddepart}', 'WardDepartController@update');
    Route::delete('/depart_ward/{warddepart}', 'WardDepartController@destroy');
    Route::get('/depart_ward/search', 'WardDepartController@search');

    Route::get('/appointment/create', 'AppointmentController@create');
    Route::post('/appointment', 'AppointmentController@store');
    Route::get('/appointment', 'AppointmentController@index');
    Route::get('/appointment/{appointment}/edit', 'AppointmentController@edit');
    Route::put('/appointment/{appointment}', 'AppointmentController@update');
    Route::delete('/appointment/{appointment}', 'AppointmentController@destroy');
    Route::get('/appointment/search', 'AppointmentController@search');

    Route::get('/profile','ProfileController@index')->name('profile');
    Route::get('/profile/{user}/edit','ProfileController@edit')->name('edit');
    Route::put('/profile/{user}','ProfileController@update')->name('update');


    Route::get('/logout', 'LoginController@logout');
    
});

Route::group(['middleware' => ['admin', 'loguser']], function () {
    Route::get('/doctordashboard', function () {
        return view('doctor.dashboard');
    }); 

    Route::get('/patient/create', 'PatientController@create');
    Route::post('/patient', 'PatientController@store');
    Route::get('/patient', 'PatientController@index');
    Route::get('/appointment/{patient}/show', 'PatientController@show');
    Route::post('/appointment/{patient}', 'PatientController@newstore');
    Route::post('/patient/search', 'PatientController@search');


    Route::get('/appointment/create', 'AppointmentController@create');
    Route::post('/appointment', 'AppointmentController@store');
    Route::get('/appointment', 'AppointmentController@index');
    Route::get('/appointment/search', 'AppointmentController@search');
   
});

Route::group(['middleware' => ['admin', 'loguser']], function () {
    Route::get('/staffdashboard', function () {
        return view('staff.dashboard');
    });
    
    Route::get('/patient/create', 'PatientController@create');
    Route::post('/patient', 'PatientController@store');
    Route::get('/patient', 'PatientController@index');
    Route::get('/appointment/{patient}/show', 'PatientController@show');
    Route::post('/appointment/{patient}', 'PatientController@newstore');
    Route::get('/patient/search', 'PatientController@search');


    Route::get('/admit_ward/create', 'WardController@create');
    Route::post('/admit_ward', 'WardController@store');
    Route::get('/admit_ward', 'WardController@index');
    Route::get('/admit_ward/search', 'WardController@search');

    Route::get('/depart_ward/create', 'WardDepartController@create');
    Route::post('/depart_ward', 'WardDepartController@store');
    Route::get('/depart_ward', 'WardDepartController@index');
    Route::get('/depart_ward/search', 'WardDepartController@search');

    Route::get('/appointment/create', 'AppointmentController@create');
    Route::post('/appointment', 'AppointmentController@store');
    Route::get('/appointment', 'AppointmentController@index');
    Route::get('/appointment/search', 'AppointmentController@search');
    
});

