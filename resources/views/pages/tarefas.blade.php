@extends('main')
@section('content')
    
    <form id="newTaskForm" class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <legend>Registro de tarefas</legend>
        <div class="form-group">
            <label class="col-md-1 control-label" for="task_cod">código</label>
            <div class="col-md-2">
                <input id="task_cod" name="task_cod" type="text" placeholder="código" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="task_description">descrição</label>
            <div class="col-md-5">
                <input id="task_description" name="task_description" type="text" placeholder="descrição" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="task_type">tipo</label>
            <div class="col-md-2">
                <select id="task_type" name="task_type" class="form-control">
                    <option value="Story">Story</option>
                    <option value="Task">Task</option>
                    <option value="Bug">Bug</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1 control-label" for="start_date">início</label>
            <div class="col-md-2">
                <input id="start_date" name="start_date" type="date" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="end_date">término</label>
            <div class="col-md-2">
                <input id="end_date" name="end_date" type="date" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="deploy_date">entrega</label>
            <div class="col-md-2">
                <input id="deploy_date" name="deploy_date" type="date" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="task_size">size</label>
            <div class="col-md-2">
                <select id="task_size" name="task_size" class="form-control">
                    <option value="0,5">PP</option>
                    <option value="1">P</option>
                    <option value="2">M</option>
                    <option value="4">G</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input id="back" type="checkbox" data-toggle="toggle">Back
                    </label>
                    <label class="checkbox-inline">
                        <input id="front" type="checkbox" data-toggle="toggle">Front
                    </label>
                    <label class="checkbox-inline">
                        <input id="qa" type="checkbox" data-toggle="toggle">QA
                    </label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-right">
                <button id="submit" name="submit" class="btn btn-primary" type="button" onclick="saveNewTask();">Salvar</button>
                <button id="cancel" name="cancel" class="btn btn-danger" type="button" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
            </div>
        </div>
        <hr>
        <legend>Lista de tarefas</legend>
        <div style="display:block; max-height: 300px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
            <table id="table" class="table table-striped table-hover table-condensed table-scrollable">
                <thead>
                <tr>
                    <th>código</th>
                    <th>tipo</th>
                    <th>início</th>
                    <th>término</th>
                    <th>entrega</th>
                    <th>editar</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </form>

    <script>
        $(document).ready(() => {
            loadTasks();
        })
    </script>
@endsection