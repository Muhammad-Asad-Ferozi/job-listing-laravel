<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register" >
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>
                        <x-form-input required type="text" name="name"  ></x-form-input>
                        <x-form-error name="name"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input required type="email" name="email"   ></x-form-input>
                        <x-form-error name="email"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input required type="password" name="password"   ></x-form-input>
                        <x-form-error name="password"/>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm password</x-form-label>
                        <x-form-input required type="password" name="password_confirmation"  ></x-form-input>
                        <x-form-error name="password_confirmation"/>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class=" text-sm font-semibold leading-6 text-gray-900 mr-4 0 hover:text-gray-300">Cancel</a>
                <x-form-button type="submit">Register</x-form-button>
            </div>
    </form>


</x-layout>
