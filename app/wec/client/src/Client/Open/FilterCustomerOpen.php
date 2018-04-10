<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Wec\Client\Client\Service\FilterCustomerService;

class FilterCustomerOpen extends ClientOpenBase
{
    public function postOpen(): JsonResponse
    {
        $post = $this->request->request;
        
        $clients = (new FilterCustomerService($this->getApp()))
            ->query([
                'companyId' => $post->get('companyId', ''),
                'employeeId' => $post->get('employeeId', ''),
                'groupId' => $post->get('groupId', ''),
                'q' => $post->get('q', '')
            ]);
        
        // var_dump($clients);exit();
        // foreach ($clients as $client) {
        //     var_dump($client);
        // }
        // $countPerPage = (int)$post->get('countPerPage');
        // $page = (int)$post->get('page');

        // $clients = $this->selectClientByPagination($clients, $page, $countPerPage);
        
        return new JsonResponse($clients);
    }
}
