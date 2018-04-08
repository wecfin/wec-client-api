<?php
namespace Wec\Client\Client\Repo;

use Wec\Client\Client\Dto\ClientDto;
use Gap\Dto\DateTime;

class FetchClientRepo extends ClientRepoBase
{
    public function fetchLastCreatedClientByType(string $companyId, string $type): ? ClientDto
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }

        if (!$type) {
            throw new \Exception('client type cannot be null');
        }

        $ssb = $this->getClientSsb();
        return $ssb
            ->where()
                ->expect('c.companyId')->equal()->str($companyId)
                ->andExpect('c.type')->equal()->str($type)
            ->end()
            ->descOrderBy('c.created')
            ->limit(1)
            ->fetch(ClientDto::class);
    }
}
