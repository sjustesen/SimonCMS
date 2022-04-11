<?php
// TODO: this will need to be access protected (later)
$router->group(['prefix' => 'admin/navtree'], function () use ($router) {
    $router->get('content',  ['uses' => 'AdminNavtreeController@content']);
    $router->get('media',  ['uses' => 'AdminNavtreeController@media']);
    $router->get('settings',  ['uses' => 'AdminNavtreeController@settings']);
    $router->get('developer',  ['uses' => 'AdminNavtreeController@developer']);
    $router->get('members',  ['uses' => 'AdminNavtreeController@members']);
});