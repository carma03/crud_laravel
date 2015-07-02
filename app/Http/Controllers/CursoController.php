<?php

namespace CrudLaravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use CrudLaravel\Http\Requests;
//para la validacion de CursoCreateRequest
use CrudLaravel\Http\Requests\CursoCreateRequest;
//para la validacion de CursoUpdateRequest
use CrudLaravel\Http\Requests\CursoUpdateRequest;
use CrudLaravel\Http\Controllers\Controller;

use \CrudLaravel\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(view()->exists('curso.mostrar_cursos_view')){
            //$cursos = Curso::All();//devuelve todos los cursos desde la BD
            $cursos = Curso::orderBy('created_at', 'desc')->paginate(3);//devuelve todos los cursos desde la BD, con paginador
            return view('curso.mostrar_cursos_view', compact('cursos'));
        }else{
            return "La vista << mostrar_cursos_view no existe >>.";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(view()->exists('curso.crear_curso_view')){
            return view('curso.crear_curso_view');
        }else{
            return "La vista << curso.crear_curso_view no existe >>.";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    // ProfesorCreateRequest en base a la validacion del archivo app/Http/Request/CursoCreateRequest
    public function store(CursoCreateRequest $request)//o (Request $request)
    {
        Curso::create([
            'nombre' => $request['nombre'],
            'id_profesor' => $request['id_profesor'],
            'descripcion' => $request['descripcion'],
            'periodo' => $request['periodo'],
            'anio' => $request['anio'],
            'fecha_inicio' => $request['fecha_inicio'],
        ]);
        
        Session::flash('message', 'Curso registrado exitósamente.');
        return Redirect::to('/curso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        if(view()->exists('curso.ver_curso_view')){
            return view('curso.ver_curso_view', ['curso' => $curso]);
        }else{
            Session::flash('message', 'La vista << curso.ver_curso_view >> no existe.');
            return Redirect::to('/curso');
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
        $curso = Curso::find($id);
        if(view()->exists('curso.editar_curso_view')){
            return view('curso.editar_curso_view', ['curso' => $curso]);
        }else{
            Session::flash('message', 'La vista << curso.editar_curso_view >> no existe.');
            return Redirect::to('/curso');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    // ProfesorCreateRequest en base a la validacion del archivo app/Http/Request/CursoUpdateRequest
    public function update($id, CursoUpdateRequest $request)//o ($id, Request $request)
    {
        $curso = Curso::find($id);
        $curso->fill($request->all());
        $curso->save();
        Session::flash('message', 'Curso editado exitósamente.');
        return Redirect::to('/curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Curso::destroy($id);
        Session::flash('message', 'Curso eliminado exitósamente.');
        return Redirect::to('/curso');
    }
}
