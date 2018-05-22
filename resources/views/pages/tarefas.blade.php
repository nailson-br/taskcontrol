@extends('main')
@section('content')

    <form class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <legend>Registro de tarefas</legend>
        <div class="form-group">
            <label class="col-md-1 control-label" for="cod">código</label>
            <div class="col-md-2">
                <input id="cod" name="cod" type="text" placeholder="código" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="type">tipo</label>
            <div class="col-md-2">
                <select id="type" name="type" class="form-control">
                    <option value="">Story</option>
                    <option value="">Task</option>
                    <option value="">Bug</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1 control-label" for="start">início</label>
            <div class="col-md-2">
                <input id="start" name="start" type="date" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="end">término</label>
            <div class="col-md-2">
                <input id="end" name="end" type="date" class="form-control input-md" >
            </div>

            <label class="col-md-1 control-label" for="deploy">entrega</label>
            <div class="col-md-2">
                <input id="deploy" name="deploy" type="date" class="form-control input-md" >
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-inline">
                <input id="frontend" type="checkbox" data-toggle="toggle">Front
            </label>
            <label class="checkbox-inline">
                <input id="backend" type="checkbox" data-toggle="toggle">Back
            </label>
            <label class="checkbox-inline">
                <input id="qa" type="checkbox" data-toggle="toggle">QA
            </label>
        </div>
    </form>
@endsection