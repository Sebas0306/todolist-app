<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Session::get('tasks', []);
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $tasks = Session::get('tasks', []);
        $tasks[] = [
            'name' => $request->input('name'),
            'completed' => false,
            'due_date' => $request->input('due_date'),
        ];
        Session::put('tasks', $tasks);
        return redirect()->route('tasks.index');
    }

    public function update($task)
    {
        $tasks = Session::get('tasks', []);
        if (isset($tasks[$task])) {
            $tasks[$task]['completed'] = !$tasks[$task]['completed'];
            Session::put('tasks', $tasks);
        }
        return redirect()->route('tasks.index');
    }
}
