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
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware(['auth', 'checkActivatedUser'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    
    // Categories Routes 

        // Create Category
        Route::middleware('permission:create-category')->group(function () {
            Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
            Route::post('/categories', 'CategoryController@store')->name('categories.store');
        });

        // All Category
        Route::middleware('permission:read-category')->group(function () {
            Route::get('/categories', 'CategoryController@index')->name('categories.index');
            Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');
        });        

        // Edit Category
        Route::middleware('permission:edit-category')->group(function () {
            Route::get('/categories/{slug}/edit', 'CategoryController@edit')->name('categories.edit');
            Route::put('/categories/{slug}', 'CategoryController@update')->name('categories.update');
        });

        // Delete Category
        Route::delete('/categories/{name}', 'CategoryController@destroy')->name('categories.destroy')->middleware('permission:delete-category');

    // Stories Routes
    Route::middleware(['role:superuser|council|columnist|coordinator'])->group(function () {
        Route::get('/stories', 'StoryController@index')->name('stories.index');
        Route::get('/stories/create', 'StoryController@create')->name('stories.create');
        Route::post('/stories', 'StoryController@store')->name('stories.store');
        Route::get('/stories/{uuid}', 'StoryController@show')->name('stories.show');
        Route::get('/stories/{uuid}/edit', 'StoryController@edit')->name('stories.edit');
        Route::put('/stories/{uuid}', 'StoryController@update')->name('stories.update');
        Route::delete('/stories/{uuid}', 'StoryController@destroy')->name('stories.destroy');
    });
});
