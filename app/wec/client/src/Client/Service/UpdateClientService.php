<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Dto\ClientDto;
use Wec\Client\Client\Repo\UpdateClientRepo;

class UpdateClientService extends ServiceBase
{
    public function updateByClientId(string $clientId, ClientDto $client): void
    {
        (new UpdateClientRepo($this->getDmg()))
            ->updateByClientId($clientId, $client);
    }
}
