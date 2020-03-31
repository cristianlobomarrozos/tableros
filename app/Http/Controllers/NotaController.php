<?php

/**
 * Antonio J.Sánchez 
 * curso 2019/20
 */

namespace App\Http\Controllers;

use App\Models\Nota ;
use DB ;
use Carbon\Carbon ;
use App\Models\Tablero ;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    //
    public function view()
    {
    	$idt = request('id') ;

    	$not = Tablero::find($idt)->notas()->get() ;
    	//dd($not) ;
    	return view('notas.ver', ['notas' => $not]) ;
    }

    public function edit(Request $req)
    {

    	$idn = $req->input('idt') ;
    	$not = Nota::find($idn) ;

    	// si no tengo el parámetro NOM muestro la vista
    	if (!$req->has('nom'))
    		return view('notas.editar', ['nota' => $not]) ;
    	
    	//dd($req) ;
    	// en otro caso, modificamos el campo NOMBRE y guardar
    	$not->texto = $req->input('nom') ;
    	$not->completado = $req->input('com') ;
    	$not->save() ;
    	
    	// redirigimos a la pantalla principal de tableros
    	return redirect()->route('tablero.ver') ;
    }

    public function add(Request $req)
    {

        
         // realizamos la validación del campo
        $req->validate(['txt' => 'string|max:150|filled']) ;

        // comprobar si existe el campo NOM
        if (!$req->has('txt')) return view('notas.add') ;

        
        //dd($req) ;
        DB::table('nota')->insert(['idTab' => $req->input('idt'), 'texto' => $req->input('txt'), 'fecha' => Carbon::now()]) ;
        // creamos el tablero: QUERY BUILDER
        // recuerda importar la clase, en caso necesario
        // 
        // DB::table('tablero')->insert(['..' => '...', ...]) ;
        // DB::table('tablero')->insert(['..' => '...', ...], ['..' => '...', ...], ...) ;
        // DB::table(...)->insertOrIgnore(...)
        // DB::table(...)->insertGetId(['..' => '..', ...]) 
        
        //
        return redirect('/') ;
    }
}
