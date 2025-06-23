<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';

    protected $guarded = ['id'];

    /**
     * Relasi ke Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relasi ke User (Mahasiswa) berdasarkan nim
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_nim', 'nim');
    }
}
