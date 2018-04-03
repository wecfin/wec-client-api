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
            'telephone' => $post->get('telephone'),
            'mobilephone' => $post->get('mobilephone'),
            'mail' => $post->get('mail')
        ]);

        (new CreateContactInClientService($this->getApp()))
            ->create($clientId, $contact);

        return new JsonResponse($contact);
    }
}
