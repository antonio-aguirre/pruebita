<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
      return $this->belongsTo('App\Category');//se retorna una relación (un producto pertenece a una categoria)
    }
}
