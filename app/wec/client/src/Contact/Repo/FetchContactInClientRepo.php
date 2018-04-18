<?php
namespace Wec\Client\Contact\Repo;

use Wec\Client\Contact\Dto\ContactDto;

class FetchContactInClientRepo extends ContactRepoBase
{
    public function fetch(string $contactId): ?ContactDto
    {
        if (!$contactId) {
            throw new \Exception('contactId cannot be null');
        }

        return $this->cnn->ssb()
            ->select(
                'c.contactId',
                'c.name',
                'c.tel',
                'c.mobile',
                'c.email',
                'c.created',
                'c.changed'
            )
            ->from('client_contact c')
            ->end()
            ->where()
                ->expect('c.contactId')->equal()->str($contactId)
            ->end()
            ->fetch(ContactDto::class);
    }
}
