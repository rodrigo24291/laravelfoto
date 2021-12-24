
@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-10">

<div class="card">
  <div class="card-header">
      @if($im->users->image !== null)
      <img src="{{route('image',['imagen'=>$im->users->image])}}" class="col-md-4" style="
    width: 2rem;
    border-radius: 50%;
    height: 2rem;
    padding: 0px !important;
" >
      @endif
      <a >{{$im->users->name}} {{$im->users->surname}} |@ {{$im->users->nick}}</a>
      @if($im->users->id == auth::user()->id)

<div class="dropdown " style="
display: inline-block;
position: absolute;
right: 3rem;
">
<span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">  
</span>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

<a href="{{route('image.destroy',['id'=>$im->id])}}" class="dropdown-item">X Borrar publicacion</a>    

</div>
</div> 



@endif
  </div>
    <div class="card-body" style="padding: 0px !important">
        @if($im->image_path !== null)
          <img src="{{route('image.show',['imagen'=>$im->image_path])}}" class="card-img-top" alt="...">
@endif
      
          <div class="co">
        
        <div class="format-time" id="">{{'@'.$im->users->nick}}|        
          <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($im->created_at)}}</small></p></div>
          <p class="">{{$im->description}}</p>
          <div>

@php
$fer=''
@endphp
              
@if($im->likes->count()==0)
<i onclick="empezar({{$im->id}})" class="far fa-heart cora" data-id="{{$im->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i></a>

@else

@foreach($im->likes as $likese)
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

@if($fer=='negro')

<i class="fas fa-heart cora" onclick="empezar({{$im->id}})"  data-id="{{$im->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i>

@else

<i class="far fa-heart cora" onclick="empezar({{$im->id}})" data-id="{{$im->id}}" style="font-size: 2rem; margin-right: 0.4rem" ></i>

@endif
@endif

<p class="h3">Comentarios ({{count($im->comments)}})</p>
      @foreach( $im->comments as $ims )
          
      <div class="comentario-real">
          <div class="format-time">{{'@'.$ims->user->nick}}|        
          <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($ims->created_at)}}</small></p></div>
          <div>{{$ims->content}}</div>
          @if ($ims->user_id == auth::user()->id)
          <a class="btn btn-danger my-3" onclick="borrar({{$ims->id}})">Eliminar</a>
         @endif
      </div>
      @endforeach  
     
      <form class="form-coment" method="post" action="{{route('comment.comentar',['id'=>$im->image_id])}}">
           @csrf
          <input type="hidden" value="{{$im->id}}" name="id">
          
          <input type="hidden" value="{{auth::user()->id}}" name="user_id">
            <textarea class="comentario form-control @error('content') is-invalid @enderror" name="content"  required autocomplete="content" autofocus ></textarea>
            
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            
            <input type="submit" class="btn btn-info my-2" value="Comentar">
        </form>
      
      
         

        </div>
    </div>
        </div>
    </div>
</div>
</div>
        
@endsection
