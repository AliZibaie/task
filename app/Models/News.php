<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'content',
        'title',
        'published_at',
        'modified_at',
        'resource',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
