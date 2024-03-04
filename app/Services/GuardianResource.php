<?php

namespace App\Services;

use App\Contracts\NewsResourceInterface;
use App\Enums\Source;
use App\Models\News;
use Carbon\Carbon;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;


class GuardianResource implements NewsResourceInterface
{
    public static function sendHttpRequest(string $about): PromiseInterface|Response
    {
        return $responseFromGuardian = Http::withoutVerifying()
            ->get("https://content.guardianapis.com/search?q=$about&api-key=42d106f5-5af2-47c9-b2b1-39b0aa74e2e3");
    }
    public static function getArticles(string $about) :Collection
    {
        return self::sendHttpRequest($about)->collect('response.results');
    }
    public static function saveArticles(string $about) : void
    {
        foreach (self::getArticles($about) as $article) {
            News::query()->create([
                'resource'=>'guardian',
                'published_at'=>Carbon::createFromDate($article['webPublicationDate']),
                'modified_at'=>Carbon::createFromDate($article['webPublicationDate']),
                'title'=>$article['sectionName'],
                'content'=>$article['webTitle'],
                'category'=>$about,
            ]);
        }
    }
}
