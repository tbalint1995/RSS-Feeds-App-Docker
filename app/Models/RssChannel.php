<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssChannel extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }

    function rssNews(){
        return $this->hasMany(RssNew::class);
    }
}
