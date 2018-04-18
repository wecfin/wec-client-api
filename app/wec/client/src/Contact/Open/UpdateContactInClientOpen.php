<?php
namespace Wec\Client\Contact\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Contact\Dto\ContactDto;
use Wec\Client\Contact\Service\UpdateContactInClientService;
use Wec\Client\Contact\Service\FetchContactInClientService;

class UpdateContactInClientOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $contactId = $post->get('contactId');

        $contact = new ContactDto([
            'contactId' => $contactId,
            'name' => $post->get('name'),
            'tel' => $post->get('tel'),
            'mobile' => $post->get('mobile'),
            'email' => $post->get('email')
        ]);

        (new UpdateContactInClientService($this->getApp()))
            ->update($contact);
        
        $contact = (new FetchContactInClientService($this->getApp()))
            ->fetch($contactId);

        return new JsonResponse($contact);
    }
}
