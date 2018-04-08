<?php
namespace Wec\Client\Client\Open;

use Gap\Http\JsonResponse;
use Gap\Db\Collection;

class ClientOpenBase extends OpenBase
{
    public function selectClientByPagination(Collection $clients, int $page, int $countPerPage): Collection
    {
        $defaultPage = 1;
        $defaultCountPerPage = 10;

        $limit = $countPerPage >= 1 ? $countPerPage : $defaultCountPerPage;
        $currentPage = $page >= 1 ? $page : $defaultPage;

        $offset = ($currentPage - 1) * $limit;

        $clients->limit($limit)->offset($offset);

        return $clients;
    }
}
