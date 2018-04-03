<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Service\ListContactInClientService;

class ListContactInClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $clientId = $post->get('clientId');

        $contacts = (new ListContactInClientService($this->getApp()))
            ->listByClientId($clientId);

        return new JsonResponse($contacts);
    }
}
