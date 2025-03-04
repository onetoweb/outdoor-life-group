.. _top:
.. title:: Price List

`Back to index <index.rst>`_

==========
Price list
==========

.. contents::
    :local:


List price lists
````````````````

.. code-block:: php
    
    $result = $client->priceList->list([
        'pageNumber' => 1,
        'pageSize' => 30,
    ]);


Get price list
``````````````

.. code-block:: php
    
    $result = $client->priceList->get([
        'id' => 42,
        'reference' => 42,
    ]);


Get price list V2
`````````````````

.. code-block:: php
    
    $result = $client->priceList->getV2([
        'id' => 42,
        'reference' => 42,
    ]);


Download price list
```````````````````

.. code-block:: php
    
    $assetId = 42;
    $result = $client->priceList->download($assetId);
    
    $mimes = new \Mimey\MimeTypes;
    $extension = $mimes->getExtension($result['content-type']);
    
    $filename = "/path/to/file.$extension";
    
    file_put_contents($filename, base64_decode($result['file']));


`Back to top <#top>`_