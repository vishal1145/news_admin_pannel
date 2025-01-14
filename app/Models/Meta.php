<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $fillable = ['domain_id','facebook', 'favicon', 'desc', 'twitter', 'image', 'author', 'instagram', 'title', 'keyword', 'pinterest', 'youtube', 'punchline', 'punchdesc', 'punchlogo', 'hover_image', 'who_we_are', 'design', 'company', 'how_we_help', 'privacy', 'terms', 'facebook_id', 'analytics_id', 'mixpanel_id', 'adsense_id'];

}
