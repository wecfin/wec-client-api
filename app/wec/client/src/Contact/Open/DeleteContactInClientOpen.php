<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Dto\ContactDto;
use Wec\Client\Contact\Service\DeleteContactInClientService;

class DeleteContactInClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $contactId = $post->get('contactId', '');

        (new DeleteContactInClientService($this->getApp()))
            ->deleteByContactId($contactId);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
