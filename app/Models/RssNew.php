<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssNew extends Model
{
    use HasFactory;

    protected $guarded = [];

    function channel(){
        return $this->belongsTo(RssChannel::class, 'rss_channel_id');
    }

    function setImageAttribute($val){
        $this->attributes['image'] = json_encode($val);
    }

    function getImageAttribute(){
        return (array)((array)json_decode($this->attributes['image']))["@attributes"];
    }

    //pub_date
    function setPubDateAttribute($val){
        $this->attributes['pub_date'] = strtotime($val);
    }

    function getPubDateAttribute(){
        return date('Y.m.d H:i', $this->attributes['pub_date']);
    }
}
