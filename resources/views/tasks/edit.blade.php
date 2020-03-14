@extends('layouts.app'){{-- hereda de layouts --}}
@section('content'){{-- crea una section --}}
    <div class="container">
        @include('tasks/partials/task-form')
    </div>

@endsection