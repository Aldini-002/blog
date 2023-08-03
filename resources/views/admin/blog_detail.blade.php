@extends('layouts.admin')
@section('content')
    <div class="row">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-8">
            <h2>{{ $blog->title }}</h2>

            <a href="/admin/blogs" class="btn btn-dark mb-3">Kembali</a>
            <a href="/admin/blogs/edit/{{ $blog->slug }}" class="btn btn-warning mb-3">Perbarui</a>
            <form action="/admin/blogs/{{ $blog->slug }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mb-3"
                    onclick="return confirm('Anda akan menghapus blog!')">Hapus</button>
            </form>

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
        </div>
    </div>
@endsection
