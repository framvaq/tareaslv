@extends('layouts.app'){{-- hereda de layouts --}}
@section('content'){{-- crea una section --}}
    <div class="container">
        @include('tasks/partials/task-form')
        <br>
        @include('tasks.partials.tasks-list')
        {{--Las rutas de los include están con "/" y "." a propósito, para que yo vea que se puede de las dos formas--}}
    </div>

@endsection