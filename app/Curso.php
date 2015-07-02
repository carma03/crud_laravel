<?php

namespace CrudLaravel;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    
    protected $fillable = ['nombre', 'id_profesor','descripcion', 'periodo', 'anio', 'fecha_inicio'];
}
