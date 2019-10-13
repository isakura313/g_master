<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';// сама таблица
  
    protected $fillable = array('album_id','description','image'); // колонки
}
