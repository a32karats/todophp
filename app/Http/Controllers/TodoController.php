<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        return view('home')
    }
    //メインビューの表示
    public function post(Request $request) {
       $todo = new Todo();
       $todo->todo = $request->todo;
       $todo->save();
       return response("OK", 200);
    }
    //１件追加
    public function destroy($id) {
        Todo::find($id)->delete();
        return response("OK", 200);
    }
    //１件削除
    public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        return response("OK", 200);
    }
    //１件更新
}