<?php

namespace App\Http\Controllers;

use App\Empresario;
use App\Wsdl\EmpresarioSoap;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;

class EmpresariosController extends Controller
{
    use EmpresarioSoap;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($codigo_empresario = "")
    {
        if ($codigo_empresario !== ""){
            #con el web service
            //$empresario = $this->consultaEmpresario($id_empresario);
            #para pruebas
            $empresario = Empresario::where('codigo', $codigo_empresario)->first();
            return view('empresarios.create')->with(array('empresario' => $empresario));
        }
        return view('empresarios.create');
    }

    public function verificar(Request $request){
        return redirect()->action('EmpresariosController@crear', ['id_empresario' => $request->all()['codigo']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresario::create($request->except('_token'));

        return redirect()->action('EmpresariosController@index');
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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $nuevos_campos = $request->except(array('_method', '_token'));
        Empresario::where('id', $id)->update($nuevos_campos);

        return redirect()->action('EmpresariosController@show', ['id'=> $id]);

    }

    public function borraEmpresario($id){
        if(Empresario::where('id', $id)->delete()){
            return redirect()->action('EmpresariosController@index');
        }
    }
}
