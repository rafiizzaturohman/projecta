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
     * Memanggil fungsi update status yang ada pada model project agar
     * dapat secara otomatis melakukan perubahan pada status project
     */
    protected static function booted()
    {
        static::saved(function ($task) {
            $task->project->updateStatus();
        });

        static::deleted(function ($task) {
            $task->project->updateStatus();
        });
    }


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
