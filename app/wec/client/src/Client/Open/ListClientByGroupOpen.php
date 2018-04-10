<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\ListClientService;

class ListClientByGroupOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $groups = json_decode($post->get('groups'));
        $type = $post->get('type', '');

        $clients = (new ListClientService($this->getApp()))
            ->listByGroups($groups, $type);
        
        $countPerPage = (int)$post->get('countPerPage');
        $page = (int)$post->get('page');

        $clients = $this->selectClientByPagination($clients, $page, $countPerPage);
        
        return new JsonResponse($clients);
    }
}
