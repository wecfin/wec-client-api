<?php
$collection = new \Gap\Config\ConfigCollection();
$collection
    ->set("app", [
        "Wec\Client" => [
            "dir" => "app/wec/client",
        ],
    ]);
return $collection;
