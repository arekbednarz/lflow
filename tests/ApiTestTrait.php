<?php

namespace Tests;

use Illuminate\Support\Facades\Http;

trait ApiTestTrait
{
    private function fakeHttp() {
        $booksApiPath = config('services.nytimes.base_url') . config('services.nytimes.books_path');
        $booksSuccessResponse = file_get_contents(base_path('tests/fixtures/BestSellersSuccessResponse.json'));

        Http::preventStrayRequests();
        Http::fake([
            $booksApiPath . '*' => Http::response($booksSuccessResponse),
        ]);
    }
}
