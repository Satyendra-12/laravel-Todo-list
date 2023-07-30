<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // $todos = Todo::paginate(8);
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);
    
        $data = $request->except('_token'); // Exclude _token from the data
    
        Todo::create($data);
    
        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }
    

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
    ]);

    $data = $request->except('_token'); // Exclude _token from the data

    $todo->update($data);

    return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
}

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}