<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateMain;
use App\Service;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::all();

        return view('services.index', compact('service'));

    }

    public function store(ValidateMain $request){


        $date = ValidateMain::make($request->all());

        $service = new Service();
        $service->create($date);

        if($service->create($date)){
            return notify()->success('tao thanh cong');
        }else{
            return notify()->warning('tao that bai');
        }

        return redirect()->back();
    }
}
