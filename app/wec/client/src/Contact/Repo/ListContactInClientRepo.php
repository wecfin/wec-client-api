<?php
namespace Wec\Client\Contact\Repo;

use Wec\Client\Contact\Dto\ContactDto;
use Gap\Db\Collection;

class ListContactInClientRepo extends RepoBase
{
    public function listByClientId(string $clientId): Collection
    {
        if (!$clientId) {
            throw new \Exception('clientId cannot be null');
        }

        return $this->cnn->ssb()
            ->select(
                'c.contactId',
                'c.name',
                'c.telephone',
                'c.mobilephone',
                'c.mail',
                'c.created',
                'c.changed'
            )
            ->from('contact c')
            ->end()
            ->where()
                ->expect('c.clientId')->equal()->str($clientId)
            ->end()
            ->list(ContactDto::class);
    }
}
