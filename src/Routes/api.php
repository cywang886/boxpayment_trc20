<?php

Route::group(['prefix' => 'api',  'middleware' => 'api'], function() {
    Route::post('boxpayment/callback', 'boxpayment\laravel\Http\Controllers\CallbackController')->name('boxpayment-callback');
});
