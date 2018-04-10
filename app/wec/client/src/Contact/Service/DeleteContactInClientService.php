<?php
namespace Wec\Client\Contact\Service;

use Wec\Client\Contact\Repo\DeleteContactInClientRepo;

class DeleteContactInClientService extends ServiceBase
{
    public function deleteByContactId(string $contactId): void
    {
        (new DeleteContactInClientRepo($this->getDmg()))
            ->deleteByContactId($contactId);
    }
}
