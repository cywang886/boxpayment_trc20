<?php

namespace BoxPayment;
use use Illuminate\Support\Facades\Http;

class CreateAddress
{
    private $api_key;
    private $amount;
    private $token;
    private $callback;

    public function __construct($amount,$token,$callback)
    {
        $this->api_key = env('BOX_PAYMENT-API_KEY', null);
        $this->amount = $amount;
        $this->token = $token;
        $this->callback = $callback;
    }

    public function generate()
    {
        $array = [
            "amount"=>$this->amount,
            "token"=>$this->token,
            "callback"=>$this->callback,
            "api_key"=>$this->api_key
        ];
        
        $sign = md5(json_encode($array));
        unset($array['api_key']);
        $array['sign'] = $sign;
        
        Http::withHeader()
    }
}
