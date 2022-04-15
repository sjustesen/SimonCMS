<?php
// TODO: this will need to be access protected (later)
$router->group(['prefix' => 'admin/navtree'], function () use ($router) {
    $router->get('content',  ['uses' => 'BackendNavtreeController@content']);
    $router->get('media',  ['uses' => 'BackendNavtreeController@media']);
    $router->get('settings',  ['uses' => 'BackendNavtreeController@settings']);
    $router->get('developer',  ['uses' => 'BackendNavtreeController@developer']);
    $router->get('members',  ['uses' => 'BackendNavtreeController@members']);
});