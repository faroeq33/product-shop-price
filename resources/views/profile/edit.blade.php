@extends('layouts.app')
@section('content')
    <ul class="shadow-lg">
        <form method="post" class="gap-4 p-4 col-md-4 " action="{{ route('profile.update', $user) }}">
            @csrf
            @method('put')
            <label for="name">Name
                <input type="text" name="name" value="{{ $user->name }}">
            </label>


            <label for="">Email
                <input type="text" name="email" value="{{ $user->email }}">
            </label>
            <input class="mt-4 capitalize btn btn-primary" type="submit" value="Opslaan">
        </form>
    </ul>
@endsection
