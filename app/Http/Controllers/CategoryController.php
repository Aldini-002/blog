<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'page_active' => 'categories',
            'title_page' => 'Categories',
            'categories' => Category::all(),
        ]);
    }

    public function adminIndex()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        return view('admin.categories', [
            'page_active' => 'admin_category',
            'title_page' => 'Categories',
            'categories' => Category::all(),
        ]);
    }
}
