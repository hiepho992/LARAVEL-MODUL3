<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Mckenziearts\Notify\Facades\LaravelNotify;

class TaskController extends Controller
{
    public function index(){

        return view('tasks.index');
    }

    public function add(){

        return view('tasks.add-task');
    }
    public function store(Request $request){

        $task = new Task();
        $task->title = $request->inputTitle;
        $task->content = $request->inputContent;
        $file = $request->inputFile;
        if (!$request->hasFile('inputFile')) {
            $task->images = $file;
        } else {
            $fileName = $request->inputFileName;
        }
        $fileExtension = $file->getClientOriginalExtension();
        $newFileName = "$fileName.$fileExtension";

        $task->images = $newFileName;
        $request->file('inputFile')->storeAs('public/images', $newFileName);
        $task->save();

        notify()->success('Thêm thành công!');

        return view('tasks.add-task');
    }

    public function select(){
        $tasks = Task::all();

        return view('tasks.list-task', compact('tasks'));
    }
}
