<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//en kernel.php se ve que se llama auth, y no Authenticate
    }

    /**
     * Muestra una lista con las tareas del usuario
     * 
     * @param Request $request
     * @return Response 
     */
    public function index(Request $request){
        //Voy al usuario, a sus tareas (las ordeno de más nuevas a menos) y las obtengo. Eso lo guardo en la variable $tasks
        $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();
        //Al devolver la vista, también devuelvo un array con los datos de la variable $tasks. El array que devuelvo también se llama tasks.
        return view('tasks.index',['tasks' => $tasks]);
    }

    /**
     * Guarda/crea la tarea del formulario
     * 
     * @param Request $request la variable en la que guardan los datos del formulario
     * @return Response Redirige a /tasks
     */
    public function store(Request $request){
        //Validación
        $this->validate($request, ['title' => 'required|max:255']);

        //Llamo al objeto user (app/user.php), de ahí al método tasks, y ahí al método create
        $request->user()->tasks()->create(['title' => $request->title]);

        return \redirect('/tasks');
    }
    
    /**
     * Muestra la vista de edicióm
     * 
     * @param Task id $id
     * @return Response 
     */
    public function editView ($id){
        
        $task = Task::find($id);
        
        $this->authorize('edit', $task);
        
        if (empty($task)) {
            return redirect('/tasks');
        }
        
        return view('tasks.edit', ['task'=>$task]);
    }
    
    /**
     * Edit task
     * 
     * @param Task id $id
     * @return Response 
     */
    public function edit (Request $request, $id){
        $this->validate($request, ['title' => 'required|max:255']);
        
        $task = Task::find($id);
        
        $this->authorize('edit', $task);
        
        if (empty($task)) {
            return redirect('/tasks');
        }

        $task->title = $request->title;
        $task->save();
        return redirect('/tasks');

    }
    
    /**
     * Borrar la tarea que se pasa por parámetro
     *
     * @param Request $request
     * @param Task id $id
     * @return Response 
     */
        public function destroy ($id){
            $task = Task::find($id);
        
            $this->authorize('edit', $task);
    
            if (empty($task)) {
                return redirect('/tasks');
            }
    
            $task->delete();
            return redirect('/tasks');
        }
    
}
