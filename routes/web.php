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
// SITE ROUTES 

$router->get('/', function () use ($router) {
    return view('site.index');
});

// ADMIN Routes
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return view('admin.index');
    });

    $router->get('users', function () use ($router) {
        return view('admin.users.index', ['name' => 'Simon']);
    });

    $router->get('templates', function () use ($router) {
        return view('admin.templates.index', []);
    });

    $router->get('doctypes', function () use ($router) {
        return view('admin.doctypes.index', []);
    });
});