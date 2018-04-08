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
            ->end()
            ->list(ClientDto::class);
    }

    public function listByGroupId(string $groupId, string $type = ''): Collection
    {
        if (!$groupId) {
            throw new \Exception('groupId cannot be null');
        }

        $ssb = $this->getClientSsb();

        return $ssb
            ->where()
                ->expect('o.groupId')->equal()->str($groupId)
                ->andExpect('c.type')->equal()->str($type)
            ->end()
            ->list(ClientDto::class);
    }
}
