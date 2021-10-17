<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks;
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required'
        ]);
        $task = new Task($fields);
        $user = $request->user();
        $user->tasks()->save($task);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        if($request->user()->id == $task->user_id){
            return response()->json($task);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
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
        $fields = $request->validate([
            'title' => 'string',
            'description' => 'string'
        ]);

        $task = Task::findOrFail($id);
        $user = $request->user();
        if($task->user_id == $user->id){
            $task->update($fields);
            return response()->json($task);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $user = $request->user();
        if($task->user_id == $user->id){
            $task->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(
                [
                    "error" => "Permission denied"
                ], 403
            );
        }
    }
}
