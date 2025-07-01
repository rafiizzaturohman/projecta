<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Mass assignment protection: only block sensitive fields.
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'email_verified_at',
        'remember_token',
    ];

    /**
     * Hide these when serializing to JSON (API, etc).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Type casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * (Opsional) Relasi ke matakuliah sebagai dosen
     */
    public function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'dosen_nidn', 'nidn');
    }


    /**
     * (Opsional) Relasi ke task sebagai penanggung jawab
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * (Opsional) Relasi ke project sebagai anggota
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_members');
    }

    /**
     * (Opsional) Relasi ke prodi sebagai penanggung jawab
     */
    public function prodi()
{
    return $this->belongsTo(Prodi::class, 'kd_prodi', 'kd_prodi');
}

}
