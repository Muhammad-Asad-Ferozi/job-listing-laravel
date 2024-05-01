<x-layout>
    <x-slot:heading>
        JOBS Listing
    </x-slot:heading>

    <div class="space-y-3">
        @foreach ($jobs as $j)
                <div>{{ $j->employer->name }}</div>
                <a href="/jobs/{{ $j['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg"><strong>{{ $j['title'] }}</strong> This pays <strong>{{ $j['sal'] }}</strong> per year</a>

        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout>
