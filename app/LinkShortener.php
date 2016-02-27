<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkShortener extends Model
{
    protected $table = 'linkshortener';
    protected $fillable = [
        'url', 'shorturl',
    ];    
}
