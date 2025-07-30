<x-app-layout>
    @section('title', 'Transfer')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <form action="{{ route('saveTransfer') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Enter email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Amount --}}
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount</label>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input
                        id="amount"
                        type="number"
                        name="amount"
                        min="1"
                        step="0.1"
                        placeholder="Enter amount to transfer"
                        value="{{ old('amount') }}"
                        required
                        autocomplete="amount"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('amount') border-red-500 @enderror"
                    >
                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div>
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Transfer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
