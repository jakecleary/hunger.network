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

// Login routes
$app->get('/', [
    'as'    => 'show-login',
    'uses'  => 'UserController@showLogin'
]);
$app->post('/login', [
    'as'    => 'do-login',
    'uses'  => 'UserController@doLogin'
]);

// Dashboard routes
$app->get('/dashboard', [
    'as'    => 'show-dashboard',
    'uses'  => 'DashboardController@show'
]);
