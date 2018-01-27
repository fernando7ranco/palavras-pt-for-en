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


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/palavra/{id}', 'HomeController@palavra');

Route::post('/palavra/marcacao', 'HomeController@palavraMarcacao');

Route::post('/postbuscarpalavras', 'HomeController@bucarPalavra');

Auth::routes();


Route::group(['prefix' => 'authsocial'],function(){
	
	Route::get('redirectforfacebook', 'Auth\SocialAuthController@redirectFacebook');
	Route::get('callbackoffacebook', 'Auth\SocialAuthController@callbackFacebook');

	Route::get('redirectforgoogle', 'Auth\SocialAuthController@redirectGoogle');
	Route::get('callbackofgoogle', 'Auth\SocialAuthController@callbackGoogle');

	Route::get('erro/{email}', 'Auth\SocialAuthController@error');
});

Route::group(['prefix' => 'admin'],function(){
	
	
	Route::group(['prefix' => 'palavras'],function(){
		
		Route::get('adicionar', 'Admin\AdminController@formAdicionarPalavra');
		
		Route::post('inserir', 'Admin\AdminController@adicionarPalavra');
		
		Route::get('editar/{id}', 'Admin\AdminController@formEditarPalavra');
		
		Route::post('editar', 'Admin\AdminController@editarPalavra');
		
		Route::get('deletar/{id}', 'Admin\AdminController@deletarPalavra');
		
	});	
	
	Route::group(['prefix' => 'sugestoes'],function(){
		
		Route::get('', 'Admin\AdminController@sugestoesPalavras');
		
		Route::get('sugestao/{id}', 'Admin\AdminController@sugestaoPalavra');
		
		Route::get('recusar/{id}', 'Admin\AdminController@recusarSugestaoPalavra');
		
		Route::get('deletar/{id}', 'Admin\AdminController@deletarSugestaoPalavra');
		
	});
	
	Route::get('usuarios', 'Admin\AdminController@listaUsuarios');
	
	Route::get('usuario/deletar/{id}', 'Admin\AdminController@deletarUsuario');
});

Route::group(['prefix' => 'usuario'],function(){
	
	
	Route::group(['prefix' => 'sugestao'],function(){
		
		Route::get('', 'Usuario\UsuarioController@minhasSugestoes');
		
		Route::get('palavra/{id}', 'Usuario\UsuarioController@minhasSugestao');
		
		Route::get('deletar/{id}', 'Usuario\UsuarioController@deletarSugestaoPalavra');
		
		Route::get('adicionar', 'Usuario\UsuarioController@formAdicionarSugestaoPalavra');
		
		Route::post('inserir', 'Usuario\UsuarioController@adicionarSugestaoPalavra');
		
		Route::get('editar/{id}', 'Usuario\UsuarioController@formEditarSugestaoPalavra');
		
		Route::post('editar/', 'Usuario\UsuarioController@editarSugestaoPalavra');
		
		
	});
	
	Route::get('marcacoes', 'Usuario\UsuarioController@minhasMarcacoes');

});
