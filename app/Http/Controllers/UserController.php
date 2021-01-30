<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use app\User;
use App\Image;
use CreateUsersTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    
    function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.config');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($file)
    {
$img=storage::disk('user')->get($file);

return new response($img,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{$user=Auth::user();

    $validacion=$this->validate($request,[
'name'=>'required|string',
'surname'=>'required|string',
'nick'=>'required|string',
'image'=>'image'

    ]
    
    
);


        $name=$request->input('name');
        $surname=$request->input('surname');
        $nick=$request->input('nick');
        
$image=$request->file('image');
if($image){
    $imagename=time().$image->getClientOriginalName();
    storage::disk('user')->put($imagename,File::get($image));

    $user->image=$imagename;
}

       $user->name=$name;
       $user->surname=$surname;
       $user->nick=$nick;
       
       $user->update(); 
     return redirect()->route('config')   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=user::find($id);
        $img=Image::where("user_id","=",$id)->orderBy('id','desc')->get();
        
        return view('user.perfil')->with('imagen',$usuario)->with('id',$img);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function todos()
    {
       $usuarios=user::orderBy('id','desc')->paginate(5);
       
       return view('user.buscador')->with('user',$usuarios);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request)
    {
       
       $palabra=$request->input('buscador');
        
       $busqueda=user::where('name','like','%'.$palabra.'%')->get();
       
    return view('user.buscadototal')->with('user',$busqueda);
       
       
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
