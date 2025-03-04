<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;
use Generator;

/**
 * Sync Endpoint.
 */
class Sync extends AbstractEndpoint
{
    /**
     * @return Generator
     */
    public function products(): Generator
    {
        do {
            
            $query = [];
            
            if ($this->client->getContinuationToken() !== null) {
                $query = ['continuationToken' => $this->client->getContinuationToken()];
            }
            
            $response = $this->client->get('/sync/products', $query);
            
            foreach ($response['results'] as $product) {
                yield $product;
            }
            
        } while (
            isset($response['results'])
            and is_array($response['results'])
            and count($response['results']) > 0
        );
    }
    
    /**
     * @return Generator
     */
    public function stock(): Generator
    {
        do {
            
            $query = [];
            
            if ($this->client->getContinuationToken() !== null) {
                $query = ['continuationToken' => $this->client->getContinuationToken()];
            }
            
            $response = $this->client->get('/sync/products', $query);
            
            foreach ($response['results'] as $product) {
                yield $product;
            }
            
        } while (
            isset($response['results'])
            and is_array($response['results'])
            and count($response['results']) > 0
        );
    }
}
