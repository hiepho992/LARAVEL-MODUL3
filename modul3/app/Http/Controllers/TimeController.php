<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index(){
        $time = $_POST['select-city'];
        date_default_timezone_set( $time);
        $result = date('Y/m/d H:i:s');
        return view('times.index', ['result' => $result]);
    }


}
