<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;

class FetchCashAcctInClientRepo extends RepoBase
{
    public function fetch(string $cashAcctId): ?CashAcctDto
    {
        if (!$cashAcctId) {
            throw new \Exception('cashAcctId cannot be null');
        }

        return $this->cnn->ssb()
            ->select(
                'cashAcctId',
                'cashAcctName',
                'jsonData',
                'type',
                'created',
                'changed'
            )
            ->from('client_cash_acct')->end()
            ->where()
                ->expect('cashAcctId')->equal()->str($cashAcctId)
            ->end()
            ->fetch(CashAcctDto::class);
    }
}
