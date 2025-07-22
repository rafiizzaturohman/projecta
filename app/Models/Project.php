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
    * Function untuk otomatis update status pada project ketika ada perubahan status pada tasks atau tugas yang 
    * memiliki relasi ke project tersebut
    */
    public function updateStatus()
    {
        $total = $this->tasks()->count();
        $selesai = $this->tasks()->where('status', 'selesai')->count();
        $proses = $this->tasks()->where('status', 'proses')->count();

        if ($total === 0) {
            $this->status = 'belum';
        } elseif ($selesai === $total) {
            $this->status = 'selesai';
        } elseif ($proses > 0) {
            $this->status = 'proses';
        } else {
            $this->status = 'belum';
        }

        $this->save();
    }


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

    /**
     * Relasi ke Tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relasi ke Project Members
     */
    public function members()
{
    return $this->hasMany(ProjectMember::class);
}
}
