<?php

namespace App\Clients\NyTimes\Books;

use App\Clients\NyTimes\NyTimesHttpClient;
use Illuminate\Http\Client\Response;

class NyTimesBooksClient extends NyTimesHttpClient implements NyTimesBooksClientInterface
{
    const URL_BEST_SELLERS = '/lists/best-sellers/history.json';

    const QUERY_PARAM_AUTHOR = 'author';
    const QUERY_PARAM_ISBN = 'isbn';
    const QUERY_PARAM_TITLE = 'title';
    const QUERY_PARAM_OFFSET = 'offset';

    public function getBestSellers(string $author = '', string $isbn = '', string $title = '', int $offset = 0): Response
    {
        return  $this->get(
            self::URL_BEST_SELLERS,
            $this->getBestSellersQueryParameters($author, $isbn, $title, $offset)
        );
    }

    private function getBestSellersQueryParameters(string $author = '', string $isbn = '', string $title = '', int $offset = 0): array
    {
        $query = [];
        if (!empty($author)) {
            $query[self::QUERY_PARAM_AUTHOR] = $author;
        }

        if (!empty($isbn)) {
            $query[self::QUERY_PARAM_ISBN] = $isbn;
        }

        if (!empty($title)) {
            $query[self::QUERY_PARAM_TITLE] = $title;
        }

        $query[self::QUERY_PARAM_OFFSET] = $offset;

        return $query;
    }

    public function getApiPath(): string
    {
        return config('services.nytimes.books_path');
    }
}
