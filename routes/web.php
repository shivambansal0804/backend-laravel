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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/team', 'PageController@team')->name('team');
Route::get('/test', 'PageController@test');

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

// Blog routes
Route::group(['prefix' => 'blog'], function() {
    // Index page of blog
    Route::get('/', 'BlogController@index')->name('blog.index');

    // Blog Category Routes
    Route::group(['prefix' => 'categories'], function () {
        // Index of Categories
        Route::get('/', 'BlogController@indexCategory')->name('blog.categories.index');
        Route::get('/{slug}', 'BlogController@showCategory')->name('blog.categories.show');
    });
    
    // Single Story Route
    Route::get('/{slug}', 'BlogController@show')->name('blog.show');
    
    
});

// Gallery routes
// read

// First Time Login Routes
Route::middleware('auth')->group(function () {
    Route::get('/me/info', 'User\UserController@info')->name('me.info');
    Route::put('/user/{uuid}', 'User\UserController@update')->name('me.update');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware(['auth', 'checkActivatedUser'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/me', 'User\UserController@show')->name('me.show');
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
        
    Route::middleware('role:superuser|council')->group(function () {
        Route::get('/stories/pending', 'User\CouncilController@index')->name('council.stories.index');
        Route::get('/stories/pending/{uuid}', 'User\CouncilController@show' )->name('council.stories.show');
        Route::put('/stories/pending/{uuid}/draft', 'User\CouncilController@draft')->name('council.draft');
        Route::get('stories/pending/{uuid}/edit', 'User\CouncilController@edit')->name('council.edit');

        // update
        Route::put('stories/pending/{uuid}', 'User\CouncilController@update')->name('council.update');
        // publish 
        Route::get('stories/pending/{uuid}/publish', 'User\CouncilController@publish')->name('council.publish');
    });

    // Stories Routes
    Route::group(['prefix' => 'stories', 'middleware' => ['role:superuser|council|columnist|coordinator']], function() {
        Route::get('/', 'StoryController@index')->name('stories.index');
        Route::get('/create', 'StoryController@create')->name('stories.create');
        Route::post('/', 'StoryController@store')->name('stories.store');
        Route::get('/{uuid}', 'StoryController@show')->name('stories.show');
        Route::get('/{uuid}/edit', 'StoryController@edit')->name('stories.edit');
        Route::get('/{uuid}/submit', 'StoryController@submit')->name('stories.submit');
        Route::put('/{uuid}', 'StoryController@update')->name('stories.update');
        Route::put('/{uuid}/autosave', 'StoryController@autoSave')->name('stories.autosave');
        Route::delete('/{uuid}', 'StoryController@destroy')->name('stories.destroy');

    });

    // Album Routes
    Route::group(['prefix' => 'albums', 'middleware' => ['role:superuser|council|photographer|coordinator']], function() {
        Route::get('/', 'AlbumController@index')->name('albums.index');
        Route::get('/create', 'AlbumController@create')->name('albums.create');
        Route::post('/', 'AlbumController@store')->name('albums.store');
        Route::get('/{uuid}', 'AlbumController@show')->name('albums.show');
        Route::group(['prefix' => '{uuid}/images', 'middleware' => 'CheckAlbum'], function() {
            Route::get('/', 'ImageController@index')->name('images.index');
            Route::get('/create', 'ImageController@create')->name('images.create');
            Route::post('/', 'ImageController@store')->name('images.store');
            Route::get('/{image}', 'ImageController@show')->name('images.show');
            // image 
            // del 
            // remove
            // biliner 
            // editing also for council  
            // publishing 
            // submitting 
            // save back to draft
        });
        // Route::get('/{uuid}/edit', 'AlbumController@edit')->name('albums.edit');
        // Route::get('/{uuid}/submit', 'AlbumController@submit')->name('albums.submit');
        // Route::put('/{uuid}', 'AlbumController@update')->name('albums.update');
        // Route::delete('/{uuid}', 'AlbumController@destroy')->name('albums.destroy');
        // submit
        // publish
        // save back to draft

    });




});
