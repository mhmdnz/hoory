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
            {{ __('Current Balance') }} : {{ $wallet->balance }}
            <br>
            {{ __('Wallet Type') }} : {{ $wallet->type }}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
                 style="background-color: gainsboro;margin: auto;margin-top: 20px;">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('transaction.new', ['wallet' => $wallet]) }}">
                    @csrf

                    <div>
                        <x-label for="amount" :value="__('Amount')" />
                        <p style="color: #008CBA"> you could use mines amounts as well as positive like : -2000 | 2000 </p>

                        <x-input style="text-align: center;height: 35px;" id="amount" class="block mt-1 w-full" name="amount" :value="old('amount')" required autofocus />
                    </div>

                    <x-button style="margin-top: 5px;" class="ml-3">
                        {{ __('Add') }}
                    </x-button>
                </form>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <table>
                    <tr>
                        <th>Amount</th>
                        <th>Wallet Old Balance</th>
                        <th>Wallet New Balance</th>
                        <th>Created At</th>
                    </tr>
                    @foreach($wallet->transactions->reverse() as $transaction)
                        <tr>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->wallet_old_balance}}</td>
                            <td>{{$transaction->wallet_new_balance}}</td>
                            <td>{{$transaction->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
