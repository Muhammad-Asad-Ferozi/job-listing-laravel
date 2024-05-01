<x-layout>
    <x-slot:heading>
        EDIT Listing
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $jobs->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit the Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please provide us updated information.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input type="text" name="title" id="title" value="{{ $jobs->title }}" placeholder="Job Name" ></x-form-input>
                        <x-form-error name="title"/>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="sal">Salary</x-form-label>
                        <x-form-input type="text" name="sal" id="sal" value="{{ $jobs->sal }}" placeholder="$ USD" ></x-form-input>
                        <x-form-error name="sal"/>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div>
                    <button type="submit" form="delete-form"
                        class="border border-red-500 rounded-md bg-white px-3 py-2 text-sm font-semibold text-red-500 shadow-sm hover:bg-red-500 hover:text-white ">Delete</button>
                </div>
                <div>
                    <a href="/jobs/{{ $jobs->id }}" class=" text-sm font-semibold leading-6 text-gray-900 mr-4 0 hover:text-gray-300">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>

                </div>
            </div>

        </div>
    </form>
    <form method="POST" action="/jobs/{{ $jobs->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
