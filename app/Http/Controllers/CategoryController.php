<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $areas = Area::all();
        $data = ['categories' => $categories, 'areas' => $areas];
        return view('category.index', $data);
    }
}
