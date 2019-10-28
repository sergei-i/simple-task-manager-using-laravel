@extends('layout')

@section('content')

    @include('errors')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <a href="{{ route('tasks.index') }}" class="btn btn-info">Back</a>
            </div>

        </div>

    </div>

@endsection
