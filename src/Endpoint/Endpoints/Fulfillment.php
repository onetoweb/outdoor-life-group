<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;

/**
 * Fulfillment Endpoint.
 */
class Fulfillment extends AbstractEndpoint
{
    /**
     * @param array $data = []
     * 
     * @return array
     */
    public function check(array $data = []): array
    {
        return $this->client->post('/fulfillment/check-availability', $data);
    }
}
