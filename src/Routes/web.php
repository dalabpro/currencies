<?php

Route::group(['prefix' => 'settings', 'as' => 'backend.'], function ($routes){

    $routes->get('currencies', 'CurrencyController@index')
        ->name('currencies.index');

});