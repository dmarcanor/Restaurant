<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sys\Restaurant\Table\Application\Search\TableSearcher;
use Sys\Restaurant\Table\Application\Search\TableSearcherRequest;

final class TablesGetController extends Controller
{
    private $searcher;

    public function __construct(TableSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $response = ($this->searcher)(new TableSearcherRequest(
            $request->all()
        ));

        return new JsonResponse($response->toArray(), JsonResponse::HTTP_OK);
    }
}
