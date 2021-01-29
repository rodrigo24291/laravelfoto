<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
      public function image()
    {
        return $this->belongsto('App\Imge','image_id');
    }
    
    
    
    public function user()
    {
        return $this->belongsto('App\User','user_id');
    }
}
