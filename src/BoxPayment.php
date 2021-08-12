<?php

namespace BoxPayment\Laravel_Boxpayment;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class BoxPayment
{

    /**
     * @var string
     */
    private $baseurl;

    /**
     * @var Client
     */
    private $callback;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $iv;
    
    /**
     * @var string
     */
    private $auth = null;

    public function __construct()
    {
        $this->baseurl = config('boxpayment.base_url');
        $this->apiKey = config('boxpayment.api_key');
        $this->iv = config('coinbase.iv');

        $this->client = new Client([
            'base_uri' => $this->baseurl,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->auth,
            ],
        ]);
    }

    /**
     * Make request.
     *
     * @param string $method
     * @param string $uri
     * @param null|array $query
     * @param null|array $params
     * @return array
     */
    public function makeRequest(string $method, string $uri, array $query = [], array $params = [])
    {
        try {
            $signatureParam = $this->sign($params);
            $response = $this->client->request($method, $uri, ['query' => $query, 'body' => json_encode($signatureParam)]);

            return json_decode((string) $response->getBody(), true);
        } catch(GuzzleException $e) {
            Log::error($e->getMessage());
        }
    }

    public function createRequest(array $params = [])
    {
        return $this->makeRequest('post', 'api/v2/request/create', $params);
    }
    
    public function sign(array $params = [])
    {
  
        $params['api_key'] = $this->apiKey;
        $sign = md5(json_encode($params));
        unset($params['api_key']);
        $params['sign'] = $sign;
        return $params;
    }
}
