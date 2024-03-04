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
class NewsApiResource implements NewsResourceInterface
{
    public static function sendHttpRequest(string $about): PromiseInterface|Response
    {
         return Http::withoutVerifying()
            ->withToken('3e67b82e9ac640feaeadf4a48434c258')
            ->get("https://newsapi.org/v2/everything?q=$about");
    }
    public static function getArticles(string $about): Collection
    {
        return self::sendHttpRequest($about)->collect('articles');
    }

    public static function saveArticles(string $about) : void
    {
        foreach (self::getArticles($about) as $article) {
            News::query()->create([
                'resource'=>Source::NEWSAPI,
                'published_at'=>Carbon::createFromDate($article['publishedAt']),
                'modified_at'=>Carbon::createFromDate($article['publishedAt']),
                'title'=>$article['title'],
                'content'=>$article['content'],
                'category'=>$about,
            ]);
        }
    }
}
