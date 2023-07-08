<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function addTask(Request $request)
    {
        $task = new Todo();

        $task->texte = $request->task;
        $task->termine = false;

        $task->save();

        return redirect('/todoList');
    }

    public function doTask($id) {

        $task = Todo::find($id);

        $task->termine = true;

        $task->save();

        return redirect('/todoList');
    }

    public function deleteTask($id) {

        $task = Todo::find($id);
        $task->delete();

        return redirect('/todoList');
    }

    public function listTodo(){
        return view("todoList", ["todos" => Todo::all()]);
    }
}
