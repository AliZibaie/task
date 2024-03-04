<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function __construct()
    {
        $this->authorizeResource(News::class);
    }
    public function index()
    {
        $articles = News::all();
        return view('news.index', compact('articles'));
    }
}
