<?php

namespace boxpayment\laravel\Http\Middleware;

use Closure;
use boxpayment\laravel\Exceptions\CallbackFailed;

class VerifySignature
{
  public function handle($request, Closure $next)
  {

    $signature = $request->sign;

    if (!$signature) {
      throw CallbackFailed::missingType($this);
      return ['success' => false];
    }

    if (!$this->isValid($signature, $request->all())) {
      return ['success' => false];
    }

    return $next($request);
  }

  protected function isValid(string $signature, string $payload): bool
  {
    $secret = config('boxpayment.apiKey');
    if (empty($secret)) {
      return false;
    }
  }
}
