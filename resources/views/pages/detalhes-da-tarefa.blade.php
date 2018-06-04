@extends('main')
@section('content')

<form id="newSubTaskForm" class="form-horizontal" action="posts" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <legend>Detalhes da tarefa</legend>
    <div class="form-group">
        <label class="col-md-1 control-label" for="task_cod">PV20-</label>
        <div class="col-md-2">
            <input id="task_cod" name="task_cod" type="text" value="{!! $task->task_cod !!}" placeholder="código" class="form-control input-md" readonly >
        </div>

        <label class="col-md-1 control-label" for="task_description">Descrição</label>
        <div class="col-md-5">
            <input id="task_description" name="task_description" type="text" value="{!! $task->task_description !!}" placeholder="código" class="form-control input-md" readonly >
        </div>

        <label class="col-md-1 control-label" for="task_type">tipo</label>
        <div class="col-md-2">
            <input id="task_type" name="task_type" type="text" value="{!! $task->task_type !!}" placeholder="código" class="form-control input-md" readonly >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-1 control-label" for="start_date">início</label>
        <div class="col-md-2">
            <input id="start_date" name="start_date" type="text" value="{!! date("d/m/Y", strtotime($task->start_date)) !!}" placeholder="código" class="form-control input-md" readonly >
        </div>

        <label class="col-md-1 control-label" for="end_date">término</label>
        <div class="col-md-2">
            <input id="end_date" name="end_date" type="text" value="{!! date("d/m/Y", strtotime($task->end_date)) !!}" placeholder="código" class="form-control input-md" readonly >
        </div>

        <label class="col-md-1 control-label" for="deploy_date">entrega</label>
        <div class="col-md-2">
            <input id="deploy_date" name="deploy_date" type="text" value="{!! date("d/m/Y", strtotime($task->deploy_date)) !!}" placeholder="código" class="form-control input-md" readonly >
        </div>

        @if(($task->task_type == 'Task') || ($task->task_type == 'Bug'))
        <div class="col-md-3 text-right">
            <label class="checkbox-inline">
                <input id="back" type="checkbox" data-toggle="toggle" disabled="true">Back
            </label>
            <label class="checkbox-inline">
                <input id="front" type="checkbox" data-toggle="toggle" disabled="true">Front
            </label>
            <label class="checkbox-inline">
                <input id="qa" type="checkbox" data-toggle="toggle" disabled="true">QA
            </label>
        </div>
        @endif

    </div>

    @if(($task->task_type == 'Task') || ($task->task_type == 'Bug'))
    <hr>
    <legend>Lançar atividade</legend>
    <div class="form-group">
        <label class="col-md-1 control-label" for="activityDate">data</label>
        <div class="col-md-2">
            <input id="activityDate" name="activityDate" type="date" class="form-control input-md" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-1 control-label" for="status">Status</label>
        <div class="col-md-2">
            <select id="status" name="status" class="form-control">
                <option value="1">to do</option>
                <option value="2">em dev</option>
                <option value="3">dev fin</option>
                <option value="4">pronto qa</option>
                <option value="5">qa</option>
                <option value="6">pronto deploy</option>
                <option value="7">done</option>
            </select>
        </div>

        <label class="col-md-1 control-label" for="increment">incremento</label>
        <div class="col-md-1">
            <input id="increment" name="increment" type="text" value="" placeholder="%" class="form-control input-md">
        </div>

        <div class="col-md-2">
            <button id="submit" name="submit" class="btn btn-primary" type="button" onclick="save();">Registrar</button>
        </div>
    </div>

    @else
    <hr>
    <div class="form-group">
        <div class="col-md-12 text-right">
            <a id="newSubTaskLink" data-toggle="collapse" href="#subTaskTable">Adicionar sub tarefa</a>
        </div>
    </div>
    <div id="subTaskTable" class="collapse">
        <legend>Adicionar sub tarefa</legend>
        <div class="form-group">
            <label class="col-md-1 control-label" for="subtask_cod">Cod</label>
            <div class="col-md-2">
                <input id="subtask_cod" name="subtask_cod" type="text" placeholder="código" class="form-control input-md">
            </div>

            <label class="col-md-1 control-label" for="subtask_description">Descrição</label>
            <div class="col-md-5">
                <input id="subtask_description" name="subtask_description" type="text" placeholder="descrição" class="form-control input-md">
            </div>

            <label class="col-md-1 control-label" for="subtask_type">tipo</label>
            <div class="col-md-2">
                <select id="subtask_type" name="subtask_type" class="form-control">
                    <option value="Sub Task">Sub Task</option>
                    <option value="Sub Bug">Sub Bug</option>
                </select>
            </div>
        </div>

        <div class="form-group">

            <label class="col-md-1 control-label" for="subtask_size">size</label>
            <div class="col-md-2">
                <select id="subtask_size" name="subtask_size" class="form-control">
                    <option value="0,5">PP</option>
                    <option value="1">P</option>
                    <option value="2">M</option>
                    <option value="4">G</option>
                </select>
            </div>

            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input id="subtask_back" type="checkbox" data-toggle="toggle">Back
                    </label>
                    <label class="checkbox-inline">
                        <input id="subtask_front" type="checkbox" data-toggle="toggle">Front
                    </label>
                    <label class="checkbox-inline">
                        <input id="subtask_qa" type="checkbox" data-toggle="toggle">QA
                    </label>
                </div>
            </div>
            <div class="col-md-2 ">
                <button style="width: 100%" id="submit" name="submit" class="btn btn-primary" type="button" onclick="saveNewSubTask();">Adicionar</button>
            </div>
        </div>
    </div>
    <legend>Lista de sub-tasks</legend>
    <div style="display:block; max-height: 300px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
        <table id="subtask_table" class="table table-striped table-hover table-condensed table-scrollable">
            <thead>
                <tr>
                    <th>código</th>
                    <th>descrição</th>
                    <th>tipo</th>
                    <th>status</th>
                    <th>editar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    @endif
</form>

@if($task->task_type == 'Story')
<script>
    $(document).ready(() => {
        loadSubtasks();
    })
</script>
@endif
@endsection