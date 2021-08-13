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

use RandomPassword\Password;

$password = new Password(10);
echo $password->generate();
```
