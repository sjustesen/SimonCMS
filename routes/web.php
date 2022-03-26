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


// ADMIN Routes
$router->get('/admin', function () use ($router) {
    return view('admin.index', ['name' => 'Simon']);
});

$router->get('/admin/users', function () use ($router) {
    return view('admin.users.index', ['name' => 'Simon']);
});

$router->get('/admin/users', function () use ($router) {
    return view('admin.templates.index', []);
});

$router->get('/admin/doctypes', function () use ($router) {
    return view('admin.doctypes.index', []);
});
