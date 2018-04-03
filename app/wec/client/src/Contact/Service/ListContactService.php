<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\ListContactRepo;
use Gap\Db\Collection;

class ListContactService extends ServiceBase
{
    public function listByClientId(string $clientId): Collection
    {
        return (new ListContactRepo($this->getDmg()))
            ->listByClientId($clientId);
    }
}
