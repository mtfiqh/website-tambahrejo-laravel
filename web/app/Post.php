<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $appends=['published'];

    //
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getPublishedAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
}
