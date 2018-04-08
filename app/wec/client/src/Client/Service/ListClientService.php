<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Repo\ListClientRepo;
use Gap\Db\Collection;

class ListClientService extends ServiceBase
{
    public function listByCompanyId(string $companyId, string $type = ''): Collection
    {
        return (new ListClientRepo($this->getDmg()))
            ->listByCompanyId($companyId, $type);
    }

    public function listByEmployeeId(string $employeeId, string $type = ''): Collection
    {
        return (new ListClientRepo($this->getDmg()))
            ->listByEmployeeId($employeeId, $type);
    }

    public function listByGroupId(string $groupId, string $type = ''): Collection
    {
        return (new ListClientRepo($this->getDmg()))
            ->listByGroupId($groupId, $type);
    }
}
