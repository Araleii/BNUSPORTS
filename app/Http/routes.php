<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', 'WelcomeController@index');
*/

Route::get('home',['middleware' => 'auth', 'uses' => 'HomeController@index']);

//必须要通过验证才可以访问登录,这样主要也起到保密的作用.
Route::get('/',['middleware' => 'auth', 'uses' => 'HomeController@index']);

//改成BNUSPORTS
Route::post('auth/login', 'Auth\AuthBNUController@postLogin');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function()
{
 	Route::get('/', 'AdminHomeController@index');
	Route::resource('pages', 'PagesController');
	Route::resource('comments', 'CommentsController');
});

Route::get('pages/{id}', 'PagesController@show');
Route::post('comment/store', 'CommentsController@store');


/*
	php artisan make:controller Query/QueryHomeController
*/

//转到查询页面
Route::group(['prefix' => 'query', 'namespace' => 'Query'], function()
{
 	Route::get('badminton/{offset}', 'QueryHomeController@index');//这个默认是羽毛球的,这项业务比较繁忙,offset表示和今天的偏移
	Route::get('pingpang','QueryHomeController@pingpang');//乒乓球的查询页面
	
	Route::get('adminhome/badminton/{offset}', 'GymController@index');// 场馆管理主页,同样默认是羽毛球的管理
	
	Route::resource('gymadmin/badminton', 'BadmintonController');//属于羽毛球的资源路由
});



Route::get('booking/pay/{userid}/{type}/{gymname}/{bookingdate}/{time}', 'BookingHomeController@pay');
Route::get('booking/{type}/{date}/{time}/{name}', 'BookingHomeController@index');//转到预订页面的控制器



//转到活动相关页面
Route::group(['prefix' => 'activity','middleware' => 'auth'], function()
{
 	Route::get('/', 'ActivityController@index');//这个用于普通用户查看
	Route::get('adminhome', 'ActivityController@adminhome');//这个用于返回带有管理功能的管理员页面
	Route::resource('activityadmin', 'ActivityController');
});