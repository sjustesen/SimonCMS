<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// Api Routing
$router->group([
        'prefix' => 'admin/api',
        'namespace' => '\App\Http\Controllers\Api'
      ], function () use ($router) {

    $router->get('login',  ['uses' => 'AuthController@login']);
    $router->post('login',  ['uses' => 'AuthController@login']);
    $router->get('logout',  ['uses' => 'AuthController@logout']);

    // content api routes
    $router->get('content',  ['uses' => 'ContentApiController@listContent']);
    $router->get('content/{id}', ['uses' => 'ContentApiController@showContent']);
    $router->post('contents', ['uses' => 'ContentApiController@createContent']);
    $router->delete('content/{id}', ['uses' => 'ContentApiController@deleteContent']);
    $router->put('contents/{id}', ['uses' => 'ContentApiController@updateContent']);

    $router->get('media',  ['uses' => 'MediaApiController@listMedia']);
    $router->get('media/{id}', ['uses' => 'MediaApiController@showMedia']);
    $router->post('media', ['uses' => 'MediaApiController@createMedia']);
    $router->delete('media/{id}', ['uses' => 'MediaApiController@deleteMedia']);
    $router->put('media/{id}', ['uses' => 'MediaApiController@updateMedia']);

    $router->get('doctypes',  ['uses' => 'DoctypeApiController@listDoctypes']);
    $router->get('doctype/{id}', ['uses' => 'DoctypeApiController@showDoctype']);
    $router->post('doctype', ['uses' => 'DoctypeApiController@createDoctype']);
    $router->delete('doctype/{id}', ['uses' => 'DoctypeApiController@deleteDoctype']);
    $router->put('doctype/{id}', ['uses' => 'DoctypeApiController@updateDoctype']);

    $router->get('datatypes',  ['uses' => 'ApiController@listDatatypes']);
    $router->get('datatype/{id}', ['uses' => 'ApiController@showDatatype']);
    $router->post('datatype', ['uses' => 'ApiController@createDatatype']);
    $router->delete('datatype/{id}', ['uses' => 'ApiController@deleteDatatype']);
    $router->put('datatype/{id}', ['uses' => 'ApiController@updateDatatype']);

    $router->get('templates',  ['uses' => 'TemplateApiController@listTemplates']);
    $router->get('template/{id}', ['uses' => 'TemplateApiController@showTemplate']);
    $router->post('template', ['uses' => 'TemplateApiController@createTemplate']);
    $router->delete('template/{id}', ['uses' => 'TemplateApiController@deleteTemplate']);
    $router->put('template/{id}', ['uses' => 'TemplateApiController@updateTemplate']);
  });