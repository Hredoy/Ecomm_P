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

Route::get('/','frontController@index')->name('front');

Route::get('/product/{category}/{name}','singleCategory@index');

Route::get('/category/{category}','singleCategory@category');
Route::get('/date/{created_at}','frontController@dates');
Route::get('/admin','HomeController@index')->name('dashboard');
Route::get('/detail/facebook', 'basicsController@facebook')->name('facebook');
/********

*

* Route Youtube

*

*********/

  Route::get('/admin/youtube', 'youtubelinkController@index')->name('youtubes.index');

  Route::post('/admin/youtube', 'youtubelinkController@store')->name('youtubes.store')->middleware('role:superadministrator|administrator');

  Route::DELETE('/admin/youtube/{youtube}', 'youtubelinkController@destroy')->name('youtubes.destroy')->middleware('role:superadministrator|administrator');

  Route::get('/admin/youtube/create', 'youtubelinkController@create');

  Route::get('/admin/youtube/{cat_name}', 'categorysController@show')->name('youtubes.show')->middleware('role:superadministrator|administrator');
  Route::get('/admin/youtube/{youtube}/edit', 'youtubelinkController@edit')->name('youtubes.edit')->middleware('role:superadministrator|administrator');

  Route::PUT('/admin/youtube/{youtube}/', 'youtubelinkController@update')->name('youtubes.update')->middleware('role:superadministrator|administrator');



/********

*

* Route Post

*

*********/

  Route::get('/admin/post', 'postController@index')->name('post.index');

  Route::post('/admin/post', 'postController@store')->name('post.store')->middleware('role:superadministrator|administrator|user');

  Route::DELETE('/admin/post/{post}', 'postController@destroy')->name('post.destroy')->middleware('role:superadministrator|administrator');

  Route::get('/admin/post/create', 'postController@create')->name('post.create');

  Route::get('/admin/post/{post}', 'postController@show')->name('post.show')->middleware('role:superadministrator|administrator');

  Route::get('/admin/post/{post}/edit', 'postController@edit')->name('post.edit')->middleware('role:superadministrator|administrator|user');

  Route::PUT('/admin/post/{post}/', 'postController@update')->name('post.update')->middleware('role:superadministrator|administrator');



  Route::get('/admin/post/update/search','postController@upSearch')->name('post.upSearch')->middleware('role:superadministrator|administrator|user');

  Route::get('/admin/post/search','postController@search')->name('post.search')->middleware('role:superadministrator|administrator|user');



/********

*

* Route Category

*

*********/

  Route::get('/admin/categorys', 'categorysController@index')->name('categorys.index');

  Route::post('/admin/categorys', 'categorysController@store')->name('categorys.store')->middleware('role:superadministrator|administrator');

  Route::DELETE('/admin/categorys/{categorys}', 'categorysController@destroy')->name('categorys.destroy')->middleware('role:superadministrator|administrator');

  Route::get('/admin/categorys/create', 'categorysController@create');

  Route::get('/admin/categorys/{cat_name}', 'categorysController@show')->name('categorys.show')->middleware('role:superadministrator|administrator');

  Route::get('/admin/categorys/{categorys}/edit', 'categorysController@edit')->name('categorys.edit')->middleware('role:superadministrator|administrator');

  Route::PUT('/admin/categorys/{categorys}/', 'categorysController@update')->name('categorys.update')->middleware('role:superadministrator|administrator');



  Route::get('/admin/category/search', 'categorysController@search')->name('categorys.search')->middleware('role:superadministrator|administrator');

/********

*

* Route User

*

*********/

  Route::get('/admin/user', 'userController@index')->name('user.index');

  Route::post('/admin/user', 'userController@store')->name('user.store')->middleware('role:superadministrator|administrator');

  Route::DELETE('/admin/user/{user}', 'userController@destroy')->name('user.destroy')->middleware('role:superadministrator|administrator');

  Route::get('/admin/user/create', 'userController@create')->name('user.create');

  Route::get('/admin/user/{user}', 'userController@show')->name('user.show')->middleware('role:superadministrator|administrator');

  Route::get('/admin/user/{categorys}/edit', 'userController@edit')->name('user.edit')->middleware('role:superadministrator|administrator');

  Route::PUT('/admin/user/{user}/', 'userController@update')->name('user.update')->middleware('role:superadministrator|administrator');



  Route::get('/admin/user/search', 'userController@upSearch')->name('user.upSearch')->middleware('role:superadministrator|administrator');

   Route::get('/Register','Auth\LoginController@showLoginForm');

  Auth::routes();

  Route::group(['middleware' => 'auth'], function () {

    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');

    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');

    // list all lfm routes here...

});

   /********

*

* Route ads

*

*********/

  Route::get('admin/index_ads', 'adsController@single_ads')->name('single_ads.index')->middleware('role:superadministrator|administrator');

  Route::get('admin/single_ads', 'adsController@index_ads')->name('index_ads.index')->middleware('role:superadministrator|administrator');

  Route::get('admin/header_ads', 'adsController@header_ads')->name('header.index')->middleware('role:superadministrator|administrator');



  Route::get('/settings','BasiController@index')->name('settings.index')->middleware('role:superadministrator');

  Route::get('/settings/logo/{id}/', 'BasiController@manager');

  Route::PUT('/settings/logo/{id}/', 'BasiController@updates_manager')->name('settings.update');

  Route::PUT('/settings/update/{id}/', 'BasiController@update')->name('settings.updates');




Route::get('events', 'EventController@index')->name('events.index');
Route::post('events', 'EventController@addEvent')->name('events.add');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/ads_manager/{id}/', 'adsController@manager');

    Route::PUT('/admin/ads_manager/{id}/', 'adsController@updates_manager')->name('ads_update.update');

    // list all lfm routes here...

});

/********

*

* Route address

*

*********/

  Route::get('/admin/address', 'addressController@index')->name('address.index');

  Route::post('/admin/address', 'addressController@store')->name('address.store')->middleware('role:superadministrator|administrator');

  Route::DELETE('/admin/address/{address}', 'addressController@destroy')->name('address.destroy')->middleware('role:superadministrator|administrator');

  Route::get('/admin/address/create', 'addressController@create')->name('address.create');

  Route::get('/admin/address/{address}', 'addressController@show')->name('address.show')->middleware('role:superadministrator|administrator');

  Route::get('/admin/address/{categorys}/edit', 'addressController@edit')->name('address.edit')->middleware('role:superadministrator|administrator');

  Route::PUT('/admin/address/{address}/', 'addressController@update')->name('address.update')->middleware('role:superadministrator|administrator');