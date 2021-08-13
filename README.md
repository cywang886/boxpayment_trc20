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
