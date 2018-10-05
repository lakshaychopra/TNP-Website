<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTodoRequest;
use JWTAuth;
use Validator;

class TodoController extends Controller
{
    public function index(){
        $user = JWTAuth::parseToken()->authenticate();
        $query = Todo::whereUserId($user->id);

        if(request()->has('show_todo_status'))
            $query->whereStatus(request('show_todo_status'));

        $todos = $query->get();
        return $todos;
    }

    public function store(CreateTodoRequest $request){
        $user = JWTAuth::parseToken()->authenticate();
        $todo = new \App\Todo;
        $todo->fill(request()->all());
        $todo->user_id = $user->id;
        $todo->save();

        return response()->json(['message' => 'Todo added!', 'data' => $todo]);
    }

    public function toggleStatus(Request $request){
        $todo = Todo::find(request('id'));
        $user = JWTAuth::parseToken()->authenticate();

        if(!$todo || $todo->user_id != $user->id)
            return response()->json(['message' => 'Could not find todo!'],422);

        $todo->status = !$todo->status;
        $todo->save();

        return response()->json(['message' => 'Todo updated!']);
    }

    public function destroy(Request $request, $id){
        $todo = Todo::find($id);
        $user = JWTAuth::parseToken()->authenticate();

        if(!$todo || $todo->user_id != $user->id)
            return response()->json(['message' => 'Could not find todo!'],422);

        $todo->delete();

        return response()->json(['message' => 'Todo deleted!']);
    }
}
