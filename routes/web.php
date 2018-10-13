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
Route::group(['prefix' => 'superuser', 'middleware' => ['role:superuser', 'checkActivatedUser']], function() {

    // Dashboard
    Route::get('/', 'User\SuperuserController@index')->name('superuser.dashboard');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    
    // Permissions
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

    // user
        // All Users
        Route::get('/users', 'User\SuperuserController@indexUser')->name('users.index');

        // Create User
        Route::get('/users/create', 'User\SuperuserController@createUser')->name('users.create');
        Route::post('/users', 'User\SuperuserController@storeUser')->name('users.store');

        // Show User
        Route::get('/users/{uuid}', 'User\SuperuserController@showUser')->name('users.show');

        // Change Permissions 
        Route::get('/users/{uuid}/permissions', 'User\SuperuserController@editPermissionUser')->name('users.permission.edit');
        Route::post('/users/{uuid}/permissions', 'User\SuperuserController@updatePermissionUser')->name('users.permission.update');

        // Change Role (sync)
        Route::get('/users/{uuid}/role', 'User\SuperuserController@editRoleUser')->name('users.role.edit');
        Route::post('/users/{uuid}/role', 'User\SuperuserController@updateRoleUser')->name('users.role.update');

        // Delete User
        Route::delete('/users/{uuid}', 'User\SuperuserController@destroyUser')->name('users.destroy');
});

Route::group(['prefix' => 'council', 'middleware' => ['role:council', 'checkActivatedUser']], function() {
    // Dashboard
    Route::get('/', 'User\SuperuserController@index')->name('council.dashboard');
});



Route::get('/users', [
    'middleware' => ['permission:create-users'],
    'uses' => 'User\SuperuserController@index'
]);

Route::middleware('auth')->group(function () {
    Route::get('/me/info', 'User\UserController@info')->name('me.info');
    Route::put('/user/{uuid}', 'User\UserController@update')->name('me.update');
});

Route::middleware(['auth', 'checkActivatedUser'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
