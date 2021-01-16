<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $areas = Area::all();
        $data = ['categories' => $categories, 'areas' => $areas];
        return json_encode($data);
    }

    public function show($id)
    {
        $areabook = Book::where('category_id', $id)->get();
        $category = Category::find($id);
        return json_encode($areabook, $category);
    }
}
