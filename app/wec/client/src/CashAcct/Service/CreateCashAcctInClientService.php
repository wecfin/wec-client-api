<?php
namespace Wec\Client\CashAcct\Service;

use Wec\Client\CashAcct\Dto\CashAcctDto;
use Wec\Client\CashAcct\Repo\CreateCashAcctInClientRepo;

class CreateCashAcctInClientService extends ServiceBase
{
    public function create(CashAcctDto $cashAcct, string $clientId = ''): CashAcctDto
    {
        return (new CreateCashAcctInClientRepo($this->getDmg()))
            ->create($cashAcct, $clientId);
    }
}
