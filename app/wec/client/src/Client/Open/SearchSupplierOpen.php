<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\SearchSupplierService;

class SearchSupplierOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        
        $clients = (new SearchSupplierService($this->getApp()))
            ->query([
                'companyId' => $post->get('companyId', ''),
                'q' => $post->get('q', '')
            ]);
        
        $countPerPage = (int)$post->get('countPerPage');
        $page = (int)$post->get('page');

        $clients = $this->selectClientByPagination($clients, $page, $countPerPage);
        
        return new JsonResponse($clients);
    }
}
