<?php
namespace Wec\Client\Landing\Service;

use Wec\Client\Landing\Repo\ListClientRepo;
use Gap\Db\Collection;

class ListClientService extends ServiceBase
{
    public function listByCompanyId(string $companyId): Collection
    {
        return (new ListClientRepo($this->getDmg()))
            ->listByCompanyId($companyId);
    }
}
