<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'domain_name', 'Slug', 'Title','photos', 'Date', 'Name', 'SubCatName', 'Content'];
}
