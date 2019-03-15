<?php

use Illuminate\Http\Request;

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



Route::get('/', 'HomeController@index')->name('home');

Route::get('localization/{lang}', 'LanguageLocalizationController@index')->name('localization');



// Public routes. Landing Page.

Route::get('soluciones-insignias-digitales','HomeController@soluciones')->name('soluciones');

Route::get('aprende','BlogController@index')->name('blog');

Route::get('aprende/category/{slug}','BlogController@index')->name('blog_cat');

Route::get('aprende/preguntas-frecuentes','BlogController@faq')->name('faq');

Route::get('aprende/{slug}','BlogController@show')->name('post');

Route::get('nosotros','HomeController@nosotros')->name('nosotros');

Route::get('demo','HomeController@demo')->name('demo');

Route::get('gracias','HomeController@gracias')->name('gracias');

Route::get('sendemail', function(){

    $data = array(
        'name' => "cursito de laravel",
    );

    

    Mail::send('emails.welcome',$data,function($message){
        $message -> from ('ggalindo@acreditta.com');
        $message -> to('gabrielgalindorodriguez@gmail.com') -> subject('test email de laravel');
    });
    
   
    return 'tu email fue enviados ssss wasnd4r  haha';
});


Route::post('sendemai', function(Request $request){

    $data=$request->toArray();

    

    Mail::send('emails.welcome',$data,function($message){
        $message -> from ('ggalindo@acreditta.com');
        $message -> to('ggalindo@acreditta.com') -> subject('Solicitud de contacto');
    });
    
   
    return redirect()->route('gracias');
});



Route::get('enviarcorreo', function(Request $request){

  
    

    Mail::send('emails.welcome',function($message){
        $message -> from ('ggalindo@acreditta.com');
        $message -> to('gabrielgalindorodriguez@gmail.com') -> subject('test email de laravel');
    })->name('contacto_frm');
    
   
    return 'tu email fue enviados ssss wasnd4r  haha';
});


Route::post('contacto_frm','HomeController@contacto_frm')->name('contacto_frm');

Route::post('gracias','HomeController@enviar_demo')->name('enviar_demo');

Route::post('solicitar-demo','HomeController@solicitarDemo')->name('solicitar-demo');



Auth::routes();









Route::group(['middleware' => 'auth'], function () {

    Route::get('administracion','administracion\HomeController@index')->name('administracion_home');



//usuarios

    Route::get('administracion/usuarios_eliminar/{id}', 'administracion\UserController@destroy')->name('usuarios_eliminar');

    Route::get('administracion/edit_password/{id}', 'administracion\UserController@edit_password')->name('edit_password');

    Route::put('administracion/update_password/{id}', 'administracion\UserController@update_password')->name('update_password');

    Route::resource('administracion/usuarios', 'administracion\UserController');





    //Páginas

    Route::resource('administracion/pagina', 'administracion\PaginaController',['as' => 'admin']);

    //Campos

    Route::get('administracion/campos_eliminar/{id}', 'administracion\CampoController@destroy')->name('campos_eliminar');

    Route::resource('administracion/campos', 'administracion\CampoController',['as' => 'admin']);



    //categorías

    Route::get('administracion/categorias_eliminar/{id}', 'administracion\CategoriaController@destroy')->name('categorias_eliminar');

    Route::resource('administracion/categorias', 'administracion\CategoriaController',['as' => 'admin']);



    //blog

    Route::get('administracion/blog_eliminar/{id}', 'administracion\BlogController@destroy')->name('blog_eliminar');

    Route::resource('administracion/blog', 'administracion\BlogController',['as' => 'admin']);



	//faq

    Route::get('administracion/faq_eliminar/{id}', 'administracion\BlogController@destroy')->name('faq_eliminar');

    Route::resource('administracion/faq', 'administracion\FaqController',['as' => 'admin']);



    //galeria

    Route::get('administracion/cargafotos','administracion\HomeController@cargafotos')->name('cargafotos');

    Route::post('administracion/cargafotos','administracion\HomeController@cargafotos_nueva')->name('cargafotos_nueva');



    //fechas demos

    Route::get('administracion/fechas_eliminar/{id}', 'administracion\FechaController@destroy')->name('fechas_eliminar');

    Route::resource('administracion/fechas', 'administracion\FechaController',['as' => 'admin']);

});



Route::get('prueba', 'HomeController@prueba');



Route::get('clear-cache', function() {

    $exitCode = Artisan::call('cache:clear');

    $exitCode = Artisan::call('optimize');

    return '<h1>Cache facade value cleared</h1>';

});

