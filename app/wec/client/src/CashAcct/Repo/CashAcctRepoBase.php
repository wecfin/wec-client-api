<?php
namespace Wec\Client\CashAcct\Repo;

use Wec\Client\CashAcct\Dto\CashAcctDto;

class CashAcctRepoBase extends \Wec\Client\Base\Repo\RepoBase
{
    public function validateCashAcct(CashAcctDto $cashAcct): void
    {
        $defaultTypeArr = ['bkacct','alipay','paypal'];

        if (!$cashAcct->type || !in_array($cashAcct->type, $defaultTypeArr)) {
            throw new \Exception('cashAcct type error');
        }

        if (!trim($cashAcct->cashAcctName)) {
            throw new \Exception('cashAcctName cannot be null');
        }
    }
}
