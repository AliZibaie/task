<x-app-layout>


    <div class="">
        <div class="flex justify-end mx-8 px-36 my-8">
            <form action="{{route('news.store')}}" method="post">
                @csrf
                @method("POST")
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get News</button>
            </form>
        </div>
        @if(session('success'))
            <p class="text-green-700 text-xl text-center">{{session('success')}}</p>
        @elseif(session('fail'))
            <p class="text-red-700 text-xl text-center">{{session('fail')}}</p>
        @endif
        <table class="max-w-96 mx-auto my-12 text-sm text-left  text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-8 py-3 text-lg">
                    Title
                </th>
                <th scope="col" class="px-8 py-3 text-lg">
                    Content
                </th>
                <th scope="col" class="px-8 py-3 text-lg">
                    Category
                </th>
                <th scope="col" class="px-8 py-3 text-lg">
                    Resource
                </th>
                <th scope="col" class="px-8 py-3 text-lg">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-12 py-4 text-yellow-700 text-lg max-w-80 truncate">
                    {{$article->title}}
                </th>
                <td class="text-green-600 text-lg truncate max-w-96">
                    {{$article->content}}
                </td>
                <td class="px-12 py-4 text-orange-700 text-lg">
                    {{$article->category}}
                </td>
                <td class="px-12 py-4 text-purple-700 text-lg">
                    {{$article->resource}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('news.edit', $article)}}" class="text-lg text-blue-600 dark:text-blue-500 hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-lg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" d="M2 26h28v2H2zM25.4 9c.8-.8.8-2 0-2.8l-3.6-3.6c-.8-.8-2-.8-2.8 0l-15 15V24h6.4zm-5-5L24 7.6l-3 3L17.4 7zM6 22v-3.6l10-10l3.6 3.6l-10 10z"/></svg>
                        Edit
                    </a>
                </td>
            </tr>
            @empty
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-red-500">
                       There is no title
                    </th>
                    <td class="px-6 py-4 text-red-500 ">
                        There is no content
                    </td>
                    <td class="px-6 py-4 text-red-500">
                        There is no category
                    </td>
                    <td class="px-6 py-4 text-red-500">
                        There is no resource
                    </td>
                    <td class="px-6 py-4">

                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>
        <div class="px-40">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
