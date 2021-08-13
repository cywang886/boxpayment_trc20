# Boxpayment
Gateway ERC20 USDT for laravel

## Installation
This project using composer.
```
$ composer require boxpayment/laravel
```
## Usage
We have two method for payment

### Method one
each client have a wallet address
```php
<?php

use BoxPayment;

$params = [
        'amount' => "10",  
        'token' => "USDT",  
        'callback' => 'http://domain.com/callback'  
    ];
$gateway = BoxPayment::createRequest($params);
```
sample response 
```json
{"success":true,"data":{"orderid":"ce13b4ab04626061495aaea222a7ab9b231cd2cc7a470ffeb2dd6de7d6853935","amount":"10","token":"USDT","address":"THhcDvefs2GZ9PZSHoseCT9y5XfbRgJNcB","timeout":28800,"qr_url":{"address":"http:\/\/radana.xyz\/api\/v2\/payment\/qr\/address\/THhcDvefs2GZ9PZSHoseCT9y5XfbRgJNcB","gateway":"http:\/\/radana.xyz\/api\/v2\/payment\/qr\/gateway\/ce13b4ab04626061495aaea222a7ab9b231cd2cc7a470ffeb2dd6de7d6853935"},"cashier_url":"http:\/\/localhost:3000\/payment\/gateway\/ce13b4ab04626061495aaea222a7ab9b231cd2cc7a470ffeb2dd6de7d6853935","sign":"e63e5114bda19cabc33ca1dea74de676"}}
```
