<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): NewsCollection
    {
        return new NewsCollection(News::all());
    }
}
