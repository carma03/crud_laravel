<?php

namespace CrudLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use CrudLaravel\Http\Requests;
//para la validacion de ProfesorCreateRequest
use CrudLaravel\Http\Requests\ProfesorCreateRequest;
//para la validacion de ProfesorUpdateRequest
use CrudLaravel\Http\Requests\ProfesorUpdateRequest;
use CrudLaravel\Http\Controllers\Controller;

use \CrudLaravel\Profesor;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(view()->exists('profesor.mostrar_profesores_view')){
            //$profesores = Profesor::All();//muestra todos los profesores desde la BD
            $profesores = Profesor::orderBy('created_at', 'desc')->paginate(3);//muestra todos los profesores desde la BD, con paginador
            return view('profesor.mostrar_profesores_view', compact('profesores'));
        }else{
            return "La vista << mostrar_profesores_view no existe >>.";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    //muestra el form para crear un nuevo profesor
    public function create()
    {
        if(view()->exists('profesor.crear_profesor_view')){
            return view('profesor.crear_profesor_view');
        }else{
            return "La vista << profesor.crear_profesor_view no existe >>.";
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    // ProfesorCreateRequest en base a la validacion del archivo app/Http/Request/ProfesorCreateRequest
    public function store(ProfesorCreateRequest $request)//o (Request $request)
    {
        Profesor::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'codigo' => $request['codigo'],
            'email' => $request['email'],
        ]);
        
        Session::flash('message', 'Profesor registrado exitósamente.');
        return Redirect::to('/profesor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profesor = Profesor::find($id);
        if(view()->exists('profesor.ver_profesor_view')){
            return view('profesor.ver_profesor_view', ['profesor' => $profesor]);
        }else{
            Session::flash('message', 'La vista << profesor.ver_profesor_view >> no existe.');
            return Redirect::to('/profesor');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        if(view()->exists('profesor.editar_profesor_view')){
            return view('profesor.editar_profesor_view', ['profesor' => $profesor]);
        }else{
            Session::flash('message', 'La vista << profesor.editar_profesor_view >> no existe.');
            return Redirect::to('/profesor');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    // ProfesorCreateRequest en base a la validacion del archivo app/Http/Request/ProfesorCreateRequest
    public function update($id, ProfesorUpdateRequest $request)//o (Request $request)
    {
        $profesor = Profesor::find($id);
        $profesor->fill($request->all());
        $profesor->save();
        Session::flash('message', 'Profesor editado exitósamente.');
        return Redirect::to('/profesor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        Profesor::destroy($id);
        Session::flash('message', 'Profesor eliminado exitósamente.');
        return Redirect::to('/profesor');
    }
}
