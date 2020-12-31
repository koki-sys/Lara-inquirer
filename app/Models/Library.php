<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public function rentals()
    {
        return $this->hasMany('App\Models\Rental');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
