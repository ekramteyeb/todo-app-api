<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $data = array(
            'title' => 'Todos Page',
            'todos' => [
            'Front End',
            'Back End',
            'Database'
            ]
        );  */
        $todos = Todo::all();
        return view('todos.todos')->with('todos', $todos); 
       // return $data; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $todo = new Todo;
        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->user_id = $userId;
        $todo->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.todo')->with('todo', $todo);
        //return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = Todo::find($id);
        return view('todos.todos')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $todo = Todo::findOrFail($id);
        $status = $request->input('status');

        // Update the status of the todo item
        $todo->status = $status;
        $todo->save();

    // Optionally, you can return a response or redirect to a specific page
    return redirect()->back()->with('success', 'Todo status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'todo deleted';
    }
}
