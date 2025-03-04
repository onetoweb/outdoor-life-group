<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;

/**
 * Price List Endpoint.
 */
class PriceList extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/price-lists/groups', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function get(array $query = []): ?array
    {
        return $this->client->get('/price-lists/group', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function getV2(array $query = []): ?array
    {
        return $this->client->get('/price-lists/v2/group', $query);
    }
    
    /**
     * @param string $assetId
     * 
     * @return array|null
     */
    public function download(string $assetId): ?array
    {
        return $this->client->get("/price-lists/{$assetId}/download");
    }
}
