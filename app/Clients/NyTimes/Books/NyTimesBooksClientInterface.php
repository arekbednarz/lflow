<?php

namespace App\Clients\NyTimes\Books;

use Illuminate\Http\Client\Response;

interface NyTimesBooksClientInterface
{
    public function getBestSellers(string $author = '', string $isbn = '', string $title = '', int $offset = 0): Response;
}
