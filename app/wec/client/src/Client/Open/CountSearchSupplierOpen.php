<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\SearchSupplierService;

class CountSearchSupplierOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        
        $count = (new SearchSupplierService($this->getApp()))
            ->count([
                'companyId' => $post->get('companyId', ''),
                'q' => $post->get('q', '')
            ]);
        
        return new JsonResponse([
            'count' => $count
        ]);
    }
}
