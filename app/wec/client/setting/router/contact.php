<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-contact-in-client',
        'listContactInClient',
        'Wec\Client\Contact\Open\ListContactInClientOpen@postOpen'
    );

return $collection;
