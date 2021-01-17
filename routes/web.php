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

//User
$router->post('/register', 'UserController@onRegistration'); //insert a user
$router->post('/login', 'LoginController@onLogin'); //login user


//Category Router
$router->post('/add-category', ['middleware' => 'auth', 'uses' => 'CategoryController@store']); //insert a category
$router->get('/categories', 'CategoryController@select'); //get all category
$router->post('/update-category', ['middleware' => 'auth', 'uses' => 'CategoryController@update']); //update a category
$router->post('/delete-category', ['middleware' => 'auth', 'uses' => 'CategoryController@delete']); //delete a category


//Post Router
$router->post('/add-post', ['middleware' => 'auth', 'uses' => 'PostController@store']); //insert a post
$router->get('/posts', 'PostController@select'); //get all post
$router->post('/update-post', ['middleware' => 'auth', 'uses' => 'PostController@update']); //update a category
$router->post('/delete-post', ['middleware' => 'auth', 'uses' => 'PostController@delete']); //delete a category