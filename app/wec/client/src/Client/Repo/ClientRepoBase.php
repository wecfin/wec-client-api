<?php
namespace Wec\Client\Client\Repo;

use Gap\Db\MySql\SqlBuilder\SelectSqlBuilder;

class ClientRepoBase extends \Wec\Client\Base\Repo\RepoBase
{
    public function getClientSsb(): SelectSqlBuilder
    {
        return $this->cnn->ssb()
        ->select(
            'c.clientId',
            'c.clientCode',
            'c.type',
            'c.name',
            'c.address',
            'c.source',
            'o.employeeId employeeId',
            'o.name employeeName',
            'o.groupId groupId',
            'o.groupName groupName',
            'c.created',
            'c.changed'
        )
        ->from('client c')
            ->leftJoin('client_owner o')
                ->onCond()
                    ->expect('c.clientId')->equal()->expr('o.clientId')
            ->endJoin()
        ->end();
    }
}
