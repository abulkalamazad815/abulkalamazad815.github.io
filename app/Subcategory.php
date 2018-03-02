<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Subcategory extends Model
{
     protected $table = 'subcategories';

    public function category()
    {
        return $this->belongsTo(Category::class, 'id')->where('publicationStatus',1);
    }
}
