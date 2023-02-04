<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NombreController extends Controller
{
    //cette fonction permet de génerer les nombres entiers plus petit et carre
    public function generateNumber(Request $request)
    {

        if(is_null($request->number)){

            return response()->json([
                "status"=>"success",
                "message"=>"aucune donnee n'a ete saisi"
            ]);
        }

        $validators = Validator::make($request->all(),[

            "number" => "required|integer"
        ]);

        if($validators->fails()){

            return response()->json([

                "status" => "echec",
                "message" => $validators->errors()
            ]);
        }

        $number = $request->number;

        if ($number != null) {
            $inferiorNumbers = [];

            for ($i = 0; $i < $number; $i++) {

                if ($i < $number) {

                    array_push($inferiorNumbers, $i);
                    array_push($inferiorNumbers, $i * $i);
                }
            }

            return response()->json([
                "status" => "success",
                "message" => "liste des nombres inferieurs et de leur carre",
                "data" => $inferiorNumbers
            ]);
        }
    }
}