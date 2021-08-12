<?php

namespace BoxPayment;
use use Illuminate\Support\Facades\Http;

class CreateAddress
{
    private $api_key;
    private $amount;
    private $token;
    private $callback;

    public function __construct($api_key,$amount,$token,$callback)
    {
        $this->api_key = $length;
    }

    public function generate()
    {
        $array = [
            "amount"=>"10",
            "token"=>"USDT",
            "callback"=>"http://localhost/callback.com",
            "api_key"=>"MlKDEG9HcfNlnMUeTLnmWACbgs9RuAl38pkRSVJckKZrkKYFG8pFrWKJU3OGzuPW"
        ];
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789[{(*%+-$#@!)}]";
        $pass = [];
        $alphaLength = strlen($alphabet) - 1;

        for ($i = 0; $i < $this->length; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}
