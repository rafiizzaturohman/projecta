<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectMember extends Model
{
    use SoftDeletes;

    protected $table = 'project_members';

    protected $guarded = ['id'];

    const ROLE_KETUA = 'ketua';
    const ROLE_ANGGOTA = 'anggota';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRoleLabelAttribute()
    {
        return ucfirst($this->role);
    }
}
