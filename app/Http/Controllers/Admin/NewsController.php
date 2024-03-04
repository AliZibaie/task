<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
   public function __construct()
    {
        $this->authorizeResource(News::class);
    }
    public function index(): View
    {
        $articles = News::query()->paginate(7);
        return view('news.index', compact('articles'));
    }
}
