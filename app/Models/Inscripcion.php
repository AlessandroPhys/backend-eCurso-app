<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inscripciones';

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
        'user_id',
        'curso_id',
        'fecha_inscripcion',
    ];

    /**
     * Get the user that owns the inscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the course that owns the inscription.
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
