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
$router->get('(.*)', function ()  {
    return view('site.index', []);
});

$router->get('/', function () use ($router) {
    return view('site.index');
});

// ADMIN Routes
$router->group(['prefix' => 'admin'], function () use ($router) {
   /* $router->get('/{route:.*}/', function ($path = null)  {
        return view('admin.index');
    }); */

     $router->get('/', function () use ($router) {
        return view('admin.index');
     });

     $router->get('content', function () use ($router) {
        // views are found in /resources/views/
        return view('admin.content.index');
     });

     $router->get('media', function () use ($router) {
        return view('admin.media.index');
     });

     $router->get('settings', function () use ($router) {
        return view('admin.settings.index');
     });

     $router->get('developer', function () use ($router) {
        return view('admin.developer.index');
     });

    $router->get('members', function () use ($router) {
        return view('admin.members.index', []);
    });

    // TODO: Needs to go
    $router->get('settings/templates', function () use ($router) {
        return view('admin.settings.templates.index', []);
    });

    $router->get('settings/doctypes', function () use ($router) {
        return view('admin.settings.doctypes.index', []); 
    });
});



