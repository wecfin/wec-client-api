<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-client-in-company',
        'listClientInCompany',
        'Wec\Client\Client\Open\ListClientInCompanyOpen@postOpen'
    )
    ->postOpen(
        '/list-client-by-employee',
        'listClientByEmployee',
        'Wec\Client\Client\Open\ListClientByEmployeeOpen@postOpen'
    )
    ->postOpen(
        '/list-client-by-group',
        'listClientByGroup',
        'Wec\Client\Client\Open\ListClientByGroupOpen@postOpen'
    )
    ->postOpen(
        '/create-client',
        'createClient',
        'Wec\Client\Client\Open\CreateClientOpen@postOpen'
    )
    ->postOpen(
        '/fetch-client',
        'fetchClient',
        'Wec\Client\Client\Open\FetchClientOpen@postOpen'
    );
    
return $collection;
