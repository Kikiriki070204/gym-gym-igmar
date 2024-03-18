<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;
use App\Models\Servicio;
use App\Models\EmpleadoServicio;
use App\Models\Empleado;
use App\Models\Cliente;
use Validator;
class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all()->load('servicio');

        return response()->json(['citas'=>$citas],200);
    }

    public function vista_agendar(int $id)
{
    $cliente = User::find($id);
    $servicios = Servicio::select('id', 'nombre')->get();
    $serviciosID = $servicios->pluck('id');
    $empleados = [];

    foreach ($serviciosID as $servicioID) {
        $empleadoservicio = EmpleadoServicio::select('id')->where('servicio_id', $servicioID)->get();
        $empleadosID= $empleadoservicio->pluck('id');

        $nombreEmpleados = [];
        foreach ($empleadosID as $empleadoID) {
            $empleado = User::select('name')->find($empleadoID);
            if ($empleado) {
                $nombreEmpleados[] = $empleado->nombre;
            }
        }
        $empleados = $nombreEmpleados;
    }

    return response()->json(['cliente' => $cliente, 'servicios' => $servicios, 'empleados' => $empleados], 200);
}

public function store(Request $request, int $cliente_id)
{
    $validate = Validator::make($request->all(), [
        'cliente_id'=>'required|numeric',
        'servicio_id' => 'required|numeric',
        'empleado_id' => 'required|numeric',
        'fecha' => 'required|date_format:Y-m-d',
        'hora' => 'required|date_format:H:i'
    ]);

    if ($validate->fails()) {
        return response()->json([
            "errors" => $validate->errors(),
            "msg" => "Errores de validación"
        ], 422);
    }

    $cliente = Cliente::find($cliente_id);
    if(!$cliente)
    {
        return response()->json([ "msg"=>"Persona no encontrada"],404);
    }

    $cita = Cita::create([
        'cliente_id' => $request->cliente_id,
        'servicio_id' => $request->servicio_id,
        'empleado_id' => $request->empleado_id,
        'fecha' => $request->fecha,
        'hora' => $request->hora
    ]);

    return response()->json(['cita' => $cita], 200);
}


    public function destroy(int $id)
    {
        $cita = Cita::find($id);

        if(!$cita)
        {
            
        return to_route('404',[],303);
        }

        $cita->delete();
        return response()->json(['msg'=>'Cita eliminada'],200);
    }

    public function index_empleado(int $id)
    {
        $citas = Cita::all()->load('servicio')->where('empleado_id',$id);

        return response()->json(['citas'=>$citas],200);
    }
}
