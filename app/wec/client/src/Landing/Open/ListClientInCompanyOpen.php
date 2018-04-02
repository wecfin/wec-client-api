<?php
namespace Wec\Client\Landing\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Landing\Service\ListClientInCompanyService;

class ListClientInCompanyOpen extends OpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        $companyId = $post->get('companyId');

        $clients = (new ListClientInCompanyService($this->getApp()))
            ->listByCompanyId($companyId);
        
        $defaultPage = 1;
        $defaultCountPerPage = 10;

        $countPerPage = (int)$post->get('countPerPage');
        $page = (int)$post->get('page');

        $limit = $countPerPage >= 1 ? $countPerPage : $defaultCountPerPage;
        $currentPage = $page >= 1 ? $page : $defaultPage;

        $offset = ($currentPage - 1) * $limit;
        $clients->limit($limit)->offset($offset);
        
        return new JsonResponse($clients);
    }
}
