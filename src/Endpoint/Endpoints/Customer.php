<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;

/**
 * Customer Endpoint.
 */
class Customer extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function list(array $query = []): array
    {
        return $this->client->get('/customers/customers', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function listV2(array $query = []): array
    {
        return $this->client->get('/customers/v2/customers', $query);
    }
    
    /**
     * @param string $postalCode
     * 
     * @return array
     */
    public function termsOfDelivery(string $postalCode): array
    {
        return $this->client->get("/customers/termsofdelivery/dropshipment/$postalCode");
    }
}
