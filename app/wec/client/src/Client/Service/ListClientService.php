<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Repo\ListClientRepo;
use Gap\Db\Collection;

class ListClientService extends ServiceBase
{
    public function listByCompanyId(string $companyId): Collection
    {
        return (new ListClientRepo($this->getDmg()))
            ->listByCompanyId($companyId);
    }
}
