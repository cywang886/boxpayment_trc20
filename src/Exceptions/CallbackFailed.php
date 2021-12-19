<?php

namespace boxpayment\laravel\Exceptions;

use Exception;
use Illuminate\Http\Request;

class CallbackFailed extends Exception
{
    /**
     * missingSignature
     *
     * @return void
     */
    public static function missingSignature()
    {
        return new static('The request did not contain a `sign` argumant.');
    }

    /**
     * invalidRequest
     *
     * @return void
     */
    public static function invalidRequest()
    {
        return new static("The Request not valid.");
    }

    /**
     * sharedSecretNotSet
     *
     * @return void
     */
    public static function sharedSecretNotSet()
    {
        return new static('The Boxpayment callback shared secret is not set. Make sure that the `boxpayment.apiKey` config key is set to the value you found on the BoxPayment Admin dashboard.');
    }

    /**
     * sharedIVNotSet
     *
     * @return void
     */
    public static function sharedIVNotSet()
    {
        return new static('The Boxpayment callback IV is not set. Make sure that the `boxpayment.iv` config key is set to the value you found on the BoxPayment Admin dashboard.');
    }
}
