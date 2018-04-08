<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\CreateClientService;
use Wec\Client\Client\Dto\ClientDto;

class CreateClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;

        $companyId = $post->get('companyId');

        $client = new ClientDto([
            'type' => $post->get('type'),
            'name' => $post->get('name'),
            'employeeId' => $post->get('employeeId'),
            'groupId' => $post->get('groupId'),
            'address' => $post->get('address')
        ]);

        (new CreateClientService($this->getApp()))
            ->create($companyId, $client);

        return new JsonResponse($client);
    }
}
