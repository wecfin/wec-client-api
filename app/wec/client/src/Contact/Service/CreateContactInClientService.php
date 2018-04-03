<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\CreateContactInClientRepo;
use Wec\Client\Contact\Dto\ContactDto;
use Gap\Db\Collection;

class CreateContactInClientService extends ServiceBase
{
    public function create(string $clientId, ContactDto $contact): ContactDto
    {
        return (new CreateContactInClientRepo($this->getDmg()))
            ->create($clientId, $contact);
    }
}
