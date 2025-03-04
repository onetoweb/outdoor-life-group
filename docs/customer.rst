.. _top:
.. title:: Customer

`Back to index <index.rst>`_

========
Customer
========

.. contents::
    :local:


List Customers
``````````````

.. code-block:: php
    
    $result = $client->customer->list();


List Customers V2
`````````````````

.. code-block:: php
    
    $result = $client->customer->listV2();


Get terms of delivery
`````````````````````

.. code-block:: php
    
    $postalCode = '1111AA';
    $result = $client->customer->termsOfDelivery($postalCode);



`Back to top <#top>`_