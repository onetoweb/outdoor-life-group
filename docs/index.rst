.. title:: Index

Index
=====

.. contents::
    :local:

===========
Basic Usage
===========

Setup

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\OutdoorLifeGroup\Client;
    
    // param
    $apiKey = 'api_key';
    $testModus = true;
    
    // setup client
    $client = new Client($apiKey, $testModus);
    
    // (optional) set customer id, required for the orders and invoice api endpoints
    $customerId = 42;
    $client->setCustomerId($customerId);
    
    // (optional) set accept language defaults to: nl-NL
    $acceptLanguage = 'nl-NL';
    $client->setAcceptLanguage($acceptLanguage);


========
Examples
========

* `Customer <customer.rst>`_
* `Fulfillment <fulfillment.rst>`_
* `Invoice <invoice.rst>`_
* `Order <order.rst>`_
* `Price list <price_list.rst>`_
* `Product <product.rst>`_
* `Sync <sync.rst>`_
