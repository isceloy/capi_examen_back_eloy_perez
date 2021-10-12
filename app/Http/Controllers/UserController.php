<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $dataRequest = request()->all();
            
            $usuarios=User::select('users.name',
                                    'users.email',
                                    'users.password',
                                    'users.fecha_nacimiento',
                                    'user_domicilio.domicilio',
                                    'user_domicilio.numero_exterior',
                                    'user_domicilio.colonia',
                                    'user_domicilio.cp',
                                    'user_domicilio.ciudad',
                                    DB::raw("TIMESTAMPDIFF(YEAR, users.fecha_nacimiento, CURDATE()) AS edad"),
                                    )
                            ->join('user_domicilio', 'users.id', 'user_domicilio.user_id')
                            ->get();
           
            return response()->json($usuarios,200) ;            

    }




}
