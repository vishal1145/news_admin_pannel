<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $fillable = ['domain_name','facebook', 'favicon', 'desc', 'twitter', 'image', 'author', 'instagram', 'title', 'keyword', 'pinterest', 'youtube', 'punchline', 'punchdesc', 'punchlogo'];

}
