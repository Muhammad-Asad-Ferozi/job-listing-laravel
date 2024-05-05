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
                    <x-form-field  class="sm:col-span-2">
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input type="text" name="title" id="title"  placeholder="Job Name" ></x-form-input>
                        <x-form-error name="title"/>
                    </x-form-field>
                    <x-form-field  class="sm:col-span-2">
                        <x-form-label for="sal">Salary</x-form-label>
                        <x-form-input type="text" name="sal" id="sal"  placeholder="$ USD" ></x-form-input>
                        <x-form-error name="sal"/>
                    </x-form-field>
                    <x-form-field class="sm:col-span-2">
                        <x-form-label for="description">Description</x-form-label>
                        <x-form-textarea name="description" id="description" rows="4" required></x-form-textarea>
                        <x-form-error name="description"/>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs" class=" text-sm font-semibold leading-6 text-gray-900 mr-4 0 hover:text-gray-300">Cancel</a>
                <x-form-button type="submit">Save</x-form-button>
            </div>
    </form>


</x-layout>
