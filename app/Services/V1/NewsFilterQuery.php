<?php

namespace App\Services\V1;

use App\Models\News;

class NewsFilterQuery
{
    public static function index()
    {
        return  News::query()
            ->when(request()->has('resource'), function ($query){
                $query->where('resource', request('resource'));
            })
            ->when(request()->has('category'), function ($query){
                $query->where('category', request('category'));
            })
            ->when(request()->has('published_at'), function ($query){
                $query->where('published_at', request('published_at'));
            })
            ->get();
    }
}
