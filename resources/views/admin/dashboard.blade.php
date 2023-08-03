@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @auth
            <h1 class="h2">Welcome back, {{ Auth::user()->name }}</h1>
        @else
            <h1 class="h2">Dashboard</h1>
        @endauth
    </div>
@endsection
