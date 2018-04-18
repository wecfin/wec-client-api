<?php
namespace Wec\Client\Client\Repo;

class DeleteClientRepo extends RepoBase
{
    public function deleteByClientId(string $clientId): void
    {
        if (!$clientId) {
            throw new Exception("clientId cannot be null");
        }

        $this->cnn->usb()
            ->update('client c')
            ->end()
            ->set('c.isActive')->int(0)
            ->where()
                ->expect('c.clientId')->equal()->str($clientId)
            ->end()
            ->execute();
    }
}
