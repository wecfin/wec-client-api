<?php
namespace Wec\Client\Client\Service;

use Wec\Client\Client\Repo\DeleteClientRepo;

class DeleteClientService extends ServiceBase
{
    public function deleteByClientId(string $clientId): void
    {
        (new DeleteClientRepo($this->getDmg()))
            ->deleteByClientId($clientId);
    }
}
