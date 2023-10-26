@extends('layouts.app')
@section('content')
    <div class="container">

        <table class="table table-striped table-bordered w-50">
            <thead>
                <tr>
                    <th scope="col">Gebruikersnaam</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                    <tr>
                        <td class="text-capitalize">{{ $user->name }}</td>
                        <td class=" text-capitalize">
                            @foreach ($user->roles as $role)
                                <span class="text-bg-secondary badge rounded-pill">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td><a href="/delete-user" style="color:darkred">Verwijder</a></td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <ul>
        </ul>
    </div>
@endsection
