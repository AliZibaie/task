<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsCollection;
use App\Http\Resources\News\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    public function index(): NewsCollection
    {
        return new NewsCollection(News::all());
    }
    public function show(News $news): NewsResource
    {
        return new NewsResource($news);
    }
}
