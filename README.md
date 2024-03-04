
# installation

<ol>
<li>composer update</li>
<li>cp .env.example .env</li>
<li>npm install</li>
<li>npm run dev</li>
<li>wsl</li>
<li>sail up -d</li>
<li>php artisan migrate --seed</li>
<li>php artisan key:generate</li>
<li>php artisan  serve</li>
<li>php artisan schedule:work</li>
</ol>

## Api guide
<ul>
<li>http://127.0.0.1:8000/api/v1/news</li>
<li>http://127.0.0.1:8000/api/v1/news/newsId</li>
</ul>

### filtering
You can filter index api with:
<ul>
<li>resource(guardian/newsapi)</li>
<li>category</li>
<li>published_at</li>
</ul>

### example
<p>http://127.0.0.1:8000/api/v1/news?resource=guardian&category=president&published_at=2024-02-06 20:51:54</p>
<p>http://127.0.0.1:8000/api/v1/news/1</p>
