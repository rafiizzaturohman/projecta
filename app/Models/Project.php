<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $guarded = ['id'];

    /**
     * Relasi ke Prodi berdasarkan kd_prodi
     */
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'kd_prodi', 'kd_prodi');
    }

    /**
     * Relasi ke Matakuliah berdasarkan kd_matakuliah
     */
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kd_matakuliah', 'kd_matakuliah');
    }

    /**
     * Relasi ke Mahasiswa (User) berdasarkan nim
     */
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_nim', 'nim');
    }
}
