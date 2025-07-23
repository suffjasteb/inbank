<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
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
                                          @php
                                          $transaction = auth()->user()->transactions()->latest()->first()    
                                          @endphp

                                          @if ($transaction) 
                                          <li>
                                            {{$transaction->type}}: Rp.{{$transaction->amount, 2}} on {{$transaction->created_at->format('y-m-d')}};
                                          </li>
                                          @else 
                                          <li>
                                            Belum ada transaksi nih xD
                                          </li>
                                          @endif
                                        </ul>
                    </div>

</x-app-layout>
