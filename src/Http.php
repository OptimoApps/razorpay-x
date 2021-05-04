<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\RazorPayX;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JsonMapper\LaravelPackage\JsonMapperInterface;
use OptimoApps\RazorPayX\Enum\RazorPayXAPI;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use Psr\Http\Message\StreamInterface;

/**
 * Class Http.
 */
abstract class Http
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var JsonMapperInterface
     */
    protected JsonMapperInterface $jsonMapper;

    /**
     * Http constructor.
     * @param Client $client
     * @param JsonMapperInterface $jsonMapper
     */
    public function __construct(Client $client, JsonMapperInterface $jsonMapper)
    {
        $this->client = $client;
        $this->jsonMapper = $jsonMapper;
    }

    /**
     * @param string $endPoint
     * @param array $queryParams
     * @return StreamInterface
     * @throws RazorPayException|GuzzleException
     */
    protected function get(string $endPoint, array $queryParams = []): StreamInterface
    {
        try {
            return $this->client->get(RazorPayXAPI::PROD_API . $endPoint, [
                'query' => $queryParams,
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }

    /**
     * @param string $endPoint
     * @param array $params
     * @return StreamInterface
     * @throws RazorPayException|GuzzleException
     */
    protected function post(string $endPoint, array $params): StreamInterface
    {
        try {
            return $this->client->post(RazorPayXAPI::PROD_API . $endPoint, [
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
                RequestOptions::JSON => $params,
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }

    /**
     * @param string $endPoint
     * @param array $params
     * @return StreamInterface
     * @throws RazorPayException|GuzzleException
     */
    protected function patch(string $endPoint, array $params): StreamInterface
    {
        try {
            return $this->client->patch(RazorPayXAPI::PROD_API . $endPoint, [
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
                RequestOptions::JSON => $params,
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }
}
