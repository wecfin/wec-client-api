<?php
namespace Wec\Client\CashAcct\Service;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Repo\FetchCashAcctInClientRepo;

class FetchCashAcctInClientService extends ServiceBase
{
    public function fetch(string $cashAcctId): ?CashAcctDto
    {
        return (new FetchCashAcctInClientRepo($this->getDmg()))
            ->fetch($cashAcctId);
    }
}
