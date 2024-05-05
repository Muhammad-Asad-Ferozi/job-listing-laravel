<x-layout>
    <x-slot:heading>
        Contact Us
    </x-slot:heading>

    <!-- Contact Information -->
    <div class="bg-white shadow-md rounded-md p-6">
        <h2 class="text-2xl font-bold tracking-tight text-navy mb-4">Get in Touch</h2>
        <p class="text-gray-700">We'd love to hear from you! Reach out to us using the form below or via the provided contact details.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-navy mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.3 0C1 0 .1.9.1 2.3l.2 4.7c0 .5.3 1 .8 1.2l4.7 1.8c.5.2 1.2.2 1.6-.3l1.7-1.7 1 1c-3.5 5-8.2 8.5-11.2 10.5-.4.3-.7.7-.6 1.2l.7 2.7c.2.8 1.1 1.3 1.9 1l4.7-1.8c.5-.2 1-.7 1.2-1.2l1.8-4.7c.2-.5.2-1.2-.3-1.6l-1.7-1.7 1-1c.5-.5.5-1.1.3-1.6L9 3c-.5-.5-1.1-.5-1.6-.3L3 4.6c-.5.2-.9.8-.8 1.4L4.2 9c.2.6.5 1.1 1 1.4l3 2.4c.5.3 1.1.3 1.6-.3l1-1c.5-.5.7-1.1.5-1.6l-1.2-2.5c-.2-.5-.7-1.1-1.2-1.4L6.4.5c-.5-.3-1.2-.2-1.6.3L2.3 2.5c-.3.3-.3.7-.2 1z"/>
                </svg>
                <p class="text-gray-700">+123 456 789</p>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-navy mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.5 1.75c0-1.4 1.3-2.75 2.75-2.75h10.5c1.4 0 2.75 1.3 2.75 2.75v16.5c0 1.4-1.3 2.75-2.75 2.75h-10.5c-1.4 0-2.75-1.3-2.75-2.75V1.75zm13.5 0c0-.4-.3-.75-.75-.75H4.75c-.4 0-.75.3-.75.75v16.5c0 .4.3.75.75.75h10.5c.4 0 .75-.3.75-.75V1.75zm-8.5 5.75c.4 0 .75-.3.75-.75s-.3-.75-.75-.75-.75.3-.75.75.3.75.75.75zm0 3c.4 0 .75-.3.75-.75s-.3-.75-.75-.75-.75.3-.75.75.3.75.75.75zm0 3c.4 0 .75-.3.75-.75s-.3-.75-.75-.75-.75.3-.75.75.3.75.75.75z"/>
                </svg>
                <a class="plain" target="_blank"
                        href="https://github.com/Muhammad-Asad-Ferozi">info@ferozi.com</a>
            </div>
        </div>
    </div>

     <!-- Contact Form -->
     <div class="mt-8 bg-white shadow-md rounded-md p-6">
        <h2 class="text-2xl font-bold tracking-tight text-navy mb-4">Contact Form</h2>
        <form method="GET" action="/">
            @csrf
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-form-field>
                    <x-form-label for="name">Name</x-form-label>
                    <x-form-input type="text" name="name" id="name" required></x-form-input>
                    <x-form-error name="name"/>
                </x-form-field>
                <x-form-field>
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input type="email" name="email" id="email" required></x-form-input>
                    <x-form-error name="email"/>
                </x-form-field>
                <x-form-field class="sm:col-span-2">
                    <x-form-label for="message">Message</x-form-label>
                    <x-form-textarea name="message" id="message" rows="4" required></x-form-textarea>
                    <x-form-error name="message"/>
                </x-form-field>
            </div>
            <div class="mt-6 flex justify-end">
                <x-form-button type="submit">Send Message</x-form-button>
            </div>
        </form>
    </div>

</x-layout>
