<x-layout>
    <x-slot:heading>
        Welcome {{ $user->name }}
    </x-slot:heading>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z" />
                </svg>
            </span>
        </div>
    @endif


    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z" />
                </svg>
            </span>
        </div>
    @endif


    <!-- Change Profile Picture Section -->
    @if (isset($user->profile_picture))
        <div class="flex justify-center">
            <img src="{{  Storage::url($user->profile_picture) }}" alt="Profile Picture" class="h-1/3 w-1/3 rounded-full">
        </div>
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Change Profile Picture</h2>
            <form method="POST" action="/user/updateImg" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mt-6 flex items-center gap-x-6">
                    <x-form-field>
                        <x-form-label for="picture">Profile Picture</x-form-label>
                        <x-form-input type="file" name="picture" accept="image/*"></x-form-input>
                        <x-form-error name="picture" />
                    </x-form-field>
                    <x-form-button type="submit">Change Profile Picture</x-form-button>
                </div>
            </form>
        </div>
    @else

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Add Profile Picture</h2>
            <form method="POST" action="/user/updateImg" enctype="multipart/form-data">
                @csrf
                <div class="mt-6 flex items-center gap-x-6">
                    <x-form-field>
                        <x-form-label for="picture">Profile Picture</x-form-label>
                        <x-form-input type="file" name="picture" accept="image/*"></x-form-input>
                        <x-form-error name="picture" />
                    </x-form-field>
                    <x-form-button type="submit">Add Profile Picture</x-form-button>
                </div>
            </form>
        </div>

    @endif

    <!-- Change Name Section -->
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Change Name</h2>
        <form method="POST" action="/user/changeName">
            @csrf
            @method('PATCH')
            <div class="mt-6 flex items-center gap-x-6">
                <x-form-field>
                    <x-form-label for="name">Name</x-form-label>
                    <x-form-input required type="text" name="name" value="{{ $user->name }}"></x-form-input>
                    <x-form-error name="name" />
                </x-form-field>
                <x-form-button type="submit">Change Name</x-form-button>
            </div>
        </form>
    </div>

    <!-- Change Password Section -->
    <div class="border-b border-gray-900/10 pb-12 mt-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Change Password</h2>
        <form method="POST" action="/user/changePassword">
            @csrf
            @method('PATCH')
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form-field>
                    <x-form-label for="current_password">Current Password</x-form-label>
                    <x-form-input required type="password" name="current_password"></x-form-input>
                    <x-form-error name="current_password" />
                </x-form-field>
                <x-form-field>
                    <x-form-label for="password">New Password</x-form-label>
                    <x-form-input required type="password" name="password"></x-form-input>
                    <x-form-error name="password" />
                </x-form-field>
                <x-form-field>
                    <x-form-label for="password_confirmation">Confirm New Password</x-form-label>
                    <x-form-input required type="password" name="password_confirmation"></x-form-input>
                    <x-form-error name="password_confirmation" />
                </x-form-field>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-form-button type="submit">Change Password</x-form-button>
            </div>
        </form>
    </div>
    <div class="border-b border-gray-900/10 pb-12 mt-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Employer Section</h2>


        <div class="mt-6">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">
                Company Name:
            </h3>
            @if (isset($user->employer->name))
                <p>{{ $user->employer->name }}</p>
                <form method="POST" action="/user/employer">
                    @csrf
                    @method('PATCH')
                    <div class="mt-6 flex items-center gap-x-6">
                        <x-form-field>
                            <x-form-label for="name">Change Company Name</x-form-label>
                            <x-form-input required type="text" name="name"
                                value="{{ $user->employer->name }}"></x-form-input>
                            <x-form-error name="name" />
                        </x-form-field>

                        <x-form-button type="submit">Change Company Name</x-form-button>
                    </div>
                </form>
            @else
                <p>Enter the name of your company</p>
                <form method="POST" action="/user/employer">
                    @csrf

                    <div class="mt-6 flex items-center gap-x-6">
                        <x-form-field>
                            <x-form-label for="name">Enter Company Name</x-form-label>
                            <x-form-input required type="text" name="name"
                                placeholder="Company Name"></x-form-input>
                            <x-form-error name="name" />
                        </x-form-field>

                        <x-form-button type="submit">Add Company Name</x-form-button>
                    </div>
                </form>
            @endif

        </div>


    </div>

</x-layout>
