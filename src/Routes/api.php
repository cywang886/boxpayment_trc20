<?php

Route::group(['prefix' => 'api',  'middleware' => 'api'], function() {
    Route::post(config('boxpayment.callback'), '\boxpayment\laravel\Http\Controllers\CallbackController')->name('boxpayment-callback');
});
