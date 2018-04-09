<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Dto\ClientDto;
use Wec\Client\Client\Repo\FetchClientRepo;

class FetchClientService extends ServiceBase
{
    public function fetchByClientId(string $clientId): ? ClientDto
    {
        return (new FetchClientRepo($this->getDmg()))
            ->fetchByClientId($clientId);
    }
}
