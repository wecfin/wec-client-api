<?php
$collection = new \Gap\Config\ConfigCollection();

$collection
    ->set('site', [
        'default' => [
            'host' => 'client-api.%baseHost%',
        ],
        'static' => [
            'host' => 'static.%baseHost%',
            'dir' => '%baseDir%/site/static',
        ],
    ]);

return $collection;
