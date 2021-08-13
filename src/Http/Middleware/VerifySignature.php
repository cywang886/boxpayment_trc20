<?php

namespace boxpayment\laravel\Http\Middleware;

use Closure;
use boxpayment\laravel\Exceptions\CallbackFailed;

class VerifySignature
{
  public function handle($request, Closure $next)
  {
    return $next($request);

    $signature = $request->sign;

    if (!$signature) {
      throw CallbackFailed::missingSignature($this);
    }

    if (!$this->isValid($signature, $request->getContent())) {
      throw CallbackFailed::invalidRequest();
    }

  }

  protected function isValid(string $signature, string $payload): bool
  {
    $secret = config('boxpayment.api_key');
    if (empty($secret)) {
      throw CallbackFailed::sharedSecretNotSet();
    }
    $iv = config('boxpayment.iv');
    if (empty($iv)) {
         throw CallbackFailed::sharedIVNotSet();
    }
    return true;
  }
}
