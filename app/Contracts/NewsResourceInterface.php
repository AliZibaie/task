<?php

namespace App\Contracts;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

interface NewsResourceInterface
{
    public static function sendHttpRequest(string $about) : PromiseInterface|Response;

    public static function getArticles(string $about): Collection;

    public static function saveArticles(string $about): void;
}
