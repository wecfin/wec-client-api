<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Service\FetchCashAcctInClientService;

class FetchCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $post = $this->request->request;
        $cashAcctId = $post->get('cashAcctId');

        $cashAcct = (new FetchCashAcctInClientService($this->getApp()))
            ->fetch($cashAcctId);

        return new JsonResponse($cashAcct);
    }
}
