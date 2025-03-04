<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint;

use Onetoweb\OutdoorLifeGroup\Client;

/**
 * Abstract Endpoint.
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
