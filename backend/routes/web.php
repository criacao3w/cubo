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
    $router->get('/all', 'ProductController@getProductAll');
    $router->get('/{id}', 'ProductController@getProduct');
});

/*
Endpoint for recommend
GET / POST / PUT / DELETE
*/
$router->group(['prefix' => 'recommend'], function () use($router){
    $router->get('/all', 'RecommendController@getRecommendAll');
    $router->get('/{id}', 'RecommendController@getRecommend');
    $router->post('/save', 'RecommendController@saveRecommend');
    $router->put('/update/{id}', 'RecommendController@updateRecommend');
    $router->delete('/delete/{id}', 'RecommendController@destroyRecommend');
    $router->get('/byproduct/{id}', 'RecommendController@getRecommendByProduct');
});
