.. _top:
.. title:: Invoice

`Back to index <index.rst>`_

=======
Invoice
=======

.. contents::
    :local:


List invoices
`````````````

.. code-block:: php
    
    $result = $client->invoice->list([
        'pageNumber' => 1,
        'pageSize' => 10,
    ]);


Donwload invoice
````````````````

.. code-block:: php
    
    $invoiceId = 42;
    $result = $client->invoice->download($invoiceId);
    
    $mimes = new \Mimey\MimeTypes;
    $extension = $mimes->getExtension($result['content-type']);
    
    $filename = "/path/to/file.$extension";
    
    file_put_contents($filename, base64_decode($result['file']));


`Back to top <#top>`_