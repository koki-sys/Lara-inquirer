<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return json_encode($books);
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

            $jsonArray = [
                $search,
                $name
            ];

            return $jsonArray;
        } else {
            return json_encode($name);
        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        $library = Library::find($book->library_id);
        $category = Category::find($book->category_id);

        $jsonArray = [
            'book' => $book,
            'library' => $library,
            'category' => $category
        ];

        return $jsonArray;
    }
}
