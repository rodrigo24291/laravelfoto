
@extends('layouts.app')


@section('content')

<div class="container" >
      <div class="row justify-content-center">
        
<div class="col-md-6">
<form method="POST" action="{{ route('user.buscar') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="buscador" class="col-md-4 col-form-label text-md-right">Buscador de gente</label>

                            <div class="col-md-6">
                                <input id="buscador" type="text" class="form-control @error('buscador') is-invalid @enderror" name="buscador" value="{{ old('buscador') }}" required autocomplete="buscador" autofocus>

                                @error('buscador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Buscar
                                </button>
                            </div>
                        </div>
</form>
</div>  
      </div>
    <hr>
    @if ($user->count())
    @foreach($user as $usuarios)
    
    <div class="row justify-content-center my-4">
        
<div class="col-md-6">
    <div class="row" style="align-items: center">
      
        <div><img src="{{route('image',['imagen'=>$usuarios->image])}}" class="perfil-imagen"></div>
        <div class="datos-biografia">
            <h2>{{'@'.$usuarios->nick}}</h2>
        <p>{{$usuarios->name}} {{$usuarios->surname}}</p>
        <p> Se unio {{ \FormatTime::LongTimeFilter($usuarios->created_at)}}</p>
        </div>
    </div>
</div>
    </div>
    <hr>
    @endforeach
@else
<div class="row justify-content-center my-4">
        
<div class="col-md-6">
  <h3>No hay usuarios registrados con ese nombre</h3>
</div>
</div>
@endif
</div>

@endsection        
