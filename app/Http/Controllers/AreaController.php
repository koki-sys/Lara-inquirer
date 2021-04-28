<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Book;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('area_id', $id)->get();
        $area = Area::find($id);

        $jsonArray = [
            'book' => $book,
            'area' => $area
        ];
        
        return $jsonArray;
    }
}
