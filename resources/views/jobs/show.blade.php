<x-layout>
    <x-slot:heading>
        JOB
    </x-slot:heading>

    <h1>{{ $jobs->title }}</h1>
    <p>This pays <strong>{{ $jobs->sal }}</strong> per year</p>
    <x-button class="mt-5" href="/jobs/{{ $jobs->id }}/edit">Edit Job</x-button>
</x-layout>
