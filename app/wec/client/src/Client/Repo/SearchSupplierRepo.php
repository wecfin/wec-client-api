<?php
namespace Wec\Client\Client\Repo;

use Gap\Db\Collection;
use Wec\Client\Client\Dto\ClientDto;
use Gap\Db\MySql\SqlBuilder\SelectSqlBuilder;

class SearchSupplierRepo extends ClientRepoBase
{
    public function query(array $query): Collection
    {   
        return $this->getQuerySsb($query)->list(ClientDto::class);
    }

    protected function getQuerySsb(array $query): SelectSqlBuilder
    {
        if (!$companyId = prop($query, 'companyId')) {
            throw new \Exception('companyId cannot be null');
        }

        $ssb = $this->getClientSsb();
        $where = $ssb->where();

        $where
            ->expect('c.type')->equal()->str('supplier')
            ->andExpect('c.companyId')->equal()->str($companyId)
            ->andExpect('c.isActive')->equal()->int(1);

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
        return $this->getQuerySsb($query)->count();
    }
}
