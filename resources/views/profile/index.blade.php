@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center h-full">
        <ul class="shadow-lg">
            <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="" class="h-4"
                style="height: 300px; width:300px;">

            <div class="p-4 description-wrapper">
                <a href="{{ route('profile.edit', $user) }}" class="underline">Wijzig profiel</a>
                <ul style="list-style-type: none; padding: 0;">
                    <li> name: {{ $user->name }} </li>
                    <li> email: {{ $user->email }} </li>
                </ul>
            </div>

        </ul>
    </div>
@endsection
