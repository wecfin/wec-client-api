<?php
namespace Wec\Client\Contact\Repo;

use Wec\Client\Contact\Dto\ContactDto;

class UpdateContactInClientRepo extends ContactRepoBase
{
    public function update(ContactDto $contact): void
    {
        if (!$contactId = $contact->contactId) {
            throw new \Exception('contactId cannot be null');
        }

        if (!$contact->name) {
            throw new \Exception('contact name cannot be null');
        }

        $this->validate($contact);

        $this->cnn->usb()
            ->update('client_contact c')
            ->end()
            ->set('c.name')->str(trim($contact->name))
            ->set('c.tel')->str(trim($contact->tel))
            ->set('c.mobile')->str(trim($contact->mobile))
            ->set('c.email')->str(trim($contact->email))
            ->where()
                ->expect('c.contactId')->equal()->str($contactId)
            ->end()
            ->execute();
    }
}
