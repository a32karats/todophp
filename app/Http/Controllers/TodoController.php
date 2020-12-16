<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
       $items = Todo::all();
       return response()->json([
             'message' => 'OK',
             'data' => $items
       ], 200);
    }
    //メインビューの表示
    public function store(Request $request) {
        $item = new Todo;
        $item->todo = $request->todo;
        $item->save();
        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $item
        ], 200);
    }
    //１件追加
    public function destroy($id) {
        $item = Todo::where('id', $id->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Todo deleted successfully',
            ],200);
        } else {
            return response()->json([
                'message' => 'Todo not found',
            ],404);
        }
    }
    //１件削除
    public function update(Request $request, $id) {
        $item = Todo::where('id', $id->id)->first();
        $item->todo = $request->todo;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Todo updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Todo not found',
            ], 404);
        }
    }
    //１件更新
}