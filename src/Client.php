<?php namespace HaipIT;

use GuzzleHttp\Client as HttpClient;

class Client
{
    /**
     * Initial state of some variables
     */
    public $_client;
    public $_config;

    /**
     * Default server parameters
     */
    public $host = 'api.haipit.news';
    public $port = '443';
    public $path = '/api/v1';
    public $useSSL = true;

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
    public function doRequest($type, $endpoint, $params = array())
    {
        // Create the base URL
        $base = ($this->useSSL) ? "https" : "http";

        // Generate the URL for request
        $url = $base . "://" . $this->host . ":" . $this->port . $this->path . $endpoint;

        // Default headers
        $headers = array(
            'Accept' => 'application/json',
            'Authorization' => 'BEARER ' . $this->token
        );

        // If request is not a GET
        if ($type != 'get') {
            $key = key($params);
            $body = json_encode($params[$key]);
        }

        switch ($type) {
            case 'get':
                $result = $this->_client->get($url, compact('headers'));
                break;
            case 'post':
                $headers += ['Content-Type' => 'application/json'];
                $result = $this->_client->post($url, compact('headers', 'body'));
                break;
            case 'delete':
                $headers += ['Content-Type' => 'application/json'];
                $result = $this->_client->delete($url, compact('headers', 'body'));
                break;
            case 'put':
                $headers += ['Content-Type' => 'application/json'];
                $result = $this->_client->put($url, compact('headers', 'body'));
                break;
            default:
                $result = null;
        }

        if ($result->getStatusCode() == 200 || $result->getStatusCode() == 201) {
            return array('status' => true, 'message' => json_decode($result->getBody()));
        }
        return array('status' => false, 'message' => json_decode($result->getBody()));

    }

    /**
     * Generate new URL from parameters
     *
     * @param $parameters
     * @return string
     */
    public function compileURL($parameters)
    {
        // Init chart for endpoint
        $endpoint = '?query=json';
        // Then parse the array and create the url
        foreach ($parameters as $key => $value) {
            $endpoint .= '&' . $key . '=' . $value;
        }

        return $endpoint;
    }
}
