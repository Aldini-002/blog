@extends('layouts.main')

@section('content')
    <h1 class="mb-3 text-center">{{ $title_page }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blogs">
                <div class="input-group mb-3">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($blogs->count())
        <div class="container">
            <div class="card mb-3">
                @if ($blogs[0]->image)
                    <div style="max-height: 400px; overflow:hidden">
                        <img src="/img/blog/{{ $blogs[0]->image }}" class="card-img-top" alt="error">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $blogs[0]->category->name }}" class="card-img-top"
                        alt="error">
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title">
                        <a href="/blogs/{{ $blogs[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $blogs[0]->title }}</a>
                    </h3>
                    <p>
                        <small class="text-muted">
                            By. <a href="/blogs?author={{ $blogs[0]->author->uuid }}"
                                class="text-decoration-none">{{ $blogs[0]->author->name }}</a>
                            in
                            <a href="/blogs?category={{ $blogs[0]->category->slug }}"
                                class="text-decoration-none">{{ $blogs[0]->category->name }}</a>
                            {{ $blogs[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">
                        {{ $blogs[0]->excerpt }}
                    </p>
                    <a href="/blog/{{ $blogs[0]->slug }}" class="btn btn-primary">Read more</a>
                </div>
            </div>

            <div class="row">
                @foreach ($blogs->skip(1) as $blog)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-1" style="background-color: rgba(0, 0, 0, 0.8)">
                                <a href="/blogs?category={{ $blog->category->slug }}"
                                    class="text-decoration-none text-white">{{ $blog->category->name }}</a>
                            </div>
                            @if ($blog->image)
                                <div style="max-height: 200px; overflow:hidden">
                                    <img src="/img/blog/{{ $blog->image }}" class="card-img-top" alt="error">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/300x200?{{ $blog->category->name }}"
                                    class="card-img-top" alt="error">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a href="/blogs?author={{ $blog->author->uuid }}"
                                            class="text-decoration-none">{{ $blog->author->name }}</a>
                                        {{ $blog->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{!! $blog->excerpt !!}</p>
                                <a href="/blog/{{ $blog->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No blog found!</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $blogs->links() }}
    </div>
@endsection
