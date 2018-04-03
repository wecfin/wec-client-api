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

        if (!$name = $contact->name) {
            throw new \Exception('contact name cannot be null');
        }

        $this->validate($contact);

        $contact->contactId = $this->cnn->zid();
        $now = new DateTime();
        $contact->created = $now;
        $contact->changed = $now;

        $this->cnn->isb()
            ->insert('contact')
            ->field(
                'clientId',
                'contactId',
                'name',
                'telephone',
                'mobilephone',
                'mail',
                'created',
                'changed'
            )
            ->value()
                ->addStr($clientId)
                ->addStr($contact->contactId)
                ->addStr($contact->name)
                ->addStr($contact->telephone ?? '')
                ->addStr($contact->mobilephone ?? '')
                ->addStr($contact->mail ?? '')
                ->addDateTime($contact->created)
                ->addDateTime($contact->changed)
            ->end()
            ->execute();

        return $contact;
    }

    protected function validate(ContactDto $contact): void
    {
        if ($telephone = $contact->telephone) {
            $this->validateTelephonePattern($telephone);
        }

        if ($mobilephone = $contact->mobilephone) {
            $this->validateMobilePhonePattern($mobilephone);
        }

        if ($mail = $contact->mail) {
            $this->validateMailPattern($mail);
        }
    }
}
