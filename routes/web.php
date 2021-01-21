<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
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

// =================delete code start==========


// =================delete code start==========


Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', 'UserController');

    Route::resource('permission', PermissionController::class);
    // Route::get('/permission',[PermissionController::class]);

    // Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/profile',[UserController::class, 'profile'])->name('user.profile');

    // Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');
    Route::post('/profile',[UserController::class, 'postProfile'])->name('user.postProfile');

    // Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');
    Route::get('/password/change',[UserController::class, 'getPassword'])->name('userGetPassword');

    // Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');
    Route::post('/password/change',[UserController::class, 'postPassword'])->name('userPostPassword');
});


Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', 'RoleController');


});







Auth::routes();


//////////////////////////////// axios request

Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");
Route::get("/getAllUsers", "UserController@getAll");
Route::get("/getAllRoles", "RoleController@getAll");
Route::get("/getAllPermissions", "PermissionController@getAll");

/////////////axios create user
Route::post('/account/create', 'UserController@store');
Route::put('/account/update/{id}', 'UserController@update');
Route::delete('/delete/user/{id}', 'UserController@delete');
Route::get('/search/user', 'UserController@search');