@extends('layouts.app'){‌{-- hereda de layouts --}}
@section('content'){‌{-- crea una section --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <form action="{‌{ route('tasks.store') }}" method="post">
                                @csrf {{--Seguridad --}}
                                <div class="form-group row">
                                    <label for="task-title" class="col-md-4 col-form-label text-md-right">Task title</label>
                                    <div class="col-md-6">
                                        {{-- si hay errores en el title escribe la clase title , old es ultimo valor enviado por http--}}
                                        <input type="text" class="form-control {‌{ $errors->has('title')?' is-invalid':'' }}" 
                                        id="task-title" name="title" value="{‌{old('title')}}" required autofocus>
                                        @if ($errors->has('title'))
                                           <span class="invalid-feedback" role="alert">
                                                <strong>{‌{$errors->first('title')}}</strong>
                                           </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{‌{--TODO mostrar todas las tasks --}}
    </div>

@endsection