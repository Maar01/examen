{{--
 Created by PhpStorm.
  User: mario
  Date: 5/28/18 juan.castaneda@omnilife.com, jose.osuna@omnilife.com
  Time: 4:04 PM--}}
@extends('layout')
@section('content')
    <div class="title m-b-md">
        Empresario {{$empresario->nombre}}
        <br>
        <form method="get" action="/desactivar/{{$empresario->id}}">
            <button type="submit">Desactivar empresario</button>
        </form>
    </div>
    <form method="POST" action="/empresarios/{{$empresario->id}}">
        {{method_field('PATCH')}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>Código:</label>
            <input type="text" value="{{$empresario->codigo}}" name="codigo">
        </div>
        <br>
        <div>
            <label> Razón social:  </label>
            <input type="text" value="{{$empresario->razon_social}}" name="razon_social">
        </div>

        <br>
        <div>
            <label>Nombre: </label>
            <input type="text" value="{{$empresario->nombre}}" name="nombre">
        </div>
        <br>
        <div>
            <label>País:</label>
            <input type="text" value="{{$empresario->pais}}" name="pais">
        </div>
        <br>
        <div>
            <label>Estado:</label>
            <input type="text" value="{{$empresario->estado}}" name="estado">
        </div>
        <br>
        <div>
            <label>Ciudad:</label>
            <input type="text" value="{{$empresario->ciudad}}" name="ciudad">
        </div>
        <br>
        <div>
            <label>Teléfono:</label>
            <input type="text" value="{{$empresario->telefono}}" name="telefono">
        </div>
        <br>
        <div>
            <label>Correo</label>
            <input type="text" value="{{$empresario->correo}}" name="correo">
        </div>
        <br>
        <button>
            Guardar cambios
        </button>
    </form>
@endsection