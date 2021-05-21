<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Total Balance') }} : {{\Illuminate\Support\Facades\Auth::user()->wallets()->sum('balance')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 style="margin: 20px;" class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('All your Transactions are here') }}
                </h2>

                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>Wallet Name</th>
                            <th>Amount</th>
                            <th>Wallet Old Balance</th>
                            <th>Wallet New Balance</th>
                            <th>Wallet Type</th>
                            <th>Created At</th>
                            <th>Total Balance</th>
                        </tr>
                        @foreach(\Illuminate\Support\Facades\Auth::user()->transactions->reverse() as $transaction)
                            <tr>
                                <td>{{$transaction->wallet_name}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->wallet_old_balance}}</td>
                                <td>{{$transaction->wallet_new_balance}}</td>
                                <td>{{$transaction->wallet_type}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td>{{$transaction->user_current_balance}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
