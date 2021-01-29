<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
class ImageControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagens=new Image();
        
        $validation= $this->validate($request,[
            
            "image"=> "required|image",
            "description"=>"required|string"
        ]);
        
       $description=$request->input('description');
       
       $image=$request->file('image');
       if($image){
           
           $imagenname=time().$image->getClientOriginalName();
           storage::disk('images')->put($imagenname,file::get($image));
       
           $imagens->image_path=$imagenname;
       }
       $imagens->user_id=Auth::user()->id;
       $imagens->description=$description;
       $imagens->save();
       
       return redirect()->route('imagen.create');
    }
    
    public function mostrartodo(){
        
        $imagen=Image::orderBy('id','desc')->paginate(5);
        $imagen2=Image::all();
        
        
return view('image.mostrartodo')->with('image', $imagen)->with('imagen2',$imagen2);
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
            
    {
        $ima=storage::disk('images')->get($id);
        return new response($ima,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfil($id)
    {
        $image=Image::find($id);
        return view('image.perfil')->with('im',$image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
