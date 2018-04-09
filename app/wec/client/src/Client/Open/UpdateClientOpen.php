<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\UpdateClientService;
use Wec\Client\Client\Dto\ClientDto;

class UpdateClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;

        $clientId = $post->get('clientId');

        $client = new ClientDto([
            'name' => $post->get('name'),
            'address' => $post->get('address')
        ]);

        (new UpdateClientService($this->getApp()))
            ->updateByClientId($clientId, $client);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
