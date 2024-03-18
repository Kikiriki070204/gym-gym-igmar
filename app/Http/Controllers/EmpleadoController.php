<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Empleado;
use Validator;
use App\Models\EmpleadoServicio;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados =  Empleado::all();

        return response()->json(['empleados'=>$empleados],200);
    }

    public function store(int $id)
    {  
        $user = $id;

        $empleado = Empleado::create([
            'user_id'=>$user
        ]);

        return response()->json([ "empleado"=>$empleado],200);

    }
    public function servicio(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'empleado_id' => 'required|numeric',
            'servicio_id' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            return response()->json(["errors" => $validate->errors(), "msg" => "Campo requerido"], 422);
        }

        EmpleadoServicio::create([
            'empleado_id' => $request->empleado_id,
            'servicio_id' => $request->servicio_id
        ]);
        
        return response()->json(["msg" => "Asignación correcta!"], 200);
    }
}
