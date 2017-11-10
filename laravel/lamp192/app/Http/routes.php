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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/404', function(){
	return abort(404);
});

Route::get('/config', function(){

	echo Config::get('app.timezone');

	echo Config::get('app.locale');

	return env('DB_HOST');
});

Route::get('/one', function(){

	echo '333333333333';
});

Route::get('/form', function(){

	return view('/form/form');
});

Route::post('/doform', function(){

	echo '111111111111';
});

Route::get('/name/{id}', function($id){

	echo $id;
})->where('id','\d+');

//带多个参数, 带限制
Route::get('two/{name}/{id}', function($name, $id){

	echo $name,$id;

})->where('name', '[a-z]+')->where('id', '\d+');

//路由组设置
/*Route::group(['middleware'=>'login'], function(){

	Route::get('/admin', function(){

		echo '这是后台主页';
	});

	Route::get('/insert', function(){

		return view('insert');
	});

});*/

Route::group([], function(){

	Route::get('/home', function(){

		echo '这是前台主页';
	});
});

//ajax
Route::get('/ajax', function(){

	return view('ajax');
});

Route::post('/ajax-post', function(){

	echo '111111';
});

Route::get('/login', function(){

	echo '这是后台登录页';
});

Route::get('/session', function(){

	session(['id'=>100]);
});


// Route::post('/insert', function(){

// 	return var_dump($_POST);
// });
//控制器
Route::get('/admin/user', 'UserController@insert')->middleware('login');

Route::post('/admin/user', 'UserController@add');

Route::get('/admin/user/edit/{id}', 'UserController@edit');

Route::post('/admin/user/update', 'UserController@update');

// Route::get('/admin/user/show', 'UserController@show');

Route::get('/admin/user/show', 
	[
		'uses'=>'UserController@show',
		'as'=>'shows'
	]
);

Route::get('/admin/user/delete/{id}', 'UserController@delete');

//
Route::group(['middleware'=>'login'], function(){


	Route::get('/test/insert', 'TestController@insert');

	

	Route::get('/test/db', 'TestController@db');

	Route::resource('admin/stu', 'StuController');

	Route::get('/test/admin', 'TestController@admin');

	Route::get('/test/add', 'TestController@add');

	Route::post('/test/insert', 'TestController@insert');

	Route::get('/test/show', 'TestController@show');

	Route::get('/test/edit/{id}', 'TestController@edit');

	Route::post('/test/update/{id}', 'TestController@update');

	Route::post('/test/delete/{id}', 'TestController@delete');

	Route::get('/admin/picedit/{id}', 'LoginController@picedit');

	Route::post('/admin/picupdate/{id}', 'LoginController@picupdate');

	Route::get('/admin/passedit/{id}', 'LoginController@passedit');

	Route::post('/admin/passupdate/{id}', 'LoginController@passupdate');

	Route::get('/admin/quit', 'LoginController@quit');

});

Route::get('/admin/login', 'LoginController@index');

Route::post('/admin/dologin', 'LoginController@login');

Route::get('/admin/code', 'LoginController@code');