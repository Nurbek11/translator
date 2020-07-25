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
    return view('view');
});

$router->post('/translate', [
    'as' => 'translate', 'uses' => 'ExampleController@translate'
]);

$router->get('/parse', [
    'as' => 'parse', 'uses' => 'ExampleController@parse'
]);

$router->get('/getTranslates', [
    'as' => 'getTranslates', 'uses' => 'ExampleController@getTranslates'
]);


