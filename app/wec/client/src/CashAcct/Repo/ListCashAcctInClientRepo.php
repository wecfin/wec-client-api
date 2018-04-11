<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Gap\Db\MySql\Collection;

class ListCashAcctInClientRepo extends RepoBase
{
    public function list(string $clientId): Collection
    {
        if (!$clientId) {
            throw new \Exception('clientId cannot be null');
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
                ->expect('clientId')->equal()->str($clientId)
            ->end()
            ->descOrderBy('changed')
            ->list(CashAcctDto::class);
    }
}
