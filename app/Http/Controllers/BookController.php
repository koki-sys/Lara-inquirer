<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    public function search(Request $request)
    {
        $name = trim($request->search);
        $search = Book::where('name', 'like', "%$name%")
            ->orWhereHas('area', function (Builder $q) use ($name) {
                $q->where('name', 'like', "%$name%");
            })->withCount('area')->get();
        $cnt = 0;
        foreach ($search as $row) {
            $cnt = $row->area_count;
        }
        if ($name != null && $name != '' && $cnt != 0) {
            return view('book.search', ['search' => $search, 'name' => $name]);
        } else {
            return view('book.error', ['name' => $name]);
        }
    }
}
