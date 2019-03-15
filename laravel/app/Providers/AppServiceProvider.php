<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('recaptcha', function($attribute, $value, $parameters, $validator) {
            if($_SERVER['HTTP_HOST'] != 'localhost'){
                $client = new Client();
                $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify',[
                    'form_params'=> [
                        'secret' => '6LerH1gUAAAAAJHUNmbyP2UeWw1TPYYlKhkHaF_j',
                        'response' => $value
                    ]
                ]);
                $respuesta=json_decode($response->getBody()->getContents());
                return $respuesta->success;
            } return true;
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if (env('APP_ENV') === 'production') {
            //$this->app['request']->server->set('HTTPS', true);
        }
    }

}
