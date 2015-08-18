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


//Route::controllers([
//    'auth' => '\App\Http\Controllers\Auth\AuthController',
//    'password' => '\App\Http\Controllers\Auth\PasswordController',
//]);

Route::get('/', 'PostController@index');

Route::get('/auth', function(){

    if( Auth::attempt(['email'=>'luizgadao@gmail.com', 'password'=>123456]) ){
        return 'logado';
    }else{
        return 'usuário e senha inválido.';
    }

    /*
    $user = \App\User::find(1);
    Auth::login($user);
    if(Auth::check($user)){
        return 'logado';
    }
    */
});

Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

    Route::group(['prefix'=>'posts'], function(){

        Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
        Route::get('/create', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
        Route::post('/store', ['as' => 'admin.posts.store', 'uses' => 'PostsAdminController@store']);
        Route::get('/edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsAdminController@edit'])->where('id', '[0-9]+');
        Route::put('/update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostsAdminController@update'])->where('id', '[0-9]+');
        Route::get('/destroy/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'PostsAdminController@destroy'])->where('id', '[0-9]+');

    });

});
