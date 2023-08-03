@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $blog->title }}</h2>
                <p>
                    <small class="text-muted">
                        By. <a href="/blogs?author={{ $blog->author->uuid }}"
                            class="text-decoration-none">{{ $blog->author->name }}</a>
                        in
                        <a href="/blogs?category={{ $blog->category->slug }}"
                            class="text-decoration-none">{{ $blog->category->name }}</a>
                    </small>
                </p>
                @if ($blog->image)
                    <div style="max-height: 400px; overflow:hidden">
                        <img src="/img/blog/{{ $blog->image }}" class="img-fluid" alt="error">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $blog->category->name }}" class="img-fluid"
                        alt="error">
                @endif

                <article class="my-3">
                    {!! $blog->body !!}
                </article>

                <a href="/blogs" class="">Back to blogs</a>
            </div>
        </div>
    </div>
@endsection
