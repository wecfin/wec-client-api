<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Service\ListContactService;

class ListContactOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $clientId = $post->get('clientId');

        $contacts = (new ListContactService($this->getApp()))
            ->listByClientId($clientId);

        return new JsonResponse($contacts);
    }
}
