# Laravel wrapper for the BoxPayment API
Gateway ERC20 USDT for laravel

## Installation
You can install the package via composer:
```bash
composer require boxpayment/laravel
```
The service provider will automatically register itself.

You must publish the config file with:
```bash
php artisan vendor:publish --provider="boxpayment\laravel\BoxPaymentServiceProvider" --tag="config"
```
This is the contents of the config file that will be published at `config/boxpayment.php`:
```php
return [
    'base_url' => env('BOX_PAYMENT_BASE_URL'),
    'callback_uri' => env('BOX_PAYMENT_CALLBACK_URI'),
    'api_key' => env('BOX_PAYMENT_API_KEY'),
    'iv' => env('BOX-PAYMENT_IV'),
];

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
