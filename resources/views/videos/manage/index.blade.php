<x-casteaching-layout>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->title }}</td>
                <td>{{ $video->description }}</td>
                <td>{{ $video->url }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</x-casteaching-layout>
