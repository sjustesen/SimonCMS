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
    $router->get('/{route:.*}/', function ($path = null)  {
        return view('admin.index');
    });

     $router->get('/', function () use ($router) {
        return view('admin.index');
     });

    /* $router->get('users', function () use ($router) {
        return view('admin.users.index', ['name' => 'Simon']);
    });

    $router->get('templates', function () use ($router) {
        return view('admin.templates.index', []);
    });

    $router->get('doctypes', function () use ($router) {
        return view('admin.doctypes.index', []); 
    });*/
});

// Api Routing

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('login',  ['uses' => 'AuthController@login']);
    $router->post('login',  ['uses' => 'AuthController@login']);
    $router->get('logout',  ['uses' => 'AuthController@logout']);
    
    // content api routes
    $router->get('content',  ['uses' => 'Api\ContentApiController@listContent']);
    $router->get('content/{id}', ['uses' => 'Api\ContentApiController@showContent']);
    $router->post('contents', ['uses' => 'Api\ContentApiController@createContent']);
    $router->delete('content/{id}', ['uses' => 'Api\ContentApiController@deleteContent']);
    $router->put('contents/{id}', ['uses' => 'Api\ContentApiController@updateContent']);

    $router->get('media',  ['uses' => 'Api\MediaApiController@listMedia']);
    $router->get('media/{id}', ['uses' => 'Api\MediaApiController@showMedia']);
    $router->post('media', ['uses' => 'Api\MediaApiController@createMedia']);
    $router->delete('media/{id}', ['uses' => 'Api\MediaApiController@deleteMedia']);
    $router->put('media/{id}', ['uses' => 'Api\MediaApiController@updateMedia']);

    $router->get('doctype',  ['uses' => 'Api\DoctypeApiController@listDoctypes']);
    $router->get('doctype/{id}', ['uses' => 'Api\DoctypeApiController@showDoctype']);
    $router->post('doctype', ['uses' => 'Api\octypeApiController@createDoctype']);
    $router->delete('doctype/{id}', ['uses' => 'Api\DoctypeApiController@deleteDoctype']);
    $router->put('doctype/{id}', ['uses' => 'Api\DoctypeApiController@updateDoctype']);

    $router->get('datatype',  ['uses' => 'Api\ApiController@listDatatypes']);
    $router->get('datatype/{id}', ['uses' => 'Api\ApiController@showDatatype']);
    $router->post('datatype', ['uses' => 'Api\ApiController@createDatatype']);
    $router->delete('datatype/{id}', ['uses' => 'Api\ApiController@deleteDatatype']);
    $router->put('datatype/{id}', ['uses' => 'Api\ApiController@updateDatatype']);

    $router->get('template',  ['uses' => 'Api\ApiController@listTemplates']);
    $router->get('template/{id}', ['uses' => 'Api\ApiController@showTemplate']);
    $router->post('template', ['uses' => 'Api\ApiController@createTemplate']);
    $router->delete('template/{id}', ['uses' => 'Api\ApiController@deleteTemplate']);
    $router->put('template/{id}', ['uses' => 'Api\ApiController@updateTemplate']);
  });