<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'evaluaciones';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'inscripcion_id',
        'nota',
        'feedback',
        'evaluated_at',
    ];

    /**
     * Get the course that owns the evaluation.
     */
    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
