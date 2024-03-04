<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\View\View;

class NewsController extends Controller
{
   public function __construct()
    {
//        $this->authorizeResource(News::class);
    }
    public function index(): View
    {
        $articles = News::query()->paginate(7);
        return view('news.index', compact('articles'));
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news, UpdateNewsRequest $request)
    {
        try {
            $newNews = $request->merge(['modified_at'=>Carbon::now()])->input();
            $news->update($newNews);
            return redirect('news')->with('success', 'news updated successfully!');
        }catch (\Throwable $exception){
            return redirect('news', 500)->with('fail', 'failed to update news!');
        }
    }
}
