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

$router->post('/add-category', 'CategoryController@store'); //insert a category
$router->get('/categories', 'CategoryController@select'); //get all category
$router->post('/update-category', 'CategoryController@update'); //update a category
$router->post('/delete-category', 'CategoryController@delete'); //delete a category
