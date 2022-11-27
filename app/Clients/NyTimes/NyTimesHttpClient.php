<?php

namespace App\Clients\NyTimes;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class NyTimesHttpClient implements NyTimesHttpClientInterface
{
    const QUERY_KEY_PARAM_NAME = 'api-key';

    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.nytimes.base_url') . $this->getApiPath();
    }

    public abstract function getApiPath(): string;

    public function get(string $url, array $query = []): Response
    {
        return Http::baseUrl($this->baseUrl)->get($url, $this->getQueryWithApiKey($query));
    }

    private static function getQueryWithApiKey(array $query = []): mixed
    {
        $query[self::QUERY_KEY_PARAM_NAME] = config('services.nytimes.key');

        return $query;
    }
}
