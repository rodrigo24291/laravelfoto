<?php

namespace App\Http\Controllers;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    public function like($id){
        $user_id=auth::user()->id;
        $like=Like::where("image_id","=",$id)->where('user_id',"=",$user_id)->get();
        $valor=0;
        if(count($like)==0){
        $likes=new Like();
        $likes->image_id=$id;
        $likes->user_id=$user_id;
        $valor=1;
        $likes->save();
        
            
        }
        
        else{
        foreach($like as $ima){
            $valor=0;
         $ima->delete();  
        }
        
        
        }
        
       
       return redirect()->route('image.mostrartodo')->with('valor',$valor);
        
        }
        
    
}
