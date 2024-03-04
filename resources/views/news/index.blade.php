<x-app-layout>


    <div class="">
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
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
