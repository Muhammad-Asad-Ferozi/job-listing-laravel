<x-layout>
    <x-slot:heading>
        JOBS Listing
    </x-slot:heading>

    <form method="POST" action="/jobs" >
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please provide us given information.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input type="text" name="title" id="title"  placeholder="Job Name" ></x-form-input>
                        <x-form-error name="title"/>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="sal">Salary</x-form-label>
                        <x-form-input type="text" name="sal" id="sal"  placeholder="$ USD" ></x-form-input>
                        <x-form-error name="sal"/>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
    </form>


</x-layout>
