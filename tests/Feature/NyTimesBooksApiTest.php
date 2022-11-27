<?php

namespace Tests\Feature;

class NyTimesBooksApiTest extends ApiTestCase
{
    public function test_get_best_sellers_no_filters_return_success() {
        $this
            ->getJson(route('books.get.best-sellers'))
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "copyright",
                "num_results",
                "results" => []
            ]);
    }

    public function test_get_best_sellers_with_valid_filters_returns_success() {
        $this
            ->getJson(route('books.get.best-sellers') . '?author=Diana Gabaldon&isbn=0399178570&title=I GIVE YOU MY BODY&offset=0')
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "copyright",
                "num_results",
                "results" => []
            ]);
    }

    public function test_get_best_sellers_invalid_offset_zero_returns_success() {
        $this
            ->getJson(route('books.get.best-sellers') . '?offset=0')
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "copyright",
                "num_results",
                "results" => []
            ]);
    }

    public function test_get_best_sellers_invalid_isbn_returns_error() {
        $this
            ->getJson(route('books.get.best-sellers') . '?isbn=not_valid')
            ->assertStatus(400)
            ->assertJsonStructure([
                "errors" => ["isbn"]
            ]);
    }

    public function test_get_best_sellers_invalid_multiple_isbn_returns_error() {
        $this
            ->getJson(route('books.get.best-sellers') . '?isbn=1591847931;second_not_valid')
            ->assertStatus(400)
            ->assertJsonStructure([
                "errors" => ["isbn"]
            ]);
    }

    public function test_get_best_sellers_offset_not_multiple_20_returns_error() {
        $this
            ->getJson(route('books.get.best-sellers') . '?offset=7')
            ->assertStatus(400)
            ->assertJsonStructure([
                "errors" => ["offset"]
            ]);
    }

    public function test_get_best_sellers_offset_not_numeric_returns_error() {
        $this
            ->getJson(route('books.get.best-sellers') . '?offset=string')
            ->assertStatus(400)
            ->assertJsonStructure([
                "errors" => ["offset"]
            ]);
    }

}
