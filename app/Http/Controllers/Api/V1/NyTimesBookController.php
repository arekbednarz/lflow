<?php

namespace App\Http\Controllers\Api\V1;

use App\Clients\NyTimes\Books\NyTimesBooksClientInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetBooksBestSellersRequest;
use App\Http\Responses\SuccessfulResponse;
use Illuminate\Http\JsonResponse;

class NyTimesBookController extends Controller
{
    private NyTimesBooksClientInterface $nyTimesClient;

    public function __construct(NyTimesBooksClientInterface $nyTimesClient)
    {
        $this->nyTimesClient = $nyTimesClient;
    }

    public function getBestSellers(GetBooksBestSellersRequest $request): JsonResponse {

        $bestSellersResponse = $this->nyTimesClient->getBestSellers(
            $request->input('author', ''),
            $request->input('isbn', ''),
            $request->input('title', ''),
            $request->input('offset', 0)
        );

        return response()->apiSuccess($bestSellersResponse->json());
    }
}
