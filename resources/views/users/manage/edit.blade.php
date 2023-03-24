<x-casteaching-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name }}
        </h2>
    </x-slot>
    <div class="flex flex-col mt-10">
        <div class="mx-auto sm:px-6 lg:px-8 w-full max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                @can('users_manage_create')
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="p-4">
                                <div class="md:grid md:grid-cols-3 md:gap-6 bg-white md:bg-transparent">
                                    <div class="md:col-span-1">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Users</h3>
                                            <p class="mt-1 text-sm text-gray-600">Basic user information</p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:col-span-2 md:mt-0">
                                        <form data-qa="form_user_edit" action="#" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                                    <div>
                                                        <label for="title"
                                                               class="block text-sm font-medium text-gray-700">Name</label>
                                                        <div class="mt-1">
                                                            <input required id="title" name="title" type="text"
                                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                                                   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 " value="{{ $user->name }}">
                                                        </div>
                                                        <p class="mt-2 text-sm text-gray-500">Name user.</p>
                                                    </div>
                                                    <div>
                                                        <label for="description"
                                                               class="block text-sm font-medium text-gray-700">Email</label>
                                                        <div class="mt-1">
                                                    <textarea required id="description" name="description" rows="3"
                                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $user->email }}</textarea>
                                                        </div>
                                                        <p class="mt-2 text-sm text-gray-500">Email for the user</p>
                                                    </div>

                                                    <div class="grid grid-cols-3 gap-6">
                                                        <div class="col-span-3 sm:col-span-2">
                                                            <label type="password"
                                                                   class="block text-sm font-medium text-gray-700">Password</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                <input required id="password" name="password" type="password"
                                                                       class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                                       value="{{ $user->password }}">
                                                            </div>
                                                            <p class="mt-2 text-sm text-gray-500">User password.</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                                    <button type="submit"
                                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                        Edit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-casteaching-layout>
