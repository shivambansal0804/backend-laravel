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

// Login
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// Password Reset
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Superuser Routes
Route::group(['prefix' => 'superuser', 'middleware' => ['role:superuser']], function() {

    // Dashboard
    Route::get('/', 'User\SuperuserController@index');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    
    // Permissions
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

    // new user
    Route::get('/users/create', 'User\SuperuserController@createUser')->name('users.create');
    Route::post('/users', 'User\SuperuserController@storeUser')->name('users.store');
});

Route::get('/users', [
    'middleware' => ['permission:create-users'],
    'uses' => 'User\SuperuserController@index'
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
