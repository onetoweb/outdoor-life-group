.. _top:
.. title:: Product

`Back to index <index.rst>`_

=======
Product
=======

.. contents::
    :local:


List product categories
```````````````````````

.. code-block:: php
    
    $result = $client->product->category();


Get product by id
`````````````````

.. code-block:: php
    
    $id = '42';
    $result = $client->product->get($id);


Get product by id V2
````````````````````

.. code-block:: php
    
    $id = '42';
    $result = $client->product->getV2($id);


Get product image
``````````````````

.. code-block:: php
    
    $imagePath = '{imagePath}';
    $result = $client->product->getImage($imagePath, [
        'width' => 150,
        'height' => 150,
        'format' => 'jpg', // allowed values: jpg/png defaults to: jpg
    ]);
    
    $mimes = new \Mimey\MimeTypes;
    $extension = $mimes->getExtension($result['content-type']);
    
    $filename = "/path/to/file.$extension";
    
    file_put_contents($filename, base64_decode($result['file']));


List multiple products by id
````````````````````````````

.. code-block:: php
    
    $productIds = ['41', '42', '43'];
    $result = $client->product->listById($id);


List multiple products by id V2
```````````````````````````````

.. code-block:: php
    
    $productIds = ['41', '42', '43'];
    $result = $client->product->listByIdV2($id);


Autocomplete
````````````

.. code-block:: php
    
    $result = $client->product->autocomplete([
        'searchText' => 'hout',
    ]);


Search products
```````````````

.. code-block:: php
    
    $result = $client->product->search([
        'searchText' => 'string',
        'searchFields' => [
            [
                'field' => 'string'
            ]
        ],
        'facets' => [
            [
                'id' => 'string',
                'values' => [
                    [
                        'value' => 'string'
                    ]
                ],
                'valueType' => 'STRING'
            ]
        ],
        'orderBy' => [
            'type' => 'NEW',
            'sort' => 'ASCENDING'
        ]
    ], [
        'pageNumber' => 1,
        'pageSize' => 20,
    ]);


Search products V2
``````````````````

.. code-block:: php
    
    $result = $client->product->searchV2([
        'searchText' => 'string',
        'searchFields' => [
            [
                'field' => 'string'
            ]
        ],
        'facets' => [
            [
                'id' => 'string',
                'values' => [
                    [
                        'value' => 'string'
                    ]
                ],
                'valueType' => 'STRING'
            ]
        ],
        'orderBy' => [
            'type' => 'NEW',
            'sort' => 'ASCENDING'
        ]
    ], [
        'pageNumber' => 1,
        'pageSize' => 20,
    ]);


`Back to top <#top>`_