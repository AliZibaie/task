<x-app-layout>


    <form class="max-w-sm mx-auto my-12" method="post" action="{{route('news.update', $news)}}">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="Title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$news->title}}" name="title">
            @error('title')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="Content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
            <input type="text" id="Content" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$news->content}}" name="content">
            @error('content')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="Category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <input type="text" id="Category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$news->category}}" name="category">
            @error('category')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="Resource" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resource</label>
            <select id="Resource"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="resource" >

                <option value="newsapi" {{ $news->resource =="newsapi" ? 'selected':''}}>NewsApi</option>
                <option value="guardian" {{ $news->resource =="guardian" ? 'selected':''}}>Guardian</option>
                @error('resource')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
            </select>
        </div>
        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            <a href="{{route('news.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
        </div>
    </form>

</x-app-layout>
