@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="text-lg font-mono">Your name is: {{auth()->user()->name}}</p>
            <p class="text-lg font-mono">Your email is: {{auth()->user()->email}}</p>
            <p class="text-lg font-mono">Your ID is: {{auth()->user()->id}}</p>
        </div>

    </div>
@endsection
