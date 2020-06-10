<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use JsonMapper\JsonMapperInterface;
use OptimoApps\RazorPayX\Enum\RazorPayXAPI;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use OptimoApps\RazorPayX\Handler\JsonMapperFactory;
use Psr\Http\Message\StreamInterface;

/**
 * Class Http.
 */
abstract class Http
{
    protected Client $client;

    protected JsonMapperInterface $jsonMapper;

    /**
     * Http constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->jsonMapper = (new JsonMapperFactory())->bestFit();
    }

    /**
     * @throws RazorPayException
     */
    protected function get(string $endPoint, array $queryParams = []): StreamInterface
    {
        try {
            return $this->client->get(RazorPayXAPI::PROD_API.$endPoint, [
                'query' => $queryParams,
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }

    /**
     * @throws RazorPayException
     */
    protected function post(string $endPoint, array $params): StreamInterface
    {
        try {
            return $this->client->post(RazorPayXAPI::PROD_API.$endPoint, [
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
                RequestOptions::JSON => $params,
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }

    /**
     * @throws RazorPayException
     */
    protected function patch(string $endPoint, array $params): StreamInterface
    {
        try {
            return $this->client->patch(RazorPayXAPI::PROD_API.$endPoint, [
                RequestOptions::HEADERS => ['Content-Type' => 'application/json'],
                RequestOptions::AUTH => [config('razorpay-x.key_id'), config('razorpay-x.key_secret')],
                RequestOptions::JSON => $params,
            ])->getBody();
        } catch (ClientException $exception) {
            throw new RazorPayException($exception->getResponse()->getBody()->getContents(), $exception->getResponse()->getStatusCode());
        }
    }
}
