<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Repo\FilterCustomerRepo;
use Gap\Db\Collection;

class FilterCustomerService extends ServiceBase
{
    public function query(array $query): Collection
    {
        return (new FilterCustomerRepo($this->getDmg()))
            ->query($query);
    }
}
