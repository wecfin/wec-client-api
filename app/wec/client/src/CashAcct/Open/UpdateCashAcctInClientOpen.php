<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Service\UpdateCashAcctInClientService;
use Wec\Client\CashAcct\Service\FetchCashAcctInClientService;

class UpdateCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $post = $this->request->request;

        $cashAcctId = $post->get('cashAcctId');
        $cashAcct = new CashAcctDto([
            'cashAcctId' => $cashAcctId,
            'cashAcctName' => $post->get('cashAcctName'),
            'detail' => $post->get('detail'),
            'type' => $post->get('type')
        ]);

        (new UpdateCashAcctInClientService($this->getApp()))
            ->update($cashAcct);
            
        $cashAcct = (new FetchCashAcctInClientService($this->getApp()))
            ->fetch($cashAcctId);

        return new JsonResponse($cashAcct);
    }
}
