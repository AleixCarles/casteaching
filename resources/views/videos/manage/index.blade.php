<x-casteaching-layout>

    <div class="mt-8 flow-root">
        @can('videos_manage_create')
            <form data-qa="form_video_create" action="" method="POST">
                <label for="title">Title</label>
                <input id="title" name="title" type="text">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <label for="url">URL</label>
                <input id="url" name="url" type="text">
                <button>Crear</button>
            </form>
        @endcan

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Videos</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Id
                        </th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Title</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Description
                        </th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">URL</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($videos as $video)

                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                {{ $video->id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $video->title }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $video->description }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $video->url }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="/videos/{{ $video->id }}" target="_blank"
                                   class="text-indigo-600 hover:text-indigo-900">Show</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-casteaching-layout>
