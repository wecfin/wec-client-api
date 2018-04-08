<?php
namespace Wec\Client\Client\Repo;

use Wec\Client\Client\Dto\ClientDto;
use Gap\Dto\DateTime;

class FetchClientRepo extends RepoBase
{
    public function fetchLastCreatedClientByType(string $companyId, string $type): ? ClientDto
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }

        if (!$type) {
            throw new \Exception('client type cannot be null');
        }

        return $this->cnn->ssb()
            ->select(
                'c.clientId',
                'c.clientCode',
                'c.type',
                'c.name',
                'c.employeeId',
                'c.groupId',
                'c.address',
                'c.created',
                'c.changed'
            )
            ->from('client c')
            ->end()
            ->where()
                ->expect('c.companyId')->equal()->str($companyId)
                ->andExpect('c.type')->equal()->str($type)
            ->end()
            ->descOrderBy('c.created')
            ->limit(1)
            ->fetch(ClientDto::class);
    }
}
