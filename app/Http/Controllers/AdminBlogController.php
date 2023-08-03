<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('id_author', Auth::user()->id)->latest()->paginate(10);
        return view('admin.blogs', [
            'page_active' => 'admin_blog',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::latest()->get();
        return view('admin.blog_create', [
            'page_active' => 'admin_blog',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ([
            'id_category' => 'required',
            'title' => 'required|unique:blogs',
            'slug' => 'required|unique:blogs',
            'image' => 'image|max:1024',
            'body' => 'required'
        ]);

        $message = ([
            'required' => 'tidak boleh kosong',
            'unique' => ':attribute telah digunakan',
            'image' => 'harus gambar',
            'max' => 'maksimal :max kb',
        ]);

        $validatedData = $request->validate($rules, $message);

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('img/blog', $image_name);
            $validatedData['image'] = $image_name;
        }

        $validatedData['id_author'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Blog::create($validatedData);

        $blog_latest = Blog::latest()->first();

        return redirect('/admin/blogs/' . $blog_latest->slug)->with('success', 'Blog berhasil di buat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog_detail', [
            'page_active' => 'admin_blog',
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::latest()->get();

        return view('admin.blog_edit', [
            'page_active' => 'admin_blog',
            'categories' => $categories,
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = ([
            'image' => 'image|max:1024',
            'id_category' => 'required',
            'body' => 'required'
        ]);

        if ($request->slug != $blog->slug) {
            $rules['title'] = 'required|unique:blogs';
            $rules['slug'] = 'required|unique:blogs';
        }

        $message = ([
            'required' => 'tidak boleh kosong',
            'unique' => ':attribute telah digunakan',
            'image' => 'harus gambar',
            'max' => 'maksimal :max kb',
        ]);

        $validatedData = $request->validate($rules, $message);

        if ($request->file('image')) {
            if ($request->oldImg) {
                if (File::exists('img/blog/' . $request->oldImg)) {
                    File::delete('img/blog/' . $request->oldImg);
                }
            }
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('img/blog', $image_name);
            $validatedData['image'] = $image_name;
        }

        $validatedData['id_author'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Blog::where('id', $blog->id)->update($validatedData);

        return redirect('/admin/blogs')->with('success', 'Blog berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            if (File::exists('img/blog/' . $blog->image)) {
                File::delete('img/blog/' . $blog->image);
            }
        }

        Blog::destroy($blog->id);

        return redirect('/admin/blogs')->with('success', 'Hapus blog berhasil!');
    }
}
