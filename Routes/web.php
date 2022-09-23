<?php

use App\Core\Routing\Route;

Route::get('/', 'HomeController@index');
Route::get('/todos/list', 'TaskController@index', [BlockFireFox::class]);
Route::get('/405', function () {
    return 'Method not supported !';
});
Route::get('/404', function () {
    return 'Not found';
});