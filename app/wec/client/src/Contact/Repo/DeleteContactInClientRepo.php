<?php
namespace Wec\Client\Contact\Repo;

class DeleteContactInClientRepo extends \Wec\Client\Base\Repo\RepoBase
{
    public function deleteByContactId(string $contactId): void
    {
        if (!$contactId) {
            throw new \Exception('contactId cannot be null');
        }
        
        $this->cnn->dsb()
            ->delete()
            ->from('client_contact')
            ->end()
            ->where()
                ->expect('contactId')->equal()->str($contactId)
            ->end()
            ->execute();
    }
}
