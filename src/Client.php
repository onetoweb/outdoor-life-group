<?php

namespace Onetoweb\OutdoorLifeGroup;

use Onetoweb\OutdoorLifeGroup\Endpoint\Endpoints;
use Onetoweb\OutdoorLifeGroup\Endpoint\EndpointInterface;
use Onetoweb\Exception\CustomerIdException;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;

/**
 * Outdoor Life Group Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base href
     */
    public const BASE_HREF_TEST = 'https://apim-olg-ipaas-main-acc.azure-api.net';
    public const BASE_HREF_LIVE = 'https://apim-olg-ipaas-main-prd.azure-api.net';
    
    /**
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var bool
     */
    private $testModus;
    
    /**
     * @var string
     */
    private $acceptLanguage = 'nl-NL';
    
    /**
     * @var int|null
     */
    private $customerId;
    
    /**
     * @var string|null
     */
    private $contentType;
    
    /**
     * @var string|null
     */
    private $continuationToken;
    
    /**
     * @param string $apiKey
     * @param bool $testModus = true
     */
    public function __construct(string $apiKey, bool $testModus = true)
    {
        $this->apiKey = $apiKey;
        $this->testModus = $testModus;
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return int $customerId
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }
    
    /**
     * @throws CustomerIdException if no customer id is set
     */
    public function checkCustomerId(): void
    {
        if ($this->customerId == null) {
            throw new CustomerIdException('no customer id is set');
        }
    }
    
    /**
     * @return string $acceptLanguage
     */
    public function setAcceptLanguage(string $acceptLanguage): void
    {
        $this->acceptLanguage = $acceptLanguage;
    }
    
    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    
    /**
     * @return string|null
     */
    public function getContinuationToken(): ?string
    {
        return $this->continuationToken;
    }
    
    /**
     * @return string
     */
    public function getBaseHref(): string
    {
        return $this->testModus ? self::BASE_HREF_TEST : self::BASE_HREF_LIVE;
    }
    
    /**
     * @param string $endpoint
     * 
     * @return string
     */
    public function getUrl(string $endpoint): string
    {
        return $this->getBaseHref() . '/' . ltrim($endpoint, '/');
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array|null
     */
    public function get(string $endpoint, array $query = []): ?array
    {
        return $this->request(self::METHOD_GET, $endpoint, [], $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function post(string $endpoint, array $data = [], array $query = []): ?array
    {
        return $this->request(self::METHOD_POST, $endpoint, $data, $query);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function request(string $method, string $endpoint, array $data = [], array $query = []): ?array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'Cache-Control' => 'no-cache',
                'Accept-Language' => $this->acceptLanguage,
                'Ocp-Apim-Subscription-Key' => $this->apiKey,
                'CustomerId' => $this->customerId,
            ],
            RequestOptions::JSON => $data,
            RequestOptions::QUERY => $query,
        ];
        
        // make request
        $response = (new GuzzleCLient())->request($method, $this->getUrl($endpoint), $options);
        
        // get content type
        $this->contentType = $response->getHeaderLine('content-type');
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        // validate en return json
        if (json_validate($contents)) {
            
            // decode json
            $json = json_decode($contents, true);
            
            if (isset($json['continuationToken'])) {
                $this->continuationToken = $json['continuationToken'];
            }
            
            return $json;
        }
        
        // check for binary data
        if (mb_detect_encoding((string) $contents, null, true) === false) {
            
            return [
                'file' => base64_encode($contents),
                'content-type' => $this->contentType
            ];
        }
        
        // return string as message
        if (is_string($contents) and strlen($contents) > 0) {
            return ['message' => $contents];
        }
        
        return null;
    }
}
