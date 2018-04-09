<?php
namespace Wec\Client\Contact\Repo;

use Wec\Client\Contact\Dto\ContactDto;
use Gap\Dto\DateTime;

class CreateContactInClientRepo extends ContactRepoBase
{
    public function create(string $clientId, ContactDto $contact): ContactDto
    {
        if (!$clientId) {
            throw new \Exception('clientId cannot be null');
        }

        if (!$contact->name) {
            throw new \Exception('contact name cannot be null');
        }

        $this->validate($contact);

        $contact->contactId = $this->cnn->zid();
        $now = new DateTime();
        $contact->created = $now;
        $contact->changed = $now;

        $this->cnn->isb()
            ->insert('client_contact')
            ->field(
                'clientId',
                'contactId',
                'name',
                'tel',
                'mobile',
                'email',
                'created',
                'changed'
            )
            ->value()
                ->addStr($clientId)
                ->addStr($contact->contactId)
                ->addStr($contact->name)
                ->addStr($contact->tel ?? '')
                ->addStr($contact->mobile ?? '')
                ->addStr($contact->email ?? '')
                ->addDateTime($contact->created)
                ->addDateTime($contact->changed)
            ->end()
            ->execute();

        return $contact;
    }
}
