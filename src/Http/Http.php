<?php

namespace CSWeb\SiTef\Http;

use CSWeb\SiTef\Environment;
use CSWeb\SiTef\Exceptions\SiTefException;
use GuzzleHttp\{
    Client,
    Exception\ClientException,
    Exception\ServerException,
    Psr7\Request};

/**
 * Http
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef\Http
 */
class Http
{
    protected $env;

    public function __construct(Environment $env)
    {
        $this->env = $env;
    }

    public function get($uri)
    {
        return $this->request('GET', $this->buildUrl($uri));
    }

    public function request(string $verb, string $url, array $body = [], array $headers = [])
    {
        $headers = array_merge($this->baseHeaders(), $headers);

        $client  = new Client(['base_url' => null]);
        $request = new Request($verb, $url, $headers, json_encode($body));

        try {
            $response = $client->send($request);
            $content  = $response->getBody()->getContents();

            return json_decode($content, true);
        } catch ( ClientException | ServerException $e ) {
            throw new SiTefException($e->getMessage());
        }
    }

    public function buildUrl(string $uri)
    {
        return sprintf('%s/%s',
            $this->env,
            $uri
        );
    }

    public function post($uri, $data)
    {
        return $this->request('POST', $this->buildUrl($uri), $data);
    }

    public function baseHeaders() : array
    {
        return [
            'merchant_id'  => $this->env->getMerchantId(),
            'merchant_key' => $this->env->getMerchantKey(),
            'Content-Type' => 'application/json'
        ];
    }
}
