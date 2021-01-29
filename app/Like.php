<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    public function image()
    {
        return $this->belongsto('App\Imge','image_id');
    }
    
    public function comment()
    {
        return $this->belongsto('App\Comment','comment_id');
        
    }
    
    
    public function user()
    {
        return $this->belongsto('App\User','user_id');
    }
}
