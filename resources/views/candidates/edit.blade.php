<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Candidate') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <form class="flex flex-col px-2" action="{{ route('candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col space-y-2">
                            <label for="name">Name</label>
                            <input name="name" type="text" value="{{ $candidate->name }}">
                            <label for="class">Class</label>
                            <input name="class" type="text" value="{{ $candidate->class }}">
                            <label for="level">Level</label>
                            <input name="level" type="text" value="{{ $candidate->level }}">
                            <label for="candidate_number">Candidate Number</label>
                            <input name="candidate_number" type="text" value="{{ $candidate->candidate_number }}">
                            <label for="house">House</label>
                            <input name="house" type="text" value="{{ $candidate->house }}">
                            <label for="post">Post</label>
                            <input name="post" type="text" value="{{ $candidate->post }}">
                            <label for="post_label">Post Label</label>
                            <input name="post_label" type="text" value="{{ $candidate->post_label }}">
                            <label for="avatar">Avatar</label>
                            <input name="avatar" type="file">
                        </div>
                        <button type="submit" class="my-4 bg-gray-300 text-gray-600 py-2 px-4 rounded-md hover:bg-gray-400">Save</button>
                    </form>
                </div>
                <div>
                    @if($errors->any())
                        <div class="m-auto text-center">
                            <li class="text-red-500 list-none ">
                                {{ $errors }}
                            </li>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
