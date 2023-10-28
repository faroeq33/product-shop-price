@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
@endsection

@section('content')

    {{--  --}}
    <!-- component -->
    <div class="grid gap-4 overflow-x-auto" x-data="{ searchOpen: false }">
        <div class="flex justify-center flex-1 px-2 lg:ml-6">

            <form method="get" action="/search" class="">
                @csrf
                <!---->
                <div class="flex w-full max-w-lg mt-4 lg:max-w-md">
                    <label for="search" class="sr-only">Search</label>
                    <input id="myInput" name="search"
                        class="block w-full rounded-md border-0 bg-white py-1.5 px-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        type="search" placeholder="Zoek producten">

                    {{-- the dropdown menu --}}
                    <div class="relative inline-block text-left">
                        <div @click="searchOpen = !searchOpen"
                            class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            Selecteer Categorie
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        {{-- Na het klikken worden de filter opeties laten zien dmv searchopen --}}
                        <div x-show="searchOpen"
                            class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="p-2 py-2" role="menu" aria-orientation="vertical"
                                aria-labelledby="dropdown-button">
                                {{-- haal mogelijke categorien op --}}
                                @foreach ($categories as $category)
                                    <ul>
                                        <li> <input type="checkbox" name="tags[]"
                                                class="px-4 py-2 mb-1 text-sm text-gray-700 bg-white rounded-md hover:bg-gray-100"
                                                role="menuitem" value="{{ $category->name }}" id="tag-{{ $category->id }}">
                                            {{ $category->name }}</input>

                                        <li>
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- the dropdown menu --}}
                    <button type="submit"
                        class="ml-4 rounded-md bg-indigo-600 px-3.5  text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
                </div>
            </form>
        </div>
        <div class="flex items-center lg:hidden">
            <!-- Mobile menu button -->
            <button type="button"
                class="relative inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!--
                                                                                                        Icon when menu is closed.

                                                                                                        Menu open: "hidden", Menu closed: "block"
                                                                                                      -->
                <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                                                                                                        Icon when menu is open.

                                                                                                        Menu open: "block", Menu closed: "hidden"
                                                                                                      -->
                <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-center min-h-screen overflow-hidden font-sans bg-gray-100 min-w-screen">
            <div class="w-full lg:w-5/6">
                <div class="my-6 bg-white rounded shadow-md">
                    <table class="w-full table-auto min-w-max">
                        @if (session('success'))
                            <tr class="shadow-inner">
                                <td class="p-4 bg-green-200" colspan="100%">
                                    Product
                                    <span class="font-bold capitalize">
                                        {{ session('success_message') }}
                                    </span>
                                    is gewijzigd
                                </td>
                            </tr>
                        @endif
                        <thead>
                            <tr class="text-lg leading-normal text-left text-gray-600 bg-gray-200 ">
                                <th class="px-6 py-3 ">Product</th>

                                {{-- Check if user is logged in then they can see the status --}}
                                @if (Auth::check())
                                <th class="px-6 py-3 ">Status</th>
                                @endif
                                <th class="px-6 py-3 ">Prijs</th>
                                <th class="px-6 py-3 ">Categorie</th>
                                <th class="px-6 py-3 "></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-light text-gray-600">
                            @forelse ($data as $item)
                                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                    {{-- productname --}}
                                    <td class="px-6 py-3">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class="w-6 h-6 rounded-full"
                                                    src="https://randomuser.me/api/portraits/women/2.jpg" />
                                            </div>
                                            <span>{{ $item->name }} </span>
                                        </div>
                                    </td>
                                    {{-- productname end --}}


                                {{-- Check if user is logged in then they can see the status --}}
                                @if (Auth::check())
                                    {{-- status ajax --}}
                                    <td class="px-6 py-3">
                                        <div class="switch" data-product="{{ $item }}">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="status" value="1" class="sr-only peer"
                                                    {{ $item->status == '1' ? 'checked' : '' }}>
                                                <div
                                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>

                                            </label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        </div>
                                    </td>
                                    {{-- status ajax --}}
                                @endif


                                    {{-- price --}}
                                    <td class="px-6 py-3 ">
                                        <span class="px-3 py-1"> &euro; {{ $item->price }}</span>
                                    </td>
                                    {{-- price --}}

                                    {{-- Category --}}
                                    <td class="px-6 py-3 ">
                                        @foreach ($item->categories as $category)
                                            <span class="px-3 py-1 text-xs text-blue-800 bg-blue-200 rounded-lg">
                                                {{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    {{-- Category --}}

                                    {{-- product actions --}}
                                    <td class="px-6 py-3 ">
                                        <div class="flex justify-center item-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- product actions --}}
                                </tr>
                            @empty
                                <tr class="m-4 text-center border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                    <td colspan="4">No items found... </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{-- script voor schakelen (switch) van de status --}}
    <script>
        $(function() {
            $('.switch').change(function() {
                // Haal data attribuut op uit de formulier
                const product = $(this).data('product');

                // Hack om ervoor te zorgen dat hij de veranderde status meegeeft
                product.status = product.status == true ? 0 : 1;

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    url: '/updatestatus',
                    data: {
                        'product': product
                    },
                    //    success: function(data){ console.log(data.success) },
                    error: function(data) {
                        console.log(data.error)
                    }
                });


            })
        });
    </script>
    {{-- script voor schakelen van de status --}}
@endsection
