{{--
 Created by PhpStorm.
  User: mario
  Date: 5/28/18
  Time: 4:04 PM--}}
@extends('layout')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Empresarios
            <br>
            <form method="get" action="/empresarios/crear">
                <button type="submit" >
                    Agregar empresario
                </button>
            </form>
        </div>
        <div class="links">
            <table>
                <thead>
                    <tr>
                        @foreach($encabezados as $encabezado)
                        <th>
                            {{$encabezado}}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($empresarios as $empresario)
                        <tr>
                            <td>
                                {{$empresario->codigo}}
                            </td>
                            <td>
                                {{$empresario->razon_social}}
                            </td>
                            <td>
                                {{$empresario->nombre}}
                            </td>
                            <td>
                                {{$empresario->pais}}
                            </td>
                            <td>
                                {{$empresario->estado}}
                            </td>
                            <td>
                                {{$empresario->ciudad}}
                            </td>
                            <td>
                                {{$empresario->telefono}}
                            </td>
                            <td>
                                {{$empresario->correo}}
                            </td>
                            <td>
                                <form method="get" action='/empresarios/{{$empresario->id}}'>
                                    <input type="hidden" value="{{$empresario->id}}" name="id_empresario" >
                                    <button type="submit">Modificar</button>
                                </form>
                            </td>
                            <td>
                                <form method="get" action="/borraEmpresario/{{$empresario->id}}">
                                    <input type="hidden" value="{{$empresario->id}}" name="id_empresario" >
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection