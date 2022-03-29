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

// Api Routing

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('login',  ['uses' => 'LoginController@login']);
    $router->post('login',  ['uses' => 'LoginController@login']);
    $router->get('logout',  ['uses' => 'LoginController@logout']);
    
    // content api routes
    $router->get('content',  ['uses' => 'ApiController@showAllContent']);
    $router->get('content/{id}', ['uses' => 'ApiController@showContent']);
    $router->post('contents', ['uses' => 'ApiController@createContent']);
    $router->delete('content/{id}', ['uses' => 'ApiController@deleteContent']);
    $router->put('contents/{id}', ['uses' => 'ApiController@updateContent']);

    $router->get('media',  ['uses' => 'ApiController@showAllMedia']);
    $router->get('media/{id}', ['uses' => 'ApiController@showMedia']);
    $router->post('media', ['uses' => 'ApiController@createMedia']);
    $router->delete('media/{id}', ['uses' => 'ApiController@deleteMedia']);
    $router->put('media/{id}', ['uses' => 'ApiController@updateMedia']);

    $router->get('doctype',  ['uses' => 'ApiController@showAllDoctypes']);
    $router->get('doctype/{id}', ['uses' => 'ApiController@showDoctype']);
    $router->post('doctype', ['uses' => 'ApiController@createDoctype']);
    $router->delete('doctype/{id}', ['uses' => 'ApiController@deleteDoctype']);
    $router->put('doctype/{id}', ['uses' => 'ApiController@updateDoctype']);

    $router->get('datatype',  ['uses' => 'ApiController@showAllDatatypes']);
    $router->get('datatype/{id}', ['uses' => 'ApiController@showDatatype']);
    $router->post('datatype', ['uses' => 'ApiController@createDatatype']);
    $router->delete('datatype/{id}', ['uses' => 'ApiController@deleteDatatype']);
    $router->put('datatype/{id}', ['uses' => 'ApiController@updateDatatype']);

    $router->get('template',  ['uses' => 'ApiController@showAllTemplates']);
    $router->get('template/{id}', ['uses' => 'ApiController@showTemplate']);
    $router->post('template', ['uses' => 'ApiController@createTemplate']);
    $router->delete('template/{id}', ['uses' => 'ApiController@deleteTemplate']);
    $router->put('template/{id}', ['uses' => 'ApiController@updateTemplate']);
  });