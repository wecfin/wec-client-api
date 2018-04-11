<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;

class UpdateCashAcctInClientRepo extends CashAcctRepoBase
{
    public function update(CashAcctDto $cashAcct): void
    {
        if (!$cashAcctId = $cashAcct->cashAcctId) {
            throw new \Exception('cashAcctId cannot be null');
        }

        $this->validateCashAcct($cashAcct);

        $this->cnn->usb()
            ->update('client_cash_acct')->end()
            ->set('cashAcctName')->str(trim($cashAcct->cashAcctName))
            ->set('jsonData')->str($cashAcct->jsonData)
            ->set('type')->str($cashAcct->type)
            ->where()
                ->expect('cashAcctId')->equal()->str($cashAcctId)
            ->end()
            ->execute();
    }
}
