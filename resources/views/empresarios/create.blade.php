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
        </div>

        <div >
            <form method="POST" action="/empresarios">
                <input type="text" placeholder="codigo">
                <br>
                <input>
            </form>
        </div>
    </div>
@endsection