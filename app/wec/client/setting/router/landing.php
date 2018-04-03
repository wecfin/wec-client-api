<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-client',
        'listClient',
        'Wec\Client\Landing\Open\ListClientOpen@postOpen'
    );
    
return $collection;
