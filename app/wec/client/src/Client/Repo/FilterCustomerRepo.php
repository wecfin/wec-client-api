<?php
namespace Wec\Client\Client\Repo;

use Gap\Db\Collection;
use Wec\Client\Client\Dto\ClientDto;
use Gap\Db\MySql\SqlBuilder\SelectSqlBuilder;

class FilterCustomerRepo extends ClientRepoBase
{
    public function query(array $query): Collection
    {
        return $this->getFilterSsb($query)->list(ClientDto::class);
    }

    protected function getFilterSsb(array $query): SelectSqlBuilder
    {
        $ssb = $this->getClientSsb();
        $where = $ssb->where();

        $where
            ->expect('c.type')->equal()->str('customer')
            ->andExpect('c.isActive')->equal()->int(1);

        $companyId = prop($query, 'companyId');
        $groupId = prop($query, 'groupId');
        $employeeId = prop($query, 'employeeId');

        if (!$companyId && !$groupId && !$employeeId) {
            throw new \Exception('client filter condition error');
        }

        if ($companyId) {
            $where->andExpect('c.companyId')->equal()->str($companyId);
        }

        if ($groupId) {
            $where->andExpect('o.groupId')->equal()->str($groupId);
        }

        if ($employeeId) {
            $where->andExpect('o.employeeId')->equal()->str($employeeId);
        }

        if ($queryStr = prop($query, 'q')) {
            $keywords = explode(' ', $queryStr);

            foreach ($keywords as $keyword) {
                $where->andGroup()
                    ->expect('c.name')->like()->str("%$keyword%")
                    ->orExpect('c.clientCode')->like()->str("%$keyword%")
                    ->orExpect('c.address')->like()->str("%$keyword%")
                    ->endGroup();
            }
        }

        return $ssb;
    }

    public function count(array $query): int
    {
        return $this->getFilterSsb($query)->count();
    }
}
