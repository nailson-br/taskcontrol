@extends('main')
@section('content')

    <form class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <legend>Registro de tarefas</legend>
        <div class="form-group">
            <label class="col-md-1 control-label" for="task_cod">código</label>
            <div class="col-md-2">
                <input id="task_cod" name="task_cod" type="text" placeholder="código" class="form-control input-md" >
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
        </div>

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
        <hr>
        <div class="row">
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary" type="button" onclick="mandar();">Salvar</button>
                <button id="cancel" name="cancel" class="btn btn-danger" type="button" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
            </div>
        </div>
        <hr>
        <legend>Lista de tarefas</legend>
        <table class="table table-striped">
            <tr>
                <th>código</th>
                <th>tipo</th>
                <th>início</th>
                <th>término</th>
                <th>entrega</th>
            </tr>
        </table>
    </form>
@endsection