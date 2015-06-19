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

// Login/logout routes
$app->get('/', [
    'as'    => 'login',
    'uses'  => 'UserController@login'
]);

$app->get('/logout', [
    'as'    => 'logout',
    'uses'  => 'UserController@logout'
]);

// Dashboard routes
$app->get('/dashboard', [
    'as'    => 'dashboard',
    'uses'  => 'DashboardController@show'
]);
