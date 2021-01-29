
@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        
<div class="col-md-6">
    <div class="row" style="align-items: center">
        
        <div><img src="{{route('image',['imagen'=>$imagen->image])}}" class="perfil-imagen"></div>
        <div class="datos-biografia">
            <h2>{{'@'.$imagen->nick}}</h2>
        <p>{{$imagen->name}} {{$imagen->surname}}</p>
        <p> Se unio {{ \FormatTime::LongTimeFilter($imagen->created_at)}}</p>
        </div>
    </div>
</div>

@foreach($id as $images)
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">

<div class="card">
  <div class="card-header">
      @if(auth::user()->image !== null)
      <img src="{{route('image',['imagen'=>$imagen->image])}}" class="col-md-4" style="
    width: 2rem;
    border-radius: 50%;
    height: 2rem;
    padding: 0px !important;
" >
      @endif
      <a href="{{route('perfil.show',['id'=>$imagen->id])}}">{{$imagen->name}} {{$imagen->surname}} |@ {{$imagen->nick}}</a>
  </div>
    <div class="card-body" style="padding: 0px !important">
          <img src="{{route('image.show',['imagen'=>$images->image_path])}}" class="card-img-top" alt="...">

      
    <blockquote class="blockquote mb-0 ml-2">
        <div class="format-time" id="format">{{'@'.$images->users->nick}}|        
          <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($images->created_at)}}</small></p></div>
          <p class="format-time">{{$images->description}}</p>
          <hr>
          <div class="coment ml-0 my-2">
           
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

    </div>
        </div>
        </div>

        
@endsection

