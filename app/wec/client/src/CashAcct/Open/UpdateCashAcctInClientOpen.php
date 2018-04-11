<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Service\UpdateCashAcctInClientService;

class UpdateCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $post = $this->request->request;

        $cashAcct = new CashAcctDto([
            'cashAcctId' =>  $post->get('cashAcctId'),
            'cashAcctName' => $post->get('cashAcctName'),
            'jsonData' => $post->get('jsonData'),
            'type' => $post->get('type')
        ]);

        (new UpdateCashAcctInClientService($this->getApp()))
            ->update($cashAcct);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
