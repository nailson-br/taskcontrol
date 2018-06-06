<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Task;
use App\TaskHistory;
use Illuminate\Http\Request;
use Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
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
        $task = new Task();

        $task->task_cod = $request->task_cod;
        $task->task_type = $request->task_type;
        $task->task_description = $request->task_description;
        $task->task_size = $request->task_size;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->deploy_date = $request->deploy_date;
        $task->front = $request->front == 'true' ? true : false;
        $task->back = $request->back == 'true' ? true : false;
        $task->qa = $request->qa == 'true' ? true : false;

        $task->save();
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('pages.detalhes-da-tarefa')->with('task', $task);
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

    /**
     * Registra o progresso de uma atividade do tipo Task ou Bug
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerProgress(Request $request, $id)
    {
        $task = Task::find($id);
        $taskHistory = new TaskHistory();
        $taskHistory->

        $activityDate = Input::get('activityDate');
        $activityStatus = Input::get('status');
        $progress = Input::get('progress');

        // Tratando o progresso de acordo com o status fornecido
        // Se é To Do, ajusta o progresso em 0%
        if ($activityStatus == 1) { // to do

        } elseif ($activityStatus == 2) { // em dev

        } elseif ($activityStatus == 3) { // dev fin

        } elseif ($activityStatus == 4) { // pronto qa

        } elseif ($activityStatus == 5) { // qa

        } elseif ($activityStatus == 6) { // pronto deploy

        } elseif ($activityStatus == 7) { // done

        }
    }
}
