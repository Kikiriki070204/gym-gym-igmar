<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\Cliente;
use Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes =  Cliente::all();

        return response()->json(['clientes'=>$clientes],200);
    }

    public function store(Request $request,int $id)
    {
        $validate = Validator::make($request->all(),
        [
            'plan_id'=>'required|numeric'
        ]);

        if($validate->fails())
        {
            return response()->json(["errors"=>$validate->errors(),
            "msg"=>"Campo requerido"],422);
        }
        
        $user = $id;

        $cliente = Cliente::create([
            'user_id'=>$user,
            'plan_id'=>$request->plan_id
        ]);

        return response()->json([ "cliente"=>$cliente],200);

    }
}
