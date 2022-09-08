<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .w-custom{
            width: 82rem;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-800">

<form action="{{ route('dhandahelu.store') }}" method="POST" class="flex justify-center mt-8">
    @csrf
    <div class="min-h-screen bg-grey-light font-sans flex flex-col space-y-6">
        <div class="w-custom bg-white rounded-md">
            <div class="mx-auto bg-blue-100 text-white rounded-t-md mb-2 border border-1 border-b-blue-300">
                <h3 class="text-2xl text-blue-700 text-center font-bold">
                    School President
                </h3>
            </div>
            <div class="w-custom mx-auto py-4 flex flex-row justify-evenly flex-wrap">
               @foreach($candidates as $candidate)
                    <label for="{{ $candidate->post }}">
                        <input type="radio" name="{{ $candidate->post }}" id="{{ $candidate->id }}" value="{{ $candidate->id }}">
                        <div id="president" class="bg-white rounded-lg shadow-md p-6 hover:cursor-pointer mb-8 hover:bg-blue-50 focus:outline-none focus:shadow-inner focus:bg-blue-50">
                            <div class="font-semibold text-blue-darker flex flex-col items-center">
                            <span>
                                <img src="{{ asset('storage/' . $candidate->avatar)  }}" alt="avatar" width="100" class="rounded-full">
                            </span>
                                <span class="text-2xl pt-4 text-blue-500">{{ $candidate->name }}</span>
                                <span class="text-blue-500 text-sm my-1">{{ $candidate->class }}</span>
                                <span class="text-blue-400 bg-blue-100 px-2 rounded-md my-1">Candidate Number {{ $candidate->candidate_number }}</span>
                            </div>
                        </div>
                    </label>
               @endforeach
            </div>
        </div>
        <div class="w-custom bg-white rounded-md">
            <div class="mx-auto bg-blue-100 text-white rounded-t-md mb-2 border border-1 border-b-blue-300">
                <h3 class="text-2xl text-blue-700 text-center font-bold items-center">
                    School Vice President - <span class="text-sm">A' Level</span>
                </h3>
            </div>
            <div class="w-custom mx-auto py-4 flex flex-row justify-evenly flex-wrap">
                <label for="president">
                    <input type="radio" name="president" id="president" value="test">
                    <div id="president" class="bg-white rounded-lg shadow-md p-6 hover:cursor-pointer mb-8 hover:bg-blue-50 focus:outline-none focus:shadow-inner focus:bg-blue-50">
                        <div class="font-semibold text-blue-darker flex flex-col items-center">
                            <span>
                                <img src="https://thispersondoesnotexist.com/image" alt="avatar" width="100" class="rounded-full">
                            </span>
                            <span class="text-2xl pt-4 text-blue-500">Ahmed Sunil</span>
                            <span class="text-blue-500 text-sm my-1">Grade 11</span>
                            <span class="text-blue-400 bg-blue-100 px-2 rounded-md my-1">Candidate Number 11</span>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <input type="submit" value="Submit" class="text-gray-50">
    </div>
</form>
</body>
</html>
