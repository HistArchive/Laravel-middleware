<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ctrl_bienvenida extends Controller
{
    //
    static public function Bienvenidos(){
        return view('welcome');
    }

    static public function Suma($n1,$n2){
        $suma= $n1+$n2;
        return ($suma);
        
    }
}
