<?php
namespace Wec\Client\Client\Repo;

use Wec\Client\Client\Dto\ClientDto;

class UpdateClientRepo extends RepoBase
{
    public function updateByClientId(string $clientId, ClientDto $client): void
    {
        if (!$clientId) {
            throw new \Exception('clientId cannot be null');
        }

        if (!$clientName = trim($client->name)) {
            throw new \Exception('client name cannot be null');
        }

        $this->cnn->usb()
            ->update('client c')
            ->end()
            ->set('c.name')->str($clientName)
            ->set('c.address')->str(trim($client->address))
            ->where()
                ->expect('c.clientId')->equal()->str($clientId)
            ->end()
            ->execute();
    }
}
