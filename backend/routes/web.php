<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

/*
Endpoint for products
GET
*/
$router->group(['prefix' => 'product'], function () use($router){
    $router->get('/all', 'ProductController@list');
    $router->get('/{id}', 'ProductController@show');
});

/*
Endpoint for recommend
GET / POST / PUT / DELETE
*/
$router->group(['prefix' => 'recommend'], function () use($router){

    /*error*/

    $router->get('/all', 'RecommendController@list');
    $router->get('/{id}', 'RecommendController@show');
    $router->post('/save', 'RecommendController@store')->middleware("cors");
    $router->put('/update/{id}', 'RecommendController@update');
    $router->delete('/delete/{id}', 'RecommendController@destroy');
    $router->get('/byproduct/{id}', 'RecommendController@showByProduct');
});
