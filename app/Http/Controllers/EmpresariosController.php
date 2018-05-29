<?php

namespace App\Http\Controllers;

use App\Empresario;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use PHPUnit\Util\Xml;
use SoapClient;

class EmpresariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camposEmpresario = array('codigo', 'razon_social', 'nombre', 'pais', 'estado', 'ciudad', 'telefono', 'correo',
            'activo');
        $empresarios = Empresario::where('activo', 1)->get();
        return View('empresarios.index')->with(array('encabezados' => $camposEmpresario, 'empresarios' => $empresarios));
        /*$client = new SoapClient('10.1.10.84:8080/wsa/wsa1/wsdl?targetURI=WSShopping_mxqa');
        dd($client->__getTypes());
        dd($client->__getFunctions);
        dd($client->__soapCall('ejecuta_proceso'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $empresario = Empresario::find($id);
        return View('empresarios.show')->with(array('empresario' => $empresario));
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

    public function desactivar($id){
        Empresario::desactivar($id);
        return redirect()->action('EmpresariosController@index');
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
        dd($request);
    }

    public function borraEmpresario($id){
        if(Empresario::where('id', $id)->delete()){
            return redirect()->action('EmpresariosController@index');
        }
    }
}
