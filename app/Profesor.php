<?php

namespace CrudLaravel;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = "profesors";
    
    protected $fillable = ['nombre', 'apellido', 'codigo', 'email'];
}
