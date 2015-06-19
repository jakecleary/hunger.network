<?php

// Login/logout routes
$app->get('/', [
    'as'    => 'login',
    'uses'  => 'UserController@login'
]);
$app->get('/auth-callback', [
    'as'    => 'auth',
    'uses'  => 'UserController@auth'
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
