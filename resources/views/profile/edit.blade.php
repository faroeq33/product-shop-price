@extends('layouts.app')
@section('content')
    <ul class="shadow-lg">
        <form method="post" class="gap-4 p-6 md:w-1/3 pr-4 pl-4 " action="{{ route('profile.update', $user) }}">
            @csrf
            @method('put')
            <label for="name">Name
                <input type="text" name="name" value="{{ $user->name }}">
            </label>


            <label for="">Email
                <input type="text" name="email" value="{{ $user->email }}">
            </label>
            <input class="mt-4 capitalize inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" type="submit" value="Opslaan">
        </form>
    </ul>
@endsection
