<?php
namespace Wec\Client\Client\Repo;

use Wec\Client\Client\Dto\ClientDto;
use Gap\Dto\DateTime;
use Wec\Client\Client\Repo\FetchClientRepo;

class GenerateClientCodeRepo extends RepoBase
{
    public function generate(string $companyId, string $clientType): string
    {
        if (!$companyId) {
            throw new \Exception('companyId cannot be null');
        }

        if ($clientType !== 'customer' && $clientType !== 'supplier') {
            throw new \Exception('client type error');
        }

        $currentSerialNo = 1;
        $codePrefix = $clientType == 'customer' ? 'C' : 'S';
        $clientCode = '';

        $latestClient = (new FetchClientRepo($this->dmg))
            ->fetchLastCreatedClientByType($companyId, $clientType);
        
        if ($latestClient) {
            $lastSerialNo = (int)(substr($latestClient->clientCode, 1));
            $currentSerialNo = $lastSerialNo + 1;
        }

        $clientCode = $codePrefix.str_pad((string)$currentSerialNo, 6, '0', STR_PAD_LEFT);

        return $clientCode;
    }
}
