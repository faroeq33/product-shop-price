@extends('layouts.app')
@section('content')
    <div class="container">
        @include('flash-message')

        <p class="test-warning">
            Weet je zeker dat je <b>{{ $user->name }} </b> wilt verwijderen?
        </p>
        <form method="post" action="{{ route('staff.destroy', $user->id) }}">
            @method('DELETE')
            @csrf
            <input type="submit" value="Verwijder">
        </form>
    </div>
@endsection
