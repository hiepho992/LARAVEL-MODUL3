<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DictionaryController extends Controller
{

    public function index()
    {
        if (!empty($_POST['text'])) {
            $name = $_POST['text'];
            $check = false;
            $arrDictionary = [
                "nhà" => "home",
                "chợ" => "market",
                "đi"  => "go"
            ];
            foreach ($arrDictionary as $key => $val) {
                if ($name == $key) {
                    $result = $val;
                    return view('distionaries.index', ['result' => $result]);
                };
            }
            return "ko";
           
        }
    }
}
?>