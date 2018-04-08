<?php
namespace Wec\Client\Client\Repo;

use Wec\Client\Client\Dto\ClientDto;
use Gap\Dto\DateTime;
use Wec\Client\Client\Repo\GenerateClientCodeRepo;

class CreateClientRepo extends RepoBase
{
    public function create(string $companyId, ClientDto $client): ClientDto
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }

        $this->validate($client);
        
        $client->clientId = $this->cnn->zid();
        $client->clientCode = (new GenerateClientCodeRepo($this->dmg))
            ->generate($companyId, $client->type);

        $now = new DateTime();
        $client->created = $now;
        $client->changed = $now;

        $ssb = $this->cnn->isb()
            ->insert('client')
            ->field(
                'clientId',
                'companyId',
                'clientCode',
                'type',
                'name',
                'employeeId',
                'groupId',
                'address',
                'created',
                'changed'
            )
            ->value()
                ->addStr($client->clientId)
                ->addStr($companyId)
                ->addStr($client->clientCode)
                ->addStr($client->type)
                ->addStr(trim($client->name))
                ->addStr($client->employeeId ?? '')
                ->addStr($client->groupId ?? '')
                ->addStr($client->address ?? '')
                ->addDateTime($client->created)
                ->addDateTime($client->changed)
            ->end()
            ->execute();

        return $client;
    }

    function validate(ClientDto $client): void
    {
        if (!trim($client->name)) {
            throw new \Exception('client name cannot be null');
        }

        if ($client->employeeId) {
            throw new \Exception('client belonged employee cannot be null');
        }

        if ($client->type !== 'customer' && $client->type !== 'supplier') {
            throw new \Exception('client type error');
        }
    }
}
