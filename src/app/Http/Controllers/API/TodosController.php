<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodosCollection;

class TodosController extends Controller
{
    public function index(){
        $todos = Todo::get();
        return TodosCollection::collection($todos);
    }

    public function add(Request $request){
        $todo = new Todo;
        $todo->content = $request->content;
        $todo->checked = $request->checked;
        $todo->completed = $request->completed;
        $todo->created_at = now();
        $todo->updated_at = now();
        $todo->save();

        $todos = Todo::get();
        return TodosCollection::collection($todos);
    }

    public function remove(Request $request){
        $todo = Todo::find($request->id)->first();
        if($todo != null){
            $todo->delete();
        }
        $todos = Todo::get();
        return TodosCollection::collection($todos);
    }

    public function removeAll(Request $request){
        foreach ($request->params as $param) {
            if($param['checked'] == 1){
                $todo = Todo::where('id', $param['id'])->delete();
            }
        }
        $todos = Todo::get();
        return TodosCollection::collection($todos);
    }

    public function doneAll(Request $request){
        foreach ($request->params as $param) {
            if($param['checked'] == 1){
                $todo = Todo::where('id', $param['id'])->first();
                $todo->completed = 1;
                $todo->save();
            }
        }
        $todos = Todo::get();
        return TodosCollection::collection($todos);
    }
}
