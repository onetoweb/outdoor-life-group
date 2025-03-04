.. _top:
.. title:: Sync

`Back to index <index.rst>`_

====
Sync
====

.. contents::
    :local:


Sync products
`````````````

Yields products using the Generator syntax.

.. code-block:: php
    
    $generator = $client->sync->products();
    foreach ($generator as $product) {
        
    }


Sync stock
``````````

Yields stock data using the Generator syntax.

.. code-block:: php
    
    $generator = $client->sync->stock();
    foreach ($generator as $product) {
        
    }


`Back to top <#top>`_