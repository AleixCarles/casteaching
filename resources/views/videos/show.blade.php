<x-casteaching-layout>
    <div class="flex flex-col h-screen">
        <iframe
                class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5"
                src="https://www.youtube.com/embed/btGr3mPK1dU"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        <div class="p-4 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10">
           {{ $video->title }}
        </div>
        <div class="p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10">
           {{$video->description}}
        </div>
    </div>
</x-casteaching-layout>


