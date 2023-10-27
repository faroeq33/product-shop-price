@extends('layouts.app')
@section('content')
    <div class="container mx-auto sm:px-4">
        @include('flash-message')

        <p class="test-warning">
            Weet je zeker dat je <b>{{ $user->name }} </b> wilt verwijderen?
        </p>
        <form method="post" action="{{ route('staff.destroy', $user->id) }}">
            @method('DELETE')
            @csrf

            <input type="submit" value="{{ $user->name }} definitief verwijderen"
                class="px-2 py-1 font-semibold text-red-700 bg-red-100 rounded hover:cursor-pointer hover:text-white border-red-500/30 ">
        </form </div>
    @endsection
