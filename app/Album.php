<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = array('name','description', 'created_by', 'cover_image','access',);

    public function Photos(){
        return $this->hasMany('App\Image');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
