<?php

    namespace App\Http\Controllers;

    use App\Models\Todo;
    use Illuminate\Http\Request;

    class TodoController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $items = Todo::all();
            return response()->json([
                'message' => 'OK',
                'data' => $items
            ], 200);
        }
//メインビューの表示
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $item = new Todo;
            $item->todo = $request->todo;
            $item->save();
            return response()->json([
                'message' => 'Created successfully',
                'data' => $item
            ], 200);
        }
//１件追加
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Todo  $todo
         * @return \Illuminate\Http\Response
         */
        public function show(Todo $todo)
        {
            $item = Todo::where('id', $todo->id)->first();
            if ($item) {
                return response()->json([
                    'message' => 'OK',
                    'data' => $item
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        }
//１件追加したものを表示
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Todo  $todo
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Todo $todo)
        {
            $item = Todo::where('id', $todo->id)->first();
            $item->name = $request->name;
            $item->age = $request->age;
            $item->save();
            if ($item) {
                return response()->json([
                    'message' => 'Updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        }
//１件更新
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Todo  $todo
         * @return \Illuminate\Http\Response
         */
        public function destroy(Todo $todo)
        {
            $item = Todo::where('id', $todo->id)->delete();
            if ($item) {
                return response()->json([
                    'message' => 'Deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        }
    }
//１件削除