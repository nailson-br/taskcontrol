@extends('main')
@section('content')

	<form class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
    </form>
    	<p>Tarefas</p>
@endsection