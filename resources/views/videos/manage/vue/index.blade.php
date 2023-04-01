<x-casteaching-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Videos') }}
        </h2>
    </x-slot>
    <div class="flex flex-col mt-10 " id="vueapp">
        <div class="mx-auto sm:px-6 lg:px-8 w-full max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <x-status></x-status>
                @can('videos_manage_create')
                    <div id="vueapp2">
                        <video-form></video-form>
                    </div>
                @endcan
                    <videos-list></videos-list>
            </div>
        </div>
    </div>
</x-casteaching-layout>
