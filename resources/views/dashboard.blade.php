<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-white">
                <h1 class="text-2xl font-bold mb-4">Welcome to INBANK</h1>
                <p class="mb-4">This is your dashboard where you can manage your banking activities.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold mb-2">Account Balance</h2>
                        <p class="text-xl font-bold">${{ number_format(Auth::user()->balance, 2) }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold mb-2">Recent Transactions</h2>
                        <ul>
                            @foreach(Auth::user()->transactions()->latest()->take(5)->get() as $transaction)
                                <li class="mb-2">{{ $transaction->type }}: ${{ number_format($transaction->amount, 2) }} on {{ $transaction->created_at->format('Y-m-d') }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold mb-2">Quick Actions</h2>
                        <ul>
                            <li><a href="{{ route('topup') }}" class="text-blue-500 hover:underline">Top Up</a></li>
                            <li><a href="{{ route('transfer') }}" class="text-blue-500 hover:underline">Transfer Funds</a></li>
                            <li><a href="{{ route('withdraw') }}" class="text-blue-500 hover:underline">Withdraw Funds</a></li>
                        </ul>
                    </div> --}}
    
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-white">
                                <h1 class="text-2xl font-bold mb-4">Hei, <?= Auth()->user()->name ?> Welcome to INBANK</h1>
                                <p class="mb-4">This is your dashboard where you can manage your banking activities.</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                                        <h2 class="text-lg font-semibold mb-2">Account Balance</h2>
                                        <p class="text-xl font-bold">Rp.{{number_format(Auth()->user()->balance, 2)}}</p>
                                    </div>
                                    <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                                        <h2 class="text-lg font-semibold mb-2" >Last Transaction</h2>
                                        <ul>
                                            @foreach(Auth()->user()->transactions()->latest()->get() as $transaction)
                                            <li class="mb-2">{{ $transaction->type }}: Rp.{{ number_format($transaction->amount, 2) }} on {{ $transaction->created_at->format('Y-m-d') }}</li>
                                            @endforeach
                                        </ul>
                    </div>

</x-app-layout>
