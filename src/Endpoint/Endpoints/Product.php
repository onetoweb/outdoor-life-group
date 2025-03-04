<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;
use Generator;

/**
 * Product Endpoint.
 */
class Product extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array
     */
    public function category(array $query = []): array
    {
        return $this->client->get('/products/categories', $query);
    }
    
    /**
     * @param string $id
     * @param array $query = []
     * 
     * @return array
     */
    public function get(string $id, array $query = []): array
    {
        return $this->client->get("/products/$id", $query);
    }
    
    /**
     * @param string $id
     * @param array $query = []
     * 
     * @return array
     */
    public function getV2(string $id, array $query = []): array
    {
        return $this->client->get("/products/v2/$id", $query);
    }
    
    /**
     * @param string $imagePath
     * @param array $query = []
     *
     * @return array|null
     */
    public function getImage(string $imagePath, array $query = []): ?array
    {
        return $this->client->get('/public/products/image/'.str_replace('/public/products/image/', '', $imagePath), $query);
    }
    
    /**
     * @param array $ids
     * 
     * @return array|null
     */
    public function listById(array $ids): ?array
    {
        $productIds = [];
        
        foreach ($ids as $id) {
            
            $productIds[] = [
                'productId' => (string) $id
            ];
        }
        
        return $this->client->post('/products/products', [
            'products' => $productIds
        ]);
    }
    
    /**
     * @param array $ids
     * 
     * @return array|null
     */
    public function listByIdV2(array $ids): ?array
    {
        $productIds = [];
        
        foreach ($ids as $id) {
            
            $productIds[] = [
                'productId' => (string) $id
            ];
        }
        
        return $this->client->post('/products/v2/products', [
            'products' => $productIds
        ]);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function autocomplete(array $query = []): ?array
    {
        return $this->client->get('/products/autocomplete', $query);
    }
    
    /**
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function search(array $data = [], array $query = []): ?array
    {
        return $this->client->post('/products/products', $data, $query);
    }
    
    /**
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function searchV2(array $data = [], array $query = []): ?array
    {
        return $this->client->post('/products/products', $data, $query);
    }
}
