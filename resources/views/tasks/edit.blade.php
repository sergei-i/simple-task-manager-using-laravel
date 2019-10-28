@extends('layout')

@section('content')

    @include('errors')

    <div class="container">
        <h3>Edit Task # - {{ $task->id }}</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                    <br>
                    <textarea name="description" id="" cols="30" rows="10"
                              class="form-control">{{ $task->description }}</textarea>
                    <br>
                    <a href="{{ route('tasks.index') }}" class="btn btn-info">Back</a>
                    <button class="btn btn-warning">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
