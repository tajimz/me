<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'name',
        'details',
        'cover_image',
        'type',
        'github_url',
        'live_url',
        'download_url',
        'tags',
        'is_visible',
        ];


}
