<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;

/**
 * Order Endpoint.
 */
class Order extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function list(array $query = []): array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->get('/orders', $query);
    }
    
    /**
     * @param string $reference
     * 
     * @return array
     */
    public function get(string $reference): array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->get("/orders/$reference");
    }
    
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function items(array $query = []): array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->get('/orders/items', $query);
    }
    
    /**
     * @return array
     */
    public function create(array $data): array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->post('/orders/v2', $data);
    }
}
