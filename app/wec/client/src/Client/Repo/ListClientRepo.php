<?php
namespace Wec\Client\Client\Repo;

use Gap\Db\Collection;
use Wec\Client\Client\Dto\ClientDto;

class ListClientRepo extends RepoBase
{
    public function listByCompanyId(string $companyId): Collection
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }
        
        return $this->cnn->ssb()
            ->select('c.*')
            ->from('client c')
            ->end()
            ->where()
                ->expect('c.companyId')->equal()->str($companyId)
            ->end()
            ->list(ClientDto::class);
    }
}
