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

Auth::routes();

Route::get('search' , 'SearchController@search')->name('search'); 

Route::get('/home', 'HomeController@index')->name('home');

Route::post('employee/submission-id-pass', 'RecordController@storeRecord')->name('submissionid.record.store');


Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin' 
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('employee', 'EmployeeController');
    Route::resource('category','CategoryController');

    Route::get('history','SettingsController@showAllHistory')->name('history');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::get('category/employee/{id}','CategoryController@showIndividualCategoryWiseRecord')->name('categorywiseIndividual.show');
    
   
});

Route::group([ 
    'as' => 'subadmin.', 
    'prefix' => 'subadmin', 
    'namespace' => 'SubAdmin', 
    'middleware' => [ 
    'auth', 'subadmin' 
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('employee', 'EmployeeController');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
});

