<?php
namespace Wec\Client\CashAcct\Service;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Repo\BlockCashAcctInClientRepo;

class BlockCashAcctInClientService extends ServiceBase
{
    public function block(string $cashAcctId): void
    {
        (new BlockCashAcctInClientRepo($this->getDmg()))
            ->block($cashAcctId);
    }
}
