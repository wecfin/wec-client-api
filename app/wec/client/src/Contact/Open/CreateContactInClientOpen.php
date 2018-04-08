<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Dto\ContactDto;
use Wec\Client\Contact\Service\CreateContactInClientService;

class CreateContactInClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $clientId = $post->get('clientId');

        $contact = new ContactDto([
            'name' => $post->get('name'),
            'tel' => $post->get('tel'),
            'mobile' => $post->get('mobile'),
            'email' => $post->get('email')
        ]);

        (new CreateContactInClientService($this->getApp()))
            ->create($clientId, $contact);

        return new JsonResponse($contact);
    }
}
