<x-layout>
    <x-slot:heading>
        JOB
    </x-slot:heading>

    <h1>{{ $jobs->title }}</h1>
    <p class="mb-4">This pays <strong>{{ $jobs->sal }}</strong> per year</p>
    @can('edit', $jobs)
        <a class=" rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-200 shadow-sm hover:bg-gary-200 hover:text-gary-800" href="/jobs/{{ $jobs->id }}/edit">Edit Job</a>
    @endcan
</x-layout>
