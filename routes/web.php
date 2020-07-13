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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('test', 'frontend.chat');

# Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:super|admin', 'preventBackHistory']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    # Role route
    Route::resource('roles', 'RoleController');
    # End Role route

    # Permission Route
    Route::resource('permissions', 'PermissionController');
    Route::delete('permission/delete-permission-from-user/{user}/{permission}', 'PermissionController@removeUser')->name('permission.remove.user');
    Route::delete('permission/delete-permission-from-role/{role}/{permission}', 'PermissionController@removeRole')->name('permission.remove.role');
    # End Permission Route

    # Category Route
    Route::resource('categories', 'CategoryController');
    Route::put('category/{id}/pending', 'CategoryController@pending')->name('category.pending');
    Route::put('category/{id}/approved', 'CategoryController@approved')->name('category.approved');
    Route::get('category/pending', 'CategoryController@pendingPage')->name('category.pending.page');
    Route::get('category/active', 'CategoryController@activePage')->name('category.active.page');
    Route::put('category/{id}/active', 'CategoryController@active')->name('category.active');
    Route::put('category/{id}/deactivate', 'CategoryController@deactive')->name('category.deactive');
    # End Category Route

    # Tag Route
    Route::resource('tags', 'TagController');
    # End Tag Route

    # User route
    Route::resource('user', 'UserController');
    Route::get('user/admin/all', 'UserController@adminUser')->name('user.admin.index');
    # End user route

    # User trash route
    Route::get('user-trash', 'TrashUserController@index')->name('user-trash.index');
    Route::delete('user-trash/{user}/destroy', 'TrashUserController@destroy')->name('user-trash.destroy');
    Route::put('user-trash/{user}/restore', 'TrashUserController@restore')->name('user-trash.restore');
    # End user trash route

    # Profile route
    Route::get('profile', 'ProfileController@index')->name("profile.index");
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
    Route::put('profile-image-update', 'ProfileController@updateProfileImage')->name('profile.image.update');
    Route::put('password-update', 'ProfileController@updatePassword')->name('password.update');
    # End profile route

    # Give User Role Route
    Route::get('role/all-user-role', 'RolePermissionController@allUserRole')->name('role.all.user-role');
    Route::get('role/give-user-role', 'RolePermissionController@giveUserRolePage')->name('role.give.user-role');
    Route::post('role/give-user-role', 'RolePermissionController@giveUserRoleStore')->name('role.store.give.user-role');
    Route::get('role/edit-user-role/{user}', 'RolePermissionController@editUserRolePage')->name('role.edit.user-role');
    Route::put('role/update-user-role/{user}', 'RolePermissionController@updateUserRole')->name('role.update.user-role');
    Route::delete('role/delete-user-role/{user}', 'RolePermissionController@removeUserRole')->name('role.delete.user-role');
    # End give user role route

    # Give role permission route
    Route::get('permission/all-role-permission', 'RolePermissionController@allRolePermission')->name('permission.all.role-permission');
    Route::get('permission/give-role-permission', 'RolePermissionController@giveRolePermissionPage')->name('permission.give.role-permision');
    Route::post('permission/give-role-permission', 'RolePermissionController@giveRolePermissionStore')->name('permission.store.give.role-permission');
    Route::get('permission/edit-role-permission/{role}', 'RolePermissionController@editRolePermissionPage')->name('permission.edit.role-permission');
    Route::get('permission/show-role-permission/{role}', 'RolePermissionController@showRolePermissionPage')->name('permission.show.role-permission');
    Route::put('permission/update-role-permission/{role}', 'RolePermissionController@updateRolePermission')->name('permission.update.role-permission');
    Route::delete('permission/delete-role-permission/{role}', 'RolePermissionController@removeRolePermission')->name('permission.delete.role-permission');
    Route::delete('permission/delete-role-permission-from-show-page/{role}/{permission}', 'RolePermissionController@removeRolePermissionFromShowPage')->name('permission.delete.role-permission.from.show-page');
    #End give role permission route

    # Give user permission route
    Route::get('permission/all-user-permission', 'RolePermissionController@allUserPermission')->name('permission.all.user-permission');
    Route::get('permission/give-user-permission', 'RolePermissionController@giveUserPermissionPage')->name('permission.give.user-permision');
    Route::post('permission/give-user-permission', 'RolePermissionController@giveUserPermissionStore')->name('permission.store.give.user-permission');
    Route::get('permission/edit-user-permission/{user}', 'RolePermissionController@editUserPermissionPage')->name('permission.edit.user-permission');
    Route::get('permission/show-user-permission/{user}', 'RolePermissionController@showUserPermissionPage')->name('permission.show.user-permission');
    Route::put('permission/update-user-permission/{user}', 'RolePermissionController@updateUserPermission')->name('permission.update.user-permission');
    Route::delete('permission/delete-user-permission/{user}', 'RolePermissionController@removeUserPermission')->name('permission.delete.user-permission');
    Route::delete('permission/delete-user-permission-from-show-page/{user}/{permission}', 'RolePermissionController@removeUserPermissionFromShowPage')->name('permission.delete.user-permission.from.show-page');
    #End give user permission route

    # Post Route
    Route::resource("post", "PostController");
    Route::get('post/pending/all', 'PostController@pendingPage')->name('post.pending.page');
    Route::put('post/{id}/approved', 'PostController@approved')->name('post.approved');
    Route::put('post/{id}/pending', 'PostController@pending')->name('post.pending');
    # End Post Route
});
# End Admin Routes

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'role:user']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    # Category Route
    Route::resource('categories', 'CategoryController');
    # End category route

    Route::get('user', 'UserController@index')->name('user.index');

    # Post Route
    Route::resource("post", "PostController");
    # End Post Route

    # Tag Route
    Route::resource('tags', 'TagController');
    # End Tag Route

    # Profile route
    Route::get('profile', 'ProfileController@index')->name("profile.index");
    Route::put('profile-update', 'ProfileController@updateProfile')->name('profile.update');
    Route::put('profile-image-update', 'ProfileController@updateProfileImage')->name('profile.image.update');
    Route::put('password-update', 'ProfileController@updatePassword')->name('password.update');
    # End profile route

});

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('post/{slug}', 'PostController@details')->name('post.details');
    Route::get('/category/{slug}', 'PostController@postByCategory')->name('category.posts');
    Route::get('/tag/{slug}', 'PostController@postByTag')->name('tag.posts');
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/search', 'SearchController@search')->name('search');

});

