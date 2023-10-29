@extends('layouts.app')
@section('content')
    @php
        $wrapperClass = 'py-2';
    @endphp
    <form method="post" class="gap-4 p-6 pl-4 pr-4 text-gray-800 md:w-1/3 " action="{{ route('products.store') }}">
        @csrf

        <div class="{{ $wrapperClass }} ">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 ">Productnaam</label>
            <input type="text" name="name" id="base-input"
                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="{{ old('name') }}">
        </div>

        <div class="{{ $wrapperClass }} ">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Beschrijving</label>
            <textarea type="text" name="description" id="description"
                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">{{ old('description') }}</textarea>
        </div>

        <div class="{{ $wrapperClass }} ">

            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                <input type="checkbox" name="status" class="sr-only peer" value="{{ old('description') ?? 0 }}">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-red-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium ">Status</span>
            </label>

        </div>

        <div class="{{ $wrapperClass }} ">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Prijs</label>
            <input type="number" id="price" name="price"
                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="{{ old('price') }}">
        </div>



        <input
            class="inline-block px-3 py-1 mt-4 font-normal leading-normal text-center text-white no-underline capitalize whitespace-no-wrap align-middle bg-blue-600 border rounded select-none hover:bg-blue-600"
            type="submit" value="Opslaan"> {{-- maak de volgende velden aan:
            - Name
            - Description
            - Price
            - Status
            --}}

    </form>
@endsection
