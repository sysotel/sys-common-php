<?php

namespace SYSOTEL\APP\Common\Services\IAMConnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IAM
{
    protected array $config;
    protected Client $client;

    protected $routes = [
        'admin-auth' => 'admin-auth'
    ];

    /**
     * @param $config
     */
    public function __construct($config)
    {
        // todo validate config

        $this->config = $config;
        $this->client = new Client($config['baseUrl']);
    }

    /**
     * @return array
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            $this->config['auth']['headerName'] => $this->config['auth.key']
        ];
    }

    /**
     * @param $accessToken
     * @throws GuzzleException
     */
    public function adminAuth($accessToken)
    {
        $path = $this->routes['admin-auth'];

        $this->client->post($path, [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken
            ]
        ]);
    }
}
