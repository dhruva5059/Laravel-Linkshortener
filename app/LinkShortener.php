<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkShortener extends Model
{
    protected $fillable = [
        'url', 'shorturl',
    ];    
}
