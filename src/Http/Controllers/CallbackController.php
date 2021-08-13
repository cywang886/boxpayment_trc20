<?php

namespace boxpayment\laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CallbackController extends Controller
{
  public function __invoke(Request $request): array
  {
    $payload = json_decode($request->getContent());  
    $secret = config('boxpayment.api_key');
    $iv = '1234567891011121';
    $ciphering = "AES-128-CTR";
    $options = 0;
    $decryption = openssl_decrypt(
      $payload->param,
      $ciphering,
      $secret,
      $options,
      $iv
    );
    return json_decode($decryption); // you can store this data
   
  }
}
