<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use App\Image;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate=$this->validate($request,[
            "content"=>"required",
            
        ]);
        
        $coment=new Comment;
        $id=$request->input('id');
        $user_id=$request->input('user_id');
        $contenido=$request->input('content');
        $coment->content=$contenido;
        $coment->user_id=$user_id;
        $coment->image_id=$id;
        $coment->save(); 
        
        
        return redirect()->route('image.perfil',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $img= Comment::find($id)->image_id;
        
        Comment::find($id)->delete();
        return redirect()->route('image.perfil',['id'=>$img]);
    }
}
