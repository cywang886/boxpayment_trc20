# Boxpayment
Gateway ERC20 USDT for laravel

## Installation
This project using composer.
```
$ composer require boxpayment/laravel
```
## Usage

### createAddress()
create Tron address.
```php
<?php

use boxpayment\laravel\Facades\BoxPayment;


BoxPayment::createAddress();
```
### activateAddress()
Active a address created with createAddress() method.
```php
<?php

use boxpayment\laravel\Facades\BoxPayment;

$param = [ 'address' => "you wallet address created with createAddress()"];
BoxPayment::activeAddress($param);
```
### easyAddress()
Create and active a address
```php
<?php

use boxpayment\laravel\Facades\BoxPayment;

BoxPayment::easyAddress();
```
### callbackEX()
Get callback of transaction 
```php
<?php

use Illuminate\Http\Request;
use boxpayment\laravel\Facades\BoxPayment;

BoxPayment::callbackEX(json_decode($request->getContent()));
```
