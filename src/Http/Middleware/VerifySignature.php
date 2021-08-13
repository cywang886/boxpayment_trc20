<?php

namespace boxpayment\Laravel\Http\Middleware;

use Closure;

class VerifySignature
{
  public function handle($request, Closure $next)
  {

    $signature = $request->sign;

    if (!$signature) {
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
