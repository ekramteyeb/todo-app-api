<?php
   
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Todo as TodoResource;
use App\Models\Todo;
use Validator;


class TodoController extends BaseController
{

    public function index()
    {
        //$todos = Todo::all();
        //get todos by user_id
        $todos = Todo::where('user_id', Auth::id())->get();

        return $this->handleResponse(TodoResource::collection($todos), 'Todos have been retrieved!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'nullable'
        ]);
        if($validator->fails()){
            //return $this->handleError($validator->errors());       
            return $this->handleError($validator->errors('cannot do it'));       
        }
        $todo = Todo::create($input);
        return $this->handleResponse(new TodoResource($todo), 'Todo created!');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return $this->handleError('Todo not found!');
        }
        return $this->handleResponse(new TodoResource($todo), 'Todo retrieved.');
    }
    

    public function update(Request $request, Todo $todo)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        /* $todo->name = $input['name'];
        $todo->description = $input['description']; */
        $todo->status = $input['status'];
        //$todo->user_id = $input['user_id'];
        $todo->save();
        
        return $this->handleResponse(new TodoResource($todo), 'Todo successfully updated!');
    }
   
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return $this->handleResponse([], 'Todo deleted!');
    }
}