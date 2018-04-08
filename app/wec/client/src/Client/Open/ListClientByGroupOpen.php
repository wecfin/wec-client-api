<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\ListClientService;

class ListClientByGroupOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $groupId = $post->get('groupId');
        $type = $post->get('type', '');

        $clients = (new ListClientService($this->getApp()))
            ->listByGroupId($groupId, $type);
        
        $countPerPage = (int)$post->get('countPerPage');
        $page = (int)$post->get('page');

        $clients = $this->selectClientByPagination($clients, $page, $countPerPage);
        
        return new JsonResponse($clients);
    }
}
