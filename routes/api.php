<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return view('home', ['version' => env('VERSION')]);
});

$router->group(['prefix' => 'v1'], function() use ($router)
{
    $router->get('/', function () {
        return "Loading version 1.0";
    });

    $router->group(['prefix' => 'weather'], function() use ($router)
    {
        $router->get('/', 'WeatherController@index');
        $router->get('/first', 'WeatherController@first');
        $router->get('/latest', 'WeatherController@latest');
        $router->get('/sync', 'WeatherController@sync');
        $router->get('/sol/{id}', 'SolController@read');
        $router->get('{id}', 'WeatherController@read');

        $router->put('/', 'WeatherController@create');
    });

    $router->group(['prefix' => 'sols'], function() use ($router)
    {
        $router->get('{id}', 'SolController@read');
    });
});
