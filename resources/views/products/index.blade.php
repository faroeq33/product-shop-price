@extends('app')
@section('content')

<!-- component -->
<script src="//cdnjs.cloudflare.com/ajax/libs/ramda/0.25.0/ramda.min.js"></script>

<div class="grid gap-4 overflow-x-auto">
    <div class="flex items-center justify-center flex-1 px-2 lg:ml-6">
        <form method="POST" action="/products/">
            @csrf
            <!---->
            <div class="w-full max-w-lg mt-4 lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="myInput" name="search"
                        class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        type="search" onkeyup="myFunction()" placeholder=" Filter product...">
                </div>

                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>



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
    <div class="flex items-center justify-center min-h-screen overflow-hidden font-sans bg-gray-100 min-w-screen">
        <div class="w-full lg:w-5/6">
            <div class="my-6 bg-white rounded shadow-md">
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-center text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 ">Product</th>
                            <th class="px-6 py-3 ">Status</th>
                            <th class="px-6 py-3 ">Price</th>
                            <th class="px-6 py-3 "></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">

                        @foreach ($data as $item)
                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 product__model">
                            {{-- productname --}}
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <img class="w-6 h-6 rounded-full"
                                            src="https://randomuser.me/api/portraits/women/2.jpg" />
                                    </div>
                                    <span>{{$item->name}} </span>
                                </div>
                            </td>
                            {{-- productname end --}}

                            {{-- status --}}
                            <td class="px-6 py-3 text-center">
                                <span
                                    class="px-3 py-1 text-xs text-green-600 bg-green-200 rounded-full">Completed</span>
                            </td>
                            {{-- status --}}

                            <td class="px-6 py-3 text-center">
                                <span class="px-3 py-1"> &euro; {{$item->price}}</span>
                            </td>

                            {{-- product actions --}}
                            <td class="px-6 py-3 text-center">
                                <div class="flex justify-center item-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            {{-- product actions --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- code om clientside de producten te filteren --}}
<script>
    "use-strict"

function myFunction() {
  const rawProducts = document.querySelectorAll(".product__model")

  const input = document
    .getElementById("myInput")
    .value
    .toUpperCase();

  const isMatch = (element) => {
    return element
      .innerText
      .toUpperCase()
      .indexOf(input) > -1;
  }

  // following lines show matched inputs of products
  const showMatchedProducts = R.pipe(
    R.filter(isMatch),
    R.forEach(
      x => x.parentElement.style.display = ""
    )
  )

  // following lines hide mismatched inputs of products
  const hideMisMatchedProducts = R.pipe(
    R.reject(isMatch),
    R.forEach(
      x => x.parentElement.style.display = "none"
    )
  )

  // Side Effects below...
  showMatchedProducts(rawProducts)
  hideMisMatchedProducts(rawProducts)
};
</script>
@endsection