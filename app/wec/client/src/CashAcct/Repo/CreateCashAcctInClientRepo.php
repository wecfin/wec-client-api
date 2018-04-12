<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Gap\Dto\DateTime;

class CreateCashAcctInClientRepo extends CashAcctRepoBase
{
    public function create(CashAcctDto $cashAcct, string $clientId = ''): CashAcctDto
    {
        if (!$clientId) {
            throw new \Exception('clientId cannot be null');
        }

        $this->validateCashAcct($cashAcct);
        $cashAcct->cashAcctId = $this->cnn->zid();

        $now = new DateTime();
        $cashAcct->created = $now;
        $cashAcct->changed = $now;

        $this->cnn->isb()
            ->insert('client_cash_acct')
            ->field(
                'clientId',
                'cashAcctId',
                'cashAcctName',
                'detail',
                'type',
                'isActive',
                'created',
                'changed'
            )
            ->value()
                ->addStr($clientId)
                ->addStr($cashAcct->cashAcctId)
                ->addStr(trim($cashAcct->cashAcctName))
                ->addStr($cashAcct->detail)
                ->addStr($cashAcct->type)
                ->addInt(1)
                ->addDateTime($cashAcct->created)
                ->addDateTime($cashAcct->changed)
            ->end()
            ->execute();

        return $cashAcct;
    }
}
