<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    use SoftDeletes;

    protected $table = 'prodis';

    protected $guarded = ['id'];

    /**
     * Relasi: Prodi memiliki banyak user
     */
    public function users()
    {
        return $this->hasMany(User::class, 'kd_prodi', 'kd_prodi');
    }

    /**
     * Relasi tambahan jika diperlukan:
     * Matakuliah dan Project juga bisa pakai relasi ini
     */
    public function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'kd_prodi', 'kd_prodi');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'kd_prodi', 'kd_prodi');
    }
}
