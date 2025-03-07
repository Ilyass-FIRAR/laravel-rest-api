<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathsController extends Controller
{
    function Equation($a,$b){
        if($a==0 && $b==0)return "Ensemble R";
        elseif($a==0 && $b!=0) return "Ensemble vide";
        else return "X= ".(-$b/$a);
    }

    function Etoile($n){
        $str='';
        for($i=1;$i<=$n;$i++){
            for($j=1;$j<=($n-$i);$j++){$str.="&nbsp;&nbsp";};
            for($j=1;$j<=(2*$i-1);$j++){$str.="*";} 
            $str.="<br/>";   
        }
        return "<h1>$str</h1>";
    }
}

