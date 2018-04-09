<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\UpdateContactInClientRepo;
use Wec\Client\Contact\Dto\ContactDto;
use Gap\Db\Collection;

class UpdateContactInClientService extends ServiceBase
{
    public function update(ContactDto $contact): void
    {
        (new UpdateContactInClientRepo($this->getDmg()))
            ->update($contact);
    }
}
