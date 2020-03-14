@if(!empty($tasks))
    <section class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td style="display: flex">
                                <a href="{{ route('tasks.edit_view', [$task->id]) }}" class="btn btn-info" style="margin-right: 10px">
                                    Edit
                                </a>
                                {{-- La dirección del action se mira en routes/web.php (hay que ponerle nombre)--}}
                                <form action="{{ route('tasks.destroy', [$task->id])}}" method="POST">
                                    @csrf
                                    {{--EL method_field es porque en las rutas pone que es de tipo delete, pero HTML sólo admite los metodos get y post--}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </section>
@endif