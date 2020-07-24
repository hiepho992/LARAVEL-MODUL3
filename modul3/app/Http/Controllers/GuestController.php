<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Mckenziearts\Notify\LaravelNotify;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {

        return view('guests.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required'
            ]);

            $guests = new Guest();
            $guests->create($data);

            notify()->success('Thêm thành công');

            return view('guests.create');
    }

    public function edit($id)
    {
        $guests = Guest::findOrFail($id);

        return view('guests.edit', compact('guests'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $guests = Guest::findOrFail($id);
        $guests->update($data);
        notify()->success('Sửa thành công!');

        return redirect('guests/index');
    }

    public function destroy($id)
    {
        Guest::destroy($id);

        notify()->success('Xóa thành công!');

        return redirect()->back();
    }
}
