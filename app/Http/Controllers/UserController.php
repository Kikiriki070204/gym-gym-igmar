<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['usuarios'=>$users], 200);
    }

    public function role(Request $request,int $id)
    {
        $validate = Validator::make($request->all(),
        [
            'rol_id' =>'required'
        ]);

        if($validate->fails())
        {
            return response()->json(["errors"=>$validate->errors(),
            "msg"=>"Campo requerido"],422);
        }

        $user = User::find($id);

        if(!$user)
        {
            return response()->json([ "msg"=>"Persona no encontrada"],404);
        }
        
        $user->rol_id = $request->rol_id;

        $user->save();
        return response()->json([ "msg"=>"Nuevo rol asignado!"],200);
    }

    public function profile(int $id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([ "msg"=>"Persona no encontrada"],404);
        }

        return response()->json([ "usuario"=>$user],200);

    }
}
