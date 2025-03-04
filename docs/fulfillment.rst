.. _top:
.. title:: Fulfillment

`Back to index <index.rst>`_

===========
Fulfillment
===========

.. contents::
    :local:


Check
`````

.. code-block:: php
    
    $result = $client->fulfillment->check([
        'postalCode' => '1111AA',
        'country' => 'NL',
        'orderLines' => [[
            'productReference' => '111111',
            'requestedQuantity' => 1,
        ]],
    ]);


`Back to top <#top>`_