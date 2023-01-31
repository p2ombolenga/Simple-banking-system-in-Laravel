<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- Links --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen ">
            <header class="bg-gradient-to-r from-purple-600 to-purple-500 shadow">
                <div class="max-w-7xl p-6 lg:px-8 flex items-end justify-between">
                    <a href="/" class="flex items-end space-x-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <span class="text-xl md:text-2xl font-semibold">Kabiri</span>
                    </a>
                    <div class="flex items-center space-x-5">
                        @auth
                            <a href="" class="text-white flex items-center space-x-2">
                                <span class="hidden md:flex"></span>{{Auth::user()->username}}</span>
                            </a>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="flex items-center text-white space-x-1">
                                    <span class="">Logout</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-50" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <a href="/register" class="bg-purple-400 hover:bg-purple-300 px-5 py-2 rounded-md text-white font-semibold">
                                <span class="">Register</span>
                            </a>
                            <a href="/login" class="flex items-center text-white space-x-1">
                                <span class="">Login</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @endauth
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main class="w-full">
                {{ $slot }}
            </main>

        </div>
    </body>
</html>
