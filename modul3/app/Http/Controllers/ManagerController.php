<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use Mckenziearts\Notify\Facades\LaravelNotify;

class ManagerController extends Controller
{
    public function index(){
        $manager = Manager::all();

        return view('customers.index', compact('manager'));
    }
    protected function validateData(){
        return request()->validate([
            'name' => 'required| min:2',
            'phone' => 'required|min:10',
            'email' => 'required| email'
        ]);
    }
    public function store(){
        $data = request()->validate([
            'name' => 'required| min:2',
            'phone' => 'required|min:10',
            'email' => 'required| email'
        ]);
            $manager = new Manager();
            $manager->create($data);
            $mes = "<script>alert('Thêm thành công')</script>";
            return redirect('/customers/index')->with('status', $mes);

    }
    public function delete($id){

        Manager::destroy($id);

        return redirect('/customers/index');

    }

    public function edit($id){
        $manager = Manager::findOrFail($id);
        return view('customers.update', compact('manager'));
    }
    public function update($id){
        $data = request()->validate([
            'name' => 'required| min:2',
            'phone' => 'required|min:10',
            'email' => 'email'
        ]);
        $manager = Manager::find($id);
        $manager->update($data);
        // $mes = "<script>alert('Sửa thành công')</script>";
        notify()->success('Sửa thành công!');
        return redirect("/customers/index");
        // ->with('status', $mes)

    }

    // public function edit1(Manager $manager){
    //     return view('customers.update', compact('manager'));
    // }
    // public function update1(Manager $manager){
    //     $data = request()->validate([
    //         'name' => 'required| min:2',
    //         'phone' => 'required|min:10',
    //         'email' => 'email'
    //     ]);
    //     $manager->update($data);
    //     return redirect('/customers/index');
    // }


    public function show(Manager $manager){
        return view('customers.show', compact('manager'));
    }

}
