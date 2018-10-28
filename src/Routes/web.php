<?php

Route::group(['prefix' => '', 'namespace' => 'Backend', 'as' => 'backend.'], function ($routes){

    $routes->get('currencies', 'CurrencyController@index')
        ->name('currencies.index');

});