@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Blogs</h1>
    </div>

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

    <div class="mb-3">
        <a href="/admin/blogs/create" class="btn btn-dark">Tambah Blog</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        @if (request('page') > 1)
                            <td>{{ $loop->iteration + (request('page') - 1) * 10 }}</td>
                        @else
                            <td>{{ $loop->iteration }}</td>
                        @endif
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td>
                            <a href="/admin/blogs/{{ $blog->slug }}" class="btn btn-sm btn-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/admin/blogs/edit/{{ $blog->slug }}" class="btn btn-sm btn-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/admin/blogs/{{ $blog->slug }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger border-0"
                                    onclick="return confirm('Anda akan menghapus blog!')"><span
                                        data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">{{ $blogs->links() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
