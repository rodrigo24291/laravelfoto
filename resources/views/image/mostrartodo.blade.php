

@extends('layouts.app')
@section('content')


@foreach($image as $images)

<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">

<div class="card">
  <div class="card-header">
   
      @if($images->users->image !== null)
      <img src="{{route('image',['imagen'=>$images->users->image])}}" class="col-md-4" style="
    width: 2rem;
    border-radius: 50%;
    height: 2rem;
    padding: 0px !important;
" >
      @endif
     
    
      <a href="{{route('perfil.show',['id'=>$images->user_id])}}">{{$images->users->name}} {{$images->users->surname}} |@ {{$images->users->nick}}</a>
      @if($images->users->id == auth::user()->id)

<div class="dropdown " style="
display: inline-block;
position: absolute;
right: 3rem;
">
<span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
</span>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

<a href="{{route('image.destroy',['id'=>$images->id])}}" class="dropdown-item">X Borrar publicacion</a>    

</div>
</div> 



@endif

  </div>
    <div class="card-body" style="padding: 0px !important">
          <img src="{{route('image.show',['imagen'=>$images->image_path])}}" class="card-img-top" alt="...">

      
    <blockquote class="blockquote mb-0 ml-2 mt-2">
        <div class="format-time" id="format">{{'@'.$images->users->nick}}|        
          <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($images->created_at)}}</small></p></div>
          <p class="format-time">{{$images->description}}</p>
          <div class="coment my-2 ml-0">
@php
$fer=''
@endphp
              
@if($images->likes->count()==0)
<i onclick="empezar({{$images->id}})" class="far fa-heart cora" data-id="{{$images->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i></a>

@else

@foreach($images->likes as $likese)
@if($likese->user_id==auth::user()->id)
@php
$fer='negro'
@endphp
@break
@else
@php
$fer='blanco'
@endphp
@endif
@endforeach
@if($fer=='blanco')
<i class="far fa-heart cora" onclick="empezar({{$images->id}})" data-id="{{$images->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i>

@else

<i onclick="empezar({{$images->id}})" class="fas fa-heart cora" data-id="{{$images->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i>

@endif
@endif
({{count($images->likes)}})  <a href="{{route('image.perfil',['id'=>$images->id])}}" class="ml-1"><button class="btn btn-primary"><i class="far fa-comment"></i> Comentar ({{count($images->comments)}})</button></a>
          </div>
              

    </div>  
     
    </blockquote>
  </div>
</div>
        </div>
    </div>
    
</div>
@endforeach
<div class="container py-3">
        <div class="row justify-content-center">
        <div class="col-md-6">

{{$image->links()}}
        </div>
        </div>
        </div>
@endsection