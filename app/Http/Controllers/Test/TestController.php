<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
    public function index()
    {

	    // echo 123;die;
        
        
        return view('Test.index');
        
    }
    
    public function index2()
    {
        
        $a = ['a'=>'1','b'=>'2'];
        foreach ($a as $key => $value) {
            $value = '222';
//             $a[$key]='111';
        }
        dd($a);
        
        
        $a = [
            '0'=>['a'=>'1','b'=>'2'],
            '1'=>['a'=>'3','b'=>'4'],
        ];
        
        foreach ($a as $key => $value) {
            $value['a'] = '111';
            dd($value['a']);
        }
        
        
        dd($a);
        
    }
}
