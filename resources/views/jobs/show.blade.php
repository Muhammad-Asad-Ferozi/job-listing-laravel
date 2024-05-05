<x-layout>
    <x-slot:heading>
        JOB
    </x-slot:heading>

    <div class="bg-white shadow-md rounded-md p-6 mb-6">
        <h1 class="text-2xl font-bold text-navy mb-4">{{ $jobs->title }}</h1>
        <p class="text-gray-700 mb-2">
            <strong>Salary:</strong> {{ $jobs->sal }} per year
        </p>
        <p class="text-gray-700 mb-4">
            <strong>Description:</strong> {{ $jobs->description }}
        </p>

        @can('edit', $jobs)
            <a class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-200 shadow-sm hover:bg-gray-200 hover:text-gray-800"
               href="/jobs/{{ $jobs->id }}/edit">
                Edit Job
            </a>
        @endcan
    </div>
</x-layout>
