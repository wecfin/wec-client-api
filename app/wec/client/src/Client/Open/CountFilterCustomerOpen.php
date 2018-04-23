<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\FilterCustomerService;

class CountFilterCustomerOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        
        $count = (new FilterCustomerService($this->getApp()))
            ->count([
                'companyId' => $post->get('companyId', ''),
                'employeeId' => $post->get('employeeId', ''),
                'groupId' => $post->get('groupId', ''),
                'q' => $post->get('q', '')
            ]);
        
        return new JsonResponse([
            'count' => $count
        ]);
    }
}
