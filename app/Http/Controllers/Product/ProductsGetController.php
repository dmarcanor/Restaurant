<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sys\Restaurant\Products\Application\Seach\ProductSearcher;
use Sys\Restaurant\Products\Application\Seach\ProductSearcherRequest;

final class ProductsGetController extends Controller
{
    private $searcher;

    public function __construct(ProductSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $response = ($this->searcher)(new ProductSearcherRequest(
            $request->all()
        ));

        return new JsonResponse($response->toArray(), JsonResponse::HTTP_OK);
    }
}
