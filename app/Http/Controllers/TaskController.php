<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//en kernel.php se ve que se llama auth, y no Authenticate
    }

    public function index(){
        return view('tasks.index');
    }
}
