<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\FetchClientService;
use Wec\Client\Client\Dto\ClientDto;

class FetchClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;

        $clientId = $post->get('clientId', '');

        $client = (new FetchClientService($this->getApp()))
            ->fetchByClientId($clientId);

        return new JsonResponse($client);
    }
}
