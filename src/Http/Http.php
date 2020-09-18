<?php

namespace CSWeb\SiTef\Http;

use CSWeb\SiTef\Environment;
use CSWeb\SiTef\Exceptions\SiTefException;
use GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\ServerException,
    Psr7\Request
};

/**
 * Http
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef\Http
 */
class Http
{
    protected $config;

    public function __construct(Environment $config)
    {
        $this->config = $config;
    }

    public function request(string $verb, string $url, array $body, array $headers = [])
    {
        $client  = new Client(['base_url' => null]);
        $request = new Request($verb, $url, $headers, $body);

        try {
            $response = $client->send($request);
            $content  = $response->getBody()->getContents();

            return json_decode($content, true);
        } catch ( ClientException | ServerException $e ) {
            throw new SiTefException($e->getMessage());
        }
    }
}
