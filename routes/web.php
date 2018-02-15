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

Route::get('/logout', function () {
	Auth::logout();

	return redirect('/');
});

Route::model('coupons', 'Coupon');

Route::model('members', 'Member');

Route::model('projects', 'Project');

Route::model('merchants', 'Merchant');

Route::resource('coupons', 'CouponsController');

Route::resource('members', 'MembersController');

Route::resource('merchants', 'MerchantsController');

Route::resource('projects', 'ProjectsController');

Route::resource('recipients', 'RecipientsController');

Auth::routes();

// Add Post method to save the data
//Route::post('/home', 'HomeController@index');

// Call Members data to the welcome page
Route::get('/', 'ProjectsController@home');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/merchants/{merchant}', 'MerchantsController@show');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('home', array(
        'as' => 'home',
        'uses' => 'HomeController@index'
    ));

Route::post('coupons/{id}', [
        'as' => 'home',
        'uses' => 'CouponsController@update'
]);

Route::post('projects/follow/', [
        'as' => 'follow',
        'uses' => 'MemberFollowProjectsController@follow'
]);

Route::post('projects/unfollow/', [
        'as' => 'unfollow',
        'uses' => 'MemberFollowProjectsController@unfollow'
]);







