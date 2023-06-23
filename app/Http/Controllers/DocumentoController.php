<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\Proceso;
use App\Models\Tipo;


class DocumentoController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos['documentos']=Documento::all();
        return view('appDocs.index', $documentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $procesos = Proceso::all();
        $tipos = Tipo::all();
        return view('appDocs.crear', compact('procesos'), compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'documento' => ['required'],
            'proceso' => ['required'],
            'tipo' => ['required'],
            'descripcion' => ['required'],
        ]);

        $documentos_bd = Documento::all();
        $nombre_nuevo_doc = request('documento');
        $descripcion_doc = request('descripcion');
        $id_procesos_req = request('proceso');
        $id_tipos_req = request('tipo');
        $filtro_bd_procesos = Proceso::select('PRO_PREFIJO')->where('id', $id_procesos_req )->get();
        $prefijo_procesos = $filtro_bd_procesos[0]->{"PRO_PREFIJO"};
        $filtro_id_procesos = Proceso::select('id')->where('id', $id_procesos_req )->get();
        $id_procesos = $filtro_id_procesos[0]->{"id"};
        $filtro_bd_tipos = Tipo::select('TIP_PREFIJO')->where('id', $id_tipos_req )->get();
        $prefijo_tipos = $filtro_bd_tipos[0]->{"TIP_PREFIJO"};
        $filtro_id_tipos = Tipo::select('id')->where('id', $id_tipos_req )->get();
        $id_tipos = $filtro_id_tipos[0]->{"id"};
        $codigo_consecutivo = sizeof($documentos_bd) + 1;
        $codigo_documento = $prefijo_tipos."-".$prefijo_procesos."-".$codigo_consecutivo;

        $nuevo_registro = array("DOC_NOMBRE" => $nombre_nuevo_doc, "DOC_CODIGO" => $codigo_documento, "DOC_CONTENIDO" => $descripcion_doc, "DOC_ID_TIPO" => $id_tipos, "DOC_ID_PROCESO" => $id_procesos);

       Documento::insert($nuevo_registro);

       return redirect('documentos')->with('mensaje', 'Documento agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $procesos = Proceso::all();
        $tipos = Tipo::all();
        $documento=Documento::findOrFail($id);
        return view('appDocs.editar', [ 'documento'=>$documento, 'procesos' => $procesos, 'tipos' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'documento' => ['required'],
            'proceso' => ['required'],
            'tipo' => ['required'],
            'descripcion' => ['required'],
        ]);

        $documentos_bd = Documento::all();
        $nuevo_nombre_doc = request('documento');
        $nueva_descripcion_doc = request('descripcion');

        $nuevo_id_procesos_req = request('proceso');
        $nuevo_id_tipos_req = request('tipo');
        $filtro_bd_procesos = Proceso::select('PRO_PREFIJO')->where('id', $nuevo_id_procesos_req )->get();
        $prefijo_procesos = $filtro_bd_procesos[0]->{"PRO_PREFIJO"};
        $filtro_id_procesos = Proceso::select('id')->where('id', $nuevo_id_procesos_req )->get();
        $id_procesos = $filtro_id_procesos[0]->{"id"};
        $filtro_bd_tipos = Tipo::select('TIP_PREFIJO')->where('id', $nuevo_id_tipos_req )->get();
        $prefijo_tipos = $filtro_bd_tipos[0]->{"TIP_PREFIJO"};
        $filtro_id_tipos = Tipo::select('id')->where('id', $nuevo_id_tipos_req )->get();
        $id_tipos = $filtro_id_tipos[0]->{"id"};
        $codigo_consecutivo = sizeof($documentos_bd) + 1;
        $codigo_documento = $prefijo_tipos."-".$prefijo_procesos."-".$codigo_consecutivo;


        $nuevo_registro = array("DOC_NOMBRE" => $nuevo_nombre_doc, "DOC_CODIGO" => $codigo_documento, "DOC_CONTENIDO" => $nueva_descripcion_doc, "DOC_ID_TIPO" => $id_tipos, "DOC_ID_PROCESO" => $id_procesos);

        Documento::where('id','=',$id)->update($nuevo_registro);
        return redirect('documentos')->with('mensaje', 'Documento actualizado exitosamente');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Documento::destroy($id);
        return redirect('documentos')->with('mensaje', 'Documento eliminado exitosamente');;
    }
}
