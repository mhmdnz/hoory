
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Wallet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="p-6 bg-white border-b border-gray-200" style="color: tomato">
                    You should have at least one wallet to be able to work with panel !!!!!
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
                style="background-color: gainsboro;margin: auto;margin-top: 20px;">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('wallet.add.create') }}">
                    @csrf

                    <!-- Email Address -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input style="text-align: center;height: 35px;" id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div>
                            <x-label for="number" :value="__('Number')" />

                            <x-input style="text-align: center;height: 35px;" id="number" class="block mt-1 w-full" name="number" :value="old('number')" required autofocus />
                        </div>
                        <div>
                            <x-label for="type" :value="__('Type')" />

                            <x-input style="text-align: center;height: 35px;" id="type" class="block mt-1 w-full" name="type" :value="old('type')" required autofocus />
                        </div>
                        <x-button style="margin-top: 5px;" class="ml-3">
                            {{ __('Save') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
