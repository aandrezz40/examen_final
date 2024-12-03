<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Puedes especificar los campos que se pueden asignar masivamente
    protected $fillable = ['name'];

    // Relación de "tiene muchos" con el modelo Task
    public function tasks()
    {
        return $this->hasMany(Task::class, 'id_categories');
    }
}
