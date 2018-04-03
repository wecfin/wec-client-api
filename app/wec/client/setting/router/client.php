<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-client',
        'listClient',
        'Wec\Client\Client\Open\ListClientOpen@postOpen'
    );
    
return $collection;
