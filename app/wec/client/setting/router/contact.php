<?php
$collection = new \Gap\Routing\RouteCollection();
/*
$collection
    ->site('default')
    ->access('public')

    ->get('/get/pattern', 'routeName', 'Wec\Client\Contact\Ui\Entity@show')
    ->post('/post/patter', 'routeName', 'Wec\Client\Contact\Ui\Entity@post')
    ->getRest('/get-rest/patter', 'routeName', 'Wec\Client\Contact\Rest\Entity@getRest')
    ->postRest('/post-rest/patter', 'routeName', 'Wec\Client\Contact\Rest\Entity@postRest')
    ->getOpen('/get-open/patter', 'routeName', 'Wec\Client\Contact\Open\Entity@getOpen')
    ->postOpen('/post-open/patter', 'routeName', 'Wec\Client\Contact\Open\Entity@postOpen');
*/

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/list-contact',
        'listContact',
        'Wec\Client\Contact\Open\ListContactOpen@postOpen'
    );
    
return $collection;
