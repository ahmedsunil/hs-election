<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>


    </x-slot>

    <div class="py-12 px-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <form class="flex flex-col px-2" action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <label for="name">Name</label>
                        <input name="name" type="text">
                        <button type="submit" class="my-4 bg-gray-300 text-gray-600 py-2 px-4 rounded-md hover:bg-gray-400">Save</button>
                    </form>
                </div>
                <div>
                    @if($errors->any())
                        <div class="m-auto text-center">
                            <li class="text-red-500 list-none">
                                {{ $errors }}
                            </li>
                        </div>

                    @endif
                </div>
      </div>
        </div>
    </div>
</x-app-layout>
