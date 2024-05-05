<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{  asset('storage/LogoFerozi.png') }}">
    <title>Job Listing</title>
    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-navy">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/">
                        <img class="h-12 w-12" src="{{  asset('storage/LogoFerozi.png') }}"
                            alt="Your Company"> </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-3">
                            <x-nav-layout href="/" :active="request()->is('/')">Home</x-nav-layout>
                            <x-nav-layout href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-layout>
                            <x-nav-layout href="/contact" :active="request()->is('contact')">Contact</x-nav-layout>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6 space-x-3">
                        @guest
                            <x-nav-layout href="/register" :active="request()->is('register')">Register</x-nav-layout>
                            <x-nav-layout href="/login" :active="request()->is('login')">Login</x-nav-layout>
                        @endguest
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="text-navy bg-cream hover:text-cream hover:bg-navy px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                                <!-- <x-nav-layout href="/user" :active="request()->is('user')">Profile</x-nav-layout> -->
                            </form>

                                @if (isset(Auth::user()->profile_picture))

                                        <a href="/user"><img src="{{ Storage::url(Auth::user()->profile_picture) }}"
                                        alt="profile picture" class="h-8 w-8 rounded-full"></a>

                                @else

                                        <a href="/user"><img src="{{  asset('storage/profile_pictures/default_picture.png') }}"
                                        alt="profile picture" class="h-8 w-8 rounded-full"></a>

                                @endif


                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-navy">{{ $heading }}</h1>
            <a href="/jobs/create/"
                class="mt-4 rounded-md bg-cream px-3 py-2 text-sm font-semibold text-navy hover:bg-navy hover:text-cream shadow-sm group">
                Create Job
            </a>

        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow bg-gary-200">
        <div class="container mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-navy mt-auto">
        <div class="container mx-auto max-w-7xl px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex justify-around items-center">

                <div class="text-sm text-gray-300 ">
                    CopyRight &copy; 2024 by <a class="plain" target="_blank"
                    href="https://github.com/Muhammad-Asad-Ferozi">Ferozi</a>. All Rights Reserved.
                </div>
                <div class="flex-shrink-0">
                    <a class="plain" target="_blank" href="https://github.com/Muhammad-Asad-Ferozi">
                    <img class="h-16 w-16" src="{{  asset('storage/LogoFerozi.png') }}"
                        alt="Your Company"></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
