<?php

namespace Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;

use Onetoweb\OutdoorLifeGroup\Endpoint\AbstractEndpoint;

/**
 * Invoice Endpoint.
 */
class Invoice extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->get('/invoices/invoices', $query);
    }
    
    /**
     * @param string $invoiceId
     * 
     * @return array|null
     */
    public function download(string $invoiceId): ?array
    {
        // check customer id
        $this->client->checkCustomerId();
        
        return $this->client->get("/invoices/$invoiceId/download");
    }
}
