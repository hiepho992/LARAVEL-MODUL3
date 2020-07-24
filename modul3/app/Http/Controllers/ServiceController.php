<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::all();

        return view('services.index', compact('service'));

    }

    public function store(){
        $date = request()->validate([
            'name' => 'required|min:5'
        ]);

        $service = new Service();
        $service->name = request('name');
        $service->save();

        return redirect()->back();
    }
}
