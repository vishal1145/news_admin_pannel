<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['domain_name','category_id', 'SubCatName', 'Image', 'Desc'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
