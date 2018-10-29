<?php

Route::group(['prefix' => '', 'namespace' => 'Backend', 'as' => 'backend.'], function ($routes){

    $routes->get('currencies', 'CurrencyController@index')
        ->name('currencies.index');
//    $routes->resource('currencies', 'CurrencyController');

});

Route::group(['prefix' => '', 'namespace' => 'Frontend', 'as' => 'frontend.'], function ($routes){

    $routes->get('parser/currencies', 'CurrencyController@parse')
        ->name('currencies.parse');

});