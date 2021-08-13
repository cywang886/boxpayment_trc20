<?php

namespace Boxpayment\Laravel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
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
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private static $iv;

    /**
     * @var string
     */
    private $auth = null;

    public function __construct()
    {
        $this->baseurl = config('boxpayment.base_url');
        $this->apiKey = config('boxpayment.api_key');
        self::$iv = config('coinbase.iv');
        $this->client = new Client([
            'base_uri' => $this->baseurl,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * pre request get a token.
     *
     * @return object
     */
    public function preRequest()
    {
        try {
            $response = $this->client->request("POST", "api/v2/auth/getToken", ['json' => ["token" => $this->apiKey]]);
            $result = json_decode($response->getBody()->getContents());
            $this->auth = $result->data->prefix . ' ' . $result->data->token;
            return $result;
        } catch (ClientException $e) {
            Log::error($e->getResponse()->getBody(true));
            return json_decode((string)$e->getResponse()->getBody(true));
        }
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
    public function makeRequest(string $method, string $uri, array $params = [])
    {
        try {
            $pre = $this->preRequest();
            if (!$pre->success) {
            }
            $signatureParam = $this->sign($params);
            $response = $this->client->request($method, $uri, ['headers' => ['Authorization' => $this->auth], 'json' => $signatureParam]);
            return json_decode($response->getBody()->getContents());
        } catch (ClientException $e) {
            Log::error($e->getResponse()->getBody(true));
            return json_decode((string)$e->getResponse()->getBody(true));
        }
    }

    /**
     * create a request.
     *
     * @param null|array $params
     * @return array
     */
    public function createRequest(array $params = [])
    {
        return $this->makeRequest('post', 'api/v2/request/create', $params);
    }

    /**
     * create an address.
     *
     * @return object
     */
    public function createAddress(array $params = [])
    {
        return $this->makeRequest('get', 'api/v1/wallet/address/generate');
    }

    /**
     * active an address.
     *
     * @return object
     */
    public function activeAddress(array $params = [])
    {
        return $this->makeRequest('post', 'api/v1/wallet/address/activate',$params);
    }

    /**
     * active address after create.
     *
     * @return object
     */
    public function generateActiveAddress()
    {
        $wallet = $this->createAddress();
        return $this->makeRequest('post', 'api/v1/wallet/address/activate',['address' => $wallet->data->Wallet]);
    }

    /**
     * signature a request.
     *
     * @param string $apiKey
     * @param null|array $params
     * @return array
     */
    private function sign(array $params = [])
    {
        try {

            $params['api_key'] = $this->apiKey;
            $sign = md5(json_encode($params));
            unset($params['api_key']);
            $params['sign'] = $sign;
            return $params;
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
