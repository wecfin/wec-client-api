<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\ListContactInClientRepo;
use Gap\Db\Collection;

class ListContactInClientService extends ServiceBase
{
    public function listByClientId(string $clientId): Collection
    {
        return (new ListContactInClientRepo($this->getDmg()))
            ->listByClientId($clientId);
    }
}
