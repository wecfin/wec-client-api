<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;

class BlockCashAcctInClientRepo extends CashAcctRepoBase
{
    public function block(string $cashAcctId): void
    {
        if (!$cashAcctId) {
            throw new \Exception('cashAcctId cannot be null');
        }

        $this->cnn->usb()
            ->update('client_cash_acct')->end()
            ->set('isActive')->int(0)
            ->where()
                ->expect('cashAcctId')->equal()->str($cashAcctId)
            ->end()
            ->execute();
    }
}
