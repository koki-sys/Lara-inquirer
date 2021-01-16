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
        $areabook = Book::where('area_id', $id)->get();
        $area = Area::find($id);
        return json_encode($areabook, $area);
    }
}
