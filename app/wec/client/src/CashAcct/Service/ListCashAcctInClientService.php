<?php
namespace Wec\Client\CashAcct\Service;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Repo\ListCashAcctInClientRepo;
use Gap\Db\MySql\Collection;

class ListCashAcctInClientService extends ServiceBase
{
    public function list(string $clientId): Collection
    {
        return (new ListCashAcctInClientRepo($this->getDmg()))
            ->list($clientId);
    }
}
