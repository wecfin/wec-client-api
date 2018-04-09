<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Dto\ContactDto;
use Wec\Client\Contact\Service\UpdateContactInClientService;

class UpdateContactInClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;

        $contact = new ContactDto([
            'contactId' => $post->get('contactId'),
            'name' => $post->get('name'),
            'tel' => $post->get('tel'),
            'mobile' => $post->get('mobile'),
            'email' => $post->get('email')
        ]);

        (new UpdateContactInClientService($this->getApp()))
            ->update($contact);

        return new JsonResponse([
            'status' => 'OK'
        ]);
    }
}
