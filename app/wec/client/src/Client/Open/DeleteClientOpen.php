<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\DeleteClientService;

class DeleteClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;

        $clientId = $post->get('clientId');

        (new DeleteClientService($this->getApp()))
            ->deleteByClientId($clientId);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
