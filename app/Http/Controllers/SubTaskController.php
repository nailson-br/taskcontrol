<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\SubTask;
use App\Task;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = NULL)
    {
        if ($id) {
            $task = Task::where('task_cod', $id)->first();
            $subtasks = SubTask::where('task_id', $task->id)->get();
        } else {
            $subtasks = SubTask::all();
        }
        return response()->json($subtasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $subtask = new SubTask();
        $task = Task::where('task_cod', $request->task_cod)->first();

        $subtask->task_id = $task->id;
        $subtask->cod = $request->subtask_cod;
        $subtask->type = $request->subtask_type;
        $subtask->description = $request->subtask_description;
        $subtask->front = $request->front == 'true' ? true : false;
        $subtask->back = $request->back == 'true' ? true : false;
        $subtask->qa = $request->qa == 'true' ? true : false;
        $subtask->save();

        return response()->json($subtask, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
