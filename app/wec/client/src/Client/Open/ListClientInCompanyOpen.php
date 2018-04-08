<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\ListClientService;

class ListClientInCompanyOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $companyId = $post->get('companyId');
        $type = $post->get('type', '');

        $clients = (new ListClientService($this->getApp()))
            ->listByCompanyId($companyId, $type);

        $countPerPage = (int)$post->get('countPerPage');
        $page = (int)$post->get('page');

        $clients = $this->selectClientByPagination($clients, $page, $countPerPage);
        
        return new JsonResponse($clients);
    }
}
