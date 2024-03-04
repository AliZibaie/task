<?php

namespace App\Console\Commands;

use App\Services\GuardianResource;
use App\Services\NewsApiResource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
       NewsApiResource::saveArticles("president");
       GuardianResource::saveArticles("president");
    }
}
