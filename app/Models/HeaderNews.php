<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderNews extends Model
{
    use HasFactory;

    protected $fillable = ['display_title', 'publish_status', 'domain_id', 'category_id', 'domain_name', 'Slug', 'Title','photos', 'Date', 'Name', 'SubCatName', 'youtube', 'tags', 'Display_in_front', 'Content'];
}
