{{--
 Created by PhpStorm.
 User: mario
 Date: 5/28/18
 Time: 5:33 PM--}}

@extends('layout')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Empresarios
            <br>
        </div>
        <div>
            <h2>Formulario de creación</h2>
        </div>
        <br>
        <div >
            <div>

                <form method="post" action="/empresarios/verificar">
                    <label>Código:</label>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" value="{{isset($empresario) ? $empresario->codigo : ""}}" name="codigo">
                    <button type="submit">Buscar</button>
                </form>

            </div>
            <form method="POST" action="/empresarios">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{isset($empresario) ? $empresario->codigo : ""}}" name="codigo">
                <div>
                    <label> Razón social:  </label>
                    <input type="text" value="{{isset($empresario) ? $empresario->razon_social : ""}}" name="razon_social">
                </div>

                <br>
                <div>
                    <label>Nombre: </label>
                    <input type="text" value="{{isset($empresario) ? $empresario->nombre : ""}}" name="nombre">
                </div>
                <br>
                <div>
                    <label>País:</label>
                    <input type="text" value="{{isset($empresario) ? $empresario->pais : ""}}" name="pais">
                </div>
                <br>
                <div>
                    <label>Estado:</label>
                    <input type="text" value="{{isset($empresario) ? $empresario->estado : ""}}" name="estado">
                </div>
                <br>
                <div>
                    <label>Ciudad:</label>
                    <input type="text" value="{{isset($empresario) ? $empresario->ciudad : ""}}" name="ciudad">
                </div>
                <br>
                <div>
                    <label>Teléfono:</label>
                    <input type="text" value="{{isset($empresario) ? $empresario->telefono : ""}}" name="telefono">
                </div>
                <br>
                <div>
                    <label>Correo</label>
                    <input type="text" value="{{isset($empresario) ? $empresario->correo : ""}}" name="correo">
                </div>
                <br>
                <button>
                    ¡Crear!
                </button>
            </form>
        </div>
    </div>
@endsection