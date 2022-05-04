<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// Api Routing -- parent is \App\Http\Controllers
$router->group([
        'prefix' => 'admin/api',
        'namespace' => '\App\Http\Controllers\Api'
      ], function () use ($router) {

    $router->get('login',  ['uses' => 'AuthController@login']);
    $router->post('login',  ['uses' => 'AuthController@login']);
    $router->get('logout',  ['uses' => 'AuthController@logout']);

    // content api routes
    $router->get('contents/list',  ['uses' => 'ContentApiController@listContent']);
    $router->get('content/show/{id}', ['uses' => 'ContentApiController@showContent']);
    $router->post('content/create', ['uses' => 'ContentApiController@createContent']);
    $router->delete('content/{id}', ['uses' => 'ContentApiController@deleteContent']);
    $router->put('content/update/{id}', ['uses' => 'ContentApiController@updateContent']);

    $router->get('media/list',  ['uses' => 'MediaApiController@listMedia']);
    $router->get('media/show/{id}', ['uses' => 'MediaApiController@showMedia']);
    $router->post('media/create', ['uses' => 'MediaApiController@createMedia']);
    $router->delete('media/delete/{id}', ['uses' => 'MediaApiController@deleteMedia']);
    $router->put('media/update/{id}', ['uses' => 'MediaApiController@updateMedia']);

    $router->get('doctypes/list',  ['uses' => 'DoctypeApiController@listDoctypes']);
    $router->get('doctype/show/{id}', ['uses' => 'DoctypeApiController@showDoctype']);
    $router->post('doctype/create', ['uses' => 'DoctypeApiController@createDoctype']);
    $router->delete('doctype/delete/{id}', ['uses' => 'DoctypeApiController@deleteDoctype']);
    $router->put('doctype/update/{id}', ['uses' => 'DoctypeApiController@updateDoctype']);

    $router->get('packages/list',  ['uses' => 'PackageApiController@listDatatypes']);
    $router->get('package/show/{id}', ['uses' => 'PackageApiController@showDatatype']);
    $router->post('package/create', ['uses' => 'PackageApiController@createDatatype']);
    $router->delete('package/delete/{id}', ['uses' => 'PackageApiController@deleteDatatype']);
    $router->put('package/update/{id}', ['uses' => 'PackageApiController@updateDatatype']);

    $router->get('templates/list',  ['uses' => 'TemplateApiController@listTemplates']);
    $router->get('template/show/{id}', ['uses' => 'TemplateApiController@showTemplate']);
    $router->post('template/read', ['uses' => 'TemplateApiController@readTemplate']);
    $router->post('template/create', ['uses' => 'TemplateApiController@createTemplate']);
    $router->delete('template/delete/{id}', ['uses' => 'TemplateApiController@deleteTemplate']);
    $router->put('template/update/{id}', ['uses' => 'TemplateApiController@updateTemplate']);
  });