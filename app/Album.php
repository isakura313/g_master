<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums'; //для начала объявим в какой таблице нас создаются альбомы
    protected $fillable = array('name','description','cover_image');  // какие свойства определяют наш альбом?

    public function Photos(){
  
      return $this->has_many('images'); //количество изображений в альбоме
    }

}
