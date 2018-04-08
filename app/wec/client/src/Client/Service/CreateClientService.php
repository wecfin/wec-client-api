<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Dto\ClientDto;
use Wec\Client\Client\Repo\CreateClientRepo;

class CreateClientService extends ServiceBase
{
    public function create(string $companyId, ClientDto $client): ClientDto
    {
        return (new CreateClientRepo($this->getDmg()))
            ->create($companyId, $client);
    }
}
