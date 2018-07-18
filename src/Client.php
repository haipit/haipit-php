<?php

namespace Haipit\Client;

use GuzzleHttp\Client as HttpClient;
use Haipit\Client\Interfaces\ClientInterface;

/**
 * Class Client
 * @package Haipit\Client
 */
class Client implements ClientInterface
{

    /**
     * @var HttpClient
     */
    private $_client;

    /**
     * @var array
     */
    public $url = self::API_URL;

    /**
     * User defined variables
     */
    public $token;

    /**
     * News constructor.
     */
    public function __construct()
    {
        $this->_client = new HttpClient();
    }

    /**
     * Make the request and analyze the result
     *
     * @param   string $type Request method
     * @param   string $endpoint Api request endpoint
     * @param   array $params Parameters
     * @return  array|false Array with data or error, or False when something went fully wrong
     */
    public function doRequest(string $type, string $endpoint, array $params = [])
    {
        // Generate the URL for request
        $url = $this->url . $endpoint;

        // Default headers
        $headers = array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'BEARER ' . $this->token
        );

        // If request is not a GET
        $body = ($type !== 'get') ? json_encode($params[key($params)]) : '';

        // Choose the method
        $result = $this->_client->$type($url, compact('headers', 'body'));

        return [
            'code' => $result->getStatusCode(),
            'message' => json_decode($result->getBody())
        ];
    }

    /**
     * Generate new URL from parameters
     *
     * @param   array $parameters
     * @return  string
     */
    public function compileURL(array $parameters = []): string
    {
        return (null !== $parameters)
            ? '?' . http_build_query($parameters)
            : '';
    }

}
