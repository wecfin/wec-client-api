<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Repo\SearchSupplierRepo;
use Gap\Db\Collection;

class SearchSupplierService extends ServiceBase
{
    public function query(array $query): Collection
    {
        return (new SearchSupplierRepo($this->getDmg()))
            ->query($query);
    }

    public function count(array $query): int
    {
        return (new SearchSupplierRepo($this->getDmg()))
            ->count($query);
    }
}
