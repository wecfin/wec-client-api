<?php
$collection = new \Gap\Routing\RouteCollection();
/*
$collection
    ->site('default')
    ->access('public')

    ->get('/get/pattern', 'routeName', 'Wec\Client\Landing\Ui\Entity@show')
    ->post('/post/patter', 'routeName', 'Wec\Client\Landing\Ui\Entity@post')
    ->getRest('/get-rest/patter', 'routeName', 'Wec\Client\Landing\Rest\Entity@getRest')
    ->postRest('/post-rest/patter', 'routeName', 'Wec\Client\Landing\Rest\Entity@postRest')
    ->getOpen('/get-open/patter', 'routeName', 'Wec\Client\Landing\Open\Entity@getOpen')
    ->postOpen('/post-open/patter', 'routeName', 'Wec\Client\Landing\Open\Entity@postOpen');
*/

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-client-in-company',
        'listClientInCompany',
        'Wec\Client\Landing\Open\ListClientInCompanyOpen@postOpen'
    );
    
return $collection;
