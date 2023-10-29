@extends('layouts.app')
@section('content')
    <div class="container mx-auto sm:px-4">
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="px-6 py-3 text-lg leading-normal text-left text-gray-600 bg-gray-200 ">
                    <th scope="col" class="px-6 py-3 ">Gebruikersnaam</th>
                    <th scope="col" class="px-6 py-3 ">Rol</th>

                    <th scope="col" class=" py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                    <tr
                        class="px-6 py-3 capitalize border-b border-gray-200 bg-gray-50 hover:bg-gray-100 {{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="px-6 py-3 ">{{ $user->name }}</td>
                        <td class="px-6 py-3 ">
                            @foreach ($user->roles as $role)
                                <span
                                    class="inline-block py-2 font-semibold leading-none text-left align-baseline rounded-full text-bg-secondary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td
                            class="mx-auto text-center bg-red-50 hover:bg-red-300 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <form method="get" action="{{ route('staff.delete', $user) }}">
                                @csrf

                                <input type="submit" value="Verwijder"
                                    class="px-2 py-1 font-semibold text-red-700 rounded hover:cursor-pointer hover:text-white border-red-500/10 ">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
        </ul>
    </div>
@endsection
