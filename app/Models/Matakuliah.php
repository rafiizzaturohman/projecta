<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matakuliah extends Model
{
    use SoftDeletes;

    protected $table = 'matakuliahs';

    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_nidn', 'nidn');
    }
}
