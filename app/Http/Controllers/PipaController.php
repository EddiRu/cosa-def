<?php

namespace App\Http\Controllers;

use App\Models\Pipa;
use Illuminate\Http\Request;

class PipaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idPlanta)
    {
        try {
            $data = Pipa::where('id_planta', $idPlanta)->get();
            return  response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data['id_planta'] = $request['id_planta'];
            $data["clave_pipa"] = $request["clave_pipa"];
            $data["localizacion_descripcion_pipa"] = $request["localizacion_descripcion_pipa"];
            $data["vigencia_calibracion_tanque"] = $request["vigencia_calibracion_tanque"];
            $data['responsable_pipa'] = $request['responsable_pipa'];
            $data["capacidad_pipa"] = $request["capacidad_pipa"];
            $data["capacidad_operativa"] = $request["capacidad_operativa"];
            $data["capacidad_util"] = $request["capacidad_util"];
            $data["capacidad_fondaje"] = $request["capacidad_fondaje"];
            $data["volumen_minimo_operacion"] = $request["volumen_minimo_operacion"];
            $data["estado_tanque"] = $request["estado_tanque"];

            $res = Pipa::create($data);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pipa $pipa)
    {
        try {
            $data = Pipa::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response() -> json(['error'=>$th->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pipa $pipa)
    {
        try {
            $data["clave_pipa"] = $request["clave_pipa"];
            $data["localizacion_descripcion_pipa"] = $request["localizacion_descripcion_pipa"];
            $data["vigencia_calibracion_tanque"] = $request["vigencia_calibracion_tanque"];
            $data['responsable_pipa'] = $request['responsable_pipa'];
            $data["capacidad_pipa"] = $request["capacidad_pipa"];
            $data["capacidad_operativa"] = $request["capacidad_operativa"];
            $data["capacidad_util"] = $request["capacidad_util"];
            $data["capacidad_fondaje"] = $request["capacidad_fondaje"];
            $data["volumen_minimo_operacion"] = $request["volumen_minimo_operacion"];
            $data["estado_tanque"] = $request["estado_tanque"];

            Pipa::find($request->id)->update($data);
            $res = Pipa::find($request->id);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pipa $pipa)
    {
        try {
            $res = Pipa::find($request->id)->delete();
            return response()->json(["deleted" => $res], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
