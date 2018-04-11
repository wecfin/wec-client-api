<?php
namespace Wec\Client\CashAcct\Service;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Repo\UpdateCashAcctInClientRepo;

class UpdateCashAcctInClientService extends ServiceBase
{
    public function update(CashAcctDto $cashAcct): void
    {
        (new UpdateCashAcctInClientRepo($this->getDmg()))
            ->update($cashAcct);
    }
}
