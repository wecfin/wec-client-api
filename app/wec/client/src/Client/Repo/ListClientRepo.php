<?php
namespace Wec\Client\Client\Repo;

use Gap\Db\Collection;
use Wec\Client\Client\Dto\ClientDto;

class ListClientRepo extends ClientRepoBase
{
    public function listByCompanyId(string $companyId, string $type = 'customer'): Collection
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }

        if (!$type) {
            throw new \Exception('type cannot be null');
        }
        
        $ssb = $this->getClientSsb();

        return $ssb
            ->where()
                ->expect('c.companyId')->equal()->str($companyId)
                ->andExpect('c.type')->equal()->str($type)
                ->andExpect('c.isActive')->equal()->int(1)
            ->end()
            ->list(ClientDto::class);
    }

    public function listByEmployeeId(string $employeeId, string $type = ''): Collection
    {
        if (!$employeeId) {
            throw new \Exception('employeeId cannot be null');
        }
         
        $ssb = $this->getClientSsb();

        return $ssb
            ->where()
                ->expect('o.employeeId')->equal()->str($employeeId)
                ->andExpect('c.type')->equal()->str($type)
                ->andExpect('c.isActive')->equal()->int(1)
            ->end()
            ->list(ClientDto::class);
    }

    public function listByGroups(array $groups = [], string $type = ''): Collection
    {
        if (!count($groups)) {
            throw new \Exception('groupId cannot be null');
        }

        $ssb = $this->getClientSsb();
        $where = $ssb->where();

        $groupId = array_pop($groups);
        
        $where
            ->expect('o.groupId')->equal()->str($groupId)
            ->andExpect('c.type')->equal()->str($type)
            ->andExpect('c.isActive')->equal()->int(1);

        foreach ($groups as $groupId) {
            $where->orGroup()
                ->expect('o.groupId')->equal()->str($groupId)
            ->end();
        }

        return $ssb ->list(ClientDto::class);
    }
}
