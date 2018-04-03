<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-contact-in-client',
        'listContactInClient',
        'Wec\Client\Contact\Open\ListContactInClientOpen@postOpen'
    )
    ->postOpen(
        '/create-contact-in-client',
        'createContactInClient',
        'Wec\Client\Contact\Open\CreateContactInClientOpen@postOpen'
    );

return $collection;
