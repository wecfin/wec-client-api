<?php
namespace Wec\Client\Landing\Service;

use Wec\Client\Landing\Repo\ListClientInCompanyRepo;
use Gap\Db\Collection;

class ListClientInCompanyService extends ServiceBase
{
    public function listByCompanyId(string $companyId): Collection
    {
        return (new ListClientInCompanyRepo($this->getDmg()))
            ->listByCompanyId($companyId);
    }
}
