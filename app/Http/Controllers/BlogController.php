<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title_page = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title_page = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('uuid', request('author'));
            $title_page = ' by ' . $author->name;
        }

        $blogs = Blog::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString();

        return view('blogs', [
            'page_active' => 'blogs',
            'title_page' => 'All Blogs' . $title_page,
            'blogs' => $blogs,
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog_detail', [
            'page_active' => 'blogs',
            'title_page' => 'Blog detail',
            'blog' => $blog,
        ]);
    }
}
