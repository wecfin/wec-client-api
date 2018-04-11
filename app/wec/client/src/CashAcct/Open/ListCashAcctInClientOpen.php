<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Service\ListCashAcctInClientService;

class ListCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $post = $this->request->request;
        $clientId = $post->get('clientId');

        $cashAccts = (new ListCashAcctInClientService($this->getApp()))
            ->list($clientId);

        return new JsonResponse($cashAccts);
    }
}
