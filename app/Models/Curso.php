<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['title', 'description', 'category_id', 'created_by'];

    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }
}
