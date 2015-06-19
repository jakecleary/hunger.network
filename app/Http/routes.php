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

/*
 * Maps
 */
$app->get('/maps/create', [
    'as'    => 'maps.create',
    'uses'  => 'MapController@create'
]);
$app->post('/maps', [
    'as'   => 'maps.store',
    'uses' => 'MapController@store'
]);
$app->get('/maps/{id}', [
    'as'    => 'maps.show',
    'uses'  => 'MapController@show'
]);
