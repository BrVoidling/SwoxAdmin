@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <input name="email">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <input name="password" type="password">
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
