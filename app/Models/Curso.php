<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'anio_id',
        'materia_id',
        'division_id',
    ];

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'curso_user');
    }
}
