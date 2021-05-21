<style>
    .button {
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #008CBA;
    }

    .button2:hover {
        background-color: #008CBA;
        color: white;
    }

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
{{--@php--}}
{{--    die(json_encode(\Illuminate\Support\Facades\Auth::user()->wallets));--}}
{{--@endphp--}}
{{--{{ die('injas') }}--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wallets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('wallet.add.show') }}">
                    <button class="button button2">Add Wallet</button>
                </a>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Type</th>
                        <th>Balance</th>
                        <th>Action</th>
                    </tr>
                        @foreach(\Illuminate\Support\Facades\Auth::user()->wallets as $wallet)
                            <tr>
                                <td>{{$wallet->name}}</td>
                                <td>{{$wallet->number}}</td>
                                <td>{{$wallet->type}}</td>
                                <td>{{$wallet->balance}}</td>
                                <td><a style="color: #008CBA" href="{{ route('wallet.balance',['wallet' => $wallet]) }}">Change Balance</a></td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
