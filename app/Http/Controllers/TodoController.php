<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$todos=Todo::all();
        $todos = Auth::user()->todo;

        //$todos=Todo::with('user')->get();
        return view('todos.index', ['todos' => $todos]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255'
        ]);

        $todo = new Todo();
        //dd(Auth::user()->id);
        $todo->user_id = Auth::user()->id;
        $todo->task = $request->task;
        $todo->save();

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //policy
        $this->authorize('update',$todo);
        //
        return view('todos/edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'task' => 'required|string|max:255'
        ]);

        $todo->task = $request->task;
        $todo->update();

        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect(route('todos.index'));
    }
}
