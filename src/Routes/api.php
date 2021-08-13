<?php

Route::group(['prefix' => 'api',  'middleware' => 'api'], function() {
    Route::post('boxpayment/callback', '\boxpayment\Laravel\Http\Controllers\CallbackController')->name('boxpayment-callback');
});
