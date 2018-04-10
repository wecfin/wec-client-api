<?php
namespace Wec\Client\Client\Repo;

class DeleteClientRepo extends RepoBase
{
    public function deleteByClientId(string $clientId): void
    {
        if (!$clientId) {
            throw new Exception("clientId cannot be null");
        }

        $this->cnn->dsb()
            ->delete()
            ->from('client')
            ->end()
            ->where()
                ->expect('clientId')->equal()->str($clientId)
            ->end()
            ->execute();
    }
}
