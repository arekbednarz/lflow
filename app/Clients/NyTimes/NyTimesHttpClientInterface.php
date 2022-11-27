<?php

namespace App\Clients\NyTimes;

use Illuminate\Http\Client\Response;
use Psr\Http\Message\ResponseInterface;

interface NyTimesHttpClientInterface
{
    /**
     * @param string $url
     * @param array $query
     *
     * @return ResponseInterface
     */
    public function get(string $url, array $query = []): Response;
}
