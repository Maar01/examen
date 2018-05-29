{{--
 Created by PhpStorm.
  User: mario
  Date: 5/28/18 juan.castaneda@omnilife.com, jose.osuna@omnilife.com
  Time: 4:04 PM--}}
@extends('layout')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Empresario {{$empresario->nombre}}
            <br>
            <form method="get" action="/desactivar/{{$empresario->id}}">
                <button type="submit">Desactivar empresario</button>
            </form>
        </div>
    <form method="UPDATE" action="empresarios/{{$empresario->id}}">
        <input type="text" value="{{$empresario->codigo}}">
        <br>
        <input type="text" value="{{$empresario->razon_social}}">
        <br>
        <input type="text" value="{{$empresario->nombre}}">
        <br>
        <input type="text" value="{{$empresario->pais}}">
        <br>
        <input type="text" value="{{$empresario->estado}}">
        <br>
        <input type="text" value="{{$empresario->ciudad}}">
        <br>
        <input type="text" value="{{$empresario->telefono}}">
        <br>
        <input type="text" value="{{$empresario->correo}}">
        <br>
        <button>
            Guardar cambios
        </button>
    </form>
    </div>
@endsection