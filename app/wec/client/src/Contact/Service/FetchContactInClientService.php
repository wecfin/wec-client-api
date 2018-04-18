<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\FetchContactInClientRepo;
use Wec\Client\Contact\Dto\ContactDto;

class FetchContactInClientService extends ServiceBase
{
    public function fetch(string $contactId): ?ContactDto
    {
        return (new FetchContactInClientRepo($this->getDmg()))
            ->fetch($contactId);
    }
}
