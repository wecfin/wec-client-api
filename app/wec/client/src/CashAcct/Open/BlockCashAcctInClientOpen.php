<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Service\BlockCashAcctInClientService;

class BlockCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $cashAcctId = $this->request->request->get('cashAcctId', '');

        (new BlockCashAcctInClientService($this->getApp()))
            ->block($cashAcctId);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
