<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Subcategory;

class Category extends Model
{
    //eloqeant orm
    //protected $fillable =['categoryName','categoryDescription','publicationStatus'];

    protected $table = 'categories';

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'categoryId')->where('publicationStatus',1);
    }

    
}
