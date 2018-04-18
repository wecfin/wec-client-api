<?php
namespace Wec\Client\CashAcct\Open;

use Gap\Http\JsonResponse;
use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Service\CreateCashAcctInClientService;

class CreateCashAcctInClientOpen extends OpenBase
{
    public function post(): JsonResponse
    {
        $post = $this->request->request;
        $clientId = $post->get('clientId', '');

        $cashAcct = new CashAcctDto([
            'cashAcctName' => $post->get('cashAcctName', ''),
            'detail' => $post->get('detail', ''),
            'type' => $post->get('type', ''),
        ]);

        (new CreateCashAcctInClientService($this->getApp()))
            ->create($clientId, $cashAcct);

        return new JsonResponse($cashAcct);
    }
}
