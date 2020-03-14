<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks'; //No es necesario, pero queda más claro
    protected $fillable = ['title'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
