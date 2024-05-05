<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>

    <!-- Hero Section -->
    <section class="bg-cream py-12">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-navy">Welcome to Job Listing</h2>
            <p class="mt-4 text-gray-700">Find your dream job with us!</p>
            <a href="/jobs" class="mt-8 inline-block rounded-md bg-navy px-4 py-2 text-white hover:bg-gray-700 hover:text-cream">
                View Jobs
            </a>
        </div>
    </section>

    <!-- Latest Jobs Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-navy mb-6">Latest Jobs</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card -->
                @foreach($latestJobs as $job)
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-navy">{{ $job->title }}</h3>
                    <p class="mt-2 text-gray-600">{{ $job->description }}</p>
                    <a href="/jobs/{{ $job->id }}" class="mt-4 inline-block text-sm text-navy hover:underline">
                        View Job
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-cream py-12">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-navy mb-6">About Us</h2>
            <p class="text-gray-700">
                Welcome to Job Listing, your go-to platform for finding the best job opportunities. Our mission is to connect
                talented individuals with top companies worldwide. Whether you're looking for a new career or aiming to
                enhance your professional skills, we're here to help.
            </p>
        </div>
    </section>

</x-layout>
