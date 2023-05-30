<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['domain_name', 'Name', 'Image', 'Slug', 'Desc', 'Display_in_home', 'Display_in_header'];

}
