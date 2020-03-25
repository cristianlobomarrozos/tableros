<?php

/**
 * Antonio J.Sánchez 
 * curso 2019/20
 */

namespace App\Http\Controllers;

use App\Models\Nota ;
use App\Models\Tablero ;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    //
    public function view(Request $req)
    {
    	$idt = request('id') ;

    	$not = Tablero::find($idt)->notas()->get() ;
    	//dd($not) ;
    	return view('notas.ver', ['notas' => $not]) ;
    }
}
