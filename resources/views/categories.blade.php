@extends('layouts.main')

@section('content')
    <h1 class="mb-3">Blogs Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-3">
                    <a href="/blogs?category={{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/400x400?{{ $category->name }}" class="card-img"
                                alt="error">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center p-3 flex-fill fs-3"
                                    style="background-color: rgba(0, 0, 0, 0.8)">
                                    {{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
