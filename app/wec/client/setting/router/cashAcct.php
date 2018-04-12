<?php
$collection = new \Gap\Routing\RouteCollection();

$collection
    ->site('default')
    ->access('public')

    ->postOpen(
        '/create-cash-acct-in-client',
        'createCashAcctInClient',
        'Wec\Client\CashAcct\Open\CreateCashAcctInClientOpen@post'
    )
    ->postOpen(
        '/update-cash-acct-in-client',
        'updateCashAcctInClient',
        'Wec\Client\CashAcct\Open\UpdateCashAcctInClientOpen@post'
    )
    ->postOpen(
        '/fetch-cash-acct-in-client',
        'fetchCashAcctInClient',
        'Wec\Client\CashAcct\Open\FetchCashAcctInClientOpen@post'
    )
    ->postOpen(
        '/list-cash-acct-in-client',
        'listCashAcctInClient',
        'Wec\Client\CashAcct\Open\ListCashAcctInClientOpen@post'
    )
    ->postOpen(
        '/block-cash-acct-in-client',
        'blockCashAcctInClient',
        'Wec\Client\CashAcct\Open\BlockCashAcctInClientOpen@post'
    );

return $collection;
