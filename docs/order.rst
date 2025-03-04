.. _top:
.. title:: Order

`Back to index <index.rst>`_

=====
Order
=====

.. contents::
    :local:


List orders
```````````

.. code-block:: php
    
    // (optional)
    $orderDateAfter = (new \DateTime())->modify('-2 years')->format(\DateTime::RFC3339);
    
    $result = $client->order->list([
        
        // all parameters are optional
        'orderDateAfter' => $orderDateAfter,
        'orderNumber' => '{order_number}',
        'pageNumber' => 1,
        'pageSize' => 10,
    ]);


List order items
````````````````

.. code-block:: php
    
    // (optional)
    $orderDateAfter = (new \DateTime())->modify('-2 years')->format(\DateTime::RFC3339);
    
    $result = $client->order->items([
        
        // all parameters are optional
        'orderDateAfter' => $orderDateAfter,
        'pageNumber' => 1,
        'pageSize' => 10,
    ]);


Get order by id or reference
````````````````````````````

.. code-block:: php
    
    $id = '42'; // van be the order id or order reference
    $result = $client->order->get($id);


Create order
````````````

.. code-block:: php
    
    $data = [
        'orderType' => 'STANDARD',
        'deliveryAddressId' => 'string',
        'deliveryDetails' => [
            'name' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'street' => 'string',
            'number' => 'string',
            'postalCode' => 'string',
            'city' => 'string',
            'country' => 'string'
        ],
        'pickupDetails' => [
            'pickupDate' => 'string'
        ],
        'remarks' => 'string',
        'reference' => 'string',
        'items' => [[
            'productId' => 'string',
            'unitQuantity' => 0,
            'packageQuantity' => 0
        ]],
        'useSapArticleNumbers' => true
    ];
    
    $result = $client->order->create($data);


`Back to top <#top>`_