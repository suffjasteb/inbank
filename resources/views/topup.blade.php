<x-app-layout>
    @section('title', 'Deposit')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
            <form method="POST" action="{{ route('saveDeposit') }}">
                @csrf

                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount (Rp)</label>
                    <input type="number" name="amount" id="amount" min="10000" required
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-white dark:border-gray-700" />
                    @error('amount')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
    class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500 transition">
    Top Up
</button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
